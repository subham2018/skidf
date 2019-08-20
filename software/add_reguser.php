<?php include_once 'include/head.php';?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
     <?php include_once 'include/header.php';?>
<title><?=$site->site_title?> | User Registration</title>
<script src="https://cdn.ckeditor.com/ckeditor5/10.1.0/classic/ckeditor.js"></script>
 

  </head>
<?php include_once 'include/navbar.php';?>

    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
          <div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">Add Users </h3>
          </div>
          <div class="content-header-right col-md-8 col-12">
            <div class="breadcrumbs-top float-md-right">
              <div class="breadcrumb-wrapper mr-1">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Home</a>
                  </li>
                  <li class="breadcrumb-item"><a href="reguser.php"> Users</a>
                  </li>
                  <li class="breadcrumb-item active"><a href="#"> Add Users</a>
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
					<h4 class="card-title" id="basic-layout-round-controls">Registration Form</h4>
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
                            $query='';
                            foreach($_POST as $key=>$value) if($key != "submit")if($key != "qa") $query .="`$key`='$value',";
                            $query .= "`side_img`='".$fbasename."'";

                             $reference = $_POST['reference_no'];
            $resultset_1 = mysqli_query($link,"select * from ".$prefix."register where phone='".$reference."' ") or die(mysqli_error());
                     $count = mysqli_num_rows($resultset_1);
                 if($count == 1)
                  {
                        mysqli_query($link,"INSERT INTO ".$prefix."register SET ".$query);
                          $last_id=mysqli_insert_id($link);
        
      mysqli_query($link,"INSERT `".$prefix."register_kyc` SET `pancard`='', `reg_id`='".$last_id."',`pan_img`='',`address_type`='',`address_img`='',`status`='0'");

                            echo '<p class="alert alert-success" id="success-alert"><i class="fa fa-check fa-fw"></i> User created successfully.</p>';

       $to = $_POST['email'];
                     $to1 = $site->site_owner_email;
                    $subject = "User Registration Confirmation";
                    
                    
                    $headers = 'From: noreply@skidfoundation.com' . "\r\n";
                    $headers.= 'MIME-Version: 1.0' . "\r\n";
                    $headers.= 'Content-type: text/html;charset=UTF-8' . "\r\n";
                    $message="Registration Confirmation with below details,<br> ";
                    $message.="Subject: ".$_POST['subject']."<br>";
                    $message.="Name: ".$_POST['name']."<br>";
                    $message.="Email: ".$_POST['email']."<br>";
                     $message.="Phone: ".$_POST['mobile']."<br>";
                      
                       $message.="This is an autogenerated email, please do not reply to this email. Your Password is: testing";
                    mail($to, $subject, $message, $headers);
                     mail($to1, $subject, $message, $headers);




                  }else{
                          echo '<p class="alert alert-danger" id="danger-alert"><i class="fa fa-times-circle fa-fw"></i>Reference No. is Invalid!</p>' ;
                        }
                     }}}
                        
?>
						</div>

						<form class="form" method="post" enctype="multipart/form-data">
							<div class="form-body">
							
                           
                <div class="form-group">
                  <label for="complaintinput1">Reference No (Your Referral Person Phone No)</label>
                  <input type="text" id="complaintinput1" class="form-control round" placeholder="Enter User Reference No" name="reference_no" required="">
                </div>
                

								<div class="form-group">
									<label for="complaintinput1">Applicant's Name</label>
									<input type="text" id="complaintinput1" class="form-control round" placeholder="Enter User's Name" name="name" required="">
								</div>

                   <fieldset class="form-group">
                        <label for="complaintinput1"> Gender</label>
                            <select class="form-control round selectpicker"  name="gender">
                              <option>-------Select Gender-------</option>
                             
                              
                                <option value="MALE">MALE</option>
                                 <option value="FEMALE">FEMALE</option>
                                  <option value="OTHERS">OTHERS</option>
                              
                                
                            </select>
                        </fieldset>   
							
								<div class="form-group">
									<label for="complaintinput1">DOB</label>
									<input type="date" id="complaintinput2" class="form-control round" name="dob" placeholder="Enter Date of Birth" required="">
								</div>
								<div class="form-group">
									<label for="complaintinput2">Email</label>
									<input type="email" id="complaintinput2" class="form-control round" name="email" placeholder="Enter E-Mail Address">
								</div>
								<div class="form-group">
									<label for="complaintinput2">Phone</label>
									<input type="text" id="complaintinput2" class="form-control round" placeholder="Enter Phone No" name="phone">
								</div>
								<div class="form-group">
									<label for="complaintinput2">Address</label>
									<input type="text" id="complaintinput2" class="form-control round" placeholder="Enter Address" name="address">
								</div>
                  <div class="form-group">
                  <label for="complaintinput2">Pincode</label>
                  <input type="number" id="complaintinput2" class="form-control round" placeholder="Enter Pincode" name="pincode" maxlength="6">
                </div>
                <div class="form-group">
                <label for="complaintinput2">State </label>
                <input type="text" id="complaintinput2" class="form-control round" placeholder="Enter State" name="state">
               </div>
               <div class="form-group">
                <label for="complaintinput2">Area</label>
                <input type="text" id="complaintinput2" class="form-control round" placeholder="Enter Area" name="area">
               </div>
                                
                <input type="hidden" id="complaintinput2" name="password" value="<?=md5('skidf2019')?>">
                 <input type="hidden" id="complaintinput2" name="status" value="approve">
                  <input type="hidden" id="complaintinput2" name="fhash" value="">
               
                 <div class="form-group">
                                    <label for="complaintinput2">Profession</label>
                                    <input type="text" id="complaintinput2" class="form-control round" placeholder="Enter your profession" name="profession" required="">
                 </div>
                  <div class="form-group">
                      <label for="complaintinput2">Salary/Year</label>
                      <input type="number" id="complaintinput2" class="form-control round" placeholder="Enter Salary per year" name="salary" required="">
                  </div>
								
				                  <div class="form-group">
                                    <label for="complaintinput2">Academic Qualification</label>
                                    <input type="text" id="complaintinput2" class="form-control round" placeholder="Enter Academic Qualification" name="academic" required="">
                          </div>

                         
							
								<h4>Upload Your Profile Picture</h4>
                <div class="card-block">
                    <div class="card-body">
                        <fieldset class="form-group">
                            <input type="file" class="form-control-file" id="exampleInputFile" name="side_img">
                        </fieldset>
                        
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

							<div class="form-actions">
								<a href="reguser.php" type="button" class="btn btn-danger mr-1" >
									<i class="ft-arrow-left"></i> Back
								</a>
							
								<button type="submit" name="submit" class="btn btn-primary">
									<i class="ft-user-check"></i> SUBMIT
								</button>
							</div>
						</div>
						</form>
					</div>
				</div>
			</div>
		</div>
  </center>
</div>
</div>
</div>

<style>
label
{
  float: left;
  width: 16em;
  margin-right: 1em;
}
#radio1
{
	float: left;
	margin-top: 5px;
	
}	
</style>


    <?php include_once 'include/footer.php';?>
    <script>
            ClassicEditor
                .create( document.querySelector( '#editor' ) )
                .then( editor => {
                    console.log( editor );
                } )
                .catch( error => {
                    console.error( error );
                } );
        </script>
        <script type="text/javascript">
        	$(function() {
  $('.selectpicker').selectpicker();
});
        </script>
         <script type="text/javascript">
$("#success-alert").fadeTo(3000, 500).slideUp(500, function(){
    $("#success-alert").slideUp(500);
});
</script>
 