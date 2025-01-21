<?php
session_start();
//error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
$eid=$_GET['editid'];
	$sql1=mysqli_query($con,"select * from category where id='".$_GET['editid']."'");
$row1=mysqli_fetch_array($sql1);
	
$catimg1=$row1['catimg'];
if(isset($_POST['submit']))
{
	$catname=$_POST['catname'];
$catslug=$_POST['catslug'];
if(empty($_FILES['catimg']['name'])){	$catimg=$catimg1;       

}else{
if(isset($_FILES['catimg']['tmp_name'])){
      $errors= array();
      $file_name = $_FILES['catimg']['name'];
      $file_size =$_FILES['catimg']['size'];
      $file_tmp =$_FILES['catimg']['tmp_name'];
      $file_type=$_FILES['catimg']['type'];
      $file_parts =explode('.',$_FILES['catimg']['name']);
$file_ext=strtolower(end($file_parts));
     
      $expensions= array("jpeg","jpg","png"); 

      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
           if(empty($errors)==true){
         move_uploaded_file($file_tmp,"images/".$file_name);
         //echo "Success";
      }else{
         print_r($errors);
      }
      $catimg=$file_name;

   }
}
$sql=mysqli_query($con,"Update category set catname='$catname', catslug='$catslug', catimg='$catimg' where id='$eid'");
if($sql)
{
echo "<script>alert('Category info updated Successfully');</script>";
header('location:category-list.php');

}

}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Category | Edit Category</title>
		
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
		<link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
		<link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
		<link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
		<link href="vendor/select2/select2.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="assets/css/styles.css">
		<link rel="stylesheet" href="assets/css/plugins.css">
		<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />


	</head>
	<body>
		<div id="app">		
<?php include('include/sidebar.php');?>
			<div class="app-content">
				
						<?php include('include/header.php');?>
						
				<!-- end: TOP NAVBAR -->
				<div class="main-content" >
					<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
						<section id="page-title">
							<div class="row">
								<div class="col-sm-8">
									<h1 class="mainTitle">Category | Edit category</h1>
																	</div>
								<ol class="breadcrumb">
									<li>
										<span>Category </span>
									</li>
									<li class="active">
										<span>Edit category</span>
									</li>
								</ol>
							</div>
						</section>
						<!-- end: PAGE TITLE -->
						<!-- start: BASIC EXAMPLE -->
						<div class="container-fluid container-fullw bg-white">
							<div class="row">
								<div class="col-md-12">
<h5 style="color: green; font-size:18px; ">
<?php if($msg) { echo htmlentities($msg);}?> </h5>
									<div class="row margin-top-30">
										<div class="col-lg-8 col-md-12">
											<div class="panel panel-white">
												<div class="panel-heading">
													<h5 class="panel-title">Edit category </h5>
												</div>
												<div class="panel-body">
									<?php 
$sql=mysqli_query($con,"select * from category where id='".$_GET['editid']."'");
while($row=mysqli_fetch_array($sql))
{
?>

<hr />													<form role="form" name="edit" method="post" enctype="multipart/form-data">
													

<div class="form-group">
															<label for="fname">
																 Category Name
															</label>
<input type="text" name="catname" class="form-control"  value="<?php  echo $row['catname'];?>" required="true">
														</div>
<div class="form-group">
															<label for="fname">
																 Category Slug
															</label>
<input type="text" name="catslug" class="form-control"  value="<?php  echo $row['catslug'];?>" required="true">
														</div>

<div class="form-group">
	<img src="images/<?php echo $row['catimg']; ?>" width="100" height="100">
	<input type="file" name="catimg"  />
</div>


														
														
														
														
														<button type="submit" name="submit" class="btn btn-o btn-primary">
															Update
														</button>
													</form>
													<?php } ?>
												</div>
											</div>
										</div>
											
											</div>
										</div>
									<div class="col-lg-12 col-md-12">
											<div class="panel panel-white">
												
												
											</div>
										</div>
									</div>
								</div>
						
						<!-- end: BASIC EXAMPLE -->
			
					
					
						
						
					
						<!-- end: SELECT BOXES -->
						
					</div>
				</div>
			</div>
			<!-- start: FOOTER -->
	<?php include('include/footer.php');?>
			<!-- end: FOOTER -->
		
			<!-- start: SETTINGS -->
	<?php //include('include/setting.php');?>
			
			<!-- end: SETTINGS -->
		</div>
		<!-- start: MAIN JAVASCRIPTS -->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/modernizr/modernizr.js"></script>
		<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="vendor/switchery/switchery.min.js"></script>
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
		<script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
		<script src="vendor/autosize/autosize.min.js"></script>
		<script src="vendor/selectFx/classie.js"></script>
		<script src="vendor/selectFx/selectFx.js"></script>
		<script src="vendor/select2/select2.min.js"></script>
		<script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
		<script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: CLIP-TWO JAVASCRIPTS -->
		<script src="assets/js/main.js"></script>
		<!-- start: JavaScript Event Handlers for this page -->
		<script src="assets/js/form-elements.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				FormElements.init();
			});
			
		</script>
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
	</body>
</html>
