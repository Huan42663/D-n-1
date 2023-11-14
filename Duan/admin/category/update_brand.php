<h2> <i class="fa-solid fa-shop"></i> Sửa Hãng </h2>
<div class="form-update">
    <?php
        extract($brand);
    ?>
    <form action="index.php?act=updated_brand" enctype="multipart/form-data" method="POST">
        <input type="hidden" name="id_brand" value="<?=$id_brand?>">
        tên Loại <input type="text" name="brand_name" value="<?=$brand_name?>"><br>
        <input type="submit" name="sua" value="Sửa">
    </form>
</div>