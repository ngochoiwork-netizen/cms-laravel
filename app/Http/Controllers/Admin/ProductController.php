<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    protected $view;

    public function __construct()
    {
        set_time_limit(0);
        ini_set('memory_limit', '6144M');
    }

    public function product()
    {
        $products = Product::with(['vi', 'category', 'thumbnail', 'user'])
            ->latest()
            ->get();

        $this->view['products'] = $products;

        return view('admin.product.product', $this->view);
    }

    public function create()
    {
        $categories = Category::where('type', 'product')
        ->where('is_active', 1)
        ->orderBy('sort_order')
        ->get();

        $categories = Category::treeOptions(null, null, '', 'product');

        $tags = Tag::with('vi')
            ->orderBy('id', 'desc')
            ->get();

        $this->view['categories'] = $categories;
        $this->view['tags'] = $tags;

        return view('admin.product.create', $this->view);
    }

    public function store(Request $request)
    {
        $data = $this->validateProduct($request);

        $data['slug'] = !empty($data['slug'])
            ? Str::slug($data['slug'])
            : Str::slug($request->input('vi.name'));

        $data['user_id'] = auth()->id();
        $data['is_featured'] = $request->has('is_featured') ? 1 : 0;
        $data['is_active'] = $request->has('is_active') ? 1 : 0;
        $data['robots'] = $data['robots'] ?? 'index, follow';
        $data['status'] = $data['status'] ?? 'draft';
        $data['stock_quantity'] = $data['stock_quantity'] ?? 0;

        $data['schema_data'] = $this->handleSchemaData($request);

        $product = Product::create($data);

        $this->syncTranslations($product, $request);
        $this->syncProductTags($product, $request);
        $this->syncProductGallery($product, $request);

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Thêm sản phẩm thành công');
    }

    public function show(Product $product)
    {
        $product->load([
            'translations',
            'category',
            'thumbnail',
            'banner',
            'ogImage',
            'galleryImages',
            'tags',
            'user',
        ]);

        $this->view['product'] = $product;

        return view('admin.product.show', $this->view);
    }

    public function edit(Product $product)
    {
        $product->load([
            'translations',
            'category',
            'thumbnail',
            'banner',
            'ogImage',
            'galleryImages',
            'tags',
            'user',
        ]);

        $categories = Category::where('type', 'product')
        ->where('is_active', 1)
        ->orderBy('sort_order')
        ->get();

        $categories = Category::treeOptions(null, null, '', 'product');

        $tags = Tag::with('vi')
            ->orderBy('id', 'desc')
            ->get();

        $this->view['product'] = $product;
        $this->view['categories'] = $categories;
        $this->view['tags'] = $tags;

        return view('admin.product.edit', $this->view);
    }

    public function update(Request $request, Product $product)
    {
        $data = $this->validateProduct($request, $product->id);

        $data['slug'] = !empty($data['slug'])
            ? Str::slug($data['slug'])
            : Str::slug($request->input('vi.name'));

        $data['is_featured'] = $request->has('is_featured') ? 1 : 0;
        $data['is_active'] = $request->has('is_active') ? 1 : 0;
        $data['robots'] = $data['robots'] ?? 'index, follow';
        $data['status'] = $data['status'] ?? 'draft';
        $data['stock_quantity'] = $data['stock_quantity'] ?? 0;

        $data['schema_data'] = $this->handleSchemaData($request);

        $product->fill($data);
        $product->save();

        $this->syncTranslations($product, $request);
        $this->syncProductTags($product, $request);
        $this->syncProductGallery($product, $request);

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Cập nhật sản phẩm thành công');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Xóa sản phẩm thành công');
    }

    protected function validateProduct(Request $request, $productId = null)
    {
        return $request->validate([
            'category_id'       => 'nullable|exists:categories,id',
            'thumbnail_id'      => 'nullable|exists:media,id',
            'banner_id'         => 'nullable|exists:media,id',
            'og_image_id'       => 'nullable|exists:media,id',

            'slug'              => 'nullable|string|max:255|unique:products,slug,' . $productId,

            'sku'               => 'nullable|string|max:255',
            'brand'             => 'nullable|string|max:255',
            'model'             => 'nullable|string|max:255',
            'warranty'          => 'nullable|string|max:255',

            'price'             => 'nullable|numeric|min:0',
            'sale_price'        => 'nullable|numeric|min:0',
            'stock_quantity'    => 'nullable|integer|min:0',

            'status'            => 'nullable|in:draft,published,archived',
            'is_featured'       => 'nullable|boolean',
            'is_active'         => 'nullable|boolean',

            'canonical_url'     => 'nullable|string|max:500',
            'robots'            => 'nullable|string|max:100',

            'schema_type'       => 'nullable|string|max:100',
            'schema_data'       => 'nullable',

            'vi.name'           => 'required|string|max:255',
            'vi.short_description' => 'nullable|string',
            'vi.description'    => 'nullable|string',
            'vi.specifications' => 'nullable|array',
            'vi.features'       => 'nullable|array',
            'vi.meta_title'     => 'nullable|string|max:255',
            'vi.meta_description' => 'nullable|string',
            'vi.meta_keywords'  => 'nullable|string|max:255',
            'vi.og_title'       => 'nullable|string|max:255',
            'vi.og_description' => 'nullable|string',

            'en.name'           => 'nullable|string|max:255',
            'en.short_description' => 'nullable|string',
            'en.description'    => 'nullable|string',
            'en.specifications' => 'nullable|array',
            'en.features'       => 'nullable|array',
            'en.meta_title'     => 'nullable|string|max:255',
            'en.meta_description' => 'nullable|string',
            'en.meta_keywords'  => 'nullable|string|max:255',
            'en.og_title'       => 'nullable|string|max:255',
            'en.og_description' => 'nullable|string',

            'tag_ids'           => 'nullable|array',
            'tag_ids.*'         => 'exists:tags,id',

            'gallery_ids'       => 'nullable|array',
            'gallery_ids.*'     => 'exists:media,id',
        ]);
    }

    protected function syncTranslations(Product $product, Request $request)
    {
        foreach (['vi', 'en'] as $locale) {
            $data = $request->input($locale, []);

            if ($locale === 'en' && empty($data['name'])) {
                continue;
            }

            $product->translations()->updateOrCreate(
                [
                    'locale' => $locale,
                ],
                [
                    'name' => $data['name'] ?? null,
                    'short_description' => $data['short_description'] ?? null,
                    'description' => $data['description'] ?? null,

                    'specifications' => $this->cleanSpecifications(
                        $data['specifications'] ?? []
                    ),

                    'features' => $this->cleanFeatures(
                        $data['features'] ?? []
                    ),

                    'meta_title' => $data['meta_title'] ?? null,
                    'meta_description' => $data['meta_description'] ?? null,
                    'meta_keywords' => $data['meta_keywords'] ?? null,

                    'og_title' => $data['og_title'] ?? null,
                    'og_description' => $data['og_description'] ?? null,
                ]
            );
        }
    }

    protected function syncProductTags(Product $product, Request $request)
    {
        $product->tags()->sync($request->tag_ids ?? []);
    }

    protected function syncProductGallery(Product $product, Request $request)
    {
        $product->media()
            ->wherePivot('type', 'gallery')
            ->detach();

        if (!$request->gallery_ids) {
            return;
        }

        foreach ($request->gallery_ids as $index => $mediaId) {
            $product->media()->attach($mediaId, [
                'type' => 'gallery',
                'sort_order' => $index,
            ]);
        }
    }

    protected function cleanSpecifications($items)
    {
        return collect($items)
            ->filter(function ($item) {
                return !empty($item['key']) || !empty($item['value']);
            })
            ->map(function ($item) {
                return [
                    'key' => $item['key'] ?? '',
                    'value' => $item['value'] ?? '',
                ];
            })
            ->values()
            ->toArray();
    }

    protected function cleanFeatures($items)
    {
        return collect($items)
            ->filter(function ($item) {
                return !empty($item);
            })
            ->values()
            ->toArray();
    }

    protected function handleSchemaData(Request $request)
    {
        $schemaData = $request->input('schema_data');

        if (!empty($schemaData) && is_string($schemaData)) {
            $decoded = json_decode($schemaData, true);

            if (json_last_error() === JSON_ERROR_NONE) {
                return $decoded;
            }
        }

        if ($request->schema_type === 'Product') {
            return $this->renderProductSchema($request);
        }

        return null;
    }

    protected function renderProductSchema(Request $request)
    {
        return [
            '@context' => 'https://schema.org/',
            '@type' => 'Product',
            'name' => $request->input('vi.name') ?? '',
            'description' => $request->input('vi.short_description') ?? '',
            'sku' => $request->sku ?? '',
            'brand' => [
                '@type' => 'Brand',
                'name' => $request->brand ?? '',
            ],
            'offers' => [
                '@type' => 'Offer',
                'priceCurrency' => 'VND',
                'price' => $request->sale_price ?? $request->price ?? 0,
                'availability' => 'https://schema.org/InStock',
            ],
        ];
    }
}