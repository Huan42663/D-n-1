<?php
function add_product ($pro_name,$price,$img,$detail,$color,$brand,$cate,$add_at,$quantity){
    $sql = "INSERT INTO PRODUCT (pro_name,price,img,detail,id_brand,id_cate,add_at) 
    VALUES('$pro_name','$price','$img','$detail','$brand','$cate','$add_at')";
    pdo_execute($sql);
    $sql_get_id = "SELECT * FROM PRODUCT WHERE ID_PRO = (SELECT MAX(ID_PRO) FROM PRODUCT)";
    $id_pro = pdo_query_one($sql_get_id);
    extract($id_pro);
    $other_sql = "INSERT INTO COLOR_PRO(ID_COLOR,ID_PRO,IMAGE,QUANTITY) VALUES ('$color','$id_pro','$img','$quantity')";
    pdo_execute($other_sql);
}
function load_all_pro (){
    $sql = "SELECT * FROM PRODUCT 
    JOIN CATEGORY ON PRODUCT.ID_CATE = CATEGORY.ID_CATE 
    JOIN BRAND ON PRODUCT.ID_BRAND = BRAND.ID_BRAND 
    JOIN COLOR_PRO ON PRODUCT.ID_PRO = COLOR_PRO.ID_PRO";
    $pro = pdo_query($sql);
    return $pro;
}

function load_one_pro ($id){
    $sql = "SELECT * FROM PRODUCT WHERE ID_PRO = $id";
    $pro = pdo_query($sql);
    return $pro;
}

function load_all_pro_top10 (){
    $sql = "SELECT * FROM PRODUCT ORDER BY VIEW DESC LIMIT 0,10";
    $pro = pdo_query($sql);
    return $pro;
}


?>