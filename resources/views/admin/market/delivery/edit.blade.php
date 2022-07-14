@extends('admin.layouts.master')

@section('head-tag')
    <title>روش های ارسال</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"><a href="#"> خانه</a></li>
            <li class="breadcrumb-item font-size-12"><a href="#"> بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12"><a href="#"> روش های ارسال</a></li>
            <li class="breadcrumb-item active font-size-12" aria-current="page"> ویرایش روش ارسال</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h4>ویرایش روش ارسال</h4>
                </section>
                <section class="d-flex justify-content-between align-content-center mt-4 mb-3 border-bottom">
                    <a href="{{route('admin.market.delivery.index')}}" class="btn btn-info stn-sm mb-4">بازگشت</a>
                </section>
                <section>

                    <form action="{{ route('admin.market.delivery.update',$delivery->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <section class="row">
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">نام روش ارسال</label>
                                    <input type="text" class="form-control form-control-sm" name="name"
                                           value="{{ old('name',$delivery->name)}}">
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
                                    <label for="">هزینه روش ارسال</label>
                                    <input type="text" class="form-control form-control-sm" name="amount"
                                           value="{{old('amount',$delivery->amount)}}">
                                </div>
                                @error('amount')
                                <span class="alert_required bg-danger text-white p-1 rounded">
                                        <strong>
                                            {{$message}}
                                        </strong>
                                    </span>
                                @enderror
                            </section>


                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">زمان ارسال</label>
                                    <input type="text" class="form-control form-control-sm" name="delivery_time"
                                           value="{{ old('delivery_time',$delivery->delivery_time)}}">
                                </div>
                                @error('delivery_time')
                                <span class="alert_required bg-danger text-white p-1 rounded">
                                        <strong>
                                            {{$message}}
                                        </strong>
                                    </span>
                                @enderror
                            </section>


                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">واحد زمان ارسال</label>
                                    <input type="text" class="form-control form-control-sm" name="delivery_time_unit"
                                           value="{{ old('delivery_time_unit',$delivery->delivery_time_unit)}}">
                                </div>
                                @error('delivery_time_unit')
                                <span class="alert_required bg-danger text-white p-1 rounded">
                                        <strong>
                                            {{$message}}
                                        </strong>
                                    </span>
                                @enderror
                            </section>

                            <section class="col-12">
                                <input type="submit" value="ویرایش" class="btn btn-primary btn-sm">
                            </section>
                        </section>
                    </form>


                </section>
            </section>
        </section>
    </section>
@endsection

