<?php

    include('../../APIFUNCTION/DBCRUD.php');
    $newDBCRUD = new DBCRUD();


    if(isset($_POST['rentmodal'])){
        $cw_id = $_POST['cw_id'];
        $customer_fname = $_POST["customer_fname"];
        $customer_lname = $_POST["customer_lname"];
        $customer_address = $_POST["customer_address"];


        $newDBCRUD->insert('customer_walkin',['cw_id'=>$cw_id,'customer_fname'=>$customer_fname,
        'customer_lname'=>$customer_lname,'customer_address'=>$customer_address]);

        $newDBCRUD->insert('rents',['customer_id'=>$cw_id]);
        

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

        $newDBCRUD->update('customer_walkin',[
        'customer_fname'=>$customer_fname,
        'customer_lname'=>$customer_lname,
        'customer_address'=>$customer_address],"cw_id='$cw_id'");

        if($newDBCRUD){
            return 1;
        }else{
            return 0;
        }
    }else if(isset($_POST['deleterent'])){
        
        $id = $_POST['rent_id'];

        $newDBCRUD->delete('rents',"id ='$id'");

        if($newDBCRUD){
            return 1;
        }else{
            return 0;
        }
    }

    if(isset($_POST['rent_id'])){
        $dataid = "cw_id=" . $_POST['rent_id'];
        $newDBCRUD->selectleftjoin("rents","customer_walkin","cw_id","customer_id",$dataid);
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