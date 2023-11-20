<?php
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
            include "./Duan/View/HTML_PHP/product_lists.php";
            break;

        default:
            echo '<script>alert("Lỗi!");</script>';
            include "./Duan/View/HTML_PHP/home.php";
            break;
    }
} else {
    include "./Duan/View/HTML_PHP/home.php";
}

include "./Duan/View/HTML_PHP/footer.php";
?>