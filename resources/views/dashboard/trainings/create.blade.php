@extends('dashboard.layouts.app')

@section('title', 'تدرب  معنا')

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
                                    <li class="breadcrumb-item"><a href="{{ route('admin.features.index') }}"> تدرب  معنا </a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">اضافة تدرب  معنا  </a>
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
                                    <h2 class="card-title">اضافة تدرب  معنا </h2>
                                </div>
                                <div class="card-body">
                                    <form class="form form-vertical" id="createBookForm"
                                          action="{{ route('admin.trainings.store') }}" method="POST"
                                          class="was-validated"
                                          enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="name_ar">الاسم باللغه العربيه</label>
                                                    <input type="text" id="name_ar"
                                                           class="form-control @error('name_ar') is-invalid @enderror"
                                                           name="name_ar"
                                                           value="{{ old('name_ar') }}"/>
                                                    @error('name_ar')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="name_en">الاسم باللغه الانجليزيه</label>
                                                    <input type="text" id="name_en"
                                                           class="form-control @error('name_en') is-invalid @enderror"
                                                           name="name_en"
                                                           value="{{ old('name_en') }}"/>
                                                    @error('name_en')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="description_ar">الوصف باللغه العربيه</label>
                                                    <textarea
                                                        class="form-control @error('description_ar') is-invalid @enderror"
                                                        name="description_ar" id="description_ar"
                                                        rows="5">{{ old('description_ar') }}</textarea>
                                                    @error('description_ar')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>


                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="description_en">الوصف باللغه الانجليزيه</label>
                                                    <textarea
                                                        class="form-control @error('description_en') is-invalid @enderror"
                                                        name="description_en" id="description_en"
                                                        rows="5">{{ old('description_en') }}</textarea>
                                                    @error('description_en')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="icon" class="form-label">الايقونه</label>
                                                    <input
                                                        class="form-control icon @error('icon') is-invalid @enderror"
                                                        type="file" id="icon"
                                                        name="icon" accept=".jpg,.jpeg,.png,.svg">
                                                    @error('icon')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group  prev">
                                                    <img src="" style="width: 100px"
                                                         class="img-thumbnail preview-formFile" alt="">
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
        <script src="{{ asset('dashboard/app-assets/js/custom/preview-image.js') }}"></script>
    @endpush
@endsection
