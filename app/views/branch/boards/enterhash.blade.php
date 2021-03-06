@extends('layouts/metronic/front/default')




{{-- Page Title --}}
@section('title')
    @parent
    {{ $page_title }}
@stop





{{-- Page Styles--}}
@section('styles')
    @parent
    {{-- BEGIN PAGE LEVEL STYLES --}} 
    
    <link href="{{ asset('public/layouts/metronic/front/assets/plugins/select2/select2_metro.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('public/layouts/metronic/front/assets/plugins/data-tables/DT_bootstrap.css') }}" rel="stylesheet" type="text/css"/>
    
    <link href="{{ asset('public/layouts/metronic/front/assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('public/layouts/metronic/front/assets/plugins/bootstrap-modal/css/bootstrap-modal.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('public/layouts/metronic/front/assets/css/pages/pricing-tables.css') }}" rel="stylesheet" type="text/css"/>

    {{-- END PAGE LEVEL STYLES --}}
@stop





{{-- Page Content --}}
@section('content') 
 

<div id="searching_modal" class="modal fade" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="text-align: center">
                <h3>Searching Instagram, Please hold on</h3>
            </div>
            <div class="modal-body" >
                <div style="height:200px">
                  <span id="searching_spinner_center" style="position: absolute;display: block;top: 50%;left: 50%;"></span>
                </div>
            </div>
            <div class="modal-footer" style="text-align: center"></div>
        </div>
    </div>
</div>


    {{-- BEGIN PAGE CONTAINER--}}
    <div class="container-fluid">
        
            <!-- BEGIN PAGE HEADER heaing, breadcrumbs etc -->
            @include('layouts.metronic.front.common.content-header')
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
            <div class="row-fluid">
                    <div class="portlet-body">
                        <p>
                            Enter the hashtag you wish to pull images from. Custom, hashtags unique to your event work best to prevent 
                            unauthorized/unwanted content from crowding your board. We'll help you pick one that is best. Not ready yet?
                           No problem! You can come back to this page anytime to begin the process. Your subscription doesn't start until the board has been published!
                        </p>
                        {{ Form::open(array('url' => URL::Route('user.fetch.instagram.tag'),'id'=>'enter_tag_form', 'class' => 'form-vertical login-form')) }}
                            {{ Form::text('tag', '', array('id' => 'tag', 'placeholder' => 'Enter Tag', 'class' => 'span6 m-wrap placeholder-no-fix', 'autocomplete' => 'off')) }}    
                            <button type="submit" class="btn blue" id="check_it">Check It Out!</button>
                        {{ Form::close() }}
                    </div> 

            </div>
            <div class="row-fluid">
                <div id="response">
                    <div class="alert alert-danger" style="display: none" id="images_warning" >
                        WOW! This hashtag has a lot of activity on it. We would recommend adding a unique number the end if you are going to use it. Otherwise you will get overloaded with random images that may not pertain to your event.
                    </div>
                    <div id="image_response"></div>
                </div>           
            </div>
            <div class="row-fluid" id="actions_btn" style="display:none" >
                <div class="pull-right">
                    <button type="button" class="btn btn-danger">Cancel</button>
                    <button type="button" class="btn blue button-next" id="next_to_2">Next</button>

                </div>
            </div>
            <!-- END PAGE CONTENT-->
    </div>
    {{-- END PAGE CONTAINER --}} 
@stop





@section('script')
    @parent
    
    <script src="{{ asset('public/layouts/metronic/front/assets/plugins/select2/select2.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/layouts/metronic/front/assets/plugins/data-tables/jquery.dataTables.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/layouts/metronic/front/assets/plugins/data-tables/DT_bootstrap.js') }}" type="text/javascript"></script>
    
    <!-- Enhanced Model Pop-ups -->
    <script src="{{ asset('public/layouts/metronic/front/assets/plugins/bootstrap-modal/js/bootstrap-modal.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/layouts/metronic/front/assets/plugins/bootstrap-modal/js/bootstrap-modalmanager.js') }}" type="text/javascript"></script>
    
    <script src="{{ asset('public/layouts/metronic/front/assets/scripts/app.js') }}"></script>
    <script src="{{ asset('public/layouts/metronic/front/assets/scripts/spin.js') }}"></script>

    <script type="text/javascript">
        jQuery(document).ready(function() {
             App.init();
             var opts = {
              lines: 13, // The number of lines to draw
              length: 20, // The length of each line
              width: 10, // The line thickness
              radius: 30, // The radius of the inner circle
              corners: 1, // Corner roundness (0..1)
              rotate: 0, // The rotation offset
              direction: 1, // 1: clockwise, -1: counterclockwise
              color: '#000', // #rgb or #rrggbb or array of colors
              speed: 1, // Rounds per second
              trail: 60, // Afterglow percentage
              shadow: false, // Whether to render a shadow
              hwaccel: false, // Whether to use hardware acceleration
              className: 'spinner', // The CSS class to assign to the spinner
              zIndex: 2e9, // The z-index (defaults to 2000000000)
              top: 'auto', // Top position relative to parent in px
              left:'auto' // Left position relative to parent in px
            };

            var target = document.getElementById('searching_spinner_center');
            var spinner = new Spinner(opts).spin(target);            
            $('#check_it').bind('click', function(event){
                $('#image_response').html('');
                $('#images_warning').hide();
                $('#searching_modal').modal('show');
                event.preventDefault();
                var url = $('#enter_tag_form').attr('action');
                $.post(url,$('#enter_tag_form').serialize(),function(data){
                    $('#searching_modal').modal('hide');
                    if(data.success == false){
                        
                        toastr.error(data.errors, 'Error!')
                    }else{
                        if(data.total > 1000){
                            $('#images_warning').show();
                        }
                        $('#image_response').html(data.images);
                        $('#actions_btn').show();
                    }
                 });
             });
             
             $('#next_to_2').bind('click',function(){
                 location = "{{url('/user/new-board/3/'.$id)}}";
             });
        });
    </script>
@stop

    
