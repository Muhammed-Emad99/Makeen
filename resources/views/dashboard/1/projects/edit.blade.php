@extends('dashboard.layouts.app')

@section('title', 'تعديل المشروع ')

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
                                    <li class="breadcrumb-item"><a href="{{ route('admin.projects.index') }}">المشروع</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">تعديل المشروع</a>
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
                                    href="{{ route('admin.projects.create') }}"><i class="mr-1"
                                        data-feather="check-square"></i><span class="align-middle">اضافة مشروع
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
                                    <h2 class="card-title">تعديل المشروع - {{ $project->name }}</h2>
                                </div>
                                <div class="card-body">
                                    <form class="form form-vertical" id="updateBookForm"
                                        action="{{ route('admin.projects.update', $project->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf
                                        <div class="row">

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="name_ar">الاسم باللغه العربيه</label>
                                                    <input type="text" id="name_ar" class="form-control" name="name_ar"
                                                        value="{{ old('name_ar', $project->name_ar) }}" />
                                                    @error('name_ar')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="name_en">الاسم باللغه الانجليزيه</label>
                                                    <input type="text" id="name_en" class="form-control" name="name_en"
                                                        value="{{ old('name_en', $project->name_en) }}" />
                                                    @error('name_en')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>



                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="desc">الوصف باللغه العربيه</label>
                                                    <textarea required class="form-control" name="desc_ar" id="desc_ar" rows="5">{{ old('desc_ar', $project->desc_ar) }}</textarea>
                                                    @error('desc_ar')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="desc">الوصف باللغه الانجليزيه</label>
                                                    <textarea required class="form-control" name="desc_en" id="desc_en" rows="5">{{ old('desc_en', $project->desc_ar) }}</textarea>
                                                    @error('desc_en')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>






                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="formFile" class="form-label">الصوره</label>
                                                    <input class="form-control image" type="file" id="formFile"
                                                    name="image" accept=".jpg,.jpeg,.png">
                                                    @error('image')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group prev">
                                                    <img src="{{ $project->image_path }}" style="width: 100px"
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
        <script src="{{ asset('dashboard/assets/js/custom/validation/bookForm.js') }}"></script>

        <script src="{{ asset('dashboard/app-assets/js/custom/preview-image.js') }}"></script>

        <script>
            $(document).on('click', '.remove-btn', function(e) {
                e.preventDefault();
                $(this).closest('.row').remove();
            });

            $('.add-btn').click(function(e) {
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
