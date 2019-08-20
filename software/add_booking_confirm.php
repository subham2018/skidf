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
            <h3 class="content-header-title">ADD GUEST</h3>
          </div>
          <div class="content-header-right col-md-8 col-12">
            <div class="breadcrumbs-top float-md-right">
              <div class="breadcrumb-wrapper mr-1">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Home</a>
                  </li>
                  <li class="breadcrumb-item"><a href="guest.php">Manage Guest</a>
                  </li>
                  <li class="breadcrumb-item active">Booking Confirm
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
					<h4 class="card-title" id="basic-layout-round-controls">AVAILABILITY FOR <?=anything('guest','name',$_REQUEST['guest_id'])?></h4>
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

                   


                    // RESERVATION DIRECT
                    $strrfrom=strtotime($_POST['checkin']);
                   $strrto=strtotime($_POST['checkout']);
                    mysqli_query($link,"INSERT INTO `soinit_rooms_reservation`(`room_id`, `reservation_from`, `reservation_to`, `property_id`, `strrfrom`, `strrto`) VALUES ('".$_POST['room_id']."', '".$_POST['checkin']."', '".$_POST['checkout']."', 
                    '".anything('rooms', 'room_id', $_POST['room_id'])."', '".$strrfrom."', '".$strrto."')");
                   


 if($_REQUEST['service_price']>'0')       
                    {
                    	$_POST['price']=$_POST['price']+$_REQUEST['service_price'];
                    } 
                    $query='';
                    foreach($_POST as $key=>$value) if($key != 'submit')$query .="`$key`='$value',";
                    $query = substr($query, 0, -1);//omit last comma
                    
 mysqli_query($link,"INSERT INTO ".$prefix."booking SET ".$query);//insert all text info

                   
                        echo '<p class="alert alert-success" id="success-alert"><i class="fa fa-check fa-fw"></i> Update successfully.</p>';
       header("Location: bookings.php?guest_id=".$_REQUEST['guest_id']);
          }
          
        
?>
						</div>

						<form class="form" method="post" enctype="multipart/form-data">
							<div class="form-body">
							
								<div class="form-group">
									<input type="hidden" name="guest_id" value="<?=$_REQUEST['guest_id']?>">
									<input type="hidden" name="room_id" value="<?=$_REQUEST['room_id']?>">
									<label for="complaintinput1">Check In Date</label>
									<input type="date" id="complaintinput1" class="form-control round" placeholder="Enter Check In Date" name="checkin" value="<?=$_REQUEST['checkin']?>">
								</div>
								<div class="form-group">
									<label for="complaintinput1">Check Out Date</label>
									<input type="date" id="complaintinput1" class="form-control round" placeholder="Enter Check Out Date" name="checkout" value="<?=$_REQUEST['checkout']?>">
								</div>
								<div class="form-group">
									<label for="complaintinput1">Adult</label>
									<input type="number" id="complaintinput1" class="form-control round" placeholder="Enter No of Adults" name="adult" required="">
								</div>
								<div class="form-group">
									<label for="complaintinput1">Child</label>
									<input type="number" id="complaintinput1" class="form-control round" placeholder="Enter No of Children" name="child" required="">
								</div>

								<?php $selectac=mysqli_query($link,"SELECT `offer_price`, `ac_offer_price` FROM `soinit_rooms` WHERE `id`=".$_REQUEST['room_id']);
								$fetchprice=mysqli_fetch_object($selectac);

								$diffday=dateDiffInDays($_REQUEST['checkout'], $_REQUEST['checkin']);


								$netacprice=$diffday*$fetchprice->ac_offer_price;
								$netnonacprice=$diffday*$fetchprice->offer_price; ?>
								<i>No of Days Stay: <?=$diffday?></i><br>
									<small><font color="green"><b>AC Calculated Price: INR <?=$netacprice?></b></font> &nbsp;<font color="red"><b>NON AC Calculated Price: INR <?=$netnonacprice?></b></font></small>
									<hr>
									
							
								
								<div class="form-group">
									<label for="complaintinput1">Room Type</label>
									<select name="room_type">
										<option value="AC">AC</option>
										<option value="NON AC">NON AC</option>
									</select>
									</div>

									<div class="form-group">
									<label for="complaintinput1">Total Price</label>
									<input type="number" id="complaintinput1" class="form-control round" placeholder="Enter Price" name="price" value="<?=$_REQUEST['price']?>">
								</div>
									
								

								<div class="form-group">
									<label for="complaintinput1">Add on Services Required (if any)</label>
									<input type="text" id="complaintinput1" class="form-control round" placeholder="Service Name" name="service_addon" value="NA">
								</div>


								<div class="form-group">
									<label for="complaintinput1">Service Add on Cost</label>
									<input type="number" id="complaintinput1" class="form-control round" placeholder="Enter Service Add on Price" name="service_price" value="0">
								</div>
							<div class="form-actions">
								
							
							<input type="submit" name="submit" class="btn btn-primary" value="submit">
									
								
							</div>
						</form>
					
				
			
		
  </center>
</div><br><br><br><br><br><br>
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