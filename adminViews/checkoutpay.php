<?php

include('../APIFUNCTION/DBCRUD.php');
$newDBCRUD = new DBCRUD();

if(isset($_POST['cart_id'])){
    $newDBCRUD->select215($_POST['cart_id']);
    $getUser = $newDBCRUD->sql;
    $res = array();
    while($datass = mysqli_fetch_assoc($getUser)){  
        $res[] = $datass;
    }
    
    echo json_encode($res);

}else if(isset($_POST['c_id'])){
    $checkout_id  = $_POST["checkout_id"];
    $checkout_amount = $_POST["app_total_amt"];
    $prods_id = $_POST["prods_id"];

    $prods_id = $_POST['prods_id'];

    $newDBCRUD->update('checkout',['checkout_payments'=>$checkout_amount],"checkout_id='$checkout_id'");

    if($newDBCRUD){
        return 1;
    }else{
        return 0;
    }

}

?>