<?php
include('APIFUNCTION/DBCRUD.php');
$newDBCRUD = new DBCRUD();

if(isset($_POST['cart_id'])){
    $newDBCRUD->selectleftjoin32($_POST['cart_id']);
    $getUser = $newDBCRUD->sql;
    $res = array();
    while($datass = mysqli_fetch_assoc($getUser)){  
        $res[] = $datass;
    }
    
    echo json_encode($res);

}else if(isset($_POST['c_id'])){
    $checkout_cart_id  = $_POST["c_id"];
    $checkout_user_id = $_POST["user_id"];
    $checkout_amount = $_POST["app_total_amt"];
    $checkout_payments = $_POST["app_pay"];
    


    $newDBCRUD->insert('checkout',['checkout_cart_id'=>$checkout_cart_id,
    'checkout_user_id'=>$checkout_user_id,'checkout_amount'=>$checkout_amount,'checkout_payments'=>$checkout_payments]);
    
    $newDBCRUD->update('cart',['status'=>'1'],"cart_id='$checkout_cart_id'");

    $prods_id = $_POST['prods_id'];

    $newDBCRUD->update('products',['stocks'=>$_POST["prod_stocks"]],"product_id='$prods_id'");

    if($newDBCRUD){
        return 1;
    }else{
        return 0;
    }

}
?>