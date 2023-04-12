@extends('layouts.app')
@section('content')
    <div class="form_container">
        <div class="box">
            <h1>تسجيل الدخول</h1>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div>
                    <i class='bx bx-user'></i>
                    <input class="email" type="text" placeholder="ادخل الاميل">
                </div>
                <div>
                    <i class='bx bx-lock-alt'></i>
                    <input class="pwd" type="password" placeholder="ادخل كلمة السر">
                </div>
                <input type="submit" value="تسجيل">
            </form>
        </div>
    </div>
@endsection
