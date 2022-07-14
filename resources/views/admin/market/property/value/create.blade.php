@extends('admin.layouts.master')

@section('head-tag')
    <title>ایجاد مقدار فرم کالا</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">مقدار فرم کالا</a></li>
            <li class="breadcrumb-item active font-size-12" aria-current="page"> ایجاد مقدار فرم کالا</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h4>ایجاد مقدار فرم کالا</h4>
                </section>
                <section class="d-flex justify-content-between align-content-center mt-4 mb-3 border-bottom">
                    <a href="{{route('admin.market.value.index',$categoryAttribute->id)}}" class="btn btn-info stn-sm
                    mb-4">بازگشت</a>
                </section>
                <section>
                    <form action="{{route('admin.market.value.store',$categoryAttribute->id)}}" method="post">
                        @csrf
                        <section class="row">


                            <section class="col-12 col-md-6">
                                <div>
                                    <label for="">انتخاب محصول</label>
                                    <select name="product_id" id="product_id" class="form-control form-control-sm">
                                        <option value="">محصول را انتخاب کنید</option>
                                        @foreach($categoryAttribute->category->products as $product)
                                            <option value="{{$product->id}}"
                                                    @if(old('product_id')==$product->id) selected @endif>
                                                {{$product->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('product_id')
                                <span class="alert_required bg-danger text-white p-1 rounded">
                                        <strong>
                                            {{$message}}
                                        </strong>
                                    </span>
                                @enderror
                            </section>


                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="value">مقدار</label>
                                    <input type="text" name="value" value="{{ old('value') }}" class="form-control
                                    form-control-sm">
                                </div>
                                @error('value')
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
                                    <label for="type">نوع</label>
                                    <select name="type" id="type" class="form-control form-control-sm">
                                        <option value="0" @if(old('type') == 0) selected @endif>ساده</option>
                                        <option value="1" @if(old('type') == 1) selected @endif>انتخابی</option>
                                    </select>
                                </div>
                                @error('type')
                                <span class="alert_required bg-danger text-white p-1 rounded">
                                        <strong>
                                            {{$message}}
                                        </strong>
                                    </span>
                                @enderror
                            </section>


                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="price_increase">تفاوت قیمت</label>
                                    <input type="text" name="price_increase" value="{{ old('price_increase') }}"
                                           class="form-control form-control-sm">
                                </div>
                                @error('price_increase')
                                <span class="alert_required bg-danger text-white p-1 rounded">
                                        <strong>
                                            {{$message}}
                                        </strong>
                                    </span>
                                @enderror
                            </section>



                            <section class="col-12 pt-4">
                                <button class="btn btn-primary btn-sm">ثبت</button>
                            </section>
                        </section>
                    </form>
                </section>
            </section>
        </section>
    </section>
@endsection

