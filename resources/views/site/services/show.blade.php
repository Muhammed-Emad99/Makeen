@php use App\Helpers\Image; @endphp
@php use App\Helpers\SiteSetting; @endphp
@extends('site.layouts.app')
@section('title', 'الرئيسية')

@section('content')
    <header class="header">
        @include('site.layouts.partials.navbar')
    </header>
    <!-- start about us -->
    <main id="app">
        <section class="services mr-section" id="scroll-3">
            <div class="main-container" style="width: 50% !important;">
                <div class="titel-startttt pb-4">
                    <h2 class=" color text-align-center"> الخدمة المضافة حديثا </h2>
                    <p class="text-align-center">
                    </p>
                </div>
                <div class="navs-services">
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

                            <div class="content-hover d-flex flex-column">
                                <div class="img-content">
                                    <img
                                        src="{{ Image::getImage('/uploads/services/',$service->icon) }}"
                                        alt="">
                                </div>
                                <div class="text-content">
                                    <h2> {{ $service->name }} </h2>
                                    <p>{!! $service->description !!}</p>

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
                </div>

                {{--                <div class="card">--}}
                {{--                    <div class="card-body">--}}
                {{--                        <h5 class="card-title">{{ $service->name }}</h5>--}}
                {{--                        <p>{!! $service->description !!}</p>--}}
                {{--                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>--}}
                {{--                    </div>--}}
                {{--                    <img src="{{ Image::getImage('/uploads/services/',$service->image) }}" class="card-img-bottom"--}}
                {{--                         alt="...">--}}
                {{--                    <a href="" data-toggle="modal"--}}
                {{--                       data-item-id="{{ $service->id }}"--}}
                {{--                       data-target=".bd-example-modal-lg" id="serviceModalShow"--}}
                {{--                       class="ctm-btn open-modal-btn"> اطلب الخدمة <i--}}
                {{--                            class="bi bi-arrow-left"></i>--}}
                {{--                    </a>--}}
                {{--                </div>--}}
            </div>
        </section>

        <!-- start modal -->
        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
             aria-labelledby="myLargeModalLabel"
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
                                    <div style="color: red" id="first_name_error_services"
                                         class="error-message"></div>

                                </div>
                                <div class="form-input">
                                    <input type="text" name="last_name" id=""
                                           placeholder="الاسم الثاني" class="form-control">
                                    <div style="color: red" id="last_name_error_services"
                                         class="error-message"></div>

                                </div>

                                <div class="form-input">
                                    <input type="email" name="email" id=""
                                           placeholder="عنوان البريد الالكتروني" class="form-control">
                                    <div style="color: red" id="email_error_services"
                                         class="error-message"></div>
                                </div>

                                <div class="form-input">
                                    <input type="tel" name="phone" id=""
                                           placeholder="رقم الهاتف" class="form-control">
                                    <div style="color: red" id="phone_error_services"
                                         class="error-message"></div>

                                </div>

                                <div class="form-input w-100">
                                    <textarea name="messages" placeholder="ادخل رسالتك هنا"
                                              class="form-control"></textarea>
                                    <div style="color: red" id="messages_error_services"
                                         class="error-message"></div>

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

            })
        </script>
    @endpush
@endsection
