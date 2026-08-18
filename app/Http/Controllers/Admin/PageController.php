<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Media;
use App\Models\Page;
use App\Models\PageTranslation;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PageController extends Controller
{
    protected $view;

    public function __construct()
    {
        set_time_limit(0);
        ini_set('memory_limit', '6144M');
    }

    public function index()
    {
        $pages = Page::with(['translations', 'banner'])
            ->latest()
            ->get();

        $this->view['pages'] = $pages;

        return view('admin.pages.page', $this->view);
    }

    public function create()
    {
        $this->view['media'] = Media::latest()->get();

        return view('admin.pages.create', $this->view);
    }

    public function store(Request $request)
    {
        $request->validate([
            'slug' => 'nullable|string|max:255|unique:pages,slug',

            'thumbnail_id' => 'nullable|exists:media,id',
            'banner_id' => 'nullable|exists:media,id',
            'og_image_id' => 'nullable|exists:media,id',

            'template' => 'nullable|string|max:100',
            'canonical_url' => 'nullable|string|max:255',
            'robots' => 'nullable|string|max:50',
            'schema_type' => 'nullable|string|max:100',
            'schema_data' => 'nullable',

            'sort_order' => 'nullable|integer',

            'vi.title' => 'required|string|max:255',
            'en.title' => 'nullable|string|max:255',
        ]);

        $slug = $request->slug;

        if (!$slug) {
            $baseSlug = Str::slug($request->input('vi.title'));
            $slug = $baseSlug;
            $count = Page::where('slug', 'LIKE', $baseSlug . '%')->count();

            if ($count) {
                $slug = $baseSlug . '-' . ($count + 1);
            }
        }

        $page = Page::create([
            'slug' => $slug,

            'thumbnail_id' => $request->thumbnail_id,
            'banner_id' => $request->banner_id,
            'og_image_id' => $request->og_image_id,

            'template' => $request->template ?? 'default',
            'canonical_url' => $request->canonical_url,
            'robots' => $request->robots ?? 'index, follow',

            'schema_type' => $request->schema_type,
            'schema_data' => $request->schema_data,

            'is_active' => $request->has('is_active'),
            'sort_order' => $request->sort_order ?? 0,
        ]);

        foreach (['vi', 'en'] as $locale) {
            $data = $request->input($locale);

            if (!$data || empty($data['title'])) {
                continue;
            }

            PageTranslation::create([
                'page_id' => $page->id,
                'locale' => $locale,

                'title' => $data['title'] ?? null,
                'subtitle' => $data['subtitle'] ?? null,
                'excerpt' => $data['excerpt'] ?? null,
                'content' => $data['content'] ?? null,

                'meta_title' => $data['meta_title'] ?? null,
                'meta_description' => $data['meta_description'] ?? null,
                'meta_keywords' => $data['meta_keywords'] ?? null,

                'og_title' => $data['og_title'] ?? null,
                'og_description' => $data['og_description'] ?? null,
            ]);
        }

        return redirect()
            ->route('admin.pages.index')
            ->with('success', 'Tạo trang thành công');
    }

    public function edit(Page $page)
    {
        $page->load(['translations', 'thumbnail', 'banner', 'ogImage']);

        $this->view['page'] = $page;
        $this->view['translations'] = $page->translations->keyBy('locale');
        $this->view['media'] = Media::latest()->get();

        return view('admin.pages.edit', $this->view);
    }

    public function update(Request $request, Page $page)
    {
        $request->validate([
            'slug' => 'nullable|string|max:255|unique:pages,slug,' . $page->id,

            'thumbnail_id' => 'nullable|exists:media,id',
            'banner_id' => 'nullable|exists:media,id',
            'og_image_id' => 'nullable|exists:media,id',

            'template' => 'nullable|string|max:100',
            'canonical_url' => 'nullable|string|max:255',
            'robots' => 'nullable|string|max:50',
            'schema_type' => 'nullable|string|max:100',
            'schema_data' => 'nullable',

            'sort_order' => 'nullable|integer',

            'vi.title' => 'required|string|max:255',
            'en.title' => 'nullable|string|max:255',
        ]);

        $slug = $request->slug ?: Str::slug($request->input('vi.title'));

        $page->update([
            'slug' => $slug,

            'thumbnail_id' => $request->thumbnail_id,
            'banner_id' => $request->banner_id,
            'og_image_id' => $request->og_image_id,

            'template' => $request->template ?? 'default',
            'canonical_url' => $request->canonical_url,
            'robots' => $request->robots ?? 'index, follow',

            'schema_type' => $request->schema_type,
            'schema_data' => $request->schema_data,

            'is_active' => $request->has('is_active'),
            'sort_order' => $request->sort_order ?? 0,
        ]);

        foreach (['vi', 'en'] as $locale) {
            $data = $request->input($locale);

            if (!$data || empty($data['title'])) {
                continue;
            }

            PageTranslation::updateOrCreate(
                [
                    'page_id' => $page->id,
                    'locale' => $locale,
                ],
                [
                    'title' => $data['title'] ?? null,
                    'subtitle' => $data['subtitle'] ?? null,
                    'excerpt' => $data['excerpt'] ?? null,
                    'content' => $data['content'] ?? null,

                    'meta_title' => $data['meta_title'] ?? null,
                    'meta_description' => $data['meta_description'] ?? null,
                    'meta_keywords' => $data['meta_keywords'] ?? null,

                    'og_title' => $data['og_title'] ?? null,
                    'og_description' => $data['og_description'] ?? null,
                ]
            );
        }

        return redirect()
            ->route('admin.pages.index')
            ->with('success', 'Cập nhật trang thành công');
    }

    public function destroy(Page $page)
    {
        $page->delete();

        return redirect()
            ->route('admin.pages.index')
            ->with('success', 'Xóa trang thành công');
    }
}