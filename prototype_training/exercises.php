<?php require_once("include/db_connection.php"); ?>
<?php require_once("include/functions.php"); ?>


<?php include("include/header.php"); ?>

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
		<?php $muscle_group_set = find_row_exercises(1); ?>

		<?php while ($muscle_group = mysqli_fetch_assoc($muscle_group_set)) { ?>
			<a href="exercises_extra.php?exercise=<?php echo urldecode($muscle_group['id']); ?>">
				<div class="col-md-4 box<?php echo $muscle_group['color'] ?>">
				<h4><?php echo $muscle_group['menu_name']; ?></h4>
				<img src="images/exercises/<?php echo $muscle_group['id']; ?>.png">
			</div></a>
		<?php } ?>
	</div>
	<div class="row">
		<?php $muscle_group_set = find_row_exercises(2); ?>

		<?php while ($muscle_group = mysqli_fetch_assoc($muscle_group_set)) { ?>
			<a href="exercises_extra.php?exercise=<?php echo urldecode($muscle_group['id']); ?>">
				<div class="col-md-4 box<?php echo $muscle_group['color'] ?>">
				<h4><?php echo $muscle_group['menu_name']; ?></h4>
				<img src="images/exercises/<?php echo $muscle_group['id']; ?>.png">
			</div></a>
		<?php } ?>
	</div>
		<div class="row">
		<?php $muscle_group_set = find_row_exercises(3); ?>

		<?php while ($muscle_group = mysqli_fetch_assoc($muscle_group_set)) { ?>
			<a href="exercises_extra.php?exercise=<?php echo urldecode($muscle_group['id']); ?>">
				<div class="col-md-4 box<?php echo $muscle_group['color'] ?>">
				<h4><?php echo $muscle_group['menu_name']; ?></h4>
				<img src="images/exercises/<?php echo $muscle_group['id']; ?>.png">
			</div></a>
		<?php } ?>
	</div>

</article>

<?php include("include/footer.php") ?>