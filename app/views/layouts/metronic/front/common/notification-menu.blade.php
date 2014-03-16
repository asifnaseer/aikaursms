<ul class="nav pull-right">

    <!-- BEGIN USER LOGIN DROPDOWN -->
    <li class="dropdown user">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
            <img alt="" src="{{ asset('public/layouts/metronic/front/assets/img/avatar1_small.jpg'); }}" />
            <span class="username">{{ Session::get('branch_first_name')}}&nbsp;{{ Session::get('branch_last_name')}}</span>
            <i class="icon-angle-down"></i>
            </a>
            <ul class="dropdown-menu">
                    <li><a href="#"><i class="icon-user"></i> My Profile</a></li>
                    <li><a href="{{ URL::route('logout') }}"><i class="icon-key"></i> Log Out</a></li>
            </ul>
    </li>
</ul>