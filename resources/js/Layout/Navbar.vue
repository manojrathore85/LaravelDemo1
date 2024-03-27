<template>

		<!--sidebar wrapper -->
		<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div>
					<img src="assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
				</div>
				<div>
					<h4 class="logo-text">Rocker</h4>
				</div>
				<div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
				</div>
			</div>
			<!--navigation-->
			<ul class="metismenu" id="menu">
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-home-circle'></i>
						</div>
						<div class="menu-title">Dashboard</div>
					</a>
					<ul>
						<li> 
                            <RouterLink to="/"><i class="bx bx-right-arrow-alt">Dashboard</i></RouterLink>
                        </li>

					</ul>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-category"></i>
						</div>
						<div class="menu-title">Master</div>
					</a>
					<ul>
                        <li><RouterLink to="/user"><i class="bx bx-right-arrow-alt">User</i></RouterLink></li>
                        <li><RouterLink to="/category"><i class="bx bx-right-arrow-alt">Category</i></RouterLink></li>
                        <li><RouterLink to="/product"><i class="bx bx-right-arrow-alt">Product</i></RouterLink></li>
                    </ul>
				</li>
			</ul>
			<!--end navigation-->
		</div>
        <!--end sidebar wrapper -->
</template>
<script>
export default {
    name:'Navbar',
}; 
</script>