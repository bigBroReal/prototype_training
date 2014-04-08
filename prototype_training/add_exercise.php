<?php require_once("include/db_connection.php"); ?>
<?php require_once("include/functions.php"); ?>
<?php include("include/header.php"); ?>

<?php $exercise_id = get_exercise_id();  ?>
<?php $workout_id = get_workout_id(); ?>

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
		<div class="col-sm-4 sidebar visible-xs">
			<a href="#">Back</a>
		</div>
		<div class="col-sm-4 sidebar box1 hidden-xs">
			<?php $muscle_group_set = find_all_exercises(); ?>

			<?php while ($muscle_group = mysqli_fetch_assoc($muscle_group_set)) { ?>
			
			<a href="add_exercise.php?workout=<?php echo urlencode($workout_id) ?>&
				exercise=<?php echo urldecode($muscle_group['id']); ?>">


                <?php
                    // Show active exercise
                    if ($exercise_id == $muscle_group['id']) {
                            $active = ' active';
                        }
                        else {
                            $active = '';
                        }
                ?>
				<div class="row<?php print $active; ?>">
					<img src="images/exercises/<?php echo $muscle_group['id'] ?>.png">
						<?php echo $muscle_group['menu_name']; ?>	
				</div>
			</a>

			<?php } ?>

		</div>
		<div class="col-sm-8 main-content">
			
			<?php if(isset($exercise_id)){ ?>
			<?php $exercise_set = find_pages_for_exercises($exercise_id); ?>

				<?php while ($exercise = mysqli_fetch_assoc($exercise_set)) { ?>
					<a href="create_add_exercise.php?workout=<?php echo urlencode($workout_id) ?>&
						workoutex=<?php echo urlencode($exercise['id']) ?>">
					
                    <div class="row <?php echo $active . 'h ej' ?>">
						<h3><?php echo $exercise['menu_name']; ?></h3>
						<br />
						<?php echo $exercise['content']; ?>
						<br />
						<img src="images/ex_page/<?php echo $exercise['img']; ?>.png">
						<img src="images/ex_page/<?php echo $exercise['img2']; ?>.png">
					</div>
					</a>

				<?php } ?>
			<?php } ?>
			<?php if ($exercise_id == 9) {?>
			
				<?php $exercise_set = find_all_pages_for_exercises(); ?>

				<?php while ($exercise = mysqli_fetch_assoc($exercise_set)) { ?>
					<h3><?php echo $exercise['menu_name']; ?></h3>
					<br />
					<?php echo $exercise['content']; ?>
					<br />
					<img src="images/ex_page/<?php echo $exercise['img']; ?>.png">
					<img src="images/ex_page/<?php echo $exercise['img2']; ?>.png">
				<?php } ?>
			<?php } ?> 


			</div>
		</div>
	</div>
</article>


<?php include("include/footer.php") ?>