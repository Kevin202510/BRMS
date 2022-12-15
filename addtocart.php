
<?php
 session_start(); 
include('APIFUNCTION/DBCRUD.php');
$newDBCRUD = new DBCRUD();

if(isset($_POST['product_id'])){
    $product_id = $_POST["product_id"];
    $cart_user_id = $_POST["cart_user_id"];
    $quantity = $_POST["quantity"];

    $dataid = "cart_user_id=".$cart_user_id." AND cart_product_id=".$product_id;
    $newDBCRUD->select("cart","*",$dataid);
    $getUser = $newDBCRUD->sql;
    $newDBCRUD->select("products","*",$product_id);
    $getStocks = $newDBCRUD->sql;
    
    if ($getUser->num_rows !== 0) {
    while($datass = mysqli_fetch_assoc($getUser)){
    while($datass = mysqli_fetch_assoc($getStocks)){
        if($datass['stocks']>$datass["quantity"]){
            $quantity+=$datass["quantity"];
        }else{
            $quantity=$datass["quantity"];
        }
        $cart_id = $datass['cart_id'];
            $newDBCRUD->update('cart',[
                'quantity'=>$quantity],"cart_id='$cart_id'");
    }
    }
    }else{
        $newDBCRUD->insert('cart',['cart_user_id '=>$cart_user_id ,
            'cart_product_id'=>$product_id,
            'quantity'=>$quantity,
            'status'=>0]);
    }

    return 1;
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

if(isset($_POST['editquantitycart'])){
    $cart_id = $_POST["cart_id"];
    $newDBCRUD->update('cart',[
        'quantity'=>$_POST["quantity"]],"cart_id='$cart_id'");

}
?>