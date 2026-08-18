<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Media;
use App\Models\Page;
use App\Models\PageSection;
use App\Models\PageSectionTranslation;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PageSectionController extends Controller
{
    protected $view = [];

    public function __construct()
    {
        set_time_limit(0);
        ini_set('memory_limit', '6144M');
    }

    public function index(Page $page)
    {
        $page->load([
            'translations',
            'sections.translations',
            'sections.image',
        ]);

        $this->view['page'] = $page;
        $this->view['sections'] = $page->sections;

        return view('admin.page-sections.index', $this->view);
    }

    public function create(Page $page)
    {
        $this->view['page'] = $page;
        $this->view['media'] = Media::latest()->get();

        return view('admin.page-sections.create', $this->view);
    }

    public function store(Request $request, Page $page)
    {
        $request->validate([
            'key' => 'required|string|max:255',
            'type' => 'required|string|max:100',
            'layout' => 'nullable|string|max:100',

            'image_id' => 'nullable|exists:media,id',
            'sort_order' => 'nullable|integer',

            'vi.title' => 'nullable|string|max:255',
            'en.title' => 'nullable|string|max:255',

            'vi.subtitle' => 'nullable|string|max:255',
            'en.subtitle' => 'nullable|string|max:255',

            'vi.content' => 'nullable',
            'en.content' => 'nullable',

            'vi.button_text' => 'nullable|string|max:255',
            'en.button_text' => 'nullable|string|max:255',

            'vi.button_link' => 'nullable|string|max:255',
            'en.button_link' => 'nullable|string|max:255',

            'vi.data_json' => 'nullable',
            'en.data_json' => 'nullable',
        ]);

        $section = PageSection::create([
            'page_id' => $page->id,

            'key' => Str::slug($request->key, '_'),
            'type' => $request->type,
            'layout' => $request->layout,

            'image_id' => $request->image_id,

            'sort_order' => $request->sort_order ?? 0,
            'is_active' => $request->has('is_active'),
        ]);

        foreach (['vi', 'en'] as $locale) {
            $data = $request->input($locale, []);

            PageSectionTranslation::create([
                'page_section_id' => $section->id,
                'locale' => $locale,

                'title' => $data['title'] ?? null,
                'subtitle' => $data['subtitle'] ?? null,
                'content' => $data['content'] ?? null,

                'button_text' => $data['button_text'] ?? null,
                'button_link' => $data['button_link'] ?? null,

                'data_json' => $this->normalizeJson($data['data_json'] ?? null),
            ]);
        }

        return redirect()
            ->route('admin.pages.sections.index', $page->id)
            ->with('success', 'Tạo section thành công');
    }

    public function edit(PageSection $section)
    {
        $section->load([
            'page.translations',
            'translations',
            'image',
        ]);

        $this->view['section'] = $section;
        $this->view['page'] = $section->page;
        $this->view['translations'] = $section->translations->keyBy('locale');
        $this->view['media'] = Media::latest()->get();

        return view('admin.page-sections.edit', $this->view);
    }

    public function update(Request $request, PageSection $section)
    {
        $request->validate([
            'key' => 'required|string|max:255',
            'type' => 'required|string|max:100',
            'layout' => 'nullable|string|max:100',

            'image_id' => 'nullable|exists:media,id',
            'sort_order' => 'nullable|integer',

            'vi.title' => 'nullable|string|max:255',
            'en.title' => 'nullable|string|max:255',

            'vi.subtitle' => 'nullable|string|max:255',
            'en.subtitle' => 'nullable|string|max:255',

            'vi.content' => 'nullable',
            'en.content' => 'nullable',

            'vi.button_text' => 'nullable|string|max:255',
            'en.button_text' => 'nullable|string|max:255',

            'vi.button_link' => 'nullable|string|max:255',
            'en.button_link' => 'nullable|string|max:255',

            'vi.data_json' => 'nullable',
            'en.data_json' => 'nullable',
        ]);

        $section->update([
            'key' => Str::slug($request->key, '_'),
            'type' => $request->type,
            'layout' => $request->layout,

            'image_id' => $request->image_id,

            'sort_order' => $request->sort_order ?? 0,
            'is_active' => $request->has('is_active'),
        ]);

        foreach (['vi', 'en'] as $locale) {
            $data = $request->input($locale, []);

            PageSectionTranslation::updateOrCreate(
                [
                    'page_section_id' => $section->id,
                    'locale' => $locale,
                ],
                [
                    'title' => $data['title'] ?? null,
                    'subtitle' => $data['subtitle'] ?? null,
                    'content' => $data['content'] ?? null,

                    'button_text' => $data['button_text'] ?? null,
                    'button_link' => $data['button_link'] ?? null,

                    'data_json' => $this->normalizeJson($data['data_json'] ?? null),
                ]
            );
        }

        return redirect()
            ->route('admin.pages.sections.index', $section->page_id)
            ->with('success', 'Cập nhật section thành công');
    }

    public function destroy(PageSection $section)
    {
        $pageId = $section->page_id;

        $section->delete();

        return redirect()
            ->route('admin.pages.sections.index', $pageId)
            ->with('success', 'Xóa section thành công');
    }

    private function normalizeJson($value)
    {
        if (empty($value)) {
            return null;
        }

        if (is_array($value)) {
            return $value;
        }

        $decoded = json_decode($value, true);

        return json_last_error() === JSON_ERROR_NONE ? $decoded : null;
    }
}