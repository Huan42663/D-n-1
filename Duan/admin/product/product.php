<?php
    include "../../PDO/category.php";
    include "../../PDO/product.php";
    include "../../PDO/pdo.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" enctype="multipart/form-data" method="POST">
        tên sản phẩm <input type="text" name="name" id=""><br>
        giá sản phẩm <input type="text" name="price" id=""><br>
        ảnh sản phẩm <input type="file" name="img" id=""><br>
        mô tả <input type="text" name="detail" id=""><br>
        số lượng <input type="number" name="quantity" id=""><br>
        màu
        <select name="color" id="">
            <?php
                $listcolor = load_all_color();
                foreach ($listcolor as $cl) {
                    extract($cl);
            ?>
                <option value="<?=$id_color?>"><?=$color_name?></option>
            <?php
                }
            ?>
        </select><br>
        hãng
        <select name="brand" id="">
            <?php
                $listbrand = load_all_brand();
                foreach ($listbrand as $br) {
                    extract($br);
            ?>
                <option value="<?=$id_brand?>"><?=$brand_name?></option>
            <?php
                }
            ?>
        </select><br>
        danh mục
        <select name="cate" id="">
            <?php
                $listcate = load_all_cate();
                foreach ($listcate as $ct) {
                    extract($ct);
            ?>
                <option value="<?=$id_cate?>"><?=$cate_name?></option>
            <?php
                }
            ?>
        </select><br>
        <input type="submit" name="them" value="thêm">
    </form>
    <br>
    <a href="list_product.php"><button>Danh sách sản phẩm</button></a>
    <?php
        if(isset($_POST['them']) && $_POST['them']){
            $name = $_POST['name'];
            $price = $_POST['price'];
            $detail = $_POST['detail'];
            $color = $_POST['color'];
            $brand = $_POST['brand'];
            $cate = $_POST['cate'];
            $quantity = $_POST['quantity'];
            $img = null;
            $add_at = date("Y-m-d");
            add_product ($name,$price,$img,$detail,$color,$brand,$cate,$add_at,$quantity);
        }
    ?>
</body>
</html>