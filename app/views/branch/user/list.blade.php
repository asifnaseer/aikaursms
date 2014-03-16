@extends('layouts/metronic/backend/default')




{{-- Page Title --}}
@section('title')
    @parent
    {{ $page_title }}
@stop





{{-- Page Styles--}}
@section('styles')
    @parent
    {{-- BEGIN PAGE LEVEL STYLES --}} 
    
    <link href="{{ asset('public/layouts/metronic/backend/assets/plugins/select2/select2_metro.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('public/layouts/metronic/backend/assets/plugins/data-tables/DT_bootstrap.css') }}" rel="stylesheet" type="text/css"/>
    
    <link href="{{ asset('public/layouts/metronic/backend/assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('public/layouts/metronic/backend/assets/plugins/bootstrap-modal/css/bootstrap-modal.css') }}" rel="stylesheet" type="text/css"/>
    {{-- END PAGE LEVEL STYLES --}}
@stop





{{-- Page Content --}}
@section('content') 
   
    {{-- BEGIN PAGE CONTAINER--}}
    <div class="container-fluid">
        
            <!-- BEGIN PAGE HEADER heaing, breadcrumbs etc -->
            @include('layouts.metronic.backend.common.content-header')
            <!-- END PAGE HEADER-->
            
            
            <!-- BEGIN PAGE CONTENT-->
            <div class="row-fluid margin-bottom-20">
                    <div class="span12">
                         <div class="portlet box light-grey">
                                <div class="portlet-title">
                                        <div class="caption"><i class="icon-globe"></i>User List</div>
                                        <div class="tools">
                                                <a href="javascript:;" class="collapse"></a>
                                                <a href="#portlet-config" data-toggle="modal" class="config"></a>
                                                <a href="javascript:;" class="reload"></a>
                                                <a href="javascript:;" class="remove"></a>
                                        </div>
                                </div>
                                <div class="portlet-body">
                                        <div class="table-toolbar">
                                                <div class="btn-group" id="btn-group">
                                                        <button class="btn green add-user" data-toggle="modal" data-href="{{ URL::Route('admin.user.add')}}">
                                                            Add User <i class="icon-plus"></i>
                                                        </button>
                                                </div>
                                                <div class="btn-group pull-right">
                                                        <button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="icon-angle-down"></i>
                                                        </button>
                                                        <ul class="dropdown-menu pull-right">
                                                                <li><a href="#">Print</a></li>
                                                                <li><a href="#">Save as PDF</a></li>
                                                                <li><a href="#">Export to Excel</a></li>
                                                        </ul>
                                                </div>
                                        </div>
                                        <table class="table table-striped table-bordered table-hover" id="userstbl">
                                                <thead>
                                                        <tr>
                                                                <th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#groupstbl.checkboxes" /></th>
                                                                <th>Sr#</th>
                                                                <th class="hidden-480">Name</th>
                                                                <th class="hidden-480">Login ID</th>
                                                                <th class="hidden-480">Type / Group</th>
                                                                <th class="hidden-480">action</th>
                                                        </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($users_object_array as $index => $user_object)
                                                        @foreach($user_object as $user_object_item)
                                                            <?php $user = $user_object_item -> toArray();?>
                                                            <tr class="odd gradeX">
                                                                    <td><input type="checkbox" class="checkboxes" value="1" /></td>
                                                                    <td>{{ $user['id'] }}</td>
                                                                    <td class="hidden-480">{{ $user['first_name'] . ' ' . $user['last_name'] }}</td>
                                                                    <td class="hidden-480">{{ $user['email'] }}</td>
                                                                    <td class="hidden-480">{{ $index }}</td>
                                                                    <td class="center hidden-480">

                                                                        <a class="btn blue icn-only edit-user" data-toggle="modal" data-href="{{ URL::route('admin.user.edit',$user['id']) }}">
                                                                            <i class="halflings-icon white edit"></i>
                                                                        </a>

                                                                        <a class="btn red icn-only" href="{{ URL::route('admin.user.delete',$user['id'])}}">
                                                                                <i class="halflings-icon white trash"></i>
                                                                        </a>

                                                                    </td>
                                                            </tr>
                                                        @endforeach
                                                    @endforeach 
                                                </tbody>
                                        </table>
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
    
    <script src="{{ asset('public/layouts/metronic/backend/assets/plugins/select2/select2.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/layouts/metronic/backend/assets/plugins/data-tables/jquery.dataTables.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/layouts/metronic/backend/assets/plugins/data-tables/DT_bootstrap.js') }}" type="text/javascript"></script>
    
    <!-- Enhanced Model Pop-ups -->
    <script src="{{ asset('public/layouts/metronic/backend/assets/plugins/bootstrap-modal/js/bootstrap-modal.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/layouts/metronic/backend/assets/plugins/bootstrap-modal/js/bootstrap-modalmanager.js') }}" type="text/javascript"></script>
    
    <script src="{{ asset('public/layouts/metronic/backend/assets/scripts/app.js') }}"></script>
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
                        var loadingimage                   = "<?php echo asset('public/layouts/metronic/backend/assets/img/ajax-modal-loading.gif'); ?>";
                        
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

    
