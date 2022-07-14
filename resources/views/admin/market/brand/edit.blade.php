@extends('admin.layouts.master')

@section('head-tag')
    <title>برند ها</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"><a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12"><a href="#"> برند</a></li>
            <li class="breadcrumb-item active font-size-12" aria-current="page"> ویرایش برند</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h4>ویرایش برند</h4>
                </section>
                <section class="d-flex justify-content-between align-content-center mt-4 mb-3 border-bottom">
                    <a href="{{route('admin.market.brand.index')}}" class="btn btn-info stn-sm mb-4">بازگشت</a>
                </section>
                <section>
                    <form action="{{ route('admin.market.brand.update',$brand->id) }}" method="post" id="form"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <section class="row">


                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">نام اصلی برند</label>
                                    <input type="text" class="form-control form-control-sm" name="original_name"
                                           value="{{ old('original_name',$brand->original_name) }}">
                                </div>
                                @error('original_name')
                                <span class="alert_required bg-danger text-white p-1 rounded">
                                        <strong>
                                            {{$message}}
                                        </strong>
                                    </span>
                                @enderror
                            </section>

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">نام فارسی برند</label>
                                    <input type="text" class="form-control form-control-sm" name="persian_name"
                                           value="{{ old('persian_name',$brand->persian_name) }}">
                                </div>
                                @error('persian_name')
                                <span class="alert_required bg-danger text-white p-1 rounded">
                                        <strong>
                                            {{$message}}
                                        </strong>
                                    </span>
                                @enderror
                            </section>

                            {{--tags--}}
                            <section class="col-12 col-md-6 my-2">
                                <div class="form-group">
                                    <label for="tags">تگ ها</label>
                                    <input type="hidden"
                                           class="form-control form-control-sm"
                                           name="tags"
                                           id="tags"
                                           value="{{old('tags',$brand->tags)}}">
                                    <select class="select2 form-control form-control-sm" id="select_tags" multiple>

                                    </select>
                                </div>
                                @error('tags')
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
                                        <option value="0" @if(old('status',$brand->status) == 0) selected
                                            @endif>غیرفعال
                                        </option>
                                        <option value="1" @if(old('status',$brand->status) == 1) selected
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

                            {{--picture--}}
                            <section class="col-12 col-md-6 my-2">
                                <div class="form-group">
                                    <label for="logo">تصویر</label>
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

                            {{--image sizes--}}
                            <section class="row">
                                @php
                                    $number = 1;
                                @endphp
                                @foreach($brand->logo['indexArray'] as $key=>$value)
                                    <section class="col-md-{{6/$number}}">
                                        <div class="form-check">
                                            <input type="radio" name="currentImage" class="form-check-input"
                                                   value="{{$key}}"
                                                   id="{{$number}}"
                                                   @if($brand->logo['currentImage'] == $key) checked @endif>
                                            <label for="{{$number}}" class="form-check-label mx-2">
                                                <img src="{{asset($value)}}" alt="" class="w-100">
                                            </label>
                                        </div>
                                    </section>
                                    @php
                                        $number++;
                                    @endphp
                                @endforeach
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

@section('scripts')
    {{--ckeditor scripts--}}
    <script src="{{asset('admin-assets/ckeditor/ckeditor.js')}}"></script>
    <script>
        CKEDITOR.replace('description');
    </script>

    {{--tags scripts--}}
    <script>
        $(document).ready(function () {
            var tags_input = $('#tags');
            var select_tags = $('#select_tags');
            var default_tags = tags_input.val();
            var default_data = null;

            if (tags_input.val() !== null && tags_input.val().length > 0) {
                default_data = default_tags.split(',');
            }


            select_tags.select2({
                placeholder: 'لطفا تگ های خود را وارد نمایید',
                tags: true,
                data: default_data
            });

            select_tags.children('option').attr('selected', true).trigger('change');


            $('#form').submit(function (event) {
                if (select_tags.val() !== null && select_tags.val().length > 0) {
                    var selectedSource = select_tags.val().join(',');
                    tags_input.val(selectedSource);
                }
            })
        })
    </script>

@endsection
