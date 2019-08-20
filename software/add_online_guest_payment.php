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
            <h3 class="content-header-title">PAYMENT</h3>
          </div>
          <div class="content-header-right col-md-8 col-12">
            <div class="breadcrumbs-top float-md-right">
              <div class="breadcrumb-wrapper mr-1">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Home</a>
                  </li>
                  <li class="breadcrumb-item"><a href="online_guest.php">Manage Guest</a>
                  </li>
                  <li class="breadcrumb-item active"><a href="onlinebookings.php?guest_id=<?=$_REQUEST['guest_id']?>&booking_id=<?=$_REQUEST['booking_id']?>">Online Guest Booking</a>
                  </li>
                  <li class="breadcrumb-item active"><a href="onlineguestpayment.php?booking_id=<?=$_REQUEST['booking_id']?>&payment=<?=$_REQUEST['payment']?>">Payment</a>
                  </li>
                  <li class="breadcrumb-item active">Add Payment
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
					<h4 class="card-title" id="basic-layout-round-controls">PAYMENT FOR BOOKING ID: SIB/2019/<?=$_REQUEST['booking_id']?></h4>
					<a class="heading-elements-toggle">
						<i class="la la-ellipsis-v font-medium-3"></i>
					</a>
					
				</div>
				<div class="card-content collapse show">
					<div class="card-body">

						<div class="card-text">
					<?php


                    if(isset($_POST['submit'])){
                    check_all_var(); //prevent mysql injection   

$select2=mysqli_query($link,"SELECT * FROM ".$prefix."onlinepayment 
	WHERE `booking_id`=".$_REQUEST['booking_id']);
$j=0;
while($fetch2=mysqli_fetch_object($select2))
{

$j=$j+$fetch2->paidvalue;

}

$due1=$_REQUEST['payment']-$j;

if($due1>=$_REQUEST['paidvalue'])
{
                    


                   
                    $query='';
                    foreach($_POST as $key=>$value) if($key != 'submit')$query .="`$key`='$value',";
                    $query = substr($query, 0, -1);//omit last comma

                     mysqli_query($link,"INSERT INTO ".$prefix."onlinepayment SET ".$query);//insert all text info
 echo '<p class="alert alert-success" id="success-alert"><i class="fa fa-check fa-fw"></i> Paid successfully.</p>';
}
else {

 echo '<p class="alert alert-danger" id="success-alert"><i class="fa fa-close fa-fw"></i> Be careful with your paid amount entry!</p>';

}
                    }

                    $select1=mysqli_query($link,"SELECT * FROM ".$prefix."onlinepayment 
	WHERE `booking_id`=".$_REQUEST['booking_id']);
$i=0;
while($fetch1=mysqli_fetch_object($select1))
{

$i=$i+$fetch1->paidvalue;

}

$due=$_REQUEST['payment']-$i;
                    
         
          
        
?>
						</div>

						<form class="form" method="post" enctype="multipart/form-data">
							<div class="form-body">
								<?php
                                $select=mysqli_query($link,"SELECT * FROM ".$prefix."online_booking WHERE `guest_id`=".$_REQUEST['guest_id']);
                               $row=mysqli_fetch_object($select);
                                ?>
							
								<div class="form-group">
									<input type="hidden" name="booking_id" value="<?=$_REQUEST['booking_id']?>">
									<input type="hidden" name="price" value="<?=$_REQUEST['payment']?>">
									<label for="complaintinput1">Net Payable</label>
									<input type="text" class="form-control round" value="₹<?=$_REQUEST['payment']?>" readonly="">
								</div>
								<div class="form-group">
									<label for="complaintinput1">Due Payment Value</label>
									<input type="text" class="form-control round" value="₹<?=$due?>" readonly="">
								</div>

							<?php if($due>'0')
							{ ?>	
								<div class="form-group">
									<label for="complaintinput1">Payment Value</label>
									<input type="text" class="form-control round" placeholder="Enter Payment Amount" name="paidvalue">
								</div>
							
							
								
							<div class="form-actions">
								
							
								<input type="submit" name="submit" class="btn btn-primary" value="Payment">
									
								
							</div>
							<?php } ?>
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
<script>
    function calculate() {
        
          //document.getElementById('result').value = myResult;
document.getElementById('result').value = document.getElementById('mrp').value - document.getElementById('entrysprice').value;

    }
</script>
    <?php include_once 'include/footer.php';?>