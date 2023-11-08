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
    $id_cate = $_GET['id'];
    $cate = load_one_cate($id_cate);
    extract($cate);
}
?>
<body>
    <form action="" method="POST">
        <input type="hidden" name="id_cl" value="<?=$id_cate?>"> 
        màu <input type="text" name="name" value="<?=$cate_name?>">
        <input type="submit" name="sua" value="sửa">
    </form>
    <a href="list_cate.php"><button>Danh sách danh mục</button></a>
<?php
    if(isset($_POST['sua']) && $_POST['sua']){
        $id_cate = $_POST['id_cl'];
        $cate_name = $_POST['name'];
        update_cate($id_cate,$cate_name);
    }
?>
</body>
</html>