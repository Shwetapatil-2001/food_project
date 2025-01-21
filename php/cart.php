<!-- Cart ---->
<?php session_start();
 include_once("header.php");
?>

<div style="display:<?php if(isset($_SESSION["showAlert"])){echo $_SESSION["showAlert"];}else{echo "none";} unset($_SESSION["showAlert"]); ?>" class="alert alert-success alert-dismissible mt-2">
    <button type='button' class='close' data-dismiss='alert'>&times;</button>
    <strong><?php if(isset($_SESSION["message"])){echo $_SESSION["message"];}else{echo "none";} unset($_SESSION["message"]); ?></strong>
</div>

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col" class="text-center">Quantity</th>
                            <th scope="col" class="text-right">Total Price</th>
                            <th scope="col" class="text-right">
                                <a href="action.php?clear=all" onClick="return confirm('Are you sure to clear cart?');" class="btn btn-sm btn-danger">Empty Cart</a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include('hms/include/config.php');
                        $sql = mysqli_query($con, "SELECT * FROM cart");

                        $grand_total = 0;
                        while($row = mysqli_fetch_array($sql)) {
                            $total_price = $row['proprice'] * $row['quantity'];
                        ?>

                        <tr>
                            <td><img src="hms/images/<?php echo $row['proimg']; ?>" width="100" height="100"/></td>
                            <td><?php echo $row['proname']; ?></td>
                            <td><?php echo number_format($row['proprice'], 2); ?></td>
                            <td><input type="number" class="form-control itemQty" value="<?php echo $row['quantity']; ?>" style="width:75px;"></td>
                            <td class="text-right totalPrice"><?php echo number_format($total_price, 2); ?></td>
                            <td class="text-right">
                                <a href="action.php?remove=<?php echo $row['cart_id']; ?>" onClick="return confirm('Are you sure want to remove this item?');" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                            </td>
                            <input type="hidden" class="pid" value="<?php echo $row['cart_id']; ?>">
                            <input type="hidden" class="pprice" value="<?php echo $row['proprice']; ?>">

                            <?php $grand_total += $total_price; ?>
                        </tr>
                        <?php } ?>
                        
                        <tr>
                            <td colspan="4"></td>
                            <td>Total</td>
                            <td class="text-right" id="grand_total"><?php echo number_format($grand_total, 2); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col mb-2">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <a href="products.php" class="btn btn-block btn-light"><i class="fa fa-shopping-cart"></i> Continue Shopping</a>
                </div>
                <div class="col-sm-12 col-md-6 text-right">
                    <a href="checkout.php" class="btn btn-md btn-block btn-success text-uppercase <?=($grand_total > 1)?'':'disabled';?>">Checkout</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('.itemQty').on("change", function(){
            var hide = $(this).closest("tr");
            var id = hide.find('.pid').val();
            var price = parseFloat(hide.find('.pprice').val());
            var qty = $(this).val();

            var totalPrice = price * qty;
            hide.find('.totalPrice').text(totalPrice.toFixed(2));

            updateGrandTotal();

            $.ajax({
                url: 'action.php',
                method: 'post',
                data: { pqty: qty, pid: id, pprice: price },
                success: function(response){
                    console.log(response);
                }
            });
        });

        function updateGrandTotal(){
            var grandTotal = 0;
            $('.totalPrice').each(function(){
                grandTotal += parseFloat($(this).text());
            });
            $('#grand_total').text(grandTotal.toFixed(2));
        }
    });
</script>
<?php include_once("footer.php");?>