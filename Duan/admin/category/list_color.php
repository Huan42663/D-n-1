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
            <td>tên màu</td>
            <td></td>
            <td></td>
        </tr>
        <?php
            $color = load_all_color();
            foreach ($color as $cl) {
                extract($cl);
        ?>
        <tr>
            <td><?=$color_name?></td>
            <td><a href="color.php?act=xoa&id=<?=$id_color?>"><button>xóa</button></a></td>
            <td><a href="update_color.php?act=sua&id=<?=$id_color?>"><button>sửa</button></a></td>
        </tr>
        <?php
            }
        ?>
    </table>
</body>
</html>