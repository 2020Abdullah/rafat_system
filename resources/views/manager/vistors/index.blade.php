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
                                        <h3 class="lite-text ">صفحة التقارير</h3>
                                        <span class="lite-text text-gray">كل التقارير</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item "><a href="#"><i class="fas fa-home"></i></a></li>
                                    <li class="breadcrumb-item active">صفحة الزيارات</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="jumbotron shade pt-5">
                <div class="action">
                    <a href="{{ route('manager.vistor.export') }}" class="btn btn-main f-forth fnt-xxs">تصدير كملف اكسل</a>
                </div>
                <div class="table-title-action">
                    <h3 class="display-4">كل تقارير الزيارات</h3>
                </div>
                <hr/>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <td>كود اليوزر</td>
                            <td>رقم جوال اليوزر</td>
                            <td>رصيد اليوزر</td>
                            <td>عدد الشرائح</td>
                            <td>عدد التفعيلات</td>
                            <td>مطور المبيعات</td>
                            <td>ملاحظات</td>
                            <td>الموقع</td>
                        </tr>
                        @foreach ($Allreports as $reports)
                            <input type="hidden" id="latitude" value="{{$reports->lat}}">
                            <input type="hidden" id="longitude" value="{{$reports->long}}">
                            <tr>
                                <td>{{ $reports->vistor_code }}</td>
                                <td>{{ $reports->vistor_phone }}</td>
                                <td>{{ $reports->vistor_balance }}</td>
                                <td>{{ $reports->vistor_count_slides }}</td>
                                <td>{{ $reports->vistor_count_activity }}</td>
                                <td>{{ $reports->agent->name }}</td>
                                <td>{{ $reports->notes }}</td>
                                <td>
                                    <button  type="button" id="location" class="btn main f-second fnt-xxs" data-bs-toggle="modal" data-bs-target="#location{{ $reports->Agent_id }}">عرض</button>
                                </td>
                            </tr>
                            <!-- Modal location -->
                            <div class="modal fade" id="location{{ $reports->Agent_id }}" data-bs-keyboard="true" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">موقع اليوزر</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="googleMap"></div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection

@section('js')
<script>
    $(function(){
        $('#location').on('click', function(){
            navigator.geolocation.getCurrentPosition(
                function(position) {
                    $('#latitude').val(`${position.coords.latitude}`);
                    $('#longitude').val(`${position.coords.longitude}`);
                    $(".googleMap").html(`<iframe width="100%" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=${position.coords.latitude}, ${position.coords.longitude}+(My%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"><a href="https://www.maps.ie/distance-area-calculator.html">measure distance on map</a></iframe>`);
                },
            )
        })
    })
</script>
@endsection