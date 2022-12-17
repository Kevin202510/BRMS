<?php

    include('APIFUNCTION/DBCRUD.php');
    $newDBCRUD = new DBCRUD();

    if(isset($_POST['cart_id2'])){
        $quantity  = $_POST["quantity"];
        $cart_id2 = $_POST["cart_id2"];
        
        $newDBCRUD->update('cart',['quantity'=>$quantity],"cart_id='$cart_id2'");
    
        if($newDBCRUD){
            return 1;
        }else{
            return 0;
        }
    
    }else if(isset($_POST['cart_id3'])){
        $cart_id2 = $_POST["cart_id3"];
        
        $newDBCRUD->delete('cart',"cart_id='$cart_id2'");
    
        if($newDBCRUD){
            return 1;
        }else{
            return 0;
        }
    
    }

?>