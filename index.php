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
        case'':

            break;
        case 'admin':
            include "./Duan/admin/index.php";
            break;

        default:
            echo '<script>alert("Lỗi!");</script>';
            include "./Duan/View/HTML_PHP/home.php";
            break;
    }
} else {
    $limit = 12;
    if(isset($_GET['page-sale'])){
        $number = $_POST['page-sale'];
        $start = $number * $limit;
    }else{
        $start = 0;
    }
    $count_page_sale = count_pro(12);
    $product_sale = load_limit_pro ($start,$limit);
    include "./Duan/View/HTML_PHP/home.php";
}

include "./Duan/View/HTML_PHP/footer.php";
?>