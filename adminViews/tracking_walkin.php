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
               <h2  style=" font-family:poppins; color:#8d7252;">Tracking Orders</h2><br>
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
        <table class="table">
                <thead class="thead-light">
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Fullname</th>
                    <th scope="col">Apparel Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">checkout Amount</th>
                    <th scope="col">checkout Date</th>
                    <th scope="col">Rent Date</th>
                    <th scope="col">Rent Return Date</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody id="table-main">
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
                    <td><?php echo date('M-d-Y', strtotime($data["checkout_Date"])); ?></td>
                    <td><?php echo date('M-d-Y', strtotime($data["checkout_rent"])); ?></td>
                    <td><?php echo date('M-d-Y', strtotime($data["checkout_return"])); ?></td>
                    <td>
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                      <label class="btn btn-secondary active">
                      <button type="button" class="btn btn-success" onclick="showformreturn(<?php echo $data['cwc_id']; ?>);">Return</button>
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



         <!--update customer_walkin Modal -->
<div class="modal fade" id="customerModal" tabindex="-1" role="dialog" aria-labelledby="rentprodModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="rentprodModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form id="rentForm">
        <input type="hidden" id="cw_id" name="cw_id">
        <input type="hidden" id="id" name="id">
        <div class="form-group">
        <label>Customer Walkin</label>
            <input type="text" class="form-control" id="customer_walkin" name="customer_walkin">
        </div>
        <div class="form-group">
           <label>Checkout Status</label>
            <input type="text" class="form-control" id="checkout_status" name="checkout_status">
        </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="update_customer_walkin">update</button>
      </div>
    </div>
  </div>
</div>



   <?php include('cartmodal.php');?>
<?php include('layouts/footer.php');?>


<script>
  $(document).ready(function(){
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

 
  function showformreturn(id){
      $.ajax({
            type: "POST",
            url: "functions/userscrud.php",
            data: {userId:id},
            
            success: function(datas){
                var datas = JSON.parse(datas);
                console.log(datas);
                $("#cwc_id").val(datas.cwc_id);
                $("#customer_walkin").val(datas.customer_walkin);
                $("#checkout_status").val(datas.checkout_status);
                
            },
          });
        
          $("#update_customer_walkin").attr('name',"updateuser");
        $("#update_customer_walkin").html("Update");

        $("#customerModal").modal("show");
}

</script>

