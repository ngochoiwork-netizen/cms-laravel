<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Province;
use App\Models\Destination;
use App\Models\DestinationTranslation;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DestinationController extends Controller
{
    protected $view;

    public function __construct()
    {
        set_time_limit(0);
        ini_set('memory_limit', '6144M');
    }

    public function index()
    {
        $destinations = Destination::with([
                'translations',
                'country.translations',
                'province.translations',
                'thumbnail'
            ])
            ->orderBy('sort_order')
            ->latest()
            ->get();

        $this->view['destinations'] = $destinations;

        return view('admin.destinations.destinations', $this->view);
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

        $this->view['countries'] = $countries;
        $this->view['provinces'] = $provinces;

        return view('admin.destinations.create', $this->view);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'country_id'          => 'nullable|exists:countries,id',
            'province_id'         => 'nullable|exists:provinces,id',

            'slug'                => 'nullable|string|max:255|unique:destinations,slug',

            'thumbnail_id'        => 'nullable|exists:media,id',
            'banner_id'           => 'nullable|exists:media,id',
            'og_image_id'         => 'nullable|exists:media,id',

            'latitude'            => 'nullable|numeric',
            'longitude'           => 'nullable|numeric',

            'best_time_to_visit'  => 'nullable|string|max:255',
            'travel_style'       => 'nullable|array',
            'travel_style.*'     => 'nullable|string|max:100',
            'region'              => 'nullable|string|max:255',
            'excerpt'             => 'nullable|string',
            'canonical_url'       => 'nullable|string|max:500',

            'is_featured'         => 'nullable|boolean',
            'is_active'           => 'nullable|boolean',
            'sort_order'          => 'nullable|integer',

            'vi.name'             => 'required|string|max:255',
            'vi.slug'             => 'nullable|string|max:255',
            'vi.short_description'=> 'nullable|string',
            'vi.description'      => 'nullable|string',
            'vi.address'          => 'nullable|string|max:255',
            'vi.meta_title'       => 'nullable|string|max:255',
            'vi.meta_description' => 'nullable|string',
            'vi.meta_keywords'    => 'nullable|string',
            'vi.canonical_url'    => 'nullable|string|max:500',
            'vi.robots'           => 'nullable|string|max:100',
            'vi.og_title'         => 'nullable|string|max:255',
            'vi.og_description'   => 'nullable|string',
            'vi.schema_type'      => 'nullable|string|max:100',
            'vi.schema_data'      => 'nullable',

            'en.name'             => 'nullable|string|max:255',
            'en.slug'             => 'nullable|string|max:255',
            'en.short_description'=> 'nullable|string',
            'en.description'      => 'nullable|string',
            'en.address'          => 'nullable|string|max:255',
            'en.meta_title'       => 'nullable|string|max:255',
            'en.meta_description' => 'nullable|string',
            'en.meta_keywords'    => 'nullable|string',
            'en.canonical_url'    => 'nullable|string|max:500',
            'en.robots'           => 'nullable|string|max:100',
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

        $destination = Destination::create([
            'country_id'         => $data['country_id'] ?? null,
            'province_id'        => $data['province_id'] ?? null,
            'slug'               => $data['slug'],
            'thumbnail_id'       => $data['thumbnail_id'] ?? null,
            'banner_id'          => $data['banner_id'] ?? null,
            'og_image_id'        => $data['og_image_id'] ?? null,
            'latitude'           => $data['latitude'] ?? null,
            'longitude'          => $data['longitude'] ?? null,
            'best_time_to_visit' => $data['best_time_to_visit'] ?? null,
            'travel_style'      => $data['travel_styles'] ?? null,
            'region'             => $data['region'] ?? null,
            'excerpt'            => $data['excerpt'] ?? null,
            'canonical_url'      => $data['canonical_url'] ?? null,
            'is_featured'        => $data['is_featured'],
            'is_active'          => $data['is_active'],
            'sort_order'         => $data['sort_order'],
        ]);

        foreach (['vi', 'en'] as $locale) {
            $translationData = $request->input($locale);

            if (empty($translationData['name'])) {
                continue;
            }

            DestinationTranslation::create([
                'destination_id'     => $destination->id,
                'locale'             => $locale,
                'name'               => $translationData['name'],
                'slug'               => !empty($translationData['slug'])
                    ? Str::slug($translationData['slug'])
                    : Str::slug($translationData['name']),
                'short_description'  => $translationData['short_description'] ?? null,
                'description'        => $translationData['description'] ?? null,
                'address'            => $translationData['address'] ?? null,
                'meta_title'         => $translationData['meta_title'] ?? null,
                'meta_description'   => $translationData['meta_description'] ?? null,
                'meta_keywords'      => $translationData['meta_keywords'] ?? null,
                'canonical_url'      => $translationData['canonical_url'] ?? null,
                'robots'             => $translationData['robots'] ?? 'index, follow',
                'og_title'           => $translationData['og_title'] ?? null,
                'og_description'     => $translationData['og_description'] ?? null,
                'schema_type'        => $translationData['schema_type'] ?? null,
                'schema_data'        => !empty($translationData['schema_data'])
                    ? json_decode($translationData['schema_data'], true)
                    : null,
            ]);
        }

        return redirect()
            ->route('admin.destinations.index')
            ->with('success', 'Thêm điểm đến thành công');
    }

    public function edit(Destination $destination)
    {
        $destination->load([
            'translations',
            'thumbnail',
            'banner',
            'ogImage',
        ]);

        $countries = Country::with('translations')
            ->where('is_active', 1)
            ->orderBy('sort_order')
            ->get();

        $provinces = Province::with('translations')
            ->where('is_active', 1)
            ->orderBy('sort_order')
            ->get();

        $this->view['destination'] = $destination;
        $this->view['countries'] = $countries;
        $this->view['provinces'] = $provinces;

        return view('admin.destinations.edit', $this->view);
    }

    public function update(Request $request, Destination $destination)
    {
        $data = $request->validate([
            'country_id'          => 'nullable|exists:countries,id',
            'province_id'         => 'nullable|exists:provinces,id',

            'slug'                => 'nullable|string|max:255|unique:destinations,slug,' . $destination->id,

            'thumbnail_id'        => 'nullable|exists:media,id',
            'banner_id'           => 'nullable|exists:media,id',
            'og_image_id'         => 'nullable|exists:media,id',

            'latitude'            => 'nullable|numeric',
            'longitude'           => 'nullable|numeric',

            'best_time_to_visit'  => 'nullable|string|max:255',
            'travel_style'       => 'nullable|array',
            'travel_styles.*'     => 'nullable|string|max:100',
            'region'              => 'nullable|string|max:255',
            'excerpt'             => 'nullable|string',
            'canonical_url'       => 'nullable|string|max:500',

            'is_featured'         => 'nullable|boolean',
            'is_active'           => 'nullable|boolean',
            'sort_order'          => 'nullable|integer',

            'vi.name'             => 'required|string|max:255',
            'vi.slug'             => 'nullable|string|max:255',
            'vi.short_description'=> 'nullable|string',
            'vi.description'      => 'nullable|string',
            'vi.address'          => 'nullable|string|max:255',
            'vi.meta_title'       => 'nullable|string|max:255',
            'vi.meta_description' => 'nullable|string',
            'vi.meta_keywords'    => 'nullable|string',
            'vi.canonical_url'    => 'nullable|string|max:500',
            'vi.robots'           => 'nullable|string|max:100',
            'vi.og_title'         => 'nullable|string|max:255',
            'vi.og_description'   => 'nullable|string',
            'vi.schema_type'      => 'nullable|string|max:100',
            'vi.schema_data'      => 'nullable',

            'en.name'             => 'nullable|string|max:255',
            'en.slug'             => 'nullable|string|max:255',
            'en.short_description'=> 'nullable|string',
            'en.description'      => 'nullable|string',
            'en.address'          => 'nullable|string|max:255',
            'en.meta_title'       => 'nullable|string|max:255',
            'en.meta_description' => 'nullable|string',
            'en.meta_keywords'    => 'nullable|string',
            'en.canonical_url'    => 'nullable|string|max:500',
            'en.robots'           => 'nullable|string|max:100',
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

        $destination->update([
            'country_id'         => $data['country_id'] ?? null,
            'province_id'        => $data['province_id'] ?? null,
            'slug'               => $data['slug'],
            'thumbnail_id'       => $data['thumbnail_id'] ?? null,
            'banner_id'          => $data['banner_id'] ?? null,
            'og_image_id'        => $data['og_image_id'] ?? null,
            'latitude'           => $data['latitude'] ?? null,
            'longitude'          => $data['longitude'] ?? null,
            'best_time_to_visit' => $data['best_time_to_visit'] ?? null,
            'travel_styles'      => $data['travel_styles'] ?? null,
            'region'             => $data['region'] ?? null,
            'excerpt'            => $data['excerpt'] ?? null,
            'canonical_url'      => $data['canonical_url'] ?? null,
            'is_featured'        => $data['is_featured'],
            'is_active'          => $data['is_active'],
            'sort_order'         => $data['sort_order'],
        ]);

        foreach (['vi', 'en'] as $locale) {
            $translationData = $request->input($locale);

            if (empty($translationData['name'])) {
                continue;
            }

            $translation = DestinationTranslation::firstOrNew([
                'destination_id' => $destination->id,
                'locale' => $locale,
            ]);

            $translation->fill([
                'name'               => $translationData['name'],
                'slug'               => !empty($translationData['slug'])
                    ? Str::slug($translationData['slug'])
                    : Str::slug($translationData['name']),
                'short_description'  => $translationData['short_description'] ?? null,
                'description'        => $translationData['description'] ?? null,
                'address'            => $translationData['address'] ?? null,
                'meta_title'         => $translationData['meta_title'] ?? null,
                'meta_description'   => $translationData['meta_description'] ?? null,
                'meta_keywords'      => $translationData['meta_keywords'] ?? null,
                'canonical_url'      => $translationData['canonical_url'] ?? null,
                'robots'             => $translationData['robots'] ?? 'index, follow',
                'og_title'           => $translationData['og_title'] ?? null,
                'og_description'     => $translationData['og_description'] ?? null,
                'schema_type'        => $translationData['schema_type'] ?? null,
                'schema_data'        => !empty($translationData['schema_data'])
                    ? json_decode($translationData['schema_data'], true)
                    : null,
            ]);

            $translation->save();
        }

        return redirect()
            ->route('admin.destinations.index')
            ->with('success', 'Cập nhật điểm đến thành công');
    }

    public function destroy(Destination $destination)
    {
        $destination->delete();

        return redirect()
            ->route('admin.destinations.index')
            ->with('success', 'Xóa điểm đến thành công');
    }
}