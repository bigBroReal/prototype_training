<?php require_once("include/db_connection.php"); ?>
<?php require_once("include/functions.php"); ?>

<?php 



if(isset($_GET["workout"]) && isset($_GET["workoutex"])){
	// Procesds the form

	$menu_name = mysql_prep($_POST['menu_name']);
	$workout_id = mysql_prep(get_workout_id());
	$exercise_id = mysql_prep(get_workout_ex_id()); 

	$query = "INSERT INTO work_page (";
	$query .= " work_id, exercise_id ";
	$query .= ") VALUES (";
	$query .= " {$workout_id}, {$exercise_id})";

	$workout_set = mysqli_query($connection, $query);

	if($workout_set){
		redirect_to("new_workout.php?workout=" . urlencode($workout_id));
	}
	else{
		redirect_to("new_workout");
	}


} else {
	// This is problobly a GET request
	redirect_to("new_workout.php");
}

 ?>


<?php 
// 5. close connection
	if(isset($connection)){
		mysqli_close($connection);
	} 
?>