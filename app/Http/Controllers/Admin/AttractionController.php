<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Province;
use App\Models\Destination;
use App\Models\Attraction;
use App\Models\AttractionTranslation;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AttractionController extends Controller
{
    protected $view;

    public function __construct()
    {
        set_time_limit(0);
        ini_set('memory_limit', '6144M');
    }

    public function index()
    {
        $attractions = Attraction::with([
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

        $this->view['attractions'] = $attractions;

        return view('admin.attractions.attractions', $this->view);
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

        return view('admin.attractions.create', $this->view);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'country_id'            => 'nullable|exists:countries,id',
            'province_id'           => 'nullable|exists:provinces,id',
            'destination_id'        => 'nullable|exists:destinations,id',

            'slug'                  => 'nullable|string|max:255|unique:attractions,slug',

            'thumbnail_id'          => 'nullable|exists:media,id',
            'banner_id'             => 'nullable|exists:media,id',
            'og_image_id'           => 'nullable|exists:media,id',

            'gallery_ids'           => 'nullable|array',
            'gallery_ids.*'         => 'nullable|exists:media,id',

            'type'                  => 'nullable|string|max:255',
            'opening_hours'         => 'nullable|string|max:255',
            'ticket_price'          => 'nullable|string|max:255',

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

        $attraction = Attraction::create([
            'country_id'       => $data['country_id'] ?? null,
            'province_id'      => $data['province_id'] ?? null,
            'destination_id'   => $data['destination_id'] ?? null,

            'slug'             => $data['slug'],

            'thumbnail_id'     => $data['thumbnail_id'] ?? null,
            'banner_id'        => $data['banner_id'] ?? null,
            'og_image_id'      => $data['og_image_id'] ?? null,

            'type'             => $data['type'] ?? null,
            'opening_hours'    => $data['opening_hours'] ?? null,
            'ticket_price'     => $data['ticket_price'] ?? null,

            'latitude'         => $data['latitude'] ?? null,
            'longitude'        => $data['longitude'] ?? null,

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

            AttractionTranslation::create([
                'attraction_id'      => $attraction->id,
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

        $this->syncAttractionGallery($attraction, $request);

        return redirect()
            ->route('admin.attractions.index')
            ->with('success', 'Thêm điểm tham quan thành công');
    }

    public function edit(Attraction $attraction)
    {
        $attraction->load([
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

        $this->view['attraction'] = $attraction;
        $this->view['countries'] = $countries;
        $this->view['provinces'] = $provinces;
        $this->view['destinations'] = $destinations;

        return view('admin.attractions.edit', $this->view);
    }

    public function update(Request $request, Attraction $attraction)
    {
        $data = $request->validate([
            'country_id'            => 'nullable|exists:countries,id',
            'province_id'           => 'nullable|exists:provinces,id',
            'destination_id'        => 'nullable|exists:destinations,id',

            'slug'                  => 'nullable|string|max:255|unique:attractions,slug,' . $attraction->id,

            'thumbnail_id'          => 'nullable|exists:media,id',
            'banner_id'             => 'nullable|exists:media,id',
            'og_image_id'           => 'nullable|exists:media,id',

            'gallery_ids'           => 'nullable|array',
            'gallery_ids.*'         => 'nullable|exists:media,id',

            'type'                  => 'nullable|string|max:255',
            'opening_hours'         => 'nullable|string|max:255',
            'ticket_price'          => 'nullable|string|max:255',

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

        $attraction->update([
            'country_id'       => $data['country_id'] ?? null,
            'province_id'      => $data['province_id'] ?? null,
            'destination_id'   => $data['destination_id'] ?? null,

            'slug'             => $data['slug'],

            'thumbnail_id'     => $data['thumbnail_id'] ?? null,
            'banner_id'        => $data['banner_id'] ?? null,
            'og_image_id'      => $data['og_image_id'] ?? null,

            'type'             => $data['type'] ?? null,
            'opening_hours'    => $data['opening_hours'] ?? null,
            'ticket_price'     => $data['ticket_price'] ?? null,

            'latitude'         => $data['latitude'] ?? null,
            'longitude'        => $data['longitude'] ?? null,

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

            $translation = AttractionTranslation::firstOrNew([
                'attraction_id' => $attraction->id,
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

        $this->syncAttractionGallery($attraction, $request);

        return redirect()
            ->route('admin.attractions.index')
            ->with('success', 'Cập nhật điểm tham quan thành công');
    }

    public function destroy(Attraction $attraction)
    {
        $attraction->media()
            ->wherePivot('type', 'gallery')
            ->detach();

        $attraction->delete();

        return redirect()
            ->route('admin.attractions.index')
            ->with('success', 'Xóa điểm tham quan thành công');
    }

    protected function syncAttractionGallery(Attraction $attraction, Request $request)
    {
        $attraction->media()
            ->wherePivot('type', 'gallery')
            ->detach();

        if ($request->filled('gallery_ids')) {
            foreach ($request->gallery_ids as $index => $mediaId) {
                if (!$mediaId) {
                    continue;
                }

                $attraction->media()->attach($mediaId, [
                    'type' => 'gallery',
                    'sort_order' => $index,
                ]);
            }
        }
    }
}