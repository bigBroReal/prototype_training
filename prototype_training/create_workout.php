<?php require_once("include/db_connection.php"); ?>
<?php require_once("include/functions.php"); ?>
<?php $work_id = get_workout_id(); ?>

<?php 
if(isset($_POST['submit'])){
	// Procesds the form

	$menu_name = mysql_prep($_POST['menu_name']);

	$query = "INSERT INTO workout (";
	$query .= " menu_name";
	$query .= ") VALUES (";
	$query .= " '{$menu_name}')";

	$workout_set = mysqli_query($connection, $query);

	if(isset($wokout_set)){

	$workout_id_set = find_all_workouts_name($_POST['menu_name']);
	while($workout_id = mysqli_fetch_assoc($workout_id_set)){

	if($workout_set){
		redirect_to("new_workout.php?workout=" . $workout_id['menu_name'] );
	}
	else{
		redirect_to("new_workout.php");
	}

}
} else {
	redirect_to("new_workout.php");
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