<?php include_once 'include/head.php';?>
<!doctype html>
<html>
<head>
 <?php include_once 'include/header.php';?>
    <title> Bulk Images </title>

	<?php include_once 'include/navbar.php';?>  	
		
		
       <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
          <div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">PROPERTY LISTING</h3>
          </div>
          <div class="content-header-right col-md-8 col-12">
            <div class="breadcrumbs-top float-md-right">
              <div class="breadcrumb-wrapper mr-1">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Home</a>
                  </li>
                  <li class="breadcrumb-item"><a href="homestay.php">Homestay</a>
                  </li>
                  <li class="breadcrumb-item active">Bulk Images
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
					<h4 class="card-title" id="basic-layout-round-controls">ADD BULK IMAGES</h4>
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
                						
				if(isset($_FILES['image'])){
				
					foreach($_FILES['image']['tmp_name'] as $key => $tmp_name ){

						if(!empty($_FILES['image']['tmp_name'][$key]) && is_uploaded_file( $_FILES['image']['tmp_name'][$key] )){
					        //convert file name to md5 and prepend timestamp
					        $fbasename=time().'_'.md5($_FILES["image"]["name"][$key]).'.'.pathinfo($_FILES["image"]["name"][$key],PATHINFO_EXTENSION);
					        $target_file = UPLOAD_IMG_PATH . $fbasename;
					        $target_tmb_file = UPLOAD_TMB_IMG_PATH . $fbasename;
					        

					        $image_temp = $_FILES['image']['tmp_name'][$key];
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
					            case 'image/png':  $image_res = imagecreatefrompng($image_temp); break;
					            default: $image_res = false;
					        }
					        //optimize and save
					        if($image_res != false && resize_image($image_res, $target_file, $image_type, 1366, $image_width, $image_height, 80, false, true)){

					        	crop_image_square($image_res, $target_tmb_file, $image_type, 400, $image_width, $image_height, 80);
					            
					            mysql_query("INSERT INTO `".$prefix."property_images` SET
				             
									`image`='".$fbasename."',
										`title`='".$_POST['title']."',
									`pro_id`='".$_POST['pro_id']."'
				               
				               ");

					           
					        }
					        else {
					            @unlink($target_file);
					            $error=1;
					            echo '<p class="alert alert-danger"><i class="fa fa-close fa-fw"></i> Sorry! There is an error while uploading <strong>'.$_FILES["image"]["name"][$key].'</strong>!</p>'; 
					        }
					    }

					}
					if(!isset($error))
						 echo '<p class="alert alert-success"><i class="fa fa-check fa-fw"></i> Images added successfully.</p>';
					
				}

				   
			   //delete Projects

                    if(isset($_GET['del'])){
                    
                     $img=anything('product','image',$_GET['del']);
                    if(mysql_query("DELETE FROM ".$prefix."property_images WHERE id=".variable_check($_GET['del']))){ //delete info
                        @unlink(UPLOAD_IMG_PATH . $img);
                        @unlink(UPLOAD_TMB_IMG_PATH . $img);
                        
                        echo '<p class="alert alert-success" id="success-alert"><i class="fa fa-check fa-fw"></i>  Deleted successfully.</p>';
                    }
                    else echo '<p class="alert alert-danger"><i class="fa fa-warning fa-fw"></i> Sorry! There is an error while deleting!</p>';
                }
                ?>
						</div>

						<form class="form" method="post" enctype="multipart/form-data">
							<div class="form-body">

								<div class="form-group">
									<label for="complaintinput1">Title</label>
									<input type="text" id="complaintinput1" class="form-control round" placeholder="Enter Title" name="title">
								</div>
								<div class="form-group">
						  <input type="hidden" name="pro_id" value="<?=$_REQUEST['img']?>">
							<label for="complaintinput1">Upload Images</label><br>
							<div  class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<div class="input-group">
							  		<input type="file" class="form-control" name="image[]" multiple="" accept=".jpg,.jpeg,.png"  />
							  		<span class="input-group-btn"><button type="submit" name="submit" class="btn btn-primary" style="height:40px;">Submit</button></span>
							  	</div>
							  	<small><i class="fa fa-info-circle fa-fw"></i>Try to upload 20-30 images at a time</small>
							</div>
						  </div>

								
							<div class="form-actions">
								<a href="homestay.php" type="button" class="btn btn-danger mr-1" >
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
<div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="panel-title">All Gallery Images</div>
                    </div>
                    <div class="panel-body">
                      
                <!-- // content -->
                             
                <div class="row">
				   
				   <?php
					$select = mysql_query("SELECT * FROM ".$prefix."property_images WHERE pro_id=".$_REQUEST['img']." ORDER BY `id` DESC");
					while($row = mysql_fetch_array($select)):
				   ?>
				   
				  <div class="col-sm-6 col-md-3">
					<div class="thumbnail">
					  <img src="<?=UPLOAD_TMB_IMG_PATH.$row['image'];?>"" alt="..." width="100%">
					  <div class="caption text-center">
							<a href="?del=<?=$row['id'];?>&img=<?=$_REQUEST['img']?>" class="btn btn-default btn-xs" title="Delete" onclick="javascript:return confirm('Are you absolutely sure you want to delete this?')"><i class="fa fa-remove"></i> Delete</a>
							
					  </div>
					</div>
				  </div>
				  
				   <?php
					endwhile;
					if(mysql_num_rows($select)==0) echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<h3 class="text-center text-muted">No Image Found!</h3>'
				   ?>
				  
				</div>
                        
                   
                
                
                
                
                
                
        
<?php include_once 'include/footer.php';?>

<script type="text/javascript">
$("#success-alert").fadeTo(3000, 500).slideUp(500, function(){
    $("#success-alert").slideUp(500);
});
</script>
<?php if(isset($_GET['del'])){?>
<div id="url_replace">
    <script type="text/javascript">
        $(document).ready(function(e) {
            window.history.replaceState(null, null, '<?=$page.'?id='.$_GET['id']?>&img='.$_REQUEST['img']);
			$('#url_replace').remove();
        });
    </script>
</div>
<?php }?>
</body>
</html>
