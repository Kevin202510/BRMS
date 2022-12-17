<?php session_start(); ?>
<?php include('layouts/head.php'); ?>
   <div class="loader-bg">
      <div class="loader-bar">
      </div>
   </div>
   <div class="wrapper">
      <!-- Navbar-->
      <?php include('layouts/navbar.php'); ?>
      <!-- Side-Nav-->
      <?php include('layouts/sidebar.php'); ?>
      <!-- Sidebar chat start -->
      
      <!-- Sidebar chat end-->
      <div class="content-wrapper">
         <!-- Container-fluid starts -->
         <!-- Main content starts -->
         <div class="container-fluid">
            <div class="row">
               <div class="main-header">
                  <h2  style=" font-family:poppins; color:#8d7252;">Customer checkout</h2>
               </div>
            </div>

            <div class="card">
        <div class="card-header">
            
        </div>
        <div class="card-body">
        <table class="table">
                <thead class="thead-light">
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Fullname</th>
                    <th scope="col">Apparel Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">CheckOut Date</th>
                    <th scope="col">Rent Date</th>
                    <th scope="col">Return Date</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    include('../APIFUNCTION/DBCRUD.php');
                    $newDBCRUD = new DBCRUD();
                    $newDBCRUD->select213();
                    $productsLists = $newDBCRUD->sql;
            
                    $index = 1;
                    while ($data = mysqli_fetch_assoc($productsLists)){
                     
                ?>

                  <tr>
                    <th scope="row"><?php echo $index; ?></th>
                   
                    <td><?php echo $data["customer_fname"]."".$data["customer_lname"] ?></td>
                    <td><?php echo $data["name"]; ?></td>
                    <td><?php echo $data["price"]; ?></td>
                    <td><?php echo $data["customer_quantity"]; ?></td>
                    <td><?php echo $data["total_checkout_amount"]; ?></td>
                    <td><?php echo date('M-d-Y', strtotime($data["checkout_rent_date"])); ?></td>
                    <td><?php echo date('M-d-Y', strtotime($data["checkout_rent_return_date"])); ?></td>
                    <td>
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                      <label class="btn btn-secondary active">
                      <button type="button" class="btn btn-success" data-id="<?php echo $data['checkout_id']; ?>" id="paynow">Pay</button>
                      </label>
                    </div>
                    </td>
                    </tr>
                    <?php $index++; }?>
                </tbody>
            </table>
        </div>

        
         </div>
       
      </div>
   </div>

   <!--RETURN Modal -->
<div class="modal fade" id="returnModal" tabindex="-1" role="dialog" aria-labelledby="rentprodModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="rentprodModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form id="rentForms">
        <input type="hidden" id="cart_ids" name="c_id">
        <input type="hidden" id="checkout_id" name="checkout_id">
        <input type="hidden" id="prods_id" name="prods_id">
        <div class="form-row">
        <div class="form-group col-md-12">
            <label >FullName</label>
            <input type="text" class="form-control"  readonly id="customer_fnames">
        </div>
        </div>
        <div class="form-row">
        <div class="form-group col-md-6">
            <label >Apprrel Name</label>
            <input type="text" class="form-control"  readonly id="product_ids">
        </div>
        <div class="form-group col-md-6">
            <label >Apparel Quantity</label>
            <input type="text" class="form-control"  readonly id="customer_quantitys">
            <input type="hidden" class="form-control"  readonly name="prod_stocks" id="prod_quant">
        </div>
        </div>

        <div class="form-row">
        <div class="form-group col-md-6">
            <label >Apparel Price</label>
            <input type="text" class="form-control"  readonly id="app_price">
        </div>
        <div class="form-group col-md-6">
            <label >Total Amount</label>
            <input type="text"  readonly class="form-control" id="app_total_amt" name="app_total_amt">
        </div>
        </div>

        <div class="form-group">
            <label for="exampleFormControlSelect1">Mode Of Transaction</label>
            <input type="text" class="form-control" name="transaction_mode" id="transaction_mode" readonly>
            </select>
        </div>

        <div class="form-group">
            <label for="exampleFormControlTextarea1">Rent Date</label>
            <input type="text" class="form-control" readonly id="checkout_rent_date" name="checkout_rent_date">
        </div>

        <div class="form-group">
            <label for="exampleFormControlTextarea1">Return Date</label>
            <input type="text" class="form-control" readonly id="checkout_rent_return_date" name="checkout_rent_return_date">
        </div>

        <div class="form-group">
            <label for="exampleFormControlTextarea1">Delivery Address And Contact Number</label>
            <textarea class="form-control" name="delivery_description" readonly id="delivery_description" rows="3"></textarea>
        </div>

        <div class="form-row">
        <div class="form-group col-md-6">
            <label >Payment</label>
            <input type="text" class="form-control" id="app_pay" name="app_pay">
        </div>
        <div class="form-group col-md-6">
            <label >Change</label>
            <input type="text" class="form-control" id="app_change" readonly>
        </div>
        </div>

        </form>
      <!-- </div> -->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="saveBTNs">Save</button>
      </div>
    </div>
  </div>
</div>

   <?php include('usermodal.php');?>
<?php include('layouts/footer.php'); ?>

<script>
    $("body").on("click","#paynow",function(e){
        var cart_ids = $(e.currentTarget).data("id");
        // alert(cart_ids);
        $.ajax({
            type: "POST",
            url: "checkoutpay.php",
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
                $("#checkout_id").val(newdata[0].checkout_id);
                $("#app_total_amt").val(parseInt(newdata[0].price)*parseInt(newdata[0].quantity));
                $("#prods_id").val(newdata[0].product_id);
                $("#checkout_rent_date").val(newdata[0].checkout_rent_date);
                $("#checkout_rent_return_date").val(newdata[0].checkout_rent_return_date);
                $("#delivery_description").val(newdata[0].delivery_description);
                $("#app_total_amt").val(parseInt(newdata[0].price)*parseInt(newdata[0].quantity));
                if(newdata[0].transaction_mode==1){
                    $("#transaction_mode").val("Cash On Delivery");
                }else{
                    $("#transaction_mode").val("On Shop");
                }
            },
          });
        $("#returnModal").modal("show");
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
            url: "checkoutpay.php",
            data: $("#rentForms").serializeArray(),
            success: function(datas){
                //alert("Work Saved Successfully");
                location.reload();
            },
        });
    });
</script>
<script src="js/users.js"></script>