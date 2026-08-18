<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Province;
use App\Models\Destination;
use App\Models\Hotel;
use App\Models\HotelTranslation;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HotelController extends Controller
{
    protected $view;

    public function __construct()
    {
        set_time_limit(0);
        ini_set('memory_limit', '6144M');
    }

    public function index()
    {
        $hotels = Hotel::with([
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

        $this->view['hotels'] = $hotels;

        return view('admin.hotels.hotels', $this->view);
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

        return view('admin.hotels.create', $this->view);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'country_id'          => 'nullable|exists:countries,id',
            'province_id'         => 'nullable|exists:provinces,id',
            'destination_id'      => 'nullable|exists:destinations,id',

            'slug'                => 'nullable|string|max:255|unique:hotels,slug',

            'thumbnail_id'        => 'nullable|exists:media,id',
            'banner_id'           => 'nullable|exists:media,id',
            'og_image_id'         => 'nullable|exists:media,id',

            'gallery_ids'         => 'nullable|array',
            'gallery_ids.*'       => 'nullable|exists:media,id',

            'hotel_type'          => 'nullable|string|max:255',
            'star_rating'         => 'nullable|integer|min:1|max:5',
            'price_from'          => 'nullable|numeric|min:0',
            'price_range'         => 'nullable|string|max:255',
            'rating'              => 'nullable|numeric|min:0|max:5',
            'review_count'        => 'nullable|integer|min:0',

            'phone'               => 'nullable|string|max:255',
            'email'               => 'nullable|email|max:255',
            'website'             => 'nullable|string|max:500',
            'booking_url'         => 'nullable|string|max:500',
            'affiliate_url'       => 'nullable|string|max:500',

            'address'             => 'nullable|string|max:500',
            'latitude'            => 'nullable|numeric',
            'longitude'           => 'nullable|numeric',
            'google_map_embed'    => 'nullable|string',

            'amenities'           => 'nullable|array',
            'amenities.*'         => 'nullable|string|max:100',

            'canonical_url'       => 'nullable|string|max:500',

            'is_featured'         => 'nullable|boolean',
            'is_active'           => 'nullable|boolean',
            'sort_order'          => 'nullable|integer',

            'vi.name'             => 'required|string|max:255',
            'vi.short_description'=> 'nullable|string',
            'vi.description'      => 'nullable|string',
            'vi.address'          => 'nullable|string|max:500',
            'vi.meta_title'       => 'nullable|string|max:255',
            'vi.meta_description' => 'nullable|string',
            'vi.meta_keywords'    => 'nullable|string',
            'vi.og_title'         => 'nullable|string|max:255',
            'vi.og_description'   => 'nullable|string',
            'vi.schema_type'      => 'nullable|string|max:100',
            'vi.schema_data'      => 'nullable',

            'en.name'             => 'nullable|string|max:255',
            'en.short_description'=> 'nullable|string',
            'en.description'      => 'nullable|string',
            'en.address'          => 'nullable|string|max:500',
            'en.meta_title'       => 'nullable|string|max:255',
            'en.meta_description' => 'nullable|string',
            'en.meta_keywords'    => 'nullable|string',
            'en.og_title'         => 'nullable|string|max:255',
            'en.og_description'   => 'nullable|string',
            'en.schema_type'      => 'nullable|string|max:100',
            'en.schema_data'      => 'nullable',
        ]);

        $data['slug'] = !empty($data['slug'])
            ? Str::slug($data['slug'])
            : Str::slug($request->input('vi.name'));

        $data['is_featured'] = $request->has('is_featured') ? 1 : 0;
        $data['is_active'] = $request->has('is_active') ? 1 : 0;
        $data['sort_order'] = $data['sort_order'] ?? 0;

        $hotel = Hotel::create([
            'country_id'       => $data['country_id'] ?? null,
            'province_id'      => $data['province_id'] ?? null,
            'destination_id'   => $data['destination_id'] ?? null,

            'slug'             => $data['slug'],

            'thumbnail_id'     => $data['thumbnail_id'] ?? null,
            'banner_id'        => $data['banner_id'] ?? null,
            'og_image_id'      => $data['og_image_id'] ?? null,

            'hotel_type'       => $data['hotel_type'] ?? null,
            'star_rating'      => $data['star_rating'] ?? null,
            'price_from'       => $data['price_from'] ?? null,
            'price_range'      => $data['price_range'] ?? null,
            'rating'           => $data['rating'] ?? null,
            'review_count'     => $data['review_count'] ?? 0,

            'phone'            => $data['phone'] ?? null,
            'email'            => $data['email'] ?? null,
            'website'          => $data['website'] ?? null,
            'booking_url'      => $data['booking_url'] ?? null,
            'affiliate_url'    => $data['affiliate_url'] ?? null,

            'address'          => $data['address'] ?? null,
            'latitude'         => $data['latitude'] ?? null,
            'longitude'        => $data['longitude'] ?? null,
            'google_map_embed' => $data['google_map_embed'] ?? null,

            'amenities'        => $data['amenities'] ?? null,
            'canonical_url'    => $data['canonical_url'] ?? null,

            'is_featured'      => $data['is_featured'],
            'is_active'        => $data['is_active'],
            'sort_order'       => $data['sort_order'],
        ]);

        foreach (['vi', 'en'] as $locale) {
            $translationData = $request->input($locale);

            if (empty($translationData['name'])) {
                continue;
            }

            HotelTranslation::create([
                'hotel_id'          => $hotel->id,
                'locale'            => $locale,
                'name'              => $translationData['name'],
                'short_description' => $translationData['short_description'] ?? null,
                'description'       => $translationData['description'] ?? null,
                'address'           => $translationData['address'] ?? null,
                'meta_title'        => $translationData['meta_title'] ?? null,
                'meta_description'  => $translationData['meta_description'] ?? null,
                'meta_keywords'     => $translationData['meta_keywords'] ?? null,
                'og_title'          => $translationData['og_title'] ?? null,
                'og_description'    => $translationData['og_description'] ?? null,
                'schema_type'       => $translationData['schema_type'] ?? null,
                'schema_data'       => !empty($translationData['schema_data'])
                    ? json_decode($translationData['schema_data'], true)
                    : null,
            ]);
        }

        $this->syncHotelGallery($hotel, $request);

        return redirect()
            ->route('admin.hotels.index')
            ->with('success', 'Thêm khách sạn thành công');
    }

    public function edit(Hotel $hotel)
    {
        $hotel->load([
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

        $this->view['hotel'] = $hotel;
        $this->view['countries'] = $countries;
        $this->view['provinces'] = $provinces;
        $this->view['destinations'] = $destinations;

        return view('admin.hotels.edit', $this->view);
    }

    public function update(Request $request, Hotel $hotel)
    {
        $data = $request->validate([
            'country_id'          => 'nullable|exists:countries,id',
            'province_id'         => 'nullable|exists:provinces,id',
            'destination_id'      => 'nullable|exists:destinations,id',

            'slug'                => 'nullable|string|max:255|unique:hotels,slug,' . $hotel->id,

            'thumbnail_id'        => 'nullable|exists:media,id',
            'banner_id'           => 'nullable|exists:media,id',
            'og_image_id'         => 'nullable|exists:media,id',

            'gallery_ids'         => 'nullable|array',
            'gallery_ids.*'       => 'nullable|exists:media,id',

            'hotel_type'          => 'nullable|string|max:255',
            'star_rating'         => 'nullable|integer|min:1|max:5',
            'price_from'          => 'nullable|numeric|min:0',
            'price_range'         => 'nullable|string|max:255',
            'rating'              => 'nullable|numeric|min:0|max:5',
            'review_count'        => 'nullable|integer|min:0',

            'phone'               => 'nullable|string|max:255',
            'email'               => 'nullable|email|max:255',
            'website'             => 'nullable|string|max:500',
            'booking_url'         => 'nullable|string|max:500',
            'affiliate_url'       => 'nullable|string|max:500',

            'address'             => 'nullable|string|max:500',
            'latitude'            => 'nullable|numeric',
            'longitude'           => 'nullable|numeric',
            'google_map_embed'    => 'nullable|string',

            'amenities'           => 'nullable|array',
            'amenities.*'         => 'nullable|string|max:100',

            'canonical_url'       => 'nullable|string|max:500',

            'is_featured'         => 'nullable|boolean',
            'is_active'           => 'nullable|boolean',
            'sort_order'          => 'nullable|integer',

            'vi.name'             => 'required|string|max:255',
            'vi.short_description'=> 'nullable|string',
            'vi.description'      => 'nullable|string',
            'vi.address'          => 'nullable|string|max:500',
            'vi.meta_title'       => 'nullable|string|max:255',
            'vi.meta_description' => 'nullable|string',
            'vi.meta_keywords'    => 'nullable|string',
            'vi.og_title'         => 'nullable|string|max:255',
            'vi.og_description'   => 'nullable|string',
            'vi.schema_type'      => 'nullable|string|max:100',
            'vi.schema_data'      => 'nullable',

            'en.name'             => 'nullable|string|max:255',
            'en.short_description'=> 'nullable|string',
            'en.description'      => 'nullable|string',
            'en.address'          => 'nullable|string|max:500',
            'en.meta_title'       => 'nullable|string|max:255',
            'en.meta_description' => 'nullable|string',
            'en.meta_keywords'    => 'nullable|string',
            'en.og_title'         => 'nullable|string|max:255',
            'en.og_description'   => 'nullable|string',
            'en.schema_type'      => 'nullable|string|max:100',
            'en.schema_data'      => 'nullable',
        ]);

        $data['slug'] = !empty($data['slug'])
            ? Str::slug($data['slug'])
            : Str::slug($request->input('vi.name'));

        $data['is_featured'] = $request->has('is_featured') ? 1 : 0;
        $data['is_active'] = $request->has('is_active') ? 1 : 0;
        $data['sort_order'] = $data['sort_order'] ?? 0;

        $hotel->update([
            'country_id'       => $data['country_id'] ?? null,
            'province_id'      => $data['province_id'] ?? null,
            'destination_id'   => $data['destination_id'] ?? null,

            'slug'             => $data['slug'],

            'thumbnail_id'     => $data['thumbnail_id'] ?? null,
            'banner_id'        => $data['banner_id'] ?? null,
            'og_image_id'      => $data['og_image_id'] ?? null,

            'hotel_type'       => $data['hotel_type'] ?? null,
            'star_rating'      => $data['star_rating'] ?? null,
            'price_from'       => $data['price_from'] ?? null,
            'price_range'      => $data['price_range'] ?? null,
            'rating'           => $data['rating'] ?? null,
            'review_count'     => $data['review_count'] ?? 0,

            'phone'            => $data['phone'] ?? null,
            'email'            => $data['email'] ?? null,
            'website'          => $data['website'] ?? null,
            'booking_url'      => $data['booking_url'] ?? null,
            'affiliate_url'    => $data['affiliate_url'] ?? null,

            'address'          => $data['address'] ?? null,
            'latitude'         => $data['latitude'] ?? null,
            'longitude'        => $data['longitude'] ?? null,
            'google_map_embed' => $data['google_map_embed'] ?? null,

            'amenities'        => $data['amenities'] ?? null,
            'canonical_url'    => $data['canonical_url'] ?? null,

            'is_featured'      => $data['is_featured'],
            'is_active'        => $data['is_active'],
            'sort_order'       => $data['sort_order'],
        ]);

        foreach (['vi', 'en'] as $locale) {
            $translationData = $request->input($locale);

            if (empty($translationData['name'])) {
                continue;
            }

            $translation = HotelTranslation::firstOrNew([
                'hotel_id' => $hotel->id,
                'locale'   => $locale,
            ]);

            $translation->fill([
                'name'              => $translationData['name'],
                'short_description' => $translationData['short_description'] ?? null,
                'description'       => $translationData['description'] ?? null,
                'address'           => $translationData['address'] ?? null,
                'meta_title'        => $translationData['meta_title'] ?? null,
                'meta_description'  => $translationData['meta_description'] ?? null,
                'meta_keywords'     => $translationData['meta_keywords'] ?? null,
                'og_title'          => $translationData['og_title'] ?? null,
                'og_description'    => $translationData['og_description'] ?? null,
                'schema_type'       => $translationData['schema_type'] ?? null,
                'schema_data'       => !empty($translationData['schema_data'])
                    ? json_decode($translationData['schema_data'], true)
                    : null,
            ]);

            $translation->save();
        }

        $this->syncHotelGallery($hotel, $request);

        return redirect()
            ->route('admin.hotels.index')
            ->with('success', 'Cập nhật khách sạn thành công');
    }

    public function destroy(Hotel $hotel)
    {
        $hotel->media()
            ->wherePivot('type', 'gallery')
            ->detach();

        $hotel->delete();

        return redirect()
            ->route('admin.hotels.index')
            ->with('success', 'Xóa khách sạn thành công');
    }

    protected function syncHotelGallery(Hotel $hotel, Request $request)
    {
        $hotel->media()
            ->wherePivot('type', 'gallery')
            ->detach();

        if ($request->filled('gallery_ids')) {
            foreach ($request->gallery_ids as $index => $mediaId) {
                if (!$mediaId) {
                    continue;
                }

                $hotel->media()->attach($mediaId, [
                    'type' => 'gallery',
                    'sort_order' => $index,
                ]);
            }
        }
    }
}