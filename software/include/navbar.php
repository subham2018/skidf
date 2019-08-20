  <body class="horizontal-layout horizontal-menu 2-columns   menu-expanded" data-open="hover" data-menu="horizontal-menu" data-color="bg-gradient-x-indigo-light" data-col="2-columns">

    <!-- fixed-top-->
    <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow navbar-light navbar-brand-center">
      <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
          <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
          <li class="nav-item"><a class="navbar-brand" href="index.php"><img class="brand-logo" alt="Admin logo" src="<?=UPLOAD_IMG_PATH.$site->logo;?>" style="width: 80px;">
              <!--<h3 class="brand-text">ADMIN</h3>--> </a></li>
          <li class="nav-item d-md-none"><a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="ft-settings"></i></a></li>
        </ul>
      </div>
      <div class="navbar-wrapper">
        <div class="navbar-container content">
          <div class="collapse navbar-collapse" id="navbar-mobile">
            <ul class="nav navbar-nav mr-auto float-left">
              <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu"></i></a></li>
              <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"><i class="ficon ft-maximize"></i></a></li>

            </ul>
            <ul class="nav navbar-nav float-right">         

             
              
              <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">             <span class="avatar avatar-online"><img src="app-assets/images/portrait/small/avatar-s-19.png" alt="avatar"></span></a>
                <div class="dropdown-menu dropdown-menu-right">
                  <div class="arrow_box_right"><a class="dropdown-item" href="#"><span class="avatar avatar-online"><img src="app-assets/images/portrait/small/avatar-s-19.png" alt="avatar"><span class="user-name text-bold-700 ml-1">ADMIN</span></span></a>
                    <!--<div class="dropdown-divider"></div><a class="dropdown-item" href="#"><i class="ft-user"></i> Edit Profile</a>-->
					
                    <div class="dropdown-divider"></div><a class="dropdown-item" href="logout.php"><i class="ft-power"></i> Logout</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>

    <!-- ////////////////////////////////////////////////////////////////////////////-->


    <div class="header-navbar navbar-expand-sm navbar navbar-horizontal navbar-without-dd-arrow navbar-shadow" role="navigation" data-menu="menu-wrapper">
      <div class="navbar-container main-menu-content" data-menu="menu-container">
        <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">
		
          <li class="dropdown nav-item active" data-menu=""><a class="dropdown-item" href="index.php"><i class="ft-aperture"></i><span>Dashboard</span></a>
          </li>
          <!-- <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="ft-home"></i><span>Manage Home</span></a>
            <ul class="dropdown-menu">
              <div class="arrow_box">
                <li data-menu=""><a class="dropdown-item" href="popup.php" data-toggle="dropdown">Popup Settings</a>
                </li>
                <li data-menu=""><a class="dropdown-item" href="banner.php" data-toggle="dropdown">Amenities Banner</a>
                </li>
                <li data-menu=""><a class="dropdown-item" href="#" data-toggle="dropdown">Home Settings</a>
                </li>
                <li data-menu=""><a class="dropdown-item" href="about.php" data-toggle="dropdown">About Us</a>
                </li>
              </div>
            </ul>
          </li>
           <li class="dropdown nav-item" data-menu=""><a class="dropdown-item" href="room.php" style="color:white; "><i class="ft-settings"></i><span>Manage Rooms</span></a>
          </li>

          <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="ft-cloud"></i><span>Manage Cloud</span></a>
            <ul class="dropdown-menu">
              <div class="arrow_box">
                <li data-menu="dropdown"><a class="dropdown-item" href="bookings_all.php" data-toggle="dropdown">Walkin Bookings</a>
                </li>
                <li data-menu="dropdown"><a class="dropdown-item" href="online_bookings_all.php" data-toggle="dropdown">Online Bookings</a>
                </li>
                <li data-menu="dropdown"><a class="dropdown-item" href="kyc_all.php" data-toggle="dropdown">KYC ID's</a>
                </li>
              
              </div>
            </ul>
          </li>
          <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="ft-user"></i><span>Manage Guests</span></a>
            <ul class="dropdown-menu">
              <div class="arrow_box">
                <li data-menu=""><a class="dropdown-item" href="guest.php" data-toggle="dropdown">Manage / Add all Guests</a>
                </li>
                <li data-menu=""><a class="dropdown-item" href="online_guest1.php" data-toggle="dropdown">Manage Online Guests</a>
                </li>
               
              </div>
            </ul>
          </li>
          
           
          <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="ft-clipboard"></i><span>Manage Services</span></a>
            <ul class="dropdown-menu">
              <div class="arrow_box">
                <li data-menu=""><a class="dropdown-item" href="category.php" data-toggle="dropdown">Services Category</a>
                </li>
                
              </div>
            </ul>
          </li> -->
          <li class="dropdown nav-item" data-menu=""><a class="dropdown-item" href="reguser.php"><i class="ft-user-check"></i><span>Users</span></a>
          </li>
          <li class="dropdown nav-item" data-menu=""><a class="dropdown-item" href="add_pin.php"><i class="ft-layers"></i><span>Generate PIN</span></a>
          </li>
          


    <li class="dropdown nav-item" data-menu=""><a class="dropdown-item" href="site-settings.php"><i class="ft-settings"></i><span>Settings</span></a>
    </li>

     <li class="dropdown nav-item" data-menu=""><a class="dropdown-item" href="site-com.php"><i class="fas fa-coins"></i><span>Commission</span></a>
    </li>

    

    <li class="dropdown nav-item" data-menu=""><a class="dropdown-item" href="commissions.php"><i class="fas fa-coins"></i><span>Transaction</span></a>
    </li>

		   
		  
         
           
             
               
               
              </div>
            </ul>
          
      </div>
    </div>