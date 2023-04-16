@extends('layouts.master')

@section('content')
@include('Agent.layout.navbar')
@include('Agent.layout.sidebar')
<div class="bmd-layout-container bmd-drawer-f-l avam-container animated bmd-drawer-in">
    <main class="bmd-layout-content">
        <div class="container-fluid">
            <div class="row  m-1 pb-4 mb-3 ">
                <div class="col-xs-12  col-sm-12  col-md-12  col-lg-12 p-2">
                    <div class="page-header breadcrumb-header ">
                        <div class="row align-items-end ">
                            <div class="col-lg-8">
                                <div class="page-header-title text-left-rtl">
                                    <div class="d-inline">
                                        <h3 class="lite-text ">صفحة التقارير</h3>
                                        <span class="lite-text text-gray">كل التقارير</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item "><a href="#"><i class="fas fa-home"></i></a></li>
                                    <li class="breadcrumb-item active">صفحة المشرف</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="jumbotron shade pt-5">
                <div class="table-title-action">
                    <h3 class="display-4">تقارير الزيارات</h3>
                    <a href="{{ route('visitors.create') }}" class="btn main f-first fnt-xxs">إضافة تقرير جديد</a>
                </div>
                <hr/>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <td>كود الزائر</td>
                            <td>رقم الزائر</td>
                            <td>رصيد الزائر</td>
                            <td>عدد الشرائح</td>
                            <td>عدد التفعيلات</td>
                            <td>ملاحظات</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection

