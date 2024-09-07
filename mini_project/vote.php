<?php
	session_start();
	$con = mysqli_connect('localhost', 'root', '', 'voterdatabase');

	$votes = $_POST['gvotes'];
	$total_votes = $votes+1;
	$gid = $_POST['gid'];
	$uid = $_SESSION['voterdata']['sno'];


	$update_votes = mysqli_query($con, "UPDATE addcandidate SET votes ='$total_votes' WHERE id = '$gid'  ");
	$update_user_status = mysqli_query($con, "UPDATE voterregister  SET status =1 WHERE sno = '$uid'  ");

	if ($update_votes and $update_user_status) {
		$candidate = mysqli_query($con, "SELECT * FROM addcandidate");
		$candidatedata = mysqli_fetch_all($candidate, MYSQLI_ASSOC);

		$_SESSION['voterdata']['status']=1;
		$_SESSION['candidatedata'] = $candidatedata;

		echo '

					<script>
						alert("Voting Sucessfull");
						location="dashboard.php";
					</script>


				';
	}
	else{
		echo "Some Error";
	}



?>