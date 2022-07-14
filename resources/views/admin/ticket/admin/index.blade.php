@extends('admin.layouts.master')

@section('head-tag')
    <title>ادمیت تیکت</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"><a href="#"> خانه</a></li>
            <li class="breadcrumb-item font-size-12"><a href="#"> بخش تیکت ها</a></li>
            <li class="breadcrumb-item active font-size-12" aria-current="page"> ادمیت تیکت</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h4>ادمیت تیکت</h4>
                </section>
                <section class="d-flex justify-content-between align-content-center mt-4 mb-3 border-bottom">
                    <a class="btn btn-info stn-sm mb-4 disabled">ایجاد ادمیت تیکت</a>
                    <div class="max-width-16-rem">
                        <input type="text" placeholder="جستجو..." class="form-control form-control-sm">
                    </div>
                </section>
                <section class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>نام ادمین</th>
                            <th>ایمیل ادمین</th>
                            <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i>تنظیمات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($admins as $key => $admin)
                            <tr>
                                <th>{{ $key + 1 }}</th>
                                <td>{{ $admin->fullName }}</td>
                                <td>{{ $admin->email }}</td>
                                <td class="width-16-rem text-left">
                                    <a href="{{route('admin.ticket.admin.set', $admin->id)}}"
                                       class="btn btn-{{ $admin->ticketAdmin == NULL ? 'success' : 'danger'}} btn-sm"><i
                                            class="fa
                                       fa-check"></i>
                                    {{ $admin->ticketAdmin == NULL ? 'اضافه' : 'حذف' }}
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

