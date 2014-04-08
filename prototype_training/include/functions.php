<?php 
	// Store alla the functions

     
    error_reporting(E_ALL);
    ini_set('display_errors', TRUE);
    ini_set('display_startup_errors', TRUE);


	function confirm_query($result_set) {
		if (!$result_set) {
			die("Database query failed.");
		}
	}

	function redirect_to($location = NULL) {
		if ($location != NULL) {
            //die;
			header("Location: {$location}");
			exit;
		}
	}

	function mysql_prep($string) {
		global $connection;

		$escaped_string = mysqli_real_escape_string($connection, $string);
		return $escaped_string ;
	}

	function calender(){
		//This gets today's date 
		 $date =time () ; 

		 //This puts the day, month, and year in seperate variables 
		 $day = date('d', $date) ; 
		 $month = date('m', $date) ; 
		 $year = date('Y', $date) ;

		 //Here we generate the first day of the month 
		 $first_day = mktime(0,0,0,$month, 1, $year) ; 

		//This gets us the month name 
		 $title = date('F', $first_day) ;

		 //Here we find out what day of the week the first day of the month falls on 
		 $day_of_week = date('D', $first_day) ; 

		 //Once we know what day of the week it falls on, we know how many blank days occure before it. If the first day of the week is a Sunday then it would be zero

		 switch($day_of_week){ 
		 case "Sun": $blank = 0; break; 
		 case "Mon": $blank = 1; break; 
		 case "Tue": $blank = 2; break; 
		 case "Wed": $blank = 3; break; 
		 case "Thu": $blank = 4; break; 
		 case "Fri": $blank = 5; break; 
		 case "Sat": $blank = 6; break; 

		 }
		 //We then determine how many days are in the current month
		 $days_in_month = cal_days_in_month(0, $month, $year) ; 

		 //Here we start building the table heads 

		 echo "<table width=350 height=300>";
		 echo "<tr><th colspan=7> $title $year </th></tr>";
		 echo "<tr><td width=42>S</td><td width=42>M</td><td 
		width=42>T</td><td width=42>W</td><td width=42>T</td><td 
		width=42>F</td><td width=42>S</td></tr>";

		 //This counts the days in the week, up to 7
		 $day_count = 1;
		 echo "<tr>";

		 //first we take care of those blank days
		 while ( $blank > 0 ) { 
			 echo "<td></td>"; 
			 $blank = $blank-1; 
			 $day_count++;
		 } 

		 //sets the first day of the month to 1 
		 $day_num = 1;

		 //count up the days, untill we've done all of them in the month
		 while ( $day_num <= $days_in_month ) { 
			 echo "<td><a href=\"logs.php?date={$day_num}\">$day_num</a></td>"; 
			
			 $day_num++; 
			 $day_count++;

			 //Make sure we start a new row every week
			 if ($day_count > 7) {
				 echo "</tr><tr>";
				 $day_count = 1;
			 }
			 if($day_num == $day){
			 	echo "<td style=\"font-weight:bold; font-size:25px; \">
			 	<a href=\"logs.php?date={$day_num}\">$day_num</a></td>";
			 	$day_num++; 
			 	$day_count++;
			 }
		 } 

		 //Finaly we finish out the table with some blank details if needed
		 while ( $day_count >1 && $day_count <=7 ) { 
			 echo "<td> </td>"; 
			 $day_count++; 
		 } 
		 echo "</tr></table>"; 
	}

	function find_row_exercises($row){
		global $connection;

		$query = "SELECT * ";
		$query .= "FROM exercises ";
		$query .= "WHERE position = {$row} ";
		$query .= "ORDER BY id ASC";
		$exercise_set = mysqli_query($connection, $query); 
		confirm_query($exercise_set);
		return $exercise_set;
	}

	function find_all_exercises(){
		global $connection;

		$query = "SELECT * ";
		$query .= "FROM exercises ";
		$query .= "ORDER BY id ASC";
		$exercise_set = mysqli_query($connection, $query); 
		confirm_query($exercise_set);
		return $exercise_set;
	}

	function find_pages_for_exercises($exercise_id){
		global $connection;
		
		$query = "SELECT * ";
		$query .= "FROM ex_page ";
		$query .= "WHERE ex_id = {$exercise_id} ";
		$query .= "ORDER BY id ASC";
		$ex_page_set = mysqli_query($connection, $query); 
		confirm_query($ex_page_set);
		return $ex_page_set;
	}

	function find_id_for_exercises($exercise_id){
		global $connection;
		
		$query = "SELECT * ";
		$query .= "FROM ex_page ";
		$query .= "WHERE id = {$exercise_id} ";
		$query .= "ORDER BY id ASC";
		$ex_page_set = mysqli_query($connection, $query); 
		confirm_query($ex_page_set);
		return $ex_page_set;
	}

	function find_all_pages_for_exercises(){
		global $connection;
		
		$query = "SELECT * ";
		$query .= "FROM ex_page ";
		$query .= "ORDER BY id ASC";
		$ex_page_set = mysqli_query($connection, $query); 
		confirm_query($ex_page_set);
		return $ex_page_set;
	}

	function find_all_workouts(){
		global $connection;
		
		$query = "SELECT * ";
		$query .= "FROM workout ";
		$query .= "ORDER BY id ASC";
		$workout_set = mysqli_query($connection, $query); 
		confirm_query($workout_set);
		return $workout_set;
	}

	function find_all_workouts_id($work_id){
		global $connection;
		
		$query = "SELECT * ";
		$query .= "FROM workout ";
		$query .= "WHERE id = {$work_id} ";
		$query .= "ORDER BY id ASC";
		$workout_set = mysqli_query($connection, $query); 
		confirm_query($workout_set);
		return $workout_set;
	}

	function find_all_workouts_name($menu_name){
		global $connection;
		
		$query = "SELECT * ";
		$query .= "FROM workout ";
		$query .= "WHERE menu_name = {$menu_name} ";
		$query .= "ORDER BY id ASC";
		$menu_name_set = mysqli_query($connection, $query); 
		confirm_query($menu_name_set);
		return $menu_name_set;
	}


	function find_all_workouts_exercises(){
		global $connection;
		
		$query = "SELECT * ";
		$query .= "FROM workout_ex ";
		$query .= "ORDER BY id ASC";
		$workout_ex_set = mysqli_query($connection, $query); 
		confirm_query($workout_set);
		return $workout_set;
	}

	function find_all_workouts_page($workout_id){
		global $connection;
		
		$query = "SELECT * ";
		$query .= "FROM work_page ";
		$query .= "WHERE work_id = {$workout_id} ";
		$query .= "ORDER BY id ASC";
		$work_page_set = mysqli_query($connection, $query); 
		confirm_query($work_page_set);
		return $work_page_set;
	}

	function find_all_date_workouts($date_id){
		global $connection;
		
		$query = "SELECT * ";
		$query .= "FROM work_log ";
		$query .= "WHERE date = {$date_id} ";
		$query .= "ORDER BY id ASC";
		$date_set = mysqli_query($connection, $query); 
		confirm_query($date_set);
		return $date_set;
	}

	function find_all_workout_log(){
		global $connection;
		
		$query = "SELECT * ";
		$query .= "FROM work_log ";
		$query .= "ORDER BY id ASC";
		$work_log = mysqli_query($connection, $query); 
		confirm_query($work_log);
		return $work_log;
	}


	function get_exercise_id(){
		if(isset($_GET["exercise"])){
			$selected_exercise_id = $_GET["exercise"];
		}
		else{
			$selected_exercise_id = null;			
		}

		return $selected_exercise_id;
	}

	function get_workout_id(){
		if(isset($_GET["workout"])){
			$selected_work_id = $_GET["workout"];
		}
		else{
			$selected_work_id = null;			
		}

		return $selected_work_id;
	}

	function get_workout_ex_id(){
		if(isset($_GET["workoutex"])){
			$selected_work_ex_id = $_GET["workoutex"];
		}
		else{
			$selected_work_ex_id = null;			
		}

		return $selected_work_ex_id;
	}

	function get_log_id(){
		if(isset($_GET["log"])){
			$log_id = $_GET["log"];
		}
		else{
			$log_id = null;			
		}

		return $log_id;
	}

	function get_delete_id(){
		if(isset($_GET["delete"])){
			$delete_id = $_GET["delete"];
		}
		else{
			$delete_id = null;			
		}

		return $delete_id;
	}

	function get_date_id(){
		if(isset($_GET["date"])){
			$date_id = $_GET["date"];
		}
		else{
			$date_id = null;			
		}

		return $date_id;
	}


?>