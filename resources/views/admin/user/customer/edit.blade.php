@extends('admin.layouts.master')

@section('head-tag')
    <title>ویرایش کاربر مشتری</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"><a href="#">بخش کاربران</a></li>
            <li class="breadcrumb-item font-size-12"><a href="#">کاربران مشتری</a></li>
            <li class="breadcrumb-item active font-size-12" aria-current="page"> ویرایش کاربر مشتری</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h4>ویرایش کاربر مشتری</h4>
                </section>
                <section class="d-flex justify-content-between align-content-center mt-4 mb-3 border-bottom">
                    <a href="{{route('admin.user.customer.index')}}" class="btn btn-info stn-sm mb-4">بازگشت</a>
                </section>
                <section>
                    <form action="{{ route('admin.user.customer.update',$user->id) }}"
                          method="post"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <section class="row">

                            {{--first name--}}
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">نام</label>
                                    <input type="text" name="first_name" class="form-control form-control-sm"
                                           value="{{ old('first_name' , $user->first_name) }}">
                                </div>
                                @error('first_name')
                                <span class="alert_required bg-danger text-white p-1 rounded">
                                        <strong>
                                            {{$message}}
                                        </strong>
                                    </span>
                                @enderror
                            </section>

                            {{--last name--}}
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for=""> نام خانوادگی</label>
                                    <input type="text" name="last_name" class="form-control form-control-sm"
                                           value="{{ old('last_name' , $user->last_name) }}">
                                </div>
                                @error('last_name')
                                <span class="alert_required bg-danger text-white p-1 rounded">
                                        <strong>
                                            {{$message}}
                                        </strong>
                                    </span>
                                @enderror
                            </section>


                            {{--profile photo--}}
                            <section class="col-12 col-md-6">
                                <div>
                                    <label for="">تصویر</label>
                                    <input type="file" name="profile_photo_path" class="form-control-sm form-control">
                                    <img src="{{ asset($user->profile_photo_path) }}" alt="" width="100" height="50"
                                         class="mt-3">
                                </div>
                                @error('profile_photo_path')
                                <span class="alert_required bg-danger text-white p-1 rounded">
                                        <strong>
                                            {{$message}}
                                        </strong>
                                    </span>
                                @enderror
                            </section>


                            <section class="col-12 my-4">
                                <button class="btn btn-primary btn-sm">ثبت</button>
                            </section>
                        </section>
                    </form>
                </section>
            </section>
        </section>
    </section>
@endsection

