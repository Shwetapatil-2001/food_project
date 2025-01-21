<?php include_once('header.php');
include('hms/include/config.php');

?>
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="images/sl1.jpg" height="800px" width="200px" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="https://imgcdn.stablediffusionweb.com/2024/3/20/e8b62e1b-a573-4dc8-8eb7-a1e63f381b36.jpg" height="800px" width="200px" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="https://t4.ftcdn.net/jpg/06/21/23/79/360_F_621237935_NGk8sFoFzRaChN0UgS5tBcrCAtjC9wP8.jpg" height="800px" width="200px" class="d-block w-100" alt="...">
            </div>
          </div>
         <button class="carousel-control-prev" type="button" data-target="#carouselExampleControls" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-target="#carouselExampleControls" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </button>
        </div>
          
          <div class="section1">
            <div class="container"><br>                
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <img src="images/about.jpeg" height="200px" width="400px">
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                      <h2>About Us</h2><br>
                      <h5 class="us">With this user-friendly website and mobile app, ordering your favorite meals is quick and easy. Browse menus, read reviews, and place your order in just a few taps.</h5>
                    </div>
                </div>
            </div>
            </div>

            <div class="section3">
              <div class="container"><br>
              <div class="card-container"> 
                <h2 class="products">Food Category</h2><br>               
                <div class="row">
                  <?php
$sql=mysqli_query($con,"select * from category ");


while($row=mysqli_fetch_array($sql))
{ 
?>
                <div class="card">
                  <img src="hms/images/<?php echo $row['catimg'];?>"  height="200px" width="280px">
                    <h3><?php echo $row['catname'];?> 
                    </h3>
                    <div>
                      <a href="products.php?viewid=<?php echo $row['id'];?>"><button class="add" >View more</button></a>
                    </div>                    
                </div>

                <?php } ?>
                
                </div>
            </div>
            </div>
            </div>

            <div class="section5">
                <div class="container">
                    <h2 class="products">Food menu</h2><br>
                    <div class="row">
                      <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                          <img class="f1" src="images\sandwich.jpeg"  height="300px" width="350px">     
                        </div>
                      <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                          <img class="f1" src="images\f2.jpeg" height="300px" width="350px">
                      </div>
                      <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                          <img class="f1" src="images\f1.jpeg" height="300px" width="350px">
                      </div>
                    </div><br><br>
                    <div class="row">
                      <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                          <img class="f1" src="images\palak_paneer.jpeg"  height="300px" width="350px">     
                        </div>
                      <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                          <img class="f1" src="images\cheese_pizza.jpeg" height="300px" width="350px">
                      </div>
                      <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                          <img class="f1" src="images\pulav.jpeg" height="300px" width="350px">
                      </div>
                    </div><br><br>
                    <div class="row">
                          <a href="products.php"><button class="view" >Check Out Menu</button></a>
                    </div>
                </div>
            </div><br>

<?php include_once('footer.php');?>