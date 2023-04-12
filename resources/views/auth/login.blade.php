@extends('layouts.app')
@section('content')
<style>
@import url('https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;300;400;500;600;700;800;900&display=swap');

:root {
    --primary-color: #ff5722;
    --secondary-color: #ff5722;
    --tertiary-color: #673ab7;
    --gray-color: #b0b0b0;
}

* {
    box-sizing: border-box;
    font-family: 'Raleway', sans-serif;
    line-height: 1;
    padding: 0;
    margin: 0;
}

body {
    font-family: 'Open Sans', sans-serif;
    background:#e2e2e2;
}


input {
  display: block;
  height: 50px;
  width: 90%;
  margin: 0 auto;
  border: none;
}
input::placeholder {
  -webkit-transform: translateY(0px);
  transform: translateY(0px);
  -webkit-transition: 0.5s;
  transition: 0.5s;
}
input:hover, input:focus, input:active:focus {
  color: #ff5722;
  outline: none;
  border-bottom: 1px solid #ff5722;
}
input:hover::placeholder, input:focus::placeholder, input:active:focus::placeholder {
  color: #ff5722;
  position: relative;
  -webkit-transform: translateY(-20px);
  transform: translateY(-20px);
}


.form_container {
    height: 80vh;
    display: flex;
    align-items: center;
    justify-content: center;
}

.email,
.pwd {
  position: relative;
  z-index: 1;
  border-bottom: 1px solid rgba(0, 0, 0, 0.1);
  padding-left: 20px;
  font-family: "Open Sans", sans-serif;
  text-transform: uppercase;
  color: #858585;
  font-weight: lighter;
  -webkit-transition: 0.5s;
  transition: 0.5s;
}

.box {
    background-color: white;
    border-radius: 10px;
    padding: 45px;
    width: 375px;
    max-width: 95%;
    box-shadow: 5px 5px 10px 1px rgb(0, 0, 0, 10%);
}

@media (max-width: 480px) {
    .box {
        padding: 75px 25px;
    }
}

.box h1 {
    font-size: 35px;
    font-weight: 800;
    text-align: center;
    margin-bottom: 45px;
    color: var(--tertiary-color);
}

.box form label {
    display: block;
    font-size: 12px;
    margin-bottom: 3px;
}

.box form div {
    display: flex;
    align-items: center;
    border-bottom: 1px solid var(--gray-color);
}

.box form div:hover {
    border-bottom-color: var(--secondary-color);
}

.box form div:first-of-type {
    margin-bottom: 35px;
}

.box form div i {
    font-size: 15px;
    padding-left: 10px;
    color: var(--gray-color);
}

.box form div:hover i {
    color: var(--secondary-color);
}

.box form div input {
    font-size: 12px;
    outline: none;
    border: none;
    padding: 10px;
    min-width: 0;
    flex: 1;
}

.box form div input::placeholder {
    opacity: 1;
    color: var(--gray-color);
    font-size: 12px;
}

.box a {
    color: var(--gray-color);
    text-decoration: none;
    font-size: 12px;
    display: block;
}

.box a:hover {
    color: var(--secondary-color);
}

.box form .forgot {
    margin-top: 15px;
    float: right;
}

.box form input[type="submit"] {
    font-size: 12px;
    font-weight: 600;
    text-transform: uppercase;
    background-color: var(--secondary-color);
    color: white;
    border: none;
    width: 100%;
    padding: 15px;
    margin-top: 45px;
    border-radius: 250px;
}

.box form input[type="submit"]:hover {
    background-color: var(--tertiary-color);
    cursor: pointer;
}

.box .sign-up {
    margin-top: 25px;
    text-align: center;
    text-transform: uppercase;
}
</style>
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->



    <div class="form_container">
        <div class="box">
            <h1>تسجيل الدخول</h1>
            <form>
                <div>
                    <i class="fa-solid fa-user"></i>
                    <input class="email" type="text" placeholder="ادخل الاميل">
                </div>
                <div>
                    <i class="fa-solid fa-lock"></i>
                    <input class="pwd" type="password" placeholder="ادخل كلمة السر">
                </div>
                <input type="submit" value="تسجيل">
            </form>
        </div>
    </div>
@endsection
