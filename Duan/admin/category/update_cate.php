<div class="from">
<h2> <i class="fa-solid fa-shop"></i> Sửa Loại </h2>
<hr>
<div class="form-update">
    <?php
        extract($category);
    ?>
    <form action="index.php?act=updated_cate" enctype="multipart/form-data" method="POST">
        <input type="hidden" name="id_cate" value="<?=$id_cate?>">
        <h5>Tên Loại <input type="text" name="cate_name" value="<?=$cate_name?>" class="name"></h5><br><br>
        <input type="submit" name="sua" value="Sửa" class="button">
    </form>
</div>
</div>