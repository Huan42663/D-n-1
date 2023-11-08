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
    <table border=1>
        <tr>
            <td>tên sản phẩm</td>
            <td>giá sản phẩm</td>
            <td>ảnh sản phẩm</td>
            <td>mô tả</td>
            <td>lượt xem</td>
            <td>ngày đăng</td>
            <td>danh mục</td>
            <td>hãng</td>
            <td></td>
            <td></td>
        </tr>
        <?php
            $pro = load_all_pro();
            foreach ($pro as $pr) {
                extract($pr);
        ?>
                <tr>
                    <td><?=$pro_name?></td>
                    <td><?=$price?></td>
                    <td><?=$img?></td>
                    <td><?=$detail?></td>
                    <td><?=$view?></td>
                    <td><?=$add_at?></td>
                    <td><?=$cate_name?></td>
                    <td><?=$brand_name?></td>

                    <td><a href="product.php?act=xoa&id=<?=$id_pro?>"><button>xóa</button></a></td>
                    <td><a href="update_pro.php?act=sua&id=<?=$id_pro?>"><button>sửa</button></a></td>
                </tr>
        <?php
            }
        ?>
    </table>
</body>
</html>