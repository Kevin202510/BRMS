<?php
include('APIFUNCTION/DBCRUD.php');
$newDBCRUD = new DBCRUD();

if(isset($_POST['PRODUCT_ID'])){
    $dataid = "products.category_id=" . $_POST['PRODUCT_ID'];
    $newDBCRUD->selectleftjoin("products","categories","category_id","category_id",$dataid);
    $getUser = $newDBCRUD->sql;
    $res = array();
    while($datass = mysqli_fetch_assoc($getUser)){
        $res = $datass;
    }
    
    echo json_encode($res);

}
?>