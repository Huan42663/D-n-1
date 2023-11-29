<?php
session_start();
if(empty($_SESSION['user_name_login'])){
    echo "<script>alert('bạn không đủ thẩm quyền');</script>";
}else if (extract($_SESSION['user_name_login']) && $role == 0){
    echo "<script>alert('bạn không đủ thẩm quyền');</script>";
}else{
include "../PDO/pdo.php";
include "../PDO/category.php";
include "../PDO/product.php";
include "../PDO/comment.php";
include "../PDO/account.php";
include "view/header.php";
if(isset($_GET['act'])){
    $act = $_GET['act'];
    switch ($act) {
        case 'shop':
            echo "<script>window.location.href='../../index.php';</script>";
            break;

        case 'list_cate':
            $limit = 5;
            if(isset($_GET['page'])){
                $number = $_GET['page'];
                $start = $number * $limit;
            }else{
                $start = 0;
            }
            $count = count_cate();
            $list_cate = load_limit_5_cate($start,$limit);
            include "category/list_cate.php";
            break;
        case 'add_cate':
            if(isset($_POST['them']) && $_POST['them']){
                $check = check_cate($_POST['name']);
                if($_POST['name']==""){
                echo "<script>alert('Không để trống');</script>";
                }
                elseif(preg_match('/[!@#$%^&*(),.?":{}|<>]/', $_POST['name'])){
                echo "<script>alert('Không được thêm ký tự đặc biệt');</script>";
                }
                elseif(is_array($check)){
                    echo "<script>alert('danh mục đã tồn tại');</script>";
                }
                else{
                $cate_name = $_POST['name'];
                add_cate($cate_name);
                }
            }
            include "category/add_cate.php";
            break;
        case 'update_cate':
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $category = load_one_cate($id);
            }
            include "category/update_cate.php";
            break;
        case 'updated_cate':
            if(isset($_POST['sua'])){
                $check = check_cate($_POST['cate_name']);
                if($_POST['cate_name']==""){
                    echo "<script>alert('Không để trống');</script>";
                }
                elseif(preg_match('/[!@#$%^&*(),.?":{}|<>]/', $_POST['cate_name'])){
                    echo "<script>alert('Không được thêm ký tự đặc biệt');</script>";
                }
                elseif(is_array($check)){
                    echo "<script>alert('danh mục đã tồn tại');</script>";
                }
                else{
                    $id_cate=$_POST['id_cate'];
                    $cate_name = $_POST['cate_name'];
                    update_cate($id_cate,$cate_name);
                }
            }
            $limit = 5;
            if(isset($_GET['page'])){
                $number = $_GET['page'];
                $start = $number * $limit;
            }else{
                $start = 0;
            }
            $count = count_cate();
            $list_cate = load_limit_5_cate($start,$limit);
            include "category/list_cate.php";
            break;
        case 'delete_cate':
            if(isset($_GET['id'])){
                $id_cate = $_GET['id'];
                delete_cate($id_cate);
            }
            $limit = 5;
            if(isset($_GET['page'])){
                $number = $_GET['page'];
                $start = $number * $limit;
            }else{
                $start = 0;
            }
            $count = count_cate();
            $list_cate = load_limit_5_cate($start,$limit);
            include "category/list_cate.php";
            break;
        case 'list_color':
            $limit = 5;
            if(isset($_GET['page'])){
                $number = $_GET['page'];
                $start = $number * $limit;
            }else{
                $start = 0;
            }
            $count = count_color();
            $list_color = load_limit_5_color($start,$limit);
            include "category/list_color.php";
            break;
        case 'add_color':
            if(isset($_POST['them']) && $_POST['them']){
                $check = check_color($_POST['color_name']);
                if($_POST['color_name']==""){
                    echo "<script>alert('Không để trống');</script>";
                }
                elseif(preg_match('/[!@#$%^&*(),.?":{}|<>]/', $_POST['color_name'])){
                    echo "<script>alert('Không để ký tự đặc biệt');</script>";
                }
                elseif (is_array($check)) {
                    echo "<script>alert('màu đã tồn tại');</script>";
                }
                else{
                    $color_name = $_POST['color_name'];
                    add_color($color_name);
                    // header('location:index.php?act=list_color');
                }
            }
            include "category/add_color.php";
            break;
        case 'update_color':
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $color = load_one_color($id);
            }
            include "category/update_color.php";
            break;
        case 'updated_color':
            if(isset($_POST['sua'])){
                $check = check_color($_POST['color_name']);
                if($_POST['color_name']==""){
                    echo "<script>alert('Không để trống');</script>";
                }
                elseif(preg_match('/[!@#$%^&*(),.?":{}|<>]/', $_POST['color_name'])){
                    echo "<script>alert('Không để ký tự đặc biệt');</script>";
                }
                elseif (is_array($check)) {
                    echo "<script>alert('màu đã tồn tại');</script>";
                }
                else{
                    $id_color=$_POST['id_color'];
                    $color_name = $_POST['color_name'];
                    update_color($id_color,$color_name);
                }
            }
            $limit = 5;
            if(isset($_GET['page'])){
                $number = $_GET['page'];
                $start = $number * $limit;
            }else{
                $start = 0;
            }
            $count = count_color();
            $list_color = load_limit_5_color($start,$limit);
            include "category/list_color.php";
            break;
        case 'delete_color':
            if(isset($_GET['id'])){
                $id_color = $_GET['id'];
                delete_color($id_color);
            }
            $limit = 5;
            if(isset($_GET['page'])){
                $number = $_GET['page'];
                $start = $number * $limit;
            }else{
                $start = 0;
            }
            $count = count_color();
            $list_color = load_limit_5_color($start,$limit);
            include "category/list_color.php";
            break;
            case 'list_brand':
                $limit = 5;
                if(isset($_GET['page'])){
                    $number = $_GET['page'];
                    $start = $number * $limit;
                }else{
                    $start = 0;
                }
                $count = count_brand();
                $list_brand = load_limit_5_brand($start,$limit);
                include "category/list_brand.php";
                break;
            case 'add_brand':
                if(isset($_POST['them']) && $_POST['them']){
                    $check = check_brand($_POST['brand_name']);
                    if($_POST['brand_name']=="")
                    {
                        echo "<script>alert('Không để trống');</script>";
                    }
                    elseif(preg_match('/[!@#$%^&*(),.?":{}|<>]/', $_POST['brand_name'])){
                        echo "<script>alert('Không để ký tự đặc biệt');</script>";
                    }
                    elseif (is_array($check)) {
                        echo "<script>alert('hãng đã tồn tại');</script>";
                    }
                    else {
                        $brand_name = $_POST['brand_name'];
                        add_brand($brand_name);
                        header('location:index.php?act=list_cate');
                    }
                }
                include "category/add_brand.php";
                break;
            case 'update_brand':
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    $brand = load_one_brand($id);
                }
                include "category/update_brand.php";
                break;
            case 'updated_brand':
                if(isset($_POST['sua'])){
                    $check = check_brand($_POST['brand_name']);
                    if($_POST['brand_name']=="")
                    {
                        echo "<script>alert('Không để trống');</script>";
                    }
                    elseif(preg_match('/[!@#$%^&*(),.?":{}|<>]/', $_POST['brand_name'])){
                        echo "<script>alert('Không để ký tự đặc biệt');</script>";
                    }
                    elseif (is_array($check)) {
                        echo "<script>alert('hãng đã tồn tại');</script>";
                    }
                    else {
                        $id_brand=$_POST['id_brand'];
                        $brand_name = $_POST['brand_name'];
                        update_brand($id_brand,$brand_name);
                    }
                }
                $limit = 5;
                if(isset($_GET['page'])){
                    $number = $_GET['page'];
                    $start = $number * $limit;
                }else{
                    $start = 0;
                }
                $count = count_brand();
                $list_brand = load_limit_5_brand($start,$limit);
                include "category/list_brand.php";
                break;
            case 'delete_brand':
                if(isset($_GET['id'])){
                    $id_brand = $_GET['id'];
                    delete_brand($id_brand);
                }
                $limit = 5;
                if(isset($_GET['page'])){
                    $number = $_GET['page'];
                    $start = $number * $limit;
                }else{
                    $start = 0;
                }
                $count = count_brand();
                $list_brand = load_limit_5_brand($start,$limit);
                include "category/list_brand.php";
                break;
        case 'list_pro':
            $limit = 10;
            if(isset($_GET['page'])){
                $number = $_GET['page'];
                $start = $number * $limit;
            }else{
                $start = 0;
            }
            $count = count_pro(10,"",0);
            $list_pro = load_limit_pro($start,$limit,"",0);
            include "product/list.php";
        break;
        case 'add_pro':
            if(isset($_POST['them']) && $_POST['them']){
                $check  = check_pro($_POST['pro_name']);
                $check_file = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
                $image_extensions = array('jpg', 'png', 'jpeg', 'bmp', 'tiff', 'webp', 'svg');
                if($_POST['pro_name']==""){
                    echo "<script>alert('Không để trống tên sản phẩm');</script>";
                }
                elseif($_POST['price']==""){
                    echo "<script>alert('yêu cầu nhập giá sản phẩm');</script>";
                }
                elseif($_POST['quantity']==""){
                    echo "<script>alert('Không để trống');</script>";
                }
                elseif(preg_match('/[!@#$%^&*(),.?":{}|<>]/', $_POST['pro_name'])){
                    echo "<script>alert('Không để ký tự đặc biệt');</script>";
                }
                elseif(preg_match('/[!@#$%^&*(),.?":{}|<>]/', $_POST['price'])){
                    echo "<script>alert('Không để đặc biệt');</script>";
                }
                elseif (is_array($check)) {
                    echo "<script>alert('sản phẩm đã tồn tại');</script>";
                }
                elseif(!in_array($check_file,$image_extensions)){
                    echo "<script>alert('định dạng ảnh sai');</script>";
                }
            //    elseif(ctype_digit($_POST['price'])){
            //         echo "<script>alert('Không để trống');</script>";
            //     }
                else{
                    $name = $_POST['pro_name'];
                    $price = $_POST['price'];
                    $discount = $_POST['discount'];
                    $detail = $_POST['detail'];
                    $color = $_POST['color'];
                    $brand = $_POST['brand'];
                    $cate = $_POST['cate'];
                    $quantity = $_POST['quantity'];
                    $img = $_FILES['img']['name'];
                    $tmp_name = $_FILES['img']['tmp_name'];
                    move_uploaded_file($tmp_name,'../image_product/' . $img);
                    $add_at = date("d-m-Y");
                    add_product ($name,$price,$discount,$img,$detail,$color,$brand,$cate,$add_at,$quantity);
                }  
            }
            $listcolor = load_all_color();
            $listbrand = load_all_brand();
            $listcate = load_all_cate();
            include "product/add.php";
            break;
        case 'update_pro':
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $product = load_one_pro($id);
            }
            $listbrand = load_all_brand();
            $listcate = load_all_cate();
            include "product/update.php";
            break;
        case 'updated_pro':
            if(isset($_POST['sua']) && $_POST['sua']){
                $check  = check_pro($_POST['pro_name']);
                if($_POST['pro_name']==""){
                    echo "<script>alert('Không để trống tên sản phẩm');</script>";
                }
                elseif($_POST['price']==""){
                    echo "<script>alert('yêu cầu nhập giá sản phẩm');</script>";
                }
                elseif(preg_match('/[!@#$%^&*(),.?":{}|<>]/', $_POST['pro_name'])){
                    echo "<script>alert('Không để ký tự đặc biệt');</script>";
                }
                elseif(preg_match('/[!@#$%^&*(),.?":{}|<>]/', $_POST['price'])){
                        echo "<script>alert('Không để đặc biệt');</script>";
                }
                elseif (is_array($check)) {
                    echo "<script>alert('sản phẩm đã tồn tại');</script>";
                }
                else{
                    $id=$_POST['id_pro'];
                    $name = $_POST['pro_name'];
                    $discount = $_POST['discount'];
                    $price = $_POST['price'];
                    $detail = $_POST['detail'];
                    $brand = $_POST['brand'];
                    $cate = $_POST['cate'];
                    $img = $_FILES['img']['name'];
                    if($img){
                        $tmp_name = $_FILES['img']['tmp_name'];
                        move_uploaded_file($tmp_name,'../image_product/' . $img);
                        update_pro($id,$name,$price,$discount,$img,$detail,$cate,$brand);
                    }else {
                        update_pro($id,$name,$price,$discount,"",$detail,$cate,$brand);
                    }
                }
            }
            $limit = 10;
            if(isset($_GET['page'])){
                $number = $_GET['page'];
                $start = $number * $limit;
            }else{
                $start = 0;
            }
            $count = count_pro(10,"",0);
            $list_pro = load_limit_pro($start,$limit,"",0);
            include "product/list.php";
            break;
        case 'add_more_color':
            $id = $_GET['id'];
            if(isset($_POST['them']) && $_POST['them']){
                if($_POST['quantity']==""){
                    echo "<script>alert('Không để trống');</script>";
                }
                else{
                    $id_pro = $_POST['id_pro'];
                    $id_color = $_POST['color'];
                    $quantity = $_POST['quantity'];
                    $img = $_FILES['img']['name'];
                    $tmp_name = $_FILES['img']['tmp_name'];
                    move_uploaded_file($tmp_name,'../image_product/' . $img);
                    add_more_color($id_pro,$id_color,$img,$quantity);
                }
            }
            $listcolor = load_all_color();
            include "product/add_more_color.php";
            break;
        case 'delete_pro':
            if(isset($_GET['id']) && $_GET['id'] > 1){
                $id_pro = $_GET['id'];
                delete_pro ($id_pro);
            }
            $limit = 10;
            if(isset($_GET['page'])){
                $number = $_GET['page'];
                $start = $number * $limit;
            }else{
                $start = 0;
            }
            $count = count_pro(10,"",0);
            $list_pro = load_limit_pro($start,$limit,"",0);
            include "product/list.php";
            break;
        case 'list_color_pro':
            if(isset($_GET['id'])){
                $id_pro = $_GET['id'];
                $count = count_color_pro($id_pro);
            }
            $limit = 10;
            if(isset($_GET['page'])){
                $number = $_GET['page'];
                $start = $number * $limit;
            }else{
                $start = 0;
            }
            $list_pro = load_limit_10_color_pro($start,$limit,$id_pro);
            include "product/list_color_pro.php";
        break;
        case 'update_color_pro':
            if(isset($_GET['id_clp'])){
                $id_clp = $_GET['id_clp'];
                $color_pro = load_one_color_pro($id_clp);
            }
            $listcolor = load_all_color();
            include "product/update_color_pro.php";
            break;
        case 'updated_color_pro':
            if(isset($_POST['sua']) && $_POST['sua']){
                if($_POST['quantity']==""){
                    echo "<script>alert('Không để trống');</script>";
                }else{
                    $id_clp = $_POST['id_clp'];
                    $id_pro = $_POST['id_pro'];
                    $id_color = $_POST['color'];
                    $quantity = $_POST['quantity'];
                    $img = $_FILES['img']['name'];
                    if($img){
                        $tmp_name = $_FILES['img']['tmp_name'];
                        move_uploaded_file($tmp_name,'../image_product/' . $img);
                        update_color_pro($id_clp,$id_color,$img,$quantity);
                    }else {
                        update_color_pro($id_clp,$id_color,"",$quantity);
                    }
                }
            }
            $count = count_color_pro($id_pro);
            $limit = 10;
            if(isset($_GET['page'])){
                $number = $_GET['page'];
                $start = $number * $limit;
            }else{
                $start = 0;
            }
            $list_pro = load_limit_10_color_pro($start,$limit,$id_pro);
            include "product/list_color_pro.php";
            break;
        case 'delete_color_pro':
            if(isset($_GET['id_clp']) && $_GET['id_clp'] > 0){
                $id_clp = $_GET['id_clp'];
                $id_pro = $_GET['id_pro'];
                delete_color_pro ($id_clp);
            }
            $count = count_color_pro($id_pro);
            $limit = 10;
            if(isset($_GET['page'])){
                $number = $_GET['page'];
                $start = $number * $limit;
            }else{
                $start = 0;
            }
            $list_pro = load_limit_10_color_pro($start,$limit,$id_pro);
            include "product/list_color_pro.php";
            break;
        case 'list_comment':
            $limit = 5;
            if(isset($_GET['page'])){
                $number = $_GET['page'];
                $start = $number * $limit;
            }else{
                $start = 0;
            }
            $count = count_comment();
            $list_comment = load_limit_5_comment($start,$limit);
            include "comment/list.php";
            break;
        case 'delete_comment':
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                delete_comment($id);
            }
            $limit = 5;
            if(isset($_GET['page'])){
                $number = $_GET['page'];
                $start = $number * $limit;
            }else{
                $start = 0;
            }
            $count = count_comment();
            $list_comment = load_limit_5_comment($start,$limit);
            include "comment/list.php";
            break;
        case 'list_account':
            $limit = 5;
            if(isset($_POST['number'])){
                $number = $_POST['number'];
                $start = ($number - 1) * $limit;
            }else{
                $start = 0;
            }
            $count = count_account();
            $list_account = load_limit_5_account($start,$limit);
            include "account/list.php";
            break;
        case 'update_account':
            if(isset($_GET['id'])){
                $id_user = $_GET['id'];
            }
            $account = load_one_account($id_user);
            include "account/update.php";
            break;
        case 'updated_account':
            if(isset($_POST['sua'])){
                if($_POST['user_name']=="" || $_POST['pass'] == ""){
                echo "<script>alert('Không để trống');</script>";
                }
                elseif(preg_match('/[!@#$%^&*(),.?":{}|<>]/', $_POST['user_name']) || preg_match('/[!@#$%^&*(),.?":{}|<>]/', $_POST['pass'])){
                echo "<script>alert('Không được thêm ký tự đặc biệt');</script>";
                }else{
                    $id_user = $_POST['id_user'];
                    $user_name = $_POST['user_name'];
                    $pass = $_POST['pass'];
                    $email = $_POST['email'];
                    $address = $_POST['address'];
                    $tel = $_POST['tel'];
                    $avatar = $_FILES['avatar']['name'];
                    $file_type = $_FILES['avatar']['file_type'];
                    $role = $_POST['role'];
                    if($avatar){
                        $tmp_name = $_FILES['avatar']['tmp_name'];
                        move_uploaded_file($tmp_name,'../image_user/'.$avatar);
                        update_account($id_user, $user_name, $pass, $email, $address, $tel, $avatar,$role);
                    }else{
                        update_account($id_user, $user_name, $pass, $email, $address, $tel, "",$role);
                    }
                }
            }
            $limit = 5;
            if(isset($_POST['number'])){
                $number = $_POST['number'];
                $start = ($number - 1) * $limit;
            }else{
                $start = 0;
            }
            $count = count_account();
            $list_account = load_limit_5_account($start,$limit);
            include "account/list.php";
            break;
        default:
        $product = load_top_5_pro();
        include "view/home.php";
            break;
    }
} else {
    $product = load_top_5_pro();
    include "view/home.php";
}
include "view/footer.php";
}
?>  