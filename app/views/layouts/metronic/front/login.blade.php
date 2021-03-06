<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
    
{{-- BEGIN HEAD --}}
<head>
	<meta charset="utf-8" />
	<title>
            @section('title')
                Administration | 
            @show
        </title>
        
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
        
        @section('styles')
            {{-- BEGIN GLOBAL MANDATORY STYLES --}}
            <link href="{{ asset('public/layouts/metronic/front/assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
            <link href="{{ asset('public/layouts/metronic/front/assets/plugins/bootstrap/css/bootstrap-responsive.min.css') }}" rel="stylesheet" type="text/css"/>
            <link href="{{ asset('public/layouts/metronic/front/assets/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css"/>
            <link href="{{ asset('public/layouts/metronic/front/assets/css/style-metro.css') }}" rel="stylesheet" type="text/css"/>
            <link href="{{ asset('public/layouts/metronic/front/assets/css/style.css') }}" rel="stylesheet" type="text/css"/>
            <link href="{{ asset('public/layouts/metronic/front/assets/css/style-responsive.css') }}" rel="stylesheet" type="text/css"/>
            <link href="{{ asset('public/layouts/metronic/front/assets/css/themes/default.css') }}" rel="stylesheet" type="text/css" id="style_color"/>
            <link href="{{ asset('public/layouts/metronic/front/assets/plugins/uniform/css/uniform.default.css') }}" rel="stylesheet" type="text/css"/>
            <link rel="stylesheet" type="text/css" href="{{ asset('public/layouts/metronic/front/assets/plugins/select2/select2_metro.css') }}" />
            {{-- END GLOBAL MANDATORY STYLES --}}
        @show
	
        
	<link rel="shortcut icon" href="favicon.ico" />
</head>
{{-- END HEAD --}}

{{-- BEGIN BODY --}}
<body class="login">
    
	{{-- BEGIN LOGO --}}
	<div class="logo"> &nbsp;
<!--            <img src="{{ asset('public/layouts/metronic/front/assets/img/logo-big.png') }}" alt="" /> -->
	</div>
	{{-- END LOGO --}}

        {{-- BEGIN LOGIN --}}
	<div class="content">
            @yield('content')                
	</div>
	{{-- END LOGIN --}}
        
	{{-- BEGIN COPYRIGHT --}}
	<div class="copyright">
                @section('copyright')
                    2013 &copy; Metronic. Admin Dashboard Template.
                @show
	</div>
	{{-- END COPYRIGHT --}}
        
        @section('script')
            {{-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) --}}
            {{-- BEGIN CORE PLUGINS --}}   
            <script src="{{ asset('public/layouts/metronic/front/assets/plugins/jquery-1.10.1.min.js') }}" type="text/javascript"></script>
            <script src="{{ asset('public/layouts/metronic/front/assets/plugins/jquery-migrate-1.2.1.min.js') }}" type="text/javascript"></script>
            {{-- IMPORTANT! Load jquery-ui-1.10.1.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip --}}
            <script src="{{ asset('public/layouts/metronic/front/assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js') }}" type="text/javascript"></script>      
            <script src="{{ asset('public/layouts/metronic/front/assets/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
            <script src="{{ asset('public/layouts/metronic/front/assets/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js') }}" type="text/javascript" ></script>
            <!--[if lt IE 9]>
            <script src="{{ asset('public/layouts/metronic/front/assets/plugins/excanvas.min.js') }}"></script>
            <script src="{{ asset('public/layouts/metronic/front/assets/plugins/respond.min.js') }}"></script>  
            <![endif]-->   
            <script src="{{ asset('public/layouts/metronic/front/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
            <script src="{{ asset('public/layouts/metronic/front/assets/plugins/jquery.blockui.min.js') }}" type="text/javascript"></script>  
            <script src="{{ asset('public/layouts/metronic/front/assets/plugins/jquery.cookie.min.js') }}" type="text/javascript"></script>
            <script src="{{ asset('public/layouts/metronic/front/assets/plugins/uniform/jquery.uniform.min.js') }}" type="text/javascript" ></script>
            {{-- END CORE PLUGINS --}}
            {{-- END JAVASCRIPTS --}}
        @show
            
        
</body>
{{-- END BODY --}}
</html>