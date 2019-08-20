<?php include "include/head.php"?>
<!doctype html>
<html lang="en">

<head>
<meta charset="utf-8"><!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge" /><![endif]-->
<title>Log In - Shreekrishna International Donate Fund</title>
<meta name="description" content=""><meta name="viewport" content="width=device-width,initial-scale=1"><!-- Place favicon.ico in the root directory -->
<link rel="apple-touch-icon" href="apple-touch-icon.png">
<link rel="icon" href="favicon.ico"><link href="https://fonts.googleapis.com/css?family=Poppins:100,300,400,700,900" rel="stylesheet"><!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800" rel="stylesheet"> -->
<link href="https://fonts.googleapis.com/css?family=Caveat" rel="stylesheet"><!-- themeforest:css --><link rel="stylesheet" href="css/vendor.min.css"><link rel="stylesheet" href="css/dashcore.min.css"><!-- endinject -->
</head>

<body><!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
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
					<img src="skidf_final.png" class="logo img-responsive mb-6 mb-md-6" style="margin-left: 120px;" alt="Logo">
					<h1 class="color-5 bold">Login</h1>
					<p class="color-2 mt-0 mb-4 mb-md-6">Don't have an account yet? <a href="index.php" class="text-warning bold">Create it here</a></p>
	<?php  if(isset($_POST['login'])){
    check_all_var();
    $password = mysqli_real_escape_string($link, $_POST['password']);
    #print_r($_POST['email']);
$result = mysqli_num_rows(mysqli_query($link,"SELECT `id` FROM ".$prefix."register WHERE `email`='".$_POST['email']."'"));
     #print_r($result);
    if(mysqli_num_rows(mysqli_query($link,"SELECT `id` FROM ".$prefix."register WHERE `email`='".$_POST['email']."'")) == 1){
        #echo "after check the email";
        $res = mysqli_fetch_object(mysqli_query($link,"SELECT * FROM ".$prefix."register WHERE `email`='".$_POST['email']."'"));

         #print_r($res);
        if(password_verify($password, $res->password)){
                 #print(" response");
                #print_r($res);
                
                $_SESSION['members_id'] = $res->id;
                $_SESSION['user_name'] = $res->name;
                 // $res1 = mysqli_fetch_object(mysqli_query($link,"SELECT * FROM ".$prefix."register_kyc WHERE `reg_id`='".$_SESSION['members_id']."'"));
   
                    if(isset($_SESSION['members_id']) && $res->status=="pending")
                    {

                     header('Location: user.php');

                    }
                    // else if(isset($_SESSION['members_id']) && $res->status=="pending" && $res1->status=="0")
                    // {

                    //  header('Location: kyc.php');

                    // }

                    // else if(isset($_SESSION['members_id']))
                    // {

                    //  header('Location: activate.php');

                    // }


                
              

            else $msg = '<i class="fa fa-warning fa-3x text-danger"></i><br><br><p>Account not verified!</p>';
        }
        else $msg = '<h6 style="color:red;"><i class="fas fa-times-circle"></i> Incorrect username or password!</h6>';
    }
    else $msg = '<i class="fa fa-close fa-3x text-danger" id="success-alert"></i><p style="color:red;">You are not registered!</p>';
} ?>

					<form class="cozy"  method="post" enctype="multipart/form-data">
						<label class="control-label bold small text-uppercase color-2">Username</label>
						<div class="form-group has-icon">
							<input type="email" name="email" class="form-control form-control-rounded" placeholder="Your registered username" required>
							 <i class="icon fas fa-user"></i>
						</div>

						<label class="control-label bold small text-uppercase color-2">Password</label>
						<div class="form-group has-icon">
							<input type="password" name="password" class="form-control form-control-rounded" placeholder="Your password" required>
							 <i class="icon fas fa-lock"></i>
						</div>

						<div class="form-group d-flex align-items-center justify-content-between">
							<a href="forgot.php" class="text-warning small">Forgot your password?</a>
							<div class="ajax-button">
								<div class="fas fa-check btn-status text-success success"></div>
								<div class="fas fa-times btn-status text-danger failed"></div>

								<button type="submit" name="login" class="btn btn-danger btn-rounded">Login <i class="fas fa-long-arrow-alt-right ml-2"></i></button>
							</div>
						</div>
					</form>

				</div>

			</div>
		</div>
	</div>
</main>

<?php include "include/footer.php"?>