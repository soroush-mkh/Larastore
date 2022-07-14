@extends('admin.layouts.master')

@section('head-tag')
    <title>ویرایش دسته بندی</title>
    <link rel="stylesheet" href="{{asset('admin-assets/jalalidatepicker/persian-datepicker.min.css')}}">
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"><a href="#">اطلاع رسانی</a></li>
            <li class="breadcrumb-item font-size-12"><a href="#">دسته بندی</a></li>
            <li class="breadcrumb-item active font-size-12" aria-current="page"> ویرایش دسته بندی</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h4>ویرایش دسته بندی</h4>
                </section>
                <section class="d-flex justify-content-between align-content-center mt-4 mb-3 border-bottom">
                    <a href="{{route('admin.ticket.category.index')}}" class="btn btn-info stn-sm mb-4">بازگشت</a>
                </section>
                <section>
                    <form action="{{route('admin.ticket.category.update',$ticketCategory->id)}}" method="post">
                        @csrf
                        {{ method_field('PUT') }}
                        <section class="row">

                            {{--name--}}
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">نام دسته بندی</label>
                                    <input type="text" name="name" class="form-control form-control-sm"
                                           value="{{old('name',$ticketCategory->name)}}">
                                </div>
                                @error('name')
                                <span class="alert_required bg-danger text-white p-1 rounded">
                                        <strong>
                                            {{$message}}
                                        </strong>
                                    </span>
                                @enderror
                            </section>


                            {{--Status--}}
                            <section class="col-12 col-md-6 my-2">
                                <div>
                                    <label for="status">وضعیت</label>
                                    <select name="status" id="status" class="form-control form-control-sm">
                                        <option value="0" @if(old('status',$ticketCategory->status) == 0) selected
                                            @endif>غیرفعال
                                        </option>
                                        <option value="1" @if(old('status',$ticketCategory->status) == 1) selected
                                            @endif>فعال
                                        </option>
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


                            {{--Submit--}}
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


