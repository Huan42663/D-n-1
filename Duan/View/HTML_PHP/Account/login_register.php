<link rel="stylesheet" href="./Duan/View/HTML_PHP/Account/login_register3.css">

<title>BlueTech - Tài khoản</title>
</head>

<body>
    <?php
    // if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //     // Khai báo mảng để chứa lỗi:
    //     $error = [];
    
    //     // Validate user_name:
    //     if (empty(trim($_POST['user_name']))) {
    //         $error['user_name']['required'] = 'Tên Tài Khoản Không Được Để Trống!';
    //     } else {
    //         if (strlen(trim($_POST['user_name'])) < 8) {
    //             $error['user_name']['min'] = 'Tên Tài Khoản Phải Lớn Hơn 8 Ký Tự!';
    //         }
    //     }
    
    //     // Validate email:
    //     if (empty(trim($_POST['email']))) {
    //         $error['email']['required'] = 'Email Không Được Để Trống!';
    //     } else {
    //         if (!filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL)) {
    //             $error['email']['invalid'] = 'Email Không Hợp Lệ!';
    //         }
    //     }
    
    //     // Validate pass:
    //     if (empty(trim($_POST['pass']))) {
    //         $error['pass']['required'] = 'Password Không Được Để Trống!';
    //     } else {
    //         if (strlen(trim($_POST['pass'])) <= 8) {
    //             $error['pass']['min'] = 'Password Phải Lớn Hơn Hoặc Bằng 8 Ký Tự!';
    //         }
    //     }
    // }
    
    if (isset($_POST['login'])) {
        $user_name_login = $_POST['user_name_login'];
        $pass_login = $_POST['pass_login'];
        $errorCount = 0;

        if (preg_match('/\s/', $user_name_login)) {
            $loi['user_name_login'] = "Tên Không Được Chứa Khoảng Trắng";
            $errorCount++;
        }
        if (strlen($user_name_login) == 0) {
            $loi['user_name_login'] = "Tên Không Được Đỏ Trống";
            $errorCount++;
        }
        if (strlen($pass_login) < 6) {
            $loi['pass_login'] = "Password Không Được Dưới 6 Ký Tự";
            $errorCount++;
        }

    }

    if (isset($_POST['register'])) {
        $user_name_register = $_POST['user_name_register'];
        $email_register = $_POST['email_register'];
        $pass_register = $_POST['pass_register'];
        $passRepeat_register = $_POST['passRepeat_register'];
        $errorCount = 0;

        if (preg_match('/\s/', $user_name_register)) {
            $loi['user_name_register'] = "Tên Không Được Chứa Khoảng Trắng";
            $errorCount++;
        }
        if (strlen($user_name_register) == 0) {
            $loi['user_name_register'] = "Tên Không Được Đỏ Trống";
            $errorCount++;
        }
        if (strlen($email_register) == 0) {
            $loi['email_register'] = "Email Không Được Đỏ Trống";
            $errorCount++;
        } elseif (!filter_var($email_register, FILTER_VALIDATE_EMAIL)) {
            $loi['email_register'] = "Định dạng Email không hợp lệ";
            $errorCount++;
        }
        if (strlen($pass_register) < 6) {
            $loi['pass_register'] = "Password Không Được Dưới 6 Ký Tự";
            $errorCount++;
        }
        if ($pass_register != $passRepeat_register) {
            $loi['passRepeat_register'] = "Nhập Lại Password Không Trùng Nhau";
            $errorCount++;
        }

    }


    ?>

    <div class="thung_chua">
        <div class="khuon_thung_chua">

            <div class="signin-signup">
                <form action="index.php?act=account" method="post" class="sign-in-form">
                    <h2 class="thuong_hieu">Đăng Nhập</h2>

                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Tên Tài Khoản" name="user_name_login"
                            value="<?php echo isset($_POST['user_name_login']) ? htmlspecialchars($_POST['user_name_login']) : ''; ?>" />
                    </div>
                    <span style="color: red; font-weight: bold;">
                        <?php echo (isset($loi['user_name_login'])) ? $loi['user_name_login'] : ""; ?>
                    </span>

                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Mật Khẩu" name="pass_login" />
                    </div>
                    <span style="color: red; font-weight: bold;">
                        <?php echo (isset($loi['pass_login'])) ? $loi['pass_login'] : ""; ?>
                    </span>

                    <input type="submit" name="login" value="Đăng Nhập" class="nut solid" />

                    <p class="social-text">Hoặc Đăng Nhập Bằng</p>
                    <div class="social-media">
                        <a href="#" class="social-icon">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-google"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>

                </form>

                <form action="index.php?act=account" method="post" class="sign-up-form">
                    <h2 class="thuong_hieu">Đăng Ký</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Tên Tài Khoản" name="user_name_register"
                            value="<?php echo isset($_POST['user_name_register']) ? htmlspecialchars($_POST['user_name_register']) : ''; ?>" />
                    </div>
                    <span style="color: red; font-weight: bold;">
                        <?php echo (isset($loi['user_name_register'])) ? $loi['user_name_register'] : ""; ?>
                    </span>

                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="text" placeholder="Email" name="email_register"
                            value="<?php echo isset($_POST['email_register']) ? htmlspecialchars($_POST['email_register']) : ''; ?>" />
                    </div>
                    <span style="color: red; font-weight: bold;">
                        <?php echo (isset($loi['email_register'])) ? $loi['email_register'] : ""; ?>
                    </span>

                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Mật Khẩu" name="pass_register" />
                    </div>
                    <span style="color: red; font-weight: bold;">
                        <?php echo (isset($loi['pass_register'])) ? $loi['pass_register'] : ""; ?>
                    </span>

                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Nhập Lại Mật Khẩu" name="passRepeat_register" />
                    </div>
                    <span style="color: red; font-weight: bold;">
                        <?php echo (isset($loi['passRepeat_register'])) ? $loi['passRepeat_register'] : ""; ?>
                    </span>

                    <input type="submit" name="register" class="nut" value="Đăng Ký" />

                    <p class="social-text">Hoặc Đăng Ký Bằng</p>
                    <div class="social-media">
                        <a href="#" class="social-icon">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-google"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-twitter"></i>
                        </a>

                        <a href="#" class="social-icon">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </form>

            </div>
        </div>

        <div class="panels-thung_chua">
            <div class="panel left-panel">
                <div class="content">
                    <h3>Chưa Có Tài Khoản?</h3>
                    <p>
                        Đăng ký để nhận những ưu đãi cho thành viên mới ngay hôm nay!
                    </p>
                    <button class="nut transparent" id="sign-up-nut">
                        Đăng Ký
                    </button>
                </div>
                <img src="./Duan/View/HTML_PHP/Account/img/b.svg" class="image" alt="" />
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <h3>Đã Có Tài Khoản?</h3>
                    <p>
                        Hãy đăng nhập để sử dụng các tính năng của chúng tôi.
                    </p>
                    <button class="nut transparent" id="sign-in-nut">
                        Đăng Nhập
                    </button>
                </div>
                <img src="./Duan/View/HTML_PHP/Account/img/sign_in.svg" class="image" alt="" />
            </div>
        </div>
    </div>

    <script src="./Duan/View/HTML_PHP/Account/login_register.js"></script>
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>