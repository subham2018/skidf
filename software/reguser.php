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
            <h3 class="content-header-title">Registered User</h3>
          </div>
          <div class="content-header-right col-md-8 col-12">
            <div class="breadcrumbs-top float-md-right">
              <div class="breadcrumb-wrapper mr-1">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php" target="_top">Home</a>
                  </li>
                  
                  <li class="breadcrumb-item">Registered User
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
	                <h4 class="card-title">User</h4>
					
	                <a class="heading-elements-toggle"><i class="ft-user-check"></i></a>
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
			          if(isset($_GET['del'])){
                    
                     
                    if(mysqli_query($link,"DELETE FROM ".$prefix."register WHERE id=".variable_check($_GET['del']))){ //delete info
                         
                        echo '<p class="alert alert-success" id="success-alert"><i class="fa fa-check fa-fw"></i> Deleted successfully.</p>';
                    }
                    else echo '<p class="alert alert-danger" id="success-alert"><i class="fa fa-warning fa-fw"></i> Sorry! There is an error while deleting!</p>';
                }
                ?>
                    
	            <a href="add_reguser.php"  style="width:260px;" class="btn btn-glow btn-bg-gradient-x-purple-red col-6 col-md-5 mr-1 mb-1">Add User</a>
				   
	                <table class="table table-striped table-bordered sourced-data">
					        <thead>
					            <tr>
					                <th>Name</th>
					                <th>Reference No</th>
					               
					                <th>Phone</th>
					                <th>Email</th>
					               
					               
									<th>Action</th>
					            </tr>
					        </thead>
					        <tbody>
							<?php
                                $select=mysqli_query($link,"SELECT * FROM ".$prefix."register");
                               while($row=mysqli_fetch_object($select)){
                  	
                                ?>
					            <tr>
					            	
					                <td><?=$row->name?></td>
					                <td><?if($row->reference_no!="0") { ?>
					                	<h2><?=$row->reference_no?></h2>
					                	<br>
					                	 <?=separatecol('register','name','phone',$row->reference_no)?> 
					                	 <?php } else { echo "Promoter"; } ?></td>
					                
					               
					                <td><?=$row->phone?></td>
					               <td><?=$row->email?></td>
					             
									
									<td>
										<?php $select1=mysqli_query($link,"SELECT * FROM ".$prefix."register_kyc WHERE `reg_id`='".$row->id."'");
                               while($row1=mysqli_fetch_object($select1)){ ?>
										<?php if ($row1->pan_img=="" || $row1->address_img=="") {?>
											<a class="btn btn-danger round btn-min-width mr-1 mb-1"href="view_reguser.php?id=<?=$row->id?>">VIEW INFO</a>
											<button class="btn btn-danger round btn-min-width mr-1 mb-1"><i class="ft-cross"></i>KYC NOT SUBMITTED</button>

										<?php } else { ?>
											<a class="btn btn-success round btn-min-width mr-1 mb-1" href="view_reguser.php?id=<?=$row->id?>">APPROVED VIEW INFO</a>
											<a class="btn btn-success round btn-min-width mr-1 mb-1" href="view_bank.php?id=<?=$row->id?>">VIEW BANK DETAILS</a>
										
										<a class="btn btn-success round btn-min-width mr-1 mb-1" 
										href="view_kyc.php?id=<?=$row1->reg_id?>"><i class="ft-eye"></i> VIEW KYC </a>
										
									<?php } } ?>

									<a class="btn btn-primary round btn-min-width mr-1 mb-1" 
										href="geanology.php?id=<?=$row->id?>"><i class="ft-eye"></i> GEANOLOGY </a>

									<?php if($row->id!="1"){?>
                            <a class="btn btn-outline-danger round btn-min-width mr-1 mb-1" data-confirm="Are you sure you want to Delete Registered User Information?" href="?del=<?=$row->id?>">
							Delete</a>
						<?php } ?>

						</td>
					            </tr>
								 <?php  } ?> 
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
<script type="text/javascript">
  $(document).on('click', ':not(form)[data-confirm]', function(e){
    if(!confirm($(this).data('confirm'))){
        e.stopImmediatePropagation();
        e.preventDefault();
    }
});

$(document).on('submit', 'form[data-confirm]', function(e){
    if(!confirm($(this).data('confirm'))){
        e.stopImmediatePropagation();
        e.preventDefault();
    }
});

$(document).on('input', 'select', function(e){
    var msg = $(this).children('option:selected').data('confirm');
    if(msg != undefined && !confirm(msg)){
        $(this)[0].selectedIndex = 0;
    }
});
</script>

    <?php include_once 'include/footer.php';?>