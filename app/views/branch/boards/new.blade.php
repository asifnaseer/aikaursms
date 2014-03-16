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
   
    {{-- BEGIN PAGE CONTAINER--}}
    <div class="container-fluid">
        
            <!-- BEGIN PAGE HEADER heaing, breadcrumbs etc -->
            @include('layouts.metronic.front.common.content-header')
            <!-- END PAGE HEADER-->
            
            
            <!-- BEGIN PAGE CONTENT-->
            <div class="row-fluid margin-bottom-20">
                    <div class="portlet-body">
                              <div class="row-fluid">
                                      <!-- Pricing -->
                                      <div class="row-fluid margin-bottom-40">
                                            @foreach ($per_pkgs as $package)
                                                <div class="span3 pricing"
                                                     onMouseOver="this.style.border='3px solid {{$package->color}}'" 
                                                     onMouseOut="this.style.border='3px solid #EEEEEE'">
                                                    <div class="pricing-head" >
                                                            <h3 style="background-color: {{$package->color}} !important;"> {{$package->name}}<span></span></h3>
                                                            <h4 onMouseOver="this.style.color='{{$package->color}}'" 
                                                                onMouseOut="this.style.color='#BAC39F'"
                                                                ><i>$</i>{{$package->price}} <span>Per Month</span></h4>
                                                    </div>
                                                    <div class="pricing-footer">
                                                        <p>
                                                            {{$package->detail}}
                                                        </p>
                                                    </div>
                                                    <div class="pricing-footer" style="background-color: {{$package->color}} !important; padding-top:20px;">
                                                            <a href="{{url('/user/new-board/2/'.$package->package_id)}}" name="{{$package->package_id}}" style="font-size:18px;color:#FFF;text-decoration:none;">
                                                            Sign Up 
                                                            </a>  
                                                    </div>
                                                </div>
                                            @endforeach
                                      </div>
                                      <!--/row-fluid-->
                                      <!--//End Pricing -->
                              </div>
                              <div class="row-fluid">
                                      <!-- Pricing -->
                                      <div class="row-fluid margin-bottom-40">
                                            @foreach ($pro_pkgs as $package)
                                                <div class="span3 pricing"  
                                                     onMouseOver="this.style.border='3px solid {{$package->color}}'" 
                                                     onMouseOut="this.style.border='3px solid #EEEEEE'">
                                                    <div class="pricing-head">
                                                            <h3 style="background-color: {{$package->color}} !important;"> {{$package->name}}<span></span></h3>
                                                            <h4
                                                                onMouseOver="this.style.color='{{$package->color}}'" 
                                                                onMouseOut="this.style.color='#BAC39F'"
                                                            ><i>$</i>{{$package->price}} <span>Per Month</span></h4>
                                                    </div>
                                                    <div class="pricing-footer">
                                                        <p>
                                                            {{$package->detail}}
                                                        </p>
                                                    </div>
                                                    <div class="pricing-footer" style="background-color: {{$package->color}} !important; padding-top:20px;">
                                                            <a href="{{url('/user/new-board/2/'.$package->package_id)}}" name="{{$package->package_id}}" style="font-size:18px;color:#FFF;text-decoration:none;">
                                                            Sign Up 
                                                            </a>  
                                                    </div>
                                                </div>
                                            @endforeach
                                      </div>
                                      <!--/row-fluid-->
                                      <!--//End Pricing -->
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
    <script type="text/javascript">
        jQuery(document).ready(function() {
             App.init();
        });
    </script>
@stop

    
