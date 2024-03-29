@php use App\Helpers\Image; @endphp

@extends('dashboard.layouts.app')

@section('title', 'تعديل تدرب  معنا')

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
                                    <li class="breadcrumb-item"><a href="{{ route('admin.trainings.index') }}"> تدرب  معنا </a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">تعديل تدرب  معنا  </a>
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
                                    href="{{ route('admin.trainings.create') }}"><i class="mr-1"
                                        data-feather="check-square"></i><span class="align-middle">اضافة تدرب  معنا
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
                                    <h2 class="card-title">تعديل تدرب  معنا</h2>
                                </div>
                                <div class="card-body">
                                    <form class="form form-vertical" id="createBookForm"
                                        action="{{ route('admin.trainings.update', $training->id) }}" method="POST" class="was-validated"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('put')
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="name_ar">الاسم باللغه بالعربي</label>
                                                    <input type="text" id="name_ar" class="form-control @error('name_ar') is-invalid @enderror"
                                                        name="name_ar" required
                                                        value="{{ old('name_ar', $training->name_ar) }}" />
                                                    @error('name_ar')
                                                        <div class="invalid-feedback">{{$message}}</div>
                                                    @enderror
                                                </div>

                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="name_en">الاسم باللغه الانجليزيه</label>
                                                    <input type="text" id="name_en" class="form-control @error('name_en') is-invalid @enderror"
                                                        name="name_en" required
                                                        value="{{ old('name_en', $training->name_en) }}" />
                                                    @error('title_en')
                                                    <div class="invalid-feedback">{{$message}}</div>
                                                    @enderror
                                                </div>

                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="description_ar">الوصف باللغه العربيه</label>
                                                    <textarea
                                                        class="form-control @error('description_ar') is-invalid @enderror"
                                                        name="description_ar" id="description_ar"
                                                        rows="5">{{ old('description_ar',$training->description_ar) }}</textarea>
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
                                                        rows="5">{{ old('description_en', $training->description_en) }}</textarea>
                                                    @error('description_en')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="formFile" class="form-label">الايقونه</label>
                                                    <input class="form-control image @error('icon') is-invalid @enderror" type="file" id="formFile"
                                                        name="icon" accept=".jpg,.jpeg,.png"
                                                        value="{{ $training->icon }}">
                                                    @error('icon')
                                                    <div class="invalid-feedback">{{$message}}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group prev">
                                                    <img src="{{ Image::getImage('uploads/trainings/',$training->icon) }}" style="width: 100px"
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
