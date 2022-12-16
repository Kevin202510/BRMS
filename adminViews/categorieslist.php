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
               <h2 style=" font-family:poppins; color:#8d7252;">Categories List</h2><br>
               </div>
            </div>

            <div class="card">
        <div class="card-header">
            
            <button type="button" class="btn btn"  style="background-color:#8d7252; color:white;" data-toggle="modal" data-target="#categoriesModal">
            Add Categories
            </button>
        </div>
        <div class="card-body">
        <table class="table  table-bordered">
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
                            <button type="button" class="btn btn" style="background-color:#8d7252; color:white;"onclick="showform(<?php echo $data['category_id']; ?>);"><i class = "icon-pencil"></i></i></button>
                            <button type="button" class="btn btn"style="background-color:#8d7252; color:white;" onclick="showformdelete(<?php echo $data['category_id']; ?>);"><i class = "icon-trash"></i></button>
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
   <?php include('categoriesmodal.php');?>
<?php include('layouts/footer.php'); ?>
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
            //alert("Work Saved Successfully");
            location.reload();
        },
    });
});
</script>
<script src="js/categories.js"></script>