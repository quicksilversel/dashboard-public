<?php include("includes/config.php");?>
<?php require_once("includes/public_function.php");?>
<?php $task_complete = countTask(); ?>
<?php $task_count = countAllTask(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  	<?php include("includes/head.php");?>
</head>
<body>
    <div class="page-wrapper toggled">
        <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
          <i class="fas fa-bars"></i>
        </a>
        <!-- sidenav -->
        <?php include("includes/sidebar.php");?>
        <!-- content  -->
        <div class="page-content">
          	<div class="container">
			  	<div class="header">
					<h1 class="fs-3">Progress</h1>
					<p></p>
				</div>
				<div class="row mt-4">
					<!-- first column -->
					<div class="col-lg-8">
						<!-- progress bars -->
						<div class="row">
							<div class="col-lg-6">
								<div class="p-3 progress-wrapper">
									<i class="fas fa-2x fa-briefcase p-2 text-primary"></i>
									<h5 class="mt-2 p-1">Tasks</h5>
									<div id="bar">
										<div class="progress-bar bg-primary" role="progressbar" aria-valuenow="<?php echo floor(($task_complete / $task_count ) * 100) ?>" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
									<p class="mt-1 mb-1" style="float:right;"><?php echo floor(($task_complete / $task_count ) * 100) ?>%</p>
									<p class="text-center mt-4"><?php echo $task_complete ?> out of <?php echo $task_count ?> complete</p>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="p-3 progress-wrapper">
									<i class="fas fa-2x fa-address-card p-2 text-warning"></i>
									<h5 class="mt-2 p-1">Meetings</h5>
									<div id="bar">
										<div class="progress-bar bg-warning" role="progressbar" aria-valuenow="<?php echo floor(($task_complete / $task_count ) * 100) ?>" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
									<p class="mt-1 mb-1" style="float:right;"><?php echo floor(($task_complete / $task_count ) * 100) ?>%</p>
									<p class="text-center mt-4"><?php echo $task_complete ?> out of <?php echo $task_count ?> complete</p>
								</div>
							</div>
						</div>
					</div>
					<!-- second column -->
					<div class="col-lg-4">
						<div class="p-3 progress-wrapper-long">
							<h5 class="mt-2 p-1">
								<i class="far fa-comment-dots p-1 text-success"></i>
							Messages</h5>
						</div>
					</div>
				</div>
          	</div>	
		</div>
    </div>
</body>