@extends('layouts.master')

@section('content')
<div class="bmd-layout-container bmd-drawer-f-l avam-container animated bmd-drawer-in">
    @include('admin.layout.navbar')
    @include('admin.layout.sidebar')
    <main class="bmd-layout-content">
        <div class="container-fluid">
            <div class="row  m-1 pb-4 mb-3 ">
                <div class="col-xs-12  col-sm-12  col-md-12  col-lg-12 p-2">
                    <div class="page-header breadcrumb-header ">
                        <div class="row align-items-end ">
                            <div class="col-lg-8">
                                <div class="page-header-title text-left-rtl">
                                    <div class="d-inline">
                                        <h3 class="lite-text ">صفحة المشرفين</h3>
                                        <span class="lite-text text-gray">إضافة مشرف جديد</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item "><a href="#"><i class="fas fa-home"></i></a></li>
                                    <li class="breadcrumb-item active">إضافة مشرف</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('layouts.messages')
            <div class="row">
                <div class="col-md-12 mb-3">
                    <div class="jumbotron shade pt-5">
                        <div class="table-title-action">
                            <h3 class="display-4">إضافة مشرف جديد</h3>
                            <a href="{{ route('admin.manager.index') }}" class="btn outlined c-third o-third fnt-xxs ">رجوع</a>
                        </div>
                        <hr/>
                        <form method="POST" action="{{route('admin.manager.store')}}">
                            @csrf
                            <div class="mb-3">
                                <input type="text" name="name" class="form-control" placeholder="اسم المشرف"/>
                            </div>
                            <div class="mb-3">
                                <input type="text" name="email" class="form-control" placeholder="بريد المشرف"/>
                            </div>
                            <div class="mb-3">
                                <input type="password" name="password" class="form-control" placeholder="كلمة المرور"/>
                            </div>
                            <div class="mb-3">
                                <input type="password" name="password_confirmation" class="form-control" placeholder="تأكيد كلمة المرور"/>
                            </div>
                            <div class="mb-3">
                                <input type="submit" class="btn flat f-second btn-block fnt-xxs" value="حفظ">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection

