<?php include('layouts/head.php');?>
<?php include('layouts/header.php');?>>
<?php include('layouts/searchbar.php');?>    

    <!-- Start Content  -->

    <div class="products-box">
        <div class="container">
        <div class="card">
        <div class="card-header">
            <h2>Rent List</h2><br>
            <button type="button" class="btn btn-success" id="rentbtn">
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
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    include('../APIFUNCTION/DBCRUD.php');
                    $newDBCRUD = new DBCRUD();
                    $newDBCRUD->selectleftjoin("rents","customer_walkin","customer_id","cw_id");
                    $productsLists = $newDBCRUD->sql;
            
                    $index = 1;
                    while ($data = mysqli_fetch_assoc($productsLists)){
                ?>
                    <tr>
                    <th scope="row"><?php echo $index; ?></th>
                    <td><?php echo $data["customer_fname"]; ?></td>
                    <td><?php echo $data["customer_lname"] ; ?></td>
                    <td><?php echo $data["customer_address"]; ?></td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-info" onclick="showform(<?php echo $data['cw_id']; ?>);">Edit</button>
                            <button type="button" class="btn btn-danger" onclick="showformdelete(<?php echo $data['id']; ?>);">Delete</button>
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

<?php include('cartmodal.php');?>
<?php include('layouts/footer.php');?>
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

    // alert(id);
    $.ajax({
        type: "POST",
        url: "functions/rentcrud.php",
        data: {rent_id:id},
        success: function(datas){
            var datas = JSON.parse(datas);
            // console.log(datas);
            $("#id").val(datas.id);
            $("#cw_id").val(datas.cw_id);
            $("#customer_fname").val(datas.customer_fname);
            $("#customer_lname").val(datas.customer_lname);
            $("#customer_address").val(datas.customer_address); 
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
    alert(id);
    $.ajax({
        type: "POST",
        url: "functions/rentcrud.php",
        data: {rent_id:id,deleterent:"deleterent"},
        success: function(datas){
            alert("Work Saved Successfully");
            location.reload();
        },
    });
});
</script>
<script src="js/rents.js"></script>