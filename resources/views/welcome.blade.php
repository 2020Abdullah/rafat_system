@extends('layouts.master')

@section('navbar')
    @include('layouts.navbar')
@endsection

@section('content')
<div class="container">
    <div class="home">
        <div class="page-title">
            <h3>مرحباً بك في نظام رأفت</h3>
            <hr/>
        </div>
        <div class="links">
            <a class="btn btn-outline-success" href="{{ route('login') }}">تسجيل الدخول كمشرف</a>
            <a class="btn btn-outline-success" href="{{ route('login') }}">تسجيل الدخول كمطور مبيعات</a>
        </div>
    </div>
</div>
@endsection