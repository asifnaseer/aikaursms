<div class="row-fluid">
        <div class="span12">

                

                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                        {{ $content_main_heading }} <small>{{ $content_help_line }}</small>
                </h3>
                
                <ul class="breadcrumb">
                        @foreach($breadcrumb['data'] as $bLink)
                            <li>
                                    @if($bLink['icon'] != '')
                                        <i class="icon-{{$bLink['icon']}}"></i>
                                    @endif

                                    <a href="@if($bLink['link'] != '') {{$bLink['link']}} @endif">
                                        @if($bLink['lable'] != '') {{$bLink['lable']}} @endif
                                    </a>

                                    @if(isset($bLink['last']) && !$bLink['last']) 
                                        <i class="icon-angle-right"></i>
                                    @endif

                            </li>
                        @endforeach
                </ul>
                <!-- END PAGE TITLE & BREADCRUMB-->
                
               
                <!--  Notification -->
                @include('layouts.metronic.front.notifications')
        </div>
</div>