<?php 
	require_once('../models/TaskManager.php');
	
	$tasks = Task::viewTasks($db);

	include_once('../views/index.show.php');
?>
