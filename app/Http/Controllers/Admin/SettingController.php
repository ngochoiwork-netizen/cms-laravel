<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\SettingTranslation;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SettingController extends Controller
{
    protected $view = [];

    public function __construct()
    {
        set_time_limit(0);
        ini_set('memory_limit', '6144M');
    }

    public function settings()
    {
        $settings = Setting::with('translations')
            ->orderBy('group')
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get()
            ->groupBy('group');

        $media = Media::latest()->get();

        $this->view['settings'] = $settings;
        $this->view['media'] = $media;
        $this->view['locales'] = ['vi', 'en'];

        return view('admin.setting.setting', $this->view);
    }

    public function update(Request $request)
    {
        $settings = Setting::all();

        foreach ($settings as $setting) {

            foreach (['vi', 'en'] as $locale) {

                $inputName = 'settings.' . $setting->id . '.' . $locale;

                if ($setting->type === 'boolean') {
                    $value = $request->has($inputName) ? '1' : '0';
                } else {
                    $value = $request->input($inputName);
                }

                SettingTranslation::updateOrCreate(
                    [
                        'setting_id' => $setting->id,
                        'locale' => $locale,
                    ],
                    [
                        'value' => $value,
                    ]
                );
            }
        }

        Cache::forget('settings.all');

        return back()->with('success', 'Cập nhật cài đặt thành công.');
    }
}