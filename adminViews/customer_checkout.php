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
                    <th scope="col">CheckOut Amount</th>
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
                    $newDBCRUD->select214("checkout","*",);
                    $userLists = $newDBCRUD->sql;
            
                    $index = 1;
                    while ($data = mysqli_fetch_assoc($userLists)){
                ?>
                    <tr>
                    <th scope="row"><?php echo $index; ?></th>
                   
                    <td><?php echo $data["fname"]."".$data["lname"] ?></td>
                    <td><?php echo $data["name"]; ?></td>
                    <td><?php echo $data["price"]; ?></td>
                    <td><?php echo $data["quantity"]; ?></td>
                    <td><?php echo $data["checkout_amount"]; ?></td>
                    <td><?php echo date('M-d-Y', strtotime($data["checkout_date"])); ?></td>
                    <td><?php echo date('M-d-Y', strtotime($data["checkout_rent_date"])); ?></td>
                    <td><?php echo date('M-d-Y', strtotime($data["checkout_rent_return_date"])); ?></td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">                     
                            
                            <button type="button" class="btn btn-success" onclick="showformpay(<?php echo $data['checkout_id ']; ?>);">Pay</button>
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
   <?php include('usermodal.php');?>
<?php include('layouts/footer.php'); ?>

<script>
  


</script>
<script src="js/users.js"></script>