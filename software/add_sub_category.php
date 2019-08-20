<?php include_once 'include/head.php';?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
     <?php include_once 'include/header.php';?>
<title><?=$site->site_title?> | ADMIN PANEL</title>
<script src="https://cdn.ckeditor.com/ckeditor5/10.1.0/classic/ckeditor.js"></script>
  </head>
<?php include_once 'include/navbar.php';?>

    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
          <div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">ADD <?=anything('category','title',$_GET['add_sub_id'])?> LIST</h3>
          </div>
          <div class="content-header-right col-md-8 col-12">
            <div class="breadcrumbs-top float-md-right">
              <div class="breadcrumb-wrapper mr-1">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Home</a>
                  </li>
                  <li class="breadcrumb-item"><a href="category.php">Category</a>
                  </li>
                  <li class="breadcrumb-item active">Sub Category List
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
					<h4 class="card-title" id="basic-layout-round-controls">ADD SUB CATEGORY LIST</h4>
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
                //banner background
                if(isset($_POST['submit'])){
                    //check and insert banner back
                    if(!empty($_FILES['image']['tmp_name']) && is_uploaded_file( $_FILES['image']['tmp_name'] )){
                        //conver file name to md5 and prepend timestamp
                        $fbasename=time().'_'.md5($_FILES["image"]["name"]).'.'.pathinfo($_FILES["image"]["name"],PATHINFO_EXTENSION);
                        $target_file = UPLOAD_IMG_PATH . $fbasename;
                        $image_temp = $_FILES['image']['tmp_name'];
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
                        if($image_res != false && resize_image($image_res, $target_file, $image_type, 768, $image_width, $image_height, $_POST['qa'], true, false)){
                            //generate query from post
                            $query='';
                            foreach($_POST as $key=>$value) if($key != "submit")if($key != "qa") $query .="`$key`='$value',";
                            $query .= "`image`='".$fbasename."'";
                            
                            mysqli_query($link,"INSERT INTO ".$prefix."sub_category SET ".$query);
                            echo '<p class="alert alert-success"><i class="fa fa-check fa-fw"></i>&nbsp; Banner successfully added.</p>';
                            header("Location: sub_category.php?sub_id=".$_REQUEST['add_sub_id']);
                        }
                        else {
                            unlink($target_file);
                            echo '<p class="alert alert-danger"><i class="check"> Sorry! There is an error while inserting banner information record!</p>'; 
                        }
                    }
                }

                        
?>
						</div>

						<form class="form" method="post" enctype="multipart/form-data">
							<div class="form-body">
                
								<div class="form-group">
									<label for="complaintinput1">Name</label>
									<input type="text" id="complaintinput1" class="form-control round" placeholder="Enter Name" name="name">
								</div>
                <fieldset class="form-group">
            <label for="complaintinput1">Select Category Type</label>
                            <select class="form-control round" id="basicSelect" name="type" >
                              <option>Select Option</option>
                              <?php
                $select=mysqli_query($link,"SELECT * FROM ".$prefix."category");
                while($row=mysqli_fetch_object($select)){
                 ?>
                <option value="<?=$row->id?>"><?=$row->title?></option>
                <?php } ?> 
                            </select>
                        </fieldset>

                
                  
                <div class="form-group">
                  <label for="complaintinput2">Details</label>
                  <input type="text" id="complaintinput2" class="form-control round" placeholder="Enter Details" name="details">
                </div>
                     

								<div class="form-group">
									<label for="complaintinput2">Price</label>
									<input type="text" id="complaintinput2" class="form-control round" placeholder="Enter price" name="price">
								</div>
							<div class="card-header">
                    <label class="card-title" for="exampleInputFile">Image</label>
                </div>
                <div class="card-block">
                    <div class="card-body">
                        <fieldset class="form-group">
                            <input type="file" class="form-control-file" id="exampleInputFile" name="image">
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
								<a href="banner.php" type="button" class="btn btn-danger mr-1" >
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
    <?php include_once 'include/footer.php';?>