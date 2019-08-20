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
            <h3 class="content-header-title">Distributors</h3>
          </div>
          <div class="content-header-right col-md-8 col-12">
            <div class="breadcrumbs-top float-md-right">
              <div class="breadcrumb-wrapper mr-1">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Home</a>
                  </li>
                  
                  <li class="breadcrumb-item active">Distributors
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
	                <h4 class="card-title">Distributors</h4>
					
	                <a class="heading-elements-toggle"><i class="ft-user"></i></a>
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
                    
                     
                    if(mysqli_query($link,"DELETE FROM ".$prefix."distributor_user WHERE id=".variable_check($_GET['del']))){ //delete info
                         
                        echo '<p class="alert alert-success" id="success-alert"><i class="fa fa-check fa-fw"></i> Deleted successfully.</p>';
                    }
                    else echo '<p class="alert alert-danger" id="success-alert"><i class="fa fa-warning fa-fw"></i> Sorry! There is an error while deleting!</p>';
                }
                ?>
                    
	               <a href="add_distributor_user.php"  style="width:260px;" class="btn btn-glow btn-bg-gradient-x-purple-red col-6 col-md-5 mr-1 mb-1">+ Distributor</a>
				   
	                <table class="table table-striped table-bordered sourced-data">
					        <thead>
					            <tr>
					            	<th>Own Reference No.</th>
					            	<th>Master Distributor Reference No.</th>
					            	<!-- <th>Application Type</th> -->
					            	<th>Commencement Date</th>
					                <th>Name</th>
					                <th>Address</th>
					                <th>Phone</th>
					                <!-- <th>Email</th> -->
					                
					               
									<th>Action</th>
					            </tr>
					        </thead>
					        <tbody>
							<?php
                                $select=mysqli_query($link,"SELECT * FROM ".$prefix."distributor_user");
                               while($row=mysqli_fetch_object($select)){
                                ?>
					            <tr>
					            	
					                <td><?=$row->token?></td>
					                 <td><?=$row->reference_no?></td>
					               
					                <td><?=$row->date_start?></td>
					               <td>
					               <img src="<?=UPLOAD_IMG_PATH.$row->side_img?>" width="100%"><br>
					           <?=$row->name?></td>
					               <td><?=$row->address?></td>
					               <td><?=$row->mobile?></td>
					               <!-- <td><?=$row->email?></td> -->
					               
									
									<td>
									<?php if($row->status=='1'){ ?>


										<a class="btn btn-success round btn-min-width mr-1 mb-1"href="">APPROVED</a>

									<?php } else { ?>

										<a class="btn btn-danger round btn-min-width mr-1 mb-1"href="">PENDING</a>

									<?php } ?>
									 <a class="btn btn-outline-primary round btn-min-width mr-1 mb-1" href="view_distributor.php?id=<?=$row->id?>">
							View / Update</a>
                            <a class="btn btn-outline-danger round btn-min-width mr-1 mb-1"  data-confirm="Are you sure you want to Delete Distributor User Information?" href="?del=<?=$row->id?>">
							Delete</a>
							<a class="btn btn-outline-warning round btn-min-width mr-1 mb-1"  href="d_geanology.php?gen=<?=$row->id?>">
							Geanology</a></td>
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