<?php $task_complete = countTask(); ?>
<?php $task_count = countAllTask(); ?>

<nav id="sidebar" class="sidebar-wrapper">
	<div class="sidebar-content">
		<!-- sidebar-header  -->
		<div class="sidebar-brand">
			<a href="index.php">navigation</a>
			<div id="close-sidebar">
				<i class="fas fa-times"></i>
			</div>
		</div>
		<div class="sidebar-header">
			<div class="user-info">
				<span class="user-name"><?php echo date("F j, Y")?></span>
				<span class="user-role"><?php echo date('l')?></span>
			</div>
		</div>
		<!-- sidebar-menu  -->
		<div class="sidebar-menu">
			<ul>
				<li class="header-menu">
					<span>Work</span>
				</li>
				<li>
					<a href="index.php" class="<?php if ($CURRENT_PAGE == "index") {?>current-page<?php }?>">
						<i class="fa fa-tachometer-alt"></i>
						<span>Dashboard</span>
					</a>
				</li>
				<li>
					<a href="#" class="<?php /* if ($CURRENT_PAGE == "") {?>current-page<?php } */ ?>">
						<i class="fas fa-chart-line"></i>
						<span>Analytics</span>
					</a>
				</li>
				<li>
					<a href="status.php" class="<?php if ($CURRENT_PAGE == "status") {?>current-page<?php }?>">
						<i class="fa fa-calendar"></i>
						<span>Tasks</span>
						<!-- count number of incomplete tasks -->
						<span class="badge badge-pill badge-danger">
							<?php echo ($task_count - $task_complete) ?>
						</span>
					</a>
				</li>
				<li>
					<a href="#" class="<?php /* if ($CURRENT_PAGE == "status") {?>current-page<?php } */ ?>">
						<i class="fa fa-users"></i>
						<span>Meetings</span>
					</a>
				</li>

				<!-- Misc -->
				<li class="header-menu">
					<span>Misc</span>
				</li>
				<li class="sidebar-dropdown">
					<a style="cursor: pointer;">
						<i class="fas fa-shopping-cart"></i>                    
						<span>E-commerce</span>
					</a>
					<div class="sidebar-submenu">
					<ul>
						<li>
						<a href="#">Orders</a>
						</li>
						<li>
						<a href="#">Products</a>
						</li>
					</ul>
					</div>
				</li>
				<li>
					<a href="#">
						<i class="fa fa-calendar"></i>
						<span>Calendar</span>
					</a>
				</li>
				<li>
					<a href="#">
						<i class="fa fa-cog"></i>
						<span>Settings</span>
						<span class="badge badge-pill badge-warning">
							New
						</span>
					</a>
				</li>
			</ul>
		</div>
	</div>
</nav>