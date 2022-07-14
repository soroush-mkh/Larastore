@extends('admin.layouts.master')

@section('head-tag')
    <title>ایجاد فایل اطلاعیه ایمیلی</title>
    <link rel="stylesheet" href="{{asset('admin-assets/jalalidatepicker/persian-datepicker.min.css')}}">
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"><a href="#">اطلاع رسانی</a></li>
            <li class="breadcrumb-item font-size-12"><a href="#">اطلاعیه ایمیلی</a></li>
            <li class="breadcrumb-item active font-size-12" aria-current="page"> ایجاد فایل اطلاعیه ایمیلی</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h4>ایجاد فایل اطلاعیه ایمیلی</h4>
                </section>
                <section class="d-flex justify-content-between align-content-center mt-4 mb-3 border-bottom">
                    <a href="{{route('admin.notify.email-file.index',$email->id)}}" class="btn btn-info stn-sm
                    mb-4">بازگشت</a>
                </section>
                <section>
                    <form action="{{route('admin.notify.email-file.store',$email->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <section class="row">

                            {{--picture--}}
                            <section class="col-12  col-md-6 my-2">
                                <div class="form-group">
                                    <label for="file">فایل</label>
                                    <input type="file" class="form-control form-control-sm" name="file" id="file">
                                </div>
                                @error('file')
                                <span class="alert_required bg-danger text-white p-1 rounded">
                                        <strong>
                                            {{$message}}
                                        </strong>
                                    </span>
                                @enderror
                            </section>


                            {{--status--}}
                            <section class="col-12 col-md-6 my-2">
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
    <script src="{{asset('admin-assets/ckeditor/ckeditor.js')}}"></script>
    <script>
        CKEDITOR.replace('body');
    </script>

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



