<?php include "./Duan/View/HTML_PHP/header.php"; ?>

<?php
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