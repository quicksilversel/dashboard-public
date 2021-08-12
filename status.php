<?php include("includes/config.php");?>
<?php require_once("includes/public_function.php");?>
<?php 

// Get the sort order for the column, ascending or descending, default is ascending.
$sort_order = isset($_GET['order']) && strtolower($_GET['order']) == 'desc' ? 'DESC' : 'ASC';
$up_or_down = str_replace(array('ASC','DESC'), array('up','down'), $sort_order); 

if (isset($_GET['column'])){
    $column = $_GET['column'];
    $tasks = sortTable($column, $sort_order);
}
else{
    $tasks = sortTable('id', 'ASC'); 
}
?>

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
		<!-- content -->
		<div class="page-content">
			<div class="container">
				<div class="header">
                    <h1 class="fs-3">Tasks</h1>
                    <p></p>
				</div>
                <!-- status table -->
                <section class="table">
				<table class="text-center">
					<tbody>
						<tr>
							<th style="width: 5%; border-top:none;"><a href="status.php?column=id">#<i class="fas fa-sort px-1"></i></th>
							<th style="width: 35%; border-top:none;"><a href="status.php?column=taskName&order=<?php echo $asc_or_desc; ?>">Task
                            <i class="fas fa-caret-<?php echo $up_or_down ?> px-1"></i></th>
							<th style="width: 30%; border-top:none;"><a href="status.php?column=taskStatus&order=<?php echo $asc_or_desc; ?>">Status
                            <i class="fas fa-caret-<?php echo $up_or_down ?> px-1"></i></th>
							<th style="width: 30%; border-top:none;"><a href="status.php?column=taskDue&order=<?php echo $asc_or_desc; ?>">Due
                            <i class="fas fa-caret-<?php echo $up_or_down ?> px-1"></i></th>
						</tr>
                        <!-- get data -->
                        <?php foreach ($tasks as $task): ?>
                        <tr>
							<td></td>
							<td>
                                <?php echo $task['taskName'] ?>
                            </td>
							<td>
                            <!-- check status -->
                            <?php if ($task['taskStatus'] == true): ?>
                                <a class="fa fa-check btn" style="color: green;"
                                    href="status.php?incomplete=<?php echo $task['id'] ?>">
                                </a>
                            <?php else: ?>
                                <a class="fa fa-times btn" style="color: #B00020;"
                                    href="status.php?complete=<?php echo $task['id'] ?>">
                                </a>
                            <?php endif ?>
                            </td>
							<td>
                                <!-- edit button -->
                                <form method="post" action="<?php echo 'status.php'; ?>" >
                                    <!-- input field -->
                                    <input type="hidden" name="id" value="<?php echo $task['id']; ?>">
                                    <input type="date" name="date" value="<?php echo date('Y-m-d',strtotime($task['taskDue'])) ?>">
                                    <!-- update date -->
                                    <button type="submit" name="update-date" class="submit-button">Update</button>
                                </form>
                            </td>
						</tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
                </section>
            </div>
		</div>
	</div>
</body>