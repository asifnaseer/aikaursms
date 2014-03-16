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
    
@stop
    