@php use App\Helpers\Image; @endphp
@php use App\Helpers\SiteSetting; @endphp
@extends('site.layouts.app')
@section('title', 'الرئيسية')

@section('content')
    <header class="header">
        @include('site.layouts.partials.navbar')
        @include('site.home.partials.sub-header',['sliders' => $sliders])
    </header>
    <!-- start about us -->
    <main id="app">

        <section class="about-us mr-section" id="scroll-1">
            <div class="main-container">
                <div class="row align-items-center">
                    <div class="col-lg-6" data-aos="fade-left">
                        <div class="text-about">
                            <div class="titel-start">
                                <h2><span class="titel">نبذة</span> عنا</h2>
                            </div>
                            <div class="p-about">
                                <p>{{SiteSetting::getSetting('our_feature',app()->getLocale())->value}}</p>
                            </div>
                        </div>
                        <div class="navs-about">
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill"
                                       href="#pills-home" role="tab" aria-controls="pills-home"
                                       aria-selected="true">رؤيتنا</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill"
                                       href="#pills-profile" role="tab" aria-controls="pills-profile"
                                       aria-selected="false">رسالتنا</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                     aria-labelledby="pills-home-tab">
                                    <div class="detalis-navs">
                                        <div class="icon-navs">
                                            <img src="{{ asset('site/images/ab1.png') }}" alt="">
                                        </div>
                                        <div class="text-navs">
                                            <p>{{SiteSetting::getSetting('our_vision',app()->getLocale())->value}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                     aria-labelledby="pills-profile-tab">
                                    <div class="detalis-navs">
                                        <div class="icon-navs">
                                            <img src="{{ asset('site/images/ab1.png') }}" alt="">
                                        </div>
                                        <div class="text-navs">
                                            <p>{{SiteSetting::getSetting('our_message',app()->getLocale())->value}} </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="img-aboutus" data-aos="fade-right">
                            <img
                                src="{{ Image::getImage('/uploads/',SiteSetting::getSetting('about_us_image')->value)  }}"
                                alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end about us-->

        <!-- start features -->
        <section class="distinguishes-us pg-section mr-section" id="scroll-2">
            <div class="main-container">
                <div class="titel-startx pb-5">
                    <h2 class="text-align-center  "><span class="titel">ما</span> يميزنا</h2>
                    <p class="text-align-center">{{SiteSetting::getSetting('our_feature',app()->getLocale())->value}}</p>
                </div>
                <div class="row  align-items-center">
                    <div class="col-lg-5">

                        <div class="main-img-adistinguishes" data-aos="fade-left">
                            <div class="img-distinguishes-us">
                                <img
                                    src="{{ Image::getImage('/uploads/',SiteSetting::getSetting('our_feature_image')->value)  }}"
                                    alt="">
                            </div>
                            <span class="text-number">

                                    <div>
                                        <i class="plus bi bi-plus"></i>
                                        <span class="number"
                                              data-target="{{SiteSetting::getSetting('experience')->value}}">
                                            {{SiteSetting::getSetting('experience')->value}}
                                        </span>
                                    </div>
                                    عاما من الخبرة
                                </span>

                        </div>

                    </div>
                    <div class="col-lg-7 " data-aos="fade-right">
                        <div class="text-distinguishes">
                            <p>{{SiteSetting::getSetting('our_feature_desc',app()->getLocale())->value}}</p>
                        </div>
                        @forelse($features as $feature)
                            <div class="advantages">
                                <div class="advantages-img">
                                    <img src="{{ Image::getImage('/uploads/features/',$feature->icon) }}" alt="">
                                </div>
                                <div class="advantages-text">
                                    {!! $feature->description !!}
                                </div>
                            </div>

                        @empty
                            <p class="w-100 text-center">There are no data. </p>
                        @endforelse
                    </div>
                </div>
            </div>
        </section>
        <!-- end features -->

        <!-- start services -->
        <section class="services mr-section" id="scroll-3">
            <div class="main-container">
                <div class="titel-startttt pb-4">
                    <h2 class=" color text-align-center"> خدماتنا </h2>
                    <p class="text-align-center">
                        {{SiteSetting::getSetting('our_service',app()->getLocale())->value}}
                    </p>
                </div>

                <div class="navs-services">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        @foreach ($categories as $category)
                            <li class="nav-item">
                                <a class="nav-link {{ $loop->first ? 'active show' : '' }}"
                                   id="pills-{{ $category->id }}-tab" data-toggle="pill"
                                   href="#pills1-{{ $category->id }}" role="tab"
                                   aria-controls="pills1-{{ $category->id }}"
                                   aria-selected="true">{{ $category->title }}</a>
                            </li>
                        @endforeach
                    </ul>
                    <div class="tab-content" id="pills1-tabContent">
                        @foreach($categories as $category)
                            <div class="tab-pane fade {{ $loop->first ? 'active show' : '' }}"
                                 id="pills1-{{ $category->id }}" role="tabpanel"
                                 aria-labelledby="pills1-{{ $category->id }}-tab">
                                <div class="silder-services-index">
                                    <div class="owl-carousel owl-theme maincarousel slider-services">
                                        @forelse($category->services as $service)
                                            <div class="item">
                                                <div class="sub-services-index">
                                                    <div class="img-services-index">
                                                        <img
                                                            src="{{ Image::getImage('/uploads/services/',$service->image) }}"
                                                            alt="">
                                                    </div>
                                                    <div class="text-services-index">
                                                        <div class="icon-services-index">
                                                            <img
                                                                src="{{ Image::getImage('/uploads/services/',$service->icon) }}"
                                                                alt="">
                                                        </div>
                                                        <h2> {{ $service->name }} </h2>

                                                    </div>

                                                    <div class="content-hover">
                                                        <div class="img-content">
                                                            <img
                                                                src="{{ Image::getImage('/uploads/services/',$service->icon) }}"
                                                                alt="">
                                                        </div>
                                                        <div class="text-content">
                                                            <h2> {{ $service->name }} </h2>
                                                            <p>{{ $service->description }}</p>

                                                        </div>
                                                        <a href="" data-toggle="modal"
                                                           data-item-id="{{ $service->id }}"
                                                           data-target=".bd-example-modal-lg" id="serviceModalShow"
                                                           class="ctm-btn open-modal-btn"> اطلب الخدمة <i
                                                                class="bi bi-arrow-left"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <p class="w-100 text-center">There are no data. </p>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </section>
        <!-- end services -->

        <!-- start train us -->
        <section class="train-us mr-section" id="scroll-4">
            <div class="main-containerr">
                <div class="row">
                    <div class="col-lg-6" data-aos="fade-up" data-aos-easing="linear"
                         data-aos-duration="700">
                        <div class="detalis-train-us">
                            <div class="titel-start bg-section">
                                <h2><span class="titels">تدرب</span> معنا</h2>
                                <p>{{SiteSetting::getSetting('our_training_desc',app()->getLocale())->value}}</p>
                            </div>
                            @forelse($trainings as $training)
                                <div class="true-train">
                                    <img src="{{ Image::getImage('/uploads/trainings/',$training->icon) }}" alt="">
                                    <p>
                                        <span class="font">{{ $training->name }}</span>
                                        {!! $training->description !!}
                                    </p>
                                </div>
                            @empty
                                <p class="w-100 text-center">There are no data. </p>
                            @endforelse
                        </div>
                        <div class="talb">
                            <a href="#scroll-6" class=" scroll-1 ctm-btn"> اطلب الخدمة <i
                                    class="bi bi-arrow-left"></i> </a>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="123" height="82" viewBox="0 0 123 82"
                             fill="none">
                            <g opacity="0.5">
                                <path d="M116.102 0H112.328V17.8648H116.102V0Z" fill="white"/>
                                <path d="M123 10.8514V7.01367L105.432 7.01367V10.8514H123Z" fill="white"/>
                                <path
                                    d="M8.04858 33.9084C8.04858 34.5174 7.871 35.1126 7.53827 35.6189C7.20555 36.1252 6.73266 36.5197 6.17939 36.7526C5.62613 36.9856 5.01736 37.0464 4.43008 36.9275C3.8428 36.8085 3.30338 36.5151 2.88009 36.0844C2.45681 35.6537 2.16864 35.105 2.05205 34.5077C1.93547 33.9105 1.99575 33.2915 2.22518 32.729C2.45461 32.1666 2.84289 31.6859 3.34098 31.3479C3.83906 31.0099 4.42457 30.8297 5.02338 30.8301C5.42083 30.8301 5.81436 30.9097 6.18153 31.0644C6.5487 31.2192 6.88231 31.446 7.16326 31.7318C7.4442 32.0177 7.66698 32.3571 7.8189 32.7306C7.97081 33.104 8.04884 33.5043 8.04858 33.9084Z"
                                    stroke="white" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"/>
                                <path
                                    d="M69.8436 74.4793L65.3732 69.9335C65.0948 69.6504 64.6435 69.6504 64.3651 69.9335L59.8947 74.4793C59.6163 74.7624 59.6163 75.2214 59.8947 75.5045L64.3651 80.0503C64.6435 80.3334 65.0948 80.3334 65.3732 80.0503L69.8436 75.5045C70.122 75.2214 70.122 74.7624 69.8436 74.4793Z"
                                    stroke="white" stroke-miterlimit="10"/>
                            </g>
                        </svg>
                    </div>
                    <div class="col-lg-6">
                        <div class="img-train-us" data-aos="fade-down" data-aos-easing="linear"
                             data-aos-duration="700">
                            <img
                                src="{{ Image::getImage('/uploads/',SiteSetting::getSetting('our_training_image')->value)  }}"
                                alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end train us -->

        <!-- start partners -->
        <section class="our-partners mr-section" id="scroll-5">
            <div class="main-container">
                <div class="titel-start p-t">
                    <h2 class="text-align-center"><span class="titel">الشركاء</span> الاستراتيجيون</h2>
                </div>
                <div class="owl-carousel owl-theme" id="slider-our-partners">
                    @forelse($partners as $partner)
                        <div class="item">
                            <div class="sub-our-partners">
                                <img src="{{ Image::getImage('/uploads/partners/',$partner->image) }}" alt="">
                            </div>
                        </div>
                    @empty
                        <p class="w-100 text-center">There are no data. </p>
                    @endforelse
                </div>
            </div>
        </section>
        <!-- end partners -->

        <!-- start subscribe -->
        <section class="subscribe mr-section">
            <div class="main-container">
                <div class="titel-starttx  bg-section">
                    <h2 class="text-align-center">النشرةالاخبارية</h2>
                    <p class="text-align-center">اشترك الان ليصلك اخر اخبار الشركة</p>
                </div>

                <form action="{{ route('site.subscribe') }}" id="SubscribeForm" method="post">
                    @csrf
                    <div class="form-row form-subscribe d-flex justify-content-center align-items-start w-100">
                        <div class="form-input">
                            <input type="email" name="email" id=""
                                   placeholder="عنوان البريد الالكتروني" class="form-control">
                            <div style="color: red" id="email_error_services" class="error-message"></div>
                        </div>

                        <div class="btn-subscribe">
                            <button type="submit" id='subscribeFormSubmitButton' class="ctm-btn">اشترك الان</button>
                        </div>
                    </div>

                </form>
            </div>
        </section>
        <!-- end subscribe -->

        <!-- start contact-us -->
        <section class="contact-us mr-section" id="scroll-6">
            <div class="main-container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="text-contact-us">
                            <div class="titel-starttt">
                                <h2><span class="titel">تواصل</span> معنا</h2>
                                <p class="p-contact">{{SiteSetting::getSetting('call_us_desc',app()->getLocale())->value}}</p>
                            </div>
                            <div class="text-about">
                                <ul>
                                    <li>
                                        <div class="img-contuctus">
                                            <img src="{{ asset('site/images/1.png') }}" alt="">
                                        </div>
                                        <div class="test">
                                            <h5>البريد الالكتروني</h5>
                                            <a href="">{{SiteSetting::getSetting('email')->value}}</a>
                                        </div>

                                    </li>
                                    <li>
                                        <div class="img-contuctus">
                                            <img src="{{ asset('site/images/2.png') }}" alt="">
                                        </div>
                                        <div class="test">
                                            <h5>موقعنا الالكتروني</h5>
                                            <a href="">{{SiteSetting::getSetting('website')->value}}</a>
                                        </div>

                                    </li>
                                    <li>
                                        <div class="img-contuctus">
                                            <img src="{{ asset('site/images/3.png') }}" alt="">
                                        </div>
                                        <div class="test">
                                            <h5>العنوان</h5>
                                            <a href="">{{SiteSetting::getSetting('address')->value}}</a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="img-contuctus">
                                            <img src="{{ asset('site/images/4.png') }}" alt="">
                                        </div>
                                        <div class="test">
                                            <h5>رقم الجوال</h5>
                                            <a href=""> {{SiteSetting::getSetting('phone')->value}}</a>
                                        </div>

                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-contact">
                            <div class="text-form">
                                <div class="titel-form">
                                    <h2 class=""><span class="titel">تواصل معنا إذا كنت تريد احد </span> خدماتنا
                                    </h2>
                                    <p>ندعوك للتواصل معنا إذا كنت ترغب في الحصول على أي من خدماتنا الاستشارية. </p>
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="88" height="90" viewBox="0 0 113 115"
                                     fill="none">
                                    <g opacity="0.14">
                                        <path
                                            d="M40.2437 21.645L104.945 61.5412C107.671 63.2219 109.188 66.2479 108.905 69.4375C108.621 72.6274 106.594 75.3383 103.614 76.5118L80.0833 85.7809L62.183 60.9666C61.3593 59.8247 59.7657 59.5667 58.6237 60.3905C57.4819 61.2142 57.2238 62.8078 58.0476 63.9497L75.9479 88.7641L59.729 108.169C57.6753 110.627 54.4635 111.695 51.347 110.958C48.2245 110.219 45.8368 107.821 45.1029 104.709L27.6549 30.7259C26.8605 27.3575 28.1107 24.0073 30.9175 21.9826C33.7243 19.9579 37.2979 19.8283 40.2437 21.645Z"
                                            fill="#B28516"/>
                                    </g>
                                </svg>
                            </div>

                            <form class="form" id="ContactForm" method="post">
                                @csrf
                                <div class="input">

                                    <div class="form-input">
                                        <input type="text" name="first_name" id=""
                                               placeholder="الاسم الاول" class="form-control">
                                        <div style="color: red" id="first_name_error_services" class="error-message"></div>

                                    </div>
                                    <div class="form-input">
                                        <input type="text" name="last_name" id=""
                                               placeholder="الاسم الثاني" class="form-control">
                                        <div style="color: red" id="last_name_error_services" class="error-message"></div>

                                    </div>

                                    <div class="form-input">
                                        <input type="email" name="email" id=""
                                               placeholder="عنوان البريد الالكتروني" class="form-control">
                                        <div style="color: red" id="email_error_services" class="error-message"></div>
                                    </div>

                                    <div class="form-input">
                                        <input type="tel" name="phone" id=""
                                               placeholder="رقم الهاتف" class="form-control">
                                        <div style="color: red" id="phone_error_services" class="error-message"></div>

                                    </div>

                                    <div class="form-input w-100">
                                    <textarea name="messages" placeholder="ادخل رسالتك هنا"
                                              class="form-control"></textarea>
                                        <div style="color: red" id="messages_error_services" class="error-message"></div>

                                    </div>
                                </div>
                                <div class="btn-contactus">
                                    <button id='contactFormSubmitButton' class="ctm-btn">ارسال <i
                                            class="bi bi-arrow-left"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end contact-us -->

        <!-- start modal -->
        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
             id="serviceModalShow"
             aria-hidden="true">
            <div class="modal-dialog modal-lg">

                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close text-danger" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="order-service">
                        <div class="title-order-service">
                            <h2> نموذج طلب خدمة </h2>
                            <p> تواصل معنا إذا كنت ترغب في الحصول على أي من خدماتنا الاستشارية. </p>
                        </div>

                        <form class="form" id="ServiceForm" action="{{ route('admin.home') }}" method="post">
                            @csrf
                            <div class="input">

                                <input type="hidden" name="service_id" id="service_id" value="">
                                <div class="form-input">
                                    <input type="text" name="first_name" id=""
                                           placeholder="الاسم الاول" class="form-control">
                                    <div style="color: red" id="first_name_error_services" class="error-message"></div>

                                </div>
                                <div class="form-input">
                                    <input type="text" name="last_name" id=""
                                           placeholder="الاسم الثاني" class="form-control">
                                    <div style="color: red" id="last_name_error_services" class="error-message"></div>

                                </div>

                                <div class="form-input">
                                    <input type="email" name="email" id=""
                                           placeholder="عنوان البريد الالكتروني" class="form-control">
                                    <div style="color: red" id="email_error_services" class="error-message"></div>
                                </div>

                                <div class="form-input">
                                    <input type="tel" name="phone" id=""
                                           placeholder="رقم الهاتف" class="form-control">
                                    <div style="color: red" id="phone_error_services" class="error-message"></div>

                                </div>

                                <div class="form-input w-100">
                                    <textarea name="messages" placeholder="ادخل رسالتك هنا"
                                              class="form-control"></textarea>
                                    <div style="color: red" id="messages_error_services" class="error-message"></div>

                                </div>
                            </div>
                            <div class="btn-contactus">
                                <button id='serviceFormSubmitButton' class="ctm-btn">ارسال <i
                                        class="bi bi-arrow-left"></i></button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- end modal -->
    @push('js')
        <script>
            $(document).ready(function () {

                $('.close').click(function () {
                    $('#ServiceForm').get(0).reset();
                });

                $('.open-modal-btn').click(function () {
                    var itemId = $(this).data('item-id');
                    $(document).on('submit', '#ServiceForm', function (e) {
                        e.preventDefault();
                        $('#service_id').val(itemId);
                        $('#serviceFormSubmitButton').removeClass('ctm-btn').addClass('ctm-btn-send')
                        $('#serviceFormSubmitButton').prop('disabled', true);
                        var formData = new FormData($('#ServiceForm')[0]);

                        $.ajax({
                            url: "{{ route('site.orderService') }}",
                            type: "POST",
                            data: formData,
                            contentType: false,
                            processData: false,
                            success: function (data) {
                                $('#serviceFormSubmitButton').removeClass('ctm-btn-send').addClass('ctm-btn')
                                $('#serviceFormSubmitButton').prop('disabled', false);
                                $('#ServiceForm')[0].reset();
                                $('.error-message').text('')
                                Swal.fire({
                                    icon: 'success',
                                    title: `<h5> ${data.success}</h5> `,
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                                $('#serviceModalShow').modal('hide');
                            },
                            error: function (data) {
                                console.log(data)
                                $('.error-message').text('');
                                // Display validation errors under each input
                                var errors = data.responseJSON.errors;
                                $.each(errors, function (field, messages) {
                                    var errorMessage = messages.join(', ');
                                    $('#' + field + '_error_services').text(errorMessage);
                                    console.log('#' + field + '_error_services')

                                });

                                $('#serviceFormSubmitButton').removeClass('ctm-btn-send').addClass('ctm-btn')
                                $('#serviceFormSubmitButton').prop('disabled', false);

                            },

                        });
                    })
                });

                $(document).on('submit', '#SubscribeForm', function (e) {
                    e.preventDefault();
                    $('#subscribeFormSubmitButton').removeClass('ctm-btn').addClass('ctm-btn-send')
                    $('#subscribeFormSubmitButton').prop('disabled', true);
                    var formData = new FormData($('#SubscribeForm')[0]);

                    $.ajax({
                        url: "{{ route('site.subscribe') }}",
                        type: "POST",
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function (data) {
                            $('#subscribeFormSubmitButton').removeClass('ctm-btn-send').addClass('ctm-btn')
                            $('#subscribeFormSubmitButton').prop('disabled', false);
                            $('#SubscribeForm')[0].reset();
                            $('.error-message').text('')
                            Swal.fire({
                                icon: 'success',
                                title: `<h5> ${data.success}</h5> `,
                                showConfirmButton: false,
                                timer: 1500
                            });

                        },
                        error: function (data) {
                            console.log(data)
                            $('.error-message').text('');
                            // Display validation errors under each input
                            var errors = data.responseJSON.errors;
                            $.each(errors, function (field, messages) {
                                var errorMessage = messages.join(', ');
                                $('#' + field + '_error_services').text(errorMessage);
                                console.log('#' + field + '_error_services')

                            });

                            $('#subscribeFormSubmitButton').removeClass('ctm-btn-send').addClass('ctm-btn')
                            $('#subscribeFormSubmitButton').prop('disabled', false);

                        },

                    });
                })

                $(document).on('submit', '#ContactForm', function (e) {
                    e.preventDefault();
                    $('#contactFormSubmitButton').removeClass('ctm-btn').addClass('ctm-btn-send')
                    $('#contactFormSubmitButton').prop('disabled', true);
                    var formData = new FormData($('#ContactForm')[0]);

                    $.ajax({
                        url: "{{ route('site.contact') }}",
                        type: "POST",
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function (data) {
                            $('#contactFormSubmitButton').removeClass('ctm-btn-send').addClass('ctm-btn')
                            $('#contactFormSubmitButton').prop('disabled', false);
                            $('#ContactForm')[0].reset();
                            $('.error-message').text('')
                            Swal.fire({
                                icon: 'success',
                                title: `<h5> ${data.success}</h5> `,
                                showConfirmButton: false,
                                timer: 1500
                            });

                        },
                        error: function (data) {
                            console.log(data)
                            $('.error-message').text('');
                            // Display validation errors under each input
                            var errors = data.responseJSON.errors;
                            $.each(errors, function (field, messages) {
                                var errorMessage = messages.join(', ');
                                $('#' + field + '_error_services').text(errorMessage);
                                console.log('#' + field + '_error_services')

                            });

                            $('#contactFormSubmitButton').removeClass('ctm-btn-send').addClass('ctm-btn')
                            $('#contactFormSubmitButton').prop('disabled', false);

                        },

                    });
                })

            })
        </script>
    @endpush
@endsection
