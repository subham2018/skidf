<?php include_once 'include/head.php';?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
     <?php include_once 'include/header.php';?>
<title><?=$site->site_title?> | ADMIN PANEL</title>
  </head>
<?php include_once 'include/navbar.php';?>

    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
          <div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">SERVICE ADDON UPDATE</h3>
          </div>
          <div class="content-header-right col-md-8 col-12">
            <div class="breadcrumbs-top float-md-right">
              <div class="breadcrumb-wrapper mr-1">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Home</a>
                  </li>
                  <li class="breadcrumb-item"><a href="bookings.php?guest_id=<?=$_REQUEST['guest_id']?>">Manage Walkin Bookings</a>
                  </li>
                  <li class="breadcrumb-item active">Update Service Addon
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body">
 <center>
<div class="col-md-6">
			<div class="card">
				<div class="card-header">
					
					<a class="heading-elements-toggle">
						<i class="la la-ellipsis-v font-medium-3"></i>
					</a>
					<div class="heading-elements">
						<ul class="list-inline mb-0">
							<li>
								<a data-action="collapse">
									<i class="ft-minus"></i>
								</a>
							</li>
							<li>
								<a data-action="reload">
									<i class="ft-rotate-cw"></i>
								</a>
							</li>
							<li>
								<a data-action="expand">
									<i class="ft-maximize"></i>
								</a>
							</li>
							<li>
								<a data-action="close">
									<i class="ft-x"></i>
								</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="card-content collapse show">
					<div class="card-body">

						<div class="card-text">
					<?php
                    if(isset($_POST['submit'])){
                    check_all_var(); //prevent mysql injection      

                   


                    // RESERVATION DIRECT
                 
                    mysqli_query($link,"UPDATE `soinit_booking` SET `service_addon`='".$_POST['service_addon']."', `service_price`='".$_POST['service_price']."' WHERE `id`='".$_REQUEST['id']."'");
                   


 
                   
                        echo '<p class="alert alert-success" id="success-alert"><i class="fa fa-check fa-fw"></i> Updated successfully.</p>';
       header("Location: bookings.php?guest_id=".$_REQUEST['guest_id']);
          }

          $selectservice1=mysqli_query($link,"SELECT `service_addon`, `service_price` FROM `soinit_booking` WHERE `id`='".$_REQUEST['id']."'");
          $fetchservice1=mysqli_fetch_object($selectservice1);

          //echo $_REQUEST['id'];
          
        
?>
						</div>

						<form class="form" method="post" enctype="multipart/form-data">
							<div class="form-body">
							
								<div class="form-group">
									
								<div class="form-group">
									<label for="complaintinput1">Service Add Ons*</label>
									<textarea  class="form-control round" name="service_addon" required="">
										<?=$fetchservice1->service_addon?></textarea>
								</div>
								<div class="form-group">
									<label for="complaintinput1">Service Add on Price*</label>
									INR <input type="number" id="complaintinput1" class="form-control round" placeholder="Enter Service Addon Price" value="<?=$fetchservice1->service_price?>" name="service_price" required="">
								</div>

								
							<div class="form-actions">
								
							
							<input type="submit" name="submit" class="btn btn-primary" value="submit">
									
								
							</div>
						</form>
					
				
			
		
  </center>
</div><br><br><br><br><br><br>
<style>
label
{
  float: left;
  width: 10em;
  margin-right: 1em;
}
#radio1
{
	float: left;
	margin-top: 5px;
	
}	
</style>
    <?php include_once 'include/footer.php';?>