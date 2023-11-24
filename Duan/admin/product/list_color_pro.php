
<div class="content-1">
         <table class="table">
            <h2> <i class="fa-solid fa-shop"></i> Danh sách sản phẩm </h2>
            <thead>
              <tr>
                <th scope="col">Mã sản phẩm</th>
                <th scope="col">Ảnh</th>
                <th scope="col">Màu sản phẩm</th>
                <th scope="col">Số lượng</th>
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
                        <td><img width=50px src="../image_product/<?=$image?>" alt=""></td>
                        <td><?=$color_name?></td>
                        <td><?=$quantity?></td>
                        <td>
                        <a href="index.php?act=update_color_pro&id_clp=<?=$id_clp?>"><input type="button" value="Sửa"></a>
                        <a onclick="return confirm('Bạn có muốn xóa không !')" 
                        href="index.php?act=delete_color_pro&id_clp=<?=$id_clp?>&id_pro=<?=$id_pro?>">
                        <input type="button" value="xóa màu"></a>
                      </td>
                    </tr>
                <?php
                    }
                ?>
                <tr>
                  <td><a href="index.php?act=add_more_color&id=<?=$id_pro?>"><input type="button" value="Thêm" id=""></a></td>
                </tr>
              </tbody>
            </table>
            <form action="index.php?act=list_color_pro" method="POST">
            <?php
              for($i=0;$i<$count;$i++) { 
                
            ?>
                <input type="button" name="number" value="<?=$i+1?>">
            <?php
              }
            ?>
            </form>
       </div>