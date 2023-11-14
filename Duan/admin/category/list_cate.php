
<div class="content-1">
    <table class="table">
    <h2> <i class="fa-solid fa-shop"></i> Danh sách Loại</h2>
    <thead>
        <tr>
        <th scope="col">Mã Loại</th>
        <th scope="col">Tên Loại</th>
        <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ($list_cate as $cate) {
                extract($cate);
        ?>
            <tr>
                <th scope="row"><?=$id_cate?></th>
                <td><?=$cate_name?></td>
                <td>
                <a href="index.php?act=update_cate&id=<?=$id_cate?>"><input type="button" value="Sửa"></a>
                <a onclick="return confirm('Bạn có muốn xóa không !')" href="index.php?act=delete_cate&id=<?=$id_cate?>">
                <input type="button" value="Xóa"></a>
                </td>
            </tr>
        <?php
            }
        ?>
        <tr>
            <td><a href="index.php?act=add_cate"><input type="button" value="Thêm" id=""></a></td>
        </tr>
        </tbody>
    </table>
    <form action="index.php?act=list_cate" method="POST">
    <?php
        for($i=0;$i<$count_cate;$i++) { 
        
    ?>
        <input type="button" name="number_cate" value="<?=$i+1?>">
    <?php
        }
    ?>
    </form>
</div>
<div class="content-1">
    <table class="table">
    <h2> <i class="fa-solid fa-shop"></i> Danh sách Màu</h2>
    <thead>
        <tr>
        <th scope="col">Mã Màu</th>
        <th scope="col">Tên Màu</th>
        <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ($list_color as $color) {
                extract($color);
        ?>
            <tr>
                <th scope="row"><?=$id_color?></th>
                <td><?=$color_name?></td>
                <td>
                <a href="index.php?act=update_color&id=<?=$id_color?>"><input type="button" value="Sửa"></a>
                <a onclick="return confirm('Bạn có muốn xóa không !')" href="index.php?act=delete_color&id=<?=$id_color?>">
                <input type="button" value="Xóa"></a>
                </td>
            </tr>
        <?php
            }
        ?>
        <tr>
            <td><a href="index.php?act=add_color"><input type="button" value="Thêm" id=""></a></td>
        </tr>
        </tbody>
    </table>
    <form action="index.php?act=list_cate" method="POST">
    <?php
        for($i=0;$i<$count_color;$i++) { 
        
    ?>
        <input type="button" name="number_color" value="<?=$i+1?>">
    <?php
        }
    ?>
    </form>
</div>
<div class="content-1">
    <table class="table">
    <h2> <i class="fa-solid fa-shop"></i> Danh sách Hãng</h2>
    <thead>
        <tr>
        <th scope="col">Mã Hãng</th>
        <th scope="col">Tên Hãng</th>
        <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ($list_brand as $brand) {
                extract($brand);
        ?>
            <tr>
                <th scope="row"><?=$id_brand?></th>
                <td><?=$brand_name?></td>
                <td>
                <a href="index.php?act=update_brand&id=<?=$id_brand?>"><input type="button" value="Sửa"></a>
                <a onclick="return confirm('Bạn có muốn xóa không !')" href="index.php?act=delete_brand&id=<?=$id_brand?>">
                <input type="button" value="Xóa"></a>
                </td>
            </tr>
        <?php
            }
        ?>
        <tr>
            <td><a href="index.php?act=add_brand"><input type="button" value="Thêm" id=""></a></td>
        </tr>
        </tbody>
    </table>
</div>