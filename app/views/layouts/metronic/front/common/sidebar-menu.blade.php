<!-- BEGIN SIDEBAR -->
<div class="page-sidebar nav-collapse collapse ">
        <!-- BEGIN SIDEBAR MENU --> 
<ul class="page-sidebar-menu">
				<li>
                                    <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                                    <div class="sidebar-toggler hidden-phone"></div>
                                    <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
				</li>
				
				<li class="start">
					<a href="{{URL::Route('branch.dashboard')}}">
					<i class="icon-home"></i> 
					<span class="title">Dashboard</span>
					<span class="selected"></span>
					</a>
				</li>
				<li>
					<a href="javascript:;">
					<i class="icon-group"></i> 
					<span class="title">Students</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li >
							<a href="{{URL::Route('branch.all.students')}}">
							View All
                                                        </a>
						</li>
						<li >
							<a href="{{URL::Route('branch.all.banned.students')}}">
                                                            View Banned
                                                        </a>
						</li>
						
					</ul>
				</li>
				
				<li>
					<a href="javascript:;">
					<i class="icon-group"></i> 
					<span class="title">Teachers</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li >
							<a href="javascript:void(0);">
							View All
                                                        </a>
						</li>
											
					</ul>
				</li>
				
				<li class="last ">
					<a href="#">
					<i class="icon-bar-chart"></i> 
					<span class="title">Reports</span>
					</a>
				</li>
			</ul>
        <!-- END SIDEBAR MENU -->
</div>
<!-- END SIDEBAR -->
