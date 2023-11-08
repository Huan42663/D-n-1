<?php
    include "../../PDO/category.php";
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
    <table>
        <tr>
            <td>tên danh mục</td>
            <td></td>
            <td></td>
        </tr>
        <?php
            $cate = load_all_cate();
            foreach ($cate as $ca) {
                extract($ca);
        ?>
        <tr>
            <td><?=$cate_name?></td>
            <td><a href="category.php?act=xoa&id=<?=$id_cate?>"><button>xóa</button></a></td>
            <td><a href="update_cate.php?act=sua&id=<?=$id_cate?>"><button>sửa</button></a></td>
        </tr>
        <?php
            }
        ?>
    </table>
</body>
</html>