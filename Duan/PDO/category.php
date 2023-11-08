<!-- category -->

<?php
function add_cate ($cate_name){
    $sql = "INSERT INTO CATEGORY (CATE_NAME) VALUES ('$cate_name')";
    pdo_execute($sql);
}
function load_all_cate(){
    $sql = "SELECT * FROM CATEGORY WHERE ID_CATE != 1";
    $cate = pdo_query($sql);
    return $cate;
}
function load_one_cate ($id_cate){
    $sql = "SELECT * FROM CATEGORY WHERE ID_CATE = '$id_cate'";
    $cate = pdo_query_one($sql);
    return $cate;
}
function update_cate ($id_cate,$cate_name){
    $sql = "UPDATE CATEGORY SET CATE_NAME = '$cate_name' WHERE ID_CATE = '$id_cate'";
    $cate = pdo_execute($sql);
}


function delete_cate ($id_cate){
    $sql = "SELECT * FROM PRODUCT WHERE ID_CATE = $id_cate";
    $pro = pdo_query($sql);
    if(is_array($pro)){
        $sql = "UPDATE PRODUCT SET ID_CATE = 1 WHERE ID_CATE = $id_cate";
        pdo_execute($sql);
        $delete = "DELETE FROM CATEGORY WHERE ID_CATE= $id_cate";
        pdo_execute($delete);
    }
     
}
?>

<!-- color -->

<?php
function add_color ($color_name){
    $sql = "INSERT INTO COLOR (color_name) values('$color_name')";
    $color = pdo_execute($sql);
}

function load_all_color (){
    $sql = "SELECT * FROM COLOR WHERE ID_COLOR != 1";
    $color = pdo_query($sql);
    return $color;
}
function delete_color ($id_color){
    $sql = "SELECT * FROM COLOR_PRO WHERE ID_COLOR = $id_color";
    $pro = pdo_query($sql);
    if(is_array($pro)){
        $sql = "UPDATE COLOR_PRO SET ID_COLOR = 1 WHERE ID_COLOR = $id_color";
        pdo_execute($sql);
        $delete = "DELETE FROM COLOR WHERE ID_COLOR= $id_color";
        pdo_execute($delete);
    }
}
function load_one_color ($id_color){
    $sql = "SELECT * FROM COLOR WHERE ID_COLOR = '$id_color'";
    $color = pdo_query_one($sql);
    return $color;
}
function update_color ($color_name,$id_color){
    $sql = "UPDATE COLOR SET COLOR_NAME = '$color_name' WHERE ID_COLOR = '$id_color'";
    $color = pdo_execute($sql);
}

?>

<!-- brand -->

<?php
function add_brand ($brand_name){
    $sql = "INSERT INTO BRAND (BRAND_NAME) VALUES ('$brand_name')";
    pdo_execute($sql);
}
function load_all_brand(){
    $sql = "SELECT * FROM BRAND WHERE ID_BRAND != 1";
    $brand = pdo_query($sql);
    return $brand;
}
function load_one_brand ($id_brand){
    $sql = "SELECT * FROM BRAND WHERE ID_BRAND = '$id_brand'";
    $brand = pdo_query_one($sql);
    return $brand;
}
function update_brand ($id_brand,$brand_name){
    $sql = "UPDATE BRAND SET BRAND_NAME = '$brand_name' WHERE ID_BRAND = '$id_brand'";
    $brand = pdo_execute($sql);
}


function delete_brand ($id_brand){
    $sql = "SELECT * FROM PRODUCT WHERE ID_BRAND = $id_brand";
    $pro = pdo_query($sql);
    if(is_array($pro)){
        $sql = "UPDATE PRODUCT SET ID_BRAND = 1 WHERE ID_BRAND = $id_brand";
        pdo_execute($sql);
        $delete = "DELETE FROM BRAND WHERE ID_BRAND= $id_brand";
        pdo_execute($delete);
    }
     
}
?>