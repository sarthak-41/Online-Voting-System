<?php 

		$con= mysqli_connect('localhost', 'root', '', 'voterdatabase');

			$query = "SELECT * FROM addcandidate";
			$result = mysqli_query($con, $query);

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Dashboard</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>

            .nav-item a{
                font-family: sans-serif;
                color:blue;
            }
            .nav-item a:hover{
                background:brown;
                color: white;
                border-radius: 7px;
            }
        </style>

</head>
<body>

    <ul class="nav justify-content-center bg-dark" style="padding:20px;">
	  <li class="nav-item">
		    <h1 style="font-family: sans;color:darkorange;"><b>Online Voting System</b></h1>
	  </li>
	</ul>
    <nav class="navbar navbar-expand-lg  bg-light" >
			  <div class="container-fluid">
			    <a class="navbar-brand" href="#"> <img src="Image/Admin.png" width="15%"> <b style="color:crimson;">Admin Pannel</b> </a>
			    <button class="navbar-toggler navbar-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			      <span class="navbar-toggler-icon"></span>
			    </button>
			    <div class="collapse navbar-collapse" id="navbarNav">
			      <ul class="navbar-nav">
			        <li class="nav-item">
			          <a class="nav-link active" aria-current="page" href="#Header" style="text-align:center;"><i class="fa fa-fw fa-home"></i><b>Home</b></a>
			        </li>
			        <li class="nav-item">
			          <a class="nav-link active" aria-current="page" href="#Add Candidate" style="text-align:center;" ><b>Add Candidate's</b></a>
			        </li>
			        <li class="nav-item">
			          <a class="nav-link active" aria-current="page" href="#Total"><b>Total Candidate's</b></a>
			        </li>
			        <li class="nav-item">
			          <a class="nav-link active" aria-current="page" href="dashboard.php" ><i class="fa fa-sign-out"></i><b>Logout</b></a>
			        </li>
			      </ul>
			    </div>
			  </div>
			</nav>

			
			<div id="Header">
					<img src="background6.jpg" width="100%" height="650px" object-fit="cover;">
			</div>
				<br><br>

				<div class="container-fluid" id="Add Candidate" style="box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.9); padding:40px;">
						<div class="row">
							<div class="col-sm-8">
								<h2 style="text-align: center;"> <span style="background:Blue;color:WHITE;padding: 10px;border-radius: 10px;">ADD CANDIDATE FOR ELECTION</span> </h2><br><hr><br>
								<div class="row">
									<div class="col-sm-6">
							     		<form action="AddCandidate.php" method="post" enctype="multipart/form-data">
												  <div class="mb-3">
												    <label for="exampleInputEmail1" class="form-label">Candidate Name</label>
												    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="cname">
												  </div>
												  <div class="mb-3">
												    <label for="exampleInputPassword1" class="form-label">Party Name</label>
												    <input type="text" class="form-control" id="exampleInputPassword1" name="cparty">
												  </div>
											
									</div>
									<div class="col-sm-6">
											
												  <div class="mb-3">
												    <label for="exampleInputEmail1" class="form-label">Select Symbol</label>
												    <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="symbol">
												  </div>
																			
									</div>
								</div>
								<button type="submit" class="btn btn-primary">Submit</button>
								</form>
							</div>
							<div class="col-sm-4">
								<img src="Image/header.jpg" width="100%" height="100%">

							</div>
						</div>
					</div>
<br><br><br>
							<div class="container" id="Total">
			    				<div class="row">
			    					<div class="col-sm-10">
			    						<h2 style="text-align: center;"> <span style="background:blue;color:white;padding: 10px;border-radius: 10px;">Total List of Candidate's</span> </h2><br><br>
			    						<table class="table" cellspacing="15" cellpadding="15" style="text-align:center;margin:0 auto;table-layout:auto; border-spacing: 10px;">
											  <thead>
											    <tr>
											      <th scope="col">Candidate Name</th>
											      <th scope="col">Party</th>
											      <th scope="col">Symbol</th>
											    </tr>
											  </thead>
											  <?php   

													while ($row = mysqli_fetch_assoc($result)) {
									    		?>
											<tbody>
											    <tr>
											      <td><b><?php echo $row['cname'] ?><b></td>
											      <td><b><?php echo $row['cparty'] ?></b></td>
											      <td><img src="Image/<?php echo $row['symbol'] ?>" width="25%" border-radius="100%;" height="25%"> </td>
											    </tr>
												<?php
													}
				    							?>
									  		</tbody>
										</table>
			    					</div>
			    				</div>			
			    			</div>
</body>
</html>