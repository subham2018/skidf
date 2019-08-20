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
            <h3 class="content-header-title">AVAILABILITY CHECKING</h3>
          </div>
          <div class="content-header-right col-md-8 col-12">
            <div class="breadcrumbs-top float-md-right">
              <div class="breadcrumb-wrapper mr-1">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Home</a>
                  </li>
                  <li class="breadcrumb-item"><a href="guest.php">Manage Guest</a>
                  </li>
                  <li class="breadcrumb-item active">Guest Booking
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
					<h4 class="card-title" id="basic-layout-round-controls">AVAILABILITY FOR <?=anything('guest','name',$_REQUEST['guest_id'])?></h4>
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
                    
                                                      
                         $query='';
                        foreach($_POST as $key=>$value) if($key != 'submit')$query .="`$key`='$value',";
                        $query = substr($query, 0, -1);//omit last comma
            $first_name = $_POST['title'];
            $resultset_1 = mysqli_query($link,"select * from ".$prefix."category where title='".$first_name."' ") or die(mysqli_error());
                     $count = mysqli_num_rows($resultset_1);
                 if($count == 0)
                  {
                            
                        mysqli_query($link,"INSERT INTO ".$prefix."guest SET ".$query);
                            echo '<p class="alert alert-success" id="success-alert"><i class="fa fa-check fa-fw"></i> Added  successfully.</p>';
             header("Location: guest.php");
                        }else{
       echo '<p class="alert alert-danger" id="danger-alert"><i class="fa fa-times-circle fa-fw"></i>Category is Already Present</p>' ;
    }
          }
                        
?>
						</div>

						<form class="form" method="get" action="add_bookingone.php" enctype="multipart/form-data">
							<div class="form-body">
							
								<div class="form-group">
									<input type="hidden" name="guest_id" value="<?=$_REQUEST['guest_id']?>">
									<label for="complaintinput1">Check In Date</label>
									<input type="date" id="complaintinput1" class="form-control round" placeholder="Enter Category Name" name="checkin">
								</div>
								<div class="form-group">
									<label for="complaintinput1">Check Out Date</label>
									<input type="date" id="complaintinput1" class="form-control round" placeholder="Enter Category Name" name="checkout">
								</div>
							<div class="form-actions">
								
							
								<input type="submit" name="submit" class="btn btn-primary" value="Check">
									
								
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