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
            <nav class="navbar navbar-light bg-light justify-content-between">
                <button type="button" class="btn btn"  style="background-color:#8d7252; color:white;" data-toggle="modal" data-target="#rentModal" id="rentbtn">
                Rent New
                </button>
                <div class="form-inline" style="float:right;">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" id="searchData" aria-label="Search">
                    <button class="btn btn-outline my-2 my-sm-0"style="background-color:#8d7252; color:white;" type="submit">Search</button>
                </div>
            </nav>
        </div>
        <div class="card-body">
        <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Fullname</th>
                    <th scope="col">Address</th>
                    <th scope="col">Product</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody id="table-main">
                <?php
                    include('../APIFUNCTION/DBCRUD.php');
                    $newDBCRUD = new DBCRUD();
                    $newDBCRUD->select210();
                    $productsLists = $newDBCRUD->sql;
            
                    $index = 1;
                    while ($data = mysqli_fetch_assoc($productsLists)){
                ?>
                    <tr>
                    <th scope="row"><?php echo $index; ?></th>
                    <td><?php echo $data["customer_fname"] ." " .$data["customer_lname"]; ?></td>
                    <td><?php echo $data["customer_address"]; ?></td>
                    <td><?php echo $data["name"]; ?></td>
                    <td><?php echo $data["customer_quantity"]; ?></td>
                 
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-success" onclick="showcheckoutform(<?php echo $data['cw_id']; ?>);">CheckOut</button>
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

function showcheckoutform(id){

// alert(id);
$.ajax({
    type: "POST",
    url: "functions/rentcrud.php",
    data: {rent_id:id},
    success: function(datas){
        var datas = JSON.parse(datas);
        console.log(datas);
        $("#cw_ids").val(datas.cw_id);
        $("#customer_fnames").val(datas.customer_fname +" " +datas.customer_lname);
        $("#product_ids").val(datas.name);
        $("#customer_addressss").val(datas.customer_address);
        $("#customer_quantitys").val(datas.customer_quantity); 
        $("#app_price").val(datas.price); 
        $("#app_total_amt").val(parseInt(datas.price)*parseInt(datas.customer_quantity)); 
        // app_total_amt
        // app_payment
    },
});
    $("#rentCheckoutModal").modal("show");
}

$("#app_pay").keyup(function(){
    if(parseInt($("#app_pay").val())>parseInt($("#app_total_amt").val())){
        $("#app_change").val(parseInt($("#app_pay").val())-parseInt($("#app_total_amt").val()));
        $("#saveBTNs").prop("disabled", false);
    } 
});

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
</script>
<script src="js/rents.js"></script>