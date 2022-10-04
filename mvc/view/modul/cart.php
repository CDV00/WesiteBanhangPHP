
<?php
$cart = new Cart;
$cartItems = $cart->getItems();
?>

<form action='<?php echo BASE_URL ?>cart/update' method=post>
    <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="container">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">GIỎ HÀNG</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <table id="cart" class="table table-hover table-condensed">
                        <thead>
                            <tr>
                                <th style="width:10%">stt</th>
                                <th style="width:20%">Product</th>
                                <th style="width:30%">Product name</th>
                                <th style="width:10%">Price</th>
                                <th style="width:8%">Quantity</th>
                                <th style="width:22%" class="text-center">Subtotal</th>
                                <th style="width:10%"></th>
                            </tr>
                        </thead>

                    


                        <?php
                            if (empty($cartItems)) {
                            echo '<br><div class="text-center">Chưa Có Sản Phẩm Trong Giỏ Hàng</div><br>';
                            echo '<a href="#" style="width:15%; margin:5px 42.5%" class="btn btn-primary" data-bs-dismiss="modal">Tiếp Tục Mua Sắm</a>';
                            }
                            else {
                                $i = 1;
                                foreach ($cartItems as $productId => $item) {
                        ?>

                                    <tbody>
                                        <tr>
                                            <td data-th="stt"><?php echo $i++; ?></td>
                                            <td data-th="Image">
                                                <div class="row">
                                                    <div class="col-sm-2 hidden-xs"><img src="<?php echo BASE_URL . 'public/upload/' . $item['Image'] ?>" alt="..." class="img-responsive" style="width:100px;height:100px;" /></div>
                                                </div>
                                            </td>
                                            <td data-th="Product name"><h5><?php echo $item['productName']; ?></h5>
                                            </td>
                                            <td data-th="Price" ><?php echo number_format($item['Price']); ?>đ</td>
                                            <td data-th="Quantity">
                                                <input type="number" max=30 min=0 step=1 name="<?php echo $productId ?>" class="form-control text-center" id='quantity'value="<?php echo $item['quantity']; ?>">
                                            </td>
                                            <td data-th="Subtotal" class="text-center"><?php echo number_format($cart->getSubTotal($productId)); ?>đ</td>
                                            <td class="actions" data-th="">
                                                <button class="btn btn-info btn-sm"><i class="fas fa-sync-alt"></i></i></button>
                                                <button class="btn btn-danger btn-sm" onclick="quantity()"><i class="fas fa-trash-alt"></i></button>
                                            </td>
                                        </tr>
                                    </tbody>
                                <?php }
                            } ?>

                        <tfoot>
                            <tr class="visible-xs">
                                <td colspan="6" class="hidden-xs"></td>
                                <td ><input type='submit' class="btn btn-success" value='Save Changes'></td>
                            </tr>
                            <tr>
                                <td colspan="2"><a href=''class="btn btn-warning"><i class="fa fa-angle-left" data-bs-dismiss="modal"></i> Continue Shopping</a></td>
                                <td colspan="3" class="hidden-xs"></td>
                                <td class="hidden-xs text-center"><strong>Total: <?php echo number_format($cart->getTotal()); ?>đ</strong></td>
                                <td><a href="<?php echo BASE_URL?>cart/checkout" class="btn btn-success btn-block" style="width:100%">Check Out<i class="fa fa-angle-right"></i></a></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</form>
<script> function quantity() {
  document.getElementById("quantity").innerHTML = 0;
}
</script>
<?php
    if(isset($_SESSION['update'])){
        echo '<script>cartIcon.click()</script>';
        unset($_SESSION['update']);
        }
        else return null;
    
?>