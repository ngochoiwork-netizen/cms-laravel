@extends('frontend.layouts.master')

@section('content')

@include('frontend.partials.breadcrumb', [
    'title' => 'Liên hệ',
    'image' => asset('assets/img/banner/11.jpg'),
    'items' => $breadcrumbs
])

<!-- Start Contact -->
<div class="contact-area overflow-hidden default-padding bg-gray">
    <div class="container">
        <div class="row">

            <div class="col-lg-6 contact-form-box">
                <div class="content">
                    <div class="heading">
                        <h2 class="title">Cần tư vấn?</h2>
                        <p>Liên hệ với chúng tôi để được hỗ trợ và tư vấn giải pháp phù hợp.</p>
                    </div>

                    <form action="#" method="POST" class="contact-form">
                        @csrf

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input class="form-control" name="name" placeholder="Họ và tên" type="text">
                                    <span class="alert-error"></span>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input class="form-control" name="email" placeholder="Email" type="email">
                                    <span class="alert-error"></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input class="form-control" name="phone" placeholder="Số điện thoại" type="text">
                                    <span class="alert-error"></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group comments">
                                    <textarea class="form-control" name="message" placeholder="Nội dung cần tư vấn"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <button type="submit">
                                    Gửi yêu cầu tư vấn
                                </button>
                            </div>
                        </div>

                        <div class="col-md-12 alert-notification">
                            <div id="message" class="alert-msg"></div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-lg-6 info">
                <div class="contact-tabs">

                    <ul class="nav nav-tabs" id="contactTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active"
                                    id="tab_1"
                                    data-bs-toggle="tab"
                                    data-bs-target="#tabs_1"
                                    type="button"
                                    role="tab"
                                    aria-controls="tabs_1"
                                    aria-selected="true">
                                Thông tin liên hệ
                            </button>
                        </li>
                    </ul>

                    <div class="tab-content" id="contactTabContent">

                        <div class="tab-pane fade show active"
                             id="tabs_1"
                             role="tabpanel"
                             aria-labelledby="tab_1">

                            <ul>
                                <li>
                                    <div class="icon">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </div>
                                    <div class="info">
                                        <p>
                                            <strong>Địa chỉ</strong>
                                            {{ setting('address', 'Đang cập nhật') }}
                                        </p>
                                    </div>
                                </li>

                                <li>
                                    <div class="icon">
                                        <i class="fas fa-envelope-open"></i>
                                    </div>
                                    <div class="info">
                                        <p>
                                            <strong>Email</strong>
                                            {{ setting('email', 'Đang cập nhật') }}
                                        </p>
                                    </div>
                                </li>

                                <li>
                                    <div class="icon">
                                        <i class="fas fa-phone"></i>
                                    </div>
                                    <div class="info">
                                        <p>
                                            <strong>Hotline</strong>
                                            {{ setting('hotline', 'Đang cập nhật') }}
                                        </p>
                                    </div>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- End Contact Area -->

@endsection