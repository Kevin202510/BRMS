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
               <h2  style=" font-family:poppins; color:#8d7252;">Tracking Online Orders</h2><br>
               </div>
            </div>

            <div class="card">
        <div class="card-header">
            
            <nav class="navbar navbar-light bg-light justify-content-between">
                <a class="navbar-brand">Tracking Orders</a>
                <div class="form-inline" style="float:right;">
                    <input class="form-control mr-sm-2" type="search" id="searchData" placeholder="Search" aria-label="Search">
                </div>
            </nav>

        </div>
        <div class="card-body">
        <table class="table table-bordered">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Fullname</th>
                    <th scope="col">Apparel Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Rent Date</th>
                    <th scope="col">Return Date</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody id="table-main">
                <?php
                    include('../APIFUNCTION/DBCRUD.php');
                    $newDBCRUD = new DBCRUD();
                    $newDBCRUD->select214();
                    $productsLists = $newDBCRUD->sql;
            
                    $index = 1;
                    while ($data = mysqli_fetch_assoc($productsLists)){
                     
                ?>

                  <tr>
                    <th scope="row"><?php echo $index; ?></th>
                   
                    <td><?php echo $data["fname"]."".$data["lname"] ?></td>
                    <td><?php echo $data["name"]; ?></td>
                    <td><?php echo $data["price"]; ?></td>
                    <td><?php echo $data["quantity"]; ?></td>
                    <td><?php echo date('M-d-Y', strtotime($data["checkout_rent_date"])); ?></td>
                    <td><?php echo date('M-d-Y', strtotime($data["checkout_rent_return_date"])); ?></td>
                    <td>
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                      <label class="btn btn-secondary active">
                      <button type="button" class="btn btn-success" >Return</button>
                      </label>
                    </div>
                    </td>
                    </tr>
                    <?php $index++; }?>
                    
                </tbody>
            </table>
        </div>

            <!-- 2-1 block end -->
         </div>
         <!-- Main content ends -->
         <!-- Container-fluid ends -->
         <!-- <div class="fixed-button">
            <a href="#!" class="btn btn-md btn-primary">
              <i class="fa fa-shopping-cart" aria-hidden="true"></i> Upgrade To Pro
            </a>
         </div> -->
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
        <input type="hidden" id="user_ids" name="user_id">
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
            <select class="form-control" name="transaction_mode" id="exampleFormControlSelect1">
            <option value="1">COD</option>
            <option value="2">On Shop</option>
            </select>
        </div>

        <div class="form-group">
            <label for="exampleFormControlTextarea1">Rent Date</label>
            <input type="date" class="form-control" id="checkout_rent_date" name="checkout_rent_date">
        </div>

        <div class="form-group">
            <label for="exampleFormControlTextarea1">Return Date</label>
            <input type="date" class="form-control" id="checkout_rent_return_date" name="checkout_rent_return_date">
        </div>

        <div class="form-group">
            <label for="exampleFormControlTextarea1">Delivery Address And Contact Number</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" name="delivery_description" rows="3"></textarea>
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

   <?php include('cartmodal.php');?>
<?php include('layouts/footer.php');?>


<script>
  $(document).ready(function(){

    $("body").on("click","#returnapparel",function(e){
      var cart_ids = $(e.currentTarget).data("id");
      $("#returnModal").modal("show");
    });

    $("#searchData").keyup(function(){
        // alert("asd");
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("searchData");
    filter = input.value.toUpperCase();
    table = document.getElementById("table-main");
    tr = table.getElementsByTagName("tr");

    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
        } else {
            tr[i].style.display = "none";
        }
        }
    }
    });
  })
</script>

