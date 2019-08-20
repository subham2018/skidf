<?php include_once 'include/head.php';?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
     <?php include_once 'include/header.php';?>
<title><?=$site->site_title?> | Admin Panel</title>
<style type="text/css">
* {margin: 0; padding: 0;}

.tree ul {
	padding-top: 20px; position: relative;
	
	transition: all 0.5s;
	-webkit-transition: all 0.5s;
	-moz-transition: all 0.5s;
}



.tree li {
	float: left; text-align: center;
	list-style-type: none;
	position: relative;
	padding: 20px 5px 0 5px;
	
	transition: all 0.5s;
	-webkit-transition: all 0.5s;
	-moz-transition: all 0.5s;
}

/*We will use ::before and ::after to draw the connectors*/

.tree li::before, .tree li::after{
	content: '';
	position: absolute; top: 0; right: 50%;
	border-top: 1px solid #ccc;
	width: 50%; height: 20px;
}
.tree li::after{
	right: auto; left: 50%;
	border-left: 1px solid #ccc;
}

/*We need to remove left-right connectors from elements without 
any siblings*/
.tree li:only-child::after, .tree li:only-child::before {
	display: none;
}

/*Remove space from the top of single children*/
.tree li:only-child{ padding-top: 0;}

/*Remove left connector from first child and 
right connector from last child*/
.tree li:first-child::before, .tree li:last-child::after{
	border: 0 none;
}
/*Adding back the vertical connector to the last nodes*/
.tree li:last-child::before{
	border-right: 1px solid #ccc;
	border-radius: 0 5px 0 0;
	-webkit-border-radius: 0 5px 0 0;
	-moz-border-radius: 0 5px 0 0;
}
.tree li:first-child::after{
	border-radius: 5px 0 0 0;
	-webkit-border-radius: 5px 0 0 0;
	-moz-border-radius: 5px 0 0 0;
}

/*Time to add downward connectors from parents*/
.tree ul ul::before{
	content: '';
	position: absolute; top: 0; left: 50%;
	border-left: 1px solid #ccc;
	width: 0; height: 20px;
}
.tree ul ul::after{
	content: '';
	
}

.tree li a{
	border: 1px solid #ccc;
	padding: 5px 10px;
	text-decoration: none;
	color: #666;
	font-family: arial, verdana, tahoma;
	font-size: 11px;
	display: inline-block;
	
	border-radius: 5px;
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	
	transition: all 0.5s;
	-webkit-transition: all 0.5s;
	-moz-transition: all 0.5s;
}

/*Time for some hover effects*/
/*We will apply the hover effect the the lineage of the element also*/
.tree li a:hover, .tree li a:hover+ul li a {
	background: #c8e4f8; color: #000; border: 1px solid #94a0b4;
}
/*Connector styles on hover*/
.tree li a:hover+ul li::after, 
.tree li a:hover+ul li::before, 
.tree li a:hover+ul::before, 
.tree li a:hover+ul ul::before{
	border-color:  #94a0b4;
}


</style>
  </head>
<?php include_once 'include/navbar.php';?>

    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
          <div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">Geanology</h3>
          </div>
          <div class="content-header-right col-md-8 col-12">
            <div class="breadcrumbs-top float-md-right">
              <div class="breadcrumb-wrapper mr-1">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Home</a>
                  </li>
                  
                  <li class="breadcrumb-item active">DSA
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
	                <h4 class="card-title">Geanology</h4>
					
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
					
                    
	               
				   
	                <table class="">
					       
					        
							<center>
								<div class="row">
                          <div class="col-md-4">
                          	<p> DSA  Master Distributor</p>
                          </div>

								
								<div class="tree">
					<?php
                     $select=mysqli_query($link,"SELECT * FROM ".$prefix."dsa_user WHERE `id`=".$_REQUEST['gen']);
                               while($row=mysqli_fetch_object($select)){
          ?>
       


	<ul>
		<li>
			<a href="view_dsa.php?id=<?=$row->id?>" title="DSA" style="color:red;"><?=$row->name?> (DSA)</a>
			<ul>
				<?php 
					$select1=mysqli_query($link,"SELECT * FROM ".$prefix."md_user WHERE `reference_no`=".$row->token);
                               while($row1=mysqli_fetch_object($select1)){ ?>
				<li>
					
					<a href="view_md.php?id=<?=$row1->id?>" title="Master Distributor" style="color:#0abde3"><?=$row1->name?></a>
					<ul>
					<?php $select2=mysqli_query($link,"SELECT * FROM ".$prefix."distributor_user WHERE `reference_no`=".$row1->token);
                               while($row2=mysqli_fetch_object($select2)){
                                ?>
						<li>
							<a href="view_distributor.php?id=<?=$row2->id?>" title="Distributor" style="color:#ff9f43;"><?=$row2->name?></a>
							<ul>
					<?php $select3=mysqli_query($link,"SELECT * FROM ".$prefix."retailer_user WHERE `reference_no`=".$row2->token);
                               while($row3=mysqli_fetch_object($select3)){
                                ?>
						<li>
							<a href="view_retailer.php?id=<?=$row3->id?>" title="Retailer" style="color:#ff9ff3;"><?=$row3->name?></a>
							<ul>
					<?php $select4=mysqli_query($link,"SELECT * FROM ".$prefix."register WHERE `reference_no`=".$row3->token);
                               while($row4=mysqli_fetch_object($select4)){
                                ?>
						<li>
							<a href="view_reguser.php?id=<?=$row4->id?>" title="Customer"><?=$row4->name?></a>
						</li>
					<?php } ?>
					</ul>
						</li>
					<?php } ?>
					</ul>
						</li>
					<?php } ?>
					</ul>
				
				</li>
				<?php } ?>
			<!-- 	<li>
					<a href="#">Child</a>
					<ul>
						<li><a href="#">Grand Child</a></li>
						<li>
							<a href="#">Grand Child</a>
							<ul>
								<li>
									<a href="#">Great Grand Child</a>
								</li>
								<li>
									<a href="#">Great Grand Child</a>
								</li>
								<li>
									<a href="#">Great Grand Child</a>
								</li>
							</ul>
						</li>
						<li><a href="#">Grand Child</a></li>
					</ul>
				</li> -->
			</ul>
		</li>
	</ul>
<?php }?>
</div></div></div></center>
					        
					       
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