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
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active" style="color:white;">Cart</li>
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
                                $newDBCRUD->selectleftjoin3000($ids);
                                $userLists = $newDBCRUD->sql;

                                // var_dump($userLists);
                        
                                $index = 1;
                                while ($data = mysqli_fetch_assoc($userLists)){
                                   $q=$data['quantity'];
                                   $p=$data['price'];
                                   $total= $q* $p;
                            ?>
                            <input type="hidden" id="cart_id" value="<?php echo $data['cart_id']; ?>">
                            
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
                                    <input type="hidden" id="pricy" value="<?php echo $data['price']?>">
                                    <td class="quantity-box"><input type="number" size="4" value="<?php echo $data['quantity']?>" min="1" max="<?php echo $data['stocks'] ?>" step="1" class="c-input-text qty text" id="changequantity"></td>
                                    <td class="total-pr">
                                    <span id="priceprod"><?php echo $total;?></span>
                                    </td>
                                    <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                    <button type="button" id="addquantity" class="btn btn"  style="background-color:#8d7252; color:white;" data-id="<?php echo $data['cart_id']; ?>">Update</button>
                                    <button type="button" id="removeincart" class="btn btn"  style="background-color:#8d7252; color:white;" data-id="<?php echo $data['cart_id']; ?>">Remove</button>
                                    </div></td>
                                </tr>
                                <?php $index++; }}?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <?php include('loginmodal.php');?>
            
           
                <div class="col-12 d-flex shopping-box"><a href="checkout.php" style="color:white; right:210px;"class="ml-auto btn hvr-hover">Checkout</a> </div>
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

    <script>
        $("body").on("click","#addquantity",function(e){
            var cart_ids = $(e.currentTarget).data("id");
            $.ajax({
            type: "POST",
            url: "addquantity.php",
            data: {cart_id2:cart_ids,quantity:$("#changequantity").val()},
            success: function(datas){
                alert("Added Success")
                location.reload();
            },
          });
        });

        $("body").on("click","#removeincart",function(e){
            var cart_ids = $(e.currentTarget).data("id");
            $.ajax({
            type: "POST",
            url: "addquantity.php",
            data: {cart_id3:cart_ids},
            success: function(datas){
                alert("Remove Success")
                location.reload();
            },
          });
        });
    </script>
            