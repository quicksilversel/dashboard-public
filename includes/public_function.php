<?php 

// global variables

$task_id = 0;
$taskName = '';
$date = '';

// returns all tasks 
function getTask() {
	// use global $conn object in function
	global $conn;
	$sql = "SELECT * FROM task";
	$result = mysqli_query($conn, $sql);
	$tasks = mysqli_fetch_all($result, MYSQLI_ASSOC);

	$final_tasks = array();
	foreach ($tasks as $task) {
		array_push($final_tasks, $task);
	}
	return $final_tasks;
}

// sort table by column
function sortTable($column, $sort_order) {
	global $conn, $asc_or_desc;
	$sql = 'SELECT * FROM task ORDER BY ' . $column . ' ' . $sort_order;
	if(mysqli_query($conn, $sql)){
		$asc_or_desc = $sort_order == 'ASC' ? 'desc' : 'asc';
		$result = mysqli_query($conn, $sql);
		$tasks = mysqli_fetch_all($result, MYSQLI_ASSOC);

		$final_tasks = array();
		foreach ($tasks as $task) {
			array_push($final_tasks, $task);
		}
		return $final_tasks;
	}
	else{
		echo mysqli_error($conn);
	}
}

/* actions */

// mark incomplete
if (isset($_GET['incomplete'])) {
	$task_id = $_GET['incomplete'];
	unapplyTask($task_id);
}
// mark complete
if (isset($_GET['complete'])) {
	$task_id = $_GET['complete'];
	applyTask($task_id);
}

// edit date
if (isset($_GET['edit-date'])) {
	$task_id = $_GET['edit-date'];
	editDate($task_id);
}

// update date
if (isset($_POST['update-date'])) {
	updateDate($_POST);
}

// apply
function applyTask($task_id) {
	global $conn, $task_id;
	$query = "UPDATE task SET taskStatus = 1 WHERE id = $task_id";
	if(mysqli_query($conn, $query)) {
		header('location: status.php');
		exit(0);
	}
}

// unapply
function unapplyTask($task_id) {
	global $conn, $task_id;
	$query = "UPDATE task SET taskStatus = 0 WHERE id = $task_id";
	if(mysqli_query($conn, $query)) {
		header('location: status.php');
		exit(0);
	}
}

// edit date 
function editDate($task_id) {
	global $conn, $task_id, $taskName, $date;
	$query = "SELECT * FROM task WHERE id = $task_id LIMIT 1";
        $result = mysqli_query($conn, $query);
        $task = mysqli_fetch_assoc($result);

        // set form values on the form to be updated
        $taskName = $task['taskName'];
        $date = $task['taskDue'];
}

// update date 
function updateDate($request_values) {
	global $conn, $task_id, $date;
	$task_id = $request_values['id'];
	$date = $request_values['date'];
	$newDate = date("Y-m-d", strtotime($date));
	$query = "UPDATE task SET taskDue = '$newDate' WHERE id = $task_id";
	if(mysqli_query($conn, $query)) {
		header('location: status.php');
		exit(0);
	}
	else{
		echo mysqli_error($conn);
	}
}

// return number of completed tasks 
function countTask() {
	global $conn;
	$query = "SELECT COUNT(
		CASE WHEN taskStatus = 1 THEN 1 END
	) AS 'count' FROM task";
	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_assoc($result);
	$count = $row['count'];

	return $count;
}

// return number of all tasks
function countAllTask() {
	global $conn;
	$query = "SELECT COUNT(*) AS 'count' FROM task";
	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_assoc($result);
	$count = $row['count'];

	return $count;
}

?>