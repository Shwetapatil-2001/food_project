<?php
session_start();

include('hms/include/config.php');

if(isset($_POST['pcode']) && isset($_POST['pname']) && isset($_POST['pimage']) && isset($_POST['pprice'])){
	$code=$_POST['pcode'];
	$name=$_POST['pname'];
	$image=$_POST['pimage'];
	$price=$_POST['pprice'];
	$qty=1;

	$ret=mysqli_query($con,"SELECT product_code FROM cart WHERE product_code='".$code."'");
	
$num=mysqli_fetch_array($ret);

if (isset($num['product_code'])){
$check_code=$num['product_code'];}else{
	$check_code='';
}
if(!$check_code){
	$query=mysqli_query($con,"insert into cart(proname,proprice,proimg,quantity,total_price,product_code) values('$name','$price','$image','$qty','$price','$code')");
	if($query)
	{
			echo "Item added to your cart";
	}else{
		echo "Item already added to your cart";
				

	}

}
}
if(isset($_GET['cartItem']) && (isset($_GET['cartItem']) =='cart_item')){
$ret1=mysqli_query($con,"SELECT * FROM cart");
$num1=mysqli_num_rows($ret1);
echo json_encode($num1);
}

if(isset($_GET['remove'])){
	$id=$_GET['remove'];
$ret2=mysqli_query($con,"DELETE FROM cart WHERE cart_id='$id'");
$_SESSION["showAlert"] ="block";
$_SESSION["message"] ="Item removed from cart";
header("location:cart.php");
}

if(isset($_GET['clear'])){
	$id2=$_GET['clear'];
$ret2=mysqli_query($con,"DELETE FROM cart");
$_SESSION["showAlert"] ="block";
$_SESSION["message"] ="All item removed from the cart";
header("location:cart.php");
}

if(isset($_POST['pqty'])){

	$qty1=$_POST['pqty'];
	$id3=$_POST['pid'];
	
	$price1=$_POST['pprice'];
	$total_price=$qty1*$price1;
	
	$ret3=mysqli_query($con,"UPDATE cart SET quantity='$qty1', total_price='$total_price' WHERE cart_id='".$id3."'");

}

if(isset($_POST['action']) && (isset($_POST['action']) == 'order' )){
	$name1=$_POST['name'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$address=$_POST['address'];
	$pmode = $_POST['pmode'];
	$products = $_POST['products'];
	$grand_total = $_POST['grand_total'];
$testid=$_POST['testid'];
	$data='';

	$ret4=mysqli_query($con,"insert into orders(username,email,phone,address,payment_mode,products,paid_amount) values ('$name1','$email','$phone','$address','$pmode','$products','$grand_total')");
	if($ret4){
$ret6=mysqli_query($con,"DELETE FROM cart WHERE cart_id IN ($testid)");
	}
	$data .='<div class="text-center">
             <h1>Thank You!</h1>
             <h2>Your order is placed!</h2>
             <h4 class="text-center">Item Purchased:'.$products.'</h4>
             <h4>Customer name:'.$name1.'</h4>
             <h4>Customer email:'.$email.'</h4>
             <h4>Customer Phone:'.$phone.'</h4>
             <h4>Total Amount Paid:'.number_format($grand_total,2).'</h4>
             <h4>Payment mode:'.$pmode.'</h4>
			 <a href="products1.php" class="btn btn-block btn-light"><i class="fa fa-shopping-cart"></i> Continue Shopping</a>
			 </div>';
             echo $data;	

			 	 
}           
?>