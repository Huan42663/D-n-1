<?php
ob_start();
session_start();
include "./Duan/View/HTML_PHP/header.php";

include "./Duan/PDO/pdo.php";
include "./Duan/PDO/category.php";
include "./Duan/PDO/product.php";
include "./Duan/PDO/comment.php";
include "./Duan/PDO/voucher.php";
include "./Duan/PDO/account.php";
include "./Duan/PDO/bill.php";
include "./Duan/PDO/cart.php";
if (isset($_SESSION['user_name_login'])) {
    $_SESSION['count_cart'] = count_cart($_SESSION['user_name_login']['id_user']);
    $_SESSION['count_order'] = $count = count_bill_per_user($_SESSION['user_name_login']['id_user'], 1, 2);
}
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
                            $check_cart = check_cart($_SESSION['user_name_login']['id_user']);
                            if (!is_array($check_cart)) {
                                add_cart_account($_SESSION['user_name_login']['id_user']);
                            }
                            echo '<script>alert("Đăng Nhập Thành Công!");</script>';
                            echo "<script>window.location.href='index.php';</script>";
                        } else {
                            echo '<script>alert("Sai tài khoản hoặc mật khẩu !!");</script>';
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
                $pass = $_POST['pass'];
                $tel = $_POST['tel'];
                $avatar = $_FILES['avatar']['name'];
                if ($avatar) {
                    $tmp_name = $_FILES['avatar']['tmp_name'];
                    move_uploaded_file($tmp_name, 'Duan/image_user/' . $avatar);
                    update_account($id_user, $user_name, $pass, $email, $address, $tel, $avatar);
                } else {
                    update_account($id_user, $user_name, $pass, $email, $address, $tel, "");
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
            $limit = 17;
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
                $other_pro = other_pro($id_pro);
                $brand_name = get_name_brand($id_pro);
                $cate_name = get_name_cate($id_pro);
                $product = load_one_pro($id_pro);
                $list_color = load_color_for_pro($id_pro);
                $comment = load_comment($id_pro);
                if (isset($_GET['color'])) {
                    $color = $_GET['color'];
                    $color_pro = load_pro_for_color($id_pro, $color);
                    $sold = count_pro_sold($product['pro_name'], $color_pro['color_name']);
                }
                change_view($id_pro);
            }
            include "./Duan/View/HTML_PHP/Product/product_details.php";
            break;

        case 'cart':
            if (isset($_SESSION['user_name_login'])) {
                if (isset($_POST['id_clp'])) {
                    if (isset($_POST['buy']) && $_POST['buy']) {
                        include "./Duan/View/HTML_PHP/Cart/check_out.php";  
                        $id_pro = $_POST['id_pro'];
                        $product = load_one_pro($id_pro);
                        $date = date("Y-m-d");
                        $method = "check_out_buy";
                        $voucher_discount = 0;
                        $quantity_cart = $_POST['quantity'];
                        $payments = load_all_payment();
                        if (isset($_POST['add']) && $_POST['add']) {
                            $add_code = $_POST['add_code'];
                            $check_voucher = check_voucher($add_code);
                            if (is_array($check_voucher)) {
                                extract($check_voucher);
                                if ($start_at <= $date && $end_at > $date) {
                                    $voucher_discount = $value;
                                    echo '<script>alert("Áp Dụng Thành Công !");</script>';
                                } else {
                                    echo '<script>alert("Mã Giảm Giá Không Tồn Tại !");</script>';
                                }
                            } else {
                                echo '<script>alert("Mã Giảm Giá Không Tồn Tại !");</script>';
                            }
                        }
                        include "./Duan/View/HTML_PHP/Cart/check_out.php";
                    }
                    if (isset($_POST['add_to_cart']) && $_POST['add_to_cart']) {
                        $id_clp = $_POST['id_clp'];
                        $id_pro = $_POST['id_pro'];
                        $quantity_add = $_POST['quantity'];
                        $cart = check_cart($_SESSION['user_name_login']['id_user']);
                        extract($cart);
                        $check_other_cart = check_other_cart($id_cart, $id_clp);
                        if (!is_array($check_other_cart)) {
                            add_to_cart($id_cart, $id_clp, $quantity_add);
                            echo '<script>alert("Thêm vào giỏ hàng thành công");</script>';
                        } else {
                            extract($check_other_cart);
                            if (($quantity_add + $quantity_cart) > $quantity) {
                                echo '<script>alert("Số lượng trong giỏ hàng quá lớn");</script>';
                            } else {
                                add_quantity_other_cart($id_cart, $id_clp, $quantity_add);
                                echo '<script>alert("Thêm vào giỏ hàng thành công");</script>';
                            }
                        }
                        echo "<script>window.location.href='index.php?act=product_details&id=$id_pro';</script>";
                    }
                } else {
                    $id_pro = $_POST['id_pro'];
                    echo '<script>alert("Vui lòng chọn màu !!");</script>';
                    echo "<script>window.location.href='index.php?act=product_details&id=$id_pro';</script>";
                }
            } else {
                $id_pro = $_POST['id_pro'];
                echo '<script>alert("Bạn cần đăng nhập để thêm vào giỏ hàng !");</script>';
                echo "<script>window.location.href='index.php?act=product_details&id=$id_pro';</script>";
            }
            break;
        case 'delete_cart':
            if (isset($_GET['id_cart'])) {
                $id_cart = $_GET['id_cart'];
                $id_clp = $_GET['id_clp'];
                delete_one_other_cart($id_cart, $id_clp);
            }
            $carts = load_all_cart_for_account($_SESSION['user_name_login']['id_user']);
            echo '<script>location.href="index.php?act=cart_lists"</script>';
            break;

        // case 'delete_all_cart':
        //     if(isset($_GET['id_cart'])) {
        //         $id_cart = $_GET['id_cart'];
        //         delete_all_cart($id_cart);
        //     }
        //     include "./Duan/View/HTML_PHP/Cart/cart_lists.php";
        //     break;
        case 'change_quantity':
            if (isset($_GET['id_oc'])) {
                $quantity_cart = $_GET['amount'];
                $id_oc = $_GET['id_oc'];
                change_quantity($id_oc, $quantity_cart);
            }
            echo "<script>window.location.href='index.php?act=cart_lists';</script>";
            break;
        case 'cart_lists':
            $date = date("Y-m-d");
            $voucher_discount = 0;
            $carts = load_all_cart_for_account($_SESSION['user_name_login']['id_user']);
            include "./Duan/View/HTML_PHP/Cart/cart_lists.php";
            break;
        case 'check_out':
            $date = date("Y-m-d");
            $voucher_discount = 0;
            $method = "check_out_cart";
            $carts = load_all_cart_for_account($_SESSION['user_name_login']['id_user']);
            $payments = load_all_payment();
            if (isset($_POST['add']) && $_POST['add']) {
                $add_code = $_POST['add_code'];
                $check_voucher = check_voucher($add_code);
                if (is_array($check_voucher)) {
                    extract($check_voucher);
                    if ($start_at <= $date && $end_at > $date) {
                        $voucher_discount = $value;
                        echo '<script>alert("Áp Dụng Thành Công !");</script>';
                    } else {
                        echo '<script>alert("Mã Giảm Giá Không Tồn Tại !");</script>';
                    }
                } else {
                    echo '<script>alert("Mã Giảm Giá Không Tồn Tại !");</script>';
                }
            }
            include "./Duan/View/HTML_PHP/Cart/check_out.php";
            break;
        // case 'check_out_buy':
        //     $date = date("Y-m-d");
        //     $voucher_discount = 0;
        //     $payments = load_all_payment();
        //     if(isset($_POST['add']) && $_POST['add']){
        //         $add_code = $_POST['add_code'];
        //         $check_voucher = check_voucher($add_code);
        //         if(is_array($check_voucher)){
        //             extract($check_voucher);
        //             if($start_at <= $date && $end_at > $date){
        //                 $voucher_discount = $value;
        //                 echo '<script>alert("Áp Dụng Thành Công !");</script>';
        //             }else{
        //                 echo '<script>alert("Mã Giảm Giá Không Tồn Tại !");</script>';
        //             }
        //         }else{
        //             echo '<script>alert("Mã Giảm Giá Không Tồn Tại !");</script>';
        //         }
        //     }
        //     include "./Duan/View/HTML_PHP/Cart/check_out.php";
        //     break;
        case 'shipping_process':
            $id_user = $_SESSION['user_name_login']['id_user'];
            $count = count_bill_per_user($id_user, 1, 2);
            $bills = load_all_bill_per_user($id_user, 1, 2);
            include "./Duan/View/HTML_PHP/Cart/shipping_process.php";
            break;
        case 'completed_order':
            $id_user = $_SESSION['user_name_login']['id_user'];
            $count = count_bill_per_user($id_user, 3, "");
            $bills = load_all_bill_per_user($id_user, 3, "");
            include "./Duan/View/HTML_PHP/Cart/completed_order.php";
            break;
        case 'cancel_order':
            if (isset($_GET['id_bill'])) {
                $id_bill = $_GET['id_bill'];
                cancel_bill($id_bill);
                change_quantity_pro_cancel($id_bill);
            }
            echo "<script>location.href='index.php?act=shipping_process';</script>";
            break;
        case 'cancelled_order':
            $id_user = $_SESSION['user_name_login']['id_user'];
            $count = count_bill_per_user($id_user, 0, "");
            $bills = load_all_bill_per_user($id_user, 0, "");
            include "./Duan/View/HTML_PHP/Cart/cancelled_order.php";
            break;
        case 'confirm_checkout':
            if (isset($_POST['pay']) && $_POST['pay']) {
                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $_SESSION['firstname'] = $firstname;
                $_SESSION['lastname'] = $lastname;
                $tel = $_POST['tel'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $payment = $_POST['paymentMethod'];
                $check_out_method = $_POST['check_out_method'];
                $totals = $_POST['totals'];
                $voucher_discount = $_POST['voucher_discount'];
                $voucher_code = $_POST['voucher_code'];
                $voucher = $voucher_code . " " . "(-$voucher_discount%)";
                $date = date("Y-m-d");
                $id_user = $_SESSION['user_name_login']['id_user'];
                $bills = load_all_cart_for_account($id_user);
                if ($firstname == "" || $lastname == "" || $tel == "" || $email == "" || $address == "") {
                    echo "<script>alert('không được bỏ trống');</script>";
                    echo "<script>location.href='index.php?act=check_out';</script>";
                } elseif (preg_match('/[!@#$%^&*(),.?":{}|<>]/', $firstname) || preg_match('/[!@#$%^&*(),.?":{}|<>]/', $lastname)) {
                    echo "<script>alert('Không được thêm ký tự đặc biệt');</script>";
                    echo "<script>location.href='index.php?act=check_out';</script>";
                } elseif (!ctype_digit($tel)) {
                    echo "<script>alert('số điện thoại không hợp lệ');</script>";
                    echo "<script>location.href='index.php?act=check_out';</script>";
                } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    echo "<script>alert('email không hợp lệ');</script>";
                    echo "<script>location.href='index.php?act=check_out';</script>";
                } else {
                    add_bill($firstname, $lastname, $tel, $address, $date, $payment, $id_user, $totals, $voucher);
                    foreach ($bills as $add) {
                        extract($add);
                        if ($discount == 0) {
                            add_other_bill($id_clp, $pro_name, $color_name, $brand_name, $price, $quantity_cart);
                        } else {
                            add_other_bill($id_clp, $pro_name, $color_name, $brand_name, $discount, $quantity_cart);
                        }
                        change_quantity_pro($id_clp, $quantity_cart);
                    }
                    if ($check_out_method == 'check_out_cart') {
                        delete_all_other_cart($id_cart);
                    }
                    echo "<script>alert('Thanh Toán Thành Công');</script>";
                    echo "<script>location.href='index.php';</script>";
                }
            }

            if (isset($_POST['redirect']) && $_POST['redirect']) {
                // error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
                // date_default_timezone_set('Asia/Ho_Chi_Minh');
                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $_SESSION['firstname'] = $firstname;
                $_SESSION['lastname'] = $lastname;
                $tel = $_POST['tel'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $payment = $_POST['paymentMethod'];
                $check_out_method = $_POST['check_out_method'];
                $totals = $_POST['totals'];
                $voucher_discount = $_POST['voucher_discount'];
                $voucher_code = $_POST['voucher_code'];
                $voucher = $voucher_code . " " . "(-$voucher_discount%)";
                $date = date("Y-m-d");
                $id_user = $_SESSION['user_name_login']['id_user'];
                $bills = load_all_cart_for_account($id_user);
                if ($firstname == "" || $lastname == "" || $tel == "" || $email == "" || $address == "") {
                    echo "<script>alert('không được bỏ trống');</script>";
                    echo "<script>location.href='index.php?act=check_out';</script>";
                } elseif (preg_match('/[!@#$%^&*(),.?":{}|<>]/', $firstname) || preg_match('/[!@#$%^&*(),.?":{}|<>]/', $lastname)) {
                    echo "<script>alert('Không được thêm ký tự đặc biệt');</script>";
                    echo "<script>location.href='index.php?act=check_out';</script>";
                } elseif (!ctype_digit($tel)) {
                    echo "<script>alert('số điện thoại không hợp lệ');</script>";
                    echo "<script>location.href='index.php?act=check_out';</script>";
                } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    echo "<script>alert('email không hợp lệ');</script>";
                    echo "<script>location.href='index.php?act=check_out';</script>";
                } else {
                    add_bill($firstname, $lastname, $tel, $address, $date, $payment, $id_user, $totals, $voucher);
                    foreach ($bills as $add) {
                        extract($add);
                        if ($discount == 0) {
                            add_other_bill($id_clp, $pro_name, $color_name, $brand_name, $price, $quantity_cart);
                        } else {
                            add_other_bill($id_clp, $pro_name, $color_name, $brand_name, $discount, $quantity_cart);
                        }
                        change_quantity_pro($id_clp, $quantity_cart);
                    }
                    if ($check_out_method == 'check_out_cart') {
                        delete_all_other_cart($id_cart);
                    }
                    echo "<script>alert('Thanh Toán Thành Công');</script>";
                    echo "<script>location.href='index.php';</script>";

                    $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
                    $vnp_Returnurl = "http://localhost/d-n-1/index.php?act=shipping_process";
                    $vnp_TmnCode = "GHVBHPHU"; //Mã website tại VNPAY 
                    $vnp_HashSecret = "AWZSLDYHZDWWJIRWXWKLXWKVIGALXVAP"; //Chuỗi bí mật

                    $vnp_TxnRef = rand(00, 99999); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
                    $vnp_OrderInfo = 'Nhap Noi Dung Thanh Toan';
                    $vnp_OrderType = 'billpayment';
                    $vnp_Amount = 10000 * 100;
                    $vnp_Locale = 'vn';
                    $vnp_BankCode = 'NCB';
                    $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
                    //Add Params of 2.0.1 Version
                    // $vnp_ExpireDate = $_POST['txtexpire'];
                    //Billing
                    // $vnp_Bill_Mobile = $_POST['txt_billing_mobile'];
                    // $vnp_Bill_Email = $_POST['txt_billing_email'];
                    // $fullName = trim($_POST['txt_billing_fullname']);
                    // if (isset($fullName) && trim($fullName) != '') {
                    //     $name = explode(' ', $fullName);
                    //     $vnp_Bill_FirstName = array_shift($name);
                    //     $vnp_Bill_LastName = array_pop($name);
                    // }
                    // $vnp_Bill_Address = $_POST['txt_inv_addr1'];
                    // $vnp_Bill_City = $_POST['txt_bill_city'];
                    // $vnp_Bill_Country = $_POST['txt_bill_country'];
                    // $vnp_Bill_State = $_POST['txt_bill_state'];
                    // // Invoice
                    // $vnp_Inv_Phone = $_POST['txt_inv_mobile'];
                    // $vnp_Inv_Email = $_POST['txt_inv_email'];
                    // $vnp_Inv_Customer = $_POST['txt_inv_customer'];
                    // $vnp_Inv_Address = $_POST['txt_inv_addr1'];
                    // $vnp_Inv_Company = $_POST['txt_inv_company'];
                    // $vnp_Inv_Taxcode = $_POST['txt_inv_taxcode'];
                    // $vnp_Inv_Type = $_POST['cbo_inv_type'];
                    $inputData = array(
                        "vnp_Version" => "2.1.0",
                        "vnp_TmnCode" => $vnp_TmnCode,
                        "vnp_Amount" => $vnp_Amount,
                        "vnp_Command" => "pay",
                        "vnp_CreateDate" => date('YmdHis'),
                        "vnp_CurrCode" => "VND",
                        "vnp_IpAddr" => $vnp_IpAddr,
                        "vnp_Locale" => $vnp_Locale,
                        "vnp_OrderInfo" => $vnp_OrderInfo,
                        "vnp_OrderType" => $vnp_OrderType,
                        "vnp_ReturnUrl" => $vnp_Returnurl,
                        "vnp_TxnRef" => $vnp_TxnRef
                        // "vnp_ExpireDate" => $vnp_ExpireDate,
                        // "vnp_Bill_Mobile" => $vnp_Bill_Mobile,
                        // "vnp_Bill_Email" => $vnp_Bill_Email,
                        // "vnp_Bill_FirstName" => $vnp_Bill_FirstName,
                        // "vnp_Bill_LastName" => $vnp_Bill_LastName,
                        // "vnp_Bill_Address" => $vnp_Bill_Address,
                        // "vnp_Bill_City" => $vnp_Bill_City,
                        // "vnp_Bill_Country" => $vnp_Bill_Country,
                        // "vnp_Inv_Phone" => $vnp_Inv_Phone,
                        // "vnp_Inv_Email" => $vnp_Inv_Email,
                        // "vnp_Inv_Customer" => $vnp_Inv_Customer,
                        // "vnp_Inv_Address" => $vnp_Inv_Address,
                        // "vnp_Inv_Company" => $vnp_Inv_Company,
                        // "vnp_Inv_Taxcode" => $vnp_Inv_Taxcode,
                        // "vnp_Inv_Type" => $vnp_Inv_Type
                    );

                    if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                        $inputData['vnp_BankCode'] = $vnp_BankCode;
                    }
                    // if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
                    //     $inputData['vnp_Bill_State'] = $vnp_Bill_State;
                    // }

                    //var_dump($inputData);
                    ksort($inputData);
                    $query = "";
                    $i = 0;
                    $hashdata = "";
                    foreach ($inputData as $key => $value) {
                        if ($i == 1) {
                            $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                        } else {
                            $hashdata .= urlencode($key) . "=" . urlencode($value);
                            $i = 1;
                        }
                        $query .= urlencode($key) . "=" . urlencode($value) . '&';
                    }

                    $vnp_Url = $vnp_Url . "?" . $query;
                    if (isset($vnp_HashSecret)) {
                        $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
                        $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
                    }
                    $returnData = array('code' => '00'
                        , 'message' => 'success'
                        , 'data' => $vnp_Url);
                    if (isset($_POST['redirect'])) {
                        header('Location: ' . $vnp_Url);
                        die();
                    } else {
                        echo json_encode($returnData);
                    }
                }
            }
            break;

        case 'list_voucher':
            $date = date("Y-m-d");
            $vouchers = load_voucher($date);
            include "./Duan/View/HTML_PHP/voucher/list.php";
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
    $count_page_sale = count_pro_sale($limit, "", 0);
    $product_sale = load_limit_pro_sale($start, $limit, "", 0);
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
ob_end_flush();
?>