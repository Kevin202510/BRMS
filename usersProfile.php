<?php
include('APIFUNCTION/DBCRUD.php');
$newDBCRUD = new DBCRUD();

if(isset($_POST['userId'])){
    $dataid = "user_id=" . $_POST['userId'];
    $newDBCRUD->selectleftjoin("users","permissions","permission_id","user_permission_id",$dataid);
    $getUser = $newDBCRUD->sql;
    $res = array();
    while($datass = mysqli_fetch_assoc($getUser)){
        $res = $datass;
    }
echo json_encode($res);

}


?>