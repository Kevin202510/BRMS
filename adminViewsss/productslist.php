<?php include('layouts/head.php');?>
<?php include('layouts/header.php');?>>
<?php include('layouts/searchbar.php');?>    

    <!-- Start Content  -->

    <div class="products-box">
        <div class="container">
        <div class="card">
        <div class="card-header">
            <h2>Products List</h2><br>
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
                    <th scope="row"><?php echo $index; ?></th>
                    <td><img style="width:150px;" src="../images/<?php echo $data["image"]; ?>" class="img-thumbnail"></td>
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
            alert("Work Saved Successfully");
            location.reload();
        },
    });
});
</script>
<script src="js/products.js"></script>