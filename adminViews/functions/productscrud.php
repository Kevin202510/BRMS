<?php

    include('../../APIFUNCTION/DBCRUD.php');
    $newDBCRUD = new DBCRUD();

    if(isset($_POST['addproducts'])){
        $target_dir = "../uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        
        $image = $_FILES["fileToUpload"]["name"];
        $name = $_POST["name"];
        $category_id = $_POST["category_id"];
        $price = $_POST["price"];
        $stocks = $_POST["stocks"];
        $description = $_POST["description"];
        $variation = $_POST["variation"];


        $dataid = "name='$name' AND variation='$variation'";
        $newDBCRUD->select("products","*",$dataid);
        $getUser = $newDBCRUD->sql;
        
        if ($getUser->num_rows !== 0) {
             echo '<script>alert("Apparel Already Exist");</script>';
        }else{
            $newDBCRUD->insert('products',[
            'image'=>$image,
            'name'=>$name,
            'category_id'=>$category_id,
            'price'=>$price,
            'stocks'=>$stocks,
            'description'=>$description,
            'variation'=>$variation]);

            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
            } else {
                header("location: ../productslist.php");
            }
        }
        header("location: ../productslist.php");

    }else if(isset($_POST['updateproducts'])){
        $target_dir = "../uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        $product_id = $_POST['product_id'];
        $image = $_FILES["fileToUpload"]["name"];
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

        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
          } else {
            echo "Sorry, there was an error uploading your file.";
          }

          header("location: ../productslist.php");
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