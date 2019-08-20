<?php include_once 'include/head.php';?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
     <?php include_once 'include/header.php';?>
<title>MR MANAGEMENT SOFTWARE | ADMIN PANEL</title>
  </head>
<?php include_once 'include/navbar.php';?>

    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
          <div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">Doctor</h3>
          </div>
          <div class="content-header-right col-md-8 col-12">
            <div class="breadcrumbs-top float-md-right">
              <div class="breadcrumb-wrapper mr-1">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index-2.html">Home</a>
                  </li>
                  
                  <li class="breadcrumb-item active">Doctors
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
	                <h4 class="card-title">Doctors List</h4>
					
	                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
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
                    
                     
                    if(mysql_query("DELETE FROM ".$prefix."doctors WHERE id=".variable_check($_GET['del']))){ //delete info
                         
                        echo '<p class="alert alert-success" id="success-alert"><i class="fa fa-check fa-fw"></i> Deleted successfully.</p>';
                    }
                    else echo '<p class="alert alert-danger" id="success-alert"><i class="fa fa-warning fa-fw"></i> Sorry! There is an error while deleting!</p>';
                }
                ?>
                    
	               <a href="add_doctors_list.php"  style="width:260px;" class="btn btn-glow btn-bg-gradient-x-purple-red col-6 col-md-5 mr-1 mb-1">Click Here To Add Doctors</a>
				   
	                <table class="table table-striped table-bordered sourced-data">
					        <thead>
					            <tr>
					                <th>Name</th>
					                <th>Area</th>
					                <th>Chamber Address</th>
									<th>Doctor Specialization</th>
					                <th>Status</th>
									<th>Action</th>
					            </tr>
					        </thead>
					        <tbody>
							<?php
                                $select=mysql_query("SELECT * FROM ".$prefix."doctors");
                               while($row=mysql_fetch_object($select)){
                                ?>
					            <tr>
					     <td><?=$row->doctor_name?></td>
					    <td class="center"><?=anything('area','name',$row->area_id)?></td>
					                <td><?=$row->doctor_chamber_address?></td>
									<td><?=$row->doctor_specl?></td>
					                <td><?=$row->status?></td>
									
									<td><a class="btn btn-outline-primary round btn-min-width mr-1 mb-1"href="edit_doctors_list.php?doctor_id=<?=$row->id?>">Edit</a>
									<a class="btn btn-tbl-delete btn-xs" href="?del=<?=$row->id?>">
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

    <div class="customizer border-left-blue-grey border-left-lighten-4 d-none d-xl-block"><a class="customizer-close" href="#"><i class="ft-x font-medium-3"></i></a><a class="customizer-toggle bg-primary box-shadow-3" href="#" id="customizer-toggle-setting"><i class="ft-settings font-medium-3 spinner white"></i></a><div class="customizer-content p-2">
	<h5 class="mt-1 mb-1 text-bold-500">Navbar Color Options</h5>
	<div class="navbar-color-options clearfix">
		<div class="gradient-colors mb-1 clearfix">
			<div class="bg-gradient-x-purple-blue navbar-color-option" data-bg="bg-gradient-x-purple-blue" title="bg-gradient-x-purple-blue"></div>
			<div class="bg-gradient-x-purple-red navbar-color-option" data-bg="bg-gradient-x-purple-red" title="bg-gradient-x-purple-red"></div>
			<div class="bg-gradient-x-blue-green navbar-color-option" data-bg="bg-gradient-x-blue-green" title="bg-gradient-x-blue-green"></div>
			<div class="bg-gradient-x-orange-yellow navbar-color-option" data-bg="bg-gradient-x-orange-yellow" title="bg-gradient-x-orange-yellow"></div>
			<div class="bg-gradient-x-blue-cyan navbar-color-option" data-bg="bg-gradient-x-blue-cyan" title="bg-gradient-x-blue-cyan"></div>
			<div class="bg-gradient-x-red-pink navbar-color-option" data-bg="bg-gradient-x-red-pink" title="bg-gradient-x-red-pink"></div>
		</div>
		<div class="solid-colors clearfix">
			<div class="bg-primary navbar-color-option" data-bg="bg-primary" title="primary"></div>
			<div class="bg-success navbar-color-option" data-bg="bg-success" title="success"></div>
			<div class="bg-info navbar-color-option" data-bg="bg-info" title="info"></div>
			<div class="bg-warning navbar-color-option" data-bg="bg-warning" title="warning"></div>
			<div class="bg-danger navbar-color-option" data-bg="bg-danger" title="danger"></div>
			<div class="bg-blue navbar-color-option" data-bg="bg-blue" title="blue"></div>
		</div>
	</div>

	<hr>

	<h5 class="my-1 text-bold-500">Layout Options</h5>
	<div class="row">
		<div class="col-12">
			<div class="d-inline-block custom-control custom-radio mb-1 col-4">
				<input type="radio" class="custom-control-input bg-primary" name="layouts" id="fixed-layout">
				<label class="custom-control-label" for="fixed-layout">Fixed</label>
			</div>
			<div class="d-inline-block custom-control custom-radio mb-1 col-4">
				<input type="radio" class="custom-control-input bg-primary" name="layouts" id="static-layout">
				<label class="custom-control-label" for="static-layout">Static</label>
			</div>
			<div class="d-inline-block custom-control custom-radio mb-1">
				<input type="radio" class="custom-control-input bg-primary" name="layouts" id="boxed-layout">
				<label class="custom-control-label" for="boxed-layout">Boxed</label>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			<div class="d-inline-block custom-control custom-checkbox mb-1">
				<input type="checkbox" class="custom-control-input bg-primary" name="right-side-icons" id="right-side-icons">
				<label class="custom-control-label" for="right-side-icons">Right Side Icons</label>
			</div>
		</div>
	</div>

	<hr>

	<h5 class="mt-1 mb-1 text-bold-500">Sidebar menu Background</h5>
	<!-- <div class="sidebar-color-options clearfix">
		<div class="bg-black sidebar-color-option" data-sidebar="menu-dark" title="black"></div>
		<div class="bg-white sidebar-color-option" data-sidebar="menu-light" title="white"></div>
	</div> -->
	<div class="row sidebar-color-options ml-1">
		<label for="sidebar-color-option" class="card-title font-medium-2 mr-2">White Mode</label>
		<div class="text-center mb-1">
			<input type="checkbox" id="sidebar-color-option" class="switchery" data-size="xs"/>
		</div>
		<label for="sidebar-color-option" class="card-title font-medium-2 ml-2">Dark Mode</label>
	</div>

	<hr>

	<label for="collapsed-sidebar" class="font-medium-2">Menu Collapse</label>
	<div class="float-right">
		<input type="checkbox" id="collapsed-sidebar" class="switchery" data-size="xs"/>
	</div>
	
	<hr>

	<!--Sidebar Background Image Starts-->
	<h5 class="mt-1 mb-1 text-bold-500">Sidebar Background Image</h5>
	<div class="cz-bg-image row">
		<div class="col mb-3">
			<img src="app-assets/images/backgrounds/04.jpg" class="rounded sidiebar-bg-img" width="50" height="100" alt="background image">
		</div>
		<div class="col mb-3">
			<img src="app-assets/images/backgrounds/01.jpg" class="rounded sidiebar-bg-img" width="50" height="100" alt="background image">
		</div>
		<div class="col mb-3">
			<img src="app-assets/images/backgrounds/02.jpg" class="rounded sidiebar-bg-img" width="50" height="100" alt="background image">
		</div>
		<div class="col mb-3">
			<img src="app-assets/images/backgrounds/05.jpg" class="rounded sidiebar-bg-img" width="50" height="100" alt="background image">
		</div>
	</div>
	<!--Sidebar Background Image Ends-->

	<!--Sidebar BG Image Toggle Starts-->
	<div class="sidebar-image-visibility">
		<div class="row ml-1">
			<label for="toggle-sidebar-bg-img" class="card-title font-medium-2 mr-2">Hide Image</label>
			<div class="text-center mb-1">
				<input type="checkbox" id="toggle-sidebar-bg-img" class="switchery" data-size="xs" checked/>
			</div>
			<label for="toggle-sidebar-bg-img" class="card-title font-medium-2 ml-2">Show Image</label>
		</div>
	</div>
	<!--Sidebar BG Image Toggle Ends-->	
</div>
    </div>
	<script type="text/javascript">
$("#success-alert").fadeTo(3000, 500).slideUp(500, function(){
    $("#success-alert").slideUp(500);
});
</script>

    <?php include_once 'include/footer.php';?>