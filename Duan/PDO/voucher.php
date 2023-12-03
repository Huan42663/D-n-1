<?php
function add_voucher($code,$start_at,$end_at,$value){
    $sql = "INSERT INTO VOUCHER(CODE,START_AT,END_AT,VALUE) VALUES('$code','$start_at','$end_at',$value)";
    pdo_execute($sql);
}
function load_all_voucher(){
    $sql = "SELECT * FROM VOUCHER ORDER BY END_AT DESC" ;
    $vc = pdo_query($sql);
    return $vc;
}
function check_voucher($code){
    $sql = "SELECT * FROM VOUCHER WHERE CODE='$code'"; ;
    $vc = pdo_query_one($sql);
    return $vc;
}
function load_voucher($date){
    $sql = "SELECT * FROM VOUCHER WHERE START_AT <= '$date' AND END_AT > '$date' ORDER BY VALUE DESC";
    $vc = pdo_query($sql);
    return $vc;
}
function delete_voucher($date){
    $sql = "DELETE FROM VOUCHER WHERE END_AT = '$date'"; 
    pdo_execute($sql);
}
?>