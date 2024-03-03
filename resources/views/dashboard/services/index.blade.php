@php use App\Helpers\Image; @endphp
@extends('dashboard.layouts.app')

@section('title', ' الخدمات')

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">

                    <div class="d-flex justify-content-start breadcrumb-wrapper">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb ml-1">
                                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">الرئيسيه</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.services.index') }}">الخدمات</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">العرض</li>
                            </ol>
                        </nav>
                    </div>


                </div>
                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                    <div class="form-group breadcrumb-right">
                        <div class="dropdown">
                            <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                    data-feather="grid"></i></button>
                            <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item"
                                                                              href="{{ route('admin.services.create') }}"><i
                                        class="mr-1"
                                        data-feather="circle"></i><span
                                        class="align-middle">اضافة خدمه جديده </span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic table -->
                <section id="basic-datatable">
                    <div class="row">
                        <div class="col-12">

                            <div class="card">
                                <div class="table-section">
                                    <table class="datatables-basic table">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>الاسم</th>
                                            <th>الوصف</th>
                                            <th>الصوره</th>
                                            <th>الايقونة</th>
                                            <th>القسم</th>
                                            <th>الاجراءات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($services as $service)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $service->name_ar }}</td>
                                                <td>{!! Str::limit($service->description_ar, 100) !!}</td>
                                                <td class="image">
                                                    <a href="{{ Image::getImage('uploads/services/',$service->image) }}">
                                                        <img
                                                            src="{{ Image::getImage('uploads/services/',$service->image) }}"
                                                            style="width: 80px; height: auto;">
                                                    </a>
                                                </td>
                                                <td class="image">
                                                    <a href="{{ Image::getImage('uploads/services/',$service->icon) }}">
                                                        <img
                                                            src="{{ Image::getImage('uploads/services/',$service->icon) }}"
                                                            style="width: 80px; height: auto;">
                                                    </a>
                                                </td>
                                                <td>{{ $service->category->title_ar }}</td>

                                                <td class="text-center">
                                                    <div class="btn-group" role="group" aria-label="Second group">
                                                        <a href="#" class="btn btn-info btn-circle btn-sm"
                                                           data-toggle="modal"
                                                           data-target="#exampleModalLong{{ $service->id }}">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                        <a href="{{ route('admin.services.edit', $service->id) }}"
                                                           class="btn btn-sm btn-primary"><i
                                                                class="fa-solid fa-pen-to-square"></i></a>
                                                        <a href="{{ route('admin.services.destroy', $service->id) }}"
                                                           data-id="{{ $service->id }}"
                                                           class="btn btn-sm btn-danger item-delete"><i
                                                                class="fa-solid fa-trash-can"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>

                                            <div class="modal fade" id="exampleModalLong{{ $service->id }}"
                                                 tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
                                                 aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">
                                                                {{ __('الخدمة') }}</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-lg-12">

                                                                    <div class="row mb-3">
                                                                        <div class="col-lg-5">
                                                                            <b>{{ __('الاسم بالعربي') }} : </b>
                                                                        </div>
                                                                        <div class="col-lg-7">

                                                                            {{ $service->name_ar }}
                                                                        </div>
                                                                    </div>

                                                                    <div class="row mb-3">
                                                                        <div class="col-lg-5">
                                                                            <b>{{ __('الاسم بالانجليزي') }} : </b>
                                                                        </div>
                                                                        <div class="col-lg-7">

                                                                            {{ $service->name_en }}
                                                                        </div>
                                                                    </div>


                                                                    <div class="row mb-3">
                                                                        <div class="col-lg-5">
                                                                            <b>{{ __('الوصف بالعربي') }} : </b>
                                                                        </div>
                                                                        <div class="col-lg-7">
                                                                            {{ strip_tags($service->description_ar) }}
                                                                        </div>
                                                                    </div>


                                                                    <div class="row mb-3">
                                                                        <div class="col-lg-5">
                                                                            <b>{{ __('الوصف بالانجليزي') }} : </b>
                                                                        </div>
                                                                        <div class="col-lg-7">
                                                                            {{ strip_tags($service->description_en) }}
                                                                        </div>
                                                                    </div>

                                                                    <div class="row mb-3">
                                                                        <div class="col-lg-5">
                                                                            <b>{{ __('القسم بالعربي') }} : </b>
                                                                        </div>
                                                                        <div class="col-lg-7">
                                                                            {{ $service->category->title_ar }}
                                                                        </div>
                                                                    </div>

                                                                    <div class="row mb-3">
                                                                        <div class="col-lg-5">
                                                                            <b>{{ __('القسم بالانجليزي') }} : </b>
                                                                        </div>
                                                                        <div class="col-lg-7">
                                                                            {{ $service->category->title_en }}
                                                                        </div>
                                                                    </div>

                                                                    <div class="row mb-3">
                                                                        <div class="col-lg-5">
                                                                            <b>{{ __('الصوره') }} : </b>
                                                                        </div>
                                                                        <div class="col-lg-7">
                                                                            <img height="44"
                                                                                 src="{{ Image::getImage('uploads/services/',$service->image) }}"
                                                                                 alt="">
                                                                        </div>
                                                                    </div>

                                                                    <div class="row mb-3">
                                                                        <div class="col-lg-5">
                                                                            <b>{{ __('الايقونة') }} : </b>
                                                                        </div>
                                                                        <div class="col-lg-7">
                                                                            <img height="44"
                                                                                 src="{{ Image::getImage('uploads/services/',$service->icon) }}"
                                                                                 alt="">
                                                                        </div>
                                                                    </div>


                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-primary"
                                                                    data-dismiss="modal">{{ __('إغلاق') }}</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--/ Basic table -->
            </div>
        </div>
    </div>
    <!-- END: Content-->
    @push('js')
        <script src="{{ asset('dashboard/app-assets/js/custom/custom-delete.js') }}"></script>
    @endpush
@endsection
