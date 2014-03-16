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
    <link href="{{ asset('public/layouts/metronic/front/assets/css/pages/pricing-tables.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('public/layouts/metronic/front/assets/plugins/bootstrap-switch/static/stylesheets/bootstrap-switch-metro.css') }}" rel="stylesheet" type="text/css"/>

    <link rel="stylesheet" type="text/css" href="{{ asset('public/layouts/metronic/front/assets/plugins/bootstrap-colorpicker/css/colorpicker.css') }}" />

    <link href="{{ asset('public/layouts/metronic/front/assets/plugins/dropzone/css/dropzone.css') }}" rel="stylesheet"/>

    {{-- END PAGE LEVEL STYLES --}}
@stop





{{-- Page Content --}}
@section('content') 
   
    {{-- BEGIN PAGE CONTAINER--}}
    <div class="container-fluid">
        
            <!-- BEGIN PAGE HEADER heaing, breadcrumbs etc -->
            @include('layouts.metronic.front.common.content-header')
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
             <div id="optionExplained" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-header">
                <h3 id="myModalLabel">Options Explained</h3>
                
              </div>
              <div class="modal-body">
                    <div class="row-fluid">
                        <div class="span12">Curious about what all of those options mean? Use this as your guide!</div>
                    </div>
                    <div class="row-fluid">
                        <div class="span4">
                            <!------ Left Part --------->
                            <div class="row-fluid" >
                                <div class="span12">
                                    The avatar of the photo submitter
                                      <img  src="{{ asset('public/layouts/metronic/front/assets/img/left_arrow.png')}}"  
                                      style="position:fixed;padding-left: 40px;"/>
                                </div>
                            </div>
                            <div class="row-fluid" style="margin-top: 75px;" >
                                <div class="span12">
                                    The photo submitted
                                    <img  src="{{ asset('public/layouts/metronic/front/assets/img/left_arrow.png')}}"  
                                      style="position:fixed;padding-left: 5px;"/>
                                </div>
                            </div>
                            <div class="row-fluid" style="padding-left: 25px;margin-top: 7px;" >
                                <div class="span12">
                                    The number of likes and comments on the photo submitted
                                    <img  src="{{ asset('public/layouts/metronic/front/assets/img/left_arrow.png')}}"  
                                      style="position:fixed;padding-left: 5px;"/>
                                </div>
                            </div> 
                           <div class="row-fluid" style="margin-top: 17px;" >
                                <div class="span12">
                                    <img  src="{{ asset('public/layouts/metronic/front/assets/img/left_arrow.png')}}"  
                                      style="position:fixed;padding-left: 100px;"/> <br>
                                    The caption included with the photo when submitted
                                   
                                    
                                </div>
                            </div>                             
                        </div>
                        <div class="span4">
                            <!------ Middle Part --------->
                           
                            <div class="row-fluid" style="border: 1px solid #000;padding: 7px;" id="thumb_box">
                                <div class="span1">&nbsp;</div>
                                <div class="span10">
                                    <div class="row-fluid">
                                        <div class="span4">
                                            <img src="{{ asset('public/layouts/metronic/front/assets/img/options_explained.png')}}" height="10px;"/>
                                        </div>  
                                        <div class="span8" style="padding:10px;">userName</div>
                                    </div>
                                    <div class="row-fluid" style="margin-top: 5px;">
                                        <img src="{{ asset('public/layouts/metronic/front/assets/img/options_explained.png')}}"/>
                                    </div>
                                    <div class="row-fluid">
                                        <div class="span2">
                                            <i class="icon-heart"></i>
                                        </div>
                                        <div class="span2">
                                            12
                                        </div>
                                        <div class="span2">
                                            <i class="icon-comments"></i>
                                        </div>
                                        <div class="span2">
                                            3
                                        </div>                                        
                                    </div>
                                    <div class="row-fluid">
                                        Good luck at your new job! Here is a keepsake to remember me by!#caioFrancescaTL
                                    </div>
                                </div>
                                <div class="span1">&nbsp;</div>
                            </div>
                        </div>
                        <div class="span4">
                            <!------ Right Part Part --------->
                            <div class="row-fluid" style="margin-left:5px;">
                                <div class="span12">
                                    The name of the photo submitter.
                                    <img src="{{ asset('public/layouts/metronic/front/assets/img/right_arrow.png')}}" 
                                         style="position:fixed;margin-left: -105px;margin-top: -14px;"
                                         />
                                    <br><br>
                                    
                                    
                                </div>
                            </div> 
                            <div class="row-fluid" style="margin-top:20px;margin-left:5px;">
                                <div class="span12">The photo background if enabled.
                                    <img src="{{ asset('public/layouts/metronic/front/assets/img/right_arrow.png')}}" 
                                         style="position:fixed;margin-left: -78px;margin-top: 13px;"
                                         />
                                </div>
                            </div>                            
                            <div class="row-fluid" style="margin-top:50px;margin-left:5px;">
                                <div class="span12">Glow / Shadow Effect if enabled.

                                    <img src="{{ asset('public/layouts/metronic/front/assets/img/right_arrow.png')}}" 
                                         style="position:fixed;margin-left: -60px;margin-top: 13px;"
                                         />
                                </div>
                            </div>                                                           
                        </div>                        
                    </div>                  
              </div>
              <div class="modal-footer">
                <button class="btn green" data-dismiss="modal" aria-hidden="true" id="cancel_preset">Cool! Got it!</button>
               
              </div>
            </div>
            
            <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              {{ Form::open(array('id'=>'preset_name_form', 'class' => 'horizontal-form')) }}
              <div class="modal-header">
                <h3 id="myModalLabel">Save Preset</h3>
                
              </div>
              <div class="modal-body">
                    <p>Created a little masterpiece did ya? Awesome! Give it a name :-D</p>
                    <input type="text" class="m-wrap huge" name="preset_name" id="preset_name" value="" placeholder="My Awesome Preset Name" />
              </div>
              <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true" id="cancel_preset">Cancel</button>
                <button class="btn btn-primary" id="save_preset">Save</button>
              </div>
              {{ Form::close() }}
            </div>

            <div id="confirmModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-header">
                <h3 id="myModalLabel">Delete Preset</h3>

              </div>
              <div class="modal-body" >
                 <p>Is the romance over? Lost your passion for this once work of art? No worries, it happens :-D <br>
                    Just make sure you're %14,981 positive you want to delete it. This cannot be undone.
                 </p>
                 <h3 id="deleted_preset_name"></h3>
              </div>
              <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true" id="cancel_delete_preset">Cancel</button>
                <button class="btn btn-primary" id="delete_it">Delete</button>
              </div>
            </div>       

            <div id="confim_customization" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-header">
                <h3 id="myModalLabel">Done Customizing?</h3>
              </div>
              <div class="modal-body" >
                 <p>
                     We like to double check and make sure you're really finished checking out all of the cool options. If so - BRILLIANT! 
                     
                 </p>
                
              </div>
              <div class="modal-footer">
                <button class="btn red" data-dismiss="modal" aria-hidden="true">Opps! j/k</button>
                <button class="btn green btn-primary" id="i_m_done">I'm done</button>
              </div>
            </div>  
            <div class="row-fluid">
                    <div class="portlet-body">
                        <p>
                            Almost finished! Here is where we get to have a little fun. You can customize your board or choose from some of our presets. 
                            Be sure to check out our animation presets and photo layout options! Have fun with it! <br>
                            If you need help <a href="#optionExplained" data-toggle="modal" id="click_here">CLICK HERE</a>
                        </p>
                        <div class="row-fluid">
                            <div class="span6">
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
                                                    {{ Form::open(array('id'=>'appearance_form', 'class' => 'horizontal-form')) }}
                                                        <div class="row-fluid">
                                                            <div class="span6 ">
                                                                <div class="control-group">
                                                                    <label class="control-label">Font</label>
                                                                    <div class="controls">
                                                                        <select class="m-wrap span12" name="font" id="font">
                                                                            @foreach ($fonts as $font)
                                                                            <option value="{{$font->id}}">{{$font->name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                            <div class="span6 ">
                                                                <div class="control-group">
                                                                    <label class="control-label">Branding</label>
                                                                    <div class="controls">
                                                                        <div class="switch">
                                                                            <input type="checkbox" name="branding" id="branding" checked class="toggle"/>
									</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                        </div>
                                                        <div class="row-fluid">
                                                            <div class="span6 ">
                                                                <div class="control-group">
                                                                    <label class="control-label" >Font Size</label>
                                                                    <div class="controls">
                                                                        <select class="m-wrap span12" name="font_size" id="font_size">
                                                                            @foreach ($sizes as $size)
                                                                            <option value="{{$size->id}}">{{$size->name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                            <div class="span6 ">
                                                                <div class="control-group">
                                                                    <label class="control-label" >Glow/Shadow Effect</label>
                                                                    <div class="controls">
                                                                        <div class="switch">
                                                                            <input type="checkbox" name="glow_shadow_effect" id="glow_shadow_effect" checked class="toggle"/>
									</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                        </div> 
                                                        <div class="row-fluid">
                                                            <div class="span6 ">
                                                                <div class="control-group">
                                                                    <label class="control-label">Location</label>
                                                                    <div class="controls">
                                                                        <select class="m-wrap span12" name="location" id="location">
                                                                            @foreach ($locations as $location)
                                                                            <option value="{{$location->id}}">{{$location->name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                            <div class="span6 ">
                                                                <div class="control-group">
                                                                    <label class="control-label" >Effect Color</label>
                                                                    <div class="controls">
                                                                        <div class="input-append color colorpicker-default" data-color="#3865a8" >
                                                                                <input type="text" class="m-wrap" name="effect_color" id="effect_color" value="#3865a8" readonly />
                                                                                <span class="add-on"><i style="background-color: #3865a8;"></i></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                        </div>
                                                        
                                                        <div class="row-fluid">
                                                            <div class="span6 ">
                                                                <div class="control-group">
                                                                    <label class="control-label" >Font Color</label>
                                                                    <div class="controls">
                                                                        <div class="input-append color colorpicker-default" data-color="#3865a8" >
                                                                                <input type="text" class="m-wrap" value="#FFFFFF" name="font_color" id="font_color" readonly />
                                                                                <span class="add-on"><i style="background-color: #FFFFFF;"></i></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                            <div class="span6 ">
                                                                <div class="control-group">
                                                                    <label class="control-label" >Photo Background</label>
                                                                    <div class="controls">
                                                                        <div class="switch">
                                                                            <input type="checkbox" name="photo_background" id="photo_background" checked class="toggle"/>
									</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                        </div>                                                         
                                                        
                                                        <div class="row-fluid">
                                                            <div class="span6 ">
                                                                <div class="control-group">
                                                                    <label class="control-label" >Background Color</label>
                                                                    <div class="controls">
                                                                        <div class="input-append color colorpicker-default" data-color="#3865a8" >
                                                                                <input type="text" class="m-wrap" name="background_color" id="background_color" value="#3865a8" readonly />
                                                                                <span class="add-on"><i style="background-color: #3865a8;"></i></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                            <div class="span6 ">
                                                                <div class="control-group">
                                                                    <label class="control-label">Photo Background Color</label>
                                                                    <div class="controls">
                                                                        <div class="input-append color colorpicker-default" data-color="#3865a8">
                                                                                <input type="text" class="m-wrap" name="photo_background_color" id="photo_background_color" value="#3865a8" readonly />
                                                                                <span class="add-on"><i style="background-color: #3865a8;"></i></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                        </div>                                                        
                                                        <div class="row-fluid">
                                                            <div class="span12">
                                                                <label class="control-label" >
                                                                    Include In Layout
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="well">
                                                            <div class="row-fluid">
                                                                <div class="span12">
                                                                    <div class="span3">
                                                                        <label class="checkbox line">Avatar
                                                                            <input type="checkbox"  value="1" name="include_avatar" id="include_avatar"/> 
                                                                        </label>
                                                                    </div>  
                                                                    <div class="span3">
                                                                        <label class="checkbox line"> Name
                                                                        <input type="checkbox" value="2" name="include_name" id="include_name"/>
                                                                        </label>
                                                                    </div>  
                                                                     <div class="span3">
                                                                        <label class="checkbox line"> Likes
                                                                        <input type="checkbox" value="3" name="include_likes" id="include_likes"/>
                                                                        </label>
                                                                     </div>
                                                                     <div class="span3">
                                                                        <label class="checkbox line"> Comments
                                                                        <input type="checkbox" value="3" name="include_comments" id="include_comments"/>
                                                                        </label>
                                                                     </div>                                                                    
                                                                </div>                                                             
                                                            </div>
                                                            <div class="row-fluid">
                                                                     <div class="span3">
                                                                        <label class="checkbox line"> Caption
                                                                        <input type="checkbox" value="3" name="include_caption" id="include_caption"/>
                                                                        </label>
                                                                     </div>
                                                            </div>       
                                                        </div>
                                                        
                                                    {{ Form::close() }}
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
                                                    {{ Form::open(array('id'=>'appearance_form', 'class' => 'form-vertical')) }}
                                                        <div class="row-fluid">
                                                            <div class="span12">
                                                                If you're having creative block NEVER FEAR! The animation presets offer a lot of great options that do the thinking for you. 
                                                                Note that some animation presets require specific row/column settings. So if you choose and then change some settings, it may 
                                                                revert back to a standard animation type.
                                                            </div>
                                                        </div>
                                                        <div class="row-fluid">
                                                            <div class="span8 ">
                                                                <div class="control-group">
                                                                    <label class="control-label" >Photo Size</label>
                                                                    <div class="controls">
                                                                        <select class="m-wrap span12" name="photo_size" id="photo_size">
                                                                            @foreach ($photo_sizes as $size)
                                                                            <option value="{{$size->id}}">{{$size->name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> 
                                                        <div class="row-fluid">
                                                            <div class="span6">
                                                                <div class="control-group">
                                                                    <label class="control-label" >Grid Row</label>
                                                                    <div class="controls">
                                                                        <input type="text" id="grid_row" name="grid_row" class="m-wrap" value="" placeholder="None" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> 
                                                        <div class="row-fluid">
                                                            <div class="span6">
                                                                <div class="control-group">
                                                                    <label class="control-label" >Grid Column</label>
                                                                    <div class="controls">
                                                                        <input type="text" id="grid_column" name="grid_column" class="m-wrap" value="" placeholder="None" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> 
                                                        <div class="row-fluid">
                                                            <div class="span8 ">
                                                                <div class="control-group">
                                                                    <label class="control-label" >Animation Preset</label>
                                                                    <div class="controls">
                                                                        <select class="m-wrap span12" name="animation_preset" id="animation_preset">
                                                                            @foreach ($presets as $preset)
                                                                            <option value="{{$preset->id}}">{{$preset->name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>                                                         
                                                       <div class="row-fluid">
                                                            <div class="span8 ">
                                                                <div class="control-group">
                                                                    <label class="control-label" >Animation Speed</label>
                                                                    <div class="controls">
                                                                        <div id="slider-snap-inc" class="slider bg-blue"></div>
                                                                        <div class="slider-value text-right">
                                                                               <span id="slider-snap-inc-amount">
                                                                                   <input type="hidden" name="animation_speed" id="animation_speed" value="{{$speeds[0]->id}}">
                                                                                   {{$speeds[0]->name}}
                                                                               </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>                                                                                                                 
                                                   {{ Form::close() }}
                                                   <input type="hidden" name="latest_preset_id" id="latest_preset_id" value=""/>
                                                   <input type="hidden" name="package_id" id="package_id" value="{{$id}}"/>
                                                   
                                                    <!-- END FORM--> 
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
				</div>
                            </div>
                            <div class="span6">
<!--                                <div class="row-fluid">  
                                    <h3 class="page-title">Text Preview Window</h3>
                                    <div id="text_preview_window" class="text-center" style="background-color: #3865a8;color: #FFFFFF;font-size:9px; padding: 10px;font-family: arial;">
                                            DUMMY TEXT
                                    </div> 
                                    <h3 class="page-title">Logo Preview Window</h3>
                                   
                                    <div id="img_preview_window" class="text-center" style="background-color: #3865a8;padding: 10px;" >
                                        <img id="preview_logo" width="150px;" src="{{ asset('public/layouts/metronic/front/assets/img/logo.png') }}"/> 
                                    </div>
                                </div> 
                                <br>
                                <div class="row-fluid">
                                    <div class="span12">
                                        
                                        <input type="button" class="btn green" name="preview_it" id="preview_it" value="Generate Preview"/>
                                    </div>
                                </div>
                                 <hr/>-->
                                <div class="row-fluid">

                                     <label class="control-label" >Preset</label>
                                    <select id="user_defined_preset">
                                        <option value="">User Defined</option>
                                    </select>
                                    <div class="row-fluid">
                                        <button type="button" class="btn red" id="delete_preset">Delete Preset</button>
                                        <button href="#myModal" data-toggle="modal" type="button" class="btn green" >Save Preset</button>
                                    </div>
                                </div>
                                <hr/>
                                <div class="row-fluid">
                                    <div class="pull-right span6">
                                        <button type="button" class="btn red">Cancel</button>
                                        <button href="#confim_customization" data-toggle="modal" type="button" class="btn blue" >Next</button>
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
    <script src="{{ asset('public/layouts/metronic/front/assets/plugins/bootstrap-switch/static/js/bootstrap-switch.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/layouts/metronic/front/assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js') }}"></script>  
    <script src="{{ asset('public/layouts/metronic/front/assets/js/dropzone.js') }}"></script>
    
    <script src="{{ asset('public/layouts/metronic/front/assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js') }}"></script>
    <script src="{{ asset('public/layouts/metronic/front/assets/plugins/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/layouts/metronic/front/assets/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js') }}"></script>

    <script type="text/javascript">
        $('#click_here').bind('click', function(){
            var effect_color = $('#effect_color').val();
            var background_color = $('#background_color').val();
            var background_color = $('#photo_background_color').val();
            if($('#glow_shadow_effect').is(':checked')){
                $('#thumb_box').css("box-shadow"," 0 0 10px "+effect_color);
                $('#thumb_box').css("box-shadow","0 0 10px "+effect_color);
            }else{
                $('#thumb_box').css("box-shadow","none");
                
            }
            $('#thumb_box').css("border-color",background_color);
            if($('#photo_background').is(':checked')){
                $('#thumb_box').css("background-color",background_color);
            }else{
               $('#thumb_box').css("background-color",'#FFFFFF');
            }

        });
        getLogo = function(){
            $.post("{{ URL::Route('user.get.logo')}}",null,function(data){
                $('#img_preview_window').show();
                $('#preview_logo').attr("src","{{ asset('public/uploads/preset/logo') }}/"+data);
            });
        }
        $('#preview_it').bind('click',function(){
            $('#text_preview_window').css('color',$('#font_color').val());
            $('#text_preview_window').css('font-size',$('#font_size option:selected').text()+"px");
            $('#text_preview_window').css('background-color',$('#background_color').val());
            $('#img_preview_window').css('background-color',$('#photo_background_color').val());
            
            $('#text_preview_window').css('font-family',$('#font option:selected').text());
            //console.log($('#photo_background').val());
            if($('#photo_background').is(':checked')){
               $('#img_preview_window').css('background-color',$('#photo_background_color').val());
            }else{
                $('#img_preview_window').css('background-color','transparent');
                
            }
            
        });
        jQuery(document).ready(function() {
            Dropzone.options.myAwesomeDropzone = {
              uploadMultiple: false,
              maxFiles: 1 ,
              accept: function(file, done) {
                done();
                
              },
              init: function() {
                this.on("maxfilesexceeded", function(file){
                    this.removeFile(file);
                    alert("No more files please!");
                });
                this.on("complete", function(file) { getLogo(); });
                this.on("thumbnail", function(file) { 
                    $(this.element).parent('.details').css('width', '20px');
                });
              }
              
            };            

            App.init();
            
            userPreset = function(){
                $('#user_defined_preset').html('');
                $('#user_defined_preset').append(new Option('User Defined', ''));
                
                $.post("{{ URL::Route('user.get.preset')}}",null,function(data){
                    var selectValues = data.preset; 
                    $.each(selectValues, function(index, item) {   
                        $('#user_defined_preset').append(new Option(item.name, item.id));
                    });
                    var preset_id = $('#latest_preset_id').val();
                    $('#preset_name').val();
                    $('#user_defined_preset').val(preset_id);
                });
            }
            userPreset();
            $('#save_preset').bind('click',function(event){
                event.preventDefault();
                var data = $('#appearance_form, #layout_form , #preset_name_form').serialize();
                $.post("{{ URL::Route('user.add.preset')}}",data,function(data){
                    if(data.success == true){
                        $('#latest_preset_id').val(data.id);
                        userPreset();
                        toastr.success('<p>Preset added successfully!</p>', 'Success!');                    
                        $('#cancel_preset').click();
                    }else{
                        toastr.error(data.message, 'Error!');                    
                    }
                });
            });
            $('#delete_preset').bind('click',function(){
                var user_defined_preset = $('#user_defined_preset').val();
                if( user_defined_preset == "" ){
                    toastr.error('<p>Please select a preset to delete</p>', 'Error!');
                }else{
                    $('#confirmModal').modal({'show':true});
                    $('#deleted_preset_name').html($('#user_defined_preset option:selected').text());
                }
                
            });
            $('#delete_it').bind('click',function(){
                var user_preset_id = $('#user_defined_preset').val();
                var data = {'user_preset_id':user_preset_id};
                $.post("{{ URL::Route('user.delete.preset')}}",data,function(data){
                    if(data.success == true){
                        userPreset();
                        toastr.success('<p>Preset deleted successfully!</p>', 'Success!');                    
                        $('#cancel_delete_preset').click();
                    }
                });                
            });
            
            
            
            var slide_val =  new Array();
            var i = 0 ;
            @foreach ($speeds as $speed)
                slide_val[i] = "{{$speed->name}}";
                i++;
            @endforeach
            $("#slider-snap-inc").slider({
                value: 0,
                min: 0,
                max: i-1,
                step: 1,
                slide: function (event, ui) {
                    $("#slider-snap-inc-amount").text(slide_val[ui.value]);
                    $('#animation_speed').val(ui.value);
                }
            });
            
            $("#grid_row").inputmask("999");
            $('#grid_column').inputmask("999");
            
            $('.colorpicker-default').colorpicker();
            $('#check_it').bind('click', function(event){
                event.preventDefault();
                var url = $('#enter_tag_form').attr('action');
                $.post(url,$('#enter_tag_form').serialize(),function(data){
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
             $('#i_m_done').bind('click',function(){
                 var preset_id = $('#user_defined_preset').val();
                 if(preset_id == ""){
                     toastr.error("<p>Please select a preset</p>", 'Error!')
                 }else{
                    var package_id = $('#package_id').val();
                    var form_data = {'user_preset_id':preset_id,'package_id':package_id};
                    $.post("{{ URL::Route('user.add.board')}}",form_data,function(data){
                        var board_id = data.board_id;
                        location = "{{url('/user/new-board/4/'.$id)}}"+"/"+board_id;
                    });
                 }
                 
             });
        });
    </script>
@stop

    
