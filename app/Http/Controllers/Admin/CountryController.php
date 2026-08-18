<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CountryController extends Controller
{
    /**
     * Danh sách quốc gia
     */
    public function countries()
    {
        $countries = Country::with(['translations', 'thumbnail', 'banner'])
            ->orderBy('sort_order', 'asc')
            ->latest()
            ->get();

        $this->view['countries'] = $countries;
        return view('admin.countries.countries', $this->view);
    }

    /**
     * Form tạo mới
     */
    public function create()
    {
        return view('admin.countries.create');
    }

    /**
     * Lưu quốc gia
     */
    public function store(Request $request)
    {
        $request->validate([
            'vi.name' => 'required|string|max:255',
            'en.name' => 'nullable|string|max:255',
            'code' => 'nullable|string|max:10',
            'slug' => 'nullable|string|max:255|unique:countries,slug',
        ]);

        $country = Country::create([
            'code' => $request->code,
            'slug' => $request->slug ?: Str::slug($request->input('vi.name')),
            'thumbnail_id' => $request->thumbnail_id,
            'banner_id' => $request->banner_id,
            'sort_order' => $request->sort_order ?? 0,
            'is_active' => $request->boolean('is_active'),
        ]);

        foreach (['vi', 'en'] as $locale) {

            if ($request->filled("$locale.name")) {

                $country->translations()->create([
                    'locale' => $locale,
                    'name' => $request->input("$locale.name"),
                    'description' => $request->input("$locale.description"),
                    'meta_title' => $request->input("$locale.meta_title"),
                    'meta_description' => $request->input("$locale.meta_description"),
                ]);
            }
        }

        return redirect()
            ->route('admin.countries.index')
            ->with('success', 'Thêm quốc gia thành công.');
    }

    /**
     * Form chỉnh sửa
     */
    public function edit(Country $country)
    {
        $country->load('translations');

        return view('admin.countries.edit', compact('country'));
    }

    /**
     * Cập nhật quốc gia
     */
    public function update(Request $request, Country $country)
    {
        $request->validate([
            'vi.name' => 'required|string|max:255',
            'en.name' => 'nullable|string|max:255',
            'code' => 'nullable|string|max:10',
            'slug' => 'nullable|string|max:255|unique:countries,slug,' . $country->id,
        ]);

        $country->update([
            'code' => $request->code,
            'slug' => $request->slug ?: Str::slug($request->input('vi.name')),
            'thumbnail_id' => $request->thumbnail_id,
            'banner_id' => $request->banner_id,
            'sort_order' => $request->sort_order ?? 0,
            'is_active' => $request->boolean('is_active'),
        ]);

        foreach (['vi', 'en'] as $locale) {

            if ($request->filled("$locale.name")) {

                $country->translations()->updateOrCreate(
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
            ->route('admin.countries.index')
            ->with('success', 'Cập nhật quốc gia thành công.');
    }

    /**
     * Xóa quốc gia
     */
    public function destroy(Country $country)
    {
        $country->delete();

        return redirect()
            ->route('admin.countries.index')
            ->with('success', 'Xóa quốc gia thành công.');
    }
}