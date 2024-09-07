<?php

	
	$con = mysqli_connect('localhost', 'root', '', 'voterdatabase');

	$cname = $_POST['cname'];
	$cparty = $_POST['cparty'];

	$image = $_FILES['symbol']['name'];
	$tmp_name = $_FILES['symbol']['tmp_name'];

	$insert = mysqli_query($con, "INSERT INTO addcandidate (cname, cparty, symbol)VALUES('$cname', '$cparty', '$image') ");

	if ($insert==true) {
		move_uploaded_file($tmp_name, "Image/$image");
	

		echo '

			<script>
					alert("Candidate Added Successfully ");
					location = "AdminDashboard.php";
			</script>


		';

	}
	else{
		echo "Some Error";
	}








?>