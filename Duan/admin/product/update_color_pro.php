<div class="from">
<h2><i class="fa-solid fa-shop"></i> Sửa đổi sản phẩm </h2>
<hr>
<div class="form-update">
    <?php
        extract($color_pro);
    ?>
    <form action="index.php?act=updated_color_pro" enctype="multipart/form-data" method="POST">
        <input type="hidden" name="id_clp" value="<?=$id_clp?>">
        <input type="hidden" name="id_pro" value="<?=$id_pro?>">
        <img width=100px src="../image_product/<?=$image?>" alt=""> <input type="file" name="img"><br><br>
        số lượng <input type="number" name="quantity" value="<?=$quantity?>" class="number"><br><br>
        màu
        <select name="id_color" id="" class="color">
            <?php
                foreach ($listcolor as $key => $value) {
            ?>
                <option <?php if($value['id_color'] == $id_color) echo 'selected'; ?>
                value="<?=$value['id_color']?>"><?=$value['color_name']?></option>
            <?php
                }
            ?>
        </select><br><br>
        <input type="submit" name="sua" value="Sửa" class="button">
    </form>
</div>
</div>