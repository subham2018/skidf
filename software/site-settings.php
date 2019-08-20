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
            <h3 class="content-header-title">ADD SITE SETTINGS</h3>
          </div>
          <div class="content-header-right col-md-8 col-12">
            <div class="breadcrumbs-top float-md-right">
              <div class="breadcrumb-wrapper mr-1">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Home</a>
                  </li>
                  <li class="breadcrumb-item"><a href="banner.php">Site Settings</a>
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
          <h4 class="card-title" id="basic-layout-colored-form-control">Site Settings</h4>
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
        if(isset($_POST['submit'])){
          check_all_var(); //prevent mysql injection
          //generate query from post
          $query='';
          foreach($_POST as $key=>$value) if($key != 'submit')$query .="`$key`='$value',";
          $query = substr($query, 0, -1);//omit last comma
          
          if(mysqli_query($link,"UPDATE ".$prefix."setting SET ".$query." WHERE id=1")){ //insert all text info
            //check and insert favicon
            if(!empty($_FILES['favicon']['tmp_name']) && is_uploaded_file( $_FILES['favicon']['tmp_name'] )){
              //conver file name to md5 and prepend timestamp
              $fbasename=time().'_'.md5($_FILES["favicon"]["name"]).'.'.pathinfo($_FILES["favicon"]["name"],PATHINFO_EXTENSION);
              $target_file = UPLOAD_IMG_PATH . $fbasename;
              $image_temp = $_FILES['favicon']['tmp_name'];
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
                case 'image/png': $image_res = imagecreatefrompng($image_temp); break;
                default: $image_res = false;
              }
              //corp and resize to 20x20 and save
              if($image_res != false && crop_image_square($image_res, $target_file, $image_type, 20, $image_width, $image_height, 50)) {
                @unlink(UPLOAD_IMG_PATH . $site->favicon);
                mysqli_query($link,"UPDATE ".$prefix."setting SET `favicon`='$fbasename' WHERE id=1");
                $error=0;
              }
              else $error=1;
              
            }
            //check and insert logo
            if(!empty($_FILES['logo']['tmp_name']) && is_uploaded_file( $_FILES['logo']['tmp_name'] )){
              
              //conver file name to md5 and prepend timestamp
              $fbasename=time().'_'.md5($_FILES["logo"]["name"]).'.'.pathinfo($_FILES["logo"]["name"],PATHINFO_EXTENSION);
              $target_file = UPLOAD_IMG_PATH . $fbasename;
              $image_temp = $_FILES['logo']['tmp_name'];
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
                case 'image/png': $image_res = imagecreatefrompng($image_temp);break;
                default: $image_res = false;
              }
              //resize to max height 60px and save
              if($image_res != false && resize_image($image_res, $target_file, $image_type, 120, $image_width, $image_height, 80, true, false)){
                @unlink(UPLOAD_IMG_PATH . $site->logo);
                mysqli_query($link,"UPDATE ".$prefix."setting SET `logo`='$fbasename' WHERE id=1");
                $error=isset($error) && $error == 1? 1:0;
              }
              else $error=1;  
            }
            //check and insert footer logo
            if(!empty($_FILES['flogo']['tmp_name']) && is_uploaded_file( $_FILES['flogo']['tmp_name'] )){
              //conver file name to md5 and prepend timestamp
              $fbasename=time().'_'.md5($_FILES["flogo"]["name"]).'.'.pathinfo($_FILES["flogo"]["name"],PATHINFO_EXTENSION);
              $target_file = UPLOAD_IMG_PATH . $fbasename;
              $image_temp = $_FILES['flogo']['tmp_name'];
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
                case 'image/png': $image_res = imagecreatefrompng($image_temp); break;
                default: $image_res = false;
              }
              //resize to max height 60px and save
              if($image_res != false && resize_image($image_res, $target_file, $image_type, 250, $image_width, $image_height, 80, false, true)){
                @unlink(UPLOAD_IMG_PATH . $site->flogo);
                mysqli_query($link,"UPDATE ".$prefix."setting SET `flogo`='$fbasename' WHERE id=1");
                $error=isset($error) && $error == 1? 1:0;
              }
              else $error=1;  
            }
            //check if error occure in any step
            if(isset($error) && $error == 0)
              echo '<p class="alert alert-success"><i class="fa fa-check fa-fw"></i> Image and Details updated successfully.</p>';
            elseif(isset($error) && $error == 1)
              echo '<p class="alert alert-warning id="success-alert" <i class="fa fa-check fa-fw"></i> Details updated successfully. But there is an error while uploading image!</p>';
            else echo '<p class="alert alert-success" id="success-alert" ><i class="fa fa-check fa-fw"></i> Details updated successfully.</p>';
          }
          else echo '<p class="alert alert-danger" id="success-alert" ><i class="fa fa-warning fa-fw"></i> Sorry! Something went wrong.'.mysql_error().'</p>';
          $site = site_info();
        }
        ?>
            </div>

            <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
              <div class="form-body">
                <?php
                                $select=mysqli_query($link,"SELECT * FROM ".$prefix."setting WHERE id=1");
                               $row=mysqli_fetch_object($select);
                                ?>

                <h4 class="form-section">
                  <i class="ft-briefcase"></i> Edit site settings</h4>
                <div class="form-group">
                  <label for="contactinput5">Title</label>
                  <input class="form-control border-primary" type="text" id="contactinput5" name="site_title" value="<?=$row->site_title?>">
                </div>

                <div class="form-group">
                  <label for="contactinput5">Meta-Description</label>
                  <input class="form-control border-primary" type="text" id="contactemail5" name="meta_description" value="<?=$row->meta_description?>">
                </div>

                <div class="form-group">
                  <label for="contactinput6">Meta-Keywords</label>
                  <input class="form-control border-primary" type="text" id="contactinput6" name="meta_keyword" value="<?=$row->meta_keyword?>">
                </div>

                <div class="form-group">
                  <label>Site Owner</label>
                  <input class="form-control border-primary" id="contactinput7" type="text" name="site_owner_name" value="<?=$row->site_owner_name?>">
                </div>
                
                <div class="form-group">
                  <label>Site Owner Email</label>
                  <input class="form-control border-primary" id="contactinput7" type="text" name="site_owner_email" value="<?=$row->site_owner_email?>">
                </div>
                <div class="form-group">
                  <label>Phone Number</label>
                  <input class="form-control border-primary" id="contactinput7" type="text" name="contact" value="<?=$row->contact?>">
                </div>
                
                <div class="form-group">
                  <label>Reg. Address</label>
                  <input class="form-control border-primary" id="contactinput7" type="text" name="reg_address" value="<?=$row->reg_address?>">
                </div>
                <div class="form-group">
                  <p>Terms & Conditions</p>
                  <!-- <label>Terms & Conditions</label> -->
                  <div class="form-group">
                  <textarea name="terms" rows="4" cols="50" id="editor" placeholder="Describe yourself here..."><?=$row->terms?></textarea>
                </div>
                <div class="form-group">
                  <label>Bank Name</label>
                  <input class="form-control border-primary" type="text" name="bankname" value="<?=$row->bankname?>">
                </div>
                <div class="form-group">
                  <label>Account Holder's Name</label>
                  <input class="form-control border-primary" type="text" name="accountname" value="<?=$row->accountname?>">
                </div>
                <div class="form-group">
                  <label>Account Number</label>
                  <input class="form-control border-primary" type="text" name="accountno" value="<?=$row->accountno?>">
                </div>
                <div class="form-group">
                  <label>IFSC No</label>
                  <input class="form-control border-primary" type="text" name="ifscno" value="<?=$row->ifscno?>">
                </div>
                </div>
                <div class="form-group">
                  <label>Map Embed Source</label>
                  <input class="form-control border-primary" id="contactinput7" type="text" name="map" value="<?=$row->map?>">
                </div>
                <div class="form-group">
                  <label>Facebook Link</label>
                  <input class="form-control border-primary" id="contactinput7" type="text" name="facebook" value="<?=$row->facebook?>">
                </div>
                <div class="form-group">
                  <label>Twitter Link</label>
                  <input class="form-control border-primary" id="contactinput7" type="text" name="twitter" value="<?=$row->twitter?>">
                </div>
                <div class="form-group">
                  <label>Google Plus Link</label>
                  <input class="form-control border-primary" id="contactinput7" type="text" name="gplus" value="<?=$row->gplus?>">
                </div>
                
                <div class="form-group">
                  <label>Instagram Link</label>
                  <input class="form-control border-primary" id="contactinput7" type="text" name="instagram" value="<?=$row->instagram?>">
                </div>
                <div class="form-group">
                  <label>Notice Board Description</label>
                  <input class="form-control border-primary" id="contactinput7" type="text" name="cont_pgmsg" value="<?=$row->cont_pgmsg?>">
                </div>
                 <div class="card-header">
                    <label class="card-title" for="exampleInputFile">Favicon</label>
                </div>
                <div class="card-block">
                    <div class="card-body">
                        <fieldset class="form-group">
                            <input type="file" class="form-control-file" id="exampleInputFile" name="favicon">
                        </fieldset>
                    </div>
                </div>
                 <div class="card-header">
                    <label class="card-title" for="exampleInputFile">Logo</label>
                </div>
                <div class="card-block">
                    <div class="card-body">
                        <fieldset class="form-group">
                            <input type="file" class="form-control-file" id="exampleInputFile" name="logo">
                        </fieldset>
                    </div>
                </div>

              </div>

              <div class="form-actions right">
                
                <button type="submit" name="submit" class="btn btn-primary">
                  <i class="ft-check"></i> UPDATE
                </button>
                <!--<input type="submit" name="submit" class="btn btn-success pull-right" value="Update">-->
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
<script type="text/javascript">
$("#success-alert").fadeTo(3000, 500).slideUp(500, function(){
    $("#success-alert").slideUp(500);
});
</script>

    <?php include_once 'include/footer.php';?>