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
							<a href="lawyer_dashboard.php" class="list-group-item list-group-item-action bg-light">Dashboard</a><!--lawyer dashboard page-->
							<a href="lawyer_edit_profile.php" class="list-group-item list-group-item-action bg-light">Edit Profile</a><!--lawyer_edit_profile page-->
							<a href="lawyer_booking.php" class="list-group-item list-group-item-action bg-light">Booking requests</a><!--this page-->
							<a href="update_password_admin.php" class="list-group-item list-group-item-action bg-light">Update Password</a>
						</div>
					</div>
					<!-- /#sidebar-wrapper -->
					<section class="bookingrqst">
						<div class="container">
							<div class="span7">   
								<div class="">
									
									<div class="widget-header">
										<i class="icon-th-list"></i>
										<?php if(isset($_GET['ok'])){
											echo "<div class='alert alert-success alert-dismissible fade show'>
											<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
											<strong>Sucessfully!</strong> update your Profile.
											</div>";
										}?>
									</div> <!-- /widget-header -->
									
									<div class="widget-content">
										<div class="row">
											<div class="col-md-1"></div>
											
											<?php
												$a=$_SESSION['lawyer_id'];
												$conn = connect();
												
												$result = mysqli_query($conn,"SELECT * FROM user,lawyer WHERE user.u_id=lawyer.lawyer_id AND user.status='Active' AND user.u_id='$a'");
												
												while($row = mysqli_fetch_array($result)) {
												?>
												<div class="col-md-10">
													<form  action="save_lawyer_edit_Profile.php"  method="post" enctype="multipart/form-data"  id="validateForm">
														<div class="form-row">
															<div class="form-group col-md-6">
																<label for="fname">First Name</label>
																<input type="text" class="form-control" id="first_Name" name="first_Name" value="<?php echo $row["first_Name"]; ?>">
															</div>
															<div class="form-group col-md-6">
																<label for="lname">Last Name</label>
																<input type="text" class="form-control" id="lname" name="last_Name" value="<?php echo $row["last_Name"]; ?>">
															</div>
														</div>
														
														<div class="form-group">
															<label for="num">Contact Number</label>
															<input type="text" class="form-control" name="contact_number" id="contact_number" value="<?php echo $row["contact_Number"]; ?>">
														</div>
														
														<div class="form-row"><label for="edu"><small>Put Your Last Education</small></label></div>
														<div class="form-row">
															<div class="form-group col-md-6">
																<label for="institute">University / College Name</label>
																<input type="text" class="form-control" id="institute" name="university_College" value="<?php echo $row["university_College"]; ?>">
															</div>
															<div class="form-group col-md-3">
																<label for="degree">Degree</label>
																<select id="degree" name="degree" class="form-control">
																	<option value=" " selected>Choose...</option>
																	<option value="LLB" <?php if ($row['degree']=='LLB'){echo "selected";}?>>LLB</option>
																	<option value="LLM" <?php if ($row['degree']=='LLM'){echo "selected";}?>>LLM</option>
																	
																	
																</select>
															</div>
															<div class="form-group col-md-3">
																<label for="pyear">Passing Year</label>
																<select id="passing_year" name="passing_year" class="form-control">
																	<option value=" " selected>Choose...</option>
																	<option value="2000" <?php if ($row['passing_year']=='2000'){echo "selected";}?>>2000</option>
																	<option value="2001" <?php if ($row['passing_year']=='2001'){echo "selected";}?>>2001</option>
																	<option value="2002" <?php if ($row['passing_year']=='2002'){echo "selected";}?>>2002</option>
																	<option value="2003" <?php if ($row['passing_year']=='2003'){echo "selected";}?>>2003</option>
																	<option value="2004" <?php if ($row['passing_year']=='2004'){echo "selected";}?>>2004</option>
																	<option value="2005" <?php if ($row['passing_year']=='2005'){echo "selected";}?>>2005</option>
																	<option value="2006" <?php if ($row['passing_year']=='2006'){echo "selected";}?>>2006</option>
																	<option value="2007" <?php if ($row['passing_year']=='2007'){echo "selected";}?>>2007</option>
																	<option value="2008" <?php if ($row['passing_year']=='2008'){echo "selected";}?>>2008</option>
																	<option value="2009" <?php if ($row['passing_year']=='2009'){echo "selected";}?>>2009</option>
																	<option value="2010" <?php if ($row['passing_year']=='2010'){echo "selected";}?>>2010</option>
																	<option value="2011" <?php if ($row['passing_year']=='2011'){echo "selected";}?>>2011</option>
																	<option value="2012" <?php if ($row['passing_year']=='2012'){echo "selected";}?>>2012</option>
																	<option value="2013" <?php if ($row['passing_year']=='2013'){echo "selected";}?>>2013</option>
																	<option value="2014" <?php if ($row['passing_year']=='2014'){echo "selected";}?>>2014</option>
																	<option value="2015" <?php if ($row['passing_year']=='2015'){echo "selected";}?>>2015</option>
																	<option value="2016" <?php if ($row['passing_year']=='2016'){echo "selected";}?>>2016</option>
																	<option value="2017" <?php if ($row['passing_year']=='2017'){echo "selected";}?>>2017</option>
																	<option value="2018" <?php if ($row['passing_year']=='2018'){echo "selected";}?>>2018</option>
																	<option value="2019" <?php if ($row['passing_year']=='2019'){echo "selected";}?>>2019</option>
																</select>
															</div>
														</div>
														<div class="form-row"><label for="edu"><small>Put Your chamber Location </small></label></div>
														<div class="form-row">
															<div class="form-group col-md-6">
																<label for="address">Full Address</label>
																<input type="text" class="form-control" id="address" name="full_address" value="<?php echo $row["full_address"]; ?>">
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
																<input type="text" class="form-control" id="zip" name="zip_code" value="<?php echo $row["zip_code"]; ?>">
															</div>
														</div>
														<div class="form-group">
															<label for="practise">Length of practise</label>
															<select id="practise" name="practise_Length" class="form-control">
																<option value=" " selected>Choose...</option>
																<option value="1-5 years" <?php if ($row['practise_Length']=='1-5 years'){echo "selected";}?>>1-5 years</option>
																<option value="6-10 years" <?php if ($row['practise_Length']=='6-10 years'){echo "selected";}?>>6-10 years</option>
																<option value="11-15 years" <?php if ($row['practise_Length']=='11-15 years'){echo "selected";}?>>11-15 years</option>
																<option value="16-20 years" <?php if ($row['practise_Length']=='16-20 years'){echo "selected";}?>>16-20 years</option>
																<option value="Most Senior" <?php if ($row['practise_Length']=='Most Senior'){echo "selected";}?>>Most Senior</option>
															</select>
														</div>
														<div class="form-group">
															<label for="practise">My Speciality</label>
															<select id="practise" name="speciality" class="form-control">
																<option value=" " selected>Choose...</option>
																<option value="Criminal Law" <?php if ($row['speciality']=='Criminal Law'){echo "selected";}?>>Criminal law</option>
																<option value="Civil Law" <?php if ($row['speciality']=='Civil Law'){echo "selected";}?>>Civil law</option>
																<option value="Writ Jurisdiction" <?php if ($row['speciality']=='Writ Jurisdiction'){echo "selected";}?>>Writ Jurisdiction</option>
																<option value="Company Law" <?php if ($row['speciality']=='Company Law'){echo "selected";}?>>Company law</option>
																<option value="Contract Law" <?php if ($row['speciality']=='Contract Law'){echo "selected";}?>>Contract law</option>
																<option value="Commercial Law" <?php if ($row['speciality']=='Commercial Law'){echo "selected";}?>>Commercial law</option>
																<option value="Construction Law" <?php if ($row['speciality']=='Construction Law'){echo "selected";}?>>Construction law</option>
																<option value="IT Law" <?php if ($row['speciality']=='IT Law'){echo "selected";}?>>IT law</option>
																<option value="Family Law" <?php if ($row['speciality']=='Family Law'){echo "selected";}?>>Family law</option>
																<option value="Religious Law" <?php if ($row['speciality']=='Religious Law'){echo "selected";}?>>Religious law</option>
																<option value="Investment Law" <?php if ($row['speciality']=='Investment Law'){echo "selected";}?>>Investment law</option>
																<option value="Labour Law" <?php if ($row['speciality']=='Labour Law'){echo "selected";}?>>Labour law</option>
																<option value="Property Law" <?php if ($row['speciality']=='Property Law'){echo "selected";}?>>Property law</option>
																<option value="Taxation Law"  <?php if ($row['speciality']=='Taxation Law'){echo "selected";}?>>Taxation law</option>
																
															</select>
														</div>
														<div class="form-group">
															
														</div>
														<input name="update" type="submit" class="btn btn-block btn-info" value="Update" />
														<!--after signup redirect lawyer dashboard page-->
													</form>
													
												</div>
												<?php
												}
											?>
											<div class="col-md-1"></div>
										</div>
										
										
									</div> <!-- /widget -->
								</div>
							</div>
						</section>
						
						
						
						
					</div>
					<!-- /#wrapper -->
					
					
					
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