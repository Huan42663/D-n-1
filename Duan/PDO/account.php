<?php

    function insert_account($user_name_register, $email_register, $pass_register)                                        // Tạo tài khoản
    {
        $sql = "INSERT INTO user(user_name, email, pass) VALUES('$user_name_register', '$email_register', '$pass_register')";
        pdo_execute($sql);
    }

    function check_user($user_name_login, $pass_login)                                       // Đăng Nhập: Nếu đúng pass thì sẽ đăng nhập được
    {                                                       
        $sql = "SELECT * FROM user WHERE user_name='" . $user_name_login . "' AND pass='" . $pass_login . "'";
        $login = pdo_query_one($sql);
        return $login;
    }

    // function checkemail($email)
    // {
    //     $sql = "SELECT * FROM taikhoan WHERE email='" . $email . "'";                            // Quên mật khẩu: Nếu nhập đúng mail thì sẽ echo ra pass
    //     $dm = pdo_query_one($sql);
    //     return $dm;
    // }

    function update_account($id_user, $user_name, $pass, $email, $address, $tel, $avatar)            // Update: Chỉnh sửa thông tin tài khoản
    {
        $sql = "UPDATE user SET user_name='" . $user_name . "', pass='" . $pass . "',  email='" . $email . "', address='" . $address . "',
        tel='" . $tel . "', avatar='" . $avatar . "' WHERE id_user=" . $id_user;
        // echo $sql;die;
        pdo_execute($sql);
    }

    function load_all_account()                                                             // Load danh sách tài khoản người dùng ở Admin
    {      
        $sql = "SELECT * FROM user ORDER BY id_user DESC";
        $list_account = pdo_query($sql);
        return $list_account;
    }

    function delete_account($id_user)                                                       // Xóa tài khoản người dùng ở Admin
    {                 
        $sql = "DELETE FROM user WHERE id_user=" . $id_user;
        pdo_execute($sql);
    }

?>