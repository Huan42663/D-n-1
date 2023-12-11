<?php
function add_product($pro_name, $price, $discount, $img, $detail, $color, $brand, $cate, $add_at, $quantity)
{
    $sql = "INSERT INTO PRODUCT (pro_name,price,discount,img,detail,id_brand,id_cate,add_at) 
    VALUES('$pro_name','$price','$discount','$img','$detail','$brand','$cate','$add_at')";
    pdo_execute($sql);
    $sql_get_id = "SELECT * FROM PRODUCT WHERE ID_PRO = (SELECT MAX(ID_PRO) FROM PRODUCT)";
    $id_pro = pdo_query_one($sql_get_id);
    extract($id_pro);
    $other_sql = "INSERT INTO COLOR_PRO(ID_COLOR,ID_PRO,IMAGE,QUANTITY) VALUES ('$color','$id_pro','$img','$quantity')";
    pdo_execute($other_sql);
}
function update_pro($id, $name, $price, $discount, $img, $detail, $cate, $brand)
{
    if ($img != '') {
        $sql = "UPDATE PRODUCT SET PRO_NAME ='$name',PRICE='$price',DISCOUNT='$discount',IMG='$img',DETAIL='$detail',ID_CATE='$cate',ID_BRAND='$brand' 
        WHERE ID_PRO = $id";
        pdo_execute($sql);
    } else {
        $sql = "UPDATE PRODUCT SET PRO_NAME ='$name',PRICE='$price',DISCOUNT='$discount',DETAIL='$detail',ID_CATE='$cate',ID_BRAND='$brand'
        WHERE ID_PRO = $id";
        pdo_execute($sql);
    }
}
function delete_pro($id_pro){
        // $check_color_pro = "SELECT * FROM COLOR_PRO WHERE ID_PRO = $id_pro";
        // $color_pro = pdo_query($check_color_pro);
        // foreach ($color_pro as $clp) {
        //     extract($clp);
        //     $delete_other_cart = "DELETE OTHER_CART WHERE ID_CLP = $id_clp";
        //     pdo_execute($delete_other_cart);
        // }
        $delete_color_pro = "DELETE FROM COLOR_PRO WHERE ID_PRO = $id_pro";
        pdo_execute($delete_color_pro);
        $delet_comment = "DELETE FROM COMMENT WHERE ID_PRO = $id_pro";
        pdo_execute($delet_comment);
        $delete_pro = "DELETE FROM PRODUCT WHERE ID_PRO= $id_pro";
        pdo_execute($delete_pro);
}
function load_all_pro()
{
    $sql = "SELECT * FROM PRODUCT 
    JOIN CATEGORY ON PRODUCT.ID_CATE = CATEGORY.ID_CATE 
    JOIN BRAND ON PRODUCT.ID_BRAND = BRAND.ID_BRAND 
    JOIN COLOR_PRO ON PRODUCT.ID_PRO = COLOR_PRO.ID_PRO 
    JOIN COLOR ON COLOR_PRO.ID_COLOR = COLOR.ID_COLOR
    WHERE PRODUCT.ID_PRO != 1 ORDER BY PRODUCT.ID_PRO";
    $pro = pdo_query($sql);
    return $pro;
}
function count_pro($pro_per_page, $kyw, $id_cate)
{
    $sql = "SELECT * FROM PRODUCT WHERE ID_PRO != 1";
    if ($kyw != "") {
        $sql .= " AND PRO_NAME LIKE '%$kyw%' ";
    }
    if ($id_cate > 0) {
        $sql .= " AND ID_CATE = $id_cate";
    }
    $pro = pdo_query($sql);
    $i = 0;
    foreach ($pro as $key => $value) {
        $i++;
    }
    $number = ceil($i / $pro_per_page);
    return $number;
}
function load_limit_pro($start, $limit, $kyw, $id_cate)
{
    $sql = "SELECT * FROM PRODUCT 
    JOIN CATEGORY ON PRODUCT.ID_CATE = CATEGORY.ID_CATE 
    JOIN BRAND ON PRODUCT.ID_BRAND = BRAND.ID_BRAND 
    -- JOIN COLOR_PRO ON PRODUCT.ID_PRO = COLOR_PRO.ID_PRO
    WHERE 1";
    if ($kyw != "") {
        $sql .= " AND PRO_NAME LIKE '%$kyw%' ";
    }
    if ($id_cate > 0) {
        $sql .= " AND ID_CATE = $id_cate";
    }
    // if($cate_name != ""){
    //     $sql .=" AND CATE_NAME LIKE '%$cate_name%' ";
    // }
    $sql .= " AND PRODUCT.ID_PRO != 1 ORDER BY PRODUCT.ID_PRO DESC LIMIT $start,$limit ";
    $pro = pdo_query($sql);
    return $pro;
}
function count_pro_sale($pro_per_page, $kyw, $id_cate)
{
    $sql = "SELECT * FROM PRODUCT WHERE ID_PRO != 1 AND DISCOUNT > 0";
    if ($kyw != "") {
        $sql .= " AND PRO_NAME LIKE '%$kyw%' ";
    }
    if ($id_cate > 0) {
        $sql .= " AND ID_CATE = $id_cate";
    }
    $pro = pdo_query($sql);
    $i = 0;
    foreach ($pro as $key => $value) {
        $i++;
    }
    $number = ceil($i / $pro_per_page);
    return $number;
}
function load_limit_pro_sale($start, $limit, $kyw, $id_cate)
{
    $sql = "SELECT * FROM PRODUCT 
    JOIN CATEGORY ON PRODUCT.ID_CATE = CATEGORY.ID_CATE 
    JOIN BRAND ON PRODUCT.ID_BRAND = BRAND.ID_BRAND 
    -- JOIN COLOR_PRO ON PRODUCT.ID_PRO = COLOR_PRO.ID_PRO
    WHERE 1";
    if ($kyw != "") {
        $sql .= " AND PRO_NAME LIKE '%$kyw%' ";
    }
    if ($id_cate > 0) {
        $sql .= " AND ID_CATE = $id_cate";
    }
    // if($cate_name != ""){
    //     $sql .=" AND CATE_NAME LIKE '%$cate_name%' ";
    // }
    $sql .= " AND PRODUCT.ID_PRO != 1 AND DISCOUNT > 0 ORDER BY PRODUCT.ID_PRO DESC LIMIT $start,$limit ";
    $pro = pdo_query($sql);
    return $pro;
}
function load_top_5_pro()
{
    $sql = "SELECT * FROM PRODUCT 
    JOIN CATEGORY ON PRODUCT.ID_CATE = CATEGORY.ID_CATE
    WHERE PRODUCT.ID_PRO != 1
    ORDER BY VIEW DESC LIMIT 0,5";
    $pro = pdo_query($sql);
    return $pro;
}
function load_one_pro($id)
{
    $sql = " SELECT * FROM PRODUCT 
    JOIN COLOR_PRO ON PRODUCT.ID_PRO = COLOR_PRO.ID_PRO
    JOIN COLOR ON COLOR_PRO.ID_COLOR = COLOR.ID_COLOR
    WHERE PRODUCT.ID_PRO = $id";
    $pro = pdo_query_one($sql);
    return $pro;
}
function count_pro_filter($kyw, $brand, $cate)
{
    $sql = "SELECT * FROM PRODUCT
    -- JOIN COLOR_PRO ON PRODUCT.ID_PRO = COLOR_PRO.ID_PRO
    WHERE PRODUCT.ID_PRO != 1";
    if ($kyw != "") {
        $sql .= " AND PRO_NAME LIKE '%$kyw%' ";
    }
    if ($brand > 0) {
        $sql .= " AND ID_BRAND = $brand";
    }
    if ($cate > 0) {
        $sql .= " AND ID_CATE = $cate";
    }
    // if($color > 0){
    //     $sql .= " AND ID_COLOR = $color";
    // }
    $pro = pdo_query($sql);
    $i = 0;
    foreach ($pro as $key => $value) {
        $i++;
    }
    // $number =ceil($i / $pro_per_page);
    return $i;
}
function load_limit_pro_filter($start, $limit, $kyw, $brand, $cate, $load_with, $load_type)
{
    $sql = "SELECT * FROM PRODUCT 
    JOIN CATEGORY ON PRODUCT.ID_CATE = CATEGORY.ID_CATE 
    JOIN BRAND ON PRODUCT.ID_BRAND = BRAND.ID_BRAND 
    -- JOIN COLOR_PRO ON PRODUCT.ID_PRO = COLOR_PRO.ID_PRO 
    -- JOIN COLOR ON COLOR_PRO.ID_COLOR = COLOR.ID_COLOR
    WHERE 1";
    if ($kyw != "") {
        $sql .= " AND PRO_NAME LIKE '%$kyw%' ";
    }
    if ($brand > 0) {
        $sql .= " AND PRODUCT.ID_BRAND = $brand";
    }
    if ($cate > 0) {
        $sql .= " AND PRODUCT.ID_CATE = $cate";
    }
    // if($color > 0){
    //     $sql .= " AND COLOR_PRO.ID_COLOR = $color";
    // }
    // if($cate_name != ""){
    //     $sql .=" AND CATE_NAME LIKE '%$cate_name%' ";
    // }
    $sql .= " AND PRODUCT.ID_PRO != 1 ORDER BY PRODUCT.$load_with $load_type LIMIT $start,$limit ";
    $pro = pdo_query($sql);
    return $pro;
}
function other_pro($id)
{
    $product = "SELECT * FROM PRODUCT WHERE ID_PRO = $id";
    $pro = pdo_query_one($product);
    extract($pro);
    $check_pro = "SELECT * FROM PRODUCT WHERE ID_CATE = $id_cate AND ID_PRO != $id ";
    $number = pdo_query($check_pro);
    $i = 0;
    foreach ($number as $row) {
        $i++;
    }
    if ($i >= 4) {
        $start = random_int(0, $i - 4);
    } else {
        $start = 0;
    }
    $sql = "SELECT * FROM PRODUCT WHERE ID_PRO != $id AND ID_PRO != 1 AND ID_CATE = $id_cate LIMIT $start,4";
    $other_pro = pdo_query($sql);
    return $other_pro;
}
function check_pro($pro_name)
{
    $sql = "SELECT * FROM PRODUCT WHERE PRO_NAME = '$pro_name'";
    $pro = pdo_query_one($sql);
    return $pro;
}
function change_view ($id_pro){
    $sql = "UPDATE PRODUCT SET VIEW = VIEW + 1 WHERE ID_PRO = $id_pro";
    pdo_execute($sql);
}
?>

<!-- color_pro -->

<?php
function add_more_color($id_pro, $id_color, $img, $quantity)
{
    $sql = "INSERT INTO COLOR_PRO (ID_PRO,ID_COLOR,IMAGE,QUANTITY) VALUES ('$id_pro','$id_color','$img','$quantity')";
    pdo_execute($sql);
}
function load_one_color_pro($id_clp)
{
    $sql = "SELECT * FROM COLOR_PRO WHERE ID_CLP = '$id_clp'";
    $color_pro = pdo_query_one($sql);
    return $color_pro;
}
function update_color_pro($id_clp, $id_color, $img, $quantity)
{
    if ($img != '') {
        $sql = "UPDATE COLOR_PRO SET 
        ID_COLOR='$id_color',IMAGE='$img',QUANTITY='$quantity' WHERE ID_CLP = '$id_clp'";
    } else {
        $sql = "UPDATE COLOR_PRO SET ID_COLOR='$id_color',QUANTITY='$quantity' WHERE ID_CLP = $id_clp";
    }
    pdo_execute($sql);
}
function count_color_pro($id_pro)
{
    $sql = "SELECT * FROM COLOR_PRO WHERE ID_PRO = $id_pro";
    $pro = pdo_query($sql);
    $i = 0;
    foreach ($pro as $key => $value) {
        $i++;
    }
    $number = ceil($i / 10);
    return $number;
}
function delete_color_pro($id_clp)
{
    $sql = "DELETE FROM COLOR_PRO WHERE ID_CLP = $id_clp";
    pdo_execute($sql);
}
function load_limit_10_color_pro($start, $limit, $id_pro)
{
    $sql = "SELECT * FROM COLOR_PRO 
    JOIN COLOR ON COLOR_PRO.ID_COLOR = COLOR.ID_COLOR
    WHERE ID_PRO = $id_pro ORDER BY ID_PRO 
    DESC LIMIT $start,$limit ";
    $pro = pdo_query($sql);
    return $pro;
}
function load_color_for_pro($id_pro)
{
    $sql = "SELECT * FROM COLOR_PRO 
    JOIN COLOR ON COLOR_PRO.ID_COLOR = COLOR.ID_COLOR
    WHERE ID_PRO = $id_pro";
    $list_color = pdo_query($sql);
    return $list_color;
}
function load_pro_for_color($id_pro, $color)
{
    $sql = "SELECT * FROM COLOR_PRO 
    JOIN COLOR ON COLOR_PRO.ID_COLOR = COLOR.ID_COLOR
    WHERE COLOR_PRO.ID_COLOR = $color AND ID_PRO = $id_pro";
    $color_pro = pdo_query_one($sql);
    return $color_pro;
}
function change_quantity_pro($id_clp,$quantity){
    $check_pro = "SELECT * FROM COLOR_PRO WHERE ID_CLP = $id_clp";
    $pro = pdo_query_one($check_pro);
    $change = "UPDATE COLOR_PRO SET QUANTITY = " . $pro['quantity'] . " - $quantity WHERE ID_CLP = $id_clp";
    pdo_execute($change); 
}
function change_quantity_pro_cancel ($id_bill){
    $sql = "SELECT * FROM OTHER_BILL WHERE ID_BILL = $id_bill";
    $other_bills = pdo_query($sql);
    foreach ($other_bills as $other_bill) {
        extract($other_bill);
        $change = "UPDATE COLOR_PRO SET QUANTITY = QUANTITY + $quantity_pro WHERE ID_CLP = $id_clp";
        pdo_execute($change);
    }
}
function loadall_thongke()
{
    $sql = "SELECT danh_muc.id AS madm, danh_muc.name AS tendm, COUNT(san_pham.id) AS countsp, MIN(san_pham.price)
            AS minprice, MAX(san_pham.price) AS maxprice, AVG(san_pham.price) AS avgprice";
    $sql .= " FROM san_pham LEFT JOIN danh_muc on danh_muc.id = san_pham.iddm";
    $sql .= " GROUP BY danh_muc.id ORDER BY danh_muc.id DESC";
    $listtk = pdo_query($sql);
    return $listtk;
}
?>