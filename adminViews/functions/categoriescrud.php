<?php

    include('../../APIFUNCTION/DBCRUD.php');
    $newDBCRUD = new DBCRUD();


    if(isset($_POST['addcategories'])){
        $name = $_POST["name"];

        $newDBCRUD->insert('categories',[
        'name'=>$name]);

        if($newDBCRUD){
            return 1;
        }else{
            return 0;
        }

    }else if(isset($_POST['updatecategories'])){
        
        $category_id = $_POST['category_id'];
        $name = $_POST["name"];

        $newDBCRUD->update('categories',['name'=>$name],"category_id='$category_id'");

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