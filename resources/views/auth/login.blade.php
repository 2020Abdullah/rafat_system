@extends('layouts.master')

@section('content')
@include('layouts.messages')
<div class="container-fluid">
    <div class="bmd-layout-content">
        <div class="main_wrapper">        
           <!-- form login -->
           <div class="row ">
               <div class="col-md-5 card shade mw-center mh-center">
                   <img src="{{asset('svg/logo.svg')}}" alt="svg/logo.svg" class="mw-center " height="130" width="300" >
                   <hr class="hr-dashed m-0">
                   <form method="POST" action="{{ route('login') }}">
                       @csrf
                       <div class="form-group m-0">
                           <label for="exampleInputEmail1">البريد الإلكتروني</label>
                           <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                               aria-describedby="emailHelp" placeholder="Enter email">
                           <small id="emailHelp" class="form-text text-muted">We'll never share your email
                               with
                               anyone else.</small>
                       </div>
                       <div class="form-group m-0">
                           <label for="exampleInputPassword1">كلمة المرور</label>
                           <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                               placeholder="Password">
                       </div>
                       <div class="form-check pt-2">
                           <input type="checkbox" class="form-check-input" id="exampleCheck1">
                           <label class="form-check-label" for="exampleCheck1">Check me out</label>
                       </div>
                       <button type="submit" class="btn shade f-primary btn-block">تسجيل الدخول</button>
                   </form>
               </div>
           </div>
           <!-- end login -->
       </div>
    </div>
</div>
@endsection

