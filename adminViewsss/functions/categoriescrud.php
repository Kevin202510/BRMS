<?php

    include('../../APIFUNCTION/DBCRUD.php');
    $newDBCRUD = new DBCRUD();


    if(isset($_POST['addcategories'])){
        $cat_name = $_POST["cat_name"];

        $newDBCRUD->insert('categories',[
        'cat_name'=>$cat_name]);

        if($newDBCRUD){
            return 1;
        }else{
            return 0;
        }

    }else if(isset($_POST['updatecategories'])){
        
        $category_id = $_POST['category_id'];
        $cat_name = $_POST["cat_name"];

        $newDBCRUD->update('categories',['cat_name'=>$cat_name],"category_id='$category_id'");

        if($newDBCRUD){
            return 1;
        }else{
            return 0;
        }
    }else if(isset($_POST['deletecategories'])){
        
        $id = $_POST['category_id'];

        $newDBCRUD->delete('categories',"category_id='$id'");

        if($newDBCRUD){
            return 1;
        }else{
            return 0;
        }
    }

    if(isset($_POST['category_id'])){
        $dataid = "category_id=" . $_POST['category_id'];
        $newDBCRUD->select("categories","*",$dataid);
        $getUser = $newDBCRUD->sql;
        $res = array();
        while($datass = mysqli_fetch_assoc($getUser)){
            $res = $datass;
        }
    echo json_encode($res);

    }


?>