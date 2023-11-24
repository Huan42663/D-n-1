<div class="content-1">
    <table class="table">
    <h2> <i class="fa-solid fa-shop"></i> Danh sách Bình Luận</h2>
    <thead>
        <tr>
        <th scope="col">Mã Bình luận</th>
        <th scope="col">Mã Sản Phẩm</th>
        <th scope="col">Mã Tài Khoản</th>
        <th scope="col">Nội Dung</th>
        <th scope="col">Ngày Bình Luận</th>
        <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ($list_comment as $cmt) {
                extract($cmt);
        ?>
            <tr>
                <th scope="row"><?=$id_cmt?></th>
                <td><?=$id_pro?></td>
                <td><?=$id_user?></td>
                <td><?=$content?></td>
                <td><?=$date?></td>
                <td>
                <a onclick="return confirm('Bạn có muốn xóa không !')" href="index.php?act=delete_comment&id=<?=$id_cmt?>">
                <input type="button" value="Xóa"></a>
                </td>
            </tr>
        <?php
            }
        ?>
        </tbody>
    </table>
    <form action="index.php?act=list_cate" method="POST">
    <?php
        for($i=0;$i<$count;$i++) { 
        
    ?>
        <input type="submit" name="number" value="<?=$i+1?>">
    <?php
        }
    ?>
    </form>
</div>