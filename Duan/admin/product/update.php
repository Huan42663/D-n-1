<div class="from">
<h2> <i class="fa-solid fa-shop"></i> Sửa đổi sản phẩm </h2>
<hr>
<div class="form-update">
    <?php
        extract($product);
    ?>
    <form action="index.php?act=updated_pro" enctype="multipart/form-data" method="POST">
        <input type="hidden" name="id_pro" value="<?=$id_pro?>">
        <h5>Tên sản phẩm <input type="text" name="name" value="<?=$pro_name?>" class="name"></h5><br><br>
        <h5>Giá sản phẩm <input type="text" name="price" value="<?=$price?>" class="name"></h5><br><br>
        <img width=100px src="../image_product/<?=$img?>" alt=""> <input type="file" name="img"><br><br>
        <h5>mô tả </h5><textarea name="detail" id="" cols="30" rows="10" class="mota"><?=$detail?></textarea><br><br>
        hãng
        <select name="brand" id="">
            <?php
                foreach ($listbrand as $key => $value) {
            ?>
                <option <?php if($value['id_brand'] == $id_brand) echo 'selected'; ?>
                value="<?=$value['id_brand']?>"><?=$value['brand_name']?></option>
            <?php
                }
            ?>
        </select><br><br>
        danh mục
        <select name="cate" id="">
            <?php
                foreach ($listcate as $key => $value) {
            ?>
                <option <?php if($value['id_cate'] == $id_cate) echo 'selected'; ?>
                value="<?=$value['id_cate']?>"><?=$value['cate_name']?></option>
            <?php
                }
            ?>
        </select><br><br>
        <input type="submit" name="sua" value="Sửa" class="button">
    </form>
</div>
</div>