@extends('admin.layouts.master')

@section('head-tag')
    <title>نمایش پرداخت</title>
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"><a href="#"> خانه</a></li>
            <li class="breadcrumb-item font-size-12"><a href="#"> بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12"><a href="#"> پرداخت ها</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> نمایش پرداخت</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        نمایش پرداخت
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.market.payment.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>

                <section class="card mb-3">
{{--                    <section class="card-header text-white bg-custom-yellow">--}}
                    <section class="card-header text-white @if($payment->status == 0) bg-dark @elseif($payment->status == 1) bg-custom-green @elseif($payment->status == 2)
                        bg-danger @else bg-warning @endif">
                        مشخصات سفارش
                    </section>
                    <section class="card-body">
                        <h5 class="card-title">
                            سفارش دهنده : {{ $payment->user->full_name  }} - {{ $payment->user->id  }}
                        </h5>
                        <p class="card-text">نوع پرداخت :
                            @if($payment->type == 0)
                                             آنلاین
                            @elseif($payment->type == 1)
                                             آفلاین
                            @else
                                             پرداخت در محل
                            @endif
                        </p>
                        <p class="card-text">وضعیت پرداخت :
                            @if($payment->status == 0)
                                             پرداخت نشده
                            @elseif($payment->status == 1)
                                             پرداخت شده
                            @elseif($payment->status == 2)
                                             لغو شده
                            @else
                                             برگشت داده شده
                            @endif
                        </p>
                        <p class="card-text">مبلغ : {{ $payment->paymentable->amount }}</p>
                        <p class="card-text">درگاه : {{ $payment->paymentable->gateway ?? '-'  }}</p>
                        <p class="card-text">شماره پرداخت : {{  $payment->paymentable->transaction_id ?? '-' }}</p>
                        <p class="card-text">تاریخ پرداخت : {{  jalaliDate($payment->paymentable->pay_date ?? '-') }}</p>
                        <p class="card-text">دریافت کننده : {{  $payment->paymentable->cash_receiver ?? '-' }}</p>
                    </section>
                </section>

            </section>
        </section>
    </section>

@endsection
