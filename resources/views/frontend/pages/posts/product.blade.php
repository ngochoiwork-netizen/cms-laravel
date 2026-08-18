@extends('frontend.layouts.master')

@section('content')

@include('frontend.partials.breadcrumb', [
    'title' => $product->name,
    'image' => $category->thumbnail ? asset('storage/' . $category->thumbnail->file_path) : null,
    'items' => $breadcrumbs
])

<div class="blog-area single full-blog right-sidebar full-blog default-padding">
    <div class="container">
        <div class="blog-items">
            <div class="row">

                <div class="blog-content wow fadeInUp col-lg-8 col-md-12">
                    <div class="item">
                        <div class="blog-item-box">

                            <div class="thumb">
                                <img src="{{ $product->thumbnail ? asset('storage/'.$product->thumbnail->file_path) : asset('assets/img/blog/22.jpg') }}"
                                     alt="{{ $product->name }}">
                            </div>

                            <div class="info">

                                @if($product->category)
                                    <div class="cats">
                                        <a href="{{ route('frontend.resolve', $product->category->slug) }}">
                                            {{ $product->category->name }}
                                        </a>
                                    </div>
                                @endif

                                <h2>{{ $product->name }}</h2>

                                @if($product->sku || $product->brand || $product->model || $product->warranty)
                                    <ul class="product-meta">
                                        @if($product->sku)
                                            <li><strong>SKU:</strong> {{ $product->sku }}</li>
                                        @endif

                                        @if($product->brand)
                                            <li><strong>Thương hiệu:</strong> {{ $product->brand }}</li>
                                        @endif

                                        @if($product->model)
                                            <li><strong>Model:</strong> {{ $product->model }}</li>
                                        @endif

                                        @if($product->warranty)
                                            <li><strong>Bảo hành:</strong> {{ $product->warranty }}</li>
                                        @endif
                                    </ul>
                                @endif
                                @if(!empty($product->features))
                                    <h4>Tính năng nổi bật</h4>

                                    <ul>
                                        @foreach($product->features as $feature)
                                            <li>{{ $feature }}</li>
                                        @endforeach
                                    </ul>
                                @endif

                                @if(!empty($product->specifications))
                                    <h4>Thông số kỹ thuật</h4>

                                    <table class="table table-bordered product-specifications">
                                        <tbody>
                                            @foreach($product->specifications as $spec)
                                                <tr>
                                                    <th>{{ $spec['key'] ?? '' }}</th>
                                                    <td>{{ $spec['value'] ?? '' }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @endif
                                @if($product->description)
                                    {!! $product->description !!}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 sidebar">


                    @if(isset($relatedProducts) && $relatedProducts->count())
                        <div class="sidebar-item recent-post">
                            <div class="title">
                                <h4>Sản phẩm liên quan</h4>
                            </div>

                            <ul>
                                @foreach($relatedProducts as $item)
                                    <li>
                                        <div class="thumb">
                                            <a href="{{ route('frontend.product.show', [
                                                'categorySlug' => $item->category->slug,
                                                'productSlug' => $item->slug
                                            ]) }}">
                                                <img src="{{ $item->thumbnail ? asset('storage/'.$item->thumbnail->file_path) : asset('assets/img/blog/22.jpg') }}"
                                                     alt="{{ $item->name }}">
                                            </a>
                                        </div>

                                        <div class="info">
                                            <a href="{{ route('frontend.product.show', [
                                                'categorySlug' => $item->category->slug,
                                                'productSlug' => $item->slug
                                            ]) }}">
                                                {{ $item->name }}
                                            </a>

                                            @if($item->category)
                                                <div class="meta-title">
                                                    <span>{{ $item->category->name }}</span>
                                                </div>
                                            @endif
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if(isset($sidebarProductCategories) && $sidebarProductCategories->count())
                        <div class="sidebar-item category">
                            <div class="title">
                                <h4>Danh mục sản phẩm</h4>
                            </div>

                            <div class="sidebar-info">
                                <ul>
                                    @foreach($sidebarProductCategories as $cat)
                                        <li>
                                            <a href="{{ route('frontend.resolve', $cat->slug) }}">
                                                {{ $cat->name }}
                                                <span>({{ $cat->products_count }})</span>
                                            </a>

                                            @if($cat->children->count())
                                                <ul class="children">
                                                    @foreach($cat->children as $child)
                                                        <li>
                                                            <a href="{{ route('frontend.resolve', $child->slug) }}">
                                                                — {{ $child->name }}
                                                                <span>({{ $child->products_count }})</span>
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif

                    <div class="sidebar-item social-sidebar">
                        <div class="title">
                            <h4>Follow us</h4>
                        </div>

                        <div class="sidebar-info">
                            <ul>
                                @if(setting('facebook'))
                                    <li class="facebook">
                                        <a href="{{ setting('facebook') }}" target="_blank">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                    </li>
                                @endif

                                @if(setting('youtube'))
                                    <li class="youtube">
                                        <a href="{{ setting('youtube') }}" target="_blank">
                                            <i class="fab fa-youtube"></i>
                                        </a>
                                    </li>
                                @endif

                                @if(setting('tiktok'))
                                    <li class="tiktok">
                                        <a href="{{ setting('tiktok') }}" target="_blank">
                                            <i class="fab fa-tiktok"></i>
                                        </a>
                                    </li>
                                @endif

                                @if(setting('zalo'))
                                    <li class="zalo">
                                        <a href="{{ setting('zalo') }}" target="_blank">
                                            <img src="{{ asset('assets/img/icon/zalo.png') }}" width="16">
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>

@endsection