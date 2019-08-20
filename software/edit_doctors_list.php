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
            <h3 class="content-header-title">EDIT DOCTOR LIST</h3>
          </div>
          <div class="content-header-right col-md-8 col-12">
            <div class="breadcrumbs-top float-md-right">
              <div class="breadcrumb-wrapper mr-1">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index-2.html">Home</a>
                  </li>
                  <li class="breadcrumb-item"><a href="#">Doctor</a>
                  </li>
                  <li class="breadcrumb-item active">Edit Doctor List
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
					<h4 class="card-title" id="basic-layout-round-controls">EDIT DOCTOR LIST</h4>
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
                    if(isset($_POST['usubmit'])){
                    check_all_var(); //prevent mysql injection              
                   
                    $query='';
                    foreach($_POST as $key=>$value) if($key != 'usubmit')if($key != "bid")$query .="`$key`='$value',";
                    $query = substr($query, 0, -1);//omit last comma

                     mysql_query("UPDATE ".$prefix."doctors SET ".$query." WHERE id=".$_POST['bid']);//insert all text info
                        echo '<p class="alert alert-success" id="success-alert"><i class="fa fa-check fa-fw"></i> Update successfully.</p>';
                    header("Location: doctors_list.php");
					}
					
				
?>
						</div>

						<form class="form" method="post" enctype="multipart/form-data">
						<?php
                                $select=mysql_query("SELECT * FROM ".$prefix."doctors WHERE `id`=".$_REQUEST['doctor_id']);
                               $row=mysql_fetch_object($select);
                                ?>
                        <input type="hidden" value="<?=$row->id?>" name="bid" required>
							<div class="form-body">

								<div class="form-group">
									<label for="complaintinput1">Doctor Name</label>
									<input type="text" id="complaintinput1" class="form-control round" placeholder="Enter Doctor Name" name="doctor_name" value="<?=$row->doctor_name?>">
								</div>
								
				
                   
                        
                        <fieldset class="form-group">
						<label for="complaintinput1">Select Doctor Area</label>
                            <select class="form-control round" id="basicSelect" name="area_id" >
                             <?php
                        $select1=mysql_query("SELECT * FROM ".$prefix."area");
                         while($row1=mysql_fetch_object($select1)){
                         ?>
						<option value="<?=$row1->id?>" 
						 <?php if ($row1->id==$row->id) { ?>
						
						selected
						 <?php } ?>
						
						>
						<?=anything('area','name',$row1->id)?> </option>
                       <?php } ?>
                            </select>
                        </fieldset>
					

								<div class="form-group">
									<label for="complaintinput2">Chamber Address</label>
									<input type="text" id="complaintinput2" class="form-control round" name="doctor_chamber_address" placeholder="Enter Doctor Chamber Address" value="<?=$row->doctor_chamber_address?>">
								</div>
								<div class="form-group">
									<label for="complaintinput2">Doctor Degree</label>
									<input type="text" id="complaintinput2" class="form-control round" placeholder="Enter Doctor Degree" name="doctor_degree" value="<?=$row->doctor_degree?>">
								</div>
								<div class="form-group">
									<label for="complaintinput2">Doctor Specialization</label>
									<input type="text" id="complaintinput2" class="form-control round" placeholder="Enter Doctor Degree" name="doctor_specl" value="<?=$row->doctor_specl?>">
								</div>
							
								<div class="form-group">
								<label for="complaintinput5">Status</label>
								<fieldset>
									<label>Yes</label>
									<input type="radio" name="status"  value="Yes" id="radio1" <?php if($row->status=='Yes') { ?> checked <?php } ?> >
									
								</fieldset>
								<label for="complaintinput5"></label>
								<fieldset>
									<label>No</label>
									<input type="radio" name="status" value="No" id="radio1" <?php if($row->status=='No') { ?> checked <?php } ?>>
									
								</fieldset>
			
							</div>

							<div class="form-actions">
								<a href="doctors_list.php" type="button" class="btn btn-danger mr-1" >
									<i class="ft-arrow-left"></i> Back
								</a>
							
								<button type="submit" name="usubmit" class="btn btn-primary">
									<i class="ft-user-check"></i>UPDATE DOCTOR
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