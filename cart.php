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
                    <h2>Cart</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active">Cart</li>
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
                <div class="col-lg-12">
                    <div class="table-main table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Images</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                 include_once('APIFUNCTION/DBCRUD.php');
                                 $newDBCRUD = new DBCRUD();
                                if(isset($_SESSION['PERMISSION_ID'])){
                                $ids=$_SESSION['ID'];
                                $newDBCRUD->selectleftjoin3($ids);
                                $userLists = $newDBCRUD->sql;

                                // var_dump($userLists);
                        
                                $index = 1;
                                while ($data = mysqli_fetch_assoc($userLists)){
                                  
                            ?>
                           
                    
                                <tr>
                                    <td class="thumbnail-img">
                                        <img style="width:65px; height: 70px" src="adminViews/uploads/<?php echo $data["image"]; ?>" class="img-thumbnail">
								
                                    </td>
                                    
                                    <td class="name-pr">
                                        <a href="#">
									<?php echo $data['name']?>
								</a>
                                    </td>
                                    <td class="price-pr">
                                    <?php echo $data['price']?>
                                    </td>
                                    <td class="quantity-box"><input type="number" size="4" value="<?php echo $data['quantity']?>" min="0" step="1" class="c-input-text qty text"></td>
                                    <td class="total-pr">
                                    <?php echo $data['price']?>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-info" onclick="showform(<?php echo $data['category_id']; ?>);">Update Cart</button>
                                        <button type="button" class="btn btn-danger" onclick="showformdelete(<?php echo $data['cart_id']; ?>);">Delete</button>
                                    </td>
                                </tr>
                                <?php $index++; }}?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <?php include('loginmodal.php');?>
            
            <div class="row my-5">
                <div class="col-lg-8 col-sm-12"></div>
                <div class="col-lg-4 col-sm-12">
                    <div class="order-box">
                        <h3>Order summary</h3>
                        <div class="d-flex">
                            <h4>Sub Total</h4>
                            <div class="ml-auto font-weight-bold"> $ 130 </div>
                        </div>
                        <div class="d-flex">
                            <h4>Discount</h4>
                            <div class="ml-auto font-weight-bold"> $ 40 </div>
                        </div>
                        <hr>
                        <div class="d-flex gr-total">
                            <h5>Final Total</h5>
                            <div class="ml-auto h5"> $ 388 </div>
                        </div>
                        <hr> </div>
                </div>
                <div class="col-12 d-flex shopping-box"><a href="checkout.php" class="ml-auto btn hvr-hover">Checkout</a> </div>
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