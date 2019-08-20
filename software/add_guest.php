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
            <h3 class="content-header-title">ADD GUEST</h3>
          </div>
          <div class="content-header-right col-md-8 col-12">
            <div class="breadcrumbs-top float-md-right">
              <div class="breadcrumb-wrapper mr-1">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Home</a>
                  </li>
                  <li class="breadcrumb-item"><a href="category.php">Manage Guest</a>
                  </li>
                  <li class="breadcrumb-item active">Add Guest
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
					<h4 class="card-title" id="basic-layout-round-controls">ADD GUEST DETAILS</h4>
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

						<form class="form" method="post" enctype="multipart/form-data">
							<div class="form-body">
							<input type="hidden" name="registration_type" value="Offline">
								<div class="form-group">
									<label for="complaintinput1">Name</label>
									<input type="text" id="complaintinput1" class="form-control round" placeholder="Enter Guest Name" name="name" required="">
								</div>
								<div class="form-group">
									<label for="complaintinput1">Email ID</label>
									<input type="email" id="complaintinput1" class="form-control round" placeholder="Enter email ID" name="email">
								</div>
								<div class="form-group">
									<label for="complaintinput1">Phone</label>
									<input type="number" id="complaintinput1" class="form-control round" placeholder="Enter Phone No" name="phone" required="">
								</div>
							<div class="form-actions">
								<a href="guest.php" type="button" class="btn btn-danger mr-1" >
									<i class="ft-arrow-left"></i> Back
								</a>
							
								<button type="submit" name="submit" class="btn btn-primary">
									<i class="ft-user-check"></i> Save
								</button>
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