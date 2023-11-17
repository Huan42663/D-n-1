<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>BlueTech - Home</title>
  <!-- bootstrap css -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <!-- custom css -->
  <link rel="stylesheet" href="./Duan/View/CSS_JS/style2.css">
</head>

<body>
  <!-- navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-white py-2">
    <div class="container d-flex flex-wrap justify-content-between">
      <a class="navbar-brand d-flex justify-content-between align-items-center order-lg-0" href="./index.php">
        <span class="text-uppercase">BlueTech</span>
      </a>

      <div class="order-lg-2 nav-btns">
        <button type="button" class="btn position-relative">
          <i class="fa fa-search"></i>
        </button>
        <button type="button" class="btn position-relative">
          <i class="fa-solid fa-truck-fast"></i>
          <span class="position-absolute top-0 start-100 translate-middle badge bg-primary">1</span>
        </button>
        <button type="button" class="btn position-relative">
          <i class="fa fa-shopping-cart"></i>
          <span class="position-absolute top-0 start-100 translate-middle badge bg-primary">5</span>
        </button>

        <a href="./Duan/View/HTML_PHP/Login_Register/login_register.php"><button type="button" class="btn position-relative">
          <i class="fa-solid fa-circle-user"></i>
          <span class="position-absolute top-0 start-100 translate-middle badge bg-primary">2</span>
        </button></a>
      </div>

      <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-lg-1" id="navMenu">
        <ul class="navbar-nav mx-auto text-center">
          <li class="nav-item px-2 py-2">
            <a class="nav-link text-uppercase text-dark" href="#">danh mục</a>
          </li>
          <li class="nav-item px-2 py-2">
            <a class="nav-link text-uppercase text-dark" href="#collection">sản phẩm</a>
          </li>
          <li class="nav-item px-2 py-2">
            <a class="nav-link text-uppercase text-dark" href="#blogs">blogs</a>
          </li>
          <li class="nav-item px-2 py-2">
            <a class="nav-link text-uppercase text-dark" href="#about">giới thiệu</a>
          </li>
          <li class="nav-item px-2 py-2 border-0">
            <a class="nav-link text-uppercase text-dark" href="#popular">bán chạy</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>


  <!-- end of navbar -->