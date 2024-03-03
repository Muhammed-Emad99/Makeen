@php use App\Helpers\Image; @endphp

@extends('dashboard.layouts.app')

@section('title', ' الاسليدر')

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
                                <li class="breadcrumb-item"><a href="{{ route('admin.features.index') }}">المميزات</a></li>
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
                                    href="{{ route('admin.features.create') }}"><i class="mr-1"
                                        data-feather="circle"></i><span class="align-middle">اضافه ميزه جديدة</span></a>
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
                                                <th>الوصف بالعربي </th>
                                                <th>الوصف بالانجليزي </th>
                                                <th>الايقونة</th>
                                                <th>الاجراءات</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($features as $feature)
                                                <tr>

                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{!! Str::limit($feature->description_ar, 50) !!}</td>
                                                    <td>{!! Str::limit($feature->description_en, 50) !!}</td>
                                                    <td class="image">
                                                        <a href="{{ Image::getImage('uploads/features/',$feature->icon) }}">
                                                            <img src="{{ Image::getImage('uploads/features/',$feature->icon) }}"
                                                                 style="width: 80px; height: auto;">
                                                        </a>
                                                    </td>

                                                    <td class="text-center">
                                                        <div class="btn-group" role="group" aria-label="Second group">
                                                            <a href="#" class="btn btn-info btn-circle btn-sm"
                                                            data-toggle="modal"
                                                            data-target="#exampleModalLong{{ $feature->id }}">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                            <a href="{{ route('admin.features.edit', $feature->id) }}"
                                                                class="btn btn-sm btn-primary"><i
                                                                    class="fa-solid fa-pen-to-square"></i></a>
                                                            <a href="{{ route('admin.features.destroy', $feature->id) }}"
                                                                data-id="{{ $feature->id }}"
                                                                class="btn btn-sm btn-danger item-delete"><i
                                                                    class="fa-solid fa-trash-can"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <div class="modal fade" id="exampleModalLong{{ $feature->id }}"
                                                    tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLongTitle">
                                                                    {{ __('المميزات') }}</h5>
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
                                                                                <b>{{ __('الوصف بالعربي') }} : </b>
                                                                            </div>
                                                                            <div class="col-lg-7">
                                                                                {!! $feature->description_ar !!}
                                                                            </div>
                                                                        </div>


                                                                        <div class="row mb-3">
                                                                            <div class="col-lg-5">
                                                                                <b>{{ __('الوصف بالانجليزي') }} : </b>
                                                                            </div>
                                                                            <div class="col-lg-7">
                                                                                {!! $feature->description_en !!}
                                                                            </div>
                                                                        </div>

                                                                        <div class="row mb-3">
                                                                            <div class="col-lg-5">
                                                                                <b>{{ __('الايقونة') }} : </b>
                                                                            </div>
                                                                            <div class="col-lg-7">
                                                                                <img height="44"
                                                                                    src="{{ Image::getImage('uploads/features/',$feature->icon) }}"
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
