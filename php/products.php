<?php include_once('h.php');

if (!isset($_SESSION['userID'])) {
  echo '<script>alert("Please log in to access this page!");</script>';
  echo '<script>window.location.href = "index.php";</script>';
}

include('hms/include/config.php');
?>
  <div class="top1">
  <div class="inner-header">
  <div class="ed_img_overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-4 col-sm-6 col-xs-12"></div>   
    </div>
  </div>
  </div>     
  </div>

  <div class="section2">
  <div class="container">
    <div class="row">
    <?php
      if(isset($_GET['viewid']))
      {
        $catid=$_GET['viewid'];
        $query=mysqli_query($con,"select catslug from category where id='$catid'");
        while($query1=mysqli_fetch_array($query))
        {
          $catslug= $query1['catslug'];
        }
        $sql=mysqli_query($con,"select * from product where procat='$catslug' ");
      }
      else{
        $sql=mysqli_query($con,"select * from product");
      }

      while($row=mysqli_fetch_array($sql))
      { 
    ?>

    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 mb-4">
      <div class="tile-body">
      <div class="product-name pt-1">
      <div class="pdp-link">
        <img src="hms/images/<?php echo $row['proimg'];?>"   height="200px" width="300px"><br>
        <h5>
          <?php echo $row['proname'];?> 
        </h5> 
      </div>
      </div>
      <div class="price">
        <span>
          <input type="hidden" class="salesPriceValue" value="120">
          <span class="sales ">
            <span class="value price-text " content="120">
              ₹ <?php echo $row['proprice'];?>
            </span>  
          </span>
        </span>
        <form class="form-submit">
          <input type="hidden" class="pname" value="<?php echo $row['proname'];?>">
          <input type="hidden" class="pprice" value="<?php echo $row['proprice'];?>">
          <input type="hidden" class="pimage" value="<?php echo $row['proimg'];?>">
          <input type="hidden" class="pcode" value="<?php echo $row['id'];?>">
          <button id="addItem" class="btn-primary btn button">Add To Cart</button>
          <div class="alert-message"></div>
        </form>
      </div>
      </div>
    </div>
    <?php } ?>
  </div>
  </div>
  </div><br>

<script>
$(document).ready(function(){
$(document).on('click','#addItem',function(e){
e.preventDefault();
var form=$(this).closest(".form-submit");
var pcode=form.find('.pcode').val();
var pname=form.find('.pname').val();
var pimage=form.find('.pimage').val();

var pprice=form.find('.pprice').val();
//var $this = $(this);
var alertmsg=form.find('.alert-message');
$.ajax({
url:'action.php',
method:'post',
data:{pcode:pcode,pname:pname,pimage:pimage,pprice:pprice},
success:function(response){
  console.log(response);
  alertmsg.html(response);

  // $this.closest('.alert-message').html(response)
  //$(this).closest('.alert-message').html(response);
 //alertmsg.html(response);
  //window.scrollto(0,0);
  load_cart_item_number();
}
});

 });

  load_cart_item_number();
function load_cart_item_number(){
  $.ajax({
url:'action.php',
method:'get',
data:{cartItem:"cart_item"},
success:function(response){

  $("#cart-item").html(response);
  
}
});
}

  });
 
</script>

<?php include_once('footer.php');?>

    

