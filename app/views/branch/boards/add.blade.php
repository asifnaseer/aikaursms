@extends('layouts/metronic/backend/modal-responsive')

@section('form-starter')
    {{ Form::open(array('url' => $action_url,'id'=>'user_add_form', 'class' => 'form-horizontal')) }}
@stop

@section('form-stoper')
    {{ Form::close() }}
@stop

@section('modal-header-content')
    <h3>{{ $heading }}</h3>
@stop


@section('modal-body-content')
    <div class="row-fluid"> 
            <div class="tabbable tabbable-custom ">
                <!-- Only required for left/right tabs -->
                <ul class="nav nav-tabs ">
                        <li class="active"><a data-toggle="tab" href="#tab_personal_info">Account Type</a></li>
                        <li class=""><a data-toggle="tab" href="#tab_contact_info">Hashtag</a></li>
                        <li class=""><a data-toggle="tab" href="#tab_address">Layout</a></li>
                        <li class=""><a data-toggle="tab" href="#tab_billling_info">Initial Options</a></li>
                </ul>
                <div class="tab-content">
                        <div class="alert alert-error hide">
                                <button class="close" data-dismiss="alert"></button>
                                You have some form errors. Please check each form tab for correction.
                        </div>
                        <div class="alert alert-success hide">
                                <button class="close" data-dismiss="alert"></button>
                                Your form posted successful!
                        </div>
                        <div id="tab_personal_info" class="tab-pane active" style="min-height: 124px;">
                                
                                
                                <div class="row-fluid">
                                        <!-- Pricing -->
                                        <div class="row-fluid margin-bottom-40">
                                                <div class="span3 pricing hover-effect">
                                                        <div class="pricing-head">
                                                                <h3>Begginer <span>Officia deserunt mollitia</span></h3>
                                                                <h4><i>$</i>5<i>.49</i> <span>Per Month</span></h4>
                                                        </div>
                                                        <ul class="pricing-content unstyled">
                                                                <li><i class="icon-tags"></i> At vero eos</li>
                                                                <li><i class="icon-asterisk"></i> No Support</li>
                                                                <li><i class="icon-heart"></i> Fusce condimentum</li>
                                                                <li><i class="icon-star"></i> Ut non libero</li>
                                                                <li><i class="icon-shopping-cart"></i> Consecte adiping elit</li>
                                                        </ul>
                                                        <div class="pricing-footer">
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non libero magna psum olor .</p>
                                                                <a class="btn green" href="#">
                                                                Select <i class="m-icon-swapright m-icon-white"></i>
                                                                </a>  
                                                        </div>
                                                </div>
                                                <div class="span3 pricing hover-effect">
                                                        <div class="pricing-head">
                                                                <h3>Pro <span>Officia deserunt mollitia</span></h3>
                                                                <h4><i>$</i>8<i>.69</i> <span>Per Month</span></h4>
                                                        </div>
                                                        <ul class="pricing-content unstyled">
                                                                <li><i class="icon-tags"></i> At vero eos</li>
                                                                <li><i class="icon-asterisk"></i> No Support</li>
                                                                <li><i class="icon-heart"></i> Fusce condimentum</li>
                                                                <li><i class="icon-star"></i> Ut non libero</li>
                                                                <li><i class="icon-shopping-cart"></i> Consecte adiping elit</li>
                                                        </ul>
                                                        <div class="pricing-footer">
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non libero magna psum olor .</p>
                                                                <a class="btn green" href="#">
                                                                Select <i class="m-icon-swapright m-icon-white"></i>
                                                                </a>  
                                                        </div>
                                                </div>
                                                <div class="span3 pricing pricing-active hover-effect">
                                                        <div class="pricing-head pricing-head-active">
                                                                <h3>Expert <span>Officia deserunt mollitia</span></h3>
                                                                <h4><i>$</i>13<i>.99</i> <span>Per Month</span></h4>
                                                        </div>
                                                        <ul class="pricing-content unstyled">
                                                                <li><i class="icon-tags"></i> At vero eos</li>
                                                                <li><i class="icon-asterisk"></i> No Support</li>
                                                                <li><i class="icon-heart"></i> Fusce condimentum</li>
                                                                <li><i class="icon-star"></i> Ut non libero</li>
                                                                <li><i class="icon-shopping-cart"></i> Consecte adiping elit</li>
                                                        </ul>
                                                        <div class="pricing-footer">
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non libero magna psum olor .</p>
                                                                <a class="btn green" href="#">
                                                                Select <i class="m-icon-swapright m-icon-white"></i>
                                                                </a>  
                                                        </div>
                                                </div>
                                                <div class="span3 pricing hover-effect">
                                                        <div class="pricing-head">
                                                                <h3>Hi-Tech<span>Officia deserunt mollitia</span></h3>
                                                                <h4><i>$</i>99<i>.00</i> <span>Per Month</span></h4>
                                                        </div>
                                                        <ul class="pricing-content unstyled">
                                                                <li><i class="icon-tags"></i> At vero eos</li>
                                                                <li><i class="icon-asterisk"></i> No Support</li>
                                                                <li><i class="icon-heart"></i> Fusce condimentum</li>
                                                                <li><i class="icon-star"></i> Ut non libero</li>
                                                                <li><i class="icon-shopping-cart"></i> Consecte adiping elit</li>
                                                        </ul>
                                                        <div class="pricing-footer">
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non libero magna psum olor .</p>
                                                                <a class="btn green" href="#">
                                                                Select <i class="m-icon-swapright m-icon-white"></i>
                                                                </a>  
                                                        </div>
                                                </div>
                                        </div>
                                        <!--/row-fluid-->
                                        <!--//End Pricing -->
                                </div>
                        </div>
                        <div id="tab_contact_info" class="tab-pane">
                                <div class="control-group">
                                        {{ Form::label('hash_tag', 'Hash Tag', array('class' => 'control-label')) }}
                                        <div class="controls">
                                                {{ Form::text('hash_tag', $data['contact_telephone'], array('id' => 'hash_tag', 'placeholder' => 'Hash Tag', 'class' => 'm-wrap medium' )) }}
                                        </div>
                                </div>
                        </div>
                        <div id="tab_address" class="tab-pane">
                                <div class="control-group">
                                        {{ Form::label('physical_address_line1', 'Line1', array('class' => 'control-label')) }}
                                        <div class="controls">
                                                {{ Form::text('physical_address_line1', $data['physical_address_line1'], array('id' => 'physical_address_line1', 'placeholder' => 'Address Line1', 'class' => 'm-wrap medium' )) }}
                                        </div>
                                </div>
                                <div class="control-group">
                                        {{ Form::label('physical_address_line2', 'Line2', array('class' => 'control-label')) }}
                                        <div class="controls">
                                                {{ Form::text('physical_address_line2', $data['physical_address_line2'], array('id' => 'physical_address_line2', 'placeholder' => 'Address Line2', 'class' => 'm-wrap medium' )) }}
                                        </div>
                                </div>
                                <div class="control-group">
                                        {{ Form::label('physical_address_line3', 'Line3', array('class' => 'control-label')) }}
                                        <div class="controls">
                                                {{ Form::text('physical_address_line3', $data['physical_address_line3'], array('id' => 'physical_address_line3', 'placeholder' => 'Address Line3', 'class' => 'm-wrap medium' )) }}
                                        </div>
                                </div>
                                <div class="control-group">
                                        {{ Form::label('physical_address_line4', 'Line4', array('class' => 'control-label')) }}
                                        <div class="controls">
                                                {{ Form::text('physical_address_line4', $data['physical_address_line4'], array('id' => 'physical_address_line4', 'placeholder' => 'Address Line4', 'class' => 'm-wrap medium' )) }}
                                        </div>
                                </div>
                            
                                <div class="control-group">
                                        {{ Form::label('physical_address_city', 'City', array('class' => 'control-label')) }}
                                        <div class="controls">
                                                {{ Form::text('physical_address_city', $data['physical_address_city'], array('id' => 'physical_address_city', 'placeholder' => 'City', 'class' => 'm-wrap medium' )) }}
                                        </div>
                                </div>

                                <div class="control-group">
                                        {{ Form::label('physical_address_state', 'State', array('class' => 'control-label')) }}
                                        <div class="controls">
                                                {{ Form::text('physical_address_state', $data['physical_address_state'], array('id' => 'physical_address_state', 'placeholder' => 'State', 'class' => 'm-wrap medium' )) }}
                                        </div>
                                </div>

                                <div class="control-group">
                                        {{ Form::label('physical_address_country', 'Country', array('class' => 'control-label')) }}
                                        <div class="controls">
                                                {{ Form::text('physical_address_country', $data['physical_address_country'], array('id' => 'physical_address_country', 'placeholder' => 'Country', 'class' => 'm-wrap medium' )) }}
                                        </div>
                                </div>
                                
                                <div class="control-group">
                                        {{ Form::label('physical_address_postal_code', 'Zip Code', array('class' => 'control-label')) }}
                                        <div class="controls">
                                                {{ Form::text('physical_address_postal_code', $data['physical_address_postal_code'], array('id' => 'physical_address_postal_code', 'placeholder' => 'Zip Code', 'class' => 'm-wrap medium' )) }}
                                        </div>
                                </div>
                        </div>
                        
                </div>
            </div>
            <div class="tab-pane active" id="portlet_tab1">
                    
                    
 
            </div>                    
    </div>
@stop

@section('modal-footer-content')
     @if($mode == "edit"){{ Form::hidden('user_id', $user_id, array('id' => 'user_id' )) }} @endif
     {{ Form::hidden('mode', $mode, array('id' => 'mode' )) }}
     {{ Form::button('<i class=\'icon-ok\'></i> Save', array('name' => 'submit', 'id'=>'submit', 'type'=>'submit', 'class'=>'btn blue')) }}
@stop

            
<script type="text/javascript">
    $(document).ready(function(){
            $("#submit").click(function(e){
                e.preventDefault();
                addAction();
            });
            
             $(".pricing").click(function(e){
                 $(".pricing").removeClass('pricing-active');
                 $(".pricing-head").removeClass('pricing-head-active');
           
                 $(this).addClass('pricing-active');
                 $(".pricing-head",this).addClass('pricing-head-active');
             });
    });
    
    
   
    
    
    var form = $('#user_add_form');
    var error = $('.alert-error', form);
    var success = $('.alert-success', form);
    
    function addAction(){
            $.post(
                form.attr('action'), 
                form.serialize(), 
                function(data){ 
                    //console.log(data);
                    obj     =   $.parseJSON(data);
                    if(obj.status == "error"){
                        error.show();
                        showValidationErrors(obj.errors);
                    }else{
                         location.reload();
                    }
                }
            );
    }
</script>