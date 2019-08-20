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
            <h3 class="content-header-title">VIEW UPDATE DISTRIBUTOR DETAILS</h3>
          </div>
          <div class="content-header-right col-md-8 col-12">
            <div class="breadcrumbs-top float-md-right">
              <div class="breadcrumb-wrapper mr-1">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Home</a>
                  </li>
                  <li class="breadcrumb-item"><a href="distributor.php">Distributor Users</a>
                  </li>
                  <li class="breadcrumb-item active">View / Update Distributor Details
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
					<h4 class="card-title" id="basic-layout-round-controls">Distributor Details</h4>
					<a class="heading-elements-toggle">
						<i class="ft-edit"></i>
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
                    //check and insert banner back
                    if(!empty($_FILES['side_img']['tmp_name']) && is_uploaded_file( $_FILES['side_img']['tmp_name'] )){
                        //conver file name to md5 and prepend timestamp
                        $fbasename=time().'_'.md5($_FILES["side_img"]["name"]).'.'.pathinfo($_FILES["side_img"]["name"],PATHINFO_EXTENSION);
                        $target_file = UPLOAD_IMG_PATH . $fbasename;
                        $image_temp = $_FILES['side_img']['tmp_name'];
                        $image_size_info    = getimagesize($image_temp);
                        if($image_size_info){
                            $image_width        = $image_size_info[0];
                            $image_height       = $image_size_info[1];
                            $image_type         = $image_size_info['mime'];
                        }else{
                           exit;
                        }
                        //check if image is in png format or not
                        switch($image_type){
                            case 'image/jpeg': case 'image/pjpeg':  $image_res = imagecreatefromjpeg($image_temp); break;
                            case 'image/png':  $image_res = imagecreatefrompng($image_temp); break;
                            default: $image_res = false;
                        }
                        //optimize and save
                        if($image_res != false && resize_image($image_res, $target_file, $image_type, 768, $image_width, $image_height,  $_POST['qa'], true, false)){
                            //generate query from post
                            unlink(UPLOAD_IMG_PATH . anything('distributor_user','side_img',$_REQUEST['id']));
                            mysqli_query($link,"UPDATE ".$prefix."distributor_user SET `side_img`='".$fbasename."' WHERE `id`=".$_REQUEST['id']);
                        }
                        else {
                            unlink($target_file);
                            $error='1';
                        }
                    }             
                    //generate query from post
                    $query='';
                    foreach($_POST as $key=>$value) if($key != "usubmit") if($key != "qa") if($key != "bid") $query .="`$key`='$value',";
                    $query = substr($query, 0, -1);//omit last comma

                    if(!isset($error) && mysqli_query($link,"UPDATE ".$prefix."distributor_user SET ".$query." WHERE id=".$_REQUEST['id'])) //insert all text info
                        echo '<p class="alert alert-success" id="success-alert"><i class="fa fa-check fa-fw"></i> Distributor information successfully updated.</p>';
                    else { 
                        
                        echo '<p class="alert alert-danger"><i class="fa fa-warning fa-fw"></i> Sorry! There is an error while updating  information record!</p>';   
                    }
                }

        
          
        
?>
						</div>

						<form class="form" method="post" enctype="multipart/form-data">
							<div class="form-body">
							<?php
                                $select=mysqli_query($link,"SELECT * FROM ".$prefix."distributor_user WHERE `id`=".$_REQUEST['id']);
                               $row=mysqli_fetch_object($select);
                                ?>
                   <input type="hidden" value="<?=$row->id?>" name="bid" required>  

								<div class="form-group">
									
									<label for="complaintinput1">Token No.</label>
									<input type="text" id="complaintinput1" class="form-control round" placeholder="Enter Token No." name="token" value="<?=$row->token?>" readonly>


									<input type="hidden" id="complaintinput1" class="form-control round" name="password" value="<?=$row->password?>" readonly>

									 <label for="complaintinput1">Reference No.</label>
									<input type="text" id="complaintinput1" class="form-control round" placeholder="Enter Reference No." name="reference_no" value="<?=$row->reference_no?>"> 


									<label for="complaintinput1">Name</label>
									<input type="text" id="complaintinput1" class="form-control round" placeholder="Enter Name" name="name" value="<?=$row->name?>">
									
									<label for="complaintinput1">Applicant Type</label>
									<input type="text" id="complaintinput1" class="form-control round" placeholder="Enter Name" name="type" value="<?=$row->type?>">
									 

									<label for="complaintinput1">Commencement</label>
									<input type="text" id="complaintinput1" class="form-control round" placeholder="Enter Commencement Date" name="date_start" value="<?=$row->date_start?>">
									
									<label for="complaintinput1">Email ID</label>
									<input type="text" id="complaintinput1" class="form-control round" placeholder="Enter Email ID" name="email" value="<?=$row->email?>">
									<label for="complaintinput1">Phone</label>
									<input type="text" id="complaintinput1" class="form-control round" placeholder="Enter Phone No." name="mobile" value="<?=$row->mobile?>">
									<label for="complaintinput1">Address</label>
									<input type="text" id="complaintinput1" class="form-control round" placeholder="Enter Address" name="address" value="<?=$row->address?>">
									<label for="complaintinput1">Contact Person</label>
									<input type="text" id="complaintinput1" class="form-control round" placeholder="Enter Contact Person Name" name="contact_person" value="<?=$row->contact_person?>">
									<label for="complaintinput1">Aadhar</label>
									<input type="text" id="complaintinput1" class="form-control round" placeholder="Enter Aadhar ID." name="aadhar" value="<?=$row->aadhar?>">
									<label for="complaintinput1">Pan Card No.</label>
									<input type="text" id="complaintinput1" class="form-control round" placeholder="Enter Pan Card No." name="pancard" value="<?=$row->pancard?>">

									<label for="complaintinput1">Area</label>
									<input type="text" id="complaintinput1" class="form-control round" placeholder="Enter Area" name="area" value="<?=$row->area?>">

									<label for="complaintinput1">Account No</label>
									<input type="text" id="complaintinput1" class="form-control round" placeholder="Enter Account No" name="account_no" value="<?=$row->account_no?>">

									<label for="complaintinput1">IFSC</label>
									<input type="text" id="complaintinput1" class="form-control round" placeholder="Enter IFSC" name="ifsc" value="<?=$row->ifsc?>">

									<label for="complaintinput1">Account Holder Name</label>
									<input type="text" id="complaintinput1" class="form-control round" placeholder="Enter Account Holder Name" name="ac_holder_name" value="<?=$row->ac_holder_name?>">


								<div class="card-header">
                    <label class="card-title" for="exampleInputFile">Profile Image</label>
                </div>
                <img src="<?=UPLOAD_IMG_PATH.$row->side_img?>" width="250px">
                <div class="card-block">
                    <div class="card-body">
                        <fieldset class="form-group">
                            <input type="file" class="form-control-file" id="exampleInputFile" name="side_img">
                        </fieldset>
                        <small>Resolution should be 1200px X 600px, Should not exceed 1 MB</small>
                    </div>
                </div>
						
            <div class="form-group">
                                <label class="card-title" for="exampleInputFile">Image Quality</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="qa">
                                        <?php
                                        $i=0;
                                        while($i<=100){
                                        ?>
                                        <option value="<?=$i?>" <?=$i==70? 'selected' :''?>><?=$i?> <?=$i==100?'(Original)':''?><?=$i==70?'(Good)':''?><?=$i==50?'(Average)':''?><?=$i==20?'(Low)':''?></option>
                                        <?php
                                            $i=$i+1;
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

			
									<div class="form-group">
								<label for="complaintinput5">Status</label>
								<fieldset>
							<label>Approve</label>
		                     <input type="radio" name="status"  value="1" id="radio1" <?php if($row->status=="1"){?> checked <?php }?>>
									
								</fieldset>
							<label for="complaintinput5"></label>
								<fieldset>
									<label>Pending</label>
									<input type="radio" name="status" value="0" id="radio1" <?php if($row->status=="0"){?> checked <?php } ?>>
									
								</fieldset>
			
							</div>


								</div>

								
            </div>

							<div class="form-actions">
								
							
								<button type="submit" name="usubmit" class="btn btn-primary">
									<i class="ft-user-check"></i> UPDATE
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
  </center>
</div><br><br><br><br><br><br><br><br><br><br>
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