@php use App\Helpers\Image; @endphp

@extends('dashboard.layouts.app')

@section('title', 'تعديل مميزات')

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
                                    <li class="breadcrumb-item"><a href="{{ route('admin.features.index') }}">
                                            المميزات </a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">تعديل مميزات </a>
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
                                                                              href="{{ route('admin.features.create') }}"><i
                                        class="mr-1"
                                        data-feather="check-square"></i><span class="align-middle">اضافة مميزات
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
                                    <h2 class="card-title">تعديل الميزه </h2>
                                </div>
                                <div class="card-body">
                                    <form class="form form-vertical" id="createBookForm"
                                          action="{{ route('admin.features.update', $feature->id) }}" method="POST"
                                          enctype="multipart/form-data">
                                        @csrf
                                        @method('put')
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="description_ar">الوصف بالعربي</label>
                                                    <textarea
                                                        class="form-control @error('description_ar') is-invalid @enderror"
                                                        name="description_ar" id="description_ar"
                                                        rows="5">{{ old('description_ar',$feature->description_ar) }}</textarea>
                                                    @error('description_ar')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="description_en">الوصف بالانجليزي</label>
                                                    <textarea
                                                        class="form-control @error('description_en') is-invalid @enderror"
                                                        name="description_en" id="description_en"
                                                        rows="5">{{ old('description_en',$feature->description_en) }}</textarea>
                                                    @error('description_en')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="icon" class="form-label">الايقونه</label>
                                                    <input
                                                        class="form-control image @error('icon') is-invalid @enderror"
                                                        type="file" id="icon"
                                                        name="icon" accept=".jpg,.jpeg,.png,.svg">
                                                    @error('icon')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group prev">
                                                    <img src="{{ Image::getImage('uploads/features/',$feature->icon) }}"
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
