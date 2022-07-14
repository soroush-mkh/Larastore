@extends('admin.layouts.master')

@section('head-tag')
    <title>ایجاد اطلاعیه پیامکی</title>
    <link rel="stylesheet" href="{{asset('admin-assets/jalalidatepicker/persian-datepicker.min.css')}}">
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"><a href="#">اطلاع رسانی</a></li>
            <li class="breadcrumb-item font-size-12"><a href="#">اطلاعیه پیامکی</a></li>
            <li class="breadcrumb-item active font-size-12" aria-current="page"> ایجاد اطلاعیه پیامکی</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h4>ایجاد اطلاعیه پیامکی</h4>
                </section>
                <section class="d-flex justify-content-between align-content-center mt-4 mb-3 border-bottom">
                    <a href="{{route('admin.notify.sms.index')}}" class="btn btn-info stn-sm mb-4">بازگشت</a>
                </section>
                <section>
                    <form action="{{route('admin.notify.sms.store')}}" method="post">
                        @csrf
                        <section class="row">

                            {{--Title--}}
                            <section class="col-12 col-md-12">
                                <div class="form-group">
                                    <label for="">عنوان پیامک</label>
                                    <input type="text" name="title" class="form-control form-control-sm"
                                           value="{{old('title')}}">
                                </div>
                                @error('title')
                                <span class="alert_required bg-danger text-white p-1 rounded">
                                        <strong>
                                            {{$message}}
                                        </strong>
                                    </span>
                                @enderror
                            </section>

                            {{--Published at--}}
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">تاریخ انتشار</label>
                                    <input type="text"
                                           name="published_at"
                                           id="published_at"
                                           class="form-control form-control-sm d-none">
                                    <input type="text" id="published_at_view" class="form-control form-control-sm">
                                </div>
                                @error('published_at')
                                <span class="alert_required bg-danger text-white p-1 rounded">
                                        <strong>
                                            {{$message}}
                                        </strong>
                                    </span>
                                @enderror
                            </section>

                            {{--Status--}}
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

                            {{--Body--}}
                            <section class="col-12">
                                <div class="form-group">
                                    <label for="">متن پیامک</label>
                                    <textarea class="form-control form-control-sm"
                                              name="body"
                                              id="body"
                                              rows="6">{{old('body')}}</textarea>
                                </div>
                                @error('body')
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


@section('scripts')
    <script src="{{asset('admin-assets/jalalidatepicker/persian-date.min.js')}}"></script>
    <script src="{{asset('admin-assets/jalalidatepicker/persian-datepicker.min.js')}}"></script>

    <script>
        $(document).ready(function () {
            $('#published_at_view').persianDatepicker({
                format: 'YYYY/MM/DD',
                altField: '#published_at',
                timePicker: {
                    enabled: true,
                    meridiem: {
                        enabled: true
                    }
                }
            })
        });
    </script>
@endsection
