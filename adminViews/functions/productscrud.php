<?php

    include('../../APIFUNCTION/DBCRUD.php');
    $newDBCRUD = new DBCRUD();


    if(isset($_POST['addproducts'])){
        $image = "sample.jpeg";
        $name = $_POST["name"];
        $category_id = $_POST["category_id"];
        $price = $_POST["price"];
        $stocks = $_POST["stocks"];
        $description = $_POST["description"];
        $variation = $_POST["variation"];


        $newDBCRUD->insert('products',['product_id'=>$product_id,
        'image'=>$image,
        'name'=>$name,
        'category_id'=>$category_id,
        'price'=>$price,
        'stocks'=>$stocks,
        'description'=>$description,
        'variation'=>$variation]);
        

        if($newDBCRUD){
            return 1;
        }else{
            return 0;
        }

    }else if(isset($_POST['updateproducts'])){
        
        $product_id = $_POST['product_id'];
        $image = "sample.jpeg";
        $name = $_POST["name"];
        $category_id = $_POST["category_id"];
        $price = $_POST["price"];
        $stocks = $_POST["stocks"];
        $description = $_POST["description"];
        $variation = $_POST["variation"];

        $newDBCRUD->update('products',[
        'image'=>$image,
        'name'=>$name,
        'category_id'=>$category_id,
        'price'=>$price,
        'stocks'=>$stocks,
        'description'=>$description,
        'variation'=>$variation],"product_id='$product_id'");

        if($newDBCRUD){
            return 1;
        }else{
            return 0;
        }
    }else if(isset($_POST['deleteproducts'])){
        
        $id = $_POST['product_idsss'];

        $newDBCRUD->delete('products',"product_id='$id'");

        if($newDBCRUD){
            return 1;
        }else{
            return 0;
        }
    }

    if(isset($_POST['product_id'])){
        $dataid = "product_id=" . $_POST['product_id'];
        $newDBCRUD->select("products","*",$dataid);
        $getUser = $newDBCRUD->sql;
        $res = array();
        while($datass = mysqli_fetch_assoc($getUser)){
            $res = $datass;
        }
    echo json_encode($res);

    }


?>