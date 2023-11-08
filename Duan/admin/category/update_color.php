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
<?php
if ($_GET['act']){
    $id_color = $_GET['id'];
    $color = load_one_color($id_color);
    extract($color);
}
?>
<body>
    <form action="" method="POST">
        <input type="hidden" name="id_cl" value="<?=$id_color?>"> 
        màu <input type="text" name="name" value="<?=$color_name?>">
        <input type="submit" name="sua" value="sửa">
    </form>
    <a href="list_color.php"><button>Danh sách màu</button></a>
<?php
    if(isset($_POST['sua']) && $_POST['sua']){
        $id_color = $_POST['id_cl'];
        $name = $_POST['name'];
        update_color($name,$id_color);
    }
?>
</body>
</html>