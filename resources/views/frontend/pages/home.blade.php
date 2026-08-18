@extends('frontend.layouts.master')

@section('title', 'ATEN Việt Nam')
@section('meta_description', 'Giải pháp KVM, AV, IT chính hãng')

@section('content')

    <!-- Start Banner -->
	<div class="banner-area border-shadow text-center content-less text-large">
	    <div id="bootcarousel" class="carousel text-light slide carousel-fade animate_text" data-bs-ride="carousel">

	        <div class="carousel-inner carousel-zoom">

	            @foreach($sliders as $key => $slider)
	                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">

	                    {{-- IMAGE --}}
	                    <div class="slider-thumb bg-cover"
	                         style="background-image: url('{{ $slider->image ? asset('storage/'.$slider->image->file_path) : asset('assets/frontend/img/banner/1.jpg') }}');">
	                    </div>

	                    <div class="box-table">
	                        <div class="box-cell shadow dark">
	                            <div class="container">
	                                <div class="row">
	                                    <div class="col-lg-8 offset-lg-2">
	                                        <div class="content">

	                                            {{-- TITLE --}}
	                                            <h2 data-animation="animated slideInRight">
	                                                {{ $slider->title ?? 'Giải pháp Kết nối & Quản lý' }}
	                                            </h2>

	                                            {{-- SUBTITLE --}}
	                                            @if($slider->subtitle)
	                                                <p data-animation="animated fadeInUp">
	                                                    {{ $slider->subtitle }}
	                                                </p>
	                                            @endif

	                                            {{-- BUTTON --}}
	                                            @if($slider->link)
	                                                <a data-animation="animated fadeInUp"
	                                                   class="btn circle btn-light border btn-md"
	                                                   href="{{ $slider->link }}">
	                                                    {{ $slider->button_text ?? 'Xem chi tiết' }}
	                                                </a>
	                                            @endif

	                                            {{-- VIDEO (optional) --}}
	                                            {{-- giữ lại nếu cần --}}
	                                            {{-- <a class="popup-youtube relative video-play-button" href="#">
	                                                <i class="fa fa-play"></i>
	                                            </a> --}}

	                                        </div>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>

	                </div>
	            @endforeach

	        </div>

	        {{-- CONTROL --}}
	        <button class="carousel-control-prev carousel-control left" type="button" data-bs-target="#bootcarousel" data-bs-slide="prev">
	            <i class="fa fa-angle-left"></i>
	        </button>

	        <button class="carousel-control-next carousel-control right" type="button" data-bs-target="#bootcarousel" data-bs-slide="next">
	            <i class="fa fa-angle-right"></i>
	        </button>

	    </div>
	</div>
	<!-- End Banner -->

	<!-- Start Features Area -->
	<div class="feature-area half-bg overflow-hidden default-padding-top">
	    <div class="container">
	        <div class="heading-left">
	            <div class="row align-center">
	                <div class="col-lg-6">
	                    <h5>ATEN Việt Nam</h5>
	                    <h2 class="title">
	                        Giải pháp kết nối và quản lý hệ thống IT/AV cho doanh nghiệp
	                    </h2>
	                </div>
	                <div class="col-lg-6">
	                    <p>
	                        ATEN cung cấp các giải pháp KVM, AV chuyên nghiệp, kết nối và quản lý thiết bị giúp doanh nghiệp vận hành hiệu quả,
	                        kiểm soát hệ thống tập trung và tối ưu hạ tầng công nghệ.
	                    </p>
	                </div>
	            </div>
	        </div>
	    </div>

	    <div class="container">
	        <div class="features-box text-light">
	            <div class="row">

	                @foreach($featureSolutions as $item)
	                    <div class="single-item col-lg-4 col-md-6">
	                        <div class="item">

	                            {{-- IMAGE --}}
	                            <img 
	                                src="{{ $item->thumbnail ? asset($item->thumbnail->path) : asset('assets/frontend/img/features/1.jpg') }}" 
	                                alt="{{ $item->name }}">

	                            <div class="overlay">
	                                <div class="info">

	                                    {{-- TITLE --}}
	                                    <h4>{{ $item->name }}</h4>

	                                    {{-- LINK --}}
	                                    <a href="{{ url($item->slug) }}">
	                                        <i class="fas fa-long-arrow-right"></i>
	                                    </a>

	                                </div>
	                            </div>

	                        </div>
	                    </div>
	                @endforeach

	            </div>
	        </div>
	    </div>
	</div>
	<!-- End Features Area -->

	<!-- Start Clients 
	============================================= -->
	<div class="clients-area bg-gray default-padding">
	    <div class="container">
	        <div class="row">
	            <div class="col-lg-12">
	                <div class="clients-carousel owl-carousel owl-theme">
	                    <a href="#"><img src="{{ asset('assets/frontend/img/clients/1.png') }}" alt="Doanh nghiệp"></a>
	                    <a href="#"><img src="{{ asset('assets/frontend/img/clients/2.png') }}" alt="Ngân hàng"></a>
	                    <a href="#"><img src="{{ asset('assets/frontend/img/clients/3.png') }}" alt="Giáo dục"></a>
	                    <a href="#"><img src="{{ asset('assets/frontend/img/clients/4.png') }}" alt="Y tế"></a>
	                    <a href="#"><img src="{{ asset('assets/frontend/img/clients/5.png') }}" alt="Sản xuất"></a>
	                    <a href="#"><img src="{{ asset('assets/frontend/img/clients/6.png') }}" alt="Data Center"></a>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
	<!-- End Clients Area -->

	<!-- Start Who We Area 
	============================================= -->
	<div class="who-we-area-area bg-dark text-light">
	    <div class="container-fluid">
	        <div class="who-we-area-box">
	            <div class="row">

	                <div class="col-lg-6 thumb bg-cover"
	                     style="background-image: url('{{ setting('home_mission_image') ? asset('storage/' . \App\Models\Media::find(setting('home_mission_image'))?->file_path) : asset('assets/frontend/img/banner/6.jpg') }}');">
	                </div>

	                <div class="col-lg-6 info">
	                    <div class="row">

	                        <div class="col-lg-6 col-md-6 item">
	                            <h4>{{ setting('home_mission_title', 'Sứ mệnh') }}</h4>
	                            <h2 class="text-blur">Mission</h2>
	                            <p>
	                                {{ setting('home_mission_content', 'Cung cấp thiết bị ATEN chính hãng và giải pháp kết nối IT/AV, giúp doanh nghiệp quản lý hệ thống hiệu quả, vận hành ổn định và tối ưu hạ tầng công nghệ.') }}
	                            </p>
	                            <a href="{{ url('/gioi-thieu') }}" class="btn circle btn-theme effect btn-sm">
	                                Tìm hiểu thêm <i class="fas fa-long-arrow-right"></i>
	                            </a>
	                        </div>

	                        <div class="col-lg-6 col-md-6 item">
	                            <h4>{{ setting('home_vision_title', 'Tầm nhìn') }}</h4>
	                            <h2 class="text-blur">Vision</h2>
	                            <p>
	                                {{ setting('home_vision_content', 'Trở thành đối tác giải pháp KVM, AV và quản lý hạ tầng IT đáng tin cậy hàng đầu tại Việt Nam, đồng hành cùng doanh nghiệp trong quá trình chuyển đổi số.') }}
	                            </p>
	                            <a href="{{ route('frontend.contact') }}" class="btn circle btn-light effect btn-sm">
	                                Liên hệ tư vấn <i class="fas fa-long-arrow-right"></i>
	                            </a>
	                        </div>

	                    </div>
	                </div>

	            </div>
	        </div>
	    </div>
	</div>
	<!-- End Who We Area Area -->

	<!-- Start Services 
		============================================= -->
		<div class="service-area default-padding bottom-less bg-cover">
		    <div class="container">
		        <div class="row">
		            <div class="col-lg-8 offset-lg-2">
		                <div class="site-heading text-center">
		                    <h4>Dịch vụ cung cấp</h4>
		                    <h2 class="title">Chúng tôi mang đến giải pháp toàn diện</h2>
		                    <p>
		                        Tại ATEN Việt Nam, chúng tôi không chỉ cung cấp giải pháp, mà còn đồng hành cùng khách hàng
		                        để tối ưu hệ thống và nâng cao hiệu quả vận hành.
		                    </p>
		                </div>
		            </div>
		        </div>
		    </div>

		    <div class="container">
		        <div class="service-items text-center">
		            <div class="row">
		            	@php
						$icons = [
						    'flaticon-cogwheel',
						    'flaticon-analysis-1',
						    'flaticon-reduction',
						    'flaticon-interview',
						    'flaticon-sketch',
						    'flaticon-firewall',
						];
						@endphp
		                @foreach($services as $index => $service)
		                    <div class="col-lg-4 col-md-6 single-item">
		                        <div class="item">
		                            <div class="info">

		                                {{-- TITLE --}}
		                                <h4>
		                                    <a href="{{ route('frontend.post.show', [$service->category->slug, $service->slug]) }}">
		                                        {{ $service->title }}
		                                    </a>
		                                </h4>

		                                {{-- ICON (tạm hardcode) --}}
		                                 <i class="{{ $icons[$index] ?? 'flaticon-cogwheel' }}"></i>
		                                {{-- EXCERPT --}}
		                                <p>
		                                    {{ $service->excerpt }}
		                                </p>

		                            </div>
		                        </div>
		                    </div>
		                @endforeach

		            </div>
		        </div>
		    </div>
		</div>
		<!-- End Services Area -->


	<!-- Start Works About ============================================= -->
		<div class="works-about-area overflow-hidden">
		    <div class="container">
		        <div class="works-about-items default-padding">
		            <div class="row align-center">
		                <div class="col-lg-6 info">
		                    <h5>Vì sao chọn ATEN Việt Nam</h5>
		                    <h2 class="title">
		                        Đồng hành cùng doanh nghiệp <br> trong hạ tầng IT/AV
		                    </h2>
		                    <p>
		                        ATEN Việt Nam cung cấp thiết bị chính hãng và giải pháp phù hợp cho từng nhu cầu thực tế,
		                        từ phòng họp, trung tâm dữ liệu đến phòng điều hành và hệ thống trình chiếu chuyên nghiệp.
		                    </p>
		                    <ul>
		                        <li>
		                            <h5>Thiết bị ATEN chính hãng</h5>
		                        </li>
		                        <li>
		                            <h5>Tư vấn giải pháp phù hợp</h5>
		                        </li>
		                    </ul>
		                    <a href="{{ route('frontend.contact') }}" class="btn btn-theme effect btn-sm">Liên hệ tư vấn</a>
		                </div>

		                <div class="col-lg-6">
		                    <div class="thumb">
		                        <img src="{{ asset('storage/uploads/media/service-20260502181331-69f63ecb1cc25.png') }}" alt="Giải pháp IT/AV ATEN Việt Nam">
		                        <div class="fun-fact">
		                            <div class="timer" data-to="100" data-speed="5000"></div>
		                            <span class="medium">Dự án triển khai</span>
		                        </div>
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
	<!-- End Works About Area -->
	<!-- Start Testimonials ============================================= -->
		<div class="testimonials-area carousel-shadow default-padding">
		    <div class="container">
		        <div class="row">
		            <div class="col-lg-8 offset-lg-2">
		                <div class="site-heading text-center">
		                    <h4>Khách hàng nói gì</h4>
		                    <h2 class="title">Đánh giá từ đối tác doanh nghiệp</h2>
		                </div>
		            </div>
		        </div>
		    </div>

		    <div class="container">
		        <div class="testimonial-items">
		            <div class="testimonial-carousel owl-carousel owl-theme">

		                <!-- Item -->
		                <div class="item">
		                    <div class="row">
		                        {{-- <div class="col-lg-4">
		                            <div class="thumb">
		                                <img src="{{ asset('assets/frontend/img/teams/1.jpg') }}" alt="Khách hàng ATEN">
		                                <i class="fas fa-quote-right"></i>
		                            </div>
		                        </div> --}}
		                        <div class="info col-lg-12">
		                            <p>
		                                Giải pháp KVM giúp chúng tôi quản lý hệ thống server hiệu quả hơn, giảm đáng kể thời gian vận hành.
		                            </p>
		                            <div class="rating">
		                                <i class="fas fa-star"></i>
		                                <i class="fas fa-star"></i>
		                                <i class="fas fa-star"></i>
		                                <i class="fas fa-star"></i>
		                                <i class="fas fa-star-half-alt"></i>
		                            </div>
		                            <div class="provider">
		                                <h4>IT Manager</h4>
		                                <span>Doanh nghiệp tài chính</span>
		                            </div>
		                        </div>
		                    </div>
		                </div>

		                <!-- Item -->
		                <div class="item">
		                    <div class="row">
		                        <div class="info col-lg-12">
		                            <p>
		                                Giải pháp KVM giúp chúng tôi quản lý hệ thống server hiệu quả hơn, giảm đáng kể thời gian vận hành.
		                            </p>
		                            <div class="rating">
		                                <i class="fas fa-star"></i>
		                                <i class="fas fa-star"></i>
		                                <i class="fas fa-star"></i>
		                                <i class="fas fa-star"></i>
		                                <i class="fas fa-star-half-alt"></i>
		                            </div>
		                            <div class="provider">
		                                <h4>IT Manager</h4>
		                                <span>Doanh nghiệp tài chính</span>
		                            </div>
		                        </div>
		                    </div>
		                </div>

		                <!-- Item -->
		                <div class="item">
		                    <div class="row">
		                        <div class="info col-lg-12">
		                            <p>
		                                Giải pháp KVM giúp chúng tôi quản lý hệ thống server hiệu quả hơn, giảm đáng kể thời gian vận hành.
		                            </p>
		                            <div class="rating">
		                                <i class="fas fa-star"></i>
		                                <i class="fas fa-star"></i>
		                                <i class="fas fa-star"></i>
		                                <i class="fas fa-star"></i>
		                                <i class="fas fa-star-half-alt"></i>
		                            </div>
		                            <div class="provider">
		                                <h4>IT Manager</h4>
		                                <span>Doanh nghiệp tài chính</span>
		                            </div>
		                        </div>
		                    </div>
		                </div>

		            </div>
		        </div>
		    </div>
		</div>
		<!-- End Testimonials Area -->

	<!-- Start Faq ============================================= -->
	<div class="faq-area default-padding bg-gray">
	    <div class="container">
	        <div class="faq-items">
	            <div class="row">

	                <div class="col-lg-5 info">
	                    <h5>FAQ</h5>
	                    <h2 class="title">Câu hỏi thường gặp về giải pháp ATEN</h2>
	                    <a href="{{ url('/tin-tuc') }}" class="btn btn-theme effect btn-md">Xem tất cả</a>
	                </div>

	                <div class="col-lg-7">
	                    <div class="faq-content">
	                        <div class="accordion" id="accordionExample">

	                            <!-- Item 1 -->
	                            <div class="accordion-item">
	                                <div class="accordion-header" id="headingOne">
	                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true">
	                                        <strong>?</strong> ATEN phù hợp với doanh nghiệp nào?
	                                    </button>
	                                </div>
	                                <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
	                                    <div class="accordion-body">
	                                        Giải pháp ATEN phù hợp với nhiều mô hình doanh nghiệp như ngân hàng, sản xuất,
	                                        công nghệ, giáo dục và các tổ chức cần quản lý hệ thống IT/AV chuyên nghiệp.
	                                    </div>
	                                </div>
	                            </div>

	                            <!-- Item 2 -->
	                            <div class="accordion-item">
	                                <div class="accordion-header" id="headingTwo">
	                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
	                                        <strong>?</strong> KVM Switch dùng để làm gì?
	                                    </button>
	                                </div>
	                                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
	                                    <div class="accordion-body">
	                                        KVM Switch giúp quản lý nhiều máy chủ hoặc máy tính từ một điểm điều khiển,
	                                        giúp tiết kiệm thời gian vận hành và nâng cao hiệu quả quản lý hệ thống.
	                                    </div>
	                                </div>
	                            </div>

	                            <!-- Item 3 -->
	                            <div class="accordion-item">
	                                <div class="accordion-header" id="headingThree">
	                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree">
	                                        <strong>?</strong> ATEN có hỗ trợ tư vấn và triển khai không?
	                                    </button>
	                                </div>
	                                <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
	                                    <div class="accordion-body">
	                                        ATEN Việt Nam cung cấp dịch vụ tư vấn, thiết kế và triển khai giải pháp phù hợp
	                                        với từng nhu cầu thực tế của doanh nghiệp.
	                                    </div>
	                                </div>
	                            </div>

	                            <!-- Item 4 -->
	                            <div class="accordion-item">
	                                <div class="accordion-header" id="headingFour">
	                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour">
	                                        <strong>?</strong> Thiết bị ATEN có chính hãng không?
	                                    </button>
	                                </div>
	                                <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
	                                    <div class="accordion-body">
	                                        Tất cả sản phẩm ATEN đều được cung cấp chính hãng, đảm bảo chất lượng,
	                                        bảo hành đầy đủ và hỗ trợ kỹ thuật chuyên nghiệp.
	                                    </div>
	                                </div>
	                            </div>

	                        </div>
	                    </div>
	                </div>

	            </div>
	        </div>
	    </div>
	</div>
	<!-- End Faq Area -->


	<!-- Start Blog ============================================= -->
	<div class="blog-area content-less default-padding bottom-less">
	    <div class="container">
	        <div class="row">
	            <div class="col-lg-8 offset-lg-2">
	                <div class="site-heading text-center">
	                    <h4>Tin tức & kiến thức</h4>
	                    <h2 class="title">Bài viết mới nhất từ ATEN Việt Nam</h2>
	                </div>
	            </div>
	        </div>
	    </div>

	    <div class="container">
	        <div class="blog-items">
	            <div class="row">

	                @foreach($latestPosts as $post)
	                    <div class="single-item col-lg-4 col-md-6">
	                        <div class="item">
	                            <div class="thumb">
	                                <a href="{{ route('frontend.post.show', [$post->category->slug, $post->slug]) }}">
	                                    <img
	                                        src="{{ $post->thumbnail ? asset('storage/' . $post->thumbnail->file_path) : asset('assets/frontend/img/blog/1.jpg') }}"
	                                        alt="{{ $post->title }}">
	                                </a>
	                            </div>

	                            <div class="info">
	                                <div class="cats">
	                                    <a href="{{ route('frontend.post.show', [$post->category->slug, $post->slug]) }}">
	                                        {{ $post->category->name ?? 'Tin tức' }}
	                                    </a>
	                                </div>

	                                <div class="meta">
	                                    <ul>
	                                        <li>
	                                            <i class="fas fa-calendar-alt"></i>
	                                            {{ optional($post->published_at)->format('d/m/Y') }}
	                                        </li>
	                                        <li>
	                                            <i class="fas fa-user"></i>
	                                            By <a href="#">{{ $post->user->name ?? 'Admin' }}</a>
	                                        </li>
	                                    </ul>
	                                </div>

	                                <h4>
	                                    <a href="{{ route('frontend.post.show', [$post->category->slug, $post->slug]) }}">
	                                        {{ $post->title }}
	                                    </a>
	                                </h4>
	                            </div>
	                        </div>
	                    </div>
	                @endforeach

	            </div>
	        </div>
	    </div>
	</div>
	<!-- End Blog Area -->


@endsection