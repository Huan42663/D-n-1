<?php
function add_bill ($firstname,$lastname,$tel,$date,$payment,$id_user,$totals,$voucher_discount){
    $full_name = $firstname ." ". $lastname;
    $sql = "INSERT INTO BILL (NAME_USER,TEL_USER,DATE,TOTAL,PAYMENT,VOUCHER_DISCOUNT,STATUS,ID_USER) 
    VALUES('$full_name','$tel','$date','$totals','$payment','$voucher_discount',1,'$id_user')";
    pdo_execute($sql);
}
function add_other_bill ($pro_name,$color_name,$brand_name,$price,$quantity_cart){
    $check_bill = "SELECT * FROM BILL WHERE ID_BILL = (SELECT MAX(ID_BILL) FROM BILL)";
    $bill = pdo_query_one($check_bill);
    $add_other_bill = "INSERT INTO OTHER_BILL (ID_BILL,NAME_PRO,COLOR_PRODUCT,BRAND_PRO,PRICE_PRO,QUANTITY_PRO)
    VALUES(" . $bill['id_bill'] .",'$pro_name','$color_name','$brand_name','$price','$quantity_cart')";
    pdo_execute($add_other_bill);
}
function load_all_bill(){
    $sql = "SELECT * FROM BILL 
    JOIN PAYMENT ON BILL.PAYMENT = PAYMENT.ID_PAYMENT 
    JOIN STATUS ON BILL.STATUS = STATUS.ID_STATUS 
    ORDER BY BILL.STATUS ASC";
    $bills = pdo_query($sql);
    return $bills;
}
function load_other_bill($id_bill){
    $sql = "SELECT * FROM OTHER_BILL WHERE ID_BILL = $id_bill";
    $other_bills = pdo_query($sql);
    return $other_bills;
}
function change_status_bill ($id_bill){
    $check_bill = "SELECT * FROM BILL WHERE ID_BILL = $id_bill";
    $bill = pdo_query_one($check_bill);
    $bill_status = $bill['status'];
    $change_bill = "UPDATE BILL SET STATUS = ($bill_status + 1) WHERE ID_BILL = $id_bill";
    pdo_execute($change_bill);
}
?>