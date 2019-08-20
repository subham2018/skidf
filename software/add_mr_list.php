<?php include_once 'include/head.php';?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
     <?php include_once 'include/header.php';?>
<title>MR MANAGEMENT SOFTWARE | ADMIN PANEL</title>
  </head>
<?php include_once 'include/navbar.php';?>

    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
          <div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">ADD MEDICAL REPRESENTATIVE LIST</h3>
          </div>
          <div class="content-header-right col-md-8 col-12">
            <div class="breadcrumbs-top float-md-right">
              <div class="breadcrumb-wrapper mr-1">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index-2.html">Home</a>
                  </li>
                  <li class="breadcrumb-item"><a href="#">Representative</a>
                  </li>
                  <li class="breadcrumb-item active">Medical Representative List
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
					<h4 class="card-title" id="basic-layout-round-controls">ADD MEDICAL REPRESENTATIVE LIST</h4>
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
                            
                        mysql_query("INSERT INTO ".$prefix."mr SET ".$query);
                            echo '<p class="alert alert-success" id="success-alert"><i class="fa fa-check fa-fw"></i> Added  successfully.</p>';
							header("Location: mr_list.php");
                        }
                        
?>
						</div>

						<form class="form" method="post" enctype="multipart/form-data">
							<div class="form-body">
							<input type="hidden" name="mr_pass" value="<?=mt_rand(100000, 999999);?>">

								<div class="form-group">
									<label for="complaintinput1">MR Name</label>
									<input type="text" id="complaintinput1" class="form-control round" placeholder="Enter MR Name" name="mr_name">
								</div>
								
				
                   
                        
                        <fieldset class="form-group">
						<label for="complaintinput1">Select MR Area</label>
                            <select class="form-control round" id="basicSelect" name="area_id" >
                              <option>Select Option</option>
                              <?php
								$select=mysql_query("SELECT * FROM ".$prefix."area");
								while($row=mysql_fetch_object($select)){
								 ?>
								<option value="<?=$row->id?>"><?=$row->name?></option>
								<?php } ?> 
                            </select>
                        </fieldset>
					

								<div class="form-group">
								
									<label for="complaintinput2">MR EMAIL ADDRESS</label>
									<input type="email" id="complaintinput2" class="form-control round" name="mr_email" placeholder="Enter MR Email Address">
								</div>
								<div class="form-group">
								
									<label for="complaintinput2">MR PHONE NO</label>
									<input type="number" id="complaintinput2" class="form-control round" name="mr_phone" placeholder="Enter MR Phone No">
								</div>
								
								<div class="form-group">
									<label for="complaintinput2">MR AADHAR NO</label>
									<input type="text" id="complaintinput2" class="form-control round" placeholder="Enter AADHAR No" name="mr_addhar">
								</div>
							
								<div class="form-group">
								<label for="complaintinput5">Status</label>
								<fieldset>
									<label>Yes</label>
									<input type="radio" name="status"  value="Yes" id="radio1">
									
								</fieldset>
								<label for="complaintinput5"></label>
								<fieldset>
									<label>No</label>
									<input type="radio" name="status" value="No" id="radio1" checked>
									
								</fieldset>
			
							</div>

							<div class="form-actions">
								<a href="mr_list.php" type="button" class="btn btn-danger mr-1" >
									<i class="ft-arrow-left"></i> Back
								</a>
							
								<button type="submit" name="submit" class="btn btn-primary">
									<i class="ft-user-check"></i>ADD MR
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
  </center>
</div>
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