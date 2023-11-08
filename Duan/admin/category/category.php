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
    <form action="" enctype="multipart/form-data" method="POST">
        <input type="hidden" name="id_cate" id="">
        tên danh mục <input type="text" name="name" id="">   
        <input type="submit" name="them" value="thêm">
    </form>
    <a href="list_cate.php"><button>Danh sách danh mục</button></a>
    <?php

        if(isset($_POST['them']) && $_POST['them']){
            $name = $_POST['name'];
            add_cate($name);
        }
        if(isset($_GET['act'])){
            $id_cate = $_GET['id'];
            $act = $_GET['act'];
            if($act == "xoa"){
                delete_cate($id_cate);
            }
        }else {
            echo "";
        }
    ?>
</body>
</html>