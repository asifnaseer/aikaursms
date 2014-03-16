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
            <div class="row-fluid">
                <div class="span8 profile-info">
                    <h1>{{ $user->first_name }} {{ $user->last_name }}</h1>
                    <p>{{ $user->email }}</p>
                    
                    <ul class="unstyled inline"><i class="icon-calendar"></i> Members Since:
                        <li> {{ $user_since }}</li>
                    </ul>
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
        
            var TableManaged = function () {

                return {

                    //main function to initiate the module
                    init: function () {

                        if (!jQuery().dataTable) {
                            return;
                        }

                        // begin first table
                        $('#userstbl').dataTable({
                            "aoColumns": [
                              { "bSortable": false },
                              { "bSortable": true },
                              { "bSortable": true },
                              { "bSortable": true },
                              { "bSortable": true },
                              { "bSortable": false }
                            ],
                            "aLengthMenu": [
                                [15, 25, 50, -1],
                                [15, 25, 50, "All"] // change per page values here
                            ],
                            // set the initial value
                            "iDisplayLength": 10,
                            "sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
                            "sPaginationType": "bootstrap",
                            "oLanguage": {
                                "sLengthMenu": "_MENU_ records per page",
                                "oPaginate": {
                                    "sPrevious": "Prev",
                                    "sNext": "Next"
                                }
                            },
                            "aoColumnDefs": [{
                                    'bSortable': false,
                                    'aTargets': [0]
                                }
                            ]
                        });

                        jQuery('#userstbl.group-checkable').change(function () {
                            var set = jQuery(this).attr("data-set");
                            var checked = jQuery(this).is(":checked");
                            jQuery(set).each(function () {
                                if (checked) {
                                    $(this).attr("checked", true);
                                } else {
                                    $(this).attr("checked", false);
                                }
                            });
                            jQuery.uniform.update(set);
                        });

                        jQuery('#userstbl_wrapper .dataTables_filter input').addClass("m-wrap medium"); // modify table search input
                        jQuery('#userstbl_wrapper .dataTables_length select').addClass("m-wrap small"); // modify table per page dropdown
                        jQuery('#userstbl_wrapper .dataTables_length select').select2(); // initialize select2 dropdown


                    }

                };

            }();
            
            var UIModals     = function () {
            
                var initModals = function () {
                    
                        var $modal                         = $('#modal-popup');
                        var loadingimage                   = "<?php echo asset('public/layouts/metronic/front/assets/img/ajax-modal-loading.gif'); ?>";
                        
                        $.fn.modalmanager.defaults.resize  = true;
                        $.fn.modalmanager.defaults.spinner = '<div class="loading-spinner fade" style="width: 200px; margin-left: -100px;"><img src="'+loadingimage+'" align="middle">&nbsp;<span style="font-weight:300; color: #eee; font-size: 18px; font-family:Open Sans;">&nbsp;Loading...</span></div>';
                        
                        $(".add-user").on('click', '', function(e) {
                            
                            var url = $(this).attr('data-href');
                            $('body').modalmanager('loading');
                            
                            setTimeout(function(){
                                $modal.load(url,'', function(){
                                    $modal.modal().on("hidden", function() {
                                      $modal.empty();
                                    });
                                });
                            },1000);
                        });
                        
                        $(".edit-user").on('click','', function(e) {
                            
                            var url = $(this).attr('data-href');
                            
                            $('body').modalmanager('loading');
                            
                            setTimeout(function(){
                                $modal.load(url,'', function(){
                                    $modal.modal().on("hidden", function() {
                                      $modal.empty();
                                    });
                                });
                            },1000);
                        });
                }

                return {
                    //main function to initiate the module
                    init: function () {
                        initModals();
                    }

                };

            }();
            
            
            jQuery(document).ready(function() {
                           
                 App.init();
                 
                 TableManaged.init();
                 
                 UIModals.init();
            });
    </script>
@stop

    
