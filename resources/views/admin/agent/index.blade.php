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
                                        <h3 class="lite-text ">صفحة المطورين</h3>
                                        <span class="lite-text text-gray">كل المطورين</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item "><a href="#"><i class="fas fa-home"></i></a></li>
                                    <li class="breadcrumb-item active">صفحة المطور</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('layouts.messages')
            <div class="jumbotron shade pt-5">
                <div class="table-title-action">
                    <h3 class="display-4">جدول المطورين</h3>
                    <a href="{{ route('admin.agent.create') }}" class="btn main f-first fnt-xxs">إضافة مطور مبيعات جديد</a>
                </div>
                <hr/>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <td>رقم المطور</td>
                            <td>بريد المطور</td>
                            <td>اسم المطور</td>
                            <td>اسم المشرف</td>
                            <td>الحالة</td>
                            <td>اتخاذ إجراء</td>
                        </tr>
                        @forelse ($Agents as $Agent)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $Agent->email }}</td>
                                <td>{{ $Agent->name }}</td>
                                <td>{{ $Agent->manager->name }}</td>
                                <td>{{ $Agent->status == 1 ? 'مفعل' : 'معطل' }}</td>
                                <td>
                                    @if ($Agent->status == 1)
                                        <a class="btn flat f-danger fnt-xxs" href="{{ route('admin.agent.delete', $Agent->id) }}">تعطيل</a>
                                    @else
                                        <a class="btn flat f-second fnt-xxs" href="{{ route('admin.agent.active', $Agent->id) }}">تفعيل</a>
                                    @endif
                                    <a class="btn outlined c-danger o-danger fnt-xxs" href="{{ route('admin.agent.destory', $Agent->id) }}">حذف</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td>لا يوجد مطورين تم إضافتهم بعد</td>
                            </tr>
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection

