<?php include('layouts/head.php');?>
<?php include('layouts/header.php');?>
<?php include('layouts/searchbar.php');?>    

    <div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h2>User List</h2><br>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#usersModal">
            Add New Data
            </button>
        </div>
        <div class="card-body">
        <table class="table">
                <thead class="thead-light">
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Fullname</th>
                    <th scope="col">Address</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Email</th>
                    <th scope="col">Username</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    include('../APIFUNCTION/DBCRUD.php');
                    $newDBCRUD = new DBCRUD();
                    $newDBCRUD->select("users","*","user_permission_id!=2");
                    $userLists = $newDBCRUD->sql;
            
                    $index = 1;
                    while ($data = mysqli_fetch_assoc($userLists)){
                ?>
                    <tr>
                    <th scope="row"><?php echo $index; ?></th>
                    <td><?php echo $data["fname"] ." ". $data["lname"]; ?></td>
                    <td><?php echo $data["address"]; ?></td>
                    <td><?php echo $data["contact_num"]; ?></td>
                    <td><?php echo $data["email"]; ?></td>
                    <td><?php echo $data["username"]; ?></td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-info" onclick="showform(<?php echo $data['user_id']; ?>);">Edit</button>
                            <button type="button" class="btn btn-danger" onclick="showformdelete(<?php echo $data['user_id']; ?>);">Delete</button>
                        </div>
                    </td>
                    </tr>
                    <?php $index++; }?>
                </tbody>
            </table>
        </div>
    </div>

<?php include('usermodal.php');?>
<?php include('layouts/footer.php');?>
<script>
    function showform(id){

        $.ajax({
            type: "POST",
            url: "functions/userscrud.php",
            data: {userId:id},
            success: function(datas){
                var datas = JSON.parse(datas);
                $("#user_id").val(datas.user_id);
                $("#fname").val(datas.fname);
                $("#lname").val(datas.lname);
                $("#address").val(datas.address);
                $("#contact_num").val(datas.contact_num);
                $("#email").val(datas.email);
                $("#username").val(datas.username);
                $('#user_permission_id option[value='+datas.user_permission_id+']').attr("selected", "selected");
            },
          });
        $("#adduser").attr('name',"updateuser");
        $("#saveBTN").html("Update User");
        $("#usersModal").modal("show");
}
var id;

function showformdelete(ids){
    id=ids;
    $("#usersModalDelete").modal("show");
}

$("#deleteuser").click(function(e){
    $.ajax({
        type: "POST",
        url: "functions/userscrud.php",
        data: {user_id:id,deleteuser:"deleteuser"},
        success: function(datas){
            alert("Work Saved Successfully");
            location.reload();
        },
        });
});
</script>
<script src="js/users.js"></script>