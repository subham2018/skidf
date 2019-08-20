<?php include_once 'include/head.php';?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
     <?php include_once 'include/header.php';?>
<title><?=$site->site_title?> | ADMIN PANEL | DSA REGISTRATION</title>
<script src="https://cdn.ckeditor.com/ckeditor5/10.1.0/classic/ckeditor.js"></script>
 

  </head>
<?php include_once 'include/navbar.php';?>

    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
          <div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">ADD DSA USERS</h3>
          </div>
          <div class="content-header-right col-md-8 col-12">
            <div class="breadcrumbs-top float-md-right">
              <div class="breadcrumb-wrapper mr-1">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Home</a>
                  </li>
                  <li class="breadcrumb-item"><a href="#">DSA Users</a>
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
					<h4 class="card-title" id="basic-layout-round-controls">DSA Registration Form</h4>
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
                        mysqli_query($link,"INSERT INTO ".$prefix."dsa_user SET ".$query);

       // $to = $_POST['email'];
        //              $to1 = $site->site_owner_email;
        //             $subject = "DSA Registration Confirmation";
                    
                    
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


                            echo '<p class="alert alert-success" id="success-alert"><i class="fa fa-check fa-fw"></i> Added  successfully.</p>';
							
                        }}}
                        
?>
						</div>

						<form class="form" method="post" name="RegForm" enctype="multipart/form-data" onsubmit="formvalidate()">
							<div class="form-body">
								<div class="form-group">
								<input type="hidden" name="token" value="<?=mt_rand(10000000,99999999);?>">
                                <input type="hidden" name="fhash" value="0">
								</div>
								<div class="form-group">
									<label for="complaintinput1">Applicant Name</label>
									<input type="text" id="complaintinput1" class="form-control round" placeholder="Enter DSA Name" name="name">
								</div>
								
				
                   
                        
                        <fieldset class="form-group">
						<label for="complaintinput1">Applicant Type</label>
                            <select class="form-control round selectpicker"  name="type" >
                              <option>-------Select Option-------</option>
                              
								<option value="Individual">Individual</option>
								<option value="Professional">Professional</option>
								<option value="Organization">Organization</option>
								
                            </select>
                        </fieldset> 
					
								<div class="form-group">
									<label for="complaintinput1">Business Commencement Date</label>
									<input type="date" id="complaintinput2" class="form-control round" name="date_start" placeholder="Enter Starting Date">
								</div>
								<div class="form-group">
									<label for="complaintinput2">Email</label>
									<input type="email" id="complaintinput2" class="form-control round" name="email" placeholder="Enter E-Mail Address">
								</div>
								<div class="form-group">
									<label for="complaintinput2">Mobile</label>
									<input type="text" id="complaintinput2" class="form-control round" placeholder="Enter Phone No" name="mobile">
								</div>
								<div class="form-group">
									<label for="complaintinput2">Address</label>
									<input type="text" id="complaintinput2" class="form-control round" placeholder="Enter Address" name="address">
								</div>
                                <div class="form-group">
                                    <label for="complaintinput2">Area</label>
                                    <input type="text" id="complaintinput2" class="form-control round" placeholder="Enter Area" name="area">
                                </div>
                                
                            <input type="hidden" id="complaintinput2" name="password" value="<?=md5('testing')?>">
                               
								<div class="form-group">
									<label for="complaintinput2">Contact Person Name</label>
									<input type="text" id="complaintinput2" class="form-control round" placeholder="Enter Contact Person Name" name="contact_person">
								</div>
                                <div class="form-group">
                                    <label for="complaintinput2">Aadhar Card No</label>
                                    <input type="text" id="complaintinput2" class="form-control round" placeholder="Enter Aadhar Card No" name="aadhar">
                                </div>
                                <div class="form-group">
                                    <label for="complaintinput2">Pan Card No</label>
                                    <input type="text" id="complaintinput2" class="form-control round" placeholder="Enter Pan Card No" name="pancard">
                                </div>
								
				                   <div class="form-group">
                          <label for="complaintinput2">Account No</label>
                          <input type="text" id="complaintinput2" class="form-control round" placeholder="Enter Account No" name="account_no">
                      </div>

                    <div class="form-group">
                    <label for="complaintinput2">IFSC</label>
                    <input type="text" id="complaintinput2" class="form-control round" placeholder="Enter IFSC" name="ifsc">
                    </div> 

                    <div class="form-group">
                    <label for="complaintinput2">Account Holder Name</label>
                    <input type="text" id="complaintinput2" class="form-control round" placeholder="Enter Account Holder Name" name="ac_holder_name">
                    </div>         
							
								<h4>DSA Image</h4>
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
								<a href="dsa_user.php" type="button" class="btn btn-danger mr-1" >
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
    <script type="text/javascript">
 function formvalidate()                                    
  { 
    var name = document.forms["RegForm"]["name"];
    var email = document.forms["RegForm"]["email"];  
                                if (name.value.indexOf("@", 0) > 0)                 
    { 
        window.alert("Avoid @ and enter a valid Name."); 
        name.focus(); 
        return false; 
    } 
   
    if (name.value.indexOf(".", 0) > 0)                 
    { 
        window.alert("Avoid . And enter a valid Name."); 
        name.focus(); 
        return false; 
    } 
     if (email.value.indexOf("@", 0) < 0)                 
    { 
        window.alert("Please enter a valid e-mail address."); 
        email.focus(); 
        return false; 
    } 
   
    if (email.value.indexOf(".", 0) < 0)                 
    { 
        window.alert("Please enter a valid e-mail address."); 
        email.focus(); 
        return false; 
    } 
}
</script>
                            
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
 