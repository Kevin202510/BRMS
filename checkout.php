<?php session_start(); ?>
<?php include('layouts/head.php');?>
    <!-- Start Main Top -->
    <?php include('layouts/header.php');?>
    <!-- End Main Top -->

    <!-- Start Top Search -->
    <?php include('layouts/searchbar.php');?>    
    <!-- End Top Search -->

    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Checkout</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active">Checkout</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Cart  -->
    <div class="cart-box-main">
        <div class="container">
            
            <div class="row">
                <div class="col-sm-6 col-lg-6 mb-3">
                    <div class="checkout-address">
                        <div class="title-left">
                            <h3>Customer Information</h3>
                        </div>          
                        <form class="needs">
                        <?php
                            // include('APIFUNCTION/DBCRUD.php');
                            // $newDBCRUD = new DBCRUD();
                            $whereclause = "user_id =" . $_SESSION["ID"];
                            $newDBCRUD->select("users","*",$whereclause);
                            $userLists = $newDBCRUD->sql;
                    
                            $index = 1;
                            while ($data = mysqli_fetch_assoc($userLists)){
                        ?>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="firstName">Fullname</label>
                                    <input type="text" style="text-align:center;" class="form-control" readonly id="firstName" value="<?php echo $data['fname'].' '.$data['lname']; ?>" required>
                                </div>
                            </div>
                    
                            <div class="mb-3">
                                <label for="address">Address *</label>
                                <input type="text" style="text-align:center;" class="form-control" readonly id="address" value="<?php echo $data['address'] ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="address2">Contact Number *</label>
                                <input type="text" style="text-align:center;" class="form-control" readonly id="address2" value="<?php echo $data['contact_num'] ?>"> </div>
                            <?php } ?>
                        </form>
                            
                            <div class="row">
                               
                                <div class="col-md-6 mb-3">
                                   
                                </div>
                            </div>
                            <hr class="mb-1"> </form>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-6 mb-3">
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="odr-box">
                                <div class="title-left">
                                    <h3>Your Orders</h3>
                                </div>
                                <div class="rounded p-2 bg-light">
                                <?php
                                    $ids=$_SESSION['ID'];
                                    $newDBCRUD->selectleftjoin3($ids);
                                    $userLists = $newDBCRUD->sql;
                            
                                    $index = 1;
                                    $total = 0;
                                    while ($data = mysqli_fetch_assoc($userLists)){
                                    $price1 = (int)$data["price"];
                                    $quantity = (int)$data["quantity"];
                                    $total += $price1*$quantity;
                                ?>
                                    <div class="media mb-2 border-bottom">
                                        <div class="media-body"> <a href="#"><?php echo $data["name"]; ?></a>
                                            <div class="small text-muted">Price: <?php echo $data["price"]; ?> <span class="mx-2">|</span> Qty: <?php echo $data["quantity"]; ?><span class="mx-2">|</span> Subtotal: <?php echo $data["price"] * $data["quantity"]; ?></div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12">
                            <div class="order-box">
                                <div class="d-flex">
                                    <div class="font-weight-bold">Product</div>
                                    <div class="ml-auto font-weight-bold">Total</div>
                                </div>
                                <hr class="my-1">
                                <div class="d-flex gr-total">
                                    <h5>Grand Total</h5>
                                    <div class="ml-auto h5"> <?php echo $total; ?> </div>
                                </div>
                                <hr> </div>
                        </div>
                        <div class="col-12 d-flex shopping-box"> <a href="checkout.html" class="ml-auto btn hvr-hover">Place Order</a> </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- End Cart -->

    <!-- Start Instagram Feed  -->
    <div class="instagram-box">
        <div class="main-instagram owl-carousel owl-theme">
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/access2.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/barongw.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/5.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/gown2.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/barong.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/1.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
           
        </div>
    </div>
    <!-- End Instagram Feed  -->



    <!-- Start Footer  -->
    <?php include('layouts/footer.php');?>
     <!-- end footer -->