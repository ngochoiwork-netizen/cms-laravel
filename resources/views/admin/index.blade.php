@extends('admin.layouts.master-layouts')

@section('content')

<h3>Dashboard</h3>
<br>

<div class="row">

    <div class="col-sm-3 col-xs-6">
        <a href="{{ route('admin.posts.index') }}">
            <div class="tile-stats tile-red">
                <div class="icon"><i class="entypo-doc-text"></i></div>
                <div class="num">{{ $postCount ?? 0 }}</div>
                <h3>Bài viết</h3>
                <p>Tổng số bài viết trong CMS</p>
            </div>
        </a>
    </div>

    <div class="col-sm-3 col-xs-6">
        <a href="{{ route('admin.products.index') }}">
            <div class="tile-stats tile-green">
                <div class="icon"><i class="entypo-bag"></i></div>
                <div class="num">{{ $productCount ?? 0 }}</div>
                <h3>Sản phẩm</h3>
                <p>Tổng số sản phẩm</p>
            </div>
        </a>
    </div>

    <div class="clear visible-xs"></div>

    <div class="col-sm-3 col-xs-6">
        <a href="{{ route('admin.categories.index') }}">
            <div class="tile-stats tile-aqua">
                <div class="icon"><i class="entypo-flow-tree"></i></div>
                <div class="num">{{ $categoryCount ?? 0 }}</div>
                <h3>Danh mục</h3>
                <p>Danh mục bài viết / sản phẩm</p>
            </div>
        </a>
    </div>

    <div class="col-sm-3 col-xs-6">
        <a href="{{ route('admin.media.index') }}">
            <div class="tile-stats tile-blue">
                <div class="icon"><i class="entypo-picture"></i></div>
                <div class="num">{{ $mediaCount ?? 0 }}</div>
                <h3>Media</h3>
                <p>Hình ảnh đã upload</p>
            </div>
        </a>
    </div>

</div>

<br>

<div class="row">

    <div class="col-sm-3 col-xs-6">
        <a href="{{ route('admin.sliders.index') }}">
            <div class="tile-stats tile-purple">
                <div class="icon"><i class="entypo-images"></i></div>
                <div class="num">{{ $sliderCount ?? 0 }}</div>
                <h3>Slider</h3>
                <p>Banner / slider website</p>
            </div>
        </a>
    </div>

    <div class="col-sm-3 col-xs-6">
        <a href="{{ route('admin.users.index') }}">
            <div class="tile-stats tile-orange">
                <div class="icon"><i class="entypo-users"></i></div>
                <div class="num">{{ $userCount ?? 0 }}</div>
                <h3>User</h3>
                <p>Tài khoản quản trị</p>
            </div>
        </a>
    </div>

    <div class="col-sm-3 col-xs-6">
        <div class="tile-stats tile-gray">
            <div class="icon"><i class="entypo-check"></i></div>
            <div class="num">{{ $activeSliderCount ?? 0 }}</div>
            <h3>Slider hiển thị</h3>
            <p>Slider đang active</p>
        </div>
    </div>

    <div class="col-sm-3 col-xs-6">
        <div class="tile-stats tile-cyan">
            <div class="icon"><i class="entypo-eye"></i></div>
            <div class="num">{{ $hiddenProductCount ?? 0 }}</div>
            <h3>Sản phẩm ẩn</h3>
            <p>Cần kiểm tra trạng thái</p>
        </div>
    </div>

</div>

<br>

<div class="row">

    <div class="col-sm-12">

        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="panel-title">Thao tác nhanh</div>
            </div>

            <div class="panel-body">

                <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">
                    <i class="entypo-plus"></i> Thêm bài viết
                </a>

                <a href="{{ route('admin.products.create') }}" class="btn btn-success">
                    <i class="entypo-plus"></i> Thêm sản phẩm
                </a>

                <a href="{{ route('admin.categories.create') }}" class="btn btn-info">
                    <i class="entypo-plus"></i> Thêm danh mục
                </a>

                <a href="{{ route('admin.sliders.create') }}" class="btn btn-warning">
                    <i class="entypo-plus"></i> Thêm slider
                </a>

                <a href="{{ route('admin.media.index') }}" class="btn btn-default">
                    <i class="entypo-picture"></i> Media Library
                </a>

                <a href="{{ route('admin.settings.index') }}" class="btn btn-default">
                    <i class="entypo-cog"></i> Cài đặt website
                </a>

            </div>
        </div>

    </div>

</div>

<div class="row">

    <div class="col-sm-6">

        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="panel-title">Bài viết mới nhất</div>
            </div>

            <table class="table table-bordered table-responsive">
                <thead>
                    <tr>
                        <th>Tiêu đề</th>
                        <th width="120">Ngày tạo</th>
                        <th width="80">Sửa</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($latestPosts ?? [] as $post)
                        <tr>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->created_at ? $post->created_at->format('d/m/Y') : '-' }}</td>
                            <td>
                                <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-info btn-sm">
                                    Sửa
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">Chưa có bài viết.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>

    <div class="col-sm-6">

        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="panel-title">Sản phẩm mới nhất</div>
            </div>

            <table class="table table-bordered table-responsive">
                <thead>
                    <tr>
                        <th>Tên sản phẩm</th>
                        <th width="120">Ngày tạo</th>
                        <th width="80">Sửa</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($latestProducts ?? [] as $product)
                        <tr>
                            <td>{{ $product->name ?? $product->title }}</td>
                            <td>{{ $product->created_at ? $product->created_at->format('d/m/Y') : '-' }}</td>
                            <td>
                                <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-info btn-sm">
                                    Sửa
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">Chưa có sản phẩm.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>

</div>

<div class="row">

    <div class="col-sm-12">

        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="panel-title">Media mới upload</div>
            </div>

            <div class="panel-body">
                <div class="row">
                    @forelse($latestMedia ?? [] as $item)
                        <div class="col-sm-2 col-xs-4">
                            <div style="border:1px solid #eee; padding:5px; margin-bottom:15px;">
                                <img src="{{ asset('storage/' . $item->file_path) }}"
                                     style="width:100%; height:100px; object-fit:cover;">

                                <div style="font-size:12px; margin-top:5px; height:34px; overflow:hidden;">
                                    {{ $item->file_name }}
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-sm-12">
                            Chưa có media.
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

    </div>

</div>

@endsection