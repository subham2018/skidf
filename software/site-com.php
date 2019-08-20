<?php include_once 'include/head.php';?>
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
            <h3 class="content-header-title">View / Update Commissions</h3>
          </div>
          <div class="content-header-right col-md-8 col-12">
            <div class="breadcrumbs-top float-md-right">
              <div class="breadcrumb-wrapper mr-1">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Home</a>
                  </li>
                  
                  <li class="breadcrumb-item ">View / Update Commissions
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
					<h4 class="card-title" id="basic-layout-round-controls">View / Update Commissions</h4>
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

                     mysqli_query($link,"UPDATE ".$prefix."commission SET ".$query." WHERE id=".$_POST['bid']);//insert all text info
                        echo '<p class="alert alert-success" id="success-alert"><i class="fa fa-check fa-fw"></i> Updated successfully.</p>';
                    
          }
          
        
?>
						</div>

						<form class="form" method="post" enctype="multipart/form-data">
							<div class="form-body">
							<?php
                                $select=mysqli_query($link,"SELECT * FROM ".$prefix."commission WHERE `id`='1'");
                               $row=mysqli_fetch_object($select);
                                ?>
                   <input type="hidden" value="1" name="bid" required>  

			<div class="form-group">
									
				<label for="complaintinput1">LEVEL 1 (%)</label>
				<input type="text" id="complaintinput1" class="form-control round" placeholder="Enter Percent" name="level_1" value="<?=$row->level_1?>">
				<hr>
				
				<label for="complaintinput1">LEVEL 2 (%)</label>
				<input type="text" id="complaintinput1" class="form-control round" placeholder="Enter Percent" name="level_2" value="<?=$row->level_2?>">
				<hr>
				
				<label for="complaintinput1">LEVEL 3 (%)</label>
				<input type="text" id="complaintinput1" class="form-control round" placeholder="Enter Percent" name="level_3" value="<?=$row->level_3?>">
				<hr>
				
				<label for="complaintinput1">LEVEL 4 (%)</label>
				<input type="text" id="complaintinput1" class="form-control round" placeholder="Enter Percent" name="level_4" value="<?=$row->level_4?>">
				<hr>
				
				<label for="complaintinput1">LEVEL 5 (%)</label>
				<input type="text" id="complaintinput1" class="form-control round" placeholder="Enter Percent" name="level_5" value="<?=$row->level_5?>">
				<hr>

				<label for="complaintinput1">LEVEL 6 (%)</label>
				<input type="text" id="complaintinput1" class="form-control round" placeholder="Enter Percent" name="level_6" value="<?=$row->level_6?>">
				<hr>

				<label for="complaintinput1">LEVEL 7 (%)</label>
				<input type="text" id="complaintinput1" class="form-control round" placeholder="Enter Percent" name="level_7" value="<?=$row->level_7?>">
				<hr>

				<label for="complaintinput1">LEVEL 8 (%)</label>
				<input type="text" id="complaintinput1" class="form-control round" placeholder="Enter Percent" name="level_8" value="<?=$row->level_8?>">
				<hr>

				<label for="complaintinput1">LEVEL 9 (%)</label>
				<input type="text" id="complaintinput1" class="form-control round" placeholder="Enter Percent" name="level_9" value="<?=$row->level_9?>">
				<hr>

				<label for="complaintinput1">LEVEL 10 (%)</label>
				<input type="text" id="complaintinput1" class="form-control round" placeholder="Enter Percent" name="level_10" value="<?=$row->level_10?>">

			</div>

								
            </div>

							<div class="form-actions">
								<a href="index.php" class="btn btn-danger mr-1" >
									<i class="ft-arrow-left"></i> Back
								</a>
							
								<button type="submit" name="usubmit" class="btn btn-primary">
									<i class="ft-user-check"></i> Save
								</button>
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