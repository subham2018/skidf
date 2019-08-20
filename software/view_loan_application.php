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
            <h3 class="content-header-title">VIEW BANK DETAILS</h3>
          </div>
          <div class="content-header-right col-md-8 col-12">
            <div class="breadcrumbs-top float-md-right">
              <div class="breadcrumb-wrapper mr-1">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Home</a>
                  </li>
                  <li class="breadcrumb-item"><a href="loan_application.php">Loan Applications</a>
                  </li>
                  <li class="breadcrumb-item active">View / Update Loan Application
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
					<h4 class="card-title" id="basic-layout-round-controls">Loan Application Details</h4>
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
                    if(isset($_POST['usubmit'])){
                    check_all_var(); //prevent mysql injection              
                   
                    $query='';
                    foreach($_POST as $key=>$value) if($key != 'usubmit')if($key != "bid")$query .="`$key`='$value',";
                    $query = substr($query, 0, -1);//omit last comma

                     mysqli_query($link,"UPDATE ".$prefix."loan_application SET ".$query." WHERE id=".$_POST['bid']);//insert all text info
                        echo '<p class="alert alert-success" id="success-alert"><i class="fa fa-check fa-fw"></i> Update successfully.</p>';
                    header("Location: loan_application.php");
          }
          
        
?>
						</div>

						<form class="form" method="post" enctype="multipart/form-data">
							<div class="form-body">
							<?php
                                $select=mysqli_query($link,"SELECT * FROM ".$prefix."loan_application WHERE `id`=".$_REQUEST['id']);
                               $row=mysqli_fetch_object($select);
                                ?>
                   <input type="hidden" value="<?=$row->id?>" name="bid" required> 
                   <input type="hidden" value="<?=$row->customer_id?>" name="customer_id" required>
                   <input type="hidden" value="<?=$row->loan_mcat_id?>" name="loan_mcat_id" required>
                   <input type="hidden" value="<?=$row->retailer_id?>" name="retailer_id" required> 

								<div class="form-group">
									
									
									<label for="complaintinput1">Customer Name</label>
									<input type="text" class="form-control round" placeholder="Not Submitted" value="<?=anything('register','name',$row->customer_id)?>" readonly>
									

									<label for="complaintinput1">Customer Phone No.</label>
									<input type="text" class="form-control round" placeholder="Not Submitted" value="<?=anything('register','phone',$row->customer_id)?>" readonly>

									<label for="complaintinput1">Retailer Reference No.</label>
									<input type="text" class="form-control round" placeholder="Not Submitted" value="<?=anything('register','reference_no',$row->customer_id)?>" readonly>

									<label for="complaintinput1">Retailer Name.</label>
									<input type="text" class="form-control round" placeholder="Not Submitted" value="<?=separatecol('retailer_user','name','token',anything('register','reference_no',$row->customer_id))?>" readonly>

									<label for="complaintinput1">Loan Ref No.</label>
									<input type="text" id="complaintinput1" class="form-control round" placeholder="Not Submitted"  value="LP-<?=$row->id?>" readonly>

									<label for="complaintinput1">Loan Category</label>
									<input type="text" id="complaintinput1" class="form-control round" placeholder="Not Submitted"  value="<?=anything('m_loan_category','category_name',$row->loan_mcat_id)?>" readonly>

									<label for="complaintinput1">Loan Request Amount</label>
									<input type="text" id="complaintinput1" class="form-control round" placeholder="Not Submitted" value="INR <?=$row->request_amount?>" readonly>

									<br><br>

									<h5>Update Details</h5>
									<hr>

									<div class="form-group">
								<label for="complaintinput5">Allocate Loan Type</label>

								<select name="loan_subcat_id" class="form-control round">
									<?php 
									$select1=mysqli_query($link,"SELECT * FROM ".$prefix."loan_category WHERE `m_category`=".$row->loan_mcat_id);
                               while($row1=mysqli_fetch_object($select1)){

									?>
									<option value="<?=$row1->id?>" <?php if($row->loan_subcat_id==$row1->id){?> selected <?php }?>><?=$row1->loan_name?></option>
									<?php } ?>
								</select>
								
							</div>


									<label for="complaintinput1">Loan Sanction Amount</label>
									<input type="text" id="complaintinput1" name="sanction_amount" placeholder="Loan Sanction amount here" class="form-control round" value="<?=$row->sanction_amount?>" required>

									

									<label for="complaintinput1">Loan Sanction Date</label>
									<input type="date" id="complaintinput1" name="sanction_time" placeholder="Loan Sanction date here" class="form-control round" value="<?=$row->sanction_time?>" required>

									<label for="complaintinput1">Special Note</label>
									<input type="text" id="complaintinput1" name="note" placeholder="Write Note here" class="form-control round" value="<?=$row->note?>" required>

									<div class="form-group">
								<label for="complaintinput5">Sanction Status</label>
								<fieldset>
							<label>Approve</label>
		                     <input type="radio" name="sanction_status"  value="1" id="radio1" <?php if($row->sanction_status=="1"){?> checked <?php }?>>
									
								</fieldset>
							<label for="complaintinput5"></label>
								<fieldset>
									<label>Pending</label>
									<input type="radio" name="sanction_status" value="0" id="radio1" <?php if($row->sanction_status=="0"){?> checked <?php } ?>>
									
								</fieldset>
			
							</div>

							<label for="complaintinput1">Repay Status</label>
									<input type="text" id="complaintinput1" name="repay_status" placeholder="Paid / Unpaid" class="form-control round" value="<?=$row->repay_status?>" required>
									
                               
                             </div>
									
			
									

<div class="form-actions">
								
							
								<button type="submit" name="usubmit" class="btn btn-primary">
									<i class="ft-user-check"></i> UPDATE
								</button>
							</div>
								
								
						</div>
					</form>
								
            </div>


							

						</form>
					</div>
				</div>
			</div>
		</div>
  </center>
</div><br><br><br><br><br><br><br><br><br><br>
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