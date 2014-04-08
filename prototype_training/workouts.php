<?php require_once("include/db_connection.php"); ?>
<?php require_once("include/functions.php"); ?>
<?php include("include/header.php"); ?>

<?php $work_ex_id = get_workout_ex_id(); ?>
<?php $exercise_id = get_exercise_id();  ?>
<?php $workout_id = get_workout_id(); ?>
<?php $log_id = get_log_id(); ?>
<?php $delete_id = get_delete_id(); ?>

		<h1>Exercises</h1>
		<div id="page-content">
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc in purus ligula. 
			Mauris nec ipsum sem. Fusce nunc tellus, porttitor quis erat sit amet, blandit feugiat libero. 
			Suspendisse vestibulum dolor in mollis
		</p>
		</div>
	</dov>
</div> 
</header>

<article>
	<div class="row">

		<div class="col-sm-4 sidebar box1 ">

			<h2>Workout</h2>
			<?php $workout_set = find_all_workouts(); ?>
			<?php while ($workout = mysqli_fetch_assoc($workout_set)) { ?>
				<a href="workouts.php?workout=<?php echo urlencode($workout['id']); ?>">
					<div class="row workout">

							<h4><?php echo $workout['menu_name']; ?></h4>

							<div class="t2">

								<a href="workouts.php?workout=<?php echo urlencode($workout_id);?>
								&delete=<?php echo urlencode($workout['id']);?> " 
								>Delete</a>	

								<?php if($delete_id == $workout['id']){ ?>
								
								<a href="delete_work.php?workout=<?php echo urlencode($workout_id);?>
								&delete=<?php echo urlencode($workout['id']);?> " 
								>Yes</a>	
								<a href="workouts.php">No</a>	
								<?php } ?>
							</div>
					</div>
				</a>
			<?php } ?>
			<a href="new_workout.php">
				<div class="row workout">
					<h4>+ Create Workout</h4>
				</div>
			</a>
		</div>

		<div class="col-sm-8 main-content">

			<?php if(isset($workout_id)){ ?>
				<?php $workout_name_set = find_all_workouts_id($workout_id); ?>
					<?php while ($workout_name = mysqli_fetch_assoc($workout_name_set)){ ?>
					<div class="row">
						<?php echo "<h3>" . $workout_name['menu_name'] . "</h3>"  ?>
					</div>
				<?php } ?>
				<?php $workout_page_set = find_all_workouts_page($workout_id) ?>
				<?php while ($workout_page = mysqli_fetch_assoc($workout_page_set)) { ?>
					<?php $exercise_set = find_id_for_exercises($workout_page['exercise_id']); ?>
					<?php while ($exercise = mysqli_fetch_assoc($exercise_set)) { ?>
					
						<div class="row sidebar new_work" >
							<img src="images/ex_page/<?php echo $exercise['img2']; ?>.png">
							<?php echo $exercise['menu_name']; ?>

							<a href="workouts.php?workout=<?php echo urlencode($workout_id);?>
							&log=<?php echo urlencode($exercise['id']); ?>" 
							>Add to Log</a>	
						
						<?php if($log_id == $exercise['id']){ ?>
							<form action="create_log.php?workout=<?php echo urlencode($workout_id) ?>&
								log=<?php echo urlencode($exercise['id']) ?>" 
								method="post" class="form">
								<?php 	$date =time (); echo $day_id = date('d', $date) . " " .
								$month_id = date('m', $date) . " " . 
								$year_id = date('Y', $date) ?>
								<input type="text" name="set" value="" id="set" placeholder="set" />
								<input type="text" name="rep" value="" id="rep" placeholder="reps" />
								<input type="text" name="weight" value="" id="weight" placeholder="weight" />
								<input type="submit" name="submit" value="Add" />
							</form>
						<?php } ?>

							<a href="workouts.php?workout=<?php echo urlencode($workout_id);?>
							&delete=<?php echo urlencode($exercise['id']);?> " 
							>Delete</a>	

							<?php if($delete_id == $exercise['id']){ ?>

							<a href="delete_work_ex.php?workout=<?php echo urlencode($workout_id);?>
							&delete=<?php echo urlencode($exercise['id']);?> " 
							>Yes</a>	
							<a href="workouts.php?workout=<?php echo urlencode($workout_id);?>">No</a>	
							<?php } ?>

						</div>
					<?php } ?>
				<?php } ?>
					<form action="create_workout.php" method="post">

						<a href="add_exercise.php?workout=<?php  
						echo urlencode($workout_id) ?>">+ Add Exercise</a>
						<br />
						<br />
<!-- 						<input type="text" name="comment" value="" id="comment" placeholder="Set and rep" />
						<br />
						<br />
						<input type="submit" name="submit" value="Add Subject" /> -->
					</form>		
			<?php } ?>
			
			</div>
		</div>
	</div>
</article>


<?php include("include/footer.php") ?>