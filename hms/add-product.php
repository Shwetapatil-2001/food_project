<?php
session_start();
//error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();

if(isset($_POST['submit']))
{
    $proname = $_POST['proname'];
    $procat = $_POST['procat'];
    $proprice = $_POST['proprice'];
    $proquant = $_POST['proquant'];
    $prodesc = $_POST['prodesc'];

    // Validate the product price
    if (!is_numeric($proprice) || $proprice <= 0) {
        echo "<script>alert('Please enter a valid product price greater than zero');</script>";
    } else {
        if(isset($_FILES['proimg'])){
            $errors = array();
            $file_name = $_FILES['proimg']['name'];
            $file_size = $_FILES['proimg']['size'];
            $file_tmp = $_FILES['proimg']['tmp_name'];
            $file_type = $_FILES['proimg']['type'];
            $file_parts = explode('.', $_FILES['proimg']['name']);
            $file_ext = strtolower(end($file_parts));

            $expensions = array("jpeg", "jpg", "png", "webp"); 
            if(in_array($file_ext, $expensions) === false){
                $errors[] = "Extension not allowed, please choose a JPEG, PNG, or WebP file.";
            }

            if($file_size > 2097152){
                $errors[] = 'File size must be exactly 2 MB';
            }

            if(empty($errors) == true){
                move_uploaded_file($file_tmp, "images/" . $file_name);
                //echo "Success";
            } else {
                print_r($errors);
            }
        }

        $proimg = $file_name;

        $query = mysqli_query($con, "insert into product(proname,procat,proprice,proquant,prodesc,proimg) values('$proname','$procat','$proprice','$proquant','$prodesc','$proimg')");
        if($query) {
            echo "<script>alert('Product successfully added');</script>";
            header('location:product-list.php');
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Add Product</title>
	
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
									<h1 class="mainTitle">Add Product</h1>
																	</div>
								<ol class="breadcrumb">
									<li>
										<span>Product</span>
									</li>
									<li class="active">
										<span>Add Product</span>
									</li>
								</ol>
						</section>
						<!-- end: PAGE TITLE -->
						<!-- start: BASIC EXAMPLE -->
						<div class="container-fluid container-fullw bg-white">
							<div class="row">
								<div class="col-md-12">
									
									<div class="row margin-top-30">
										<div class="col-lg-8 col-md-12">
											<div class="panel panel-white">
												<div class="panel-heading">
													<h5 class="panel-title">Add Product</h5>
												</div>
												<div class="panel-body">
								<p style="color:red;"><?php echo htmlentities($_SESSION['msg']);?>
								<?php echo htmlentities($_SESSION['msg']="");?></p>	
													<form role="form" name="book" method="post" enctype="multipart/form-data">
														<div class="form-group">
								<input type="text" class="form-control" name="proname" placeholder="Product Name" required>
							</div>
							<div class="form-group">
								<select name="procat" class="form-control" required="required">
																<option value="">Select Category</option>
<?php $ret=mysqli_query($con,"select * from category");
while($row=mysqli_fetch_array($ret))
{
?>
																<option value="<?php echo htmlentities($row['catslug']);?>">
																	<?php echo htmlentities($row['catname']);?>
																</option>
																<?php } ?>
																
															</select>


							</div>
							<div class="form-group">
								<input type="text" class="form-control" name="proprice" placeholder="Product Price" required>
							</div>
							<div class="form-group">
								<input type="text" class="form-control" name="proquant" placeholder="Product Quantity" required>
							</div>
							<div class="form-group">
<textarea type="text" name="prodesc" class="form-control"  placeholder="Product Description" required="true"></textarea>
							</div>
<div class="form-group">
	<input type="file" name="proimg" />
</div>

													
														
														<button type="submit" name="submit" class="btn btn-o btn-primary">
															Submit
														</button>
													</form>
												</div>
											</div>
										</div>
											
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
		
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>

	</body>
</html>
