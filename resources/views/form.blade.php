@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="vistor d-flex justify-content-center">
        <h2>تقرير الزيارة </h2>
    </div>
    <form class="form" method="Post" action="#">
    @csrf
    <input type="text" class="form-control" id="latitude" name="lat" readonly>
    <input type="text" class="form-control" id="longitude" name="long" readonly>
    <input type="submit" class="btn btn-danger" value="حفظ" id="save">
    
    </form>
    <div class="output" style="width: 100%">
    </div>
    <form>
    <div class="mb-3">
    <label for="usernumber" class="form-label">رقم اليوزر </label>
    <input type="number" class="form-control" id="usernumber">
    </div>
    <div class="mb-3">
    <label class="form-label" for="typePhone">رقم جوال صاحب اليوزر</label>
    <input type="tel" id="typePhone" class="form-control" />
    </div>
    <div class="mb-3">
    <label for="usercount" class="form-label">كم الرصيد في اليوزر </label>
    <input type="number" class="form-control" id="usercount">
    </div>
    <div class="mb-3">
    <label for="usercard" class="form-label">كم عدد الشرايح الجديده</label>
    <input type="number" class="form-control" id="usercard">
    </div>
    <div class="mb-3">
    <label for="activenumber" class="form-label">كم عدد التفعيلات </label>
    <input type="number" class="form-control" id="activenumber">
    </div>
    <div class="mb-3">
    <label for="notes" class="form-label">ملاحظات عن السوق و حالة اليوزر</label>
    <input type="text" class="form-control" id="notes">
    </div>
    <select class="form-select" aria-label="Default select example">
    <option selected>اسم المشرف</option>
    <option value="1">One</option>
    <option value="2">Two</option>
    <option value="3">Three</option>
    </select>
    <br/>
    <select class="form-select" aria-label="Default select example">
    <option selected>اسم المطور</option>
    <option value="1">One</option>
    <option value="2">Two</option>
    <option value="3">Three</option>
    </select>
    <br/>
    <button type="submit" class="btn btn-primary form-control">إرسال</button>
    </form>
    
</div>

@endsection
