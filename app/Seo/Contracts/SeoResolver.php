<?php

namespace App\Seo\Contracts;

interface SeoResolver
{
    /**
     * Resolver này có hỗ trợ model được truyền vào hay không.
     */
    public function supports(object $model): bool;

    /**
     * Chuẩn hóa dữ liệu SEO của model.
     */
    public function resolve(
        object $model,
        string $locale
    ): array;
}