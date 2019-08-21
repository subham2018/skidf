<!doctype html><html lang="en">

<head>
<meta charset="utf-8">
<title>Register - Shreekrishna International Donate Fund</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width,initial-scale=1"><!-- Place favicon.ico in the root directory -->
<link rel="apple-touch-icon" href="apple-touch-icon.png">
<link rel="icon" href="favicon.ico">
<link href="https://fonts.googleapis.com/css?family=Poppins:100,300,400,700,900" rel="stylesheet"><!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800" rel="stylesheet"> -->
<link href="https://fonts.googleapis.com/css?family=Caveat" rel="stylesheet"><!-- themeforest:css -->
<link rel="stylesheet" href="css/vendor.min.css">
<link rel="stylesheet" href="css/dashcore.min.css"><!-- endinject -->
</head>

<body><!--[if lt IE 8]>

<![endif]-->
<main>
	<div class="container-fluid">
		<div class="row align-items-center">
			<div class="col-md-6 col-lg-7 fullscreen-md d-flex justify-content-center align-items-center overlay gradient gradient-53 alpha-7 image-background cover" style="background-image:url(https://picsum.photos/1920/1200/?random&amp;gravity=south)">
				<div class="content">
					<h2 class="display-4 display-md-3 color-1 mt-4 mt-md-0">Get started with <span class="bold d-block">Dashcore</span></h2>
					<p class="lead color-1 alpha-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
					<hr class="mt-md-6 w-25">
					<div class="d-flex flex-column">
						<p class="small bold color-1">Or sign up with</p>
						<nav class="nav mb-4">
							<a class="btn btn-rounded btn-outline-2 brand-facebook mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
							 <a class="btn btn-rounded btn-outline-2 brand-twitter mr-2" href="#"><i class="fab fa-twitter"></i></a>
							  <a class="btn btn-rounded btn-outline-2 brand-linkedin" href="#"><i class="fab fa-linkedin-in"></i></a>
						</nav>
					</div>
				</div>
			</div>

			<div class="col-md-5 col-lg-4 mx-auto">
				<div class="login-form mt-5 mt-md-0">
					<img src="img/logo.png" class="logo img-responsive mb-4 mb-md-6" alt="">
					 <?php
                //banner background
                 if(isset($_POST['submit'])){
                   check_all_var(); //prevent mysql injection   

                    $password = mysqli_real_escape_string($link, $_POST['password']);
                    $pass = password_hash($password, PASSWORD_DEFAULT);

                      $first_name = $_POST['reference_no'];
    $resultset_1 = mysqli_query($link,"select * from ".$prefix."retailer_user where token='".$first_name."'") 
    or die(mysqli_error());
    $count = mysqli_num_rows($resultset_1);
    //echo $count;


    $resultset_email = mysqli_query($link,"select * from ".$prefix."register WHERE `email`='".$_POST['email']."'") or die(mysqli_error());
    $counte = mysqli_num_rows($resultset_email);

    $resultset_phone = mysqli_query($link,"select * from ".$prefix."register WHERE `phone`='".$_POST['phone']."'") or die(mysqli_error());
    $countp = mysqli_num_rows($resultset_phone);



                if($count=='0')
                  {
                     echo '<p class="alert alert-danger"><i class="fas fa-exclamation-triangle"></i> Sorry! Referal Code is Not Valid!</p>';   
                 } 
                else if($counte!='0')
                 {
 echo '<p class="alert alert-danger"><i class="fas fa-exclamation-triangle"></i> Email Already Registered!</p>';   

                 }
                else if($countp!='0')
                 {
                     echo '<p class="alert alert-danger"><i class="fas fa-exclamation-triangle"></i> Phone No. Already Registered!</p>';   
                 }
                 
                 else {
                   
                 $otprand=mt_rand(1111,9999);
     mysqli_query($link,"INSERT `".$prefix."otp` SET `side_img`='', `gender`='', 
     `reference_no`='".$_POST['reference_no']."',`name`='".$_POST['name']."', `dob`='', `pincode`='', `email`='".$_POST['email']."', `area`='', 
     `phone`='".$_POST['phone']."', `profession`='', `password`='".$pass."', `salary`='', 
     `state`='', `academic`='', `status`='pending',`fhash`='',`address`='',otp='".$otprand."'");

       // $last_id=mysqli_insert_id($link);
        
     // mysqli_query($link,"INSERT `".$prefix."register_kyc` SET `pancard`='', `reg_id`='".$last_id."',`pan_img`='',`address_type`='',`address_img`='',`status`='0'");

     // mysqli_query($link,"INSERT `".$prefix."register_bank` SET `account_holder`='', `reg_id`='".$last_id."',`account_no`='',`ifsc`='',`account_type`='',`bank_name`='',`branch_name`=''");

        header("Location: user_otp.php?pid=".$_POST['phone']);
                      // $query='';
                      //   foreach($_POST as $key=>$value) if($key != 'submit')$query .="`$key`='$value',";
                      //   $query = substr($query, 0, -1);//omit last comma
                            
                      //   mysqli_query($link,"INSERT INTO ".$prefix."user SET ".$query);
                        // echo '<p class="alert alert-success" id="success-alert"><i class="fa fa-check fa-fw"></i>Registered successfully.</p>';
                        
                          
        }
                }
             

?>
					<h1 class="color-5 bold">Register</h1>
					<p class="color-2 mb-4 mb-md-6">Already have an account? <a href="login.html" class="accent bold">Login here</a></p>
					<form class="cozy" action="#" data-validate-on="submit" novalidate>
						<div class="form-group has-icon">
							<input type="text" id="register_username" class="form-control form-control-rounded" placeholder="Desired username"> 
							<i class="icon fas fa-user-plus"></i>
						</div>

						<div class="form-group has-icon">
							<input type="text" id="register_fullname" class="form-control form-control-rounded" placeholder="Full name">
							 <i class="icon fas fa-address-card"></i>
						</div>

						<div class="form-group has-icon">
							<input type="text" id="register_email" class="form-control form-control-rounded" placeholder="Valid email"> 
							<i class="icon fas fa-envelope"></i>
						</div>

						<div class="form-group has-icon">
							<input type="password" id="register_password" class="form-control form-control-rounded" placeholder="Password">
							 <i class="icon fas fa-lock"></i>
						</div>
						
						<div class="form-group d-flex align-items-center justify-content-between">
							<button type="submit" class="btn btn-accent btn-rounded ml-auto">Register 
								<i class="fas fa-long-arrow-alt-right ml-2"></i>
							</button>
						</div>
					</form>

					<div class="mt-5">
						<p class="small color-2">By signing up, I agree to the <a href="terms.html">Terms of Service</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>

<script src="js/lib.min.js"></script>
<script src="js/dashcore.min.js"></script>
</body>
</html>