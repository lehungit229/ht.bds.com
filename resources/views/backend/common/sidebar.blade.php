<nav class="navbar-default navbar-static-side" role="navigation">
	<div class="sidebar-collapse">
		<ul class="nav metismenu" id="side-menu">
			<li class="nav-header">
				<div class="dropdown profile-element"> 
					<span>
						<img alt="image" class="img-circle" style="height:50px;" src="" />
					</span>
				</div>
				
				<div class="logo-element">
					HT+
				</div>
			</li>
			{{-- <li class="landing_link">
				<a target="_blank" href="{{ url('backend/user') }}"><i class="fa fa-star"></i> <span class="nav-label">Dashboard</span> <span class="label label-warning pull-right">NEW</span></a>
			</li> --}}

			<li class="">
				<a href="#"><i class="fa fa-users"></i> <span class="nav-label">Thành viên</span><span class="fa arrow"></span></a>
				<ul class="nav nav-second-level collapse">
					<li><a href="{{ url('backend/usercatalogue') }}">Nhóm thành viên</a></li>
					<li><a href="{{ url('backend/user') }}">Thành viên</a></li>
				</ul>
			</li>

			<li class="">
				<a href="#"><i class="fa fa-users"></i> <span class="nav-label">Bài viết</span><span class="fa arrow"></span></a>
				<ul class="nav nav-second-level collapse">
					<li><a href="{{ url('backend/articlecatalogue') }}">Nhóm Bài viết</a></li>
					<li><a href="{{ url('backend/article') }}">Bài viết</a></li>
				</ul>
			</li>


			{{-- <li class="landing_link">
				<a target="_blank" href="{{ URL::to('/') }}"><i class="fa fa-star"></i> <span class="nav-label">Xem Website</span> <span class="label label-warning pull-right">NEW</span></a>
			</li> --}}
		</ul>

	</div>
</nav>