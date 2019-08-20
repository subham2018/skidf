<?php include "include/head.php"?>
<!doctype html>
<html lang="en">
<head>
<?php include "include/header.php"?>
<title>Register - Shreekrishna International Donate Fund</title>

</head>

<body><!--[if lt IE 8]>

<![endif]-->
<main>
	<div class="container-fluid">
		<div class="row align-items-center">
			<div class="col-md-6 col-lg-7 fullscreen-md d-flex justify-content-center align-items-center overlay gradient gradient-53 alpha-7 image-background cover" style="background-image:url(https://picsum.photos/1920/1200/?random&amp;gravity=south)">
				<div class="content">
					<h6 class="display-4 text-warning  mt-4 mt-md-0">Get started with <span class="bold d-block text-warning">Shreekrishna </span> International Donate Fund </h6>
					<p class="lead color-1 alpha-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
					
				</div>
			</div>

			<div class="col-md-5 col-lg-4 mx-auto">
				<div class="login-form mt-5 mt-md-0">
					<img src="skidf_final.png" class="logo img-responsive mb-4 mb-md-6" style="margin-left: 120px;" alt="Logo">
					<h1 class="color-5 bold">Register</h1>
					<p class="color-2 mb-4 mb-md-6">Already have an account? <a href="login.php" class="text-warning bold">Login here</a></p>
					 <?php
                //banner background
                 if(isset($_POST['submit'])){
                   check_all_var(); //prevent mysql injection   

                    $password = mysqli_real_escape_string($link, $_POST['password']);
                    $pass = password_hash($password, PASSWORD_DEFAULT);

 //                      $first_name = $_POST['reference_no'];
 //    $resultset_1 = mysqli_query($link,"select * from ".$prefix."retailer_user where token='".$first_name."'") 
 //    or die(mysqli_error());
 //    $count = mysqli_num_rows($resultset_1);
 //    //echo $count;


 //    $resultset_email = mysqli_query($link,"select * from ".$prefix."register WHERE `email`='".$_POST['email']."'") or die(mysqli_error());
 //    $counte = mysqli_num_rows($resultset_email);

 //    $resultset_phone = mysqli_query($link,"select * from ".$prefix."register WHERE `phone`='".$_POST['phone']."'") or die(mysqli_error());
 //    $countp = mysqli_num_rows($resultset_phone);



 //                if($count=='0')
 //                  {
 //                     echo '<p class="alert alert-danger"><i class="fas fa-exclamation-triangle"></i> Sorry! Referal Code is Not Valid!</p>';   
 //                 } 
 //                else if($counte!='0')
 //                 {
 // echo '<p class="alert alert-danger"><i class="fas fa-exclamation-triangle"></i> Email Already Registered!</p>';   

 //                 }
 //                else if($countp!='0')
 //                 {
 //                     echo '<p class="alert alert-danger"><i class="fas fa-exclamation-triangle"></i> Phone No. Already Registered!</p>';   
 //                 }
                 
 //                 else {
                   
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
                        echo '<p class="alert alert-success" id="success-alert"><i class="fa fa-check fa-fw"></i>Registered successfully.</p>';
                        
                          
        // }
                }
             

?>
					<form method="post" class="cozy" enctype="multipart/form-data">
						<div class="form-group has-icon">
							<input type="text"  name="reference_no" class="form-control form-control-rounded" placeholder="Referral Code" required=""> 
							<i class="icon fas fa-user-plus"></i>
						</div>

						<div class="form-group has-icon">
							<input type="text"  class="form-control form-control-rounded" name="name" placeholder="Full name" required="">
							 <i class="icon fas fa-address-card"></i>
						</div>

						<div class="form-group has-icon">
							<input type="text"  class="form-control form-control-rounded" name="email"placeholder="Valid Email" required=""> 
							<i class="icon fas fa-envelope"></i>
						</div>

						<div class="form-group has-icon">
							<input type="text"  class="form-control form-control-rounded" name="phone" placeholder="Phone" required=""> 
							<i class="icon fas fa-phone"></i>
						</div>

						<div class="form-group has-icon">
							<input type="password"  class="form-control form-control-rounded" name="password" placeholder="Password" required="">
							 <i class="icon fas fa-lock"></i>
						</div>

					
						
						<div class="form-group d-flex align-items-center justify-content-between">
							
							<div class="ajax-button">
								

								<button type="submit" name="submit" class="btn btn-danger btn-rounded">Quick Register <i class="fas fa-long-arrow-alt-right ml-2"></i></button>
							</div>
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

<?php include "include/footer.php"?>