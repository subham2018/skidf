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
            <h3 class="content-header-title">ADD ROOM FEATURES</h3>
          </div>
          <div class="content-header-right col-md-8 col-12">
            <div class="breadcrumbs-top float-md-right">
              <div class="breadcrumb-wrapper mr-1">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Home</a>
                  </li>
                  <li class="breadcrumb-item"><a href="room.php">Room Type</a>
                  </li>
                  <li class="breadcrumb-item"><a href="room_listing.php?room_id=<?=$_REQUEST['id']?>">Room Listing</a>
                  </li>
                  <li class="breadcrumb-item active">Room Features
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
					<h4 class="card-title" id="basic-layout-round-controls">ADD FEATURES</h4>
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
                        foreach($_POST as $key=>$value) if($key != 'submit') $query .="`$key`='$value',";
                        $query = substr($query, 0, -1);//omit last comma
                            
                        mysqli_query($link,"INSERT INTO ".$prefix."features SET ".$query);
                            echo '<p class="alert alert-success" id="success-alert"><i class="fa fa-check fa-fw"></i> Features Added successfully. </p>';
                        }
                        
                  
                        
?>
						</div>

						<form class="form" method="post" enctype="multipart/form-data">
							<div class="form-body">

								<div class="form-group">
									<label for="complaintinput1">Title</label>
									<input type="text" class="form-control round" placeholder="Enter Title" name="title">
                  <input type="hidden" value="<?=$_REQUEST['property_id']?>" name="room_id">
								</div>

								

 <div class="form-group">
                                                <label class="col-md-2 control-label">Icon</label>
                                                <div class="col-md-10">
                                                    <div class="input-group">
                                                        <select id="icon" name="icon" class="form-control" onChange="seteIcon(this)" required>
                                                            <option selected disabled value="">Select Your Icon</option>
                                                    <?php
                                                $file=file_get_contents('../css/font-awesome.css');
                                                preg_match_all("/[.]fa-[^:]*:/",$file,$out, PREG_SET_ORDER);
                                                $i=1;
                                                foreach($out as $css){ 
                                                  if($i > 32)
                                                  echo '<option value="' . str_replace('.fa-','',str_replace(':','',$css[0])) . '">'. str_replace('.fa-','',str_replace(':','',$css[0])) . '</option>';
                                                  $i=$i+1;
                                                }
                                                ?>
                                                        </select>
                                                        <span class="input-group-addon"><i class="" id="icone"></i></span>
                                                    </div>
                                                </div>
                                            </div>




                
           
           
          

							<div class="form-actions">
								<a href="room_features.php?id=<?=$_REQUEST['id']?>&property_id=<?=$_REQUEST['property_id']?>" type="button" class="btn btn-danger mr-1" >
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
<script type="text/javascript">
function setIcon(s){
    $('#icon').removeClass().addClass('fa fa-fw fa-' + $(s).val());
}
function seteIcon(s){
    $('#icone').removeClass().addClass('fa fa-fw fa-' + $(s).val());
}
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