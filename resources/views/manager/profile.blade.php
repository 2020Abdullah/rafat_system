@extends('layouts.master')

@section('content')
<div class="bmd-layout-container bmd-drawer-f-l avam-container animated bmd-drawer-in">
    @include('manager.layout.navbar')
    @include('manager.layout.sidebar')
    @include('layouts.messages')
    <main class="bmd-layout-content">
        <div class="container-fluid">
            <div class="row  m-1 pb-4 mb-3 ">
                <div class="col-xs-12  col-sm-12  col-md-12  col-lg-12 p-2">
                    <div class="page-header breadcrumb-header ">
                        <div class="row align-items-end ">
                            <div class="col-lg-8">
                                <div class="page-header-title text-left-rtl">
                                    <div class="d-inline">
                                        <h3 class="lite-text ">الإعدادات</h3>
                                        <span class="lite-text text-gray">معلوماتي الشخصية</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item "><a href="#"><i class="fas fa-home"></i></a></li>
                                    <li class="breadcrumb-item active">الإعدادات</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 d-none d-md-block">
                    <div class="jumbotron glass profile">
                      <div class="card-body">
                        <div class="profile_img">
                            <!-- ضع صورتك هنا-->
                            <<img src="{{asset('svg/logo.svg')}}" alt="svg/logo.svg">
                        </div>
                        <div class="list-group list-group-flush" role="tablist">
                            <a class="list-group-item list-group-item-action active" data-toggle="list" href="#profile" role="tab">
                              معلوماتك الشخصية
                            </a>
                            <a class="list-group-item list-group-item-action" data-toggle="list" href="#support" role="tab">
                              الدعم
                            </a>
                        </div>
                      </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="jumbotron shade pt-5">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="profile" role="tabpanel">
                                <div>
                                    <form method="POST" action="{{ route('manager.profile.update') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="">اسمك</label>
                                            <input type="text" class="form-control" name="name" value="{{ auth('manager')->user()->name }}" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label for="">بريدك الإلكتروني</label>
                                            <input type="text" class="form-control" name="email" value="{{ auth('manager')->user()->email }}" readonly>
                                        </div>
                                        {{-- <div class="mb-3">
                                            <label for="">تغيير كلمة السر</label>
                                            <input type="password" class="form-control" name="password" placeholder="New Password">
                                        </div> --}}
                                        {{-- <div class="mb-3">
                                            <label for="">تغيير صورة البروفايل</label>
                                            <input type="file" class="form-control" name="image">
                                        </div> --}}
                                        {{-- <div class="mb-3">
                                            <input type="submit" value="حفظ" class="btn main f-second btn-block fnt-xxs">
                                        </div> --}}
                                    </form>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="support" role="tabpanel">
                                <div>
                                    <p>للتواصل مع الدعم يرجي الإتصال علي هذا الرقم</p>
                                    <p>0570001151</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection

