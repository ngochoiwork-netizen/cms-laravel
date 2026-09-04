@php
    $isVi = app()->getLocale() === 'vi';
@endphp

<!-- rts contact area start -->
<div class="rts-contact-area rts-section-gapBottom">
    <div class="container">
        <div class="row g-5">

            {{-- CONTACT INFORMATION --}}
            <div class="col-lg-4">
                <div class="contact-form-content-left-wrapper">

                    {{-- LOCATION --}}
                    @if (setting('address'))
                        <div class="signle-contact-card">
                            <div class="top-area">
                                <div class="icon">
                                    <img
                                        src="{{ asset('assets/frontend/images/contact/icon/01.svg') }}"
                                        alt=""
                                        aria-hidden="true"
                                    >
                                </div>

                                <h4 class="title">
                                    {{ $isVi ? 'Địa Chỉ' : 'Our Location' }}
                                </h4>
                            </div>

                            <p class="disc">
                                {{ setting('address') }}
                            </p>
                        </div>
                    @endif

                    {{-- EMAIL --}}
                    @if (setting('email'))
                        <div class="signle-contact-card">
                            <div class="top-area">
                                <div class="icon">
                                    <img
                                        src="{{ asset('assets/frontend/images/contact/icon/02.svg') }}"
                                        alt=""
                                        aria-hidden="true"
                                    >
                                </div>

                                <h4 class="title">
                                    {{ $isVi ? 'Email Liên Hệ' : 'Email Us' }}
                                </h4>
                            </div>

                            <p class="disc">
                                {{ $isVi
                                    ? 'Đội ngũ hỗ trợ luôn sẵn sàng giúp bạn.'
                                    : 'Our support team is here to assist you.' }}
                            </p>

                            <a href="mailto:{{ setting('email') }}">
                                {{ setting('email') }}
                            </a>
                        </div>
                    @endif

                    {{-- PHONE --}}
                    @if (setting('phone'))
                        <div class="signle-contact-card">
                            <div class="top-area">
                                <div class="icon">
                                    <img
                                        src="{{ asset('assets/frontend/images/contact/icon/03.svg') }}"
                                        alt=""
                                        aria-hidden="true"
                                    >
                                </div>

                                <h4 class="title">
                                    {{ $isVi ? 'Gọi Cho Chúng Tôi' : 'Call Us' }}
                                </h4>
                            </div>

                            <p class="disc">
                                {{ $isVi
                                    ? 'Liên hệ đội ngũ chăm sóc khách hàng.'
                                    : 'Contact our customer support team.' }}
                            </p>

                            <a href="tel:{{ preg_replace('/[^0-9+]/', '', setting('phone')) }}">
                                {{ setting('phone') }}
                            </a>
                        </div>
                    @endif

                </div>
            </div>

            {{-- CONTACT FORM --}}
            <div class="col-lg-8">
                <form
                    method="POST"
                    action="{{ localized_route('contact.submit') }}"
                    class="contact-form-main-wrapper-contact form__content"
                >
                    @csrf

                    {{-- VALIDATION ERRORS --}}
                    @if ($errors->any())
                        <div
                            id="contact-form-errors"
                            class="alert alert-danger"
                            role="alert"
                        >
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- SUCCESS MESSAGE --}}
                    @if (session('success'))
                        <div
                            id="contact-form-success"
                            class="alert alert-success"
                            role="status"
                        >
                            {{ session('success') }}
                        </div>
                    @endif

                    {{-- FIRST NAME / LAST NAME --}}
                    <div class="single-input-wrapper">
                        <div class="single-input">
                            <label for="first_name">
                                {{ $isVi ? 'Tên' : 'First Name' }} *
                            </label>

                            <input
                                name="first_name"
                                id="first_name"
                                type="text"
                                value="{{ old('first_name') }}"
                                placeholder="{{ $isVi ? 'Tên của bạn' : 'Your first name' }}"
                                autocomplete="given-name"
                                required
                            >
                        </div>

                        <div class="single-input">
                            <label for="last_name">
                                {{ $isVi ? 'Họ' : 'Last Name' }}
                            </label>

                            <input
                                name="last_name"
                                id="last_name"
                                type="text"
                                value="{{ old('last_name') }}"
                                placeholder="{{ $isVi ? 'Họ của bạn' : 'Your last name' }}"
                                autocomplete="family-name"
                            >
                        </div>
                    </div>

                    {{-- EMAIL / PHONE --}}
                    <div class="single-input-wrapper">
                        <div class="single-input">
                            <label for="email">
                                Email *
                            </label>

                            <input
                                id="email"
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                placeholder="example@gmail.com"
                                autocomplete="email"
                                required
                            >
                        </div>

                        <div class="single-input">
                            <label for="phone">
                                {{ $isVi ? 'Số Điện Thoại' : 'Phone' }} *
                            </label>

                            <input
                                id="phone"
                                type="tel"
                                name="phone"
                                value="{{ old('phone') }}"
                                placeholder="{{ $isVi ? 'Số điện thoại của bạn' : 'Your phone number' }}"
                                autocomplete="tel"
                                required
                            >
                        </div>
                    </div>

                    {{-- MESSAGE --}}
                    <div class="single-input">
                        <label for="message">
                            {{ $isVi
                                ? 'Chúng tôi có thể giúp gì cho bạn?'
                                : 'How can we help you?' }} *
                        </label>

                        <textarea
                            name="message"
                            id="message"
                            placeholder="{{ $isVi ? 'Nội dung của bạn...' : 'Your message...' }}"
                            required
                        >{{ old('message') }}</textarea>
                    </div>

                    {{-- SMS CONSENT --}}
                    <div class="single-input sms-consent-wrapper">

                        <p id="sms-consent-note">
                            {{ $isVi
                                ? 'Vui lòng đọc và tick cả hai ô đồng ý dưới đây để gửi biểu mẫu.'
                                : 'Please read and check both consent boxes below to submit this form.' }}
                        </p>

                        {{-- CUSTOMER SUPPORT / NOTIFICATION SMS --}}
                        <div class="with-checkbox">
                            <input
                                type="checkbox"
                                name="sms_consent"
                                id="sms_consent"
                                value="1"
                                aria-describedby="sms-consent-note"
                                @checked(old('sms_consent') == '1')
                                required
                            >

                            <label for="sms_consent">
                                @if ($isVi)
                                    Tôi đồng ý nhận SMS từ SenVerse LLC tại
                                    số điện thoại đã cung cấp về hỗ trợ khách hàng,
                                    nhắc lịch hẹn và thông báo tài khoản.
                                    Tần suất tin nhắn có thể thay đổi.
                                    Có thể phát sinh phí tin nhắn và dữ liệu.
                                    Trả lời STOP để hủy nhận hoặc HELP để được hỗ trợ.
                                @else
                                    I agree to receive SMS messages from
                                    SenVerse LLC at the phone number provided
                                    regarding customer support, appointment
                                    reminders, and account notifications.
                                    Message frequency may vary.
                                    Message and data rates may apply.
                                    Reply STOP to opt out or HELP for assistance.
                                @endif
                            </label>
                        </div>

                        {{-- PROMOTIONAL SMS --}}
                        <div class="with-checkbox mt--20">
                            <input
                                type="checkbox"
                                name="marketing_sms_consent"
                                id="marketing_sms_consent"
                                value="1"
                                aria-describedby="sms-consent-note"
                                @checked(old('marketing_sms_consent') == '1')
                                required
                            >

                            <label for="marketing_sms_consent">
                                @if ($isVi)
                                    Tôi đồng ý nhận SMS quảng cáo và ưu đãi
                                    từ SenVerse LLC tại số điện thoại đã cung cấp.
                                    Tần suất tin nhắn có thể thay đổi.
                                    Có thể phát sinh phí tin nhắn và dữ liệu.
                                    Trả lời STOP để hủy nhận hoặc HELP để được hỗ trợ.
                                @else
                                    I agree to receive promotional and marketing
                                    SMS messages from SenVerse LLC at the phone
                                    number provided. Message frequency may vary.
                                    Message and data rates may apply.
                                    Reply STOP to opt out or HELP for assistance.
                                @endif
                            </label>
                        </div>

                        {{-- POLICY LINKS --}}
                        <p class="mt--20">
                            {{ $isVi ? 'Xem' : 'View our' }}

                            <a
                                href="{{ localized_url('/policy/privacy_policy') }}"
                                target="_blank"
                                rel="noopener noreferrer"
                            >
                                {{ $isVi
                                    ? 'Chính sách bảo mật & Cookie'
                                    : 'Privacy & Cookie Policy' }}
                            </a>

                            {{ $isVi ? 'và' : 'and' }}

                            <a
                                href="{{ localized_url('/policy/sms_terms') }}"
                                target="_blank"
                                rel="noopener noreferrer"
                            >
                                {{ $isVi
                                    ? 'Điều khoản SMS'
                                    : 'SMS Terms & Conditions' }}
                            </a>

                            {{ $isVi ? '(mở trong tab mới).' : '(opens in a new tab).' }}
                        </p>

                    </div>

                    {{-- SUBMIT --}}
                    <button
                        class="rts-btn btn-primary"
                        type="submit"
                    >
                        {{ $isVi ? 'Gửi Tin Nhắn' : 'Send Message' }}
                    </button>

                </form>
            </div>

        </div>
    </div>
</div>
<!-- rts contact area end -->