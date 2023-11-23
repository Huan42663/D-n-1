
<div class="content-1">
         <table class="table">
            <h2> <i class="fa-solid fa-shop"></i> Danh sách sản phẩm </h2>
            <thead>
              <tr>
                <th scope="col">Mã sản phẩm</th>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Giá sản phẩm</th>
                <th scope="col">Giá khuyến mại</th>
                <th scope="col">Ảnh</th>
                <th scope="col">Lượt xem</th>
                <th scope="col">Mô tả</th>
                <th scope="col">Danh mục</th>
                <th scope="col">Hãng</th>
                <th scope="col">Ngày thêm</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($list_pro as $pro) {
                        extract($pro);
                ?>
                    <tr>
                        <th scope="row"><?=$id_pro?></th>
                        <td><?=$pro_name?></td>
                        <td><?=$price?></td>
                        <td><?=$discount?></td>
                        <td><img width=50px src="../image_product/<?=$img?>" alt=""></td>
                        <td><?=$view?></td>
                        <td><?=$detail?></td>
                        <td><?=$cate_name?></td>
                        <td><?=$brand_name?></td>
                        <td><?=$add_at?></td>
                        <td>
                        <a href="index.php?act=update_pro&id=<?=$id_pro?>"><input type="button" value="Sửa"></a>
                        <a onclick="return confirm('Bạn có muốn xóa không !')" href="index.php?act=delete_pro&id=<?=$id_pro?>">
                        <input type="button" value="Xóa sản phẩm"></a>
                        <a href="index.php?act=list_color_pro&id=<?=$id_pro?>"><input type="button" value="Danh sách màu"></a>
                      </td>
                    </tr>
                <?php
                    }
                ?>
                <tr>
                  <td><a href="index.php?act=add_pro"><input type="button" value="Thêm" id=""></a></td>
                </tr>
              </tbody>
            </table>
            <form action="index.php?act=list_product" method="POST">
            <?php
              for($i=0;$i<$count;$i++) { 
            ?>
                <input type="submit" name="number" value="<?=$i+1?>">
            <?php
              }
            ?>
            </form>
       </div>