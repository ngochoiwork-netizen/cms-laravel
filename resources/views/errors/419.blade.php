<!DOCTYPE html>
<html lang="{{ request()->is('vi/*') || request()->is('vi') ? 'vi' : 'en' }}">

@php
    $isVi = request()->is('vi/*') || request()->is('vi');
@endphp

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        {{ $isVi
            ? 'Phiên Làm Việc Đã Hết Hạn | Senverse'
            : 'Page Expired | Senverse'
        }}
    </title>

    <meta name="robots"
          content="noindex, nofollow">

    <link rel="icon"
          href="{{ asset('assets/frontend/images/favicon.png') }}">

    {{-- Bootstrap --}}
    <link rel="stylesheet"
          href="{{ asset('assets/frontend/css/bootstrap.min.css') }}">

    {{-- Font Awesome --}}
    <link rel="stylesheet"
          href="{{ asset('assets/frontend/css/fontawesome.css') }}">

    {{-- Main Frontend CSS --}}
    <link rel="stylesheet"
          href="{{ asset('assets/frontend/css/style.css') }}">

    <style>

        /*
        |--------------------------------------------------------------------------
        | Error Page
        |--------------------------------------------------------------------------
        */

        body {
            margin: 0;
            background: #f7f9fc;
        }

        .senverse-error-page {
            position: relative;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            padding: 80px 0;
            background:
                radial-gradient(
                    circle at 20% 20%,
                    rgba(102, 137, 204, 0.12),
                    transparent 35%
                ),
                radial-gradient(
                    circle at 80% 80%,
                    rgba(27, 54, 93, 0.10),
                    transparent 35%
                ),
                #f7f9fc;
        }

        /*
        |--------------------------------------------------------------------------
        | Decorative Background
        |--------------------------------------------------------------------------
        */

        .senverse-error-page::before {
            content: "";
            position: absolute;
            width: 420px;
            height: 420px;
            border-radius: 50%;
            background: rgba(102, 137, 204, 0.08);
            top: -180px;
            right: -120px;
        }

        .senverse-error-page::after {
            content: "";
            position: absolute;
            width: 320px;
            height: 320px;
            border-radius: 50%;
            background: rgba(27, 54, 93, 0.06);
            bottom: -140px;
            left: -100px;
        }

        /*
        |--------------------------------------------------------------------------
        | Wrapper
        |--------------------------------------------------------------------------
        */

        .senverse-error-wrapper {
            position: relative;
            z-index: 2;
            max-width: 760px;
            margin: 0 auto;
            text-align: center;
            padding: 55px 50px;
            border-radius: 24px;
            background: #ffffff;
            box-shadow:
                0 20px 70px rgba(27, 54, 93, 0.10);
        }

        /*
        |--------------------------------------------------------------------------
        | Error Code
        |--------------------------------------------------------------------------
        */

        .senverse-error-code {
            margin: 0;
            font-size: clamp(110px, 16vw, 190px);
            line-height: 0.85;
            font-weight: 800;
            letter-spacing: -10px;

            background: linear-gradient(
                135deg,
                #6689cc 0%,
                #1b365d 100%
            );

            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;

            opacity: 0.95;
        }

        /*
        |--------------------------------------------------------------------------
        | Label
        |--------------------------------------------------------------------------
        */

        .senverse-error-label {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;

            margin-bottom: 20px;
            padding: 8px 16px;

            font-size: 13px;
            font-weight: 600;
            letter-spacing: 0.08em;
            text-transform: uppercase;

            color: #1b365d;

            background: rgba(102, 137, 204, 0.12);
            border-radius: 999px;
        }

        /*
        |--------------------------------------------------------------------------
        | Title
        |--------------------------------------------------------------------------
        */

        .senverse-error-title {
            margin-top: 30px;
            margin-bottom: 18px;

            font-size: clamp(30px, 4vw, 46px);
            line-height: 1.2;
            font-weight: 700;

            color: #1b365d;
        }

        /*
        |--------------------------------------------------------------------------
        | Description
        |--------------------------------------------------------------------------
        */

        .senverse-error-description {
            max-width: 600px;
            margin: 0 auto 32px;

            font-size: 17px;
            line-height: 1.8;

            color: #6b7280;
        }

        /*
        |--------------------------------------------------------------------------
        | Actions
        |--------------------------------------------------------------------------
        */

        .senverse-error-actions {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-wrap: wrap;
            gap: 14px;
        }

        .senverse-error-home {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;

            min-height: 52px;
            padding: 0 28px;

            border-radius: 8px;

            font-size: 15px;
            font-weight: 600;

            color: #ffffff;
            background: #1b365d;

            transition: all 0.25s ease;
        }

        .senverse-error-home:hover {
            color: #ffffff;
            background: #6689cc;
            transform: translateY(-2px);
            box-shadow:
                0 10px 25px rgba(27, 54, 93, 0.20);
        }

        .senverse-error-back {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;

            min-height: 52px;
            padding: 0 28px;

            border-radius: 8px;
            border: 1px solid #dde4ee;

            font-size: 15px;
            font-weight: 600;

            color: #1b365d;
            background: #ffffff;

            transition: all 0.25s ease;
        }

        .senverse-error-back:hover {
            color: #1b365d;
            border-color: #6689cc;
            background: #f4f7fc;
            transform: translateY(-2px);
        }

        /*
        |--------------------------------------------------------------------------
        | Logo
        |--------------------------------------------------------------------------
        */

        .senverse-error-logo {
            margin-bottom: 35px;
        }

        .senverse-error-logo img {
            width: auto;
            max-width: 180px;
            max-height: 60px;
        }

        /*
        |--------------------------------------------------------------------------
        | Responsive
        |--------------------------------------------------------------------------
        */

        @media (max-width: 767px) {

            .senverse-error-page {
                padding: 30px 15px;
            }

            .senverse-error-wrapper {
                padding: 45px 22px;
                border-radius: 18px;
            }

            .senverse-error-code {
                letter-spacing: -6px;
            }

            .senverse-error-title {
                margin-top: 25px;
            }

            .senverse-error-description {
                font-size: 15px;
            }

            .senverse-error-actions {
                flex-direction: column;
            }

            .senverse-error-home,
            .senverse-error-back {
                width: 100%;
            }
        }

    </style>

</head>

<body>

    <main class="senverse-error-page">

        <div class="container">

            <div class="senverse-error-wrapper">

                {{-- Logo --}}
                <div class="senverse-error-logo">

                    <a href="{{ $isVi ? '/vi' : '/' }}">

                        <img
                            src="{{ setting_media('logo') }}"
                            alt="Senverse">

                    </a>

                </div>

                {{-- Label --}}
                <div class="senverse-error-label">

                    <i class="fa-regular fa-clock"></i>

                    {{ $isVi
                        ? 'Phiên Đã Hết Hạn'
                        : 'Session Expired'
                    }}

                </div>

                {{-- Code --}}
                <h1 class="senverse-error-code">
                    419
                </h1>

                {{-- Title --}}
                <h2 class="senverse-error-title">

                    {{ $isVi
                        ? 'Phiên Làm Việc Đã Hết Hạn'
                        : 'Page Expired'
                    }}

                </h2>

                {{-- Description --}}
                <p class="senverse-error-description">

                    {{ $isVi
                        ? 'Phiên làm việc của bạn đã hết hạn. Vui lòng tải lại trang và thực hiện lại thao tác.'
                        : 'Your session has expired. Please refresh the page and try your action again.'
                    }}

                </p>

                {{-- Actions --}}
                <div class="senverse-error-actions">

                    {{-- Try Again --}}
                    <a
                        href="javascript:location.reload()"
                        class="senverse-error-home"
                    >
                        <i class="fa-regular fa-rotate-right"></i>

                        {{ $isVi
                            ? 'Tải Lại Trang'
                            : 'Refresh Page'
                        }}

                    </a>

                    {{-- Back Home --}}
                    <a
                        href="{{ $isVi ? '/vi' : '/' }}"
                        class="senverse-error-back"
                    >
                        <i class="fa-regular fa-house"></i>

                        {{ $isVi
                            ? 'Về Trang Chủ'
                            : 'Back to Home'
                        }}

                    </a>

                </div>

            </div>

        </div>

    </main>

</body>

</html>