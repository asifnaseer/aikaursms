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
            <link href="{{ asset('public/layouts/metronic/front/assets/css/themes/blue.css') }}" rel="stylesheet" type="text/css" id="style_color"/>
            <link href="{{ asset('public/layouts/metronic/front/assets/plugins/uniform/css/uniform.default.css') }}" rel="stylesheet" type="text/css"/>
            <link href="{{ asset('public/layouts/metronic/front/assets/plugins/glyphicons/css/glyphicons.css') }}" rel="stylesheet" />
            <link href="{{ asset('public/layouts/metronic/front/assets/plugins/glyphicons_halflings/css/halflings.css') }}" rel="stylesheet" />
            <link href="{{ asset('public/layouts/metronic/front/assets/css/toastr.css') }}" rel="stylesheet" />

            {{-- END GLOBAL MANDATORY STYLES --}}
        @show
	        
	<link rel="shortcut icon" href="favicon.ico" />
</head>
{{-- END HEAD --}}

{{-- BEGIN BODY --}}
<body class="page-header-fixed">
    
	{{-- BEGIN HEADER --}}  
	<div class="header navbar navbar-inverse navbar-fixed-top">
		{{-- BEGIN TOP NAVIGATION BAR --}}
		<div class="navbar-inner">
			<div class="container-fluid">
                            
				{{-- BEGIN LOGO --}}
				<a class="brand" href="index.html">
                                    <img src="{{ asset('public/layouts/metronic/front/assets/img/logo.png') }}" alt="logo" />
				</a>
				{{-- END LOGO --}}
                                
                                @include('layouts.metronic.front.common.horizontle-menu')


                                {{-- BEGIN RESPONSIVE MENU TOGGLER --}}
				<a href="javascript:;" class="btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">
                                    <img src="{{ asset('public/layouts/metronic/front/assets/img/menu-toggler.png') }}" alt="" />
				</a>          
				{{-- END RESPONSIVE MENU TOGGLER --}}
                                
             
				@include('layouts.metronic.front.common.notification-menu')

			</div>
		</div>
		{{-- END TOP NAVIGATION BAR --}}
	</div>
	{{-- END HEADER --}}

        {{-- BEGIN CONTAINER --}} 
	<div class="page-container row-fluid" >
            

                @include('layouts.metronic.front.common.sidebar-menu')

                {{-- BEGIN PAGE --}}
		<div class="page-content">
                    <div id="modal-popup" class="modal hide fade" tabindex="-1" data-width="90%"></div>
                    @yield('content')
		</div>
		{{-- END PAGE --}}
                
	</div>
	{{-- END CONTAINER --}}
        
             
        {{-- BEGIN FOOTER --}}
	<div class="footer">
		<div class="footer-inner">
			@section('copyright')
                            2013 &copy; Metronic. Admin Dashboard Template.
                        @show
		</div>
		<div class="footer-tools">
			<span class="go-top">
			<i class="icon-angle-up"></i>
			</span>
		</div>
	</div>
	{{-- END FOOTER --}}
        
        @section('script')
            {{-- BEGIN CORE PLUGINS --}}   
            <script src="{{ asset('public/layouts/metronic/front/assets/plugins/jquery-1.10.1.min.js') }}" type="text/javascript"></script>
            <script src="{{ asset('public/layouts/metronic/front/assets/plugins/jquery-migrate-1.2.1.min.js') }}" type="text/javascript"></script>
            <!-- IMPORTANT! Load jquery-ui-1.10.1.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
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
            <script src="{{ asset('public/layouts/metronic/front/assets/scripts/common/functions.js') }}" type="text/javascript" ></script>
            <script src="{{ asset('public/layouts/metronic/front/assets/scripts/toastr.js') }}" type="text/javascript" ></script>

            
            <script>
                toastr.options = {
                    "closeButton": false,
                    "debug": false,
                    "positionClass": "toast-bottom-full-width",
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                  }
            </script>
            {{-- END CORE PLUGINS --}}
        @show
            
    <script>
    jQuery(document).ready(function() {    
       App.init(); // initlayout and core plugins
    });
    </script>
</body>
{{-- END BODY --}}
</html>