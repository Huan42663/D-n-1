<h2> <i class="fa-solid fa-shop"></i> Sửa đổi sản phẩm </h2>
<div class="form-update">
    <?php
        extract($product);
    ?>
    <form action="index.php?act=updated_pro" enctype="multipart/form-data" method="POST">
        tên sản phẩm <input type="text" name="name" value="<?=$pro_name?>"><br>
        giá sản phẩm <input type="text" name="price" value="<?=$price?>"><br>
        <img width=100px src="../image_product/<?=$image?>" alt=""> <input type="file" name="img"><br>
        mô tả <textarea name="detail" id="" cols="30" rows="10"><?=$detail?></textarea><br>
        số lượng <input type="number" name="quantity" value="<?=$quantity?>"><br>
        màu
        <select name="color" id="">
            <?php
                foreach ($listcolor as $key => $value) {
            ?>
                <option <?php if($value['id_color'] == $id_color) echo 'selected'; ?>
                value="<?=$value['id_color']?>"><?=$value['color_name']?></option>
            <?php
                }
            ?>
        </select><br>
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
        </select><br>
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
        </select><br>
        <input type="submit" name="sua" value="Sửa">
    </form>
</div>