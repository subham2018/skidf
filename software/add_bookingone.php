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
            <h3 class="content-header-title">Rooms</h3>
          </div>
          <div class="content-header-right col-md-8 col-12">
            <div class="breadcrumbs-top float-md-right">
              <div class="breadcrumb-wrapper mr-1">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Home</a>
                  </li>
                  <li class="breadcrumb-item"><a href="add_booking.php?guest_id=<?=$_REQUEST['guest_id']?>">Check Availability</a>
                  </li>
                  <li class="breadcrumb-item active">Availability Rooms
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body"><!-- HTML (DOM) sourced data -->
<section id="html">
	<div class="row">
	    <div class="col-12">
	        <div class="card">
	            <div class="card-header">
	                <h4 class="card-title">Select Your Availability</h4>
					
	                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
        			
	            </div>



	

<div class="row">
    <div class="col-md-12 col-lg-12" >

<?php
$checkinrequest=strtotime($_REQUEST['checkin']); 
$checkoutrequest=strtotime($_REQUEST['checkout']);


$roomsselect=mysqli_query($link,"SELECT * FROM `soinit_rooms`");

while($fetchrooms=mysqli_fetch_object($roomsselect)){
    ?>

<div class="col-md-4 col-lg-4" style="float: left!important; background-color: purple">
        <div class="card pull-up border-top-info border-top-3 rounded-0">
            <div class="card-header">
                <h4 class="card-title">
                    <?=anything('room_type','room_type',$fetchrooms->room_id)?> 
                    <!-- <?=anything('rooms','room_no',$fetchrooms->id)?> -->


                    </h4>
            </div>
            <div class="card-content collapse show">
                <div class="card-body p-1">
                    <h5>Reservations Availability<i class="ft-alert-circle float-right"></i></h5>
                    <hr>
                    <?php 

                     $a=0;
$reselect=mysqli_query($link,"SELECT * FROM `soinit_rooms_reservation` WHERE `room_id`='".$fetchrooms->id."'");

while($fetchre=mysqli_fetch_object($reselect)){
    ?>
   <!-- <p>Reserved From <?=$fetchre->reservation_from?> To <?=$fetchre->reservation_to?> </p>
-->
<?php
$fetchfrom=strtotime($fetchre->reservation_from);
$fetchto=strtotime($fetchre->reservation_to);

if($checkinrequest>=$fetchfrom && $checkinrequest<=$fetchto || $checkoutrequest>=$fetchfrom && $checkoutrequest<=$fetchto)
{ 
$a=$a+1;
}

 }

if($a=="0") {
 ?>

 <a href="add_booking_confirm.php?guest_id=<?=$_REQUEST['guest_id']?>&room_id=<?=$fetchrooms->id?>&checkin=<?=$_REQUEST['checkin']?>&checkout=<?=$_REQUEST['checkout']?>" class="btn btn-success btn-lg">AVAILABLE! BOOK NOW</a>

<?php } else { ?>

 <a href="#" class="btn btn-danger btn-lg">SORRY NOT AVAILABLE!</a>

<?php } ?>



                </div>
              
            </div>
        </div>
    </div>
<?php


}

?>


    </div>
</div>
	           
	           
</section>
<!--/ HTML (DOM) sourced data -->

<!-- Ajax sourced data -->

<!--/ Ajax sourced data -->

<!-- Javascript sourced data -->

<!--/ Javascript sourced data -->

<!-- Server-side processing -->

<!--/ Javascript sourced data -->
       
    <!-- ////////////////////////////////////////////////////////////////////////////-->

    
	<!--Sidebar BG Image Toggle Ends-->	

	

    <?php include_once 'include/footer.php';?>