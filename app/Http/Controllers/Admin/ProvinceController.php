<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProvinceController extends Controller
{
    /**
     * Danh sách tỉnh / thành
     */
    public function index()
    {
        $provinces = Province::with([
                'country.translations',
                'translations',
                'thumbnail',
                'banner'
            ])
            ->orderBy('sort_order', 'asc')
            ->latest()
            ->get();

        $this->view['provinces'] = $provinces;

        return view('admin.provinces.province', $this->view);
    }

    /**
     * Form tạo mới
     */
    public function create()
    {
        $countries = Country::with('translations')
            ->where('is_active', 1)
            ->orderBy('sort_order', 'asc')
            ->get();

        return view('admin.provinces.create', compact('countries'));
    }

    /**
     * Lưu tỉnh / thành
     */
    public function store(Request $request)
    {
        $request->validate([
            'country_id' => 'required|exists:countries,id',
            'vi.name' => 'required|string|max:255',
            'en.name' => 'nullable|string|max:255',
            'code' => 'nullable|string|max:50',
            'slug' => 'nullable|string|max:255|unique:provinces,slug',
        ]);

        $province = Province::create([
            'country_id' => $request->country_id,
            'code' => $request->code,
            'slug' => $request->slug ?: Str::slug($request->input('vi.name')),
            'thumbnail_id' => $request->thumbnail_id,
            'banner_id' => $request->banner_id,
            'sort_order' => $request->sort_order ?? 0,
            'is_featured' => $request->boolean('is_featured'),
            'is_active' => $request->boolean('is_active'),
        ]);

        foreach (['vi', 'en'] as $locale) {
            if ($request->filled("$locale.name")) {
                $province->translations()->create([
                    'locale' => $locale,
                    'name' => $request->input("$locale.name"),
                    'description' => $request->input("$locale.description"),
                    'meta_title' => $request->input("$locale.meta_title"),
                    'meta_description' => $request->input("$locale.meta_description"),
                ]);
            }
        }

        return redirect()
            ->route('admin.provinces.index')
            ->with('success', 'Thêm tỉnh / thành thành công.');
    }

    /**
     * Form chỉnh sửa
     */
    public function edit(Province $province)
    {
        $province->load([
            'translations',
            'thumbnail',
            'banner',
        ]);

        $countries = Country::with('translations')
            ->where('is_active', 1)
            ->orderBy('sort_order', 'asc')
            ->get();

        return view('admin.provinces.edit', compact('province', 'countries'));
    }

    /**
     * Cập nhật tỉnh / thành
     */
    public function update(Request $request, Province $province)
    {
        $request->validate([
            'country_id' => 'required|exists:countries,id',
            'vi.name' => 'required|string|max:255',
            'en.name' => 'nullable|string|max:255',
            'code' => 'nullable|string|max:50',
            'slug' => 'nullable|string|max:255|unique:provinces,slug,' . $province->id,
        ]);

        $province->update([
            'country_id' => $request->country_id,
            'code' => $request->code,
            'slug' => $request->slug ?: Str::slug($request->input('vi.name')),
            'thumbnail_id' => $request->thumbnail_id,
            'banner_id' => $request->banner_id,
            'sort_order' => $request->sort_order ?? 0,
            'is_featured' => $request->boolean('is_featured'),
            'is_active' => $request->boolean('is_active'),
        ]);

        foreach (['vi', 'en'] as $locale) {
            if ($request->filled("$locale.name")) {
                $province->translations()->updateOrCreate(
                    [
                        'locale' => $locale,
                    ],
                    [
                        'name' => $request->input("$locale.name"),
                        'description' => $request->input("$locale.description"),
                        'meta_title' => $request->input("$locale.meta_title"),
                        'meta_description' => $request->input("$locale.meta_description"),
                    ]
                );
            }
        }

        return redirect()
            ->route('admin.provinces.index')
            ->with('success', 'Cập nhật tỉnh / thành thành công.');
    }

    /**
     * Xóa tỉnh / thành
     */
    public function destroy(Province $province)
    {
        $province->delete();

        return redirect()
            ->route('admin.provinces.index')
            ->with('success', 'Xóa tỉnh / thành thành công.');
    }
}