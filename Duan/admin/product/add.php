<h2> <i class="fa-solid fa-shop"></i> Thêm sản phẩm </h2>
<div class="form-add">
    <form action="" enctype="multipart/form-data" method="POST">
        tên sản phẩm <input type="text" name="name" id=""><br>
        giá sản phẩm <input type="text" name="price" id=""><br>
        ảnh sản phẩm <input type="file" name="img" id=""><br>
        mô tả <input type="text" name="detail" id=""><br>
        số lượng <input type="number" name="quantity" id=""><br>
        màu
        <select name="color" id="">
            <?php
                foreach ($listcolor as $cl) {
                    extract($cl);
            ?>
                <option value="<?=$id_color?>"><?=$color_name?></option>
            <?php
                }
            ?>
        </select><br>
        hãng
        <select name="brand" id="">
            <?php
                foreach ($listbrand as $br) {
                    extract($br);
            ?>
                <option value="<?=$id_brand?>"><?=$brand_name?></option>
            <?php
                }
            ?>
        </select><br>
        danh mục
        <select name="cate" id="">
            <?php
                foreach ($listcate as $ct) {
                    extract($ct);
            ?>
                <option value="<?=$id_cate?>"><?=$cate_name?></option>
            <?php
                }
            ?>
        </select><br>
        <input type="submit" name="them" value="thêm">
    </form>
</div>