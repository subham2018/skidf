<?php include_once 'include/head.php';
function randomNumber($length) {
    $result = '';
    for($i = 0; $i < $length; $i++) {
        $result .= mt_rand(1, 9);
    }
    return $result;
}?>
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
            <h3 class="content-header-title">Generate Pin</h3>
          </div>
          <div class="content-header-right col-md-8 col-12">
            <div class="breadcrumbs-top float-md-right">
              <div class="breadcrumb-wrapper mr-1">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index-2.html">Home</a>
                  </li>
                  <li class="breadcrumb-item"><a href="#">Generate Pin</a>
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
					<h4 class="card-title" id="basic-layout-round-controls">Unlimited Auto PIN Generation</h4>
					<a class="heading-elements-toggle">
						<i class="ft-command"></i>
					</a>
					
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
                            
                        mysqli_query($link,"INSERT INTO ".$prefix."pin SET ".$query);
                            echo '<p class="alert alert-success" id="success-alert"><i class="fa fa-check fa-fw"></i> Pin Added  successfully.</p>';
							
                        }
                        
?>
						</div>

						<form class="form" method="post" enctype="multipart/form-data">
							<div class="form-body">

								<div class="form-group">
									
								<input type="hidden" id="complaintinput1" class="form-control round" name="pinno" value="<?=randomNumber(12);?>">
								</div>

								<div class="form-group">
									
									<input type="hidden" id="complaintinput2" class="form-control round" name="customer_id" value="0">
								</div>
							</div>

								
							
								

							<div class="form-actions">
								
							
								<button type="submit" name="submit" class="btn btn-primary">
									<i class="ft-zap"></i> Auto Generate 12 Digit PIN
								</button>
							</div>
						</form>




<table class="table table-striped table-bordered sourced-data">
					        <thead>
					            <tr>
					                <th>PIN</th>
					                <th>Allocated Customers</th>
					                
					            </tr>
					        </thead>
					        <tbody>
							<?php
                                $select=mysqli_query($link,"SELECT * FROM ".$prefix."pin ORDER BY `id` DESC");
                               while($row=mysqli_fetch_object($select)){
                                ?>
					            <tr>
					            	
					                <td><?=$row->pinno?></td>
					                <td><?=$row->customer_id?></td>
					               
					               
									
					            </tr>
								<?php } ?>
					        </tbody>
					       
					    </table>









					</div>
				</div>
			</div>
		</div>
  </center>
</div>
</div>
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
<script type="text/javascript">
$("#success-alert").fadeTo(3000, 500).slideUp(500, function(){
    $("#success-alert").slideUp(500);
});
</script>
 <?php include_once 'include/footer.php';?> 