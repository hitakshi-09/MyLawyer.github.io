<?php
	session_start();
	
	include("db_con/dbCon.php");
	
?>
<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<!-- Bootstrap CSS -->
		<!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous"> -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
		<link rel="stylesheet" href="css/all.css">
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/media.css">
		<title></title>
	</head>
	<body>
		<header class="customnav-bg-success" style="background-color:#DDCCC2; text-align:center;" >
		<a class="navbar-brand cus-a" href="index.php"><img src="images/logo.png" alt="logo" style="height:250px; width:auto;"></a>
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<nav class="navbar navbar-expand-lg " >
							<!-- <a class="navbar-brand cus-a" href="index.php">MyLawyer</a> -->
							<div class="collapse navbar-collapse" id="navbarSupportedContent">
								<ul class="navbar-nav ml-auto">
									<li class="active">
										<a class="nav-link cus-a" href="index.php">Home <span class="sr-only">(current)</span></a>
									</li>
									<li class="">
										<a class="nav-link cus-a" href="lawyers.php">Lawyers</a><!--lawyers.html page-->
									</li>
									<li class="">
										<a class="nav-link cus-a" href="#aboutus">About Us</a>
									</li>
									<?php if(isset($_SESSION['login']) && $_SESSION['login'] == TRUE){ ?>
										<li class="">
											<a class="nav-link cus-a" href="user_dashboard.php">Dashboard</a>
										</li>
										<li class="">
											<a class="nav-link cus-a" href="logout.php">Logout</a>
										</li>
										<?php }else{ ?>
										<li class="">
											<a class="nav-link cus-a" href="login.php">Login</a>
										</li>
										<li class="nav-item dropdown" >
											<a class="nav-link dropdown-toggle cus-a" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
												Register
											</a>
											<div class="dropdown-menu" aria-labelledby="navbarDropdown" >
												<a class="dropdown-item" href="lawyer_register.php">Register as a lawyer</a><!--redirect lawyer register page-->
												<a class="dropdown-item" href="user_register.php">Register as a user</a><!--redirect user register page-->
											</div>
										</li>
									<?php }?>
								</ul>
							</div>
						</nav>
					</div>
				</div>
			</div>
		</header>
		<section>
			<div class="banner">
				<div class="container">
					<div class="row">
					<img src="images/bg1.jpg" class="background-image" id="zoomImage">
					<img src="images/BG.jpeg" class="semi-circle">
						<div class="col-md">
							<div class="banner_content">
								<h1>Connecting Clients <br>with Lawyers</h1>
								<h5 style="padding-top:15px; font-weight:lighter">Gain Practice Experience</h5>
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</section>
		<script>
            const image = document.getElementById("zoomImage");

            window.addEventListener("scroll", function() {
                let scrollValue = window.scrollY;
                let scaleValue = 1 + scrollValue * 0.0005; 

                image.style.transform = `scale(${scaleValue})`;
            });
        </script>
		<section class="lawyerscard">
			<div class="container">
				<h2>Find a Lawyer</h2>
				<div class="row">
					
					<?php
						include_once 'db_con/dbCon.php';
						$conn = connect();
						
						$result = mysqli_query($conn,"SELECT * FROM user,lawyer WHERE user.u_id=lawyer.lawyer_id AND user.status='Active' LIMIT 6");
						
						while($row = mysqli_fetch_array($result)) {
						?>
						<div class="col-md-4">
							<div class="card" style="width: 18rem; margin:10px;">
								<img src="images/upload/<?php echo $row["image"]; ?>" class="card-img-top cusimg img-fluid" alt="img">
								<div class="card-body">
									<h5 class="card-title"><?php echo $row["first_Name"]; ?> <?php echo $row["last_Name"]; ?></h5> <!--lawyers name dynamic-->
									<h6 class="card-title"><?php echo $row["speciality"]; ?></h6> <!--lawyers practice speciality dynamic-->
									<h6 class="card-title"><span><?php echo $row["practise_Length"]; ?></span></h6> <!--lawyers practice time dynamic-->
									
									<a class="btn btn-sm btn-info" href="single_lawyer.php?u_id=<?php echo $row["u_id"]; ?>"><i class="fa fa-street-view"></i>&nbsp; View Full Profile</a>
								</div>
							</div>
						</div>
						<?php
						}
					?>
				</div>
			</div>
		</section>
		<section class="aboutus" id="aboutus" style="padding: 25px;">
			<div class="container">
			<div class="about-images">
						<img src="images/photo1.png" alt="Photo 1" class="photo1" style="height:330px;  width: auto; "> 
						<img src="images/photo2.jpg" alt="Photo 2" class="photo2" style="height: 280px;  width: auto;">
            		</div>
				<div class="row" style="width:50%;">
					<h2>About Us</h2>
					<p>Welcome to MyLawyer, your one-stop solution for connecting clients with lawyers. Our platform aims to simplify the process of finding legal assistance and gaining practice experience for aspiring law students.</p>
					<p>With a user-friendly interface and a comprehensive database of lawyers and legal services, MyLawyer ensures seamless interaction between clients, lawyers, and students.</p>
					
				</div>
			</div>
		</section>
		<footer class="bg" >
			<div class="container">
				<div class="row">
					<div class="col">
						<h5>All rights reserved 2024</h5>
					</div>
				</div>
			</div>
		</footer>
		<!-- Optional JavaScript -->
		<!-- jQuery -->
		
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
	</body>
</html>
