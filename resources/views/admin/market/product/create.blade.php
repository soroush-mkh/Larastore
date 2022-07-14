@extends('admin.layouts.master')

@section('head-tag')
    <title>ایجاد کالا</title>
    <link rel="stylesheet" href="{{asset('admin-assets/jalalidatepicker/persian-datepicker.min.css')}}">
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"><a href="#"> خانه</a></li>
            <li class="breadcrumb-item font-size-12"><a href="#"> بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12"><a href="#"> کالا</a></li>
            <li class="breadcrumb-item active font-size-12" aria-current="page"> ایجاد کالا</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h4>ایجاد کالا</h4>
                </section>
                <section class="d-flex justify-content-between align-content-center mt-4 mb-3 border-bottom">
                    <a href="{{route('admin.market.product.index')}}" class="btn btn-info stn-sm mb-4">بازگشت</a>
                </section>
                <section>
                    <form action="{{ route('admin.market.product.store') }}"
                          method="post"
                          id="form"
                          enctype="multipart/form-data">
                        @csrf
                        <section class="row">


                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">نام کالا</label>
                                    <input type="text" name="name" value="{{ old('name') }}"
                                           class="form-control form-control-sm">
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
                                <div>
                                    <label for="">انتخاب دسته</label>
                                    <select name="category_id" id="category_id" class="form-control form-control-sm">
                                        <option value="">دسته را انتخاب کنید</option>
                                        @foreach($productCategories as $productCategory)
                                            <option value="{{$productCategory->id}}"
                                                    @if(old('category_id')==$productCategory->id) selected @endif>
                                                {{$productCategory->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('category_id')
                                <span class="alert_required bg-danger text-white p-1 rounded">
                                        <strong>
                                            {{$message}}
                                        </strong>
                                    </span>
                                @enderror
                            </section>


                            <section class="col-12 col-md-6">
                                <div>
                                    <label for="brand_id">انتخاب برند</label>
                                    <select name="brand_id" id="brand_id" class="form-control form-control-sm">
                                        <option value="brand_id">برند را انتخاب کنید</option>
                                        @foreach($brands as $brand)
                                            <option value="{{$brand->id}}"
                                                    @if(old('brand_id')==$brand->id) selected @endif>
                                                {{$brand->original_name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('brand_id')
                                <span class="alert_required bg-danger text-white p-1 rounded">
                                        <strong>
                                            {{$message}}
                                        </strong>
                                    </span>
                                @enderror
                            </section>


                            <section class="col-12 col-md-6">
                                <div>
                                    <label for="">تصویر</label>
                                    <input type="file" name="image" class="form-control-sm form-control">
                                </div>
                                @error('image')
                                <span class="alert_required bg-danger text-white p-1 rounded">
                                        <strong>
                                            {{$message}}
                                        </strong>
                                    </span>
                                @enderror
                            </section>


                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="weight">وزن</label>
                                    <input type="text" name="weight" value="{{ old('weight') }}"
                                           class="form-control form-control-sm">
                                </div>
                                @error('weight')
                                <span class="alert_required bg-danger text-white p-1 rounded">
                                        <strong>
                                            {{$message}}
                                        </strong>
                                    </span>
                                @enderror
                            </section>


                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="length">طول</label>
                                    <input type="text" name="length" value="{{ old('length') }}"
                                           class="form-control form-control-sm">
                                </div>
                                @error('length')
                                <span class="alert_required bg-danger text-white p-1 rounded">
                                        <strong>
                                            {{$message}}
                                        </strong>
                                    </span>
                                @enderror
                            </section>


                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="width">عرض</label>
                                    <input type="text" name="width" value="{{ old('width') }}"
                                           class="form-control form-control-sm">
                                </div>
                                @error('width')
                                <span class="alert_required bg-danger text-white p-1 rounded">
                                        <strong>
                                            {{$message}}
                                        </strong>
                                    </span>
                                @enderror
                            </section>


                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="height">ارتفاع</label>
                                    <input type="text" name="height" value="{{ old('height') }}"
                                           class="form-control form-control-sm">
                                </div>
                                @error('height')
                                <span class="alert_required bg-danger text-white p-1 rounded">
                                        <strong>
                                            {{$message}}
                                        </strong>
                                    </span>
                                @enderror
                            </section>


                            <section class="col-12">
                                <div class="form-group">
                                    <label for="price">قیمت کالا</label>
                                    <input type="text" name="price" value="{{ old('price') }}"
                                           class="form-control form-control-sm">
                                </div>
                                @error('price')
                                <span class="alert_required bg-danger text-white p-1 rounded">
                                        <strong>
                                            {{$message}}
                                        </strong>
                                    </span>
                                @enderror
                            </section>


                            <section class="col-12">
                                <div class="form-group">
                                    <label for="introduction">توضیحات</label>
                                    <textarea class="form-control form-control-sm"
                                              name="introduction"
                                              id="introduction"
                                              rows="6">{{ old('introduction') }}</textarea>
                                </div>
                                @error('introduction')
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


                            {{--status--}}
                            <section class="col-12 col-md-6 my-2">
                                <div>
                                    <label for="marketable">قابل فروش بودن</label>
                                    <select name="marketable" id="marketable" class="form-control form-control-sm">
                                        <option value="0" @if(old('marketable') == 0) selected @endif>غیرفعال</option>
                                        <option value="1" @if(old('marketable') == 1) selected @endif>فعال</option>
                                    </select>
                                </div>
                                @error('marketable')
                                <span class="alert_required bg-danger text-white p-1 rounded">
                                        <strong>
                                            {{$message}}
                                        </strong>
                                    </span>
                                @enderror
                            </section>


                            {{--tags--}}
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="tags">تگ ها</label>
                                    <input type="hidden"
                                           class="form-control form-control-sm"
                                           name="tags"
                                           id="tags"
                                           value="{{old('tags')}}">
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


                            <section class="col-12 border-top border-bottom py-3 mb-3">
                                <div class="row">
                                    <section class="col-6 col-md-3">
                                        <div class="form-group">
                                            <input type="text" name="meta_key[]"
                                                   class="form-control form-control-sm"
                                                   placeholder="ویژگی...">
                                        </div>
                                        @error('meta_key.*')
                                        <span class="alert_required bg-danger text-white p-1 rounded">
                                        <strong>
                                            {{$message}}
                                        </strong>
                                    </span>
                                        @enderror
                                    </section>


                                    <section class="col-6 col-md-3">
                                        <div class="form-group">
                                            <input type="text" name="meta_value[]"
                                                   class="form-control form-control-sm"
                                                   placeholder="مقدار...">
                                        </div>
                                        @error('meta_value.*')
                                        <span class="alert_required bg-danger text-white p-1 rounded">
                                        <strong>
                                            {{$message}}
                                        </strong>
                                    </span>
                                        @enderror
                                    </section>
                                </div>


                                <section>
                                    <button type="button" id="btn-copy"
                                            class="btn btn-success btn-sm">افزودن
                                    </button>
                                </section>
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
    <script src="{{asset('admin-assets/ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('admin-assets/jalalidatepicker/persian-date.min.js')}}"></script>
    <script src="{{asset('admin-assets/jalalidatepicker/persian-datepicker.min.js')}}"></script>
    <script>
        CKEDITOR.replace('introduction');
        CKEDITOR.replace('summery');
    </script>

    <script>
        $(document).ready(function () {
            $('#published_at_view').persianDatepicker({
                format: 'YYYY/MM/DD',
                altField: '#published_at'
            })
        });
    </script>

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


    <script>
        $(function () {
            $('#btn-copy').on('click', function () {
                var ele = $(this).parent().prev().clone(true);
                $(this).before(ele);
            })
        })
    </script>
@endsection
