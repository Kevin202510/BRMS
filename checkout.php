<?php session_start(); ?>
<?php include('layouts/head.php');?>
    <!-- Start Main Top -->
    <?php include('layouts/header.php');?>
    <!-- End Main Top -->

    <!-- Start Top Search -->
    <?php include('layouts/searchbar.php');?>    
    <!-- End Top Search -->
    <style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 2px solid #8d7252;
  text-align: left;
  padding: 8px;
}
</style>
    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Checkout</h2>
                    <ul class="breadcrumb">
                    <i style="font-size:24px; color:white;" class="fa">&#xf015;</i><li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active" style="color:white;">Checkout</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Cart  -->
    <div class="cart-box-main" style="background-color:white">
        <div class="container">
            
            <div class="row">
                <div class="col-sm-6 col-lg-6 mb-3"> 
                    <div class="checkout-address">
                        <div class="title-left">
                            <center><h1 style="color:#EF9273;">Customer Information</h1></center>
                        </div>          
                        <form class="needs">
                        <?php
                           if(isset($_SESSION['PERMISSION_ID'])){
                            include_once('APIFUNCTION/DBCRUD.php');
                            $newDBCRUD = new DBCRUD();
                            $whereclause = "user_id =" . $_SESSION["ID"];
                            $newDBCRUD->select("users","*",$whereclause);
                            $userLists = $newDBCRUD->sql;
                    
                            $index = 1;
                            while ($data = mysqli_fetch_assoc($userLists)){
                        ?>

<table>
  <tr>
    <th style="color:#EF9273; letter-spacing: 3px;">Fullname:<center> <input style="font-size:19px; border:none; color:#8d7252; font-family:roman;"   id="firstName" value="<?php echo $data['fname'].' '.$data['lname']; ?>" disabled></th>  </center>
  </tr>

  <tr>
    <th style="color:#EF9273;  letter-spacing: 3px;">Address: <center><input style=" font-size:19px; border:none; color:#8d7252; font-family:roman;"   id="address" value="<?php echo $data['address'] ?>" disabled></th>  </center>
  </tr>
 
  <tr>
    <th style="color:#EF9273;  letter-spacing: 3px;">Contact:   <center><input style=" font-size:19px; border:none; color:#8d7252; font-family:roman;"  id="address2" value="<?php echo $data['contact_num'] ?>" disabled></th> </center>
  </tr>
 </table>

                           
                            <?php }} ?>
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
                                   <center> <h1 style="color:#EF9273;">Your Orders</h1></center>
                                </div>
                                <div class="rounded p-2 bg-light">
                                <?php
                                $total = 0;
                                 if(isset($_SESSION['PERMISSION_ID'])){
                                    $ids=$_SESSION['ID'];
                                    // echo $ids;
                                    $newDBCRUD->selectleftjoin3($ids);
                                    $userLists = $newDBCRUD->sql;
                            
                                    $index = 1;
                                    // var_dump(json_encode($userLists));
                                    while ($data = mysqli_fetch_assoc($userLists)){
                                    if($data['status']==2 || $data['status']==0){
                                    $price1 = (int)$data["price"];
                                    $quantity = (int)$data["quantity"];
                                    $total += $price1*$quantity;
                                ?>
                                    <div class="media mb-2 border-bottom">
                                        <div class="media-body"> <a href="#"><?php echo $data["name"]; ?></a>
                                            <h1><div class="small text-muted">Price: <?php echo $data["price"]; ?> <span class="mx-2">|</span> Qty: <?php echo $data["quantity"]; ?><span class="mx-2">|</span> Subtotal: <?php echo $data["price"] * $data["quantity"]; ?></div></h1>
                                        </div>
                                    </div>
                                    <?php if($data['status']==2){ ?>
                                        <div class="col-12 d-flex shopping-box"><button type="button" data-id="<?php echo $data["cart_id"]; ?>" class="ml-auto btn hvr-hover" style="color:white;">Out Of Stock</button></div>
                                    <?php }else if($data['status']==0){ ?>
                                        <div class="col-12 d-flex shopping-box"><button type="button" data-id="<?php echo $data["cart_id"]; ?>" id="placeorder" class="ml-auto btn hvr-hover" style="color:white;">Place Order</button></div>
                                    <?php }}else{ ?>
                                        <div class="media mb-2 border-bottom">
                                            <div class="media-body"> <a href="#">NO CHECKOUT AVAILABLE</a>
                                            </div>
                                        </div>
                                    <?php } } }?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12">

                       
                                
                            <div class="order-box">
                                <div class="d-flex">
                            
                                </div>

                                <hr class="my-1">
                                <div class="d-flex gr-total">
                                    <h5>Grand Total: </h5>
                                    <div class="ml-auto h5"> <?php echo $total; ?> </div>
                                </div>
                                <hr> </div>
                        </div>
               
                    </div>
                </div>
            </div>

        </div>
    </div>
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
    <!-- End Cart -->
    <?php include('layouts/footer.php');?>
    


<!--CHECKOUT Modal -->
<div class="modal fade" id="rentCheckoutModal" tabindex="-1" role="dialog" aria-labelledby="rentprodModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header"style="background-color:#EF9273;">
        <h5 class="modal-title" id="rentprodModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form id="rentForms">
        <input type="hidden" id="cart_ids" name="c_id">
        <input type="hidden" id="user_ids" name="user_id">
        <input type="hidden" id="prods_id" name="prods_id">
        <div class="form-row">
        <div class="form-group col-md-12">
            <h2 style="color:#8d7252; letter-spacing:1px;">FullName</h2>
            <span type="text" class="form-control"  style="font-size:19px; border:none; background-color:transparent;" id="customer_fnames"></span>
        </div>
        </div>
        <div class="form-row">
        <div class="form-group col-md-6">
            <h2 style="color:#8d7252; letter-spacing:1px;" >Apprrel Name</h2>
            <span type="text" class="form-control" style="font-size:19px; border:none; background-color:transparent;" id="product_ids"></span>
        </div>
        <div class="form-group col-md-6">
            <h2 style="color:#8d7252; letter-spacing:1px;" >Apparel Quantity</h2>
            <span type="text" class="form-control"  style="font-size:19px; border:none; background-color:transparent;" id="customer_quantitys"></span>
            <input type="hidden" class="form-control"  readonly name="prod_stocks" id="prod_quant">
        </div>
        </div>

        <div class="form-row">
        <div class="form-group col-md-6">
            <h2 style="color:#8d7252; letter-spacing:1px;">Apparel Price</h2>
            <span type="text" class="form-control" style="font-size:19px; border:none; background-color:transparent;" id="app_price"></span>
        </div>
        <div class="form-group col-md-6">
            <h2 style="color:#8d7252; letter-spacing:1px;">Total Amount</h2>
            <span type="text" class="form-control" style="font-size:19px; border:none; background-color:transparent;" id="app_total_amt" name="app_total_amt"></span>
        </div>
        </div>

        <div class="form-group">
            <h3 style="color:#8d7252; letter-spacing:1px;" for="exampleFormControlSelect1">Mode Of Transaction</h3>
            <select class="form-control" style="font-size: 20px;" name="transaction_mode" id="exampleFormControlSelect1">
            <option value="1" style="font-size: 20px;">COD</option>
            <option value="2" style="font-size: 20px;">Pick Up</option>
            </select>
        </div>

        <div class="form-group">
            <h3 style="color:#8d7252; letter-spacing:1px;" for="exampleFormControlTextarea1">Rent Date</h3>
            <input type="date" class="form-control" style="font-size: 20px;" id="checkout_rent_date" name="checkout_rent_date">
        </div>

        <div class="form-group">
            <h3 style="color:#8d7252; letter-spacing:1px;" for="exampleFormControlTextarea1">Return Date</h3>
            <input type="date" class="form-control" style="font-size: 20px;" id="checkout_rent_return_date" name="checkout_rent_return_date">
        </div>

        <div class="form-group">
            <h3 style="color:#8d7252; letter-spacing:1px;" for="exampleFormControlTextarea1">Delivery Address And Contact Number</h3>
            <textarea class="form-control" id="exampleFormControlTextarea1" name="delivery_description" rows="3"></textarea>
        </div>
        </form>
      <!-- </div> -->
      <div class="tacbox">
  <input id="checkbox" type="checkbox">
  <label for="checkbox"> I agree to these  <a href="termscondition.php">Terms and Conditions</a>.</label>
  <h2>Terms And Conditions</h2>
          
          <p>Greetings User</p>
          <p>A rental period is for a duration of 2 days, It means the rented item is due to be returned during the last day of the renting. Once a rental item has been collected in store, there are no returns or refunds for change of mind if the item is returned unworn within the rental peri-od or on the renting end date. If the item has been damaged or ripped it will charge or have a penalty to your rented stuff.</p>
</div>
      <div class="modal-footer">
        <button type="button" class="btn btn" style="background-color:#8d7252; color:white;" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn" style="background-color:#EF9273; color:white;"  id="saveBTNs">Save</button>
      </div>
    </div>
  </div>
</div>


<link rel="stylesheet" href="css/style.css">
    <!-- Start Instagram Feed  -->
   
    <!-- End Instagram Feed  -->

    


   

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
                $("#customer_fnames").text(newdata[0].fname+" "+newdata[0].lname);
                $("#customer_addressss").val(newdata[0].address);
                $("#product_ids").text(newdata[0].name);
                $("#customer_quantitys").text(newdata[0].quantity);
                $("#app_price").text(newdata[0].price);
                $("#app_total_amt").text(parseInt(newdata[0].price)*parseInt(newdata[0].quantity));
                $("#prod_quant").val(parseInt(newdata[0].stocks)-parseInt(newdata[0].quantity)); 
                $("#prods_id").val(newdata[0].product_id);
            },
          });
        $("#rentCheckoutModal").modal("show");
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

 
