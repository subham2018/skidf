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
                  <li class="breadcrumb-item"><a href="reguser.php">Registered Users</a>
                  </li>
                  <li class="breadcrumb-item active">View / Update Bank Details
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
					<h4 class="card-title" id="basic-layout-round-controls">Registered User Bank Details</h4>
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

                     mysqli_query($link,"UPDATE ".$prefix."register_kyc SET ".$query." WHERE id=".$_POST['bid']);//insert all text info
                        echo '<p class="alert alert-success" id="success-alert"><i class="fa fa-check fa-fw"></i> Update successfully.</p>';
                    header("Location: reguser.php");
          }
          
        
?>
						</div>

						<form class="form" method="post" enctype="multipart/form-data">
							<div class="form-body">
							<?php
                                $select=mysqli_query($link,"SELECT * FROM ".$prefix."register_bank WHERE `reg_id`=".$_REQUEST['id']);
                               $row=mysqli_fetch_object($select);
                                ?>
                   <input type="hidden" value="<?=$row->id?>" name="bid" required>  

								<div class="form-group">
									
									
									<label for="complaintinput1">Account Holder</label>
									<input type="text" id="complaintinput1" class="form-control round" placeholder="Not Submitted" value="<?=$row->account_holder?>" readonly>

									<label for="complaintinput1">Account No.</label>
									<input type="text" id="complaintinput1" class="form-control round" placeholder="Not Submitted"  value="<?=$row->account_no?>" readonly>

									<label for="complaintinput1">IFSC</label>
									<input type="text" id="complaintinput1" class="form-control round" placeholder="Not Submitted" value="<?=$row->ifsc?>" readonly>

									<label for="complaintinput1">Account Type</label>
									<input type="text" id="complaintinput1" class="form-control round" placeholder="Not Submitted"  value="<?=$row->account_type?>" readonly>

									<label for="complaintinput1">Bank Name</label>
									<input type="text" id="complaintinput1" class="form-control round" placeholder="Not Submitted"  value="<?=$row->bank_name?>" readonly>

									<label for="complaintinput1">Branch Name</label>
									<input type="text" id="complaintinput1" class="form-control round" placeholder="Not Submitted" value="<?=$row->branch_name?>" readonly>
									
                               
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