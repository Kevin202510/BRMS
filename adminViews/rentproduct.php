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
               <h2  style=" font-family:poppins; color:#8d7252;">Rent List</h2><br>
               </div>
            </div>

            <div class="card">
        <div class="card-header">
            
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#rentModal" id="rentbtn">
            Rent New
            </button>
        </div>
        <div class="card-body">
        <table class="table">
                <thead class="thead-light">
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">First name</th>
                    <th scope="col">Last name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Product</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    include('../APIFUNCTION/DBCRUD.php');
                    $newDBCRUD = new DBCRUD();
                    $newDBCRUD->select20();
                    $productsLists = $newDBCRUD->sql;
            
                    $index = 1;
                    while ($data = mysqli_fetch_assoc($productsLists)){
                ?>
                    <tr>
                    <th scope="row"><?php echo $index; ?></th>
                    <td><?php echo $data["customer_fname"]; ?></td>
                    <td><?php echo $data["customer_lname"] ; ?></td>
                    <td><?php echo $data["customer_address"]; ?></td>
                    <td><?php echo $data["name"]; ?></td>
                    <td><?php echo $data["customer_quantity"]; ?></td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-info" onclick="showform(<?php echo $data['cw_id']; ?>);">Edit</button>
                            <button type="button" class="btn btn-danger" onclick="showformdelete(<?php echo $data['cw_id']; ?>);">Delete</button>
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
<?php include('layouts/footer.php'); ?>

<script>

$(document).ready(function(){
    $("#rentbtn").click(function(){
        $.ajax({
        type: "POST",
        url: "functions/rentcrud.php",
        data: {cw_id:"customer_Walkinid"},
        success: function(datas){
            var datas = JSON.parse(datas);
            if(datas.length==0){
                $("#cw_id").val(1);
            }else{
                $("#cw_id").val(parseInt(datas.cw_id)+1);
            }
            $("#rentModal").modal("show");
        }, 
    });
    })
})
    
function showform(id){

    //alert(id);
    $.ajax({
        type: "POST",
        url: "functions/rentcrud.php",
        data: {rent_id:id},
        success: function(datas){
            var datas = JSON.parse(datas);
            console.log(datas);
            $("#cw_id").val(datas.cw_id);
            $("#customer_fname").val(datas.customer_fname);
            $("#customer_lname").val(datas.customer_lname);
            $("#customer_address").val(datas.customer_address);
            $('#customer_product_ids option[value='+datas.customer_product_id+']').attr("selected", "selected");
            $("#customer_quantity").val(datas.customer_quantity); 
        },
    });

    $("#rentmodal").attr('name',"editrentmodal");
    $("#saveBTN").html("Update Rent");
    $("#rentModal").modal("show");
}

var id;

function showformdelete(ids){
    id=ids;
    // alert(id);
    $("#rentModalDelete").modal("show");
}

$("#deleteproducts").click(function(e){
    //alert(id);
    $.ajax({
        type: "POST",
        url: "functions/rentcrud.php",
        data: {rent_id:id,deleteproducts:"deleteproducts"},
        success: function(datas){
              $("#rentModalDelete").modal("hide");
            //alert("Work Saved Successfully");
            location.reload();
        },
    });
});
</script>
<script src="js/rents.js"></script>