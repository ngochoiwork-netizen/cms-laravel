<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Models\SliderTranslation;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function sliders()
    {
        $sliders = Slider::with([
                'image',
                'translations',
            ])
            ->orderBy('sort_order', 'asc')
            ->latest()
            ->get();

        return view('admin.sliders.sliders', compact('sliders'));
    }

    public function create()
    {
        return view('admin.sliders.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'position' => 'required|string|max:255',
            'image_id' => 'nullable|exists:media,id',
            'link' => 'nullable|string|max:500',
            'button_text' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',

            'vi.title' => 'nullable|string|max:255',
            'vi.subtitle' => 'nullable|string|max:255',
            'vi.description' => 'nullable',

            'en.title' => 'nullable|string|max:255',
            'en.subtitle' => 'nullable|string|max:255',
            'en.description' => 'nullable',
        ]);

        $slider = Slider::create([
            'position' => $request->position,
            'image_id' => $request->image_id,
            'link' => $request->link,
            'button_text' => $request->button_text,
            'sort_order' => $request->sort_order ?? 0,
            'is_active' => $request->boolean('is_active'),
        ]);

        $this->saveTranslations($slider, $request);

        return redirect()
            ->route('admin.sliders.index')
            ->with('success', 'Thêm slider thành công.');
    }

    public function edit(Slider $slider)
    {
        $slider->load([
            'image',
            'translations',
        ]);

        return view('admin.sliders.edit', compact('slider'));
    }

    public function update(Request $request, Slider $slider)
    {
        $request->validate([
            'position' => 'required|string|max:255',
            'image_id' => 'nullable|exists:media,id',
            'link' => 'nullable|string|max:500',
            'button_text' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',

            'vi.title' => 'nullable|string|max:255',
            'vi.subtitle' => 'nullable|string|max:255',
            'vi.description' => 'nullable',

            'en.title' => 'nullable|string|max:255',
            'en.subtitle' => 'nullable|string|max:255',
            'en.description' => 'nullable',
        ]);

        $slider->update([
            'position' => $request->position,
            'image_id' => $request->image_id,
            'link' => $request->link,
            'button_text' => $request->button_text,
            'sort_order' => $request->sort_order ?? 0,
            'is_active' => $request->boolean('is_active'),
        ]);

        $this->saveTranslations($slider, $request);

        return redirect()
            ->route('admin.sliders.index')
            ->with('success', 'Cập nhật slider thành công.');
    }

    public function destroy(Slider $slider)
    {
        $slider->delete();

        return redirect()
            ->route('admin.sliders.index')
            ->with('success', 'Xóa slider thành công.');
    }

    protected function saveTranslations(Slider $slider, Request $request)
    {
        foreach (['vi', 'en'] as $locale) {

            $data = $request->input($locale, []);

            SliderTranslation::updateOrCreate(
                [
                    'slider_id' => $slider->id,
                    'locale' => $locale,
                ],
                [
                    'title' => $data['title'] ?? null,
                    'subtitle' => $data['subtitle'] ?? null,
                    'description' => $data['description'] ?? null,
                ]
            );
        }
    }
}