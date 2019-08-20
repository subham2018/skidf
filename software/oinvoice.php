<?php include_once 'include/head.php';?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
    <?php include_once 'include/header.php';?>
<title><?=$site->site_title?></title>
    <!-- END Custom CSS-->
     <style type="text/css">
    .img1{
	position: absolute;
	margin-top:1150px;
	left:200px;
	width: 600px;

}
 </style>
  </head>
  

  <body class="horizontal-layout horizontal-menu 2-columns   menu-expanded" data-open="hover" data-menu="horizontal-menu" data-color="bg-gradient-x-purple-blue" data-col="2-columns">

    <!-- fixed-top-->
   

    <!-- ////////////////////////////////////////////////////////////////////////////-->


    

    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
          <div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title"></h3>
          </div>
          <div class="content-header-right col-md-8 col-12">
            <div class="breadcrumbs-top float-md-right">
              <div class="breadcrumb-wrapper mr-1">
                <ol class="breadcrumb">
                 
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body">
        	<section class="card">
        		 <img src="watermark.png" class="img1">
	<div id="invoice-template" class="card-body">
		<?php
							 $select=mysqli_query($link,"SELECT * FROM ".$prefix."guest WHERE `id`=".$_REQUEST['guest_id']);
                              $row=mysqli_fetch_object($select);
                                $select1=mysqli_query($link,"SELECT * FROM ".$prefix."online_booking WHERE `guest_id`=".$_REQUEST['guest_id']);
                               $row1=mysqli_fetch_object($select1);

             $select2=mysqli_query($link,"SELECT * FROM ".$prefix."rooms WHERE `id`=".$row1->room_id);
                               while($row2=mysqli_fetch_object($select2)){
             $select3=mysqli_query($link,"SELECT * FROM ".$prefix."room_type WHERE `id`=".$row2->room_id);
                               while($row3=mysqli_fetch_object($select3)){
            ?>
		<!-- Invoice Company Details -->
		<img alt="" src="<?=UPLOAD_IMG_PATH.$site->logo;?>" width="240px;" />
		<div id="invoice-company-details" class="row">
			<div class="col-md-6 col-sm-12 text-left text-md-left">							
                       
                        <ul class="px-0 list-unstyled">
                        	<li>To,</li>
                        	<li>GUEST ID: SI/<?=date('Y');?>/<?= date('Y'); ?>/<?=$row->id?></li>
                            <li class="text-bold-700"><?=$row->name?></li>
                            <li><?=$row->email?></li>                            
                            <li><?=$row->phone?></li>
                            
                        </ul>
                    
			</div>
			<div class="col-md-6 col-sm-12 text-center text-md-right">
				<h2>INVOICE</h2>
				<p>#SIB/2019/00<?=$row1->id?></p>
				<p><?=date("jS \of F Y");?></p>				
			</div>
		</div>
		<!--/ Invoice Company Details -->

		<!-- Invoice Customer Details -->
		<div id="invoice-customer-details" class="row pt-2">
			<div class="col-md-6 col-sm-12">
					
			</div>
			<div class="col-md-6 col-sm-12 text-center text-md-right">
					<p class="text-muted">From</p>
					<ul class="px-0 list-unstyled">
							<li class="text-bold-700"><?=$site->site_title?></li>
							<li><?=$site->reg_address?></li>
							<li><?=$site->contact?></li>
							<li><?=$site->site_owner_email?></li>
						</ul>
				
			</div>
		</div>
		<!--/ Invoice Customer Details -->

		<!-- Invoice Items Details -->
		<div id="invoice-items-details" class="pt-2">
			<div class="row">
				<div class="table-responsive col-sm-12">
					<table class="table table-bordered">
					  <thead>
					    <tr>
					      <th>Booking ID</th>
					     
					      <th class="text-right">Room Details</th>


					      <th class="text-right">Reservation</th>
					      
					      <th class="text-right">Payable Amount</th>
					    </tr>
					  </thead>
					  <tbody>
					    <tr>
					      <th scope="row">SIB/2019/00<?=$row1->id?></th>
					     
					      	
					      		<th><p class="text-right">Room Type: <?=$row3->room_type?></p>
					      	<p class="text-right">Room No: <?=$row2->room_no?></p>
					     
					      	</th>
					      	
					   
					      <td class="text-right">Check In Date: <?=$row1->checkin?> <br> Check Out Date: <?=$row1->checkout?></td>
					      <td class="text-right">₹ <?=$row1->price+$row1->service_price?></td>
					      
					    </tr>
					   
					  </tbody>
					</table>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 col-sm-12 text-center text-md-left">
					<p class="lead">Pay Via Bank:</p>
					<div class="row">
						<div class="col-md-8">
						<table class="table table-borderless table-sm">
							<tbody>
								<tr>
									<td>Bank Name:</td>
									<td class="text-right"><?=$site->bankname?></td>
								</tr>
								<tr>
									<td>A/c Holders Name:</td>
									<td class="text-right"><?=$site->accountname?></td>
								</tr>
								<tr>
									<td>A/c No:</td>
									<td class="text-right"><?=$site->accountno?></td>
								</tr>
								<tr>
									<td>IFSC:</td>
									<td class="text-right"><?=$site->ifscno?></td>
								</tr>
							</tbody>
						</table>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-sm-12">
					<p class="lead">Total Price</p>
					<div class="table-responsive">
						<table class="table">
						  <tbody>
						  	<tr>
						  		<td>Sub Total (Inclusive of All Taxes)</td>
						  		<td class="text-right">₹ <?=$row1->price+$row1->service_price?></td>
						  	</tr>
						  	
						  	<?php
						  		$select4=mysqli_query($link,"SELECT * FROM ".$prefix."onlinepayment WHERE `booking_id`=".$row1->id);
						  		$i=0;
                               while($row4=mysqli_fetch_object($select4)){  
                               $i=$i+$row4->paidvalue;                	
                                ?>
						  	<tr>
						  		<td>Paid on <?=date("l jS \of F Y h:i:s A",strtotime($row4->paydate))?></td>
						  		
						  		<td class="text-right">₹ <?=$row4->paidvalue?></td>
						  	
						  	</tr>
						  	<?php }
						  	$due=($row1->price+$row1->service_price)-$i;
						  	
						  	 ?>
						  	
						  	<tr class="bg-grey bg-lighten-4">
						  	<?php	if($due>"0")
						  	{ ?>
						  		<td class="text-bold-800">Balance Due</td>
						  		<td class="text-bold-800 pink text-right">₹ <?=$due?></td>
						  	<?php } else {
						  		?>
							<td class="text-bold-800">Status</td>
						  		<td class="btn btn-success" style="background-color: green"><i class="fa fa-check"></i> PAID</td>

						  <?php 	} ?>
						  	</tr>
						  </tbody>
						</table>
					</div>
					<div class="text-center">
						<p>&nbsp;</p>
						<br><br><hr><br>
						<p><?=$site->site_title?> Signature</p>
						
						
						
					</div>
				</div>
			</div>
		</div>

		<!-- Invoice Footer -->
		<div id="invoice-footer">
			<div class="row">
				<div class="col-md-7 col-sm-12">
					<h4>Note: </h4>
					<p><?=htmlspecialchars_decode($site->terms)?></p>
				</div>
				
			</div>
		</div>
		<!--/ Invoice Footer -->
<?php }} ?>
	</div>
</section>
        </div>
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

   

    <footer class="footer footer-static footer-light navbar-shadow">
      <div class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span class="float-md-left d-block d-md-inline-block">2019  &copy; Copyright Reserved By <a class="text-bold-800 grey darken-2" href="https://sanchitainn.com/" target="_blank">Sanchita Inn</a></span>
        <ul class="list-inline float-md-right d-block d-md-inline-blockd-none d-lg-block mb-0">
          <a type="button" class="btn btn-danger" href="index.php">Back to Client Area</a>
          
         <button type="button" class="btn btn-primary" onclick="myFunction()">Print this page</button>
          
        </ul>
      </div>
    </footer>

    <!-- BEGIN VENDOR JS-->
    <script>
function myFunction() {
  window.print();
}
</script>
    <script src="../../../app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
    <script src="../../../app-assets/vendors/js/forms/toggle/switchery.min.js" type="text/javascript"></script>
    <script src="../../../app-assets/js/scripts/forms/switch.min.js" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script type="text/javascript" src="../../../app-assets/vendors/js/ui/jquery.sticky.js"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN CHAMELEON  JS-->
    <script src="../../../app-assets/js/core/app-menu.min.js" type="text/javascript"></script>
    <script src="../../../app-assets/js/core/app.min.js" type="text/javascript"></script>
    <script src="../../../app-assets/js/scripts/customizer.min.js" type="text/javascript"></script>
    <script src="../../../app-assets/vendors/js/jquery.sharrre.js" type="text/javascript"></script>
    <!-- END CHAMELEON  JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <!-- END PAGE LEVEL JS-->
  </body>


</html>