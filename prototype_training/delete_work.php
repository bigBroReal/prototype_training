<?php require_once("include/db_connection.php"); ?>
<?php require_once("include/functions.php"); ?>
<?php $work_ex_id = get_workout_ex_id(); ?>
<?php $exercise_id = get_exercise_id();  ?>
<?php $workout_id = get_workout_id(); ?>
<?php $log_id = get_log_id(); ?>
<?php $delete_id = get_delete_id(); ?>

<?php 
if(isset($delete_id)){
	// Procesds the form

	$id = mysql_prep($delete_id);

	$query = "DELETE FROM workout ";
	$query .= "WHERE id = {$id}";


	$workout_set = mysqli_query($connection, $query);

	if($workout_set){
		redirect_to("workouts.php");
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