<?php include_once 'include/head.php';?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
     <?php include_once 'include/header.php';?>
<title><?=$site->site_title?> | Admin Panel</title>
<script src="https://cdn.ckeditor.com/ckeditor5/10.1.0/classic/ckeditor.js"></script>
  </head>
<?php include_once 'include/navbar.php';?>

    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
          <div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">Reservation Update</h3>
          </div>
          <div class="content-header-right col-md-8 col-12">
            <div class="breadcrumbs-top float-md-right">
              <div class="breadcrumb-wrapper mr-1">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Home</a>
                  </li>
                  <li class="breadcrumb-item"><a href="room.php">Rooms</a>
                  </li>
                  <li class="breadcrumb-item"><a href="room_listing.php?room_id=<?=$_REQUEST['id']?>">Rooms listing</a>
                  </li>
                  <li class="breadcrumb-item active">Reservation
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
					<h4 class="card-title" id="basic-layout-round-controls">Add New Reservation</h4>
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
                   $_POST['strrfrom']=strtotime($_POST['reservation_from']);
                   $_POST['strrto']=strtotime($_POST['reservation_to']);
                    $query='';
             foreach($_POST as $key=>$value) if($key != 'submit')$query .="`$key`='$value',";
                    $query = substr($query, 0, -1);//omit last comma

 mysqli_query($link,"INSERT INTO ".$prefix."rooms_reservation SET ".$query);
 //insert all text info

                  
                        echo '<p class="alert alert-success" id="success-alert"><i class="fa fa-check fa-fw"></i> Reservation Allocated successfully.</p>';

  header("Location: reservation_view.php?id=".$_REQUEST['id']."&room_id=".$_REQUEST['room_id']);
          }
          
        
?>
						</div>

						<form class="form" method="post" enctype="multipart/form-data">
							<div class="form-body">
                
                   <input type="hidden" value="<?=$_REQUEST['room_id']?>" name="room_id" required>
                   <input type="hidden" value="<?=$_REQUEST['id']?>" name="property_id" required>  

             <div class="form-group">
                  <label for="complaintinput1">Reservation From</label>
                  <input type="date" class="form-control round" name="reservation_from">
             </div>

								 <div class="form-group">
                  <label for="complaintinput1">Reservation To</label>
                  <input type="date" class="form-control round" name="reservation_to">
             </div>
             
							
							<div class="form-actions">
								<a href="reservation_view.php?id=<?=$_REQUEST['id']?>&room_id=<?=$_REQUEST['room_id']?>" type="button" class="btn btn-danger mr-1" >
									<i class="ft-arrow-left"></i> Back
								</a>
							
								<button type="submit" name="submit" class="btn btn-primary">
									<i class="ft-user-check"></i> Add
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
        .create( document.querySelector( '.editor' ) )
        .then( editor => {
          console.log( editor );
        } )
        .catch( error => {
          console.error( error );
        } );
    </script>
    <?php include_once 'include/footer.php';?>