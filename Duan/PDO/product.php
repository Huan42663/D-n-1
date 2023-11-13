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
    JOIN COLOR_PRO ON PRODUCT.ID_PRO = COLOR_PRO.ID_PRO 
    JOIN COLOR ON COLOR_PRO.ID_COLOR = COLOR.ID_COLOR
    ORDER BY PRODUCT.ID_PRO";
    $pro = pdo_query($sql);
    return $pro;
}
function count_pro(){
    $sql = "SELECT * FROM PRODUCT";
    $pro = pdo_query($sql);
    $i=0;
    foreach ($pro as $key => $value) {
        $i++;
    }
    $number =ceil($i / 10);
    return $number;
}
function load_limit_10_pro ($start,$limit){
    $sql = "SELECT * FROM PRODUCT 
    JOIN CATEGORY ON PRODUCT.ID_CATE = CATEGORY.ID_CATE 
    JOIN BRAND ON PRODUCT.ID_BRAND = BRAND.ID_BRAND 
    JOIN COLOR_PRO ON PRODUCT.ID_PRO = COLOR_PRO.ID_PRO 
    JOIN COLOR ON COLOR_PRO.ID_COLOR = COLOR.ID_COLOR
    ORDER BY PRODUCT.ID_PRO DESC LIMIT $start,$limit "; 
    $pro = pdo_query($sql);
    return $pro;
}
function load_one_pro ($id){
    $sql = "SELECT * FROM PRODUCT 
    JOIN CATEGORY ON PRODUCT.ID_CATE = CATEGORY.ID_CATE 
    JOIN BRAND ON PRODUCT.ID_BRAND = BRAND.ID_BRAND 
    JOIN COLOR_PRO ON PRODUCT.ID_PRO = COLOR_PRO.ID_PRO
    WHERE PRODUCT.ID_PRO = $id";
    $pro = pdo_query_one($sql);
    return $pro;
}
function uppdate_pro ($id){
    $sql = "UPDATE PRODUCT SET PRO_NAME ='',PRICE='',IMG='',DETAIL='',ID_CATE='',ID_BRAND=''";
    pdo_execute($sql);
    $other_sql = "UPDATE COLOR_PRO SET ID_COLOR='',IMAGE='',QUANTITY=''";
}
?>