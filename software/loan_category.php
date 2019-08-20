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
            <h3 class="content-header-title">Sub Category</h3>
          </div>
          <div class="content-header-right col-md-8 col-12">
            <div class="breadcrumbs-top float-md-right">
              <div class="breadcrumb-wrapper mr-1">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Home</a>
                  </li>
                  
                  <li class="breadcrumb-item active">Sub Category
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
	                <h4 class="card-title">Sub Category</h4>
					
	                <a class="heading-elements-toggle"><i class="ft-plus-circle"></i></a>
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
                    
                     
                    if(mysqli_query($link,"DELETE FROM ".$prefix."loan_category WHERE id=".variable_check($_GET['del']))){ //delete info
                         
                        echo '<p class="alert alert-success" id="success-alert"><i class="fa fa-check fa-fw"></i> Deleted successfully.</p>';
                    }
                    else echo '<p class="alert alert-danger" id="success-alert"><i class="fa fa-warning fa-fw"></i> Sorry! There is an error while deleting!</p>';
                }
                ?>
                    
	               <a href="add_loan_category.php"  style="width:260px;" class="btn btn-glow btn-bg-gradient-x-purple-red col-6 col-md-5 mr-1 mb-1">+ Category</a>
				   
	                <table class="table table-striped table-bordered sourced-data">
					        <thead>
					            <tr>
					            	<th>Name</th>
					            	<th>Category</th>
					            	<th>Repay Days</th>
					            	<th>Interest Percent</th>
					                <th>Interest Period</th>
					                <th>Image</th>
					                
					                <!-- <th>Email</th> -->
					                
					               
									<th>Action</th>
					            </tr>
					        </thead>
					        <tbody>
							<?php
                                $select=mysqli_query($link,"SELECT * FROM ".$prefix."loan_category");
                               while($row=mysqli_fetch_object($select)){
                                ?>
					            <tr>
					            	
					                <td><?=$row->loan_name?></td>
					                 <td><?=anything('m_loan_category','category_name',$row->m_category)?></td>
					               
					                <td><?=$row->loan_repaydays?></td>
					               
					               <td><?=$row->interest_percent?></td>
					               <td><?=$row->interest_period?></td>
					               <td><img src="<?=UPLOAD_IMG_PATH.$row->side_img?>" width="70%"></td>
					            
					               
									
									<td>
									
									 <a class="btn btn-outline-primary round btn-min-width mr-1 mb-1" href="edit_loan_category.php?id=<?=$row->id?>">
							View / Update</a>
                            <a class="btn btn-outline-danger round btn-min-width mr-1 mb-1" href="?del=<?=$row->id?>">
							Delete</a></td>
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