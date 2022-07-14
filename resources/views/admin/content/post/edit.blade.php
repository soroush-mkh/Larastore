@extends('admin.layouts.master')

@section('head-tag')
    <title>ویرایش پست</title>
    <link rel="stylesheet" href="{{asset('admin-assets/jalalidatepicker/persian-datepicker.min.css')}}">
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"><a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12"><a href="#"> پست ها</a></li>
            <li class="breadcrumb-item active font-size-12" aria-current="page"> ویرایش پست</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h4>ویرایش پست</h4>
                </section>
                <section class="d-flex justify-content-between align-content-center mt-4 mb-3 border-bottom">
                    <a href="{{route('admin.content.post.index')}}" class="btn btn-info stn-sm mb-4">بازگشت</a>
                </section>
                <section>
                    <form action="{{route('admin.content.post.update',$post->id)}}" method="post"
                          enctype="multipart/form-data"
                          id="form">
                        @csrf
                        {{method_field('put')}}
                        <section class="row">

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">عنوان پست</label>
                                    <input type="text" class="form-control form-control-sm" name="title"
                                           value="{{old('title',$post->title)}}">
                                </div>
                                @error('title')
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
                                        @foreach($postCategories as $postCategory)
                                            <option value="{{$postCategory->id}}"
                                                    @if(old('category_id',$post->category_id) == $postCategory->id)
                                                    selected @endif>
                                                {{$postCategory->name}}
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
                                <div class="form-group">
                                    <label for="image">تصویر</label>
                                    <input type="file" class="form-control form-control-sm" name="image" id="image">
                                   {{-- <img src="{{asset($postCategory->image['indexArray'][$postCategory->image['currentImage']])}}"
                                         alt="" width="100"
                                         height="50" class="mt-3">--}}
                                </div>
                                @error('image')
                                <span class="alert_required bg-danger text-white p-1 rounded">
                                        <strong>
                                            {{$message}}
                                        </strong>
                                    </span>
                                @enderror
                            </section>

                            <section class="row">
                                @php
                                    $number = 1;
                                @endphp
                                @foreach($post->image['indexArray'] as $key=>$value)
                                    <section class="col-md-{{6/$number}}">
                                        <div class="form-check">
                                            <input type="radio" name="currentImage" class="form-check-input"
                                                   value="{{$key}}"
                                                   id="{{$number}}"
                                                   @if($post->image['currentImage'] == $key) checked @endif>
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

                            <section class="col-12 col-md-6 my-2">
                                <div>
                                    <label for="status">وضعیت</label>
                                    <select name="status" id="status" class="form-control form-control-sm">
                                        <option value="0" @if(old('status',$post->status) == 0) selected
                                            @endif>غیرفعال
                                        </option>
                                        <option value="1" @if(old('status',$post->status) == 1) selected
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

                            <section class="col-12 col-md-6">
                                <div>
                                    <label for="commentable">امکان درج کامنت</label>
                                    <select name="commentable" id="commentable" class="form-control form-control-sm">
                                        <option value="0" @if(old('commentable',$post->commentable) == 0) selected
                                            @endif>غیرفعال
                                        </option>
                                        <option value="1" @if(old('commentable',$post->commentable) == 1) selected
                                            @endif>فعال
                                        </option>
                                    </select>
                                </div>
                                @error('commentable')
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

                            <section class="col-12">
                                <div class="form-group">
                                    <label for="tags">تگ ها</label>
                                    <input type="hidden"
                                           class="form-control form-control-sm"
                                           name="tags"
                                           id="tags"
                                           value="{{old('tags',$post->tags)}}">
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

                            <section class="col-12">
                                <div>
                                    <label for="">خلاصه پست</label>
                                    <textarea name="summery" id="summery" rows="6">
                                         {{old('summery',$post->summery)}}
                                    </textarea>
                                </div>
                                @error('summery')
                                <span class="alert_required bg-danger text-white p-1 rounded">
                                        <strong>
                                            {{$message}}
                                        </strong>
                                    </span>
                                @enderror
                            </section>

                            <section class="col-12">
                                <div>
                                    <label for="">متن پست</label>
                                    <textarea name="body" id="body" rows="6">
                                         {{old('body',$post->body)}}
                                    </textarea>
                                </div>
                                @error('body')
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

@section('scripts')
    <script src="{{asset('admin-assets/ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('admin-assets/jalalidatepicker/persian-date.min.js')}}"></script>
    <script src="{{asset('admin-assets/jalalidatepicker/persian-datepicker.min.js')}}"></script>
    <script>
        CKEDITOR.replace('body');
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
@endsection
