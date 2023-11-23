 <div class="from">
<h2> <i class="fa-solid fa-shop"></i> Thêm màu sản phẩm </h2>
<hr>
<div class="form-add">
    <form action="" enctype="multipart/form-data" method="POST">
        <input type="hidden" name="id_pro">
        ảnh sản phẩm 
        <input type="file" name="img" id=""><br><br>
        số lượng 
        <input type="number" min="0" name="quantity" id="" class="number"><br><br>
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
        </select><br><br>
        <input type="submit" name="them" value="thêm" class="button">
    </form>
</div>
</div>