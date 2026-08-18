<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Locale;
use App\Models\Media;
use App\Models\Setting;
use App\Models\SettingTranslation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Settings Page
    |--------------------------------------------------------------------------
    |
    | Hiển thị toàn bộ setting theo từng group.
    |
    | Ví dụ:
    |
    | general
    | seo
    | social
    | schema
    | tracking
    | script
    |
    */

    public function settings()
    {
        /*
        |--------------------------------------------------------------------------
        | Settings
        |--------------------------------------------------------------------------
        |
        | Load setting + translations.
        |
        | Sau đó group theo field "group".
        |
        */

        $settings = Setting::query()
            ->with('translations')
            ->orderBy('group')
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get()
            ->groupBy('group');

        /*
        |--------------------------------------------------------------------------
        | Locales
        |--------------------------------------------------------------------------
        |
        | Không hard-code vi/en.
        |
        | Sau này nếu thêm:
        |
        | es
        | ja
        | ko
        |
        | Admin sẽ tự động hỗ trợ.
        |
        */

        $locales = Locale::query()
            ->active()
            ->orderByDesc('is_default')
            ->orderBy('id')
            ->get();

        /*
        |--------------------------------------------------------------------------
        | Media
        |--------------------------------------------------------------------------
        |
        | Dùng cho các setting loại image:
        |
        | logo
        | favicon
        | default_og_image
        |
        | Giới hạn số lượng để tránh load toàn bộ Media Library.
        |
        */

        $media = Media::query()
            ->latest()
            ->limit(100)
            ->get();

        return view('admin.setting.setting', [
            'settings' => $settings,
            'locales' => $locales,
            'media' => $media,
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Update Settings
    |--------------------------------------------------------------------------
    |
    | Cập nhật toàn bộ setting từ form Admin.
    |
    */

    public function update(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | Validation
        |--------------------------------------------------------------------------
        |
        | settings phải là array.
        |
        */

        $request->validate([
            'settings' => ['nullable', 'array'],
        ]);

        /*
        |--------------------------------------------------------------------------
        | Locales
        |--------------------------------------------------------------------------
        |
        | Lấy danh sách locale đang active.
        |
        */

        $locales = Locale::query()
            ->active()
            ->pluck('code');

        /*
        |--------------------------------------------------------------------------
        | Settings
        |--------------------------------------------------------------------------
        */

        $settings = Setting::query()
            ->active()
            ->get();

        /*
        |--------------------------------------------------------------------------
        | Transaction
        |--------------------------------------------------------------------------
        |
        | Nếu có lỗi giữa quá trình update:
        |
        | toàn bộ thay đổi sẽ rollback.
        |
        */

        DB::transaction(function () use (
            $request,
            $settings,
            $locales
        ) {

            foreach ($settings as $setting) {

                foreach ($locales as $locale) {

                    /*
                    |--------------------------------------------------------------------------
                    | Input Name
                    |--------------------------------------------------------------------------
                    |
                    | Ví dụ:
                    |
                    | settings.1.en
                    | settings.1.vi
                    |
                    */

                    $inputName =
                        'settings.'
                        . $setting->id
                        . '.'
                        . $locale;

                    /*
                    |--------------------------------------------------------------------------
                    | Boolean
                    |--------------------------------------------------------------------------
                    |
                    | Checkbox không checked sẽ không được submit.
                    |
                    | Vì vậy:
                    |
                    | checked   = 1
                    | unchecked = 0
                    |
                    */

                    if ($setting->type === 'boolean') {
                        $value = $request->has($inputName)
                            ? '1'
                            : '0';
                    } else {
                        $value = $request->input($inputName);
                    }

                    /*
                    |--------------------------------------------------------------------------
                    | Update Translation
                    |--------------------------------------------------------------------------
                    */

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
        });

        /*
        |--------------------------------------------------------------------------
        | Clear Cache
        |--------------------------------------------------------------------------
        |
        | Xóa cache setting để frontend lấy dữ liệu mới.
        |
        */

        Cache::forget('settings.all');

        return back()->with(
            'success',
            'Cập nhật cài đặt thành công.'
        );
    }
}