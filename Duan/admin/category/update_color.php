<div class="from">
<h2> <i class="fa-solid fa-shop"></i> Sửa Màu </h2>
<div class="form-update">
    <?php
        extract($color);
    ?>
    <form action="index.php?act=updated_color" enctype="multipart/form-data" method="POST">
        <input type="hidden" name="id_color" value="<?=$id_color?>">
         <h5>Tên màu <input type="text" name="color_name" value="<?=$color_name?>" class="name"></h5><br><br>
        <input type="submit" name="sua" value="Sửa" class="button">
    </form>
</div>
</div>