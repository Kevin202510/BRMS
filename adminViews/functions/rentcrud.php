<?php

    include('../../APIFUNCTION/DBCRUD.php');
    $newDBCRUD = new DBCRUD();


    if(isset($_POST['rentmodal'])){
        $customer_fname = $_POST["customer_fname"];
        $customer_lname = $_POST["customer_lname"];
        $customer_address = $_POST["customer_address"];
        $customer_product_id = $_POST["customer_product_id"];
        $customer_quantity = $_POST["customer_quantity"];
        $cw_id = $_POST["cw_id"];
        


        $newDBCRUD->insert('customer_walkin',['customer_fname'=>$customer_fname,
        'customer_lname'=>$customer_lname,'customer_address'=>$customer_address,'customer_product_id'=>$customer_product_id,'customer_quantity'=>$customer_quantity]);
        

        if($newDBCRUD){
            return 1;
        }else{
            return 0;
        }

    }else if(isset($_POST['editrentmodal'])){
        
        $cw_id = $_POST['cw_id'];
        $customer_fname = $_POST["customer_fname"];
        $customer_lname = $_POST["customer_lname"];
        $customer_address = $_POST["customer_address"];
        $customer_product_id = $_POST["customer_product_id"];
        $customer_quantity = $_POST["customer_quantity"];

        $newDBCRUD->update('customer_walkin',[
        'customer_fname'=>$customer_fname,
        'customer_lname'=>$customer_lname,
        'customer_address'=>$customer_address,
        'customer_product_id'=>$customer_product_id,
        'customer_quantity'=>$customer_quantity],"cw_id='$cw_id'");

        if($newDBCRUD){
            return 1;
        }else{
            return 0;
        }
    }else if(isset($_POST['deleteproducts'])){
        
        $id = $_POST['rent_id'];

        $newDBCRUD->delete('customer_walkin',"cw_id ='$id'");

        if($newDBCRUD){
            return 1;
        }else{
            return 0;
        }
    }

    if(isset($_POST['rent_id'])){
        $id =$_POST['rent_id'];
        $newDBCRUD->select220($id);
        $getUser = $newDBCRUD->sql;
        $res = array();
        while($datass = mysqli_fetch_assoc($getUser)){
            $res = $datass;
        }
    echo json_encode($res);

    }

    if(isset($_POST['cw_id'])){
        $newDBCRUD->selectsss();
        $getUser = $newDBCRUD->sql;
        $res = array();
        while($datass = mysqli_fetch_assoc($getUser)){
            $res = $datass;
        }
    echo json_encode($res);

    }

?>