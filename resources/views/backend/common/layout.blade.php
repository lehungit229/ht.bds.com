<!DOCTYPE html>
<html>

<head>

    <script>
        var BASE_URL = {!! json_encode(url('/')) !!} ;
    </script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <base href="{!! json_encode(url('/')) !!}">
    <title>HT CMS | Dashboard</title>
    
    <link href=" {{ URL::asset('plugin/jquery-ui.css') }}" rel="stylesheet">
    <link href=" {{ URL::asset('plugin/blueimp/css/blueimp-gallery.min.css') }}"  rel="stylesheet" type="text/css" >
    <link href=" {{ URL::asset('plugin/clockpicker/dist/bootstrap-clockpicker.min.css') }}"  rel="stylesheet" type="text/css" >
    <link href=" {{ URL::asset('plugin/select2/dist/css/select2.min.css') }}" rel="stylesheet" />
     
    <link href=" {{ URL::asset('plugin/rating/SimpleStarRating.css') }}" rel="stylesheet">

    <link href=" {{ URL::asset('backend/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href=" {{ URL::asset('backend/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <!-- Toastr style -->
    <link href=" {{ URL::asset('backend/css/plugins/toastr/toastr.min.css') }}" rel="stylesheet">
    <!-- Gritter -->
    <link href=" {{ URL::asset('backend/js/plugins/gritter/jquery.gritter.css') }}" }} rel="stylesheet">
    <link href=" {{ URL::asset('backend/css/animate.css') }}" rel="stylesheet">
    <link href=" {{ URL::asset('backend/css/plugins/datapicker/datepicker3.css') }}" rel="stylesheet">
    <link href=" {{ URL::asset('backend/css/plugins/iCheck/custom.css') }}" rel="stylesheet">
    <link href=" {{ URL::asset('backend/css/plugins/sweetalert/sweetalert.css') }}" rel="stylesheet">

    <link href=" {{ URL::asset('backend/css/plugins/colorpicker/bootstrap-colorpicker.min.css') }}" rel="stylesheet">
    <link href=" {{ URL::asset('backend/css/plugins/jasny/jasny-bootstrap.min.css') }}" rel="stylesheet">
     
    <link href=" {{ URL::asset('backend/css/animate.css') }}" rel="stylesheet">
    <link href=" {{ URL::asset('backend/css/style.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{ URL::asset('favicon.ico') }}" type="image/x-icon">
    <link href=" {{ URL::asset('backend/css/customize.css') }}" rel="stylesheet">


     <script src=" {{ URL::asset('plugin/jquery-3.3.1.min.js') }}"></script>
    <script src=" {{ URL::asset('plugin/jquery.timeago.js') }}"></script>
    <script src=" {{ URL::asset('plugin/ckeditor/ckeditor.js') }}" charset="utf-8"></script>
    <script src="{{ URL::asset('plugin/jquery-ui.js') }}"></script>
    
    
</head>

<body>
    
    <div id="wrapper">
        @section('sidebar')
            @include('backend/common/sidebar')
        @show
        @section('notification')
            @include('backend/common/notification')
        @show
        @yield('content')

        
        
    </div>

     <!-- GENERAL SCRIPT -->
    
    <script src="{{ URL::asset('backend/js/plugins/jasny/jasny-bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('backend/js/plugins/iCheck/icheck.min.js') }}"></script>
    <script src="{{ URL::asset('backend/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('backend/js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
    <script src="{{ URL::asset('backend/js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ URL::asset('backend/js/plugins/nestable/jquery.nestable.js') }}"></script>
    <script src="{{ URL::asset('backend/js/inspinia.js') }}"></script>
    <script src="{{ URL::asset('backend/js/plugins/pace/pace.min.js') }}"></script>
    <script src="{{ URL::asset('backend/js/plugins/toastr/toastr.min.js') }}"></script>
    <script src="{{ URL::asset('backend/js/plugins/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ URL::asset('backend/js/plugins/tinycon/tinycon.min.js') }}"></script>
    
    <script src="{{ URL::asset('backend/js/plugins/datapicker/bootstrap-datepicker.js') }}"></script>

    
    <script src="{{ URL::asset('backend/js/plugins/colorpicker/bootstrap-colorpicker.min.js') }}"></script>
    <script src="{{ URL::asset('backend/js/plugins/clockpicker/clockpicker.js') }}"></script>
    
    
     <!-- jquery UI -->
    <script src="{{ URL::asset('backend/js/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ URL::asset('backend/js/plugins/touchpunch/jquery.ui.touch-punch.min.js') }}"></script>
    <script src="{{ URL::asset('backend/js/plugins/iCheck/icheck.min.js') }}"></script>
    
    <script src="{{ URL::asset('plugin/select2/dist/js/select2.min.js') }}"></script>
    
    <script src="{{ URL::asset('backend/library/function.js') }}"></script>
    @if(!empty($script))
        <script src="{{ URL::asset('backend/library/'.$script.'.js') }}"></script>
    @endif
</body>
</html>
