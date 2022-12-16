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
                  <h2  style=" font-family:poppins; color:#8d7252;">Costumer List</h2>
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
                    <th scope="col">Address</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    include('../APIFUNCTION/DBCRUD.php');
                    $newDBCRUD = new DBCRUD();
                    $newDBCRUD->select("users","*","user_permission_id=2");
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
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">                     
                            <button type="button" class="btn btn-danger" onclick="showformdelete(<?php echo $data['user_id']; ?>);">Ban</button>
                            <button type="button" class="btn btn-success" onclick="showformview(<?php echo $data['user_id']; ?>);"><i class = "icon-eye"></i></button>
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
   <?php include('usermodal.php');?>
<?php include('layouts/footer.php'); ?>

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
function showformview(id){
      $.ajax({
            type: "POST",
            url: "functions/userscrud.php",
            data: {userId:id},
            
            success: function(datas){
                var datas = JSON.parse(datas);
                console.log(datas);
                $("#user_ids").val(datas.user_id);
                $("#fnames").val(datas.fname);
                $("#lnames").val(datas.lname);
                $("#addresss").val(datas.address);
                $("#contact_nums").val(datas.contact_num);
                $("#emails").val(datas.email);
                $("#usernames").val(datas.username);
                $("#user_permission_ids").val(datas.diplay_name);
            },
          });
        
        $("#viewusersModal").modal("show");
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
            //alert("Work Saved Successfully");
            location.reload();
        },
        });
});




</script>
<script src="js/users.js"></script>