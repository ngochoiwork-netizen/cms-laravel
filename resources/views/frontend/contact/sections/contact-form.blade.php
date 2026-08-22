<!-- rts contact area start -->
<div class="rts-contact-area rts-section-gapBottom">

    <div class="container">

        <div class="row g-5">

            {{-- =========================================================
                CONTACT INFORMATION
            ========================================================== --}}
            <div class="col-lg-4">

                <div class="contact-form-content-left-wrapper">


                    {{-- =================================================
                        LOCATION
                    ================================================== --}}
                    @if (setting('address'))

                        <div class="signle-contact-card">

                            <div class="top-area">

                                <div class="icon">

                                    <img
                                        src="{{ asset('assets/frontend/images/contact/icon/01.svg') }}"
                                        alt="Location"
                                    >

                                </div>

                                <h4 class="title">
                                    Our Location
                                </h4>

                            </div>

                            <p class="disc">
                                {{ setting('address') }}
                            </p>

                        </div>

                    @endif


                    {{-- =================================================
                        EMAIL
                    ================================================== --}}
                    @if (setting('email'))

                        <div class="signle-contact-card">

                            <div class="top-area">

                                <div class="icon">

                                    <img
                                        src="{{ asset('assets/frontend/images/contact/icon/02.svg') }}"
                                        alt="Email"
                                    >

                                </div>

                                <h4 class="title">
                                    Email Us
                                </h4>

                            </div>

                            <p class="disc">
                                Our support team is here to assist you
                            </p>

                            <a href="mailto:{{ setting('email') }}">
                                {{ setting('email') }}
                            </a>

                        </div>

                    @endif


                    {{-- =================================================
                        PHONE
                    ================================================== --}}
                    @if (setting('phone'))

                        <div class="signle-contact-card">

                            <div class="top-area">

                                <div class="icon">

                                    <img
                                        src="{{ asset('assets/frontend/images/contact/icon/03.svg') }}"
                                        alt="Phone"
                                    >

                                </div>

                                <h4 class="title">
                                    Call Us
                                </h4>

                            </div>

                            <p class="disc">
                                Our customer support team is available
                            </p>

                            <a
                                href="tel:{{ preg_replace('/[^0-9+]/', '', setting('phone')) }}"
                            >
                                {{ setting('phone') }}
                            </a>

                        </div>

                    @endif

                </div>

            </div>


            {{-- =========================================================
                CONTACT FORM
            ========================================================== --}}
            <div class="col-lg-8">

                <form
                    method="POST"
                    action="{{ route('contact.submit') }}"
                    class="contact-form-main-wrapper-contact form__content"
                >

                    @csrf


                    {{-- =================================================
                        FIRST NAME / LAST NAME
                    ================================================== --}}
                    <div class="single-input-wrapper">

                        <div class="single-input">

                            <label for="first_name">
                                First Name
                            </label>

                            <input
                                name="first_name"
                                id="first_name"
                                type="text"
                                value="{{ old('first_name') }}"
                                placeholder="Your Name"
                                required
                            >

                        </div>


                        <div class="single-input">

                            <label for="last_name">
                                Last Name
                            </label>

                            <input
                                name="last_name"
                                id="last_name"
                                type="text"
                                value="{{ old('last_name') }}"
                                placeholder="Last Name"
                            >

                        </div>

                    </div>


                    {{-- =================================================
                        EMAIL / PHONE
                    ================================================== --}}
                    <div class="single-input-wrapper">

                        <div class="single-input">

                            <label for="email">
                                Email
                            </label>

                            <input
                                id="email"
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                placeholder="example@gmail.com"
                                required
                            >

                        </div>


                        <div class="single-input">

                            <label for="phone">
                                Phone
                            </label>

                            <input
                                id="phone"
                                type="tel"
                                name="phone"
                                value="{{ old('phone') }}"
                                placeholder="Phone"
                            >

                        </div>

                    </div>


                    {{-- =================================================
                        MESSAGE
                    ================================================== --}}
                    <div class="single-input">

                        <label for="message">
                            How can we help you?
                        </label>

                        <textarea
                            name="message"
                            id="message"
                            placeholder="Your message..."
                            required
                        >{{ old('message') }}</textarea>

                    </div>


                    {{-- =================================================
                        SMS CONSENT
                    ================================================== --}}
                    <div class="single-input sms-consent-wrapper">

                        {{-- Customer Support / Notification SMS --}}
                        <div class="with-checkbox">

                            <input
                                type="checkbox"
                                name="sms_consent"
                                id="sms_consent"
                                value="1"
                                {{ old('sms_consent') ? 'checked' : '' }}
                                required
                            >

                            <label for="sms_consent">

                                By providing your phone number, you agree to receive SMS messages
                                from Senverse LLC regarding customer support, appointment reminders,
                                and account notifications. Message frequency may vary.
                                Message and data rates may apply. Reply STOP to unsubscribe or HELP
                                for assistance. View our

                                <a
                                    href="{{ url('/privacy-policy') }}"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                >
                                    Privacy Policy
                                </a>

                                and

                                <a
                                    href="{{ url('/terms-and-conditions') }}"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                >
                                    Terms & Conditions
                                </a>.

                            </label>

                        </div>


                        {{-- Promotional SMS --}}
                        <div class="with-checkbox mt--20">

                            <input
                                type="checkbox"
                                name="marketing_sms_consent"
                                id="marketing_sms_consent"
                                value="1"
                                {{ old('marketing_sms_consent') ? 'checked' : '' }}
                                required
                            >

                            <label for="marketing_sms_consent">
                                I also agree to receive promotional messages from Senverse LLC.
                            </label>

                        </div>

                    </div>


                   


                    {{-- =================================================
                        SUBMIT
                    ================================================== --}}
                    <button
                        class="rts-btn btn-primary"
                        type="submit"
                    >
                        Send Message
                    </button>

                     {{-- =================================================
                        VALIDATION ERRORS
                    ================================================== --}}
                    @if ($errors->any())

                        <div id="form-messages" class="alert alert-danger">

                            <ul class="mb-0">

                                @foreach ($errors->all() as $error)

                                    <li>
                                        {{ $error }}
                                    </li>

                                @endforeach

                            </ul>

                        </div>

                    @endif


                    {{-- =================================================
                        SUCCESS MESSAGE
                    ================================================== --}}
                    @if (session('success'))

                        <div id="form-messages" class="alert alert-success">

                            {{ session('success') }}

                        </div>

                    @endif

                </form>

            </div>

        </div>

    </div>

</div>
<!-- rts contact area end -->