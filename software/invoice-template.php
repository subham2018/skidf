<?php include_once 'include/head.php';?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  
<!-- Mirrored from themeselection.com/demo/chameleon-admin-template/html/ltr/horizontal-menu-template-nav/invoice-template.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 05 Sep 2018 15:30:34 GMT -->
<head>
    <?php include_once 'include/header.php';?>
<title><?=$site->site_title?> | Admin Panel</title>
    <!-- END Custom CSS-->
  </head>
  

  <body class="horizontal-layout horizontal-menu 2-columns   menu-expanded" data-open="hover" data-menu="horizontal-menu" data-color="bg-gradient-x-purple-blue" data-col="2-columns">

    <!-- fixed-top-->
   

    <!-- ////////////////////////////////////////////////////////////////////////////-->


    

    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
          <div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">Invoice</h3>
          </div>
          <div class="content-header-right col-md-8 col-12">
            <div class="breadcrumbs-top float-md-right">
              <div class="breadcrumb-wrapper mr-1">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index-2.html">Home</a>
                  </li>
                  <li class="breadcrumb-item active">Invoice
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body"><section class="card">
	<div id="invoice-template" class="card-body">
		<!-- Invoice Company Details -->
		<div id="invoice-company-details" class="row">
			<div class="col-md-6 col-sm-12 text-left text-md-left">							
                        <img src="../../../app-assets/images/logo/logo-80x80.png" alt="company logo" class="mb-2" width="70">
                        <ul class="px-0 list-unstyled">
                            <li class="text-bold-700">Chameleon Studio</li>
                            <li>102 Trade Centre,</li>                            
                            <li>Portland 12345,</li>
                            <li>USA</li>
                        </ul>
                    
			</div>
			<div class="col-md-6 col-sm-12 text-center text-md-right">
				<h2>INVOICE</h2>
				<p># INV-001001</p>
				<p> 26th May, 2018</p>				
			</div>
		</div>
		<!--/ Invoice Company Details -->

		<!-- Invoice Customer Details -->
		<div id="invoice-customer-details" class="row pt-2">
			<div class="col-md-6 col-sm-12">
					<p class="text-muted">(123) 456 789</p>
					<p class="text-muted">email@yourcompany.com</p>
			</div>
			<div class="col-md-6 col-sm-12 text-center text-md-right">
					<p class="text-muted">Bill To</p>
					<ul class="px-0 list-unstyled">
							<li class="text-bold-700">Mr. John Doe</li>
							<li>102 Park Avenue,</li>
							<li>New York,</li>
							<li>New York-25896.</li>
						</ul>
				
			</div>
		</div>
		<!--/ Invoice Customer Details -->

		<!-- Invoice Items Details -->
		<div id="invoice-items-details" class="pt-2">
			<div class="row">
				<div class="table-responsive col-sm-12">
					<table class="table table-bordered">
					  <thead>
					    <tr>
					      <th>#</th>
					      <th>Item & Description</th>
					      <th class="text-right">Rate</th>
					      <th class="text-right">Hours</th>
					      <th class="text-right">Amount</th>
					    </tr>
					  </thead>
					  <tbody>
					    <tr>
					      <th scope="row">1</th>
					      <td>
					      	<p>Create Mobile Dashboard</p>
					      	<p class="text-muted">Vestibulum euismod est eu elit convallis.</p>
					      </td>
					      <td class="text-right">$ 18.00/hr</td>
					      <td class="text-right">100</td>
					      <td class="text-right">$ 1800.00</td>
					    </tr>
					    <tr>
					      <th scope="row">2</th>
					      <td>
					      	<p>Android App Development</p>
					      	<p class="text-muted">Pellentesque maximus feugiat lorem at cursus.</p>
					      </td>
					      <td class="text-right">$ 14.00/hr</td>
					      <td class="text-right">300</td>
					      <td class="text-right">$ 4200.00</td>
					    </tr>
					    <tr>
					      <th scope="row">3</th>
					      <td>
					      	<p>Laravel Template Development</p>
					      	<p class="text-muted">Vestibulum euismod est eu elit convallis.</p>
					      </td>
					      <td class="text-right">$ 10.00/hr</td>
					      <td class="text-right">500</td>
					      <td class="text-right">$ 5000.00</td>
					    </tr>
					  </tbody>
					</table>
				</div>
			</div>
			<div class="row">
				<div class="col-md-7 col-sm-12 text-center text-md-left">
					<p class="lead">Payment Methods:</p>
					<div class="row">
						<div class="col-md-8">
						<table class="table table-borderless table-sm">
							<tbody>
								<tr>
									<td>Bank name:</td>
									<td class="text-right">US Bank, USA</td>
								</tr>
								<tr>
									<td>Acc name:</td>
									<td class="text-right">Carla Prop</td>
								</tr>
								<tr>
									<td>IBAN:</td>
									<td class="text-right">ABC123546655</td>
								</tr>
								<tr>
									<td>SWIFT code:</td>
									<td class="text-right">US12345</td>
								</tr>
							</tbody>
						</table>
						</div>
					</div>
				</div>
				<div class="col-md-5 col-sm-12">
					<p class="lead">Total due</p>
					<div class="table-responsive">
						<table class="table">
						  <tbody>
						  	<tr>
						  		<td>Sub Total</td>
						  		<td class="text-right">$ 12,000.00</td>
						  	</tr>
						  	<tr>
						  		<td>TAX (12%)</td>
						  		<td class="text-right">$ 1,440.00</td>
						  	</tr>
						  	<tr>
						  		<td class="text-bold-800">Total</td>
						  		<td class="text-bold-800 text-right"> $ 15,440.00</td>
						  	</tr>
						  	<tr>
						  		<td>Payment Made</td>
						  		<td class="pink text-right">(-) $ 2,440.00</td>
						  	</tr>
						  	<tr class="bg-grey bg-lighten-4">
						  		<td class="text-bold-800">Balance Due</td>
						  		<td class="text-bold-800 text-right">$ 13,000.00</td>
						  	</tr>
						  </tbody>
						</table>
					</div>
					<div class="text-center">
						<p>Authorized person</p>
						<img src="../../../app-assets/images/pages/signature-scan.png" alt="signature" class="height-100"/>
						<h6>Carla Prop</h6>
						<p class="text-muted">Managing Director</p>
					</div>
				</div>
			</div>
		</div>

		<!-- Invoice Footer -->
		<div id="invoice-footer">
			<div class="row">
				<div class="col-md-7 col-sm-12">
					<h6>Terms & Condition</h6>
					<p>You know, being a test pilot isn't always the healthiest business in the world. We predict too much for the next year and yet far too little for the next 10.</p>
				</div>
				<div class="col-md-5 col-sm-12 text-center">
					<button type="button" class="btn btn-info btn-lg my-1"><i class="la la-paper-plane-o"></i> Send Invoice</button>
				</div>
			</div>
		</div>
		<!--/ Invoice Footer -->

	</div>
</section>
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
			<img src="../../../app-assets/images/backgrounds/04.jpg" class="rounded sidiebar-bg-img" width="50" height="100" alt="background image">
		</div>
		<div class="col mb-3">
			<img src="../../../app-assets/images/backgrounds/01.jpg" class="rounded sidiebar-bg-img" width="50" height="100" alt="background image">
		</div>
		<div class="col mb-3">
			<img src="../../../app-assets/images/backgrounds/02.jpg" class="rounded sidiebar-bg-img" width="50" height="100" alt="background image">
		</div>
		<div class="col mb-3">
			<img src="../../../app-assets/images/backgrounds/05.jpg" class="rounded sidiebar-bg-img" width="50" height="100" alt="background image">
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

	<hr>

	<div class="row mb-2">
		
		<div class="col">
			<a href="https://themeselection.com/" class="btn btn-primary btn-block box-shadow-1" target="_blank">More Themes</a>
		</div>
	</div>
	<div class="text-center">
		<button id="twitter" class="btn btn-social-icon btn-twitter sharrre mr-1"><i class="la la-twitter"></i></button>
		<button id="facebook" class="btn btn-social-icon btn-facebook sharrre mr-1"><i class="la la-facebook"></i></button>
		<button id="google" class="btn btn-social-icon btn-google sharrre"><i class="la la-google"></i></button>
	</div>
</div>
    </div>

    <footer class="footer footer-static footer-light navbar-shadow">
      <div class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span class="float-md-left d-block d-md-inline-block">2018  &copy; Copyright <a class="text-bold-800 grey darken-2" href="https://themeselection.com/" target="_blank">ThemeSelection</a></span>
        <ul class="list-inline float-md-right d-block d-md-inline-blockd-none d-lg-block mb-0">
          <li class="list-inline-item"><a class="my-1" href="https://themeselection.com/" target="_blank"> More themes</a></li>
          <li class="list-inline-item"><a class="my-1" href="https://themeselection.com/support" target="_blank"> Support</a></li>
          
        </ul>
      </div>
    </footer>

    <!-- BEGIN VENDOR JS-->
    <script src="../../../app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
    <script src="../../../app-assets/vendors/js/forms/toggle/switchery.min.js" type="text/javascript"></script>
    <script src="../../../app-assets/js/scripts/forms/switch.min.js" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script type="text/javascript" src="../../../app-assets/vendors/js/ui/jquery.sticky.js"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN CHAMELEON  JS-->
    <script src="../../../app-assets/js/core/app-menu.min.js" type="text/javascript"></script>
    <script src="../../../app-assets/js/core/app.min.js" type="text/javascript"></script>
    <script src="../../../app-assets/js/scripts/customizer.min.js" type="text/javascript"></script>
    <script src="../../../app-assets/vendors/js/jquery.sharrre.js" type="text/javascript"></script>
    <!-- END CHAMELEON  JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <!-- END PAGE LEVEL JS-->
  </body>

<!-- Mirrored from themeselection.com/demo/chameleon-admin-template/html/ltr/horizontal-menu-template-nav/invoice-template.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 05 Sep 2018 15:30:36 GMT -->
</html>