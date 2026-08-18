<?php

namespace Database\Seeders;

use App\Models\Locale;
use Illuminate\Database\Seeder;

class LocaleSeeder extends Seeder
{
    public function run(): void
    {
        $locales = [
            [
                'code' => 'en',
                'name' => 'English',
                'is_default' => true,
                'is_active' => true,
            ],
            [
                'code' => 'vi',
                'name' => 'Tiếng Việt',
                'is_default' => false,
                'is_active' => true,
            ],
        ];

        foreach ($locales as $locale) {
            Locale::updateOrCreate(
                [
                    'code' => $locale['code'],
                ],
                $locale
            );
        }
    }
}