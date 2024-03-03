@php use App\Helpers\Image; @endphp

@extends('dashboard.layouts.app')

@section('title', 'تعديل الاسليدر')

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
                                    <li class="breadcrumb-item"><a href="{{ route('admin.sliders.index') }}"> كل
                                            الاسليدر </a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">تعديل الاسليدر </a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                    <div class="form-group breadcrumb-right">
                        <div class="dropdown">
                            <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                    data-feather="grid"></i></button>
                            <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item"
                                                                              href="{{ route('admin.sliders.create') }}"><i
                                        class="mr-1"
                                        data-feather="check-square"></i><span class="align-middle">اضافة اسليدر
                                        جديد</span></a></div>
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
                                    <h2 class="card-title">تعديل الاسليدر</h2>
                                </div>
                                <div class="card-body">
                                    <form class="form form-vertical" id="updateBookForm"
                                          action="{{ route('admin.sliders.update', $slider->id) }}" method="POST"
                                          enctype="multipart/form-data">
                                        @csrf
                                        @method('put')
                                        <div class="row">

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="title_ar">العنوان باللغه العربية</label>
                                                    <input type="text" id="title_ar"
                                                           name="title_ar" value="{{old('title_ar',$slider->title_ar)}}"
                                                           class="form-control @error('title_ar') is-invalid @enderror"
                                                           aria-label="Name"
                                                           aria-describedby="basic-addon-name" require="">
                                                    @error('title_ar')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="title_en">العنوان باللغه الانجليزيه</label>
                                                    <input type="text" id="title_en"
                                                           name="title_en" value="{{old('title_en',$slider->title_en)}}"
                                                           class="form-control @error('title_en') is-invalid @enderror"
                                                           aria-label="Name"
                                                           aria-describedby="basic-addon-name" require="">
                                                    @error('title_en')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="content_ar">المحتوي باللغة العربية</label>
                                                    <textarea
                                                        class="form-control @error('content_ar') is-invalid @enderror"
                                                        name="content_ar" id="content_ar"
                                                        rows="5">{{ old('content_ar',$slider->content_ar) }}</textarea>
                                                    @error('content_ar')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="content_en">المحتوي باللغه الانجليزيه</label>
                                                    <textarea
                                                        class="form-control @error('content_en') is-invalid @enderror"
                                                        name="content_en" id="content_en"
                                                        rows="5">{{ old('content_en',$slider->content_en) }}</textarea>
                                                    @error('content_en')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="image" class="form-label">الصوره</label>
                                                    <input
                                                        class="form-control image @error('image') is-invalid @enderror"
                                                        type="file" id="image"
                                                        name="image" accept=".jpg,.jpeg,.png,.svg,.gif">
                                                    @error('image')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group preview-formFile">
                                                    <img src="{{ Image::getImage('uploads/sliders/',$slider->image) }}"
                                                         style="width: 100px"
                                                         class="img-thumbnail preview-formFile" alt="">
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="icon" class="form-label">الايقونة</label>
                                                    <input
                                                        class="form-control image @error('icon') is-invalid @enderror"
                                                        type="file" id="icon"
                                                        name="icon" accept=".jpg,.jpeg,.png,.svg,.gif">
                                                    @error('icon')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group prev">
                                                    <img src="{{ Image::getImage('uploads/sliders/',$slider->icon) }}"
                                                         style="width: 100px"
                                                         class="img-thumbnail preview-formFile" alt="">
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary mr-1">تعديل</button>
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
        <script src="{{ asset('dashboard/app-assets/js/custom/preview-image.js') }}"></script>
    @endpush
@endsection
