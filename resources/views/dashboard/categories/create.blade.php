@extends('dashboard.layouts.app')

@section('title', 'اضافه قسم خدمات جديد')

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a
                                            href="{{ route('admin.categories.index') }}">اقسام الخدمات </a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">اضافة قسم خدمات جديد </a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic Vertical form layout section start -->
                <section id="basic-vertical-layouts">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h2 class="card-title">اضافة قسم خدمات جديد</h2>
                                </div>
                                <div class="card-body">
                                    <form class="form form-vertical" id="createBookForm"
                                          action="{{ route('admin.categories.store') }}" method="POST"
                                          class="was-validated"
                                          enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="title_ar">الاسم باللغه العربيه</label>
                                                    <input type="text" id="title_ar"
                                                           class="form-control @error('title_ar') is-invalid @enderror"
                                                           name="title_ar" value="{{ old('title_ar') }}"/>
                                                    @error('title_ar')
                                                    <div class="invalid-feedback">{{$message}}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="title_en">الاسم باللغه الانجليزيه</label>
                                                    <input type="text" id="title_en"
                                                           class="form-control @error('title_en') is-invalid @enderror"
                                                           name="title_en" value="{{ old('title_en') }}"/>
                                                    @error('title_en')
                                                    <div class="invalid-feedback">{{$message}}</div>
                                                    @enderror
                                                </div>
                                            </div>


                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary mr-1">اضافة</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Basic Vertical form layout section end -->
            </div>
        </div>
    </div>
    <!-- END: Content-->

    @push('js')
        {{--        <script src="{{ asset('dashboard/assets/js/custom/validation/bookForm.js') }}"></script>--}}
        <script src="{{ asset('dashboard/app-assets/js/custom/preview-image.js') }}"></script>

        <script>
            $(document).on('click', '.remove-btn', function (e) {
                e.preventDefault();
                $(this).closest('.row').remove();
            });

            $('.add-btn').click(function (e) {
                e.preventDefault();
                var content = `<div class="row my-2">
                                    <div class="col-md-8">
                                        <input type="text" name="keywords[]"
                                            class="form-control"
                                            value="">
                                    </div>
                                    <div class="col-md-4">
                                        <a class="btn btn-danger remove-btn">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                    </div>
                                </div>`;
                $(this).parent().prepend(content);
            });
        </script>
    @endpush
@endsection
