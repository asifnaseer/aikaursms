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
                        <li class="active"><a data-toggle="tab" href="#tab_personal_info">Personal</a></li>
                        <li class=""><a data-toggle="tab" href="#tab_contact_info">Contact Information</a></li>
                        <li class=""><a data-toggle="tab" href="#tab_address">Address</a></li>
                        <li class=""><a data-toggle="tab" href="#tab_billling_info">Billing Address</a></li>
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
                                <div class="control-group">
                                        {{ Form::label('first_name', 'First Name', array('class' => 'control-label')) }}
                                        <div class="controls">
                                                {{ Form::text('first_name', $data['first_name'], array('id' => 'first_name', 'placeholder' => 'First Name', 'class' => 'm-wrap medium' )) }}
                                        </div>
                                </div>

                                <div class="control-group">
                                        {{ Form::label('last_name', 'Last Name', array('class' => 'control-label')) }}
                                        <div class="controls">
                                                {{ Form::text('last_name', $data['last_name'], array('id' => 'last_name', 'placeholder' => 'Last Name', 'class' => 'm-wrap medium' )) }}
                                        </div>
                                </div>

                                <div class="control-group">
                                        {{ Form::label('email', 'Email', array('class' => 'control-label')) }}
                                        <div class="controls">
                                                {{ Form::text('email', $data['email'], array('id' => 'email', 'placeholder' => 'Email ID', 'class' => 'm-wrap medium', $email_read_only => $email_read_only )) }}
                                        </div>
                                </div>
                        </div>
                        <div id="tab_contact_info" class="tab-pane">
                                <div class="control-group">
                                        {{ Form::label('contact_telephone', 'Land Line Number', array('class' => 'control-label')) }}
                                        <div class="controls">
                                                {{ Form::text('contact_telephone', $data['contact_telephone'], array('id' => 'contact_telephone', 'placeholder' => 'Land Line Number', 'class' => 'm-wrap medium' )) }}
                                        </div>
                                </div>
                            
                                <div class="control-group">
                                        {{ Form::label('contact_mobile', 'Cell Number', array('class' => 'control-label')) }}
                                        <div class="controls">
                                                {{ Form::text('contact_mobile', $data['contact_mobile'], array('id' => 'contact_mobile', 'placeholder' => 'Cell Number', 'class' => 'm-wrap medium' )) }}
                                        </div>
                                </div>
                                
                                <div class="control-group">
                                        {{ Form::label('contact_email', 'Email', array('class' => 'control-label')) }}
                                        <div class="controls">
                                                {{ Form::text('contact_email', $data['contact_email'], array('id' => 'contact_email', 'placeholder' => 'Email', 'class' => 'm-wrap medium' )) }}
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
                        <div id="tab_billling_info" class="tab-pane" style="min-height: 124px;">
                                <div class="control-group">
                                        {{ Form::label('billing_physical_address_line1', 'Line1', array('class' => 'control-label')) }}
                                        <div class="controls">
                                                {{ Form::text('billing_physical_address_line1', $data['billing_physical_address_line1'], array('id' => 'billing_billing_physical_address_line1', 'placeholder' => 'Address Line1', 'class' => 'm-wrap medium' )) }}
                                        </div>
                                </div>
                                <div class="control-group">
                                        {{ Form::label('billing_physical_address_line2', 'Line2', array('class' => 'control-label')) }}
                                        <div class="controls">
                                                {{ Form::text('billing_physical_address_line2', $data['billing_physical_address_line2'], array('id' => 'billing_physical_address_line2', 'placeholder' => 'Address Line2', 'class' => 'm-wrap medium' )) }}
                                        </div>
                                </div>
                                <div class="control-group">
                                        {{ Form::label('billing_physical_address_line3', 'Line3', array('class' => 'control-label')) }}
                                        <div class="controls">
                                                {{ Form::text('billing_physical_address_line3', $data['billing_physical_address_line3'], array('id' => 'billing_physical_address_line3', 'placeholder' => 'Address Line3', 'class' => 'm-wrap medium' )) }}
                                        </div>
                                </div>
                                <div class="control-group">
                                        {{ Form::label('billing_physical_address_line4', 'Line4', array('class' => 'control-label')) }}
                                        <div class="controls">
                                                {{ Form::text('billing_physical_address_line4', $data['billing_physical_address_line4'], array('id' => 'billing_physical_address_line4', 'placeholder' => 'Address Line4', 'class' => 'm-wrap medium' )) }}
                                        </div>
                                </div>

                                <div class="control-group">
                                        {{ Form::label('billing_physical_address_city', 'City', array('class' => 'control-label')) }}
                                        <div class="controls">
                                                {{ Form::text('billing_physical_address_city', $data['billing_physical_address_city'], array('id' => 'billing_physical_address_city', 'placeholder' => 'City', 'class' => 'm-wrap medium' )) }}
                                        </div>
                                </div>

                                <div class="control-group">
                                        {{ Form::label('billing_physical_address_state', 'State', array('class' => 'control-label')) }}
                                        <div class="controls">
                                                {{ Form::text('billing_physical_address_state', $data['billing_physical_address_state'], array('id' => 'billing_physical_address_state', 'placeholder' => 'State', 'class' => 'm-wrap medium' )) }}
                                        </div>
                                </div>

                                <div class="control-group">
                                        {{ Form::label('billing_physical_address_country', 'Country', array('class' => 'control-label')) }}
                                        <div class="controls">
                                                {{ Form::text('billing_physical_address_country', $data['billing_physical_address_country'], array('id' => 'billing_physical_address_country', 'placeholder' => 'Country', 'class' => 'm-wrap medium' )) }}
                                        </div>
                                </div>
                                
                                <div class="control-group">
                                        {{ Form::label('billing_physical_address_postal_code', 'Zip Code', array('class' => 'control-label')) }}
                                        <div class="controls">
                                                {{ Form::text('billing_physical_address_postal_code', $data['billing_physical_address_postal_code'], array('id' => 'billing_physical_address_postal_code', 'placeholder' => 'Zip Code', 'class' => 'm-wrap medium' )) }}
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