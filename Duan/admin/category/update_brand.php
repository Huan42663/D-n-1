<div class="from">
<h2> <i class="fa-solid fa-shop"></i> Sửa Hãng </h2>
<hr>
<div class="form-update">
    <?php
        extract($brand);
    ?>
    <form action="index.php?act=updated_brand" enctype="multipart/form-data" method="POST">
        <input type="hidden" name="id_brand" value="<?=$id_brand?>">
        <h5>Tên Loại <input type="text" name="brand_name" value="<?=$brand_name?>" class="name"></h5><br><br>
        <input type="submit" name="sua" value="Sửa" class="button">
    </form>
</div>
</div>