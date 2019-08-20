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
            <h3 class="content-header-title">Payment for <?=anything('user','name',$_REQUEST['guest_id'])?></h3>
          </div>
          <div class="content-header-right col-md-8 col-12">
            <div class="breadcrumbs-top float-md-right">
              <div class="breadcrumb-wrapper mr-1">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Home</a>
                  </li>
                  <li class="breadcrumb-item"><a href="onlinebookings.php?guest_id=<?=$_REQUEST['guest_id']?>&booking_id=<?=$_REQUEST['booking_id']?>">Manage Bookings</a>
                  </li>
                  
                  <li class="breadcrumb-item active">Payment
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
	                <h4 class="card-title">Payment Calculation</h4>
					
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
                    
                     
                    if(mysqli_query($link,"DELETE FROM ".$prefix."payment WHERE id=".variable_check($_GET['del']))){ //deilete info
                         
                        echo '<p class="alert alert-danger" id="success-alert"><i class="fa fa-check fa-fw"></i> Deleted successfully.</p>';
                    }
                    else echo '<p class="alert alert-danger" id="success-alert"><i class="fa fa-warning fa-fw"></i> Sorry! There is an error while deleting!</p>';
                }
                ?>
                    
	              <a href="add_online_guest_payment.php?booking_id=<?=$_REQUEST['booking_id']?>&payment=<?=$_REQUEST['payment']?>&guest_id=<?=$_REQUEST['guest_id']?>"  style="width:260px;" class="btn btn-glow btn-bg-gradient-x-purple-red col-6 col-md-5 mr-1 mb-1">Add Payment</a>
				   
	                <table class="table table-striped table-bordered sourced-data">
					        <thead>
					            <tr>
					                           <th class="center"> Booking ID </th>
					                           
					                            <th class="center"> Net Payable </th>
					                            <th class="center"> Date of Pay </th>
                                                <th class="center"> Paid Amount </th>
                                               
                                                
												<th class="center"> Action </th>
					            </tr>
					        </thead>
					        <tbody>
							<?php
							
                                $select1=mysqli_query($link,"SELECT * FROM ".$prefix."onlinepayment WHERE `booking_id`=".$_REQUEST['booking_id']);
                               while($row1=mysqli_fetch_object($select1)){
                           	
                                ?>
					            <tr>
					              
					               <td class="center">SIB/2019/00<?=$row1->booking_id?></td>
					               				
												<td class="center">₹<?=$row1->price?></td>
												<td class="center"><?=$row1->paydate?></td>
												<td class="center">₹<?=$row1->paidvalue?></td>
												
												<td class="center">
													
							
									
                            <a class="btn btn-outline-danger round btn-min-width mr-1 mb-1" href="?booking_id=<?=$_REQUEST['booking_id']?>&payment=<?=$_REQUEST['payment']?>&del=<?=$row1->id?>">
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