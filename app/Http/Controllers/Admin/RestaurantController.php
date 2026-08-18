<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Province;
use App\Models\Destination;
use App\Models\Restaurant;
use App\Models\RestaurantTranslation;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RestaurantController extends Controller
{
    protected $view;

    public function __construct()
    {
        set_time_limit(0);
        ini_set('memory_limit', '6144M');
    }

    public function index()
    {
        $restaurants = Restaurant::with([
                'translations',
                'country.translations',
                'province.translations',
                'destination.translations',
                'thumbnail',
                'galleryImages'
            ])
            ->orderBy('sort_order')
            ->latest()
            ->get();

        $this->view['restaurants'] = $restaurants;

        return view('admin.restaurants.restaurants', $this->view);
    }

    public function create()
    {
        $countries = Country::with('translations')
            ->where('is_active', 1)
            ->orderBy('sort_order')
            ->get();

        $provinces = Province::with('translations')
            ->where('is_active', 1)
            ->orderBy('sort_order')
            ->get();

        $destinations = Destination::with('translations')
            ->where('is_active', 1)
            ->orderBy('sort_order')
            ->get();

        $this->view['countries'] = $countries;
        $this->view['provinces'] = $provinces;
        $this->view['destinations'] = $destinations;

        return view('admin.restaurants.create', $this->view);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'country_id'            => 'nullable|exists:countries,id',
            'province_id'           => 'nullable|exists:provinces,id',
            'destination_id'        => 'nullable|exists:destinations,id',

            'slug'                  => 'nullable|string|max:255|unique:restaurants,slug',

            'thumbnail_id'          => 'nullable|exists:media,id',
            'banner_id'             => 'nullable|exists:media,id',
            'og_image_id'           => 'nullable|exists:media,id',

            'gallery_ids'           => 'nullable|array',
            'gallery_ids.*'         => 'nullable|exists:media,id',

            'price_range'           => 'nullable|string|max:255',
            'cuisine_type'          => 'nullable|string|max:255',
            'opening_hours'         => 'nullable|string|max:255',

            'phone'                 => 'nullable|string|max:255',
            'website'               => 'nullable|string|max:500',

            'latitude'              => 'nullable|numeric',
            'longitude'             => 'nullable|numeric',

            'canonical_url'         => 'nullable|string|max:500',

            'is_featured'           => 'nullable|boolean',
            'is_active'             => 'nullable|boolean',
            'sort_order'            => 'nullable|integer',

            'vi.name'               => 'required|string|max:255',
            'vi.short_description'  => 'nullable|string',
            'vi.description'        => 'nullable|string',
            'vi.address'            => 'nullable|string|max:500',
            'vi.meta_title'         => 'nullable|string|max:255',
            'vi.meta_description'   => 'nullable|string',
            'vi.meta_keywords'      => 'nullable|string',
            'vi.og_title'           => 'nullable|string|max:255',
            'vi.og_description'     => 'nullable|string',
            'vi.schema_type'        => 'nullable|string|max:100',
            'vi.schema_data'        => 'nullable',

            'en.name'               => 'nullable|string|max:255',
            'en.short_description'  => 'nullable|string',
            'en.description'        => 'nullable|string',
            'en.address'            => 'nullable|string|max:500',
            'en.meta_title'         => 'nullable|string|max:255',
            'en.meta_description'   => 'nullable|string',
            'en.meta_keywords'      => 'nullable|string',
            'en.og_title'           => 'nullable|string|max:255',
            'en.og_description'     => 'nullable|string',
            'en.schema_type'        => 'nullable|string|max:100',
            'en.schema_data'        => 'nullable',
        ]);

        $data['slug'] = !empty($data['slug'])
            ? Str::slug($data['slug'])
            : Str::slug($request->input('vi.name'));

        $data['is_featured'] = $request->has('is_featured') ? 1 : 0;
        $data['is_active'] = $request->has('is_active') ? 1 : 0;
        $data['sort_order'] = $data['sort_order'] ?? 0;

        $restaurant = Restaurant::create([
            'country_id'       => $data['country_id'] ?? null,
            'province_id'      => $data['province_id'] ?? null,
            'destination_id'   => $data['destination_id'] ?? null,

            'slug'             => $data['slug'],

            'thumbnail_id'     => $data['thumbnail_id'] ?? null,
            'banner_id'        => $data['banner_id'] ?? null,
            'og_image_id'      => $data['og_image_id'] ?? null,

            'price_range'      => $data['price_range'] ?? null,
            'cuisine_type'     => $data['cuisine_type'] ?? null,
            'opening_hours'    => $data['opening_hours'] ?? null,

            'phone'            => $data['phone'] ?? null,
            'website'          => $data['website'] ?? null,


            'latitude'         => $data['latitude'] ?? null,
            'longitude'        => $data['longitude'] ?? null,


            'is_featured'      => $data['is_featured'],
            'is_active'        => $data['is_active'],
            'sort_order'       => $data['sort_order'],
        ]);

        foreach (['vi', 'en'] as $locale) {
            $translationData = $request->input($locale);

            if (empty($translationData['name'])) {
                continue;
            }

            RestaurantTranslation::create([
                'restaurant_id'      => $restaurant->id,
                'locale'             => $locale,

                'name'               => $translationData['name'],
                'short_description'  => $translationData['short_description'] ?? null,
                'description'        => $translationData['description'] ?? null,
                'address'            => $translationData['address'] ?? null,

                'meta_title'         => $translationData['meta_title'] ?? null,
                'meta_description'   => $translationData['meta_description'] ?? null,
                'meta_keywords'      => $translationData['meta_keywords'] ?? null,

                'og_title'           => $translationData['og_title'] ?? null,
                'og_description'     => $translationData['og_description'] ?? null,

                'schema_type'        => $translationData['schema_type'] ?? null,

                'schema_data'        => !empty($translationData['schema_data'])
                    ? json_decode($translationData['schema_data'], true)
                    : null,
            ]);
        }

        $this->syncRestaurantGallery($restaurant, $request);

        return redirect()
            ->route('admin.restaurants.index')
            ->with('success', 'Thêm quán ăn thành công');
    }

    public function edit(Restaurant $restaurant)
    {
        $restaurant->load([
            'translations',
            'thumbnail',
            'banner',
            'ogImage',
            'galleryImages',
        ]);

        $countries = Country::with('translations')
            ->where('is_active', 1)
            ->orderBy('sort_order')
            ->get();

        $provinces = Province::with('translations')
            ->where('is_active', 1)
            ->orderBy('sort_order')
            ->get();

        $destinations = Destination::with('translations')
            ->where('is_active', 1)
            ->orderBy('sort_order')
            ->get();

        $this->view['restaurant'] = $restaurant;
        $this->view['countries'] = $countries;
        $this->view['provinces'] = $provinces;
        $this->view['destinations'] = $destinations;

        return view('admin.restaurants.edit', $this->view);
    }

    public function update(Request $request, Restaurant $restaurant)
    {
        $data = $request->validate([
            'country_id'            => 'nullable|exists:countries,id',
            'province_id'           => 'nullable|exists:provinces,id',
            'destination_id'        => 'nullable|exists:destinations,id',

            'slug'                  => 'nullable|string|max:255|unique:restaurants,slug,' . $restaurant->id,

            'thumbnail_id'          => 'nullable|exists:media,id',
            'banner_id'             => 'nullable|exists:media,id',
            'og_image_id'           => 'nullable|exists:media,id',

            'gallery_ids'           => 'nullable|array',
            'gallery_ids.*'         => 'nullable|exists:media,id',

            'price_range'           => 'nullable|string|max:255',
            'cuisine_type'          => 'nullable|string|max:255',
            'opening_hours'         => 'nullable|string|max:255',

            'phone'                 => 'nullable|string|max:255',
            'website'               => 'nullable|string|max:500',

            'address'               => 'nullable|string|max:500',

            'latitude'              => 'nullable|numeric',
            'longitude'             => 'nullable|numeric',

            'canonical_url'         => 'nullable|string|max:500',

            'is_featured'           => 'nullable|boolean',
            'is_active'             => 'nullable|boolean',
            'sort_order'            => 'nullable|integer',

            'vi.name'               => 'required|string|max:255',
            'vi.short_description'  => 'nullable|string',
            'vi.description'        => 'nullable|string',
            'vi.address'            => 'nullable|string|max:500',
            'vi.meta_title'         => 'nullable|string|max:255',
            'vi.meta_description'   => 'nullable|string',
            'vi.meta_keywords'      => 'nullable|string',
            'vi.og_title'           => 'nullable|string|max:255',
            'vi.og_description'     => 'nullable|string',
            'vi.schema_type'        => 'nullable|string|max:100',
            'vi.schema_data'        => 'nullable',

            'en.name'               => 'nullable|string|max:255',
            'en.short_description'  => 'nullable|string',
            'en.description'        => 'nullable|string',
            'en.address'            => 'nullable|string|max:500',
            'en.meta_title'         => 'nullable|string|max:255',
            'en.meta_description'   => 'nullable|string',
            'en.meta_keywords'      => 'nullable|string',
            'en.og_title'           => 'nullable|string|max:255',
            'en.og_description'     => 'nullable|string',
            'en.schema_type'        => 'nullable|string|max:100',
            'en.schema_data'        => 'nullable',
        ]);

        $data['slug'] = !empty($data['slug'])
            ? Str::slug($data['slug'])
            : Str::slug($request->input('vi.name'));

        $data['is_featured'] = $request->has('is_featured') ? 1 : 0;
        $data['is_active'] = $request->has('is_active') ? 1 : 0;
        $data['sort_order'] = $data['sort_order'] ?? 0;

        $restaurant->update([
            'country_id'       => $data['country_id'] ?? null,
            'province_id'      => $data['province_id'] ?? null,
            'destination_id'   => $data['destination_id'] ?? null,

            'slug'             => $data['slug'],

            'thumbnail_id'     => $data['thumbnail_id'] ?? null,
            'banner_id'        => $data['banner_id'] ?? null,
            'og_image_id'      => $data['og_image_id'] ?? null,

            'price_range'      => $data['price_range'] ?? null,
            'cuisine_type'     => $data['cuisine_type'] ?? null,
            'opening_hours'    => $data['opening_hours'] ?? null,

            'phone'            => $data['phone'] ?? null,
            'website'          => $data['website'] ?? null,

            //'address'          => $data['address'] ?? null,

            'latitude'         => $data['latitude'] ?? null,
            'longitude'        => $data['longitude'] ?? null,

            //'canonical_url'    => $data['canonical_url'] ?? null,

            'is_featured'      => $data['is_featured'],
            'is_active'        => $data['is_active'],
            'sort_order'       => $data['sort_order'],
        ]);

        foreach (['vi', 'en'] as $locale) {
            $translationData = $request->input($locale);

            if (empty($translationData['name'])) {
                continue;
            }

            $translation = RestaurantTranslation::firstOrNew([
                'restaurant_id' => $restaurant->id,
                'locale'        => $locale,
            ]);

            $translation->fill([
                'name'               => $translationData['name'],
                'short_description'  => $translationData['short_description'] ?? null,
                'description'        => $translationData['description'] ?? null,
                'address'            => $translationData['address'] ?? null,

                'meta_title'         => $translationData['meta_title'] ?? null,
                'meta_description'   => $translationData['meta_description'] ?? null,
                'meta_keywords'      => $translationData['meta_keywords'] ?? null,

                'og_title'           => $translationData['og_title'] ?? null,
                'og_description'     => $translationData['og_description'] ?? null,

                'schema_type'        => $translationData['schema_type'] ?? null,

                'schema_data'        => !empty($translationData['schema_data'])
                    ? json_decode($translationData['schema_data'], true)
                    : null,
            ]);

            $translation->save();
        }

        $this->syncRestaurantGallery($restaurant, $request);

        return redirect()
            ->route('admin.restaurants.index')
            ->with('success', 'Cập nhật quán ăn thành công');
    }

    public function destroy(Restaurant $restaurant)
    {
        $restaurant->media()
            ->wherePivot('type', 'gallery')
            ->detach();

        $restaurant->delete();

        return redirect()
            ->route('admin.restaurants.index')
            ->with('success', 'Xóa quán ăn thành công');
    }

    protected function syncRestaurantGallery(Restaurant $restaurant, Request $request)
    {
        $restaurant->media()
            ->wherePivot('type', 'gallery')
            ->detach();

        if ($request->filled('gallery_ids')) {
            foreach ($request->gallery_ids as $index => $mediaId) {
                if (!$mediaId) {
                    continue;
                }

                $restaurant->media()->attach($mediaId, [
                    'type' => 'gallery',
                    'sort_order' => $index,
                ]);
            }
        }
    }
}