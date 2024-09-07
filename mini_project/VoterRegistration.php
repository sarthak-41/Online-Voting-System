<?php 
	include 'connect.php';
	$name = $_POST['name'];
	$dob = $_POST['dob'];
	$email = $_POST['email'];
	$mobile = $_POST['mobileno'];
	$gender = $_POST['gender'];
	$image = $_FILES['photo']['name'];
	$tmp_name = $_FILES['photo']['tmp_name'];
	$idtype = $_POST['idtype'];
	$idno = $_POST['idno'];
	$state = $_POST['state'];
	$city= $_POST['city'];
	$pass = $_POST['pass'];
	$cpass = $_POST['cpass'];

	if ($pass == $cpass) {
		move_uploaded_file($tmp_name, "../Image/$image");
		
		$insert = mysqli_query($con, "INSERT INTO voterregister(name, dob, email, mobile, gender, photo, idtype, idno, state ,city, pass, cpass, status, votes)
		 VALUES('$name', '$dob', '$email', '$mobile', '$gender', '$image', '$idtype', '$idno', '$state', '$city', '$pass', '$cpass', 0, 0) ");

			echo '

			<script>
					alert("Your Account has been created Successfully");
					location = "login.html";
			</script>


		';

	}
	else{
		echo '

			<script>
					alert("Password and Confrim Password Does Not Match!!");
					location = "index.html";
			</script>


		';
	}
?>