<?php include_once 'include/head.php';?>
<!DOCTYPE html>
<html class="loading" lang="en">
<head>
    <?php include "include/header.php"?>
    <title><?=$site->site_title?> | Admin Panel</title>
    
    
    <!-- END Custom CSS-->
  </head>
 <?php include "include/navbar.php"?>

    <div class="app-content content">
      <div class="content-wrapper">
        
        <div class="content-body"><!-- Revenue, Hit Rate & Deals -->

    
    
	<div class="row">
    <!-- <div class="col-md-12 col-lg-8">
        <div class="card">
            <div class="card-header p-1">
                <h4 class="card-title float-left">Room Types<span class="blue-grey lighten-2 font-small-3 mb-0"> Total Counts</span></h4>
                <span class="badge badge-pill badge-info float-right m-0"></span>
            </div>
            <div class="card-content collapse show">
                <div class="card-footer text-center p-1">
                    <div class="row">
                    <?php ?>

                       
                        <div class="col-md-4 col-12 border-right-blue-grey border-right-lighten-5 text-center">
                            <p class="blue-grey lighten-2 mb-0">Standard Rooms </p>
                            <p class="font-medium-5 text-bold-400"><?=count_rows('rooms','room_id','13')?></p>
                        </div>
                        <div class="col-md-4 col-12 border-right-blue-grey border-right-lighten-5 text-center">
                            <p class="blue-grey lighten-2 mb-0">Classic Rooms</p>
                            <p class="font-medium-5 text-bold-400"><?=count_rows('rooms','room_id','16')?></p>
                        </div>
                       
                        <div class="col-md-4 col-12 text-center">
                            <p class="blue-grey lighten-2 mb-0">Deluxe Rooms</p>
                            <p class="font-medium-5 text-bold-400"><?=count_rows('rooms','room_id','10')?></p>
                        </div>
                    </div>
                    <hr>
                    <span class="text-muted">All above figures and statistics are system driven statistics</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-lg-4">
        <div class="card pull-up border-top-info border-top-3 rounded-0">
            <div class="card-header">
                <h4 class="card-title">Total Online Guests<a href="guest.php"><span class="badge badge-pill badge-info float-right m-0">Explore</span></a></h4>
            </div>
            <div class="card-content collapse show">
                <div class="card-body p-1">
                    <h4 class="font-large-1 text-bold-400"><?=count_rows('guest','registration_type','Online')?><i class="ft-users float-right"></i></h4>
                </div>
                <div class="card-footer p-1">
                    
                </div>
            </div>
        </div>
    </div> -->
</div>

       <div class="row">
		 <div class="col-md-12 col-lg-6">
        <div class="card pull-up border-top-info border-top-3 rounded-0">
            <div class="card-header">
                <h4 class="card-title">Pending Approval Registered Users<a href="guest.php"><span class="badge badge-pill badge-info float-right m-0">Explore</span></a></h4>
            </div>
            <div class="card-content collapse show">
                <div class="card-body p-1">
                    <h4 class="font-large-1 text-bold-400"><?=count_rows('register','status','pending')?><i class="ft-users float-right"></i></h4>
                </div>
                <div class="card-footer p-1">
                    <h4 class="card-title"><?=mysqli_num_rows(mysqli_query($link,"SELECT `ip` FROM ".$prefix."visitors"))?> Total Website Visitors</h4> 
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-lg-6">
         <div class="card pull-up border-top-info border-top-3 rounded-0">
            <div class="card-header">
                <h4 class="card-title">Pin Purchased Registered Users<a href="guest.php"><span class="badge badge-pill badge-info float-right m-0">Explore</span></a></h4>
            </div>
            <div class="card-content collapse show">
                <div class="card-body p-1">
                    <h4 class="font-large-1 text-bold-400"><?=count_rows('register','status','approve')?><i class="ft-users float-right"></i></h4>
                </div>
                <div class="card-footer p-1">
                    <h4 class="card-title">The users who have purchased pins</h4> 
                </div>
            </div>
        </div>
    </div>
        
        
          <!--   <div class="col-md-12 col-lg-4">
                <div class="card pull-up bg-gradient-directional-warning">
                    <div class="card-header bg-hexagons-danger">
                        <h4 class="card-title white">Total Bookings</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li>
                                    <a class="btn btn-sm btn-white danger box-shadow-1 round btn-min-width pull-right" href="bookings_all.php" target="_blank">Explore <i class="ft-bar-chart pl-1"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content collapse show bg-hexagons-danger">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="align-self-center width-100">
                                    <div id="Analytics-donut-chart" class="height-100 donutShadow"></div>
                                </div>
                                <div class="media-body text-right mt-1">
                                 <h3 class="font-large-2 white"><?=count_rows_all('booking')?></h3>
                                    <h6 class="mt-1"><span class="text-muted white">No. of Consolidated Bookings</span></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

             <div class="col-md-12 col-lg-4">
                <div class="card pull-up bg-gradient-directional-primary">
                    <div class="card-header bg-hexagons-danger">
                        <h4 class="card-title white">Total Payments Secured</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                       
                    </div>
                    <div class="card-content collapse show bg-hexagons-danger">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="align-self-center width-100">
                                    <div id="Analytics-donut-chart" class="height-100 donutShadow"></div>
                                </div>
                                <div class="media-body text-right mt-1">
                                    <h3 class="font-large-2 white">
                                        ₹ <?=sum_column('payment','paidvalue')?></h3>
                                    <h6 class="mt-1"><span class="text-muted white">Net Paid Consolidated Amount</span></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  -->

            
			
        </div>
    </div>
</div>
<!--/ Revenue, Hit Rate & Deals -->
<!-- Emails Products & Avg Deals -->

</div>
   

<?php include "include/footer.php"?>

    