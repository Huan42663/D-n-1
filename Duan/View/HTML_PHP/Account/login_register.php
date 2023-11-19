<link rel="stylesheet" href="./Duan/View/HTML_PHP/Account/login_register.css">

<title>BlueTech - Tài khoản</title>
</head>

<body>
    <div class="thung_chua">
        <div class="khuon_thung_chua">
            <div class="signin-signup">
                <form action="#" class="sign-in-form">
                    <h2 class="thuong_hieu">BlueTech</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Tên Tài Khoản" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Mật Khẩu" />
                    </div>
                    <input type="submit" value="Đăng Nhập" class="nut solid" />
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
                <form action="#" class="sign-up-form">
                    <h2 class="thuong_hieu">BlueTech</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Tên Tài Khoản" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="email" placeholder="Email" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Mật Khẩu" />
                    </div>
                    <input type="submit" class="nut" value="Đăng Ký" />
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
                <img src="img/log.svg" class="image" alt="" />
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
                <img src="img/register.svg" class="image" alt="" />
            </div>
        </div>
    </div>

    <script src="./Duan/View/HTML_PHP/Account/login_register.js"></script>
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>