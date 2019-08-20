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
            <h3 class="content-header-title">Bookings for <?=anything('guest','name',$_REQUEST['guest_id'])?></h3>
          </div>
          <div class="content-header-right col-md-8 col-12">
            <div class="breadcrumbs-top float-md-right">
              <div class="breadcrumb-wrapper mr-1">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Home</a>
                  </li>
                  
                  <li class="breadcrumb-item active">Manage Bookings
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
	                <h4 class="card-title">Booking List</h4>
					
	                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
        			<div class="heading-elements">
	                    <ul class="list-inline mb-0">
	                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
	                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
	                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
	                        <li><a data-action="close"><i class="ft-x"></i></a></li>
	                    </ul>
	                </div>
	            </div>
	            <div class="card-content collpase show">
	                <div class="card-body card-dashboard">
					<?php
			          if(isset($_GET['status'])){
                    
                     
                    mysqli_query($link,"UPDATE ".$prefix."bookings SET `status`='".$_REQUEST['status']."' WHERE `id`=".$_REQUEST['id']);
					//update info
                         
                        echo '<p class="alert alert-success" id="success-alert"><i class="fa fa-check fa-fw"></i> Updated successfully.</p>';
                    
                }

			          if(isset($_GET['del'])){
                    
                     
                    if(mysqli_query($link,"DELETE FROM ".$prefix."booking WHERE id=".variable_check($_GET['del']))){ //deilete info
                         
                        echo '<p class="alert alert-danger" id="success-alert"><i class="fa fa-check fa-fw"></i> Deleted successfully.</p>';
                    }
                    else echo '<p class="alert alert-danger" id="success-alert"><i class="fa fa-warning fa-fw"></i> Sorry! There is an error while deleting!</p>';
                }
                ?>
                    
	              <a href="add_booking.php?guest_id=<?=$_REQUEST['guest_id']?>"  style="width:260px;" class="btn btn-glow btn-bg-gradient-x-purple-red col-6 col-md-5 mr-1 mb-1"> New Walk In Booking</a>
				   
	                <table class="table table-striped table-bordered sourced-data">
					        <thead>
					            <tr>
					                           <th class="center"> BookingID </th>
					                           <th class="center"> GuestID</th>
					                            <th class="center"> Room  </th>
                                                
                                                <th class="center"> PAX </th>
                                                <th class="center"> Services </th>
                                                
										        <th class="center"> Accomodation </th>
										        
										         <th class="center"> Days </th>
										         <th class="center"> Pay </th>

												<th class="center"> Action </th>
					            </tr>
					        </thead>
					        <tbody>
							<?php
							
                                $select1=mysqli_query($link,"SELECT * FROM ".$prefix."booking WHERE `guest_id`=".$_REQUEST['guest_id']);
                               while($row1=mysqli_fetch_object($select1)){
             $select2=mysqli_query($link,"SELECT * FROM ".$prefix."rooms WHERE `id`=".$row1->room_id);
                               $row2=mysqli_fetch_object($select2);
             $select3=mysqli_query($link,"SELECT * FROM ".$prefix."room_type WHERE `id`=".$row2->room_id);
                               $row3=mysqli_fetch_object($select3);                 	
                                ?>
					            <tr>
					            	<td class="center">SIB/2019/00<?=$row1->id?></td>
					               <td class="center">SI/
					               	<?php if($row->type=="Online")
					               	{
					               		echo "O";
					               	}
					               	else {
					               		echo "W";
					               	}
					               	?>/2019/<?=$row1->guest_id?></td>
					               <td class="center"><?=$row3->room_type?><br>
					               	<?=$row2->room_no?></td>
												
												<td class="center">Adult:<?=$row1->adult?><br>Child:<?=$row1->child?></td>
												<td class="center"><?=$row1->service_addon?><br> Add on Price: ₹<?=$row1->service_price?><br>
											<a class="btn btn-warning round btn-min-width mr-1 mb-1" href="offlineservice_edit.php?id=<?=$row1->id?>&guest_id=<?=$row1->guest_id?>">
							Edit</a></td>
												
												<td class="center">From: <?=$row1->checkin?><br>To: <?=$row1->checkout?></td>
												<?php 
			$diff=mysqli_query($link,"SELECT `id`,`checkin`,`checkout`,(TO_DAYS(checkout) - TO_DAYS(checkin)) AS no_days FROM soinit_booking WHERE `id`=".$row1->id);
			$row8=mysqli_fetch_object($diff);		
												?>

												<td class="center"><?=$row8->no_days?></td>
												<?php $x=$row1->price;
												       //$y=$row8->no_days;
												       $z=$row1->service_price;
												       $m=$x+$z;?>
												<td class="center">₹ <?=$m?></td>
											

												<td class="center">
													
						<?php 
						$i=0;
						$select4=mysqli_query($link,"SELECT * FROM ".$prefix."payment WHERE `booking_id`=".$row1->id);
                               while($row4=mysqli_fetch_object($select4)){

                               	$i=$i+$row4->paidvalue;

                               }
                               if($i<$m && $i!="" && $i!=$m)
                               {
                               	?>
						<a class="btn btn-warning round btn-min-width mr-1 mb-1"><font color="white">Partially Paid</font></a>
					<?php } else if($i=="") { ?>
						<a class="btn btn-danger round btn-min-width mr-1 mb-1"><font color="white">UnPaid</font></a>
						<?php } else { ?>
							<a class="btn btn-success round btn-min-width mr-1 mb-1"><font color="white">Full Paid</font></a>

						<?php } ?>


						<a class="btn btn-outline-warning round btn-min-width mr-1 mb-1" href="payment.php?booking_id=<?=$row1->id?>&payment=<?=$m ?>">
							Payment</a>
							<a class="btn btn-outline-success round btn-min-width mr-1 mb-1" href="invoice.php?booking_id=<?=$row1->id?>&guest_id=<?=$_REQUEST['guest_id']?>">
							Invoice</a>		
									
                            <a class="btn btn-outline-danger round btn-min-width mr-1 mb-1" href="?del=<?=$row->id?>">
							Delete</a>
												
													
													
												</td>
					            </tr>
								<?php } ?>
					        </tbody>
					       
					    </table>
					</div>
	            </div>
	        </div>
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
        </div>
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

    
    
	<script type="text/javascript">
$("#success-alert").fadeTo(3000, 500).slideUp(500, function(){
    $("#success-alert").slideUp(500);
});
</script>

    <?php include_once 'include/footer.php';?>