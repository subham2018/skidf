<?php include_once 'include/head.php';
error_reporting(0);
function randomString($length) {
  $str = "";
  $characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
  $max = count($characters) - 1;
  for ($i = 0; $i < $length; $i++) {
    $rand = mt_rand(0, $max);
    $str .= $characters[$rand];
  }
  return $str;
}
?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
     <?php include_once 'include/header.php';?>
<title><?=$site->site_title?> | SOFTWARE</title>
  </head>
<?php include_once 'include/navbar.php';?>

    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
          <div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">CUSTOMER REPAYMENTS</h3>
          </div>
          <div class="content-header-right col-md-8 col-12">
            <div class="breadcrumbs-top float-md-right">
              <div class="breadcrumb-wrapper mr-1">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Home</a>
                  </li>
                  <li class="breadcrumb-item"><a href="repayment-view.php">Customer Repayments</a>
                  </li>
                  <li class="breadcrumb-item active">Customer Repayments
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
					<h4 class="card-title" id="basic-layout-round-controls">Customer Repayment Entry</h4>
					
					
				</div>
				<div class="card-content collapse show">
					<div class="card-body">

						<div class="card-text">
						    <?php
                    if(isset($_POST['asubmit'])){




                    check_all_var(); //prevent mysql injection              
                   
                    $query='';
                    foreach($_POST as $key=>$value) if($key != 'asubmit')if($key != "id")$query .="`$key`='$value',";
                    $query = substr($query, 0, -1);//omit last comma

                     mysqli_query($link,"UPDATE ".$prefix."loan_repayment SET ".$query." WHERE id=".$_POST['id']);
                     
                    




 //WALLET CODE

                     //VARIABLES
                     $retailer_id=$_POST['retailer_id'];

                     $distributor_token=anything('retailer_user','reference_no',$retailer_id);
                     $distributor_id=separatecol('distributor_user', 'id', 'token', $distributor_token);
                     //separatecol($table,$field,$sepid,$id)

                      $mdistributor_token=anything('distributor_user','reference_no',$distributor_id);
                     $mdistributor_id=separatecol('md_user', 'id', 'token', $mdistributor_token);
                     //separatecol($table,$field,$sepid,$id)

                     $dsa_token=anything('md_user','reference_no',$mdistributor_id);
                     $dsa_id=separatecol('dsa_user', 'id', 'token', $dsa_token);
                     //separatecol($table,$field,$sepid,$id)

                     $customer_id=anything('loan_application','customer_id',$_POST['loan_id']);
                     $rcommission=anything('commission','r_emi','1')*$_POST['amount']/100;
                      $dcommission=anything('commission','d_emi','1')*$_POST['amount']/100;
                       $mdcommission=anything('commission','md_emi','1')*$_POST['amount']/100;
                        $dsacommission=anything('commission','dsa_emi','1')*$_POST['amount']/100;


 //RETAILER EMI %
          mysqli_query($link,"INSERT INTO `soinit_ret_transaction`(`self_id`, `child_id`, `purpose`, `amount`) VALUES ('".$retailer_id."','".$customer_id."','EMI Commission','".$rcommission."')");
                    

                     //DISTRIBUTOR EMI %
                mysqli_query($link,"INSERT INTO `soinit_dis_transaction`(`self_id`, `child_id`, `purpose`, `amount`) VALUES ('".$distributor_id."','".$retailer_id."','EMI Commission','".$dcommission."')");

                     //MASTER DISTRIBUTOR EMI %
                   mysqli_query($link,"INSERT INTO `soinit_md_transaction`(`self_id`, `child_id`, `purpose`, `amount`) VALUES ('".$mdistributor_id."','".$distributor_id."','EMI Commission','".$mdcommission."')");

                     //DSA EMI %
                 mysqli_query($link,"INSERT INTO `soinit_dsa_transaction`(`self_id`, `child_id`, `purpose`, `amount`) VALUES ('".$dsa_id."','".$mdistributor_id."','EMI Commission','".$dsacommission."')");







                        echo '<p class="alert alert-success" id="success-alert"><i class="fa fa-check fa-fw"></i> Approved successfully.</p>';
                    
          }
          
        
?>
						</div>

					
							<div class="form-body">
							       

								<div class="form-group">
                  <label for="complaintinput2">Loan Reference ID</label>
           <div class="col-md-6">
 LP- <?=$_REQUEST['loan_id']?>
           </div>
                </div>

                   <div class="form-group" style="background-color: #dfe6e9">
                  
                 <?php
                  $p = anything('loan_application','sanction_amount',$_REQUEST['loan_id']);
                        $r = anything('loan_category','interest_percent',anything('loan_application','loan_subcat_id',$_REQUEST['loan_id']));
                        $repayt = anything('loan_category','loan_repaydays',anything('loan_application','loan_subcat_id',$_REQUEST['loan_id']));
                         $t = anything('loan_category','interest_period',anything('loan_application','loan_subcat_id',$_REQUEST['loan_id']));
                         
                         $ipart=$p*$r/100;
                        
                        // I = RxP /100

                         $ppart=$p*$t/$repayt;

                         $apart=round($ipart+$ppart);

                         $diff=$repayt/$t;
                         $tpart=$apart*$diff;
?>

<label for="complaintinput2">EMI / <?=$t?> days</label>INR <?=$apart?> 
                </div>

                 <div class="form-group" style="background-color: #F8EFBA">
                  
              

<label for="complaintinput2">Total Repay Amount:</label>INR <?=$tpart?>
                </div>
                <div class="form-group" style="background-color: #55E6C1">

                  <?php
               $select1=mysqli_query($link,"SELECT * FROM ".$prefix."loan_repayment WHERE `loan_id`=".$_REQUEST['loan_id']);
               $paid=0;
                               while($row1=mysqli_fetch_object($select1)){
                                
                                $paid=$paid+$row1->amount;

                                    }
                                ?>
                  
                <label for="complaintinput2">Paid till date:</label>INR <?=@$paid?>
                </div>
                 <div class="form-group" style="background-color: #f8a5c2">
                  
              

<label for="complaintinput2">Balance to be paid:</label>INR <?=$tpart-$paid?> 
                </div>


               

             
							
						</form>
					
				
  </center>


</div>





<table class="table table-striped table-bordered sourced-data col-md-6" style="background-color: #55E6C1">
                  <thead>
                      <tr>
                          <th>Repay Amount</th>
                          <th>Date</th>
                          <th>Retailer Receipt</th>
                          <th>Customer Receipt</th>
                          <th>Status</th>
                          
                      </tr>
                  </thead>
                  <tbody>
              <?php
               $select=mysqli_query($link,"SELECT * FROM ".$prefix."loan_repayment WHERE `loan_id`=".$_REQUEST['loan_id']." ORDER BY `id` DESC");
                               while($row=mysqli_fetch_object($select)){

                                ?>
                      <tr>
                        
                          <td><?=$row->amount?></td>
                          <td><?=$row->datetime?></td>
                          <td><a href="receipt.php?id=<?=$row->id?>&loan_id=<?=$_REQUEST['loan_id']?>" class="btn btn-success">VIEW / DOWNLOAD RECEIPTS</a></td>
                          <td>
                            <?php if ($row->image=="") { ?>

                              
                            <center><img src="upload/original/noimg.jpeg" width="70px"></center>
                        

                        <?php } else { ?>

                           <a href="<?=UPLOAD_IMG_PATH.$row->image?>">
                           <center> <img src="<?=UPLOAD_IMG_PATH.$row->image?>" width="70px"></center>
                          </a>

                        <?php } ?>
                          </td>
                         <td>
                          <?php if($row->status=='0') { ?>  

                        <form action="" method="post" enctype="multipart/form-data">
                            <input type="hidden" value="<?=$row->id?>" name="id">
                            <input type="hidden" value="1" name="status">
                            
                            <input type="hidden" value="<?=$row->retailer_id?>" name="retailer_id">
                            <input type="hidden" value="<?=$row->image?>" name="image">
                            <input type="hidden" value="<?=$row->loan_id?>" name="loan_id">
                            <input type="hidden" value="<?=$row->amount?>" name="amount">
                            <input type="hidden" value="<?=$row->token?>" name="token">
                            <input type="submit" value="Click to Approve" name="asubmit" class="btn btn-success">
                        </form>

                      <?php } else { ?> <i class="fas fa-check-circle"></i> <?php } ?>


                             



                       </td>
                         
                  
                      </tr>
                <?php } ?>
                  </tbody>
                 
              </table>


<style>
label
{
  float: left;
  width: 12em;
  margin-right: 1em;
}
#radio1
{
	float: left;
	margin-top: 5px;
	
}	
</style>
   
    <script type="text/javascript">
$("#success-alert").fadeTo(3000, 500).slideUp(500, function(){
    $("#success-alert").slideUp(500);
});
</script>
 <?php include_once 'include/footer.php';?>