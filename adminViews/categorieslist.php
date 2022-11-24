<?php include('layouts/head.php');?>
<?php include('layouts/header.php');?>>
<?php include('layouts/searchbar.php');?>    

    <!-- Start Content  -->

    <div class="products-box">
        <div class="container">
        <div class="card">
        <div class="card-header">
            <h2>Categories List</h2><br>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#categoriesModal">
            Add New Data
            </button>
        </div>
        <div class="card-body">
        <table class="table">
                <thead class="thead-light">
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    include('../APIFUNCTION/DBCRUD.php');
                    $newDBCRUD = new DBCRUD();
                    $newDBCRUD->select("categories","*");
                    $categoriesLists = $newDBCRUD->sql;
            
                    $index = 1;
                    while ($data = mysqli_fetch_assoc($categoriesLists)){
                ?>
                    <tr>
                    <th scope="row"><?php echo $index; ?></th>
                    <td><?php echo $data["cat_name"]; ?></td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-info" onclick="showform(<?php echo $data['category_id']; ?>);">Edit</button>
                            <button type="button" class="btn btn-danger" onclick="showformdelete(<?php echo $data['category_id']; ?>);">Delete</button>
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

<?php include('categoriesmodal.php');?>
<?php include('layouts/footer.php');?>
<script>
function showform(id){

    $.ajax({
        type: "POST",
        url: "functions/categoriescrud.php",
        data: {category_id:id},
        success: function(datas){
            var datas = JSON.parse(datas);
            $("#category_id").val(datas.category_id);
            $("#name").val(datas.name);
        },
    });

    $("#addcategories").attr('name',"updatecategories");
    $("#saveBTN").html("Update Category");
    $("#categoriesModal").modal("show");
}

var id;

function showformdelete(ids){
    id=ids;
    $("#categoriesModalDelete").modal("show");
}

$("#deletecategories").click(function(e){
    $.ajax({
        type: "POST",
        url: "functions/categoriescrud.php",
        data: {category_id:id,deletecategories:"deletecategories"},
        success: function(datas){
            alert("Work Saved Successfully");
            location.reload();
        },
    });
});
</script>
<script src="js/categories.js"></script>