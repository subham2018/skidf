<?php include_once 'include/head.php';?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
     <?php include_once 'include/header.php';?>
<title><?=$site->site_title?> | Admin Panel</title>
  </head>
<?php include_once 'include/navbar.php';?>

    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
          <div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">ADD SERVICE LIST</h3>
          </div>
          <div class="content-header-right col-md-8 col-12">
            <div class="breadcrumbs-top float-md-right">
              <div class="breadcrumb-wrapper mr-1">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Home</a>
                  </li>
                  <li class="breadcrumb-item"><a href="service.php">Service</a>
                  </li>
                  <li class="breadcrumb-item active">Service List
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
					<h4 class="card-title" id="basic-layout-round-controls">ADD SERVICE LIST</h4>
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
                    check_all_var(); //prevent mysqli injection              
                    //check and insert banner
                    if(!empty($_FILES['image']['tmp_name']) && is_uploaded_file( $_FILES['image']['tmp_name'] )){
                        //convert file name to md5 and prepend timestamp
                        $fbasename=time().'_'.md5($_FILES["image"]["name"]).'.'.pathinfo($_FILES["image"]["name"],PATHINFO_EXTENSION);
                        $target_file = UPLOAD_IMG_PATH . $fbasename;
                        $target_tmb_file = UPLOAD_TMB_IMG_PATH . $fbasename;


                        $image_temp = $_FILES['image']['tmp_name'];
                        $image_size_info    = getimagesize($image_temp);
                        if($image_size_info){
                            $image_width        = $image_size_info[0];
                            $image_height       = $image_size_info[1];
                            $image_type         = $image_size_info['mime'];
                        }else{
                           exit;
                        }
                        //check if image is in jpg format or not
                        switch($image_type){
                            case 'image/jpeg': case 'image/pjpeg':  $image_res = imagecreatefromjpeg($image_temp); break;
                            //case 'image/png':  $image_res = imagecreatefrompng($image_temp); break;
                            default: $image_res = false;
                        }
                        //optimize and save
                        if($image_res != false && resize_image($image_res, $target_file, $image_type, 1336, $image_width, $image_height,  $_POST['qa'], false, true)){
                            crop_image_square($image_res, $target_tmb_file, $image_type, 320, $image_width, $image_height,  $_POST['qa']);
                                                       
                         $query='';
                        foreach($_POST as $key=>$value) if($key != 'submit')if($key != 'qa')$query .="`$key`='$value',";
                        $query .= "`image`='$fbasename'"; 
                            
                        mysqli_query($link,"INSERT INTO ".$prefix."service SET ".$query);
                            echo '<p class="alert alert-success" id="success-alert"><i class="fa fa-check fa-fw"></i> Service Informations Added successfully.</p>';
                        }
                        else {
                            unlink($target_file);
                            echo '<p class="alert alert-danger"><i class="fa fa-warning fa-fw"></i> Sorry! There is an error while uploading image!</p>'; 
                        }
                    }
                }
                        
?>
						</div>

						<form class="form" method="post" enctype="multipart/form-data">
							<div class="form-body">

								<div class="form-group">
									<label for="complaintinput1">Title</label>
									<input type="text" id="complaintinput1" class="form-control round" placeholder="Enter Title" name="title">
								</div>

								
                <div class="card-block">
                    <div class="card-body">
                        <label for="complaintinput2">Category Name</label>
                        <fieldset class="form-group">
                
           <select name="cat_id" class="form-control" id="basicSelect">
          <option>Select Category Name</option>
          <?php
                        $select=mysqli_query($link,"SELECT * FROM ".$prefix."category");
                         while($row=mysqli_fetch_object($select)){
                         ?>
            <option value="<?=$row->id?>"><?=$row->title?></option>
                       <?php } ?> 
                    </select>
                  </fieldset>
                </div>
            </div>
            <div class="card-header">
                    <label class="card-title" for="exampleInputFile">Images</label>
                </div>
                <div class="card-block">
                    <div class="card-body">
                        <fieldset class="form-group">
                            <input type="file" class="form-control-file" id="exampleInputFile" name="image">
                        </fieldset>
                    </div>
                </div>
           
          

							<div class="form-actions">
								<a href="service.php" type="button" class="btn btn-danger mr-1" >
									<i class="ft-arrow-left"></i> Back
								</a>
							
								<button type="submit" name="submit" class="btn btn-primary">
									<i class="ft-user-check"></i> Save
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
  </center>
</div>
<script type="text/javascript">
$("#success-alert").fadeTo(3000, 500).slideUp(500, function(){
    $("#success-alert").slideUp(500);
});
</script> 
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