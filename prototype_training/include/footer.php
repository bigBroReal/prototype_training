<!-- 	<footer>
		<p>Copyright 2014, Prototype Training</p>
	</footer> -->
	
<script src="jquery/jquery-1.10.2.js"></script>
<script src="bootstrap/js/bootstrap.js"></script> 
</body>
</html>

<?php 
// 5. close connection
	if(isset($connection)){
		mysqli_close($connection);
	} 
?>