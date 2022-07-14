@extends('admin.layouts.master')

@section('head-tag')
    <title>منو</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"><a href="#"> خانه</a></li>
            <li class="breadcrumb-item font-size-12"><a href="#"> بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12"><a href="#"> منو</a></li>
            <li class="breadcrumb-item active font-size-12" aria-current="page"> ایجاد منوی جدید</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h4>ایجاد منوی جدید</h4>
                </section>
                <section class="d-flex justify-content-between align-content-center mt-4 mb-3 border-bottom">
                    <a href="{{route('admin.content.menu.index')}}" class="btn btn-info stn-sm mb-4">بازگشت</a>
                </section>
                <section>
                    <form action="{{route('admin.content.menu.store')}}" method="post">
                        @csrf
                        <section class="row">

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">عنوان منو</label>
                                    <input type="text" name="name" class="form-control form-control-sm" value="{{old
                                    ('name')}}">
                                </div>
                                @error('name')
                                <span class="alert_required bg-danger text-white p-1 rounded">
                                        <strong>
                                            {{$message}}
                                        </strong>
                                    </span>
                                @enderror
                            </section>

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">منو والد</label>
                                    <select name="parent_id" id="" class="form-control form-control-sm">
                                        <option value="">منوی اصلی</option>
                                        @foreach($menus as $menu)
                                            <option value="{{$menu->id}}" @if(old('parent_id') == $menu->id)
                                            selected @endif>
                                                {{$menu->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('parent_id')
                                <span class="alert_required bg-danger text-white p-1 rounded">
                                        <strong>
                                            {{$message}}
                                        </strong>
                                    </span>
                                @enderror
                            </section>

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">آدرس url</label>
                                    <input type="text" name="url" class="form-control form-control-sm" value="{{old
                                    ('url')}}">
                                </div>
                                @error('url')
                                <span class="alert_required bg-danger text-white p-1 rounded">
                                        <strong>
                                            {{$message}}
                                        </strong>
                                    </span>
                                @enderror
                            </section>

                            {{--status--}}
                            <section class="col-12 col-md-6">
                                <div>
                                    <label for="status">وضعیت</label>
                                    <select name="status" id="status" class="form-control form-control-sm">
                                        <option value="0" @if(old('status') == 0) selected @endif>غیرفعال</option>
                                        <option value="1" @if(old('status') == 1) selected @endif>فعال</option>
                                    </select>
                                </div>
                                @error('status')
                                <span class="alert_required bg-danger text-white p-1 rounded">
                                        <strong>
                                            {{$message}}
                                        </strong>
                                    </span>
                                @enderror
                            </section>

                            <section class="col-12">
                                <button class="btn btn-primary btn-sm">ثبت</button>
                            </section>

                        </section>
                    </form>
                </section>
            </section>
        </section>
    </section>
@endsection

