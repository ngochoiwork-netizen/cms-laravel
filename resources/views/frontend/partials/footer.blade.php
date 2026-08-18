@php
    use App\Models\Media;

    $logo = asset('assets/frontend/img/logo.png');

    if (setting('site_logo')) {
        $media = Media::find(setting('site_logo'));
        if ($media) {
            $logo = asset('storage/' . $media->path);
        }
    }

    $companyLinks = [
        ['title' => 'Giới thiệu', 'url' => url('/gioi-thieu')],
        ['title' => 'Giải pháp', 'url' => url('/giai-phap')],
        ['title' => 'Sản phẩm', 'url' => url('/san-pham')],
        ['title' => 'Dự án', 'url' => url('/du-an')],
        ['title' => 'Liên hệ', 'url' => url('/lien-he')],
    ];

    $solutionCategory = isset($headerCategories)
        ? $headerCategories->where('slug', 'giai-phap')->first()
        : null;
@endphp

<footer>
    <div class="fixed-shape">
        <img src="{{ asset('assets/frontend/img/map.svg') }}" alt="Shape">
    </div>

    <div class="container">
        <div class="f-items default-padding">
            <div class="row">

                <div class="col-lg-4 col-md-6 item">
                    <div class="f-item about">
                        <img src="{{ $logo }}" alt="{{ setting('site_name', 'ATEN Việt Nam') }}">
                        <p>
                            {{ setting('site_description', 'ATEN Việt Nam cung cấp thiết bị ATEN chính hãng và giải pháp KVM, AV, USB, nguồn điện cho doanh nghiệp.') }}
                        </p>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6 item">
                    <div class="f-item link">
                        <h4 class="widget-title">Công ty</h4>
                        <ul>
                            @foreach($companyLinks as $link)
                                <li>
                                    <a href="{{ $link['url'] }}">{{ $link['title'] }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6 item">
                    <div class="f-item link">
                        <h4 class="widget-title">Giải pháp</h4>
                        <ul>
                            @forelse($solutionCategory?->children ?? [] as $item)
                                <li>
                                    <a href="{{ url($item->slug) }}">{{ $item->name }}</a>
                                </li>
                            @empty
                                <li><a href="{{ url('/giai-phap') }}">Xem giải pháp</a></li>
                            @endforelse
                        </ul>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 item">
                    <div class="f-item">
                        <h4 class="widget-title">Thông tin liên hệ</h4>
                        <div class="address">
                            <ul>
                                <li>
                                    <strong>Email:</strong>
                                    <a href="mailto:{{ setting('site_email', 'sales@atenvn.com') }}">
                                        {{ setting('site_email', 'sales@atenvn.com') }}
                                    </a>
                                </li>

                                <li>
                                    <strong>Hotline:</strong>
                                    <a href="tel:{{ preg_replace('/\D+/', '', setting('site_phone', '0987687162')) }}">
                                        {{ setting('site_phone', '0987 687 162') }}
                                    </a>
                                </li>

                                @if(setting('site_address'))
                                    <li>
                                        <strong>Địa chỉ:</strong>
                                        {{ setting('site_address') }}
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p>
                        Copyright © {{ date('Y') }} {{ setting('site_name', 'ATEN Việt Nam') }}. All Rights Reserved.
                    </p>
                </div>

                <div class="col-md-6 text-end link">
                    <ul>
                        <li><a href="{{ url('/chinh-sach') }}">Chính sách</a></li>
                        <li><a href="{{ url('/bao-mat') }}">Bảo mật</a></li>
                        <li><a href="{{ url('/ho-tro') }}">Hỗ trợ</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>