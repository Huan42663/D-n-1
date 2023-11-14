<h2> <i class="fa-solid fa-shop"></i> Sửa đổi sản phẩm </h2>
<div class="form-update">
    <?php
        extract($color_pro);
    ?>
    <form action="index.php?act=updated_color_pro" enctype="multipart/form-data" method="POST">
        <input type="hidden" name="id_clp" value="<?=$id_clp?>">
        <input type="hidden" name="id_pro" value="<?=$id_pro?>">
        <img width=100px src="../image_product/<?=$image?>" alt=""> <input type="file" name="img"><br>
        số lượng <input type="number" name="quantity" value="<?=$quantity?>"><br>
        màu
        <select name="id_color" id="">
            <?php
                foreach ($listcolor as $key => $value) {
            ?>
                <option <?php if($value['id_color'] == $id_color) echo 'selected'; ?>
                value="<?=$value['id_color']?>"><?=$value['color_name']?></option>
            <?php
                }
            ?>
        </select><br>
        <input type="submit" name="sua" value="Sửa">
    </form>
</div>