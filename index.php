<?php
session_start();
include "./Duan/View/HTML_PHP/header.php";

include "./Duan/PDO/pdo.php";
include "./Duan/PDO/category.php";
include "./Duan/PDO/product.php";
include "./Duan/PDO/comment.php";
include "./Duan/PDO/account.php";

if ((isset($_GET['act'])) && ($_GET['act'] != '')) {
    $act = $_GET['act'];
    switch ($act) {
        case 'account':
            if (isset($_SESSION['user_name_login'])) {
                extract($_SESSION['user_name_login']);
                include "./Duan/View/HTML_PHP/Account/account_details.php";
            } else {
                include "./Duan/View/HTML_PHP/Account/login_register.php";                                            // Vào Trang Đăng Ký - Đăng Nhập

                if (isset($_POST['register']) && ($_POST['register'])) {                                              // Đăng Ký
                    if ($errorCount == 0) {
                        $user_name_register = $_POST['user_name_register'];
                        $email_register = $_POST['email_register'];
                        $pass_register = $_POST['pass_register'];
                        insert_account($user_name_register, $email_register, $pass_register);

                        echo '<script>alert("Đăng Ký Thành Công!");</script>';
                        include "./Duan/View/HTML_PHP/Account/login_register.php";
                    }
                }

                if (isset($_POST['login']) && ($_POST['login'])) {                                                    // Đăng Nhập
                    if ($errorCount == 0) {
                        $user_name_login = $_POST['user_name_login'];
                        $pass_login = $_POST['pass_login'];
                        $check_user = check_user($user_name_login, $pass_login);

                        if (is_array($check_user)) {
                            $_SESSION['user_name_login'] = $check_user;
                            echo '<script>alert("Đăng Nhập Thành Công!");</script>';
                            echo "<script>window.location.href='index.php';</script>";
                        } else {
                            echo '<script>alert("Tài Khoản Không Tồn Tại!");</script>';
                        }
                    }
                }

            }

            break;

        case 'account_details':
            if (empty($_SESSION['user_name_login'])) {
                echo "<script>window.location.href='index.php';</script>";
            } else {
                extract($_SESSION['user_name_login']);
                include "./Duan/View/HTML_PHP/Account/account_details.php";
            }
            break;

        case 'update_account':
            if (empty($_SESSION['user_name_login'])) {
                echo "<script>window.location.href='index.php';</script>";
            } else {
                extract($_SESSION['user_name_login']);
                include "./Duan/View/HTML_PHP/Account/update_account.php";
            }
            break;
        case 'updated_account':
            if (isset($_POST['update']) && ($_POST['update'])) {
                $id_user = $_POST['id_user'];
                $user_name = $_POST['user_name'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $tel = $_POST['tel'];
                $avatar = $_FILES['avatar']['name'];
                $role = $_POST['role'];
                if($avatar){
                    $tmp_name = $_FILE['avatar']['tmp_name'];
                    move_uploaded_file($tmp_name,'Duan/image_user/'.$avatar);
                    update_account($id_user, $user_name, $pass, $email, $address, $tel, $avatar,$role);
                }else{
                    update_account($id_user, $user_name, $pass, $email, $address, $tel, "",$role);
                }
                // $_SESSION['user_name_login'] = check_user($user_name, $pass);
                echo '<script>alert("Cập Nhật Thành Công!");</script>';
                // echo "<script>window.location.href='./Duan/View/HTML_PHP/Account/account_details.php';</script>";
                extract($_SESSION['user_name_login']);
                include "./Duan/View/HTML_PHP/Account/update_account.php";
            } else {
                // echo '<script>alert("Lỗi!");</script>';
            }
            break;
        case 'change_password':
            if (empty($_SESSION['user_name_login'])) {
                echo "<script>window.location.href='index.php';</script>";
            } else {
                extract($_SESSION['user_name_login']);
                include "./Duan/View/HTML_PHP/Account/change_password.php";
            }

            break;

        case 'log_out':
            session_destroy();
            echo "<script>window.location.href='index.php';</script>";
            break;

        case 'admin':
            // Check nếu SESSION trống thì tức là chưa đăng nhập => không vào được admin
            if (empty($_SESSION['user_name_login'])) {
                echo "<script>window.location.href='index.php';</script>";

                // Nếu không trống thì xuất dữ liệu user và check role | role != 1 không vào được admin
            } else if (extract($_SESSION['user_name_login']) && $role != 1) {
                echo "<script>window.location.href='index.php';</script>";

                // Cuối cùng nếu vừa có "SESSION dữ liệu" và "role thỏa mãn = 1" thì vào được admin
            } else {
                extract($_SESSION['user_name_login']);
                include "./Duan/admin/index.php";
                // echo '<script>alert("Lỗi!");</script>';
                // echo '<script> location.replace("./Duan/admin/index.php"); </script>';
                // echo "<script>window.location.href='./Duan/admin/index.php';</script>";
                // include "./Duan/admin/index.php";
            }
            break;

        case 'product_lists':
            $limit = 18;
            if (isset($_POST['btn_search']) && $_POST['btn_search']) {
                $kyw = $_POST['kyw'];
            } else {
                $kyw = "";
            }
            if (isset($_POST['btn_filter']) && $_POST['btn_filter']) {
                if ($_POST['brand'] != 'all') {
                    $brand = $_POST['brand'];
                } else {
                    $brand = "";
                }
                if ($_POST['cate'] != 'all') {
                    $cate = $_POST['cate'];
                } else {
                    $cate = "";
                }
                // if ($_POST['color'] != 'all') {
                //     $color = $_POST['color'];
                // } else {
                //     $color = "";
                // }
            } else {
                $brand = "";
                $cate = "";
                // $color = "";
            }
            if (isset($_GET['load_type'])) {
                if ($_GET['load_type'] == 'price_up') {
                    $load_with = "PRICE";
                    $load_type = "ASC";
                } elseif ($_GET['load_type'] == 'price_down') {
                    $load_with = "PRICE";
                    $load_type = "DESC";
                } elseif ($_GET['load_type'] == 'lastest') {
                    $load_with = "ADD_AT";
                    $load_type = "DESC";
                } elseif ($_GET['load_type'] == 'most_view') {
                    $load_with = "VIEW";
                    $load_type = "DESC";
                }
            } else {
                $load_with = "ID_PRO";
                $load_type = "DESC";
            }
            if (isset($_GET['page'])) {
                $number = $_GET['page'];
                $start = $number * $limit;
            } else {
                $start = 0;
            }
            $count = count_pro_filter($kyw, $brand, $cate);
            $page = ceil($count / $limit);
            $product = load_limit_pro_filter($start, $limit, $kyw, $brand, $cate, $load_with, $load_type);
            $color = load_all_color();
            $cate = load_all_cate();
            $brand = load_all_brand();
            include "./Duan/View/HTML_PHP/Product/product_lists.php";
            break;
        case 'product_details':
            if (isset($_GET['id'])) {
                $id_pro = $_GET['id'];
            }
            if (isset($_GET['color'])) {
                $color = $_GET['color'];
                $color_pro = load_pro_for_color($id_pro, $color);
            }
            $other_pro = other_pro($id_pro);
            $brand_name = get_name_brand($id_pro);
            $product = load_one_pro($id_pro);
            $list_color = load_color_for_pro($id_pro);
            $comment = load_comment($id_pro);
            include "./Duan/View/HTML_PHP/Product/product_details.php";
            break;
        default:
            echo '<script>alert("Lỗi!");</script>';
            $limit = 12;
            if (isset($_GET['page-sale'])) {
                $number = $_GET['page-sale'];
                $start = ($number - 1) * $limit;
            } else {
                $start = 0;
            }
            $count_page_sale = count_pro($limit, "", 0);
            $product_sale = load_limit_pro($start, $limit, "", 0);
            if (isset($_GET['page-mouse'])) {
                $number = $_GET['page-mouse'];
                $start = ($number - 1) * $limit;
            } else {
                $start = 0;
            }
            $count_page_mouse = count_pro($limit, "chuột", 0);
            $product_mouse = load_limit_pro($start, $limit, "chuột", 0);
            if (isset($_GET['page-key-board'])) {
                $number = $_GET['page-key-board'];
                $start = ($number - 1) * $limit;
            } else {
                $start = 0;
            }
            $count_page_key_board = count_pro($limit, "bàn phím", 0);
            $product_key_board = load_limit_pro($start, $limit, "bàn phím", 0);
            if (isset($_GET['page-head-phone'])) {
                $number = $_GET['page-head-phone'];
                $start = ($number - 1) * $limit;
            } else {
                $start = 0;
            }
            $count_page_head_phone = count_pro($limit, "tai nghe", 0);
            $product_head_phone = load_limit_pro($start, $limit, "tai nghe", 0);
            include "./Duan/View/HTML_PHP/home.php";
            break;
    }
} else {
    $limit = 12;
    if (isset($_GET['page-sale'])) {
        $number = $_GET['page-sale'];
        $start = ($number - 1) * $limit;
    } else {
        $start = 0;
    }
    $count_page_sale = count_pro($limit, "", 0);
    $product_sale = load_limit_pro($start, $limit, "", 0);
    if (isset($_GET['page-mouse'])) {
        $number = $_GET['page-mouse'];
        $start = ($number - 1) * $limit;
    } else {
        $start = 0;
    }
    $count_page_mouse = count_pro($limit, "chuột", 0);
    $product_mouse = load_limit_pro($start, $limit, "chuột", 0);
    if (isset($_GET['page-key-board'])) {
        $number = $_GET['page-key-board'];
        $start = ($number - 1) * $limit;
    } else {
        $start = 0;
    }
    $count_page_key_board = count_pro($limit, "bàn phím", 0);
    $product_key_board = load_limit_pro($start, $limit, "bàn phím", 0);
    if (isset($_GET['page-head-phone'])) {
        $number = $_GET['page-head-phone'];
        $start = ($number - 1) * $limit;
    } else {
        $start = 0;
    }
    $count_page_head_phone = count_pro($limit, "tai nghe", 0);
    $product_head_phone = load_limit_pro($start, $limit, "tai nghe", 0);
    include "./Duan/View/HTML_PHP/home.php";
}

include "./Duan/View/HTML_PHP/footer.php";
?>