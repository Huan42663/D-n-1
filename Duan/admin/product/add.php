<div class="from">
<h2><i class="fa-solid fa-shop"></i> Thêm sản phẩm </h2>
<hr>
<div class="form-add">
    <form action="" enctype="multipart/form-data" method="POST">
        <h5><input placeholder=" Tên sản phẩm..." type="text" name="name" id="" class="name"></h5><br><br>
        <h5><input placeholder=" Giá sản phẩm..." type="text" name="price" id=""class="name"></h5><br><br>
        ảnh sản phẩm<input type="file" name="img" id=""><br><br>
        <textarea placeholder="mô tả " name="detail" id="" cols="30" rows="10" class="mota"></textarea><br><br>
        <input placeholder="số lượng " type="number" min="1" name="quantity" id="" class="number"><br><br>
        màu
        <select name="color" id="" class="color">
            <?php
                foreach ($listcolor as $cl) {
                    extract($cl);
            ?>
                <option value="<?=$id_color?>"><?=$color_name?></option>
            <?php
                }
            ?>
        </select><br><br>
        hãng
        <select name="brand" id="" >
            <?php
                foreach ($listbrand as $br) {
                    extract($br);
            ?>
                <option value="<?=$id_brand?>"><?=$brand_name?></option>
            <?php
                }
            ?>
        </select><br><br>
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
        </select><br><br>
        <input type="submit" name="them" value="thêm">
    </form>
    </div>
</div>