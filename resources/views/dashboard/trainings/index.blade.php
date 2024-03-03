@php use App\Helpers\Image; @endphp
@extends('dashboard.layouts.app')

@section('title', ' تدرب  معنا')

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
                                <li class="breadcrumb-item"><a href="{{ route('admin.trainings.index') }}">تدرب معنا</a>
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
                                                                              href="{{ route('admin.trainings.create') }}"><i
                                        class="mr-1"
                                        data-feather="circle"></i><span
                                        class="align-middle">اضافه تدرب  معنا جديدة</span></a>
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
                                            <th>الاسم بالعربي</th>
                                            <th>الاسم بالانجليزي</th>
                                            <th>الوصف بالعربي</th>
                                            <th>الوصف بالانجليزي</th>
                                            <th>الايقونة</th>
                                            <th>الاجراءات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($trainings as $training)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $training->name_ar }}</td>
                                                <td>{{ $training->name_en }}</td>
                                                <td>{!! \Str::limit($training->description_ar,50) !!}</td>
                                                <td>{!!  \Str::limit($training->description_en,50) !!}</td>
                                                <td class="image">
                                                    <a href="{{ Image::getImage('uploads/trainings/',$training->icon) }}">
                                                        <img
                                                            src="{{ Image::getImage('uploads/trainings/',$training->icon) }}"
                                                            style="width: 80px; height: auto;">
                                                    </a>
                                                </td>

                                                <td class="text-center">
                                                    <div class="btn-group" role="group" aria-label="Second group">
                                                        <a href="{{ route('admin.trainings.edit', $training->id) }}"
                                                           class="btn btn-sm btn-primary"><i
                                                                class="fa-solid fa-pen-to-square"></i></a>
                                                        <a href="{{ route('admin.trainings.destroy', $training->id) }}"
                                                           data-id="{{ $training->id }}"
                                                           class="btn btn-sm btn-danger item-delete"><i
                                                                class="fa-solid fa-trash-can"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
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
