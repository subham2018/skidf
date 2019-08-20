<?php include_once 'include/head.php';?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
     <?php include_once 'include/header.php';?>
<title><?=$site->site_title?> | ADMIN PANEL | RETAILER REGISTRATION</title>
<script src="https://cdn.ckeditor.com/ckeditor5/10.1.0/classic/ckeditor.js"></script>
 
<script type="text/javascript">
   function myfun(){
  
   if( document.forms.type.value == "-1" ){
          
  document.getElementById("message").innerHTML="<span style='color:red;'>**Please Select Any One </span>  ";
  document.forms.type.focus();
  return false;
}
  var b = document.forms.email.value;
    if (b.indexOf('@')<=0) {
        document.getElementById("Message1").innerHTML="<span style='color: red;'>  **Invalid @ Position </span>";
        document.forms.email.focus();
        return false;
    }
    if (b.charAt(b.length-4)!='.') {
        document.getElementById("Message1").innerHTML="<span style='color:red;'>  ** Invalid . Position </span>";
        document.forms.email.focus();
        return false;
    }
}

</script>
  </head>
<?php include_once 'include/navbar.php';?>

    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
          <div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">ADD RETAILERS </h3>
          </div>
          <div class="content-header-right col-md-8 col-12">
            <div class="breadcrumbs-top float-md-right">
              <div class="breadcrumb-wrapper mr-1">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Home</a>
                  </li>
                  <li class="breadcrumb-item"><a href="#">Retailer Users</a>
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
					<h4 class="card-title" id="basic-layout-round-controls">Retailer Registration Form</h4>
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
                             $first_name = $_POST['reference_no'];
            $resultset_1 = mysqli_query($link,"select * from ".$prefix."distributor_user where token='".$first_name."' ") or die(mysqli_error());
                     $count = mysqli_num_rows($resultset_1);
                 if($count == 1)
                  {
                        mysqli_query($link,"INSERT INTO ".$prefix."retailer_user SET ".$query);
                            echo '<p class="alert alert-success" id="success-alert"><i class="fa fa-check fa-fw"></i> Added  successfully.</p>';

        // $to = $_POST['email'];
        //              $to1 = $site->site_owner_email;
        //             $subject = "Retailer Registration Confirmation";
                    
                    
        //             $headers = 'From: noreply@loanplus.in' . "\r\n";
        //             $headers.= 'MIME-Version: 1.0' . "\r\n";
        //             $headers.= 'Content-type: text/html;charset=UTF-8' . "\r\n";
        //             $message="Registration Confirmation with below details,<br> ";
        //             $message.="Subject: ".$_POST['subject']."<br>";
        //             $message.="Name: ".$_POST['name']."<br>";
        //             $message.="Email: ".$_POST['email']."<br>";
        //              $message.="Phone: ".$_POST['mobile']."<br>";
                      
        //                $message.="This is an autogenerated email, please do not reply to this email. Your Password is: testing";
        //             mail($to, $subject, $message, $headers);
        //              mail($to1, $subject, $message, $headers);



                    }else{
                          echo '<p class="alert alert-danger" id="success-alert"><i class="fa fa-times-circle fa-fw"></i>Reference no is Not Present</p>' ;
                        }}}}
                        
?>
						</div>

						<form class="form" method="post" name="forms" enctype="multipart/form-data" onsubmit="return myfun();">
							<div class="form-body">
								<div class="form-group">
								<input type="hidden" name="token" value="<?=mt_rand(10000000,99999999);?>">
								</div>
                               
                  <div class="form-group">
                  <label for="complaintinput1">Distributor Reference No</label>
                  <input type="text" id="complaintinput1" class="form-control round" placeholder="Enter Distributor Reference No" name="reference_no" required="">
                </div>

								<div class="form-group">
									<label for="complaintinput1">Applicant Name</label>
									<input type="text" id="complaintinput1" class="form-control round" placeholder="Enter Retailer Name" name="name" required="">
								</div>
								
				
                   
                        
                        <fieldset class="form-group">
						<label for="complaintinput1">Applicant Type</label>
                            <select class="form-control round selectpicker" name="type">
                              
                 <option value="-1" selected="selected">-----Select Option-----</option>             
								<option value="Individual" >Individual</option>
								<option value="Professional">Professional</option>
								<option value="Organization">Organization</option>
								
                            </select>
                        </fieldset> 

                        <div ><p id="message"></p></div>
					
								<div class="form-group">
									<label for="complaintinput1">Business Commencement Date</label>
									<input type="text" id="complaintinput2" class="form-control round" name="date_start" value="<?=date('d-m-y');?>">
								</div>
								<div class="form-group">
									<label for="complaintinput2">Email</label>
									<input type="text" id="complaintinput2" class="form-control round" name="email" placeholder="Enter E-Mail Address" required="">
                  <div ><p id="Message1"></p></div>
								</div>
								<div class="form-group">
									<label for="complaintinput2">Mobile</label>
									<input type="text" id="complaintinput2" class="form-control round" placeholder="Enter Phone No" name="mobile" required="">
								</div>
								<div class="form-group">
									<label for="complaintinput2">Address</label>
									<input type="text" id="complaintinput2" class="form-control round" placeholder="Enter Address" name="address" required="">
								</div>
                <div class="form-group">
                <label for="complaintinput2">Area</label>
                <input type="text" id="complaintinput2" class="form-control round" placeholder="Enter Area" name="area" required="">
               </div>
               <input type="hidden" id="complaintinput2" name="password" value="<?=md5('testing')?>">
               <!--  <div class="form-group">
                  <label for="complaintinput2">Password</label>
                  <input type="text" id="complaintinput2" class="form-control round" placeholder="Enter Address" value="testing" readonly="">
                </div> -->
								<div class="form-group">
									<label for="complaintinput2">Contact Person Name</label>
									<input type="text" id="complaintinput2" class="form-control round" placeholder="Enter Contact Person Name" name="contact_person" required="">
								</div>
                 <div class="form-group">
                                    <label for="complaintinput2">Aadhar Card No</label>
                                    <input type="text" id="complaintinput2" class="form-control round" placeholder="Enter Aadhar Card No" name="aadhar" required="">
                 </div>
                  <div class="form-group">
                      <label for="complaintinput2">Pan Card No</label>
                      <input type="text" id="complaintinput2" class="form-control round" placeholder="Enter Aadhar Card No" name="pancard" required="">
                  </div>
								
				                   <div class="form-group">
                                    <label for="complaintinput2">Account No</label>
                                    <input type="text" id="complaintinput2" class="form-control round" placeholder="Enter Account No" name="account_no" required="">
                           </div>

                            <div class="form-group">
                                    <label for="complaintinput2">IFSC</label>
                                    <input type="text" id="complaintinput2" class="form-control round" placeholder="Enter IFSC" name="ifsc" required="">
                           </div>

                           <div class="form-group">
                                    <label for="complaintinput2">Account Holder Name</label>
                                    <input type="text" id="complaintinput2" class="form-control round" placeholder="Enter Account Holder Name" name="ac_holder_name" required="">
                           </div>
							
								<h4>Retailer Image</h4>
                <div class="card-block">
                    <div class="card-body">
                        <fieldset class="form-group">
                            <input type="file" class="form-control-file" id="exampleInputFile" name="side_img" required="">
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
								<a href="retailer.php" type="button" class="btn btn-danger mr-1" >
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
 