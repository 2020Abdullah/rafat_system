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

                            <button class="btn btn-success" id="location">
                                الموقع الحالي
                            </button>
                        </div>
                        <div class="col-md-12">
                            <form class="form" method="Post" action="{{ route('save') }}">
                                @csrf
                                <input type="text" class="form-control" id="latitude" name="lat" readonly>
                                <input type="text" class="form-control" id="longitude" name="long" readonly>
                                <input type="submit" class="btn btn-danger" value="حفظ" id="save">

                            </form>
                            <div class="output" style="width: 100%">
                            </div>

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
