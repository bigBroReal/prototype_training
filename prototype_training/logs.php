<?php require_once("include/db_connection.php"); ?>
<?php require_once("include/functions.php"); ?>
<?php include("include/header.php"); ?>

<?php $work_ex_id = get_workout_ex_id(); ?>
<?php $exercise_id = get_exercise_id();  ?>
<?php $workout_id = get_workout_id(); ?>
<?php $date_id = get_date_id(); ?>

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
		<div class="col-sm-4 sidebar box1">
			<h2>Log</h2>
			<br />
			<div class="calender">
							<?php   
							 $date =time () ; 
							 $day = date('d', $date) ; 
							 $month = date('m', $date) ; 
							 $year = date('Y', $date) ;
							 $first_day = mktime(0,0,0,$month, 1, $year) ; 
							 $title = date('F', $first_day) ;
							 $day_of_week = date('D', $first_day) ; 

							 
							 switch($day_of_week){ 
							 case "Sun": $blank = 0; break; 
							 case "Mon": $blank = 1; break; 
							 case "Tue": $blank = 2; break; 
							 case "Wed": $blank = 3; break; 
							 case "Thu": $blank = 4; break; 
							 case "Fri": $blank = 5; break; 
							 case "Sat": $blank = 6; break; 

							 }
							 
							 $days_in_month = cal_days_in_month(0, $month, $year) ; 
							 ?>


							 <table width=350 height=300>
							 <tr><th style="text-align: center;" colspan=7> <?php echo "{$title} {$year}"; ?></th></tr>
							 <tr style="text-align:center;"><td width=42>S</td><td width=42>M</td><td 
							width=42>T</td><td width=42>W</td><td width=42>T</td><td 
							width=42>F</td><td width=42>S</td></tr>


							 <?php $day_count = 1; ?>
							 <tr>

							<?php while ( $blank > 0 ) { ?>
								 <td></td>
								<?php $blank = $blank-1; ?>
								<?php  $day_count++; ?>
							 <?php  } ?> 
							<?php $day_num = 1; ?>


								
								
							<?php  $log_workout_set = find_all_workout_log(); ?>
								<?php while($log_workout = mysqli_fetch_assoc($log_workout_set)){ ?>
									<?php $test[] = $log_workout['date'] ?>
																
							<?php } ?>



							 <?php while ( $day_num <= $days_in_month ) {  ?>
								 <td style= "text-align:center;">
									<?php echo "<a href=\"logs.php?date={$day_num}\">{$day_num}</a>"; ?>
								 </td>
								
								<?php $day_num++; ?>
								<?php $day_count++; ?>

								<?php for($i = 0; $i < count($test); $i++ ){ ?>
								<?php if($test[$i] == $day_num ){ ?>
									
								<td style= "text-align:center;">
									<?php echo "<a class=\"test\" href=\"logs.php?date={$day_num}\">{$day_num}</a>"; ?>
								 </td>
								
									<?php $day_num++; ?>
								 	<?php $day_count++; ?>	

									<?php } ?>
								<?php } ?>

								<?php if ($day_count > 7) { ?>
									 </tr><tr>
									 <?php $day_count = 1; ?>
								<?php } ?>
								 <?php if($day_num == $day){ ?>

								 	<td style="text-align:center;">
	
								 			<a style="color: #f57c11; font-size:25px;" 
								 			href="logs.php?date=<?php echo $day_num; ?>"><?php echo $day_num; ?></a>
				 	
								 </td>
								 	<?php $day_num++; ?>
								 	<?php $day_count++; ?>
								<?php } ?>
							
								 


					
									

								

								<?php } ?>
							 

							<?php while ( $day_count >1 && $day_count <=7 ) { ?> 
								 <td> </td> 
								 <?php $day_count++; ?> 
							<?php } ?> 
							 </tr></table>
			</div>
		</div>

		<div class="col-sm-8 main-content">



			<?php if(isset($date_id)){ ?>
			
				<?php  $date_workout_set = find_all_date_workouts($date_id); ?>
				<?php while($date_workout = mysqli_fetch_assoc($date_workout_set)){ ?>
					<?php $exercise_set = find_id_for_exercises($date_workout['ex_id']); ?>
					<?php while($exercise = mysqli_fetch_assoc($exercise_set)) {  ?>
						<div class="row sidebar new_work">
							<img src="images/ex_page/<?php echo $exercise['img2']; ?>.png">
							<?php echo $exercise['menu_name']; ?>

							<?php echo "set: " . $date_workout['set_id']; ?>
							x
							<?php echo "rep: " . $date_workout['rep']; ?>
							x
							<?php echo "weight: " . $date_workout['weight']; ?>
							<br />
							
					</div>
					<?php } ?>	
				<?php } ?>
			<?php } ?>

			</div>
		</div>

</article>


<?php include("include/footer.php") ?>