<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"> 
    <link rel="stylesheet" href="{{ url('css/materialdesignicons.css') }}" />     
    <link rel="stylesheet" href="{{ url('css/font-awesome.css') }}"  />     
    <link rel="stylesheet" href="{{ url('css/vendor.bundle.addons.css') }}"  />     
    <link rel="stylesheet" href="{{ url('css/vendor.bundle.base.css') }}"  />     
    <link rel="stylesheet" href="{{ url('css/style.css') }}"  />   
    <link rel="stylesheet" href="{{ url('css/sweetalert2.min.css') }}"  />   
    <link rel="stylesheet" href="{{ url('css/jquery.datetimepicker.min.css') }}"  />     
    <link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.12/css/jquery.dataTables.css">
    <title>Human Resource Managment</title>
    <script type="text/javascript">
        var APP_URL = {!! json_encode(url('/')) !!}
    </script>
</head>
<body>
    <div class="container-scroller">
            @include('layouts.partials.header')
    </div>
    <div class="container-fluid page-body-wrapper">
        @include('layouts.partials.nav')
        <div class="main-panel">
            <div class="content-wrapper">
                @yield("content")
            </div>
            @include('layouts.partials.footer')
                
        </div>
    </div>
    <!-- Scripts -->
    <script src="{{ mix('js/sweetalert2.all.min.js')  }}"></script>    
    <script src="{{ mix('js/app.js')  }}"></script>    
    <script src="{{ mix('js/library.js')  }}"></script>   
    <script src="{{ mix('js/special-char.js')  }}"></script>   
    <script src="{{ mix('js/jquery.datetimepicker.full.js')  }}"></script>  

    @yield('script')
</body>
</html>