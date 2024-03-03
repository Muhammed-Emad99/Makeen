@extends('dashboard.layouts.app')

@section('title', 'اضافه خدمات')

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
                                    <li class="breadcrumb-item"><a href="{{ route('admin.services.index') }}">
                                            الخدمات </a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">اضافة خدمات </a>
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
                                    <h2 class="card-title">اضافة خدمات</h2>
                                </div>
                                <div class="card-body">
                                    @if(count($categories) > 0)
                                        <form class="form form-vertical" id="createBookForm"
                                              action="{{ route('admin.services.store') }}" method="POST"
                                              class="was-validated"
                                              enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">

                                                <div class="col-6">
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

                                                <div class="col-6">
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


                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="image" class="form-label">الصوره</label>
                                                        <input
                                                            class="form-control image @error('image') is-invalid @enderror"
                                                            type="file" id="image"
                                                            name="image" accept=".jpg,.jpeg,.png,.svg">
                                                        @error('image')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group prev">
                                                        <img src="" style="width: 100px"
                                                             class="img-thumbnail preview-formFile" alt="">
                                                    </div>
                                                </div>

                                                <div class="col-6">
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
                                                    
                                                    <div class="form-group prev">
                                                        <img src="" style="width: 100px"
                                                             class="img-thumbnail preview-formFile" alt="">
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="category_id">القسم</label>
                                                        <select
                                                            class="form-control @error('category_id') is-invalid @enderror"
                                                            name="category_id" id="category_id">
                                                            <option value="">اختر القسم</option>
                                                            @foreach($categories as $category)
                                                                <option
                                                                    value="{{ $category->id }}" @selected(old('category_id') == $category->id)>{{ $category->title_ar }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('category_id')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <button type="submit" class="btn btn-primary mr-1">اضافة</button>
                                                </div>
                                            </div>
                                        </form>
                                    @else
                                        <h5 class="text-center">
                                            لابد من اضافة قسم اولا.
                                            <a href="{{ route('admin.categories.create') }}">اضغط هنا للاضافة</a>
                                        </h5>
                                    @endif
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
