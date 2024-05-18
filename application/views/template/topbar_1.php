
<div class="layout-page">
	<nav style="color:#000;"class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
		<div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
		  <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
			<i class="ti ti-menu-2 ti-sm"></i>
		  </a>
		</div>

		<div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
		  <!-- Search -->
		  <div class="navbar-nav align-items-center">
			<div class="nav-item navbar-search-wrapper mb-0">

			</div>
		  </div>
		  <!-- /Search -->

		  <ul class="navbar-nav flex-row align-items-center ms-auto">

				<li style="color:#000;" class="nav-item dropdown nav-user">
						<a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-bs-toggle="dropdown" aria-expanded="false">
							<span style="color:#000;"class="badge bg-success mr-3 text-dark"><?=$user['username'];?></span>
						</a>
					<div class="dropdown-menu dropdown-menu-end nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
						<div class="nav-user-info">
							<center>
							<h5 class="mb-0 nav-user-name"><?=$user['username'];?></h5>
							</center>
						</div>
						<hr>
						<a class="dropdown-item" href="<?=base_url('User/myprofile');?>"><i class="fas fa-users"></i>My profile</a>
						<a class="dropdown-item" href="<?=base_url('Auth/logout');?>"><i class="fas fa-power-off me-2"></i>Logout</a>
					</div>
				</li>
                <li class="nav-item dropdown-style-switcher dropdown me-2 me-xl-0">
					<a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
					  <i class="ti ti-md"></i>
					</a>
					<ul class="dropdown-menu dropdown-menu-end dropdown-styles">
					  <li>
						<a class="dropdown-item" href="javascript:void(0);" data-theme="light">
						  <span class="align-middle"><i class="ti ti-sun me-2"></i>Light</span>
						</a>
					  </li>
					  <li>
						<a class="dropdown-item" href="javascript:void(0);" data-theme="dark">
						  <span class="align-middle"><i class="ti ti-moon me-2"></i>Dark</span>
						</a>
					  </li>
					  <li>
						<a class="dropdown-item" href="javascript:void(0);" data-theme="system">
						  <span class="align-middle"><i class="ti ti-device-desktop me-2"></i>System</span>
						</a>
					  </li>
					</ul>
				  </li>
		  </ul>
		</div>

		<!-- Search Small Screens -->
		<div class="navbar-search-wrapper search-input-wrapper d-none">
		  <input type="text" class="form-control search-input container-xxl border-0" placeholder="Search..." aria-label="Search...">
		  <i class="ti ti-x ti-sm search-toggler cursor-pointer"></i>
		</div>
	  </nav>

<!-- ============================================================== -->
<!-- end navbar -->
<div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
