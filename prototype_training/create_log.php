<?php require_once("include/db_connection.php"); ?>
<?php require_once("include/functions.php"); ?>

<?php 

if(isset($_POST['submit'])){
	
	$date =time ();
	$day_id = date('d', $date); 
	$month_id = date('m', $date); 
	$year_id = date('Y', $date);

	$ex_id = (int)mysql_prep(get_log_id());
	$date = (int) mysql_prep($day_id);
	$month = (int) mysql_prep($month_id);
	$year = (int) mysql_prep($year_id);
	$rep = (int)mysql_prep($_POST['rep']);	
	$set = (int)mysql_prep($_POST['set']); 
	$weight = (int)mysql_prep($_POST['weight']);
	$work_id = (int)mysql_prep(get_workout_id());

	$query = "INSERT INTO work_log (";
	$query .= " ex_id, date, month, year, rep, set_id, weight, work_id ";
	$query .= ") VALUES (";
	$query .= " {$ex_id}, {$date}, {$month}, {$year}, {$rep}, {$set}, {$weight}, {$work_id})";

	$workout_set = mysqli_query($connection, $query);

	if($workout_set){
		redirect_to("workouts.php?workout=" . urlencode($work_id));
	}
	else{
		redirect_to("workouts.php?error=1");
	}


} else {
	// This is problobly a GET request
	redirect_to("workouts.php?error=2");
}

 ?>


<?php 
// 5. close connection
	if(isset($connection)){
		mysqli_close($connection);
	} 
?>