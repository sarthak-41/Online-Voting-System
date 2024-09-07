<?php
			session_start();
			$con = mysqli_connect('localhost', 'root', '', 'voterdatabase');

			$idno = $_POST['idno'];
			$mobileno = $_POST['mobileno'];
			$pass = $_POST['pass'];
	

			$check = mysqli_query($con, "SELECT * FROM voterregister WHERE idno='$idno' AND mobile='$mobileno' AND pass='$pass'  ");

			if (mysqli_num_rows($check)>0) {
				$voterdata = mysqli_fetch_array($check);
				$_SESSION['voterdata']=$voterdata;

				echo '

					<script>
						location="dashboard.php";
					</script>


				';
			}
			else{
				echo '
				
				<script>
						alert("The Details Entered Are Incorrect");
						location="login.html";
				</script>
				
				
				
				
				';
			}


?>