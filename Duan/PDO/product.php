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
    WHERE PRODUCT.ID_PRO != 1 ORDER BY PRODUCT.ID_PRO";
    $pro = pdo_query($sql);
    return $pro;
}
function count_pro(){
    $sql = "SELECT * FROM PRODUCT WHERE ID_PRO != 1";
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
    WHERE PRODUCT.ID_PRO != 1 ORDER BY PRODUCT.ID_PRO DESC LIMIT $start,$limit "; 
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
function uppdate_pro ($id,$name,$price,$img,$detail,$cate,$brand){
    if($img != ''){
        $sql = "UPDATE PRODUCT SET PRO_NAME ='$name',PRICE='$price',IMG='$img',DETAIL='$detail',ID_CATE='$cate',ID_BRAND='$brand' 
        WHERE ID_PRO = $id";
        pdo_execute($sql);
    }else{
        $sql = "UPDATE PRODUCT SET PRO_NAME ='$name',PRICE='$price',DETAIL='$detail',ID_CATE='$cate',ID_BRAND='$brand'
        WHERE ID_PRO = $id";
        pdo_execute($sql);
    }
}
function delete_pro($id_pro){
    $check_color_pro = "SELECT * FROM COLOR_PRO WHERE ID_PRO = $id_pro";
    $color_pro = pdo_query($check_color_pro);
    $check_comment = "SELECT * FROM COMMENT WHERE ID_PRO =$id_pro";
    $commnent = pdo_query($check_comment);
    $check_cart = "SELECT * FROM OTHER_CART WHERE ID_PRO =$id_pro";
    $cart = pdo_query($check_cart);
    if(is_array($color_pro)){
        $sql = "DELETE FROM COLOR_PRO WHERE ID_PRO = $id_pro";
        pdo_execute($sql);
        $delete = "DELETE FROM PRODUCT WHERE ID_PRO= $id_pro";
        pdo_execute($delete);
    }elseif(is_array($commnent)){
        $sql = "DELETE FROM COMMENT WHERE ID_PRO = $id_pro";
        pdo_execute($sql);
        $delete = "DELETE FROM PRODUCT WHERE ID_PRO= $id_pro";
        pdo_execute($delete);
    }elseif(is_array($cart)){
        $sql = "UPDATE OTHER_CART SET ID_PRO = 1 WHERE ID_PRO = $id_pro";
        pdo_execute($sql);
        $delete = "DELETE FROM PRODUCT WHERE ID_PRO= $id_pro";
        pdo_execute($delete);
    }else {
        $delete = "DELETE FROM PRODUCT WHERE ID_PRO= $id_pro";
        pdo_execute($delete);
    }
}
?>

<!-- color_pro -->

<?php
function add_more_color($id_pro,$id_color,$img,$quantity){
    $sql = "INSERT INTO COLOR_PRO (ID_PRO,ID_COLOR,IMAGE,QUANTITY) VALUES ('$id_pro','$id_color','$img','$quantity')";
    pdo_execute($sql);
}
function load_one_color_pro ($id_clp){
    $sql = "SELECT * FROM COLOR_PRO WHERE ID_CLP = '$id_clp'";
    $color_pro = pdo_query_one($sql);
    return $color_pro;
}
function uppdate_color_pro ($id_clp,$id_color,$img,$quantity){
    if($img != ''){
        $sql = "UPDATE COLOR_PRO SET 
        ID_COLOR='$id_color',IMAGE='$img',QUANTITY='$quantity' WHERE ID_CLP = '$id_clp'";
        pdo_execute($sql);
    }else{
        $sql = "UPDATE COLOR_PRO SET ID_COLOR='$id_color',QUANTITY='$quantity' WHERE ID_CLP = $id_clp";
        pdo_execute($sql);
    }
}
function count_color_pro($id_pro){
    $sql = "SELECT * FROM COLOR_PRO WHERE ID_PRO = $id_pro";
    $pro = pdo_query($sql);
    $i=0;
    foreach ($pro as $key => $value) {
        $i++;
    }
    $number =ceil($i / 10);
    return $number;
}
function delete_color_pro ($id_clp){
    $sql = "DELETE FROM COLOR_PRO WHERE ID_CLP = $id_clp";
    pdo_execute($sql);
}
function load_limit_10_color_pro ($start,$limit,$id_pro){
    $sql = "SELECT * FROM COLOR_PRO 
    JOIN COLOR ON COLOR_PRO.ID_COLOR = COLOR.ID_COLOR
    WHERE ID_PRO = $id_pro ORDER BY ID_PRO 
    DESC LIMIT $start,$limit "; 
    $pro = pdo_query($sql);
    return $pro;
}
?>