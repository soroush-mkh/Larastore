@extends('admin.layouts.master')

@section('head-tag')
    <title>تنظیمات</title>
@endsection

@section('content')
    {{--breadcumb--}}
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"><a href="#">تنظیمات</a></li>
            <li class="breadcrumb-item active font-size-12" aria-current="page"> ویرایش تنظیمات</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h4>ویرایش تنظیمات</h4>
                </section>
                <section class="d-flex justify-content-between align-content-center mt-4 mb-3 border-bottom">
                    <a href="{{route('admin.setting.index')}}" class="btn btn-info stn-sm mb-4">بازگشت</a>
                </section>
                <section>
                    <form action="{{route('admin.setting.update',$setting->id)}}"
                          id="form"
                          method="post"
                          enctype="multipart/form-data">
                        @csrf
                        {{method_field('put')}}
                        <section class="row">

                            {{--Title--}}
                            <section class="col-12">
                                <div class="form-group">
                                    <label for="name">عنوان سایت</label>
                                    <input type="text"
                                           class="form-control form-control-sm"
                                           name="title"
                                           id="name"
                                           value="{{old('title',$setting->title)}}">
                                </div>
                                @error('title')
                                <span class="alert_required bg-danger text-white p-1 rounded">
                                        <strong>
                                            {{$message}}
                                        </strong>
                                    </span>
                                @enderror
                            </section>

                            {{--Description--}}
                            <section class="col-12">
                                <div class="form-group">
                                    <label for="name">توضیحات سایت</label>
                                    <input type="text"
                                           class="form-control form-control-sm"
                                           name="description"
                                           id="name"
                                           value="{{old('description',$setting->description)}}">
                                </div>
                                @error('description')
                                <span class="alert_required bg-danger text-white p-1 rounded">
                                        <strong>
                                            {{$message}}
                                        </strong>
                                    </span>
                                @enderror
                            </section>

                            {{--Description--}}
                            <section class="col-12">
                                <div class="form-group">
                                    <label for="name">کلمات کلیدی سایت</label>
                                    <input type="text"
                                           class="form-control form-control-sm"
                                           name="keywords"
                                           id="name"
                                           value="{{old('keywords',$setting->keywords)}}">
                                </div>
                                @error('keywords')
                                <span class="alert_required bg-danger text-white p-1 rounded">
                                        <strong>
                                            {{$message}}
                                        </strong>
                                    </span>
                                @enderror
                            </section>

                            {{--Logo--}}
                            <section class="col-12 col-md-6 my-2">
                                <div class="form-group">
                                    <label for="logo">لوگو</label>
                                    <input type="file" class="form-control form-control-sm" name="logo" id="logo">
                                </div>
                                @error('logo')
                                <span class="alert_required bg-danger text-white p-1 rounded">
                                        <strong>
                                            {{$message}}
                                        </strong>
                                    </span>
                                @enderror
                            </section>

                            {{--Icon--}}
                            <section class="col-12 col-md-6 my-2">
                                <div class="form-group">
                                    <label for="icon">آیکون</label>
                                    <input type="file" class="form-control form-control-sm" name="icon" id="icon">
                                </div>
                                @error('icon')
                                <span class="alert_required bg-danger text-white p-1 rounded">
                                        <strong>
                                            {{$message}}
                                        </strong>
                                    </span>
                                @enderror
                            </section>


                        </section>

                        {{--submit button--}}
                        <section class="col-12 my-2">
                            <button class="btn btn-primary btn-sm">ثبت</button>
                        </section>
                </form>
            </section>
        </section>
    </section>
    </section>
@endsection
