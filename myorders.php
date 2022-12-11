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
                    <h2>My Rents</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active" style="color:white;">My Rents</li>
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
                <div class="col-sm-12 col-lg-12 mb-3">
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="odr-box">
                                <div class="title-left">
                                   <center> <h3 style="color:#EF9273;">Your Orders</h3></center>
                                </div>
                                <div class="rounded p-2 bg-light">
                                <?php
                                 if(isset($_SESSION['PERMISSION_ID'])){
                                    $ids=$_SESSION['ID'];
                                    // echo $ids;
                                    $newDBCRUD->selectleftjoin23($ids);
                                    $userLists = $newDBCRUD->sql;
                            
                                    $index = 1;
                                    $total = 0;
                                    // var_dump(json_encode($userLists));
                                    while ($data = mysqli_fetch_assoc($userLists)){
                                    $price1 = (int)$data["price"];
                                    $quantity = (int)$data["quantity"];
                                    $total += $price1*$quantity;
                                ?>
                                    <div class="media mb-2 border-bottom">
                                        <div class="row">
                                            <div class="media-body"> <a href="#"><?php echo $data["name"]; ?></a>
                                                <div class="small text-muted">Price: <?php echo $data["price"]; ?> <span class="mx-2">|</span> Qty: <?php echo $data["quantity"]; ?><span class="mx-2">|</span> Subtotal: <?php echo $data["price"] * $data["quantity"]; ?><span style="margin-left:800px;">On Process</span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php }} ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12">
                            <div class="order-box">
                                <hr class="my-1">
                                <div class="d-flex gr-total">
                                    <h5>Grand Total</h5>
                                    <div class="ml-auto h5"> <?php echo $total; ?> </div>
                                </div>
                                <hr> </div>
                        </div>
               
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

     <script>
     
     $("body").on("click","#placeorder",function(e){
        var cart_ids = $(e.currentTarget).data("id");
        // alert(cart_ids);
        $.ajax({
            type: "POST",
            url: "checkoutapparel.php",
            data: {cart_id:cart_ids},
            success: function(datas){
                var newdata = JSON.parse(datas);
                console.log(newdata);
                $("#cart_ids").val(newdata[0].cart_id);
                $("#user_ids").val(newdata[0].user_id);
                $("#customer_fnames").val(newdata[0].fname+" "+newdata[0].lname);
                $("#customer_addressss").val(newdata[0].address);
                $("#product_ids").val(newdata[0].name);
                $("#customer_quantitys").val(newdata[0].quantity);
                $("#app_price").val(newdata[0].price);
                $("#app_total_amt").val(parseInt(newdata[0].price)*parseInt(newdata[0].quantity));
                // $("#customer_quantity").val(newdata.customer_quantity); 
            },
          });
        $("#rentCheckoutModal").modal("show");
     });

     $("#app_pay").keyup(function(){
    if(parseInt($("#app_pay").val())>=parseInt($("#app_total_amt").val())){
            $("#app_change").val(parseInt($("#app_pay").val())-parseInt($("#app_total_amt").val()));
            $("#saveBTNs").prop("disabled", false);
        } 
    });

    $("#saveBTNs").click(function(e){

        e.preventDefault();

        $.ajax({
            type: "POST",
            url: "checkoutapparel.php",
            data: $("#rentForms").serializeArray(),
            success: function(datas){
                //alert("Work Saved Successfully");
                location.reload();
            },
        });
    });
     
     </script>