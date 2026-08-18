@extends('frontend.layouts.master')

@section('title', $category->meta_title ?? $category->name)
@section('meta_description', $category->meta_description)

@section('content')
@include('frontend.partials.breadcrumb', [
    'title' => $category->name,
    'image' => $category->thumbnail ? asset('storage/' . $category->thumbnail->file_path) : null,
    'items' => $breadcrumbs
])

<div class="team-area default-padding bottom-less">
    <div class="container">
        <div class="team-items text-center">
            <div class="row">

                @forelse($products as $product)
                    @php
                        $productUrl = $product->category
                            ? route('frontend.post.show', [$product->category->slug, $product->slug])
                            : url($product->slug);

                        $image = $product->thumbnail
                            ? asset('storage/' . $product->thumbnail->file_path)
                            : asset('assets/frontend/img/blog/1.jpg');
                    @endphp

                    <div class="single-item col-lg-3 col-md-4">
                        <div class="item">

                            <div class="thumb">
                                <a href="{{ $productUrl }}">
                                    <img src="{{ $image }}" alt="{{ $product->name }}">
                                </a>
                            </div>

                            <div class="info">
                                <h4>
                                    <a href="{{ $productUrl }}">
                                        {{ $product->name }}
                                    </a>
                                </h4>

                                @if($product->category)
                                    <span class="product-category">
                                        {{ $product->category->name }}
                                    </span>
                                @endif
                            </div>

                        </div>
                    </div>
                @empty
                    <div class="col-lg-12">
                        <p>Chưa có sản phẩm nào trong danh mục này.</p>
                    </div>
                @endforelse

            </div>

            @if($products->hasPages())
                <div class="mt-4 text-center">
                    {{ $products->links() }}
                </div>
            @endif

        </div>
    </div>
</div>

@endsection