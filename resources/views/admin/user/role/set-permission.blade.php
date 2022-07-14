@extends('admin.layouts.master')

@section('head-tag')
    <title>دسترسی نقش</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"><a href="#">بخش کاربران</a></li>
            <li class="breadcrumb-item font-size-12"><a href="#">نقش ها</a></li>
            <li class="breadcrumb-item active font-size-12" aria-current="page"> دسترسی نقش</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h4>دسترسی نقش</h4>
                </section>
                <section class="d-flex justify-content-between align-content-center mt-4 mb-3 border-bottom">
                    <a href="{{route('admin.user.role.index')}}" class="btn btn-info stn-sm mb-4">بازگشت</a>
                </section>
                <section>
                    <form action="{{ route('admin.user.role.permission-update',$role->id) }}" method="post">
                        @method('PUT')
                        @csrf
                        <section class="row">

                            <section class="col-12">
                                <section class="row border-bottom py-3">

                                    <section class="col-12 col-md-5">
                                        <div class="form-group">
                                            <label for="">عنوان نقش</label>
                                            <input disabled type="text" name="name" value="{{ $role->name }}"
                                                   class="form-control form-control-sm disabled">
                                        </div>
                                    </section>

                                    <section class="col-12 col-md-5">
                                        <div class="form-group">
                                            <label for="">توضیحات  نقش</label>
                                            <input disabled type="text" name="name" value="{{ $role->description }}"
                                                   class="form-control form-control-sm disabled">
                                        </div>
                                    </section>

                                    {{--<section class="col-12 col-md-5">
                                        <div class="form-group">
                                            <label for="">عنوان نقش</label>
                                            <section>{{ $role->name }}</section>
                                        </div>
                                    </section>

                                    <section class="col-12 col-md-5">
                                        <div class="form-group">
                                            <label for="">توضیحات نقش</label>
                                            <section>{{ $role->description }}</section>
                                        </div>
                                    </section>--}}

                                    @php
                                        $rolePermissionsArray = $role->permissions->pluck('id')->toArray();
                                    @endphp

                                    @foreach($permissions as $key => $permission)
                                        <section class="col-md-3">
                                            <div class="form-check">
                                                <input type="checkbox"
                                                       class="form-check-input"
                                                       name="permissions[]"
                                                       id="{{ $permission->id }}"
                                                       value="{{ $permission->id }}"
                                                       @if(in_array($permission->id, $rolePermissionsArray))
                                                       checked
                                                    @endif>
                                                <label for="{{ $permission->id }}" class="form-check-label mr-3 mt-1">
                                                    {{ $permission->name }}
                                                </label>
                                            </div>
                                            <div class="mt-2">
                                                @error('permissions.'.$key)
                                                <span class="alert_required bg-danger text-white p-1 rounded">
                                                    <strong>
                                                        {{$message}}
                                                    </strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </section>
                                    @endforeach

                                    <section class="col-12 col-md-2 ">
                                        <button class="btn btn-primary btn-sm mt-md-4">ثبت</button>
                                    </section>

                                </section>
                            </section>

                        </section>
                    </form>
                </section>
            </section>
        </section>
    </section>
@endsection

