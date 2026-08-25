<?php

namespace App\Services;

use App\Models\Setting;

class TrackingService
{
    /**
     * Lấy cấu hình tracking toàn website.
     *
     * Tracking là global, không phụ thuộc locale EN / VI.
     */
    public static function get(): array
    {
        return [
            'google_analytics' => self::clean(
                Setting::getByKey('google_analytics')
            ),

            'google_tag_manager' => self::clean(
                Setting::getByKey('google_tag_manager')
            ),

            'meta_pixel' => self::clean(
                Setting::getByKey('meta_pixel')
            ),

            'custom_head_script' => Setting::getByKey(
                'custom_head_script'
            ),

            'custom_body_script' => Setting::getByKey(
                'custom_body_script'
            ),
        ];
    }

    /**
     * Loại bỏ khoảng trắng thừa.
     */
    protected static function clean($value): ?string
    {
        if (!$value) {
            return null;
        }

        return trim((string) $value);
    }
}