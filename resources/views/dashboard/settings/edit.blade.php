@php use App\Helpers\Image; @endphp
@extends('dashboard.layouts.app')
@section('title', 'الاعدادات')
@section('content')
    {{--    @push('js')--}}
    {{--        <link rel="stylesheet" href="{{ url('intlTelInput.min.css') }}" type="text/css"/>--}}
    {{--    @endpush--}}
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
                                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">الرئيسية</a>
                                    </li>
                                    <li class="breadcrumb-item active">تعديل
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="content-body">

                <!-- Validation -->
                <section class="bs-validation">
                    <div class="row">
                        <!-- Bootstrap Validation -->
                        <div class="col-md-12 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">الاعدادات</h4>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('admin.settings.store') }}" method="POST"
                                          class="needs-validation" enctype="multipart/form-data" novalidate>
                                        @csrf
                                        <div class="row">
                                            @foreach($settings as $setting)
                                                @if($setting->type == 'text' && $setting->key == 'site_name_ar')
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label"
                                                                   for="{{$setting->key}}">{{$setting->key_ar}}</label>
                                                            <input type="text" id="{{$setting->key}}"
                                                                   name="{{$setting->key}}" value="{{$setting->value}}"
                                                                   class="form-control image" aria-label="Name"
                                                                   aria-describedby="basic-addon-name" require="">
                                                            <div class="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                @elseif($setting->type == 'text' && $setting->key == 'site_name_en')
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label"
                                                                   for="{{$setting->key}}">{{$setting->key_ar}}</label>
                                                            <input type="text" id="{{$setting->key}}"
                                                                   name="{{$setting->key}}" value="{{$setting->value}}"
                                                                   class="form-control image" aria-label="Name"
                                                                   aria-describedby="basic-addon-name" require="">
                                                            <div class="">
                                                                @if ($errors->has($setting->key))
                                                                    <span class="help-block">
                                                                    <strong
                                                                        style="color: red;">{{ $errors->first($setting->key) }}</strong>
                                                                </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif

                                                @if($setting->type == 'file' && $setting->key == 'logo')
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label"
                                                                   for="{{$setting->key}}">{{$setting->key_ar}}</label>
                                                            <input type="file" id="{{$setting->key}}"
                                                                   name="{{$setting->key}}"
                                                                   value="{{$setting->value}}"
                                                                   class="form-control image" aria-label="Name"
                                                                   accept=".jpg,.jpeg,.png,.gif,.svg">
                                                            <div class="">
                                                                @if ($errors->has($setting->key))
                                                                    <span class="help-block">
                                                                    <strong
                                                                        style="color: red;">{{ $errors->first($setting->key) }}</strong>
                                                                </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="form-group prev">
                                                            <img
                                                                src="{{ Image::getImage('uploads/',$setting->value) }}"
                                                                style="width: 100px"
                                                                class="img-thumbnail preview-{{ $setting->key }}"
                                                                alt="">
                                                        </div>
                                                    </div>

                                                @elseif($setting->type == 'file' && $setting->key == 'about_us_image')
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label"
                                                                   for="{{$setting->key}}">{{$setting->key_ar}}</label>
                                                            <input type="file" id="{{$setting->key}}"
                                                                   name="{{$setting->key}}"
                                                                   value="{{$setting->value}}"
                                                                   class="form-control image" aria-label="Name"
                                                                   accept=".jpg,.jpeg,.png,.gif,.svg"
                                                                   aria-describedby="basic-addon-name"
                                                                   require="">
                                                            <div class="">
                                                                @if ($errors->has($setting->key))
                                                                    <span class="help-block">
                                                                    <strong
                                                                        style="color: red;">{{ $errors->first($setting->key) }}</strong>
                                                                </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="form-group prev">
                                                            <img
                                                                src="{{ Image::getImage('uploads/',$setting->value) }}"
                                                                style="width: 100px"
                                                                class="img-thumbnail preview-{{ $setting->key }}"
                                                                alt="">
                                                        </div>
                                                    </div>
                                                @elseif($setting->type == 'file' && $setting->key == 'favicon')
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label"
                                                                   for="{{$setting->key}}">{{$setting->key_ar}}</label>
                                                            <input type="file" id="{{$setting->key}}"
                                                                   name="{{$setting->key}}"
                                                                   value="{{$setting->value}}"
                                                                   class="form-control image" aria-label="Name"
                                                                   accept=".jpg,.jpeg,.png,.gif,.svg"
                                                                   aria-describedby="basic-addon-name"
                                                                   require="">
                                                            <div class="">
                                                                @if ($errors->has($setting->key))
                                                                    <span class="help-block">
                                                                    <strong
                                                                        style="color: red;">{{ $errors->first($setting->key) }}</strong>
                                                                </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="form-group prev">
                                                            <img
                                                                src="{{ Image::getImage('uploads/',$setting->value) }}"
                                                                style="width: 100px"
                                                                class="img-thumbnail preview-{{ $setting->key }}"
                                                                alt="">
                                                        </div>
                                                    </div>

                                                @elseif($setting->type == 'file' && $setting->key == 'our_feature_image')
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label"
                                                                   for="{{$setting->key}}">{{$setting->key_ar}}</label>
                                                            <input type="file" id="{{$setting->key}}"
                                                                   name="{{$setting->key}}"
                                                                   value="{{$setting->value}}"
                                                                   class="form-control image" aria-label="Name"
                                                                   accept=".jpg,.jpeg,.png,.gif,.svg"
                                                                   aria-describedby="basic-addon-name"
                                                                   require="">
                                                            <div class="">
                                                                @if ($errors->has($setting->key))
                                                                    <span class="help-block">
                                                                    <strong
                                                                        style="color: red;">{{ $errors->first($setting->key) }}</strong>
                                                                </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="form-group prev">
                                                            <img
                                                                src="{{ Image::getImage('uploads/',$setting->value) }}"
                                                                style="width: 100px"
                                                                class="img-thumbnail preview-{{ $setting->key }}"
                                                                alt="">
                                                        </div>
                                                    </div>

                                                @elseif($setting->type == 'file' && $setting->key == 'our_training_image')
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="form-label"
                                                                   for="{{$setting->key}}">{{$setting->key_ar}}</label>
                                                            <input type="file" id="{{$setting->key}}"
                                                                   name="{{$setting->key}}"
                                                                   value="{{$setting->value}}"
                                                                   class="form-control image" aria-label="Name"
                                                                   accept=".jpg,.jpeg,.png,.gif,.svg"
                                                                   aria-describedby="basic-addon-name"
                                                                   require="">
                                                            <div class="">
                                                                @if ($errors->has($setting->key))
                                                                    <span class="help-block">
                                                                    <strong
                                                                        style="color: red;">{{ $errors->first($setting->key) }}</strong>
                                                                </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="form-group prev">
                                                            <img
                                                                src="{{ Image::getImage('uploads/',$setting->value) }}"
                                                                style="width: 100px"
                                                                class="img-thumbnail preview-{{ $setting->key }}"
                                                                alt="">
                                                        </div>
                                                    </div>
                                                @endif

                                                @if($setting->type == 'textarea' && $setting->key == 'description_ar')
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label"
                                                                   for="{{$setting->key}}">{{$setting->key_ar}}</label>
                                                            <textarea name="{{$setting->key}}"
                                                                      class="form-control"
                                                                      id="{{$setting->key}}" cols="30" rows="10"
                                                                      require="">{{$setting->value}}</textarea>
                                                            <div class="">
                                                                @if ($errors->has($setting->key))
                                                                    <span class="help-block">
                                                                    <strong
                                                                        style="color: red;">{{ $errors->first($setting->key) }}</strong>
                                                                </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                @elseif($setting->type == 'textarea' && $setting->key == 'description_en')
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label"
                                                                   for="{{$setting->key}}">{{$setting->key_ar}}</label>
                                                            <textarea name="{{$setting->key}}"
                                                                      class="form-control"
                                                                      id="{{$setting->key}}" cols="30" rows="10"
                                                                      require="">{{$setting->value}}</textarea>
                                                            <div class="">
                                                                @if ($errors->has($setting->key))
                                                                    <span class="help-block">
                                                                    <strong
                                                                        style="color: red;">{{ $errors->first($setting->key) }}</strong>
                                                                </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                @elseif($setting->type == 'textarea' && $setting->key == 'about_us_ar')
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label"
                                                                   for="{{$setting->key}}">{{$setting->key_ar}}</label>
                                                            <textarea name="{{$setting->key}}"
                                                                      class="form-control"
                                                                      id="{{$setting->key}}" cols="30" rows="10"
                                                                      require="">{{$setting->value}}</textarea>
                                                            <div class="">
                                                                @if ($errors->has($setting->key))
                                                                    <span class="help-block">
                                                                    <strong
                                                                        style="color: red;">{{ $errors->first($setting->key) }}</strong>
                                                                </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                @elseif($setting->type == 'textarea' && $setting->key == 'about_us_en')
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label"
                                                                   for="{{$setting->key}}">{{$setting->key_ar}}</label>
                                                            <textarea name="{{$setting->key}}"
                                                                      class="form-control"
                                                                      id="{{$setting->key}}" cols="30" rows="10"
                                                                      require="">{{$setting->value}}</textarea>
                                                            <div class="">
                                                                @if ($errors->has($setting->key))
                                                                    <span class="help-block">
                                                                    <strong
                                                                        style="color: red;">{{ $errors->first($setting->key) }}</strong>
                                                                </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                @elseif($setting->type == 'textarea' && $setting->key == 'our_vision_ar')
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label"
                                                                   for="{{$setting->key}}">{{$setting->key_ar}}</label>
                                                            <textarea name="{{$setting->key}}"
                                                                      class="form-control"
                                                                      id="{{$setting->key}}" cols="30" rows="10"
                                                                      require="">{{$setting->value}}</textarea>
                                                            <div class="">
                                                                @if ($errors->has($setting->key))
                                                                    <span class="help-block">
                                                                    <strong
                                                                        style="color: red;">{{ $errors->first($setting->key) }}</strong>
                                                                </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                @elseif($setting->type == 'textarea' && $setting->key == 'our_vision_en')
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label"
                                                                   for="{{$setting->key}}">{{$setting->key_ar}}</label>
                                                            <textarea name="{{$setting->key}}"
                                                                      class="form-control"
                                                                      id="{{$setting->key}}" cols="30" rows="10"
                                                                      require="">{{$setting->value}}</textarea>
                                                            <div class="">
                                                                @if ($errors->has($setting->key))
                                                                    <span class="help-block">
                                                                    <strong
                                                                        style="color: red;">{{ $errors->first($setting->key) }}</strong>
                                                                </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                @elseif($setting->type == 'textarea' && $setting->key == 'our_message_en')
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label"
                                                                   for="{{$setting->key}}">{{$setting->key_ar}}</label>
                                                            <textarea name="{{$setting->key}}"
                                                                      class="form-control"
                                                                      id="{{$setting->key}}" cols="30" rows="10"
                                                                      require="">{{$setting->value}}</textarea>
                                                            <div class="">
                                                                @if ($errors->has($setting->key))
                                                                    <span class="help-block">
                                                                    <strong
                                                                        style="color: red;">{{ $errors->first($setting->key) }}</strong>
                                                                </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                @elseif($setting->type == 'textarea' && $setting->key == 'our_message_ar')
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label"
                                                                   for="{{$setting->key}}">{{$setting->key_ar}}</label>
                                                            <textarea name="{{$setting->key}}"
                                                                      class="form-control"
                                                                      id="{{$setting->key}}" cols="30" rows="10"
                                                                      require="">{{$setting->value}}</textarea>
                                                            <div class="">
                                                                @if ($errors->has($setting->key))
                                                                    <span class="help-block">
                                                                    <strong
                                                                        style="color: red;">{{ $errors->first($setting->key) }}</strong>
                                                                </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>

                                                @elseif($setting->type == 'textarea' && $setting->key == 'our_service_ar')
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label"
                                                                   for="{{$setting->key}}">{{$setting->key_ar}}</label>
                                                            <textarea name="{{$setting->key}}"
                                                                      class="form-control"
                                                                      id="{{$setting->key}}" cols="30" rows="10"
                                                                      require="">{{$setting->value}}</textarea>
                                                            <div class="">
                                                                @if ($errors->has($setting->key))
                                                                    <span class="help-block">
                                                                    <strong
                                                                        style="color: red;">{{ $errors->first($setting->key) }}</strong>
                                                                </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>

                                                @elseif($setting->type == 'textarea' && $setting->key == 'our_service_en')
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label"
                                                                   for="{{$setting->key}}">{{$setting->key_ar}}</label>
                                                            <textarea name="{{$setting->key}}"
                                                                      class="form-control"
                                                                      id="{{$setting->key}}" cols="30" rows="10"
                                                                      require="">{{$setting->value}}</textarea>
                                                            <div class="">
                                                                @if ($errors->has($setting->key))
                                                                    <span class="help-block">
                                                                    <strong
                                                                        style="color: red;">{{ $errors->first($setting->key) }}</strong>
                                                                </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>

                                                    @elseif($setting->type == 'textarea' && $setting->key == 'our_feature_ar')
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label"
                                                                   for="{{$setting->key}}">{{$setting->key_ar}}</label>
                                                            <textarea name="{{$setting->key}}"
                                                                      class="form-control"
                                                                      id="{{$setting->key}}" cols="30" rows="10"
                                                                      require="">{{$setting->value}}</textarea>
                                                            <div class="">
                                                                @if ($errors->has($setting->key))
                                                                    <span class="help-block">
                                                                    <strong
                                                                        style="color: red;">{{ $errors->first($setting->key) }}</strong>
                                                                </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>

                                                @elseif($setting->type == 'textarea' && $setting->key == 'our_feature_en')
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label"
                                                                   for="{{$setting->key}}">{{$setting->key_ar}}</label>
                                                            <textarea name="{{$setting->key}}"
                                                                      class="form-control"
                                                                      id="{{$setting->key}}" cols="30" rows="10"
                                                                      require="">{{$setting->value}}</textarea>
                                                            <div class="">
                                                                @if ($errors->has($setting->key))
                                                                    <span class="help-block">
                                                                    <strong
                                                                        style="color: red;">{{ $errors->first($setting->key) }}</strong>
                                                                </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>

                                                @elseif($setting->type == 'textarea' && $setting->key == 'our_feature_desc_ar')
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label"
                                                                   for="{{$setting->key}}">{{$setting->key_ar}}</label>
                                                            <textarea name="{{$setting->key}}"
                                                                      class="form-control"
                                                                      id="{{$setting->key}}" cols="30" rows="10"
                                                                      require="">{{$setting->value}}</textarea>
                                                            <div class="">
                                                                @if ($errors->has($setting->key))
                                                                    <span class="help-block">
                                                                    <strong
                                                                        style="color: red;">{{ $errors->first($setting->key) }}</strong>
                                                                </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>

                                                @elseif($setting->type == 'textarea' && $setting->key == 'our_feature_desc_en')
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label"
                                                                   for="{{$setting->key}}">{{$setting->key_ar}}</label>
                                                            <textarea name="{{$setting->key}}"
                                                                      class="form-control"
                                                                      id="{{$setting->key}}" cols="30" rows="10"
                                                                      require="">{{$setting->value}}</textarea>
                                                            <div class="">
                                                                @if ($errors->has($setting->key))
                                                                    <span class="help-block">
                                                                    <strong
                                                                        style="color: red;">{{ $errors->first($setting->key) }}</strong>
                                                                </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>

                                                    @elseif($setting->type == 'textarea' && $setting->key == 'our_training_desc_ar')
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label"
                                                                   for="{{$setting->key}}">{{$setting->key_ar}}</label>
                                                            <textarea name="{{$setting->key}}"
                                                                      class="form-control"
                                                                      id="{{$setting->key}}" cols="30" rows="10"
                                                                      require="">{{$setting->value}}</textarea>
                                                            <div class="">
                                                                @if ($errors->has($setting->key))
                                                                    <span class="help-block">
                                                                    <strong
                                                                        style="color: red;">{{ $errors->first($setting->key) }}</strong>
                                                                </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>

                                                    @elseif($setting->type == 'textarea' && $setting->key == 'our_training_desc_en')
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label"
                                                                   for="{{$setting->key}}">{{$setting->key_ar}}</label>
                                                            <textarea name="{{$setting->key}}"
                                                                      class="form-control"
                                                                      id="{{$setting->key}}" cols="30" rows="10"
                                                                      require="">{{$setting->value}}</textarea>
                                                            <div class="">
                                                                @if ($errors->has($setting->key))
                                                                    <span class="help-block">
                                                                    <strong
                                                                        style="color: red;">{{ $errors->first($setting->key) }}</strong>
                                                                </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>

                                                    @elseif($setting->type == 'textarea' && $setting->key == 'call_us_desc_ar')
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label"
                                                                   for="{{$setting->key}}">{{$setting->key_ar}}</label>
                                                            <textarea name="{{$setting->key}}"
                                                                      class="form-control"
                                                                      id="{{$setting->key}}" cols="30" rows="10"
                                                                      require="">{{$setting->value}}</textarea>
                                                            <div class="">
                                                                @if ($errors->has($setting->key))
                                                                    <span class="help-block">
                                                                    <strong
                                                                        style="color: red;">{{ $errors->first($setting->key) }}</strong>
                                                                </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>

                                                    @elseif($setting->type == 'textarea' && $setting->key == 'call_us_desc_en')
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label"
                                                                   for="{{$setting->key}}">{{$setting->key_ar}}</label>
                                                            <textarea name="{{$setting->key}}"
                                                                      class="form-control"
                                                                      id="{{$setting->key}}" cols="30" rows="10"
                                                                      require="">{{$setting->value}}</textarea>
                                                            <div class="">
                                                                @if ($errors->has($setting->key))
                                                                    <span class="help-block">
                                                                    <strong
                                                                        style="color: red;">{{ $errors->first($setting->key) }}</strong>
                                                                </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif

                                                @if($setting->type == 'email' && $setting->key == 'email')
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label"
                                                                   for="{{$setting->key}}">{{$setting->key_ar}}</label>
                                                            <input type="email" id="{{$setting->key}}"
                                                                   name="{{$setting->key}}"
                                                                   value="{{$setting->value}}"
                                                                   class="form-control image" aria-label="Name"
                                                                   aria-describedby="basic-addon-name"
                                                                   require="">
                                                            <div class="">
                                                                @if ($errors->has($setting->key))
                                                                    <span class="help-block">
                                                                    <strong
                                                                        style="color: red;">{{ $errors->first($setting->key) }}</strong>
                                                                </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                @elseif($setting->type == 'number' && $setting->key == 'phone')
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label"
                                                                   for="{{$setting->key}}">{{$setting->key_ar}}</label>
                                                            <input type="text" id="{{$setting->key}}"
                                                                   name="{{$setting->key}}"
                                                                   value="{{$setting->value}}"
                                                                   class="form-control image" aria-label="Name"
                                                                   aria-describedby="basic-addon-name"
                                                                   require="">
                                                            <div class="">
                                                                @if ($errors->has($setting->key))
                                                                    <span class="help-block">
                                                                    <strong
                                                                        style="color: red;">{{ $errors->first($setting->key) }}</strong>
                                                                </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                @elseif($setting->type == 'number' && $setting->key == 'experience')
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label"
                                                                   for="{{$setting->key}}">{{$setting->key_ar}}</label>
                                                            <input type="text" id="{{$setting->key}}"
                                                                   name="{{$setting->key}}"
                                                                   value="{{$setting->value}}"
                                                                   class="form-control image" aria-label="Name"
                                                                   aria-describedby="basic-addon-name"
                                                                   require="">
                                                            <div class="">
                                                                @if ($errors->has($setting->key))
                                                                    <span class="help-block">
                                                                    <strong
                                                                        style="color: red;">{{ $errors->first($setting->key) }}</strong>
                                                                </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>

                                                @elseif($setting->type == 'number' && $setting->key == 'other_phone')
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label"
                                                                   for="{{$setting->key}}">{{$setting->key_ar}}</label>
                                                            <input type="text" id="{{$setting->key}}"
                                                                   name="{{$setting->key}}"
                                                                   value="{{$setting->value}}"
                                                                   class="form-control image" aria-label="Name"
                                                                   aria-describedby="basic-addon-name"
                                                                   require="">
                                                            <div class="">
                                                                @if ($errors->has($setting->key))
                                                                    <span class="help-block">
                                                                    <strong
                                                                        style="color: red;">{{ $errors->first($setting->key) }}</strong>
                                                                </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif

                                                @if($setting->type == 'text' && $setting->key == 'copy_right_ar')
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label"
                                                                   for="{{$setting->key}}">{{$setting->key_ar}}</label>
                                                            <input type="text" id="{{$setting->key}}"
                                                                   name="{{$setting->key}}"
                                                                   value="{{$setting->value}}"
                                                                   class="form-control image" aria-label="Name"
                                                                   aria-describedby="basic-addon-name"
                                                                   require="">
                                                            <div class="">
                                                                @if ($errors->has($setting->key))
                                                                    <span class="help-block">
                                                                    <strong
                                                                        style="color: red;">{{ $errors->first($setting->key) }}</strong>
                                                                </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                @elseif($setting->type == 'text' && $setting->key == 'copy_right_en')
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label"
                                                                   for="{{$setting->key}}">{{$setting->key_ar}}</label>
                                                            <input type="text" id="{{$setting->key}}"
                                                                   name="{{$setting->key}}"
                                                                   value="{{$setting->value}}"
                                                                   class="form-control image" aria-label="Name"
                                                                   aria-describedby="basic-addon-name"
                                                                   require="">
                                                            <div class="">
                                                                @if ($errors->has($setting->key))
                                                                    <span class="help-block">
                                                                    <strong
                                                                        style="color: red;">{{ $errors->first($setting->key) }}</strong>
                                                                </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                @elseif($setting->type == 'text' && $setting->key == 'website')
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="form-label"
                                                                   for="{{$setting->key}}">{{$setting->key_ar}}</label>
                                                            <input type="text" id="{{$setting->key}}"
                                                                   name="{{$setting->key}}"
                                                                   value="{{$setting->value}}"
                                                                   class="form-control image" aria-label="Name"
                                                                   aria-describedby="basic-addon-name"
                                                                   require="">
                                                            <div class="">
                                                                @if ($errors->has($setting->key))
                                                                    <span class="help-block">
                                                                    <strong
                                                                        style="color: red;">{{ $errors->first($setting->key) }}</strong>
                                                                </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                @elseif($setting->type == 'text' && $setting->key == 'facebook')
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label"
                                                                   for="{{$setting->key}}">{{$setting->key_ar}}</label>
                                                            <input type="text" id="{{$setting->key}}"
                                                                   name="{{$setting->key}}"
                                                                   value="{{$setting->value}}"
                                                                   class="form-control image" aria-label="Name"
                                                                   aria-describedby="basic-addon-name"
                                                                   require="">
                                                            <div class="">
                                                                @if ($errors->has($setting->key))
                                                                    <span class="help-block">
                                                                    <strong
                                                                        style="color: red;">{{ $errors->first($setting->key) }}</strong>
                                                                </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                @elseif($setting->type == 'text' && $setting->key == 'instagram')
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label"
                                                                   for="{{$setting->key}}">{{$setting->key_ar}}</label>
                                                            <input type="text" id="{{$setting->key}}"
                                                                   name="{{$setting->key}}"
                                                                   value="{{$setting->value}}"
                                                                   class="form-control image" aria-label="Name"
                                                                   aria-describedby="basic-addon-name"
                                                                   require="">
                                                            <div class="">
                                                                @if ($errors->has($setting->key))
                                                                    <span class="help-block">
                                                                    <strong
                                                                        style="color: red;">{{ $errors->first($setting->key) }}</strong>
                                                                </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                @elseif($setting->type == 'text' && $setting->key == 'snapchat')
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label"
                                                                   for="{{$setting->key}}">{{$setting->key_ar}}</label>
                                                            <input type="text" id="{{$setting->key}}"
                                                                   name="{{$setting->key}}"
                                                                   value="{{$setting->value}}"
                                                                   class="form-control image" aria-label="Name"
                                                                   aria-describedby="basic-addon-name"
                                                                   require="">
                                                            <div class="">
                                                                @if ($errors->has($setting->key))
                                                                    <span class="help-block">
                                                                    <strong
                                                                        style="color: red;">{{ $errors->first($setting->key) }}</strong>
                                                                </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                @elseif($setting->type == 'text' && $setting->key == 'twitter')
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label"
                                                                   for="{{$setting->key}}">{{$setting->key_ar}}</label>
                                                            <input type="text" id="{{$setting->key}}"
                                                                   name="{{$setting->key}}"
                                                                   value="{{$setting->value}}"
                                                                   class="form-control image" aria-label="Name"
                                                                   aria-describedby="basic-addon-name"
                                                                   require="">
                                                            <div class="">
                                                                @if ($errors->has($setting->key))
                                                                    <span class="help-block">
                                                                    <strong
                                                                        style="color: red;">{{ $errors->first($setting->key) }}</strong>
                                                                </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                @elseif($setting->type == 'text' && $setting->key == 'address')
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="form-label"
                                                                   for="{{$setting->key}}">{{$setting->key_ar}}</label>
                                                            <input type="text" id="{{$setting->key}}"
                                                                   name="{{$setting->key}}"
                                                                   value="{{$setting->value}}"
                                                                   class="form-control image" aria-label="Name"
                                                                   aria-describedby="basic-addon-name"
                                                                   require=""
                                                                   style="width: 70%; right: 0; left: 0">
                                                            <div id="map" style="height: 500px;"></div>
                                                            <div class="">
                                                                @if ($errors->has($setting->key))
                                                                    <span class="help-block">
                                                                    <strong
                                                                        style="color: red;">{{ $errors->first($setting->key) }}</strong>
                                                                </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                @if($setting->key == 'lat')
                                                    <input type="hidden" name="{{ $setting->key }}"
                                                           id="{{ $setting->key }}"
                                                           value="{{ $setting->value }}">
                                                @elseif($setting->key == 'lng')
                                                    <input type="hidden" name="{{ $setting->key }}"
                                                           id="{{ $setting->key }}"
                                                           value="{{ $setting->value }}">
                                                @endif

                                            @endforeach
                                        </div>

                                        <div class="row">
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary">تحديث <i
                                                        data-feather="edit"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- /Bootstrap Validation -->

                    </div>
                </section>
                <!-- /Validation -->

            </div>
        </div>
    </div>
    <!-- END: Content-->
    @push('js')
        <script src="{{ url('dashboard') }}/app-assets/js/custom/preview-image.js"></script>
        <script
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBdarVlRZOccFIGWJiJ2cFY8-Sr26ibiyY&libraries=places&callback=initAutocomplete&language=<?php echo e('ar'); ?>"
            defer></script>

        <script src="{{ url('dashboard') }}/app-assets/js/custom/map.js"></script>

        {{--        <script src="{{ url('dashboard') }}/app-assets/vendors/js/forms/select/select2.full.min.js"></script>--}}
        {{--        <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>--}}
        {{--        <script src="{{ url('intlTelInput.min.js') }}" type="text/javascript"></script>--}}
        {{--        <script src="{{ url('utils.js') }}" type="text/javascript"></script>--}}

        <script>
            $(".js-select-dynamic").select2({
                tags: true,
                width: '100%',
                tokenSeparators: [',', ' ']
            });

            $(document).on('click', '.remove-btn', function (e) {
                e.preventDefault();
                $(this).closest('.row').remove();
            });

            $('.add-btn').click(function (e) {
                e.preventDefault();
                var content = `<div class="row my-2">
                                    <div class="col-md-8">
                                        <input type="text" name="features[]"
                                            class="form-control"
                                            value="" required>
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
