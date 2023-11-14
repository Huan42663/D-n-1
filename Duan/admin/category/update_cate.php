<h2> <i class="fa-solid fa-shop"></i> Sửa Loại </h2>
<div class="form-update">
    <?php
        extract($category);
    ?>
    <form action="index.php?act=updated_cate" enctype="multipart/form-data" method="POST">
        <input type="hidden" name="id_cate" value="<?=$id_cate?>">
        tên Loại <input type="text" name="cate_name" value="<?=$cate_name?>"><br>
        <input type="submit" name="sua" value="Sửa">
    </form>
</div>