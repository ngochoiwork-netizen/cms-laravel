<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    protected $view = [];

    public function __construct()
    {
        set_time_limit(0);
        ini_set('memory_limit', '6144M');
    }

    public function categories()
    {
        $categories = Category::with([
                'parent.translation',
                'translation',
                'thumbnail'
            ])
            ->orderBy('type')
            ->orderBy('sort_order')
            ->latest()
            ->get();

        $this->view['categories'] = $categories;

        return view('admin.category.category', $this->view);
    }

    public function create()
    {
        $categories = Category::treeOptions();

        $this->view['categories'] = $categories;

        return view('admin.category.create', $this->view);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'parent_id'    => 'nullable|exists:categories,id',
            'type'         => 'required|string|max:50',
            'slug'         => 'nullable|string|max:255|unique:categories,slug',
            'thumbnail_id' => 'nullable|exists:media,id',
            'banner_id'    => 'nullable|exists:media,id',
            'og_image_id'  => 'nullable|exists:media,id',
            'canonical_url'=> 'nullable|string|max:500',
            'robots'       => 'nullable|string|max:100',
            'is_featured'  => 'nullable|boolean',
            'is_active'    => 'nullable|boolean',
            'sort_order'   => 'nullable|integer|min:0',

            'vi.name'              => 'required|string|max:255',
            'vi.short_description' => 'nullable|string',
            'vi.description'       => 'nullable|string',
            'vi.meta_title'        => 'nullable|string|max:255',
            'vi.meta_description'  => 'nullable|string',
            'vi.meta_keywords'     => 'nullable|string',
            'vi.og_title'          => 'nullable|string|max:255',
            'vi.og_description'    => 'nullable|string',
            'vi.schema_type'       => 'nullable|string|max:100',
            'vi.schema_data'       => 'nullable|string',

            'en.name'              => 'nullable|string|max:255',
            'en.short_description' => 'nullable|string',
            'en.description'       => 'nullable|string',
            'en.meta_title'        => 'nullable|string|max:255',
            'en.meta_description'  => 'nullable|string',
            'en.meta_keywords'     => 'nullable|string',
            'en.og_title'          => 'nullable|string|max:255',
            'en.og_description'    => 'nullable|string',
            'en.schema_type'       => 'nullable|string|max:100',
            'en.schema_data'       => 'nullable|string',
        ]);

        $categoryData = [
            'parent_id'     => $request->parent_id,
            'type'          => $request->type,
            'slug'          => $request->slug ?: Str::slug($request->input('vi.name')),
            'thumbnail_id'  => $request->thumbnail_id,
            'banner_id'     => $request->banner_id,
            'og_image_id'   => $request->og_image_id,
            'canonical_url' => $request->canonical_url,
            'robots'        => $request->robots ?: 'index, follow',
            'is_featured'   => $request->has('is_featured') ? 1 : 0,
            'is_active'     => $request->has('is_active') ? 1 : 0,
            'sort_order'    => $request->sort_order ?? 0,
        ];

        $category = Category::create($categoryData);

        $this->syncTranslations($category, $request);

        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'Thêm danh mục thành công');
    }

    public function edit(Category $category)
    {
        $category->load([
            'translations',
            'thumbnail',
            'banner',
            'ogImage'
        ]);

        $categories = Category::treeOptions($category->id);

        $this->view['category'] = $category;
        $this->view['categories'] = $categories;

        return view('admin.category.edit', $this->view);
    }

    public function update(Request $request, Category $category)
    {
        $data = $request->validate([
            'parent_id'    => 'nullable|exists:categories,id',
            'type'         => 'required|string|max:50',
            'slug'         => [
                'nullable',
                'string',
                'max:255',
                Rule::unique('categories', 'slug')->ignore($category->id),
            ],
            'thumbnail_id' => 'nullable|exists:media,id',
            'banner_id'    => 'nullable|exists:media,id',
            'og_image_id'  => 'nullable|exists:media,id',
            'canonical_url'=> 'nullable|string|max:500',
            'robots'       => 'nullable|string|max:100',
            'is_featured'  => 'nullable|boolean',
            'is_active'    => 'nullable|boolean',
            'sort_order'   => 'nullable|integer|min:0',

            'vi.name'              => 'required|string|max:255',
            'vi.short_description' => 'nullable|string',
            'vi.description'       => 'nullable|string',
            'vi.meta_title'        => 'nullable|string|max:255',
            'vi.meta_description'  => 'nullable|string',
            'vi.meta_keywords'     => 'nullable|string',
            'vi.og_title'          => 'nullable|string|max:255',
            'vi.og_description'    => 'nullable|string',
            'vi.schema_type'       => 'nullable|string|max:100',
            'vi.schema_data'       => 'nullable|string',

            'en.name'              => 'nullable|string|max:255',
            'en.short_description' => 'nullable|string',
            'en.description'       => 'nullable|string',
            'en.meta_title'        => 'nullable|string|max:255',
            'en.meta_description'  => 'nullable|string',
            'en.meta_keywords'     => 'nullable|string',
            'en.og_title'          => 'nullable|string|max:255',
            'en.og_description'    => 'nullable|string',
            'en.schema_type'       => 'nullable|string|max:100',
            'en.schema_data'       => 'nullable|string',
        ]);

        $categoryData = [
            'parent_id'     => $request->parent_id,
            'type'          => $request->type,
            'slug'          => $request->slug ?: Str::slug($request->input('vi.name')),
            'thumbnail_id'  => $request->thumbnail_id,
            'banner_id'     => $request->banner_id,
            'og_image_id'   => $request->og_image_id,
            'canonical_url' => $request->canonical_url,
            'robots'        => $request->robots ?: 'index, follow',
            'is_featured'   => $request->has('is_featured') ? 1 : 0,
            'is_active'     => $request->has('is_active') ? 1 : 0,
            'sort_order'    => $request->sort_order ?? 0,
        ];

        $category->update($categoryData);

        $this->syncTranslations($category, $request);

        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'Cập nhật danh mục thành công');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'Xóa danh mục thành công');
    }

    protected function syncTranslations(Category $category, Request $request)
    {
        foreach (['vi', 'en'] as $locale) {

            $input = $request->input($locale, []);

            if ($locale === 'en' && empty($input['name'])) {
                continue;
            }

            $schemaData = null;

            if (!empty($input['schema_data'])) {
                $schemaData = json_decode($input['schema_data'], true);
            }

            $category->translations()->updateOrCreate(
                [
                    'locale' => $locale,
                ],
                [
                    'name'              => $input['name'] ?? '',
                    'short_description' => $input['short_description'] ?? null,
                    'description'       => $input['description'] ?? null,
                    'meta_title'        => $input['meta_title'] ?? null,
                    'meta_description'  => $input['meta_description'] ?? null,
                    'meta_keywords'     => $input['meta_keywords'] ?? null,
                    'og_title'          => $input['og_title'] ?? null,
                    'og_description'    => $input['og_description'] ?? null,
                    'schema_type'       => $input['schema_type'] ?? null,
                    'schema_data'       => $schemaData,
                ]
            );
        }
    }
}