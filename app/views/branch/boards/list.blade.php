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
    <link href="{{ asset('public/layouts/metronic/front/assets/plugins/bootstrap-switch/static/stylesheets/bootstrap-switch-metro.css') }}" rel="stylesheet" type="text/css"/>

    {{-- END PAGE LEVEL STYLES --}}
@stop

    



{{-- Page Content --}}
@section('content') 
 

   <div id="working_modal" class="modal fade" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="text-align: center">
                    <h3>Working, Please wait...</h3>
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
    <div id="confirm_modal" class="modal fade" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Are you sure?</h3>
                </div>
                <div class="modal-body" >
                    Do you want to delete ?
                </div>
                <div class="modal-footer">
                    <button class="btn green" data-dismiss="modal" aria-hidden="true" id="cancel_preset">Cancel</button>
                    <button class="btn red" id="delete_board">Delete</button>                    
                </div>
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
                    <div class="row-fluid">
                        <div class="span7">
                            <!-- BEGIN SAMPLE TABLE PORTLET-->
                            <div class="portlet box green">
                                    <div class="portlet-title">
                                            <div class="caption"><i class="icon-cogs"></i>{{$page_title}}</div>
                                            <input type="hidden" name="deleted_board_id" id="deleted_board_id" value=""/>
                                    </div>
                                    <div class="portlet-body">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Subscription Type</th>
                                                    <th>Tag</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="board_data">
                                                
                                            </tbody>
                                        </table>
                                    </div>
                            </div>
                            <!-- END SAMPLE TABLE PORTLET-->
                        </div>
                        <div class="span5" id="board_setting" style="display: none;">
                            {{ Form::open(array('id'=>'settings_form', 'class' => 'horizontal-form')) }}
                            <div class="portlet box blue">
                                <div class="portlet-title">
                                    <div class="caption"><i class="icon-reorder"></i>Board Settings</div>
                                </div>
                                <div class="portlet-body form">
                                    <!-- BEGIN FORM-->
                                        <input type="hidden" id="board_id_setting" name="board_id_setting" value="0" />
                                        <div class="row-fluid">
                                            <div class="span2">&nbsp;</div>
                                            <div class="span5">
                                                <div class="control-group">
                                                    <label class="control-label"><strong>Control</strong></label>
                                                    <div class="controls">
                                                        <div class="switch">
                                                            <input type="checkbox" name="control" id="control" checked class="toggle" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="span5">
                                                <div class="control-group">
                                                    <label class="control-label"><strong>Lock Down</strong></label>
                                                    <div class="controls">
                                                        <div class="switch">
                                                                <input type="checkbox" name="lock_down" id="lock_down" checked class="toggle" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <div class="row-fluid">
                                            
                                                <button type="button" class="btn green pull-right" id="save_settings">Save</button>
                                        </div>
                                    <!-- END FORM--> 
                                </div>
                            </div>
                            {{ Form::close() }}               
                            
                        </div>
                        <div class="span5" id="board_detail" style="display: none">
                            <h3>Preset Name: <span id="preset_name"></span></h3>
                            <div class="tabbable tabbable-custom boxless">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a data-toggle="tab" href="#tab_1">Appearance</a></li>
                                        <li><a data-toggle="tab" href="#tab_2">Layout / Animation</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div id="tab_1" class="tab-pane active">
                                            <div class="portlet box blue">
                                                <div class="portlet-title">
                                                    <div class="caption"><i class="icon-reorder"></i>Appearance</div>
                                                </div>
                                                <div class="portlet-body form">
                                                    <!-- BEGIN FORM-->
                                                    
                                                        <div class="row-fluid">
                                                            <div class="span6 ">
                                                                <div class="control-group">
                                                                    <label class="control-label"><strong>Font</strong></label>
                                                                    <div class="controls" id="font">

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                            <div class="span6 ">
                                                                <div class="control-group">
                                                                    <label class="control-label"><strong>Branding</strong></label>
                                                                    <div class="controls">
                                                                        <div class="switch" id="branding">
                                                                            
									</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                        </div>
                                                        <div class="row-fluid">
                                                            <div class="span6 ">
                                                                <div class="control-group">
                                                                    <label class="control-label" ><strong>Font Size</strong></label>
                                                                    <div class="controls" id="font_size">

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                            <div class="span6 ">
                                                                <div class="control-group">
                                                                    <label class="control-label" ><strong>Glow/Shadow Effect</strong></label>
                                                                    <div class="controls">
                                                                        <div class="switch" id="glow_shadow_effect">
                                                                            
									</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                        </div> 
                                                        <div class="row-fluid">
                                                            <div class="span6 ">
                                                                <div class="control-group">
                                                                    <label class="control-label"><strong>Location</strong></label>
                                                                    <div class="controls" id="location">
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                            <div class="span6 ">
                                                                <div class="control-group">
                                                                    <label class="control-label" ><strong>Effect Color</strong></label>
                                                                    <div class="controls" id="effect_color">
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                        </div>
                                                        
                                                        <div class="row-fluid">
                                                            <div class="span6 ">
                                                                <div class="control-group">
                                                                    <label class="control-label" ><strong>Font Color</strong></label>
                                                                    <div class="controls" id="font_color">
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                            <div class="span6 ">
                                                                <div class="control-group">
                                                                    <label class="control-label" ><strong>Photo Background</strong></label>
                                                                    <div class="controls" id="photo_background">
                                                                        glow_shadow_effect
                                                                        effect_color
                                                                        photo_background
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                        </div>                                                         
                                                        
                                                        <div class="row-fluid">
                                                            <div class="span6 ">
                                                                <div class="control-group">
                                                                    <label class="control-label" ><strong>Background Color</strong></label>
                                                                    <div class="controls" id="background_color">
                                                                       
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                            <div class="span6 ">
                                                                <div class="control-group">
                                                                    <label class="control-label"><strong>Photo Background Color</strong></label>
                                                                    <div class="controls" id="photo_background_color">
                                                                         
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                        </div>                                                        
                                                        <div class="row-fluid">
                                                            <div class="span12">
                                                                <label class="control-label" >
                                                                    <strong>Include In Layout</strong>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="well">
                                                            <div class="row-fluid">
                                                                <div class="span12">
                                                                    <table class="table table-hover">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Avatar</th>
                                                                                <th>Name</th>
                                                                                <th>Likes</th>
                                                                                <th>Comments</th>
                                                                                <th>Caption</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody id="board_data">

                                                                            <tr>
                                                                                <td><div id="include_avatar"></div></td>
                                                                                <td><div id="include_name"></div></td>
                                                                                <td><div id="include_likes"></div> </td>
                                                                                <td><div id="include_comments"></div> </td>
                                                                                <td><div id="include_caption"></div> </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>                                                                    
                                                                            
                                                                </div>                                                             
                                                            </div>
                                                            <div class="row-fluid" >
                                                                <img src="" id="logo_img"/>
                                                            </div>       
                                                        </div>
                                                        
                                                    
                                                    <div class="row-fluid" >
                                                        <form action="{{ URL::Route('user.add.logo')}}" class="dropzone" id="my-awesome-dropzone"></form>
                                                    </div>
                                                    <!-- END FORM--> 
                                                </div>
                                            </div>
                                        </div>
                                        <div id="tab_2" class="tab-pane">
                                            <div class="portlet box blue">
                                                <div class="portlet-title">
                                                    <div class="caption"><i class="icon-reorder"></i>Layout / Animation</div>
                                                </div>
                                                <div class="portlet-body form">
                                                    <!-- BEGIN FORM-->
                                                    
                                                        
                                                        <div class="row-fluid">
                                                            <div class="span8 ">
                                                                <div class="control-group">
                                                                    <label class="control-label" ><strong>Photo Size</strong></label>
                                                                    <div class="controls" id="photo_size">
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> 
                                                        <div class="row-fluid">
                                                            <div class="span6">
                                                                <div class="control-group">
                                                                    <label class="control-label" ><strong>Grid Row</strong></label>
                                                                    <div class="controls" id="grid_row">
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> 
                                                        <div class="row-fluid">
                                                            <div class="span6">
                                                                <div class="control-group">
                                                                    <label class="control-label" ><strong>Grid Column</strong></label>
                                                                    <div class="controls"  id="grid_column">
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> 
                                                        <div class="row-fluid">
                                                            <div class="span8 ">
                                                                <div class="control-group">
                                                                    <label class="control-label" ><strong>Animation Preset</strong></label>
                                                                    <div class="controls" id="animation_preset">
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>                                                         
                                                       <div class="row-fluid">
                                                            <div class="span8 ">
                                                                <div class="control-group">
                                                                    <label class="control-label" ><strong>Animation Speed</strong></label>
                                                                    <div class="controls" id="animation_speed">
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>                                                                                                                 
                                                  
                                                   
                                                   
                                                    <!-- END FORM-->                
                                                </div>
                                            </div>
                                        </div>
                                    </div>
				</div>
                        </div>
                    </div>
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
    <script src="{{ asset('public/layouts/metronic/front/assets/plugins/bootstrap-switch/static/js/bootstrap-switch.js') }}"></script>

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
             get_board = function(){
                $('#board_data').html('');
                $.post("{{ URL::Route('user.ajax.manageboard')}}",null,function(data){
                      var i = 1;
                      var html = '';
                      if(data.length == 0){
                           html += '<tr>';
                            html += '<td colspan="4">No board found</td>';
                           html += '</tr>';  
                      }
                      $.each(data, function(index, item) {
                           html += '<tr>';
                            html += '<td>'+i+'</td>';
                            html += '<td>'+item.name+'</td>';
                            html += '<td>'+item.tag+'</td>';
                            html += '<td><a class="btn mini purple viewuser" name="'+item.board_id+'" href="#working_modal" data-toggle="modal"><i class="icon-book"></i> View</a>&nbsp;<a class="btn mini green view" name="'+item.board_id+'" href="#working_modal" data-toggle="modal"><i class="icon-book"></i> Details</a>&nbsp;<a class="btn mini blue setting" name="'+item.board_id+'" href="#working_modal" data-toggle="modal"><i class="icon-cogs"></i> Settings</a>&nbsp;<a class="btn mini red delete" name="'+item.board_id+'" href="#confirm_modal" data-toggle="modal"><i class="icon-trash"></i> Delete</a></td>';
                           html += '</tr>';
                           i++;
                      });
                      $('#board_data').append(html);
                });
             }            
             get_board();
             $(document.body).on('click','.viewuser' , function(){
                
             });
             $(document.body).on('click','.view' , function(){
                var id = $(this).attr('name');
                var form_data = {'board_id':id};
                $.post("{{ URL::Route('user.ajax.view.board')}}",form_data,function(data){
                    $('#working_modal').modal('hide');
                    data = data[0] ; 
                    $('#preset_name').html(data.preset_name);
                    
                    $('#font').html(data.font_name);
                    $('#font_size').html(data.font_size);
                    $('#location').html(data.location_name);
                    $('#font_color').html(data.font_color);
                    $('#background_color').html(data.background_color);
                    $('#include_avatar').html(data.include_avatar);
                    $('#include_name').html(data.include_name);
                    $('#include_likes').html(data.include_likes);
                    $('#include_comments').html(data.include_comments);
                    $('#include_caption').html(data.include_caption);
                    
                    $('#branding').html(data.branding);
                    $('#glow_shadow_effect').html(data.glow_shadow_effect);
                    $('#effect_color').html(data.effect_color);
                    $('#photo_background').html(data.photo_background);
                    $('#photo_background_color').html(data.photo_background_color);
     
                    $('#photo_size').html(data.photo_size_name);
                    $('#grid_row').html(data.photo_background_color);
                    $('#grid_column').html(data.photo_background_color);
                    $('#animation_preset').html(data.animation_name);
                    $('#animation_speed').html(data.animation_speed_name);
                    $('#logo_img').attr('src',"{{ asset('public/uploads/preset/logo')}}"+"/"+data.logo);
                    $("#board_setting").hide();
                    $('#board_detail').show();
                });
                
             });
             
             $(document.body).on('click','.delete' , function(){
                var id = $(this).attr('name');
                $('#deleted_board_id').val(id);
                $("#board_setting").hide();
                $('#board_detail').hide();                
                
             });
             $(document.body).on('click','.setting',function(){
                $('#settings_form').trigger('reset');
                $('#board_detail').hide();
                var id = $(this).attr('name');
                var form_data = {'board_id':id};
                $.post("{{ URL::Route('user.ajax.view.board')}}",form_data,function(data){
                    $('#working_modal').modal('hide');
                    data = data[0] ; 
                    $('#board_id_setting').val(data.board_id);
                    if(data.control == "no"){
                        $('#control').click(); // default state is ON for BootStrap Switch, make it OFF in case of "NO" by intiating Click event 
                    }
                    if(data.lock_down == "no"){
                        $('#lock_down').click(); // default state is ON for BootStrap Switch, make it OFF in case of "NO" by intiating Click event 
                    }
                    $("#board_setting").show();
                });
             });
             
             $('#save_settings').bind('click',function(){
                 var form_data = $('#settings_form').serialize();
                 $.post("{{ URL::Route('user.ajax.save.board.settings')}}",form_data,function(data){
                    if(data.success == true){
                        toastr.success('<p>Settings saved successfully!</p>', 'Success!');    
                        
                    }
                 });
             });
             $('#delete_board').bind('click',function(){
                 var id = $('#deleted_board_id').val();
                 var form_data = {'board_id':id};
                 $.post("{{ URL::Route('user.ajax.delete.board')}}",form_data,function(data){
                    get_board();
                    $('#board_detail').hide();
                    $('#confirm_modal').modal('hide');
                 });  
             });
        });
    </script>
@stop

    
