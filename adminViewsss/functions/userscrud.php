<?php

    include('../../APIFUNCTION/DBCRUD.php');
    $newDBCRUD = new DBCRUD();


    if(isset($_POST['adduser'])){
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $address = $_POST["address"];
        $contact_num = $_POST["contact_num"];
        $email = $_POST["email"];
        $username = $_POST["username"];
        $password = "password";
        $user_permission_id = $_POST["user_permission_id"];

        $newDBCRUD->insert('users',['user_permission_id'=>$user_permission_id,
        'fname'=>$fname,
        'lname'=>$lname,
        'address'=>$address,
        'contact_num'=>$contact_num,
        'email'=>$email,
        'username'=>$username,'password'=>$password]);

        if($newDBCRUD){
            return 1;
        }else{
            return 0;
        }

    }else if(isset($_POST['updateuser'])){
        
        $user_id = $_POST['user_id'];
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $address = $_POST["address"];
        $contact_num = $_POST["contact_num"];
        $email = $_POST["email"];
        $username = $_POST["username"];
        $password = "password";
        $user_permission_id = $_POST["user_permission_id"];

        $newDBCRUD->update('users',['user_permission_id'=>$user_permission_id,
        'fname'=>$fname,
        'lname'=>$lname,
        'address'=>$address,
        'contact_num'=>$contact_num,
        'email'=>$email,
        'username'=>$username],"user_id='$user_id'");

        if($newDBCRUD){
            return 1;
        }else{
            return 0;
        }
    }else if(isset($_POST['deleteuser'])){
        
        $id = $_POST['user_id'];

        $newDBCRUD->delete('users',"user_id='$id'");

        if($newDBCRUD){
            return 1;
        }else{
            return 0;
        }
    }

    if(isset($_POST['userId'])){
        $dataid = "user_id=" . $_POST['userId'];
        $newDBCRUD->select("users","*",$dataid);
        $getUser = $newDBCRUD->sql;
        $res = array();
        while($datass = mysqli_fetch_assoc($getUser)){
            $res = $datass;
        }
    echo json_encode($res);

    }


?>