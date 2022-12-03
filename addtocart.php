
<?php
 session_start(); 
include('APIFUNCTION/DBCRUD.php');
$newDBCRUD = new DBCRUD();

if(isset($_POST['addtocartthis'])){
    $product_id = $_POST["product_id"];
    $cart_user_id = $_POST["cart_user_id"];
    $quantity = $_POST["quantity"];

    $newDBCRUD->insert('cart',['cart_user_id '=>$cart_user_id ,
    'cart_product_id'=>$product_id,
    'quantity'=>$quantity,
    'status'=>0]);
    header("location:shop.php");

}
if(isset($_POST['PRODUCT_ID'])){
    $dataid = "product_id=" . $_POST['PRODUCT_ID'];
    $newDBCRUD->select("products","*",$dataid);
    $getUser = $newDBCRUD->sql;
    $res = array();
    while($datass = mysqli_fetch_assoc($getUser)){
        $res = $datass;
    }
echo json_encode($res);

}
?>