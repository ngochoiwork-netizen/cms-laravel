<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>404 - Không tìm thấy trang</title>
    <meta name="description" content="Trang bạn truy cập không tồn tại hoặc đã được thay đổi đường dẫn.">

    <link rel="shortcut icon" href="{{ asset('assets/frontend/img/favicon.png') }}" type="image/x-icon">

    <link href="{{ asset('assets/frontend/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/css/themify-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/css/flaticon-set.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/css/magnific-popup.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/css/owl.theme.default.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/css/validnavs.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/css/helper.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/css/responsive.css') }}" rel="stylesheet">
</head>

<body>

    <div class="breadcrumb-area shadow theme bg-fixed text-light"
         style="background-image: url({{ asset('storage/media/PTK2pozzKRvSkO79z9gpAs7Jdr5HTJfDpX7934oM.png') }});">
        <div class="container">
            <div class="row align-center">
                <div class="col-lg-6">
                    <h2>Không tìm thấy trang</h2>
                </div>
                <div class="col-lg-6 text-end">
                    <ul class="breadcrumb">
                        <li>
                            <a href="{{ url('/') }}">
                                <i class="fas fa-home"></i> Trang chủ
                            </a>
                        </li>
                        <li class="active">404</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="error-page-area text-center default-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="error-box">
                        <h1>404</h1>
                        <h2>Trang không tồn tại</h2>
                        <p>
                            Rất tiếc, trang bạn đang truy cập có thể đã bị xóa, đổi đường dẫn hoặc không còn tồn tại.
                        </p>

                        <a class="btn btn-theme effect btn-md" href="{{ url('/') }}">
                            Quay về trang chủ
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-dark text-light">
        <div class="fixed-shape">
            <img src="{{ asset('assets/frontend/img/map.svg') }}" alt="Shape">
        </div>

        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <p>Copyright © {{ date('Y') }} ATEN Việt Nam. All Rights Reserved.</p>
                    </div>
                    <div class="col-md-6 text-end link">
                        <ul>
                            <li><a href="{{ url('/') }}">Trang chủ</a></li>
                            <li><a href="{{ url('/gioi-thieu') }}">Giới thiệu</a></li>
                            <li><a href="{{ url('/lien-he') }}">Liên hệ</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="{{ asset('assets/frontend/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/validnavs.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/main.js') }}"></script>

</body>
</html>