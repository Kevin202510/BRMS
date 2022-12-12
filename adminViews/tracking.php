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
        <table class="table table-bordered">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Fullname</th>
                    <th scope="col">Apparel Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">checkout Amount</th>
                    <th scope="col">checkout Date</th>
                    <th scope="col">checkout Time</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody id="table-main">
                <?php
                    include('../APIFUNCTION/DBCRUD.php');
                    $newDBCRUD = new DBCRUD();
                    $newDBCRUD-> select213();
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
                    <td><?php echo $data["checkout_amount"]; ?></td>
                    <td><?php echo date('M-d-Y', strtotime($data["checkout_date"])); ?></td>
                    <td><?php echo date('h:i:s a', strtotime($data["checkout_time"])); ?></td>
                    <td>
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                      <label class="btn btn-secondary active">
                        <input type="radio" name="options" id="option1" autocomplete="off" checked> Return
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
</script>

