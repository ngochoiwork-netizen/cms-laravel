@if (!empty($seo['schema']))
    @foreach ($seo['schema'] as $schema)
        <script type="application/ld+json">
            {!! json_encode(
                $schema,
                JSON_UNESCAPED_UNICODE |
                JSON_UNESCAPED_SLASHES |
                JSON_PRETTY_PRINT
            ) !!}
        </script>
    @endforeach
@endif