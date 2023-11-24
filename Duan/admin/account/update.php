<div class="from">
<h2> <i class="fa-solid fa-shop"></i> Sửa Tài Khoản </h2>
<hr>
<div class="form-update">
    <?php
        extract($account);
    ?>
    <form action="index.php?act=updated_account" enctype="multipart/form-data" method="POST">
        <input type="hidden" name="id_user" value="<?=$id_user?>">
        <h5>Tên Đăng Nhập <input type="text" name="user_name" value="<?=$user_name?>" class="name"></h5><br><br>
        <h5>PassWord <input type="text" name="pass" value="<?=$pass?>" class="name"></h5><br><br>
        <h5>Email <input type="text" name="email" value="<?=$email?>" class="name"></h5><br><br>
        <h5>Địa Chỉ <input type="text" name="address" value="<?=$address?>" class="name"></h5><br><br>
        <h5>Số Điện Thoại <input type="text" name="tel" value="<?=$tel?>" class="name"></h5><br><br>
        <h5><img src="./Duan/image_user/<?=$avatar?>" alt=""> <input type="file" name="avatar" class="name"></h5><br><br>
        <h5>Chức Vụ <select name="role" id="">
            <?php
                if($_SESSION['user_name_login'] == 2){
            ?>
                    <option value="2">Manager</option>
            <?php
                }
            ?>
            <option value="1">Admin</option>
            <option value="0">User</option>
        </select></h5><br><br>
        <input type="submit" name="sua" value="Sửa" class="button">
    </form>
</div>
</div>