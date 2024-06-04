<?php
	session_start();
	if($_SESSION['login']==TRUE AND $_SESSION['status']=='Active'){
		
		//session_start();
		include("db_con/dbCon.php");
		
	?>
	<!doctype html>
	<html lang="en">
		<head>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
			
			<!-- Bootstrap CSS -->
			<!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous"> -->
			<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
			<link rel="stylesheet" href="css/all.css">
			<link rel="stylesheet" href="css/simple-sidebar.css">
			<link rel="stylesheet" href="css/bootstrap.css">
			<link rel="stylesheet" href="css/style.css">
			<link rel="stylesheet" href="css/media.css">
			<title></title>
		</head>
		<body>
			<header class="customnav-bg-success">
			<a class="navbar-brand cus-a" href="index.php"><img src="images/logo.png" alt="logo" style="height:250px; width:auto;"></a>
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<nav class="navbar navbar-expand-lg ">
								<div class="collapse navbar-collapse" id="navbarSupportedContent">
									<ul class="navbar-nav ml-auto ">
										<li class="">
											<a class="nav-link cus-a" href="#">Full Name: <?php echo $_SESSION['first_Name'];?> <?php echo $_SESSION['last_Name'];?></a>
										</li>
										<li class="">
											<a class="nav-link cus-a" href="logout.php">Log Out</a>
										</li>
										
									</ul>
									
								</div>
							</nav>
						</div>
					</div>
				</div>
			</header>
			<body>
				
				<div class="d-flex" id="wrapper">
					
					<!-- Sidebar -->
					<div class="bg-light border-right" id="sidebar-wrapper">
						<div class="sidebar-heading">My Profile</div>
						<div class="list-group list-group-flush">
							<a href="user_dashboard.php" class="list-group-item list-group-item-action bg-light">Dashboard</a><!--this page-->
							<a href="user_profile.php" class="list-group-item list-group-item-action bg-light">Edit Profile</a><!--user_profile page-->
							<a href="user_booking.php" class="list-group-item list-group-item-action bg-light">My booking requests</a><!--booking page-->
							<a href="update_password.php" class="list-group-item list-group-item-action bg-light">Update Password</a>
						</div>
					</div>
					<!-- /#sidebar-wrapper -->
					
					<!-- edit profile Content -->
					<section class="editprofile">
						<?php if(isset($_GET['ok'])){
							echo "<div class='alert alert-success alert-dismissible fade show'>
							<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
							<strong>Sucessfully!</strong> update your Profile.
							</div>";
						}?>
						<?php
						$conn = connect();
							$a=$_SESSION['client_id'];
							
							
							$result = mysqli_query($conn,"SELECT * FROM user,client WHERE user.u_id=client.client_id AND user.status='Active' AND user.u_id='$a'");
							
							while($row = mysqli_fetch_array($result)) {
							?>
							<div class="container">
								<form class="cusform" action="save_user_edit_profile.php" method="post">
									<div class="form-row">
										<div class="form-group col-md-6">
											<label for="fname">First Name</label>
											<input type="text" class="form-control" name="first_Name"  id="first_Name" value="<?php echo $row["first_Name"]; ?>">
										</div>
										<div class="form-group col-md-6">
											<label for="lname">Last Name</label>
											<input type="text" class="form-control" name="last_Name"  id="last_Name" value="<?php echo $row["last_Name"]; ?>">
										</div>
									</div>
									
									<div class="form-group">
										<label for="num">Contact Number</label>
										<input type="text" class="form-control" name="contact_number" id="contact_number" value="<?php echo $row["contact_number"]; ?>">
									</div>
									
									
									<div class="form-row"><label for="edu"><small>Put Your address here </small></label></div>
									<div class="form-row">
										<div class="form-group col-md-6">
											<label for="address">Full Address</label>
											<input type="text" class="form-control" name="full_address" id="full_address" value="<?php echo $row["full_address"]; ?>">
										</div>
										<div class="form-group col-md-3">
											<label for="city">City</label>
											<select id="city" name="city" class="form-control">
												<option value=" " selected>Choose...</option>
												<option value="Amreli" <?php if ($row['city']=='Amreli'){echo "selected";}?>>Amreli</option>
												<option value="Anand" <?php if ($row['city']=='Anand'){echo "selected";}?>>Anand</option>
												<option value="Aravalli" <?php if ($row['city']=='Aravalli'){echo "selected";}?>>Aravalli</option>
												<option value="Bharuch" <?php if ($row['city']=='Bharuch'){echo "selected";}?>>Bharuch</option>
												<option value="Dahod" <?php if ($row['city']=='Dahod'){echo "selected";}?>>Dahod</option>
												<option value="Botad" <?php if ($row['city']=='Botad'){echo "selected";}?>>Botad</option>
												<option value="Devbhoomi Dwarka" <?php if ($row['city']=='Devbhoomi Dwarka'){echo "selected";}?>>Devbhoomi Dwarka</option>
												<option value="Junagadh" <?php if ($row['city']=='Junagadh'){echo "selected";}?>>Junagadh</option>
												<option value="Gir Somnath" <?php if ($row['city']=='Gir Somnath'){echo "selected";}?>>Gir Somnath</option>
												<option value="Kheda" <?php if ($row['city']=='Kheda'){echo "selected";}?>>Kheda</option>
												<option value="Narmada" <?php if ($row['city']=='Narmada'){echo "selected";}?>>Narmada</option>
												<option value="Mehsana" <?php if ($row['city']=='Mehsana'){echo "selected";}?>>Mehsana</option>
												<option value="Panchmahal" <?php if ($row['city']=='Panchmahal'){echo "selected";}?>>Panchmahal</option>
												<option value="Sabarkantha" <?php if ($row['city']=='Sabarkantha'){echo "selected";}?>>Sabarkantha</option>
												<option value="Porbandar" <?php if ($row['city']=='Porbandar'){echo "selected";}?>>Porbandar</option>
												<option value="Surendranagar" <?php if ($row['city']=='Surendranagar'){echo "selected";}?>>Surendranagar</option>
												<option value="Ahmedabad" <?php if ($row['city']=='Ahmedabad'){echo "selected";}?>>Ahmedabad</option>
												<option value="Vadodara" <?php if ($row['city']=='Vadodara'){echo "selected";}?>>Vadodara</option>
												<option value="Chhota Udaipur" <?php if ($row['city']=='Chhota Udaipur'){echo "selected";}?>>Chhota Udaipur</option>
												<option value="Banaskantha" <?php if ($row['city']=='Banaskantha'){echo "selected";}?>>Banaskantha</option>
												<option value="Gandhinagar" <?php if ($row['city']=='Gandhinagar'){echo "selected";}?>>Gandhinagar</option>
												<option value="Bhavnagar" <?php if ($row['city']=='Bhavnagar'){echo "selected";}?>>Bhavnagar</option>
												<option value="Dang" <?php if ($row['city']=='Dang'){echo "selected";}?>>Dang</option>
												<option value="Kutch" <?php if ($row['city']=='Kutch'){echo "selected";}?>>Kutch</option>
												<option value="Jamnagar" <?php if ($row['city']=='Jamnagar'){echo "selected";}?>>Jamnagar</option>
												<option value="Morbi" <?php if ($row['city']=='Morbi'){echo "selected";}?>>Morbi</option>
												<option value="Mahisagar" <?php if ($row['city']=='Mahisagar'){echo "selected";}?>>Mahisagar</option>
												<option value="Patan" <?php if ($row['city']=='Patan'){echo "selected";}?>>Patan</option>
												<option value="Navsari" <?php if ($row['city']=='Navsari'){echo "selected";}?>>Navsari</option>
												<option value="Surat" <?php if ($row['city']=='Surat'){echo "selected";}?>>Surat</option>
												<option value="Tapi" <?php if ($row['city']=='Tapi'){echo "selected";}?>>Tapi</option>
												<option value="Rajkot" <?php if ($row['city']=='Rajkot'){echo "selected";}?>>Rajkot</option>
												<option value="Valsad" <?php if ($row['city']=='Valsad'){echo "selected";}?>>Valsad</option>
												<option value="Barishal" <?php if ($row['city']=='Barishal'){echo "selected";}?>>Barishal</option>
												<option value="Khulna" <?php if ($row['city']=='Khulna'){echo "selected";}?>>Khulna</option>

											</select>
										</div>
										<div class="form-group col-md-3">
											<label for="zip">Zip code</label>
											<input type="text" class="form-control" name="zip_code" id="zip_code" value="<?php echo $row["zip_code"]; ?>">
										</div>
									</div>
									<button type="submit" class="btn btn-info">Update</button>
									
								</form>
							</div>
							<?php
							}
						?>
					</section>
					<!-- edit profile Content -->
					
					
					
				</div>
				
				
				</body>
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
	<?php
		
	}else 
	header('location:login.php?deactivate');
?>