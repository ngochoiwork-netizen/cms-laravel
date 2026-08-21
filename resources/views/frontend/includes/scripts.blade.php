<script defer src="{{ asset('assets/frontend/js/plugins/jquery.js') }}"></script>

<script defer src="{{ asset('assets/frontend/js/plugins/jquery-appear.js') }}"></script>

<script defer src="{{ asset('assets/frontend/js/plugins/odometer.js') }}"></script>

<script defer src="{{ asset('assets/frontend/js/plugins/gsap.js') }}"></script>

<script defer src="{{ asset('assets/frontend/js/plugins/split-text.js') }}"></script>

<script defer src="{{ asset('assets/frontend/js/plugins/scroll-trigger.js') }}"></script>

<script defer src="{{ asset('assets/frontend/js/plugins/smooth-scroll.js') }}"></script>

<script defer src="{{ asset('assets/frontend/js/plugins/metismenu.js') }}"></script>

<script defer src="{{ asset('assets/frontend/js/plugins/popup.js') }}"></script>

<script defer src="{{ asset('assets/frontend/js/plugins/contact.form.js') }}"></script>

<script defer src="{{ asset('assets/frontend/js/vendor/bootstrap.min.js') }}"></script>

<script defer src="{{ asset('assets/frontend/js/plugins/odometer.js') }}"></script>

<script defer src="{{ asset('assets/frontend/js/plugins/swiper.js') }}"></script>

<script defer src="{{ asset('assets/frontend/js/main.js') }}"></script>

<style>
 /* =========================================================
   Merchant Payment Methods
   ========================================================= */

.merchant-payment-methods .reason-wrapper {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 24px;
    margin-top: 30px;
}

.merchant-payment-methods .reason-wrapper .single-reason {
    width: 100%;
    min-height: 110px;
    margin: 0;
    padding: 18px 20px;
    display: flex;
    align-items: center;
    gap: 18px;
    box-sizing: border-box;
}

.merchant-payment-methods .reason-wrapper .single-reason .icon {
    width: 60px;
    height: 60px;
    min-width: 60px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.merchant-payment-methods .reason-wrapper .single-reason .icon i {
    font-size: 28px;
    line-height: 1;
}

.merchant-payment-methods .reason-wrapper .single-reason .title {
    margin: 0;
    line-height: 1.35;
    flex: 1;
}

.merchant-payment-methods .merchant-payment-image {
    width: 100%;
    position: relative;
}

.merchant-payment-methods .merchant-payment-image img {
    width: 100%;
    max-width: 100%;
    height: auto;
    display: block;
    position: relative;
}

.merchant-payment-methods .why-choose-left-content .disc {
    margin-bottom: 0;
}

/* Tablet */
@media (max-width: 991px) {

    .merchant-payment-methods .offset-lg-1 {
        margin-left: 0;
    }

    .merchant-payment-methods .merchant-payment-image {
        margin-top: 40px;
    }

    .merchant-payment-methods .reason-wrapper {
        gap: 18px;
    }

    .merchant-payment-methods .reason-wrapper .single-reason {
        min-height: 100px;
        padding: 16px;
    }

    .merchant-payment-methods .reason-wrapper .single-reason .icon {
        width: 56px;
        height: 56px;
        min-width: 56px;
    }

    .merchant-payment-methods .reason-wrapper .single-reason .icon i {
        font-size: 25px;
    }
}

/* Mobile */
@media (max-width: 575px) {

    .merchant-payment-methods .reason-wrapper {
        grid-template-columns: 1fr;
        gap: 14px;
        margin-top: 24px;
    }

    .merchant-payment-methods .reason-wrapper .single-reason {
        min-height: auto;
        padding: 15px;
        gap: 14px;
    }

    .merchant-payment-methods .reason-wrapper .single-reason .icon {
        width: 52px;
        height: 52px;
        min-width: 52px;
    }

    .merchant-payment-methods .reason-wrapper .single-reason .icon i {
        font-size: 23px;
    }

    .merchant-payment-methods .merchant-payment-image {
        margin-top: 30px;
    }
}

/* =========================================================
   Merchant POS Integration
   ========================================================= */

.merchant-pos-integration .title-center-wrapper .disc {
    max-width: 720px;
    margin: 20px auto 0;
}

.merchant-pos-integration .working-process-three-main .working-process-wrapper-three::before {

    left: 46%;
}
/* 5 columns */
.merchant-pos-integration .workflow-five-columns {
    display: grid;
    grid-template-columns: repeat(5, minmax(0, 1fr));
    gap: 30px;
}

.merchant-pos-integration .workflow-column {
    width: 100%;
    min-width: 0;
}


/* Step */
.merchant-pos-integration .working-process-wrapper-three {
    width: 100%;
    height: 100%;

    display: flex;
    flex-direction: column;
    align-items: center;

    text-align: center;
}


/* Number */
.merchant-pos-integration .step-number {
    display: block;

    margin-bottom: 15px;

    font-size: 14px;
    font-weight: 600;
    line-height: 1;

    text-align: center;
}


/* Circle Icon */
.merchant-pos-integration .step-icon {
    width: 82px;
    height: 82px;
    min-width: 82px;

    margin: 0 auto 24px;

    border: 1px solid #dfe3ea;
    border-radius: 50%;

    background: #ffffff;

    display: flex;
    align-items: center;
    justify-content: center;
}


/* Icon */
.merchant-pos-integration .step-icon i {
    font-size: 30px;
    line-height: 1;
}


/* Title */
.merchant-pos-integration .working-process-wrapper-three .title {
    width: 100%;

    margin: 0 0 12px;

    text-align: center;
}


/* Description */
.merchant-pos-integration .working-process-wrapper-three .disc {
    width: 100%;

    margin: 0;

    text-align: center;
    line-height: 1.6;
}


/* Tablet */
@media (max-width: 991px) {

    .merchant-pos-integration .workflow-five-columns {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }

}


/* Mobile */
@media (max-width: 575px) {

    .merchant-pos-integration .workflow-five-columns {
        grid-template-columns: 1fr;
        gap: 30px;
    }

    .merchant-pos-integration .step-icon {
        width: 72px;
        height: 72px;
        min-width: 72px;
    }

    .merchant-pos-integration .step-icon i {
        font-size: 26px;
    }

}
</style>