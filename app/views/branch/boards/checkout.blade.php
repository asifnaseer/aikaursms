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
    <link href="{{ asset('public/layouts/metronic/front/assets/plugins/bootstrap-switch/static/stylesheets/bootstrap-switch-metro.css') }}" rel="stylesheet" type="text/css"/>

    <link rel="stylesheet" type="text/css" href="{{ asset('public/layouts/metronic/front/assets/plugins/bootstrap-colorpicker/css/colorpicker.css') }}" />

    <link href="{{ asset('public/layouts/metronic/front/assets/plugins/dropzone/css/dropzone.css') }}" rel="stylesheet"/>

    
    
    {{-- END PAGE LEVEL STYLES --}}
@stop





{{-- Page Content --}}
@section('content') 
   
    {{-- BEGIN PAGE CONTAINER--}}
  
    <div id="myModal" class="modal fade" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="text-align: center">
                    <h3>Much Secure, Very Options </h3>
                </div>
                <div class="modal-body" >
                    <div style="height:200px">
                      Boards are private by default. You'll need the unlock code when visiting the board on the device you are going to show it on. 
<br> <br>
If you've subscribed to a higher level plan you can make the board public to allow more people to view it and assign your own unlock code. Or, if you're really fancy - you can open it up to the public completely without an unlock code. Simply set the board to public and remove the unlock code from the field. It's up to you but don't worry - if you change your mind you can always make it private again!

                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn green" data-dismiss="modal" aria-hidden="true">Good Doge</button>
                </div>
            </div>
        </div>
    </div>    
    <div id="confim_customization" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-header">
          <h3 id="myModalLabel">Done Securing?</h3>
        </div>
        <div class="modal-body" >
           <p>
               We like to double check and make sure you’re really finished checking out all of the cool options. If so – BRILLIANT!
           </p>

        </div>
        <div class="modal-footer">
          <button class="btn red" data-dismiss="modal" aria-hidden="true">Opps! j/k</button>
          <button class="btn green btn-primary" id="i_m_done">I'm done</button>
        </div>
    </div>      
    <div class="container-fluid">
        
            <!-- BEGIN PAGE HEADER heaing, breadcrumbs etc -->
            @include('layouts.metronic.front.common.content-header')
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->

            <div class="row-fluid">
                    <div class="portlet-body">
                        <p>
                           One last step and you're off to the races! We know everyone is different, so we offer many payment options. 
                           Please review the details of your order below. 
                           Once paid, you will be able to immediately turn on your board, or schedule when it will go live.
                        </p>
                        <div class="row-fluid">
                            <div class="span12">
                                
                                   
                                        <div id="tab_1" class="tab-pane active">
                                            <div class="portlet box blue">
                                                <div class="portlet-title">
                                                    <div class="caption"><i class="icon-reorder"></i>ORDER DETAILS</div>
                                                </div>
                                                <div class="portlet-body form">
                                                    <!-- BEGIN FORM-->
                                                    <div class="row-fluid">
                                                        <div class="span1">&nbsp;</div>
                                                        <div class="span2"><strong>Plan Type:</strong></div>
                                                         <div class="span2 ">{{$package->name}}</div>
                                                    </div>
                                                    <div class="row-fluid">
                                                        <div class="span1">&nbsp;</div>
                                                        <div class="span2"><strong>Available For: </strong></div>
                                                         <div class="span2 ">{{$package->duration}}</div>
                                                    </div>  
                                                    <div class="row-fluid">
                                                        <div class="span1">&nbsp;</div>
                                                        <div class="span2"><strong>Hashtag: </strong></div>
                                                         <div class="span2 ">#{{$board->tag}}</div>
                                                    </div>                                                      
                                                    
                                                    
                                                    <div class="row-fluid">
                                                        <div class="span1">&nbsp;</div>
                                                        <div class="span4">
                                                            <div class="input-append hidden-phone">  
                                                                {{ Form::open(array('id'=>'redeem_form', 'class' => 'horizontal-form')) }}
                                                                <input type="hidden" name="package_price" id="package_price" value="{{$package->price}}" />
                                                                <input class="m-wrap medium" name="promo_code" id="promo_code" size="10" type="text" placeholder="Promo Code?" />
                                                                <button class="btn blue" id="redeem_me">Redeem</button>
                                                                {{ Form::close() }}
                                                            </div>
                                                        </div>
                                                        <div class="span5 pull-right">
                                                            <div class="portlet box green">
                                                                <div class="portlet-title">
                                                                    <div class="caption"><i class="icon-reorder"></i>PROMO CODE APPLIED	</div>
                                                                </div>
                                                                <div class="portlet-body form">
                                                                    <div class="row-fluid">
                                                                        <div class="span6"><strong>Total Due:</strong></div>
                                                                        <div class="span6 pull-right" id="promo_code_price">
                                                                            ${{$package->price}}
                                                                        </div>
                                                                    </div>
                                                                </div>                                                            
                                                            </div>  
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="row-fluid">
                                                        <div class="span1">&nbsp;</div>
                                                        <div class="span4"><strong>Select a Payment Method</strong></div>
                                                    </div>
                                                    <div class="row-fluid">
                                                        
                                                        <div class="span1">&nbsp;</div>
                                                        <div class="span4">
                                                                    
<!--                                                            <form action="https://www.paypal.com/cgi-bin/webscr" method="post">-->
                                                            <form name="_xclick" action="https://www.sandbox.paypal.com/cgi-bin/webscr" 
                                                                method="post">
                                                                <input type="hidden" name="cmd" value="_xclick">
                                                                <input type="hidden" name="business" value="asif.n@allshoreresources.com">
                                                                <input type="hidden" name="currency_code" value="USD">
                                                                <input type="hidden" name="item_name" value="{{$package->name}}">
                                                                <input type="hidden" name="item_number" value="{{$board_id}}">
                                                                <input type="hidden" name="amount" value="{{$package->price}}">
                                                                <input type="hidden" name="hosted_button_id" value="JL3NTPYV4KYLQ">
                                                                <input type="hidden" name="return" value="{{ url('/user/manage-board') }}">
                                                                <input type="hidden" name="notify_url" value="{{url('/user/paypal/ipn/')}}">
                                                                <input type="image" src="{{ asset('public/layouts/metronic/front/assets/img/paypal.png') }}" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
                                                            </form>                                                            

                                                          
                                                            
                                                            
                                                        </div>
                                                    </div>                                                     
                                                    <div class="row-fluid">
                                                        <div class="span1">&nbsp;</div>
                                                        <div class="span4">
                                                            <a href="javascript:void(0);" onClick="purchase()"><img src="{{ asset('public/layouts/metronic/front/assets/img/google.png') }}" width="60%"/></a>
                                                        </div>
                                                    </div> 
                                                    <div class="row-fluid">
                                                        <div class="span1">&nbsp;</div>
                                                        <div class="span4">
                                                            <a href="javascript:void(0);"><img src="{{ asset('public/layouts/metronic/front/assets/img/amazon.png') }}" width="60%"/></a>
                                                        </div>
                                                    </div>                                                     
                                                    <input type="hidden" name="board_id" value="{{$board_id}}"/>
                                                    
                                                    
                                                    <!-- END FORM--> 
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
    <script src="{{ asset('public/layouts/metronic/front/assets/plugins/bootstrap-switch/static/js/bootstrap-switch.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/layouts/metronic/front/assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js') }}"></script>  
    <script src="{{ asset('public/layouts/metronic/front/assets/plugins/dropzone/dropzone.js') }}"></script>
    <script src="{{ asset('public/layouts/metronic/front/assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js') }}"></script>
    <script src="{{ asset('public/layouts/metronic/front/assets/plugins/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/layouts/metronic/front/assets/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js') }}"></script>
    <script src="https://sandbox.google.com/checkout/inapp/lib/buy.js"></script>
<!--    <script src="https://wallet.google.com/inapp/lib/buy.js"></script>-->
    <script type="text/javascript">

        function purchase(){
          google.payments.inapp.buy({
            jwt: '{{ $token }}',
            success: function() {console.log('success');},
            failure: function(result){console.log(result.response.errorType);}
          });
        }        
    </script>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            App.init();
            $('#redeem_me').bind('click',function(event){
                event.preventDefault();
                if($('#promo_code').val()==""){
                     toastr.error('<p>Please enter promo code!</p>', 'Error!');    
                }else{
                    var form_data = $('#redeem_form').serialize();
                    $.post("{{ URL::Route('user.ajax.redeem.code')}}",form_data,function(data){
                        if(data.success == true){
                            $('#promo_code_price').html(data.html);
                            toastr.success('<p>Preset added successfully!</p>', 'Success!');    
                        }else{
                            toastr.error(data.errors, 'Error!'); 
                        }
                    });
                }
            });

        });
    </script>
@stop

    
