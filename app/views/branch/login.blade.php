@extends('layouts/metronic/front/login')


{{-- Page Title --}}
@section('title')
    @parent
    {{ 'Login' }}
@stop


{{-- Page Styles--}}
@section('styles')
    @parent
    {{-- BEGIN PAGE LEVEL STYLES --}}
    <link href="{{ asset('public/layouts/metronic/front/assets/css/pages/login.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('public/layouts/metronic/front/assets/css/toastr.css') }}" rel="stylesheet" />

    {{-- END PAGE LEVEL STYLES --}}
@stop

{{-- Page Content --}}
@section('content')
    {{-- BEGIN LOGIN FORM --}}
    {{ Form::open(array('url' => URL::Route('branch.authenticate'),'id'=>'user_login_form', 'class' => 'form-vertical login-form')) }}
    
            <h3 class="form-title">Login to your account</h3>
            
            <!--  Notification -->
            @include('layouts/metronic/front/notifications')
            
            <!-- User Name -->
            <div class="control-group {{ $errors->first('username', ' error') }}">
                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                    {{ Form::label('user_name', 'Username', array('class' => 'control-label visible-ie8 visible-ie9')) }}
                    <div class="controls">
                            <div class="input-icon left">
                                    <i class="icon-user"></i>
                                    {{ Form::text('user_name', '', array('id' => 'user_name', 'placeholder' => 'Username', 'class' => 'm-wrap placeholder-no-fix', 'autocomplete' => 'off')) }}
                            </div>
                            {{ $errors->first('username', '<label class="help-inline help-small no-left-padding" for="email">:message</label>') }}
                    </div>
            </div>
            
            <!-- Password -->
            <div class="control-group {{ $errors->first('password', ' error') }}">
                    {{ Form::label('password', 'Password', array('class' => 'control-label visible-ie8 visible-ie9')) }}
                    <div class="controls">
                            <div class="input-icon left">
                                    <i class="icon-lock"></i>
                                    {{ Form::password('password', array('id' => 'password', 'placeholder' => 'Password', 'class' => 'm-wrap placeholder-no-fix', 'autocomplete' => 'off')) }}
                            </div>
                            {{ $errors->first('password', '<label class="help-inline help-small no-left-padding" for="password">:message</label>') }}
                    </div>
            </div>
            
            <!-- Remember Me -->
            <div class="form-actions">
                     
                    <button type="submit" class="btn green pull-right button-submit">
                    Login <i class="m-icon-swapright m-icon-white"></i>
                    </button> 
                    
                    
            </div>

            
    {{ Form::close() }}
    {{-- END LOGIN FORM --}}      

@stop

@section('script')
    @parent
    {{-- BEGIN PAGE LEVEL PLUGINS --}}
    <script src="{{ asset('public/layouts/metronic/front/assets/plugins/jquery-validation/dist/jquery.validate.min.js') }}" type="text/javascript"></script>	
    <script type="text/javascript" src="{{ asset('public/layouts/metronic/front/assets/plugins/select2/select2.min.js') }}"></script>     
    {{-- END PAGE LEVEL PLUGINS --}}
    {{-- BEGIN PAGE LEVEL SCRIPTS --}}
    <script src="{{ asset('public/layouts/metronic/front/assets/scripts/app.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/layouts/metronic/front/assets/scripts/toastr.js') }}" type="text/javascript" ></script>

    
    {{-- END PAGE LEVEL SCRIPTS --}}
    <script type="text/javascript">
            jQuery(document).ready(function() {     
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
                $('#user_login_form .button-submit').click(function (event) {
                    event.preventDefault();
                    var url = $('#user_login_form').attr('action');
                    $.post(url,$('#user_login_form').serialize(),function(data){
                        if(data.success == false){
                            toastr.error(data.errors, 'Error!')
                        }else{ 
                            location = "{{URL::Route('branch.dashboard')}}";
                        }
                     });
                });
            });

    </script>
@stop

    
