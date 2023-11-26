<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- bootstrap css -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <!-- custom css -->
  <link rel="stylesheet" href="./Duan/View/CSS_JS/style12.css">
</head>

<body>
  <!-- -------------------------------------------------------------------------------------------------------------------------- Tên Thương Hiệu ------------ -->
  <nav class="navbar navbar-expand-lg navbar-light bg-white py-2">
    <div class="container d-flex flex-wrap justify-content-between">
      <a class="navbar-brand d-flex justify-content-between align-items-center order-lg-0" href="index.php">
        <span class="text-uppercase">BlueTech</span>
      </a>

      <!-- -------------------------------------------------------------------------------------------------------------------- Icon Tiện Ích -------------- -->

      <div class="order-lg-2 nav-btns d-flex flex-wrap align-items-center">

        <button id="toggleThis" type="button" class="btn position-relative">
          <i class="fa fa-search"></i>
        </button>

        <a href="index.php?act=shipping_process"><button type="button" class="btn position-relative">
            <i class="fa-solid fa-truck-fast"></i>
            <span class="position-absolute top-0 start-100 translate-middle badge bg-primary">1</span>
          </button></a>

        <a href="index.php?act=cart_lists"><button type="button" class="btn position-relative">
            <i class="fa fa-shopping-cart"></i>
            <span class="position-absolute top-0 start-100 translate-middle badge bg-primary">5</span>
          </button></a>

        <a href="index.php?act=account"><button type="button" class="btn position-relative">
            <i class="fa-solid fa-circle-user"></i>
          </button></a>


        <!-- <div class="flex-shrink-0 dropdown d-flex flex-wrap">
          <a href="index.php?act=account"><button type="button" class="btn position-relative">
              <i class="fa-solid fa-circle-user"></i>
            </button></a>

          <div class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown"
            aria-expanded="false">

          </div>
          <ul class="dropdown-menu text-small shadow p-0">
            <div class="d-flex flex-wrap align-items-center justify-content-center">
              <img src="./Duan/View/Images/Razer Basilisk V3 Pro.webp" width="50px" class="rounded-circle" alt="">
              <p class="m-0">Xin Chào <strong>Chính</strong>!</p>
            </div>

            <li>
              <hr class="dropdown-divider" />
            </li>

            <li><a class="dropdown-item" href="#">Cài Đặt</a></li>

            <li>
              <a class="dropdown-item" href="#">Yêu Thích</a>
            </li>

            <li>
              <hr class="dropdown-divider m-0" />
            </li>

            <li><a class="dropdown-item" href="#">Đăng Xuất</a></li>
          </ul>
        </div> -->

      </div>

      <!-- -------------------------------------------------------------------------------------------------------------------- Icon Menu ------------------ -->
      <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- -------------------------------------------------------------------------------------------------------------------- Menu / Navbar -------------- -->
      <div class="collapse navbar-collapse order-lg-1" id="navMenu">
        <ul class="navbar-nav mx-auto text-center">
          <li class="nav-item px-2 py-2">
            <a class="nav-link text-uppercase text-dark" href="index.php?act=product_lists">danh mục</a>
          </li>
          <li class="nav-item px-2 py-2">
            <a class="nav-link text-uppercase text-dark" href="index.php#products">sản phẩm</a>
          </li>
          <li class="nav-item px-2 py-2">
            <a class="nav-link text-uppercase text-dark" href="index.php#about">giới thiệu</a>
          </li>
          <li class="nav-item px-2 py-2 border-0">
            <a class="nav-link text-uppercase text-dark" href="index.php#blogs">blogs</a>
          </li>
          <li class="nav-item px-2 py-2 border-0">
            <a class="nav-link text-uppercase text-dark" href="#">cách thanh toán</a>
          </li>
          <li class="nav-item px-2 py-2 border-0">
            <a class="nav-link text-uppercase text-dark" href="#">bảo hành</a>
          </li>
        </ul>
      </div>

    </div>

  </nav>



  <!-- ------------------------------------------------------------------------------------------------------------------------ Form Tìm Kiếm -------------- -->
  <div id="searchBox" class="container searchBox p-0 mb-4">
    <form action="index.php?act=product_lists" method="POST">
      <div class="input-group">
        <input type="search" name="kyw" class="form-control" placeholder="Tìm Kiếm Sản Phẩm...">
        <input class="searchBoxButton" type="submit" name="btn_search" value="Tìm">

        <!-- <button type="submit" name="btn_search">
        <i class="fa fa-search"></i>
      </button> -->
      </div>
    </form>
  </div>