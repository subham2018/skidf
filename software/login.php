<?php include_once 'include/head.php';?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <title>SKIDF | Admin Console Software</title>
    <link rel="apple-touch-icon" href="app-assets/images/ico/apple-icon-120.png">
	<link rel="shortcut icon" type="image/x-icon" href="app-assets/images/logo/logo.png">
    <link rel="shortcut icon" type="image/x-icon" href="">
    <link href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i%7CComfortaa:300,400,700" rel="stylesheet">
    <link href="maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/forms/toggle/switchery.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/plugins/forms/switch.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/core/colors/palette-switch.min.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN CHAMELEON  CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/app.min.css">
    <!-- END CHAMELEON  CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/horizontal-menu.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/core/colors/palette-gradient.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/pages/login-register.min.css">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!-- END Custom CSS-->
  </head>
  <body class="horizontal-layout horizontal-menu 1-column  bg-full-screen-image menu-expanded blank-page blank-page" data-open="hover" data-menu="horizontal-menu" data-color="bg-gradient-x-purple-blue" data-col="1-column">
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
        </div>
        <div class="content-body"><section class="flexbox-container">
    <div class="col-12 d-flex align-items-center justify-content-center">
        <div class="col-md-4 col-10 box-shadow-2 p-0">
            <div class="card border-grey border-lighten-3 px-1 py-1 m-0">
                <div class="card-header border-0">
                    <div class="text-center mb-1">
					<h4></h4>
                            <img src="<?=UPLOAD_IMG_PATH.$site->logo;?>"  class="brand-logo" alt="Srikrishna International Donation Fund">
                    </div>
                    
                </div>
                <div class="card-content">
				<?php
							if(isset($_POST['aemail'],$_POST['apass'])){
								check_all_var();
								
						$sql="SELECT * FROM ".$prefix."admin WHERE email='".$_POST['aemail']."'";
		              
								$result=mysqli_query($link,$sql);

								$c=mysqli_num_rows($result);
                                
								$row=mysqli_fetch_object($result);
								
								if ($c == 1 && $row->status == '1' && $row->password==md5($_POST['apass']))
								{	
									$_SESSION['admin_id']=$row->id;
									$_SESSION['login_string']=hash('sha512', $row->password . $_SERVER['HTTP_USER_AGENT']);
									header("location: index.php");
								}
								elseif ($c == 1 && $row->status == '1' && $row->password!=md5($_POST['apass'])) echo '<p class="text-red"><i class="fa fa-warning fa-fw"></i> Email or Password mismatched!</p>';
								elseif($c == 1 && $row->status == '0') echo '<p class="text-red"><i class="fa fa-warning fa-fw"></i> Approval Pending!</p>';
								else echo '<p class="text-red"><i class="fa fa-warning fa-fw"></i> Email/Password Incorrect</p>';
							}

							?>
                   
                    <div class="card-body">
                        <form class="form-horizontal" method="post" action="">
                            <fieldset class="form-group position-relative has-icon-left">
                                <input type="text" class="form-control round" id="user-name" name="aemail" placeholder="Enter Your Email" required>
                                <div class="form-control-position">
                                    <i class="ft-user"></i>
                                </div>
                            </fieldset>
                            <fieldset class="form-group position-relative has-icon-left">
                                <input type="password" class="form-control round" id="user-password" name="apass"  placeholder="Enter Your Password" required>
                                <div class="form-control-position">
                                    <i class="ft-lock"></i>
                                </div>
                            </fieldset>
                            <div class="form-group row">
                                <div class="col-md-6 col-12 text-center text-sm-left">
                                   
                                </div>
                               <!-- <div class="col-md-6 col-12 float-sm-left text-center text-sm-right"><a href="#" class="card-link">Forgot Password?</a></div>-->
                            </div>  
					
					
					
                            <div class="form-group text-center">
                                <input type="submit" class="btn round btn-block btn-glow btn-bg-gradient-x-purple-blue col-12 mr-1 mb-1" value="Login">    
                            </div>
                           
                        </form>
                    </div>
                   
                    
                                        
                </div>
            </div>
        </div>
    </div>
</section>

        </div>
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

    <!-- BEGIN VENDOR JS-->
    <script src="app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
    <script src="app-assets/vendors/js/forms/toggle/switchery.min.js" type="text/javascript"></script>
    <script src="app-assets/js/scripts/forms/switch.min.js" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script type="text/javascript" src="app-assets/vendors/js/ui/jquery.sticky.js"></script>
    <script src="app-assets/vendors/js/forms/validation/jqBootstrapValidation.js" type="text/javascript"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN CHAMELEON  JS-->
    <script src="app-assets/js/core/app-menu.min.js" type="text/javascript"></script>
    <script src="app-assets/js/core/app.min.js" type="text/javascript"></script>
    <!-- END CHAMELEON  JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="app-assets/js/scripts/forms/form-login-register.min.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS-->
  </body>
</html>