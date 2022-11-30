<?php

    include('APIFUNCTION/DBCRUD.php');
    $newDBCRUD = new DBCRUD();


    if(isset($_POST['login'])){
        $username = $_POST["username"];
        $password = $_POST["password"];
       
        $hashed_password = md5($passin);
      
        $query = "SELECT * FROM 'users' where username = '$username' AND password = '$password'" ;
        

    }
   
        ?>