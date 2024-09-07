<?php
			session_start();
			$voterdata=$_SESSION['voterdata'];

			
			$con = mysqli_connect('localhost', 'root', '', 'voterdatabase');

			$query = "SELECT * FROM addcandidate";
			$result = mysqli_query($con, $query);

            if ($_SESSION['voterdata']['status']==0) {
				$status = '<b style = "color:crimson; font-weight:bold;">Not Voted</b>';
			}
			else{
				$status = '<b style = "color:green; font-weight:bold;">Voted</b>';
			}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Dashboard </title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">


<style>
   
                    .nav-item a{
                        color:white;
                    }
                    
                    .nav-item a:hover{
                        color:blue;
                        background:greenyellow;
                        border-radius: 7px;
                    }
                    #mainsec{
                        box-shadow:2px 2px 10px rgba(0, 0, 0, 0.9);
                    }

</style>




</head>
<body>

<div class="w3-sidebar w3-bar-block w3-card w3-animate-right" style="display:none;right:0; width: 100%;" id="rightMenu">
		  <button onclick="closeRightMenu()" class="w3-bar-item w3-button w3-large">Close &times;</button>
		  
		  			<div class="container" style="padding-top: 50px;"> 
		  				<div class="row">
		  					<div class="col-sm-4">
		  						
		  					</div>
		  					<div class="col-sm-5"> 
		  						<h2>Admin Login Form</h2><br>
		  						<p>Please enter your information to proceed</p><hr><br><br>

		  						<form action="Adminlogin.php" method="post">
									  <div class="mb-3">
									    <label for="exampleInputEmail1" class="form-label">Name</label>
									    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name">
									  </div>
									  <div class="mb-3">
									    <label for="exampleInputPassword1" class="form-label">Password</label>
									    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
									  </div>
									   <div class="d-grid gap-2">
									  <button class="btn btn-primary" type="submit">Login</button>
									</div>
									</form>
		  					</div>
		  					
		  					
		  				</div>
		  				
		  			</div>




                </div>    

        <nav class="navbar navbar-dark bg-dark">
            <div class="container-fluid">
                    <a class="navbar-brand"><i class="fa fa-fw fa-globe"></i><b>Online Voting System</b></a>
             <ul class="nav justify-content-center">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#"><i class="fa fa-fw fa-home"></i>Home</a>
                </li>
                <li class="nav-item">
                     <a class="nav-link" href="#"><i class="fa fa-fw fa-search"></i>Search</a>
                 </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa fa-fw fa-envelope"></i>Contact Us</a>
                </li>
                <li class="nav-item">
				    <a class="nav-link" href="logout.php"><i class="fa fa-sign-out"></i>Logout</a>
				</li>
            </ul>
            <form class="nav-item" role="search">
              <a class="btn btn-outline-success" type="submit" onclick="openRightMenu()"><i class="fa fa-fw fa-user"></i>Admin-Login</a>
            </form>
            </div>
        </nav>


<div id="carouselExampleCaptions" class="carousel slide">
      <div class="carousel-inner">
         <div class="carousel-item active">
        <img src="background3.jpg" class="d-block w-100" height=350px width=400px object-fit=cover; alt="...">
        <div class="carousel-caption d-md-block">
               <h2 style="color:black;display:flex;justify-content:right;font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;text-decoration:underline;"><b>Welcome To The Online Voting System<b></h2>
               <h4 style="color:black;display:flex;justify-content:right;font-family:Times New Roman;">"Think Wisely Before Giving Your Vote"  &nbsp; &nbsp;
                "Your Vote Is Your Right"</h4>
            </div>
        </div>
    </div>
    <br><br><br><br>

        
    
    <div class="container-fluid">
    <div class="row">
        <div class="col-sm-4">
            <div class="card mb-3" style="max-width: 540px;">
            <div class="card-header" style="color:crimson;">
                <marquee>You can Vote Only Once And Only 1 Candidate</marquee>             
            </div>
            <div class="row g-0">
                <div class="col-md-4">
                <img src="Image/<?php echo $voterdata['photo']?>" class="img-fluid rounded-start" onerror="this.src = 'alternate-image.jpg';">
                </div>
                <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title" style="color:blue;text-decoration:underline;"><b>Voter Detail's :-</b></h5>
                    <p class="card-text">
                        <li>Name: <?php echo $voterdata['name'] ?></li>
                        <li>ID-No.: <?php echo $voterdata['idno'] ?></li>
                        <li>Mobile No.: <?php echo $voterdata['mobile'] ?></li>
                    </p>
                    <h5 class="card-title">Status Of Vote: <?php echo $status ?> </h5>
                </div>
                </div>
            </div>
            </div>
        </div>



        <div class="col-sm-8">
                <table class="table" id=mainsec cellspacing="15" cellpadding="15" style="text-align:center;margin:0 auto;table-layout:auto; border-spacing: 10px;">
                    <thead>
                        <tr>
                            <th scope="col">Candidate Details</th>
                            <th scope="col">Symbol</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <?php   
                            while ($row = mysqli_fetch_assoc($result)){
                            ?>
                            <td>
                                <li>Candidate Name: <?php echo $row['cname']?> </li>
                                <li>Party Name: <?php echo $row['cparty']?> </li>
                                <li>Total Votes: <?php echo $row['votes']?> </li><br>
                                <form action="vote.php" method="post">
							    	<input type="hidden" name="gvotes" value="<?php echo $row['votes'] ?>">
									<input type="hidden" name="gid" value="<?php echo $row['id'] ?>">
                                   <?php
                                        if ($_SESSION['voterdata']['status']==0) 
                                        {
                                            ?>
                                                <button type="submit" class="btn btn-danger">VOTE</button>
                                            <?php
                                        }
                                        else{
                                            ?>
                                                 <button disabled type="button" class="btn btn-danger">VOTE</button>
                                            <?php
                                        }
                                    ?>
                                </td></form>
                            <td><img src="Image/<?php echo $row['symbol']?>" width="25%" style="border-radius:100%; height=25%;"></td>
                        </tr>
                        <?php
                         }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>



<script>
            function openRightMenu() {
            document.getElementById("rightMenu").style.display = "block";
            }

            function closeRightMenu() {
            document.getElementById("rightMenu").style.display = "none";
            }
</script>
</body>
</html>


















