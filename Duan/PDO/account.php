<?php

function insert_account($user_name_register, $email_register, $pass_register)                                        // Tạo tài khoản
{
    $sql = "INSERT INTO user(user_name, email, pass) VALUES('$user_name_register', '$email_register', '$pass_register')";
    pdo_execute($sql);
}

function check_user($user_name_login, $pass_login){                                                        // Đăng Nhập: Nếu đúng pass thì sẽ đăng nhập được
    $sql ="SELECT * FROM user WHERE user_name='".$user_name_login."' AND pass='".$pass_login."'";
    $login = pdo_query_one($sql);
    return $login;
}   

?>