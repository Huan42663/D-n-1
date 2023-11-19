<title>BlueTech - Trang Chủ</title>

<!-- slider -->
<div class="container pt-3">
  <div id="carouselExampleIndicators" class="col-12 carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
        aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
        aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
        aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="./Duan/View/Images/banner1.png" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="./Duan/View/Images/banner2.png" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="./Duan/View/Images/banner3.png" class="d-block w-100" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
      data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Trước</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
      data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Sau</span>
    </button>
  </div>
</div>

<script>
  // Thêm hiệu ứng mờ và thời gian chuyển ảnh mỗi 2 giây
  document.addEventListener('DOMContentLoaded', function () {
    var myCarousel = new bootstrap.Carousel(document.getElementById('carouselExampleIndicators'), {
      interval: 3000, // Thời gian chuyển ảnh mỗi 2 giây
      wrap: true // Cho phép chuyển đến ảnh đầu tiên sau khi đến ảnh cuối cùng
    });
  });
</script>

<style>
    .col{
      border: 1px solid red;
    }
  </style>

<div class="container py-5 d-flex flex-wrap justify-content-center">
  <div class="row p-0 ">
    
    <div class="col-md-6 col-lg-4 col-xl-3">
      <div class="card" style="width: 18rem;">
        <img src="./Duan/View/Images/Razer Basilisk V3 Pro.webp" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
            content.</p>
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-4 col-xl-3">
      <div class="card" style="width: 18rem;">
        <img src="./Duan/View/Images/Razer Basilisk V3 Pro.webp" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
            content.</p>
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-4 col-xl-3">
      <div class="card" style="width: 18rem;">
        <img src="./Duan/View/Images/Razer Basilisk V3 Pro.webp" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
            content.</p>
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-4 col-xl-3">
      <div class="card" style="width: 18rem;">
        <img src="./Duan/View/Images/Razer Basilisk V3 Pro.webp" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
            content.</p>
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-4 col-xl-3">
      <div class="card" style="width: 18rem;">
        <img src="./Duan/View/Images/Razer Basilisk V3 Pro.webp" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
            content.</p>
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
    </div>

  

  </div>
</div>

</div>
<!-- end of slider -->

<!-- SẢN PHẨM -->
<!-- <section id="collection" class="pt-5">
  <div class="container">
    <div class="title text-center">
      <h2 class="position-relative d-inline-block">SẢN PHẨM</h2>
    </div>

    <div class="row g-0">
      <div class="d-flex flex-wrap justify-content-center mt-2 filter-button-group">
        <button type="button" class="btn m-2 text-dark active-filter-btn" data-filter="*">
          Tất Cả
        </button>
        <button type="button" class="btn m-2 text-dark" data-filter=".new">
          Mới Nhất
        </button>
        <button type="button" class="btn m-2 text-dark" data-filter=".feat">
          Sắp Nhập Hàng
        </button>
      </div>

      <div class="collection-list mt-2 row gx-0">
        <div class="col-md-6 col-lg-4 col-xl-3 best border">
          <div class="collection-img position-relative">
            <img src="./Duan/View/Images/c_formal_gray_shirt.png" class="w-100" />
            <span class="position-absolute bg-primary text-white d-flex align-items-center justify-content-center">Giảm
              Giá</span>
          </div>
          <div class="text-center">
            <div class="rating mt-3">
              <span class="text-primary"><i class="fas fa-star"></i></span>
              <span class="text-primary"><i class="fas fa-star"></i></span>
              <span class="text-primary"><i class="fas fa-star"></i></span>
              <span class="text-primary"><i class="fas fa-star"></i></span>
              <span class="text-primary"><i class="fas fa-star"></i></span>
            </div>
            <p class="text-capitalize my-1">gray shirt</p>
            <span class="fw-bold">$ 45.50</span>
          </div>
        </div>

        <div class="col-md-6 col-lg-4 col-xl-3 feat border">
          <div class="collection-img position-relative">
            <img src="./Duan/View/Images/c_pant_girl.png" class="w-100" />
            <span
              class="position-absolute bg-primary text-white d-flex align-items-center justify-content-center">Mới</span>
          </div>
          <div class="text-center">
            <div class="rating mt-3">
              <span class="text-primary"><i class="fas fa-star"></i></span>
              <span class="text-primary"><i class="fas fa-star"></i></span>
              <span class="text-primary"><i class="fas fa-star"></i></span>
              <span class="text-primary"><i class="fas fa-star"></i></span>
              <span class="text-primary"><i class="fas fa-star"></i></span>
            </div>
            <p class="text-capitalize my-1">gray shirt</p>
            <span class="fw-bold">$ 45.50</span>
          </div>
        </div>

        <div class="col-md-6 col-lg-4 col-xl-3 new">
          <div class="collection-img position-relative">
            <img src="./Duan/View/Images/c_polo-shirt.png" class="w-100" />
            <span class="position-absolute bg-primary text-white d-flex align-items-center justify-content-center">Giảm
              Giá</span>
          </div>
          <div class="text-center">
            <div class="rating mt-3">
              <span class="text-primary"><i class="fas fa-star"></i></span>
              <span class="text-primary"><i class="fas fa-star"></i></span>
              <span class="text-primary"><i class="fas fa-star"></i></span>
              <span class="text-primary"><i class="fas fa-star"></i></span>
              <span class="text-primary"><i class="fas fa-star"></i></span>
            </div>
            <p class="text-capitalize my-1">gray shirt</p>
            <span class="fw-bold">$ 45.50</span>
          </div>
        </div>

        <div class="col-md-6 col-lg-4 col-xl-3 best">
          <div class="collection-img position-relative">
            <img src="./Duan/View/Images/c_shirt-girl.png" class="w-100" />
            <span class="position-absolute bg-primary text-white d-flex align-items-center justify-content-center">Giảm
              Giá</span>
          </div>
          <div class="text-center">
            <div class="rating mt-3">
              <span class="text-primary"><i class="fas fa-star"></i></span>
              <span class="text-primary"><i class="fas fa-star"></i></span>
              <span class="text-primary"><i class="fas fa-star"></i></span>
              <span class="text-primary"><i class="fas fa-star"></i></span>
              <span class="text-primary"><i class="fas fa-star"></i></span>
            </div>
            <p class="text-capitalize my-1">gray shirt</p>
            <span class="fw-bold">$ 45.50</span>
          </div>
        </div>

        <div class="col-md-6 col-lg-4 col-xl-3 feat border">
          <div class="collection-img position-relative">
            <img src="./Duan/View/Images/c_t-shirt_men.png" class="w-100" />
            <span class="position-absolute bg-primary text-white d-flex align-items-center justify-content-center">Giảm
              Giá</span>
          </div>
          <div class="text-center">
            <div class="rating mt-3">
              <span class="text-primary"><i class="fas fa-star"></i></span>
              <span class="text-primary"><i class="fas fa-star"></i></span>
              <span class="text-primary"><i class="fas fa-star"></i></span>
              <span class="text-primary"><i class="fas fa-star"></i></span>
              <span class="text-primary"><i class="fas fa-star"></i></span>
            </div>
            <p class="text-capitalize my-1">gray shirt</p>
            <span class="fw-bold">$ 45.50</span>
          </div>
        </div>

        <div class="col-md-6 col-lg-4 col-xl-3 p-2 new">
          <div class="collection-img position-relative">
            <img src="./Duan/View/Images/c_tunic-shirt_girl.png" class="w-100" />
            <span class="position-absolute bg-primary text-white d-flex align-items-center justify-content-center">Giảm
              Giá</span>
          </div>
          <div class="text-center">
            <div class="rating mt-3">
              <span class="text-primary"><i class="fas fa-star"></i></span>
              <span class="text-primary"><i class="fas fa-star"></i></span>
              <span class="text-primary"><i class="fas fa-star"></i></span>
              <span class="text-primary"><i class="fas fa-star"></i></span>
              <span class="text-primary"><i class="fas fa-star"></i></span>
            </div>
            <p class="text-capitalize my-1">gray shirt</p>
            <span class="fw-bold">$ 45.50</span>
          </div>
        </div>

        <div class="col-md-6 col-lg-4 col-xl-3 p-2 best">
          <div class="collection-img position-relative">
            <img src="./Duan/View/Images/c_undershirt.png" class="w-100" />
            <span class="position-absolute bg-primary text-white d-flex align-items-center justify-content-center">Giảm
              Giá</span>
          </div>
          <div class="text-center">
            <div class="rating mt-3">
              <span class="text-primary"><i class="fas fa-star"></i></span>
              <span class="text-primary"><i class="fas fa-star"></i></span>
              <span class="text-primary"><i class="fas fa-star"></i></span>
              <span class="text-primary"><i class="fas fa-star"></i></span>
              <span class="text-primary"><i class="fas fa-star"></i></span>
            </div>
            <p class="text-capitalize my-1">gray shirt</p>
            <span class="fw-bold">$ 45.50</span>
          </div>
        </div>

        <div class="col-md-6 col-lg-4 col-xl-3 p-2 feat">
          <div class="collection-img position-relative">
            <img src="./Duan/View/Images/c_western-shirt.png" class="w-100" />
            <span class="position-absolute bg-primary text-white d-flex align-items-center justify-content-center">Giảm
              Giá</span>
          </div>
          <div class="text-center">
            <div class="rating mt-3">
              <span class="text-primary"><i class="fas fa-star"></i></span>
              <span class="text-primary"><i class="fas fa-star"></i></span>
              <span class="text-primary"><i class="fas fa-star"></i></span>
              <span class="text-primary"><i class="fas fa-star"></i></span>
              <span class="text-primary"><i class="fas fa-star"></i></span>
            </div>
            <p class="text-capitalize my-1">gray shirt</p>
            <span class="fw-bold">$ 45.50</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section> -->
<!-- end of collection -->

<!-- special products -->
<section id="special" class="py-5">
  <div class="container">
    <div class="title text-center py-5">
      <h2 class="position-relative d-inline-block">KHUYẾN MÃI</h2>
    </div>

    <div class="special-list row g-0">
      <div class="col-md-6 col-lg-4 col-xl-3 p-2">
        <div class="special-img position-relative overflow-hidden">
          <img src="./Duan/View/Images/special_product_1.jpg" class="w-100" />
          <span class="position-absolute d-flex align-items-center justify-content-center text-primary fs-4">
            <i class="fas fa-heart"></i>
          </span>
        </div>
        <div class="text-center">
          <p class="text-capitalize mt-3 mb-1">gray shirt</p>
          <span class="fw-bold d-block">$ 45.50</span>
          <a href="#" class="btn btn-primary mt-3">Mua Ngay</a>
          <a href="#" class="btn btn-primary mt-3">Thêm</a>
        </div>
      </div>

      <div class="col-md-6 col-lg-4 col-xl-3 p-2">
        <div class="special-img position-relative overflow-hidden">
          <img src="./Duan/View/Images/special_product_2.jpg" class="w-100" />
          <span class="position-absolute d-flex align-items-center justify-content-center text-primary fs-4">
            <i class="fas fa-heart"></i>
          </span>
        </div>
        <div class="text-center">
          <p class="text-capitalize mt-3 mb-1">gray shirt</p>
          <span class="fw-bold d-block">$ 45.50</span>
          <a href="#" class="btn btn-primary mt-3">Mua Ngay</a>
          <a href="#" class="btn btn-primary mt-3">Thêm</a>
        </div>
      </div>

      <div class="col-md-6 col-lg-4 col-xl-3 p-2">
        <div class="special-img position-relative overflow-hidden">
          <img src="./Duan/View/Images/special_product_3.jpg" class="w-100" />
          <span class="position-absolute d-flex align-items-center justify-content-center text-primary fs-4">
            <i class="fas fa-heart"></i>
          </span>
        </div>
        <div class="text-center">
          <p class="text-capitalize mt-3 mb-1">gray shirt</p>
          <span class="fw-bold d-block">$ 45.50</span>
          <a href="#" class="btn btn-primary mt-3">Mua Ngay</a>
          <a href="#" class="btn btn-primary mt-3">Thêm</a>
        </div>
      </div>

      <div class="col-md-6 col-lg-4 col-xl-3 p-2">
        <div class="special-img position-relative overflow-hidden">
          <img src="./Duan/View/Images/special_product_4.jpg" class="w-100" />
          <span class="position-absolute d-flex align-items-center justify-content-center text-primary fs-4">
            <i class="fas fa-heart"></i>
          </span>
        </div>
        <div class="text-center">
          <p class="text-capitalize mt-3 mb-1">gray shirt</p>
          <span class="fw-bold d-block">$ 45.50</span>
          <a href="#" class="btn btn-primary mt-3">Mua Ngay</a>
          <a href="#" class="btn btn-primary mt-3">Thêm</a>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- end of special products -->

<!-- offers -->
<section id="offers" class="py-5">
  <div class="container">
    <div
      class="row d-flex align-items-center justify-content-center text-center justify-content-lg-start text-lg-start">
      <div class="offers-content">
        <span class="text-white">Siêu Khuyến Mãi!</span>
        <h2 class="mt-2 mb-4 text-white">Giảm Giá Tới 50%</h2>
        <a href="#" class="btn">Mua Ngay</a>
      </div>
    </div>
  </div>
</section>
<!-- end of blogs -->

<!-- blogs -->
<section id="blogs" class="py-5">
  <div class="container">
    <div class="title text-center py-5">
      <h2 class="position-relative d-inline-block">BLOGS MỚI NHẤT</h2>
    </div>

    <div class="row g-3">
      <div class="card border-0 col-md-6 col-lg-4 bg-transparent my-3">
        <img src="./Duan/View/Images/blog_1.jpg" alt="" />
        <div class="card-body px-0">
          <h4 class="card-title">
            Lorem ipsum, dolor sit amet consectetur adipisicing
          </h4>
          <p class="card-text mt-3 text-muted">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet
            aspernatur repudiandae nostrum dolorem molestias odio. Sit fugit
            adipisci omnis quia itaque ratione iusto sapiente reiciendis,
            numquam officiis aliquid ipsam fuga.
          </p>
          <p class="card-text">
            <small class="text-muted">
              <span class="fw-bold">Author: </span>John Doe
            </small>
          </p>
          <a href="#" class="btn">Read More</a>
        </div>
      </div>

      <div class="card border-0 col-md-6 col-lg-4 bg-transparent my-3">
        <img src="./Duan/View/Images/blog_2.jpg" alt="" />
        <div class="card-body px-0">
          <h4 class="card-title">
            Lorem ipsum, dolor sit amet consectetur adipisicing
          </h4>
          <p class="card-text mt-3 text-muted">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet
            aspernatur repudiandae nostrum dolorem molestias odio. Sit fugit
            adipisci omnis quia itaque ratione iusto sapiente reiciendis,
            numquam officiis aliquid ipsam fuga.
          </p>
          <p class="card-text">
            <small class="text-muted">
              <span class="fw-bold">Author: </span>John Doe
            </small>
          </p>
          <a href="#" class="btn">Read More</a>
        </div>
      </div>

      <div class="card border-0 col-md-6 col-lg-4 bg-transparent my-3">
        <img src="./Duan/View/Images/blog_3.jpg" alt="" />
        <div class="card-body px-0">
          <h4 class="card-title">
            Lorem ipsum, dolor sit amet consectetur adipisicing
          </h4>
          <p class="card-text mt-3 text-muted">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet
            aspernatur repudiandae nostrum dolorem molestias odio. Sit fugit
            adipisci omnis quia itaque ratione iusto sapiente reiciendis,
            numquam officiis aliquid ipsam fuga.
          </p>
          <p class="card-text">
            <small class="text-muted">
              <span class="fw-bold">Author: </span>John Doe
            </small>
          </p>
          <a href="#" class="btn">Read More</a>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- end of blogs -->

<!-- Giới Thiệu -->
<section id="about" class="py-5">
  <div class="container">
    <div class="row gy-lg-5 align-items-center">
      <div class="col-lg-6 order-lg-1 text-center text-lg-start">
        <div class="title pt-3 pb-4">
          <h2 class="position-relative d-inline-block ms-4">GIỚI THIỆU</h2>
        </div>
        <p class="lead text-muted">
          BlueTech - Một sàn thương mại điện tử về công nghệ
        </p>
        <p>
          Với mong muốn cung cấp những sản phẩm công nghệ uy tín và chất lượng nhất đến cho mọi người, chúng tôi
          luôn không ngừng học hỏi và cải tiến từ những phản hồi góp ý từ các bạn.
        </p>
      </div>
      <div class="col-lg-6 order-lg-0">
        <a href="#collection"><img src="./Duan/View/Images/banner_gioithieu.png"" class=" img-fluid" /></a>
      </div>
    </div>
  </div>
</section>
<!-- end of about us -->

<!-- popular -->
<section id="popular" class="py-5">
  <div class="container">
    <div class="title text-center pt-3 pb-5">
      <h2 class="position-relative d-inline-block ms-4">
        ĐƯỢC YÊU THÍCH NHẤT
      </h2>
    </div>

    <div class="row">
      <div class="col-md-6 col-lg-4 row g-3">
        <h3 class="fs-5">Top Rated</h3>
        <div class="d-flex align-items-start justify-content-start">
          <img src="./Duan/View/Images/top_rated_1.jpg" alt="" class="img-fluid pe-3 w-25" />
          <div>
            <p class="mb-0">Blue Shirt</p>
            <span>$ 20.00</span>
          </div>
        </div>
        <div class="d-flex align-items-start justify-content-start">
          <img src="./Duan/View/Images/top_rated_2.jpg" alt="" class="img-fluid pe-3 w-25" />
          <div>
            <p class="mb-0">Blue Shirt</p>
            <span>$ 20.00</span>
          </div>
        </div>
        <div class="d-flex align-items-start justify-content-start">
          <img src="./Duan/View/Images/top_rated_3.jpg" alt="" class="img-fluid pe-3 w-25" />
          <div>
            <p class="mb-0">Blue Shirt</p>
            <span>$ 20.00</span>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-lg-4 row g-3">
        <h3 class="fs-5">Best Selling</h3>
        <div class="d-flex align-items-start justify-content-start">
          <img src="./Duan/View/Images/best_selling_1.jpg" alt="" class="img-fluid pe-3 w-25" />
          <div>
            <p class="mb-0">Blue Shirt</p>
            <span>$ 20.00</span>
          </div>
        </div>
        <div class="d-flex align-items-start justify-content-start">
          <img src="./Duan/View/Images/best_selling_2.jpg" alt="" class="img-fluid pe-3 w-25" />
          <div>
            <p class="mb-0">Blue Shirt</p>
            <span>$ 20.00</span>
          </div>
        </div>
        <div class="d-flex align-items-start justify-content-start">
          <img src="./Duan/View/Images/best_selling_3.jpg" alt="" class="img-fluid pe-3 w-25" />
          <div>
            <p class="mb-0">Blue Shirt</p>
            <span>$ 20.00</span>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-lg-4 row g-3">
        <h3 class="fs-5">Giảm Giá</h3>
        <div class="d-flex align-items-start justify-content-start">
          <img src="./Duan/View/Images/on_sale_1.jpg" alt="" class="img-fluid pe-3 w-25" />
          <div>
            <p class="mb-0">Blue Shirt</p>
            <span>$ 20.00</span>
          </div>
        </div>
        <div class="d-flex align-items-start justify-content-start">
          <img src="./Duan/View/Images/on_sale_2.jpg" alt="" class="img-fluid pe-3 w-25" />
          <div>
            <p class="mb-0">Blue Shirt</p>
            <span>$ 20.00</span>
          </div>
        </div>
        <div class="d-flex align-items-start justify-content-start">
          <img src="./Duan/View/Images/on_sale_3.jpg" alt="" class="img-fluid pe-3 w-25" />
          <div>
            <p class="mb-0">Blue Shirt</p>
            <span>$ 20.00</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- end of popular -->

<!-- newsletter -->
<section id="newsletter" class="py-5">
  <div class="container">
    <div class="d-flex flex-column align-items-center justify-content-center">
      <div class="title text-center pt-3 pb-5">
        <h2 class="position-relative d-inline-block ms-4">
          ĐĂNG KÝ HỘI VIÊN
        </h2>
      </div>

      <p class="text-center text-muted">
        Chúng tôi sẽ gửi những thông tin mới nhất về các sản phẩm và dịch vụ
        khuyến mãi cho bạn qua Email, hãy đón chờ nhé!
      </p>
      <div class="input-group mb-3 mt-3">
        <input type="text" class="form-control" placeholder="Nhập Email..." />
        <button class="btn btn-primary" type="submit">Đăng Ký</button>
      </div>
    </div>
  </div>
</section>
<!-- end of newsletter -->

<!-- Scroll To Top -->
<a href="#" class="to-top" onclick="scrollToTop();"><i class="fa-solid fa-angle-up"></i></a>
<!-- End Scroll To Top -->
<script type="text/javascript">
  window.addEventListener("scroll", function () {
    var scroll = document.querySelector(".to-top");
    scroll.classList.toggle("active", window.scrollY > 500);
  });

  function scrollToTop() {
    window.scrollTo({
      top: 0,
      behavior: "smooth",
    });
  }
</script>