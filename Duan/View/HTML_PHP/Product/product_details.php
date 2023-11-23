<!-- -------------------------------------------------------------------------------------------------------- Đường Dẫn Và Hiển Thị Số Sản Phẩm ------------ -->

<div class="container mt-3">
    <div class="row">

        <div class="col-md-12 mb-3">
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
                aria-label="breadcrumb">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none">Trang Chủ</a></li>
                    <li class="breadcrumb-item"><a href="index.php?act=product_lists" class="text-decoration-none">Chuột
                            Gaming</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Razer Viper Ultimate - Mercury</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<!-- -------------------------------------------------------------------------------------------------------- Ảnh Và Chi Tiết Sản Phẩm --------------------- -->
<div class="container mb-3 d-flex flex-wrap justify-content-center"
    style="background-color: white; border-radius: 10px; box-shadow: 0px 0px 5px gainsboro;">

    <div class="row mt-3">

        <div class="col-md-6 col-xl-4 mb-3">
            <div class="card" style="width: 100%;">
                <div class="collection-img position-relative image-containter">
                    <a href=""><img src="./Duan/image_product/Razer Viper Ultimate with Charging Dock - Mercury.webp"
                            class="card-img-top" alt="..."></a>
                </div>
            </div>

            <div class="popup-image">
                <span>&times;</span>
                <img src="./Duan/image_product/Razer Viper Ultimate with Charging Dock - Mercury.webp">
            </div>
        </div>

        <div class="col-md-6 col-xl-8 mb-3">
            <div class="card-body">
                <div class="product-title-details">
                    Razer Viper Ultimate - Mercury
                </div>
                <div class="all-price-details d-flex flex-wrap">
                    <del>3.690.000đ</del>
                    <span class="new-price-details">2.390.000đ</span>
                    <span class="product-percent-details">-30%</span>
                </div>

                <div class="all-product-details">
                    <span><strong>Hãng Sản Xuất: </strong>Razer</span>
                    <span><strong>Bảo Hành: </strong>12 Tháng</span>
                    <span><strong>Trạng Thái: </strong>Còn Hàng</span>
                    <span><strong>Số Lượng: </strong>52</span>
                    <span><strong>Đã Bán: </strong>153</span>
                </div>
                <hr>
                <div>
                    <span class="rate-details">5.0 </span><i class="star-rate-details fa-solid fa-star"></i>
                    <span class="rate-quantity-details">(31 đánh giá)</span>
                    <a class="check-rate-details" href="#comments"><span>Xem đánh giá</span></a>
                </div>

                <div class="accompanying-services mt-2">
                    <span><i class="fa-solid fa-check"></i> Miễn phí giao hàng toàn quốc.</span>
                    <span><i class="fa-solid fa-check"></i> Hỗ trợ đổi mới trong 14 ngày.</span>
                    <span><i class="fa-solid fa-check"></i> Bảo hành chính hãng.</span>
                    <span><i class="fa-solid fa-check"></i> Trả Góp 0%.</span>
                </div>
                <hr>

                <div>
                    <!-- Màu cho ông Huân -->
                    <div>

                    </div>
                </div>


                <div class="mt-3">
                    <input class="btn" type="submit" value="Mua Ngay">
                    <input class="btn" type="submit" value="Thêm Vào Giỏ">
                </div>
            </div>
        </div>

    </div>
</div>

<!-- --------------------------------------------------------------------------------------------- Mô Tả Sản Phẩm Và Sản Phẩm Liên Quan -------------------- -->
<div class="container mb-3">

    <div class="row mt-3">

        <div class="col-md-7 me-3"
            style="background-color: white; border-radius: 10px; box-shadow: 0px 0px 5px gainsboro;">
            <h4 class="mt-2"><strong>Mô Tả Sản Phẩm</strong></h4>
            <span>aaa</span>
        </div>

        <div class="col-md" style="background-color: white; border-radius: 10px; box-shadow: 0px 0px 5px gainsboro;">
            <h4 class="mt-2"><strong>Sản Phẩm Cùng Loại</strong></h4>

        </div>

    </div>

</div>

<!-- --------------------------------------------------------------------------------------------- Bình Luận ------------------------------------------------ -->
<div class="container mb-5" id="comments">

    <div class="row">

        <div class="col-md-12 me-3"
            style="background-color: white; border-radius: 10px; box-shadow: 0px 0px 5px gainsboro;">
            <h4 class="mt-2"><strong>Bình Luận Về: </strong>Razer Viper Ultimate - Mercury</h4>

        </div>

    </div>

</div>

<script>
    document.querySelectorAll('.image-containter img').forEach(image => {
        image.onclick = () => {
            document.querySelector('.popup-image').style.display = 'block';
            document.querySelector('.popup-image img').src = image.getAttribute('src');
        }
    });

    document.querySelector('.popup-image span').onclick = () => {
        document.querySelector('.popup-image').style.display = 'none';
    }
</script>