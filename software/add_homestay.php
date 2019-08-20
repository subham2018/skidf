<?php include_once 'include/head.php';?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
     <?php include_once 'include/header.php';?>
<title>PANCHGANI | ADMIN PANEL</title>
  </head>
<?php include_once 'include/navbar.php';?>

    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
          <div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">ADD BANNER LIST</h3>
          </div>
          <div class="content-header-right col-md-8 col-12">
            <div class="breadcrumbs-top float-md-right">
              <div class="breadcrumb-wrapper mr-1">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Home</a>
                  </li>
                  <li class="breadcrumb-item"><a href="banner.php">Banner</a>
                  </li>
                  <li class="breadcrumb-item active">Banner List
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
					<h4 class="card-title" id="basic-layout-round-controls">ADD BANNER LIST</h4>
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
                    if(isset($_POST['submit'])){
                    check_all_var(); //prevent mysql injection              
                    
                                                      
                         $query='';
                        foreach($_POST as $key=>$value) if($key != 'submit')$query .="`$key`='$value',";
                        $query = substr($query, 0, -1);//omit last comma
                            
                        mysql_query("INSERT INTO ".$prefix."homestays SET ".$query);
                            echo '<p class="alert alert-success" id="success-alert"><i class="fa fa-check fa-fw"></i> Added  successfully.</p>';
                        }
                        
                 ?>
						</div>

						<form class="form" method="post" enctype="multipart/form-data">
							<div class="form-body">

								<div class="form-group">
									<label for="complaintinput1">Name</label>
									<input type="text" id="complaintinput1" class="form-control round" placeholder="Enter Name" name="name">
								</div>

								<div class="form-group">
									<label for="complaintinput2">Location</label>
									<input type="text" id="complaintinput2" class="form-control round" placeholder="Enter Location" name="location">
								</div>

								<div class="form-group">
									<label for="complaintinput2">Address</label>
									<input type="text" id="complaintinput2" class="form-control round" placeholder="Enter Address" name="address">
								</div>
								<div class="form-group">
									<label for="complaintinput2">Manager Name</label>
									<input type="text" id="complaintinput2" class="form-control round" placeholder="Enter Manager Name" name="manager_name">
								</div>
                <div class="form-group">
                  <label for="complaintinput2">Phone No</label>
                  <input type="text" id="complaintinput2" class="form-control round" placeholder="Enter Phone No" name="phone">
                </div>
							 <div class="form-group">
                  <label for="complaintinput2">Alternate Phone No</label>
                  <input type="text" id="complaintinput2" class="form-control round" placeholder="Enter Alternate phone No" name="alt_phone">
                </div>
                <div class="form-group">
                  <label for="complaintinput2">Email</label>
                  <input type="text" id="complaintinput2" class="form-control round" placeholder="Enter Email" name="email">
                </div>
                <div class="form-group">
                  <label for="complaintinput2">Description</label>
                  <input type="text" id="complaintinput2" class="form-control round" placeholder="Enter Description" name="description">
                </div>
                <div class="card-block">
                    <div class="card-body">
                        <label for="complaintinput2">Property Type</label>
                        <fieldset class="form-group">
                            
                    <select name="property_type" class="form-control" id="basicSelect">
          <option>Select Property Type</option>
             <?php
                            $select=mysql_query("SELECT * FROM ".$prefix."property_type");
               while($row=mysql_fetch_object($select)){
               ?>
              <option value="<?=$row->id?>">
              <?=$row->property_type?></option>
               <?php } ?>  
                    </select>
                  </fieldset>
                </div>
            </div>
            <section class="basic-radios">
  <div class="row match-height">
    <div class="col-xl-6 col-lg-12">
      <div class="card">
        <div class="card-content">
          <div class="card-body">
            <h6 class="card-title">Payment</h6>
           
                 <div class="form-check">
                    <div class="radio p-0">
                        <input type="radio" name="payment"  value="yes" checked>
                        <label class="form-check-label" for="exampleRadios2">
                            YES
                        </label>
                    </div>
                    <div class="radio p-0" style="position:relative">
                        <input type="radio" name="payment"  value="no">
                        <label class="form-check-label" for="exampleRadios3">
                            NO
                        </label>
                    </div>
                    </div>
                </div>
            </div>
            </div>
            </div>
            </div>
          </section>
           <section class="basic-radios">
  <div class="row match-height">
    <div class="col-xl-6 col-lg-12">
      <div class="card">
        <div class="card-content">
          <div class="card-body">
            <h6 class="card-title">Payment Type</h6>
           
                 <div class="form-check">
                    <div class="radio p-0">
                        <input type="radio" name="payment_type"  value="cash" checked>
                        <label class="form-check-label" for="exampleRadios2">
                            CASH
                        </label>
                    </div>
                    <div class="radio p-0" style="position:relative">
                        <input type="radio" name="payment_type"  value="cheque">
                        <label class="form-check-label" for="exampleRadios3">
                           CHEQUE
                        </label>
                    </div>
                    <div class="radio p-0" style="position:relative">
                        <input type="radio" name="payment_type"  value="Net banking or Debit Card">
                        <label class="form-check-label" for="exampleRadios2">
                           NET/DEBIT CARD
                        </label>
                    </div>
                    <div class="radio p-0" style="position:relative">
                       <input type="radio" name="payment_type"  value="All">
                        <label class="form-check-label" for="exampleRadios3">
                           ALL
                        </label>
                    </div>
                    </div>
                </div>
            </div>
            </div>
            </div>
            </div>
          </section>
          <div class="card-block">
                    <div class="card-body">
                        <label for="complaintinput2">Vendor Name</label>
                        <fieldset class="form-group">
                            
                    <select name="ven_id" class="form-control" id="basicSelect">
          <option>Select Vendor Name</option>
            <?php
              $select1=mysql_query("SELECT * FROM ".$prefix."user WHERE type='Vendor'");
               while($row1=mysql_fetch_object($select1)){
                 ?>
                <option value="<?=$row1->id?>"><?=$row1->name?></option>
             <?php } ?>
                    </select>
                  </fieldset>
                </div>
            </div>
            <section class="basic-radios">
  <div class="row match-height">
    <div class="col-xl-6 col-lg-12">
      <div class="card">
        <div class="card-content">
          <div class="card-body">
            <h6 class="card-title">Status</h6>
           
                 <div class="form-check">
                    <div class="radio p-0">
                        <input type="radio" name="status"  value="yes" checked>
                        <label class="form-check-label" for="exampleRadios2">
                            YES
                        </label>
                    </div>
                    <div class="radio p-0" style="position:relative">
                        <input type="radio" name="status"  value="no">
                        <label class="form-check-label" for="exampleRadios3">
                            NO
                        </label>
                    </div>
                    </div>
                </div>
            </div>
            </div>
            </div>
            </div>
          </section>

							<div class="form-actions">
								<a href="homestay.php" type="button" class="btn btn-danger mr-1" >
									<i class="ft-arrow-left"></i> Back
								</a>
							
								<button type="submit" name="submit" class="btn btn-primary">
									<i class="ft-user-check"></i> Save
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
  </center>
</div>
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