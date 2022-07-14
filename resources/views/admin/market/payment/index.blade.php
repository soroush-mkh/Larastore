@extends('admin.layouts.master')

@section('head-tag')
    <title>پرداخت ها</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"><a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item active font-size-12" aria-current="page"> پرداخت ها</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h4>پرداخت ها</h4>
                </section>
                <section class="d-flex justify-content-between align-content-center mt-4 mb-3 border-bottom">
                    <a href="#" class="btn btn-info stn-sm mb-4 disabled">پرداخت جدید</a>
                    <div class="max-width-16-rem">
                        <input type="text" placeholder="جستجو..." class="form-control form-control-sm">
                    </div>
                </section>
                <section class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <td>کد تراکنش</td>
                            <td>بانک</td>
                            <td>پرداخت کننده</td>
                            <td>وضعیت پرداخت</td>
                            <td>نوع پرداخت</td>
                            <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i>تنظیمات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($payments as $payment)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td>{{ $payment->paymentable->transaction_id ?? '-' }}</td>
                                <td>{{ $payment->paymentable->gateway ?? '-' }}</td>
                                <td>{{ $payment->user->full_name }}</td>
                                <td>
                                    @if($payment->status == 0)
                                        پرداخت نشده
                                    @elseif($payment->status == 1)
                                        پرداخت شده
                                    @elseif($payment->status == 2)
                                        لغو شده
                                    @else
                                        برگشت داده شده
                                    @endif
                                </td>
                                <td>
                                    @if($payment->type == 0)
                                        آنلاین
                                    @elseif($payment->type == 1)
                                        آفلاین
                                    @else
                                        پرداخت در محل
                                    @endif
                                </td>
                                <td class="width-22-rem text-left">

                                    <a href="{{ route('admin.market.payment.show',$payment->id) }}"
                                       class="btn btn-info btn-sm">
                                        <i class="fa fa-edit"></i>
                                        مشاهده
                                    </a>

                                    <a href="{{ route('admin.market.payment.cancled',$payment->id) }}"
                                       class="btn btn-warning btn-sm">
                                        <i class="fa fa-close"></i>
                                        لغو کردن
                                    </a>

                                    <a href="{{ route('admin.market.payment.returned',$payment->id) }}"
                                       class="btn btn-danger btn-sm">
                                        <i class="fa fa-reply"></i>
                                        برگرداندن
                                    </a>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </section>
            </section>
        </section>
    </section>
@endsection

