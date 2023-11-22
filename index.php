<?php
include "./Duan/PDO/category.php";
include "./Duan/PDO/product.php";
include "./Duan/View/HTML_PHP/header.php";
include "./Duan/PDO/pdo.php";

if ((isset($_GET['act'])) && ($_GET['act'] != '')) {
    $act = $_GET['act'];
    switch ($act) {
        case 'account':
            if ((isset($_POST['login_register'])) && (($_POST['login_register'] > 0))) {

            } else {
                // echo '<script>alert("Lỗi!");</script>';
            }
            include "./Duan/View/HTML_PHP/Account/Login_Register.php";
            break;

        case 'log_out':
            session_unset();
            echo '<script>alert("Lỗi!");</script>';
            include "../View/home.php";
            break;

        case 'admin':
            include "./Duan/admin/index.php";
            break;

        case 'product_lists':
            $limit = 18;
            if(isset($_POST['btn_search']) && $_POST['btn_search']) {
                $kyw = $_POST['kyw'];
            }else {
                $kyw = "";
            }
            if(isset($_POST['btn_filter']) && $_POST['btn_filter']) {
                if($_POST['brand'] != 'all'){
                    $brand = $_POST['brand'];
                }else {
                    $brand = "";
                }
                if($_POST['cate'] != 'all'){
                    $cate = $_POST['cate'];
                }else {
                    $cate = "";
                }
                if($_POST['color'] != 'all'){
                    $color = $_POST['color'];
                }else {
                    $color = "";
                }
            }else {
                $brand = "";
                $cate = "";
                $color = "";
            }
            if(isset($_GET['load_type'])){
                if($_GET['load_type'] == 'price_up'){
                    $load_with = "PRICE";
                    $load_type = "ASC";
                }elseif($_GET['load_type'] == 'price_down'){
                    $load_with = "PRICE";
                    $load_type = "DESC";
                }elseif($_GET['load_type'] == 'lastest'){
                    $load_with = "ADD_AT";
                    $load_type = "DESC";
                }elseif($_GET['load_type'] == 'most_view'){
                    $load_with = "VIEW";
                    $load_type = "DESC";
                }
            }else{
                $load_with = "ID_PRO";
                $load_type = "DESC";
            }
            if(isset($_GET['page'])){
                $number = $_GET['page'];
                $start = $number * $limit;
            } else {
                $start = 0;
            }
            $count = count_pro_filter($limit,$kyw,$brand,$cate,$color);
            $product = load_limit_pro_filter($start,$limit,$kyw,$brand,$cate,$color,$load_with,$load_type);
            $color = load_all_color ();
            $cate = load_all_cate();
            $brand = load_all_brand();
            include "./Duan/View/HTML_PHP/Product/product_lists.php";
            break;

        default:
            echo '<script>alert("Lỗi!");</script>';
            include "./Duan/View/HTML_PHP/home.php";
            break;
    }
} else {
    $limit = 12;
    if(isset($_GET['page-sale'])){
        $number = $_GET['page-sale'];
        $start = $number * $limit;
    } else {
        $start = 0;
    }
    $count_page_sale = count_pro($limit,"",0);
    $product_sale = load_limit_pro ($start,$limit,"",0);
    if(isset($_GET['page-mouse'])){
        $number = $_GET['page-mouse'];
        $start = $number * $limit;
    } else {
        $start = 0;
    }
    $count_page_mouse = count_pro($limit,"",0);
    $product_mouse = load_limit_pro ($start,$limit,"chuột",0);
    if(isset($_GET['page-key-board'])){
        $number = $_GET['page-key-board'];
        $start = $number * $limit;
    } else {
        $start = 0;
    }
    $count_page_key_board = count_pro($limit,"",0);
    $product_key_board = load_limit_pro ($start,$limit,"bàn phím",0);
    include "./Duan/View/HTML_PHP/home.php";
}

include "./Duan/View/HTML_PHP/footer.php";
?>