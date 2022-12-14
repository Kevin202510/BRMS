
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

    <!-- Start Content  -->

    <div class="content-wrapper">
         <!-- Container-fluid starts -->
         <!-- Main content starts -->
         <div class="container-fluid">
            <div class="row">
               <div class="main-header">
            
              <h2 style=" font-family:poppins; color:#8d7252; ">Sales</h2>
               </div>
            </div>
            
<div class="card" style="width: 18rem; float:right; margin-top:-100px;">
        <div class="card-header">
        <div class="input-group mb-3">
        <span>Total Sales: <input type="number" class="form-control" placeholder="PHP" id="tot" readonly></span>
 
</div>
  </div>   
        </div>
        <div class="card-body">
        <table class="table table-bordered">
        <thead>
      <tr>
      <th scope="col">#</th>
      <th scope="col">Full name</th>
      <th scope="col">Apprel name</th>
      <th scope="col">Amount</th>
      <th scope="col">Rent Date</th>
      <th scope="col">Rent Return Date</th>
      
        
      </tr>
    </thead>
    <tbody id="table-main">
    <?php
                    include('../APIFUNCTION/DBCRUD.php');
                    $newDBCRUD = new DBCRUD();
                    $newDBCRUD->select20();
                    $productsLists = $newDBCRUD->sql;
            
                    $index = 1;
                    $totalall=0;
                    while ($data = mysqli_fetch_assoc($productsLists)){
                      $totalall += doubleval($data["total_checkout_amount"]);
                ?>

       <tr>
                    <th scope="row"><?php echo $index; ?></th>
                    <td><?php echo $data["customer_fname"]."".$data["customer_lname"] ?></td>
                    <td><?php echo $data["name"]; ?></td>
                    <td><?php echo $data["total_checkout_amount"]; ?></td>
                    <td><?php echo date('M-d-Y', strtotime($data["checkout_rent_date"])); ?></td>
                    <td><?php echo date('M-d-Y', strtotime($data["checkout_rent_return_date"])); ?></td>
                    </tr>
                    <?php $index++; }?>
                    
                    <input type="hidden" id="totalamount" value = "<?php echo $totalall; ?>">
                </tbody>
            </table>
        </div>

          
    <!-- END CONTENT -->
    

<?php include('layouts/footer.php');?>


<script>
  $(document).ready(function(){
    $("#tot").val($("#totalamount").val());
  })
</script>



