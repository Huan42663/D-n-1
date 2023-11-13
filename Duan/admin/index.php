<?php
include "../PDO/pdo.php";
include "../PDO/category.php";
include "../PDO/product.php";
include "view/nav_bar.php";
include "view/header_bar.php";
if(isset($_GET['act'])){
    $act = $_GET['act'];
    switch ($act) {
        case 'list_product':
            $limit = 10;
            if(isset($_POST['number'])){
                $number = $_POST['number'];
                $start = ($number - 1) * $limit;
            }else{
                $start = 0;
            }
            $count = count_pro();
            $list_pro = load_limit_10_pro($start,$limit);
            include "product/list.php";
        break;
        case 'add_pro':
            if(isset($_POST['them']) && $_POST['them']){
                $name = $_POST['name'];
                $price = $_POST['price'];
                $detail = $_POST['detail'];
                $color = $_POST['color'];
                $brand = $_POST['brand'];
                $cate = $_POST['cate'];
                $quantity = $_POST['quantity'];
                $img = $_FILES['img']['name'];
                $tmp_name = $_FILES['img']['tmp_name'];
                move_uploaded_file($tmp_name,'../image_product/' . $img);
                $add_at = date("Y-m-d");
                add_product ($name,$price,$img,$detail,$color,$brand,$cate,$add_at,$quantity);
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
            $listcolor = load_all_color();
            $listbrand = load_all_brand();
            $listcate = load_all_cate();
            include "product/update.php";
            break;
        case 'updated_pro':
            if(isset($_POST['sua'])){
                $name = $_POST['name'];
                $price = $_POST['price'];
                $detail = $_POST['detail'];
                $color = $_POST['color'];
                $brand = $_POST['brand'];
                $cate = $_POST['cate'];
                $quantity = $_POST['quantity'];
                $img = $_FILES['img']['name'];
                if($img){
                    $tmp_name = $_FILES['img']['tmp_name'];
                    move_uploaded_file($tmp_name,'../image_product/' . $img);
                    
                }else {

                }
            }
            break;
        default:
        include "view/home.php";
            break;
    }
} else include "view/home.php";
include "view/footer.php";

?>  