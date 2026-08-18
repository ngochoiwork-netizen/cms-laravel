<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostTranslation;
use App\Models\Category;
use App\Models\Media;
use App\Models\Tag;
use App\Models\TagTranslation;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostController extends Controller
{
    protected $view = [];

    public function post()
    {
        // index()
            $posts = Post::with([
                    'category.translations',
                    'thumbnail',
                    'translations',
                    'tags.translations',
                ])
                ->latest()
                ->get();

        $this->view['posts'] = $posts;

        return view('admin.posts.post', $this->view);
    }

    public function create()
    {
        $categories = Category::with('vi')
            ->where('type', 'post')
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        $tags = Tag::with('translations')
            ->where('type', 'post')
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        $media = Media::latest()->get();

        $this->view['post'] = null;
        $this->view['categories'] = $categories;
        $this->view['tags'] = $tags;
        $this->view['media'] = $media;
        $this->view['selectedTags'] = [];

        return view('admin.posts.create', $this->view);
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'nullable|exists:categories,id',

            'slug' => 'nullable|string|max:255|unique:posts,slug',

            'thumbnail_id' => 'nullable|exists:media,id',
            'banner_id' => 'nullable|exists:media,id',
            'og_image_id' => 'nullable|exists:media,id',

            'published_at' => 'nullable|date',
            'canonical_url' => 'nullable|string|max:255',
            'robots' => 'nullable|string|max:255',
            'schema_type' => 'nullable|string|max:255',

            'vi.title' => 'required|string|max:255',
            'en.title' => 'nullable|string|max:255',

            'tag_ids' => 'nullable|string',
        ]);

        DB::transaction(function () use ($request) {

            $slug = $request->slug ?: Str::slug($request->input('vi.title'));

            $post = Post::create([
                'category_id' => $request->category_id,
                'author_id' => auth()->id(),

                'thumbnail_id' => $request->thumbnail_id,
                'banner_id' => $request->banner_id,
                'og_image_id' => $request->og_image_id,

                'slug' => $slug,

                'published_at' => $request->published_at,

                'canonical_url' => $request->canonical_url,
                'robots' => $request->robots,
                'schema_type' => $request->schema_type ?: 'Article',
                'schema_data' => $request->schema_data,

                'sort_order' => $request->sort_order ?? 0,
                'is_featured' => $request->has('is_featured'),
                'is_active' => $request->has('is_active'),
            ]);

            $this->syncTranslations($post, $request);
            $this->syncTags($post, $request);
        });

        return redirect()
            ->route('admin.posts.index')
            ->with('success', 'Thêm bài viết thành công.');
    }

    public function edit(Post $post)
    {
        $post->load([
            'translations',
            'thumbnail',
            'banner',
            'ogImage',
            'tags',
        ]);

        $categories = Category::with('vi')
            ->where('type', 'post')
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        $tags = Tag::with('translations')
            ->where('type', 'post')
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        $media = Media::latest()->get();

        $selectedTags = $post->tags
            ->pluck('id')
            ->toArray();

        $this->view['post'] = $post;
        $this->view['categories'] = $categories;
        $this->view['tags'] = $tags;
        $this->view['media'] = $media;
        $this->view['selectedTags'] = $selectedTags;

        return view('admin.posts.edit', $this->view);
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'category_id' => 'nullable|exists:categories,id',

            'slug' => 'required|string|max:255|unique:posts,slug,' . $post->id,

            'thumbnail_id' => 'nullable|exists:media,id',
            'banner_id' => 'nullable|exists:media,id',
            'og_image_id' => 'nullable|exists:media,id',

            'published_at' => 'nullable|date',
            'canonical_url' => 'nullable|string|max:255',
            'robots' => 'nullable|string|max:255',
            'schema_type' => 'nullable|string|max:255',

            'vi.title' => 'required|string|max:255',
            'en.title' => 'nullable|string|max:255',

            'tag_ids' => 'nullable|string',
        ]);

        DB::transaction(function () use ($request, $post) {

            $post->update([
                'category_id' => $request->category_id,

                'thumbnail_id' => $request->thumbnail_id,
                'banner_id' => $request->banner_id,
                'og_image_id' => $request->og_image_id,

                'slug' => $request->slug,

                'published_at' => $request->published_at,

                'canonical_url' => $request->canonical_url,
                'robots' => $request->robots,
                'schema_type' => $request->schema_type ?: 'Article',
                'schema_data' => $request->schema_data,

                'sort_order' => $request->sort_order ?? 0,
                'is_featured' => $request->has('is_featured'),
                'is_active' => $request->has('is_active'),
            ]);

            $this->syncTranslations($post, $request);
            $this->syncTags($post, $request);
        });

        return redirect()
            ->route('admin.posts.index')
            ->with('success', 'Cập nhật bài viết thành công.');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()
            ->route('admin.posts.index')
            ->with('success', 'Xóa bài viết thành công.');
    }

    protected function syncTranslations(Post $post, Request $request)
    {
        foreach (['vi', 'en'] as $locale) {

            $data = $request->input($locale, []);

            if (empty($data['title']) && $locale === 'en') {
                continue;
            }

            PostTranslation::updateOrCreate(
                [
                    'post_id' => $post->id,
                    'locale' => $locale,
                ],
                [
                    'title' => $data['title'] ?? null,
                    'short_description' => $data['short_description'] ?? null,
                    'content' => $data['content'] ?? null,

                    'meta_title' => $data['meta_title'] ?? null,
                    'meta_description' => $data['meta_description'] ?? null,
                    'meta_keywords' => $data['meta_keywords'] ?? null,

                    'og_title' => $data['og_title'] ?? null,
                    'og_description' => $data['og_description'] ?? null,

                    'ai_overview' => $data['ai_overview'] ?? null,
                    'faq_schema' => $data['faq_schema'] ?? null,
                    'schema_data' => $data['schema_data'] ?? null,
                ]
            );
        }
    }

    protected function syncTags(Post $post, Request $request)
    {
        $syncData = [];

        $tagValues = [];

        if ($request->filled('tag_ids')) {
            $tagValues = array_filter(array_map('trim', explode(',', $request->tag_ids)));
        }

        foreach ($tagValues as $index => $tagValue) {

            $slug = Str::slug($tagValue);

            $tag = Tag::firstOrCreate(
                [
                    'slug' => $slug,
                ],
                [
                    'type' => 'post',
                    'is_active' => true,
                ]
            );

            TagTranslation::firstOrCreate(
                [
                    'tag_id' => $tag->id,
                    'locale' => 'vi',
                ],
                [
                    'name' => $tagValue,
                ]
            );

            $syncData[$tag->id] = [
                'sort_order' => $index,
            ];
        }

        $post->tags()->sync($syncData);
    }
}