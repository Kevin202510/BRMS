<?php

include('../../APIFUNCTION/DBCRUD.php');
$newDBCRUD = new DBCRUD();

if(isset($_POST['app_pay'])){
    $cw_id = $_POST["cw_id"];
    $app_total_amt = $_POST["app_total_amt"];
    $app_pay = $_POST["app_pay"];
    $checkout_Date = $_POST["checkout_Date"];
    $checkout_rent_date = $_POST["checkout_rent_date"];
    $checkout_rent_return_date = $_POST["checkout_rent_return_date"];
    


    $newDBCRUD->insert('customer_walkin_checkout',['cwc_customer_id'=>$cw_id,'total_checkout_amount'=>$app_total_amt,'checkout_payment'=>$app_pay,'checkout_Date'=>$checkout_Date,'checkout_rent_date'=>$checkout_rent_date,'checkout_rent_return_date'=>$checkout_rent_return_date]);
    
    $newDBCRUD->update('customer_walkin',['checkout_status'=>'1'],"cw_id='$cw_id'");
    $newDBCRUD->update('tracking_orders_customer_walkin_checkout',['tocw_checkout_id'=> $cw_id],"cw_id='$cw_id'");
    

}

?>