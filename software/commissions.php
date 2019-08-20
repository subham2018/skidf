<?php include_once 'include/head.php';
?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
     <?php include_once 'include/header.php';?>
<title><?=$site->site_title?> |  ADMIN PANEL</title>
  </head>
<?php include_once 'include/navbar.php';?>

    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
          <div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">Transaction Summary</h3>
          </div>
          <div class="content-header-right col-md-8 col-12">
            <div class="breadcrumbs-top float-md-right">
              <div class="breadcrumb-wrapper mr-1">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Home</a>
                  </li>
                  
                  <li class="breadcrumb-item">Transactions
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
	                <h4 class="card-title">Earnings and Transactions</h4>
					
	                <a class="heading-elements-toggle"></a>
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
					
                    
	              
				   
	                <table class="table table-striped table-bordered sourced-data">
					        <thead>
					            <tr>
					                <th>Transaction ID</th>
					                <th>Transaction Date</th>
					                <th>Credited For Customer</th>
					                <th>For Activity</th>
					                <th>Amount (INR)</th>
					                
					                
					                
									
					            </tr>
					        </thead>
					        <tbody>
<?php
// $select=mysqli_query($link,"SELECT * FROM ".$prefix."loan_repayment WHERE `retailer_id`=".$user->id);
// while($row=mysqli_fetch_object($select)){

$select1=mysqli_query($link,"SELECT * FROM ".$prefix."ret_transaction  ORDER BY `id` DESC");
while($row1=mysqli_fetch_object($select1)){


?>
					            <tr>
					        <td>TXN-SK-<?=$row1->id?>
					        
					                </td>
					                 <td><?=$row1->date?>
					        
					                </td>
					                
					               <td><?=anything('register','name',$row1->child_id)?></td>
					               <td><?=$row1->purpose?></td>
					               <td>INR <?=$row1->amount?></td>
					              
									
									
									 
					            </tr>
								<?php }?>
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