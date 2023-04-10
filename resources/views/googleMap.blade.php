<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" lang="ar" dir="rtl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
input[type=text], select {
  width: 100%;
  padding: 6px 10px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 5px;
}
</style>
        <style>
            .form {
                display: flex;
                justify-content: center;
                gap: 10px;
            }
            #location {
                text-transform: uppercase;
                font-weight: normal
            }
            .output {
                margin-top: 1.5rem;
            }
        </style>

    </head>
    <body>
        <div class="container mt-5">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div class="d-flex justify-content-center">
                                <h2>تقرير الزيارة </h2>
                            </div>
                            <button class="btn btn-success" id="location">
                                الموقع الحالي
                            </button>
                        </div>
                        <div class="col-md-12">
                            <div class="output" style="width: 100%"></div>
                            <form class="form" method="Post" action="{{ route('save') }}">
                                @csrf
                                <input type="text" class="form-control" id="latitude" name="lat" readonly hidden>
                                <input type="text" class="form-control" id="longitude" name="long" readonly hidden>
                                <input type="submit" class="btn btn-danger" value="حفظ" id="save">
                            </form>
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
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
        <script>
            $(function(){
                $("#location").on('click', function(){
                    navigator.geolocation.getCurrentPosition(
                        function(position) {
                            $('#latitude').val(`${position.coords.latitude}`);
                            $('#longitude').val(`${position.coords.longitude}`);
                            $(".output").html(`<iframe width="100%" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=${position.coords.latitude}, ${position.coords.longitude}+(My%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"><a href="https://www.maps.ie/distance-area-calculator.html">measure distance on map</a></iframe>`)
                        },
                        function(failure) {
                            if(failure.message.indexOf("Only secure origins are allowed") == 0) {
                                alert('Only secure origins are allowed by your browser.');
                            }
                        }
                    )
                })
            })
        </script>
    </body>
</html>
