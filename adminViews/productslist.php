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
               <h2  style=" font-family:poppins; color:#8d7252; ">Products List</h2><br>
               </div>
            </div>
        <div class="card">
        <div class="card-header">
            
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#productsModal">
            Add New Product
            </button>
        </div>
        <div class="card-body">
        <table class="table">
                <thead class="thead-light">
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Image</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Category</th>
                    <th scope="col">Price</th>
                    <th scope="col">Stocks</th>
                    <th scope="col">Description</th>
                    <th scope="col">Variation</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    include('../APIFUNCTION/DBCRUD.php');
                    $newDBCRUD = new DBCRUD();
                    $newDBCRUD->selectleftjoin("products","categories","category_id","category_id");
                    $productsLists = $newDBCRUD->sql;
            
                    $index = 1;
                    while ($data = mysqli_fetch_assoc($productsLists)){
                ?>
                    <tr>
                    <td><?php echo $index; ?></td>
                    <td><img style="width:100px;" src="./uploads/<?php echo $data["image"]; ?>" class="img-thumbnail"></td>
                    <td><?php echo $data["name"]; ?></td>
                    <td><?php echo $data["cat_name"]; ?></td>
                    <td><?php echo $data["price"]; ?></td>
                    <td><?php echo $data["stocks"]; ?></td>
                    <td><?php echo $data["description"]; ?></td>
                    <td><?php echo $data["variation"]; ?></td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-info" onclick="showform(<?php echo $data['product_id']; ?>);">Edit</button>
                            <button type="button" class="btn btn-danger" onclick="showformdelete(<?php echo $data['product_id']; ?>);">Delete</button>
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
    <!-- END CONTENT -->

<?php include('productsmodal.php');?>
<?php include('layouts/footer.php');?>
<script>
function showform(id){

    $.ajax({
        type: "POST",
        url: "functions/productscrud.php",
        data: {product_id:id},
        success: function(datas){
            var datas = JSON.parse(datas);
            $("#product_id").val(datas.product_id);
            $("#name").val(datas.name);
            $("#category_id").val(datas.category_id);
            $("#price").val(datas.price);
            $("#stocks").val(datas.stocks);
            $("#description").val(datas.description);
            $("#variation").val(datas.variation);
           

        },
    });

    $("#addproducts").attr('name',"updateproducts");
    $("#saveBTN").html("Update Product");
    $("#productsModal").modal("show");
}

var id;

function showformdelete(ids){
    id=ids;
    $("#productsModalDelete").modal("show");
}

$("#deleteproducts").click(function(e){
    // alert(id);
    $.ajax({
        type: "POST",
        url: "functions/productscrud.php",
        data: {product_idsss:id,deleteproducts:"deleteproducts"},
        success: function(datas){
            $("#productsModalDelete").modal("hide");
            //alert("Work Saved Successfully");
            location.reload();
        },
    });
});
</script>
<script src="js/products.js"></script>