@extends('admin.layouts.master')

@section('head-tag')
    <title>مقدار فرم کالا</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"><a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item active font-size-12" aria-current="page"> مقدار فرم کالا</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h4>مقدار فرم کالا</h4>
                </section>
                <section class="d-flex justify-content-between align-content-center mt-4 mb-3 border-bottom">
                    <a href="{{route('admin.market.value.create',$categoryAttribute->id)}}" class="btn btn-info stn-sm
                    mb-4">
                        ایجاد مقدار فرم کالا جدید</a>
                    <div class="max-width-16-rem">
                        <input type="text" placeholder="جستجو..." class="form-control form-control-sm">
                    </div>
                </section>
                <section class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>نام فرم</th>
                            <th>نام محصول</th>
                            <th>مقدار</th>
                            <th>افزایش قیمت</th>
                            <th>نوع</th>
                            <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i>تنظیمات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categoryAttribute->values as $value)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td>{{ $categoryAttribute->name }}</td>
                                <td>{{ $value->product->name }}</td>
                                <td>{{ json_decode($value->value)->value }}</td>
                                <td>{{ json_decode($value->value)->price_increase }}</td>
                                <td>{{ $value->type == 0 ? 'ساده' : 'انتخابی'}}</td>
                                <td class="width-22-rem text-left">

                                    <a href="{{route('admin.market.value.edit',['categoryAttribute'=>$categoryAttribute->id,'value'=>$value->id])}}"
                                       class="btn btn-primary btn-sm"><i class="fa fa-edit"></i>ویرایش</a>

                                    <form class="d-inline"
                                          action="{{route('admin.market.value.destroy',['categoryAttribute'=>$categoryAttribute->id,'value'=>$value->id])}}"
                                          method="post">
                                        @csrf
                                        {{method_field('delete')}}
                                        <button class="btn btn-danger btn-sm delete" type="submit">
                                            <i class="fa fa-trash-alt"></i> حذف
                                        </button>
                                    </form>

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


@section('scripts')
    <script type="text/javascript">
        function changeStatus(id) {
            var element = $('#' + id);
            var url = element.attr('data-url');
            var elementValue = element.prop('checked');

            $.ajax({
                url: url,
                type: "GET",
                success: function (response) {
                    if (response.status) {
                        if (response.checked) {
                            element.prop('checked', true);
                            successToast('دسته بندی با موفقیت فعال شد')
                        } else {
                            element.prop('checked', false);
                            successToast('دسته بندی با موفقیت غیر فعال شد')
                        }
                    } else {
                        element.prop('checked', elementValue);
                        errorToast('متاسفانه هنگام ویرایش مشکلی به وجود آمده است!')
                    }
                },
                error: function () {
                    element.prop('checked', elementValue);
                    errorToast('متاسفانه ارتباط با سرور برقرار نشد!')
                }
            });

            function successToast(message) {
                var successToastTag = '<section class="toast" data-delay="5000">\n' +
                    '<section class="toast-body py-3 d-flex bg-success text-white">\n' +
                    '<strong class="ml-auto">' + message + '</strong>\n' +
                    '<button type="button" class="mr-2 close" data-dismiss="toast" aria-label="Close">\n' +
                    '<span aria-hidden="true">&times;</span>\n' +
                    '</button>\n' +
                    '</section>\n' +
                    '</section>';

                $('.toast-wrapper').append(successToastTag);
                $('.toast').toast('show').delay(5000).queue(function () {
                    $(this).remove();
                })
            }

            function errorToast(message) {
                var errorToastTag = '<section class="toast" data-delay="5000">\n' +
                    '<section class="toast-body py-3 d-flex bg-danger text-white">\n' +
                    '<strong class="ml-auto">' + message + '</strong>\n' +
                    '<button type="button" class="mr-2 close" data-dismiss="toast" aria-label="Close">\n' +
                    '<span aria-hidden="true">&times;</span>\n' +
                    '</button>\n' +
                    '</section>\n' +
                    '</section>';

                $('.toast-wrapper').append(errorToastTag);
                $('.toast').toast('show').delay(5000).queue(function () {
                    $(this).remove();
                })
            }
        }
    </script>

    @include('admin.alerts.sweetalert.delete-confirm',['className' => 'delete'])

@endsection
