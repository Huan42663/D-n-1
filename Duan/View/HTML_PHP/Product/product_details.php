<!-- -------------------------------------------------------------------------------------------------------- Đường Dẫn Và Hiển Thị Số Sản Phẩm ------------ -->
<?php
extract($product);
$price_format = number_format($price, 0, '.', '.');
$discount_format = number_format($discount, 0, '.', '.');
if (isset($color_pro)) {
    $image = $color_pro['image'];
} else {
    $image = $img;
}
?>
<div class="container mt-3">
    <div class="row">

        <div class="col-md-12 mb-3">
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
                aria-label="breadcrumb">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none">Trang Chủ</a></li>
                    <li class="breadcrumb-item"><a href="index.php?act=product_lists" class="text-decoration-none">Chuột
                            Gaming</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <?= $pro_name ?>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<!-- -------------------------------------------------------------------------------------------------------- Ảnh Và Chi Tiết Sản Phẩm --------------------- -->
<div class="container mb-3" style="background-color: white; border-radius: 10px; box-shadow: 0px 0px 5px gainsboro;">

    <div class="row">

        <div class="col-md-6 col-xl-4 mb-3 mt-3">
            <div class="card" style="width: 100%;">
                <div class="collection-img position-relative image-containter">
                    <a href=""><img src="./Duan/image_product/<?= $image ?>" class="card-img-top" alt="..."></a>
                </div>
            </div>

            <!-- <div class="popup-image">
                <span>&times;</span>
                <img src="./Duan/image_product/<?= $image ?>">
            </div> -->
        </div>

        <div class="col-md-6 col-xl-8 mb-3 mt-3">
            <div class="card-body">
                <div class="product-title-details">
                    <?= $pro_name ?>
                </div>
                <div class="all-price-details d-flex flex-wrap">
                    <del>
                        <?= $price_format ?>đ
                    </del>
                    <span class="new-price-details">
                        <?= $discount_format ?>đ
                    </span>
                    <span class="product-percent-details">-30%</span>
                </div>

                <div class="all-product-details">
                    <span><strong>Hãng Sản Xuất: </strong>
                        <?= $brand_name ?>
                    </span>
                    <span><strong>Bảo Hành: </strong>12 Tháng</span>
                    <span><strong>Trạng Thái: </strong>Còn Hàng</span>
                    <?php
                    if (isset($color_pro)) {
                        ?>
                        <span><strong>Số Lượng: </strong>
                            <?= $color_pro['quantity'] ?>
                        </span>
                        <?php
                    }
                    ?>
                    <!-- <span><strong>Đã Bán: </strong>153</span> -->
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
                        <?php
                        foreach ($list_color as $lc) {
                            extract($lc);
                            ?>
                            <a href="index.php?act=product_details&id=<?= $id_pro ?>&color=<?= $id_color ?>"><button
                                    style="background-color:<?= $color_name ?>;color:red;">
                                    <?= $color_name ?>
                                </button></a>
                            <?php
                        }
                        ?>
                    </div>
                </div>
                <br>
                <div>
                    <?php
                    if (isset($color_pro)) {
                        ?>
                        <input type="number" name="quantity" min=0 max=<?= $color_pro['quantity'] ?>>
                        <?php
                    }
                    ?>
                </div>

                <div class="mt-3">
                    <form action="index.php?act=cart" method="post" class="form-submit">
                        <input type="hidden" name="id_pro" class="pid" value="<?= $id_pro ?>">
                        <input type="hidden" name="image" class="pimage" value="<?= $image ?>">
                        <input type="hidden" name="pro_name" class="pname" value="<?= $pro_name ?>">
                        <input type="hidden" name="price" class="poldprice" value="<?= $price ?>">
                        <input type="hidden" name="discount" class="pprice" value="<?= $discount ?>">
                        <input type="hidden" name="brand_name" class="brand_name" value="<?= $brand_name ?>">
                        <input class="btn" name="buy" type="submit" value="Mua Ngay">
                        <input class="btn" name="add_to_cart" type="submit" value="Thêm Vào Giỏ">
                    </form>
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
            <span>
                <?= $detail ?>
            </span>
        </div>

        <div class="col-md pb-3"
            style="background-color: white; border-radius: 10px; box-shadow: 0px 0px 5px gainsboro;">
            <h4 class="mt-2 mb-0"><strong>Sản Phẩm Cùng Loại</strong></h4>
            <div class="row">
                <?php
                foreach ($other_pro as $key => $value) {
                    ?>
                    <div class="col-12 col-md-6 col-lg-6 col-xl-6 mt-4">
                        <div class="card" style="width: 100%;">
                            <div class="collection-img position-relative">
                                <a href="index.php?act=product_details&id=<?= $value['id_pro'] ?>"><img
                                        src="./Duan/image_product/<?= $value['img'] ?>" class="card-img-top" alt="..."></a>
                                <span
                                    class="position-absolute bg-primary text-white d-flex align-items-center justify-content-center">-30%</span>
                            </div>
                            <div class="card-body">
                                <div class="product-title">
                                    <a href="index.php?act=product_details&id=<?= $value['id_pro'] ?>">
                                        <?= $value['pro_name'] ?>
                                    </a>
                                </div>
                                <div>
                                    <del class="old-price">
                                        <?= $value['price'] ?>đ
                                    </del>
                                    <span class="new-price">6.990.000đ</span>
                                </div>
                                <div>
                                    <span class="rate">5.0 </span><i class="star-rate fa-solid fa-star"></i>
                                    <span class="rate-quantity">(31 đánh giá)</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>

        </div>

    </div>

</div>

<!-- --------------------------------------------------------------------------------------------- Bình Luận ------------------------------------------------ -->
<div class="container mb-5" id="comments">

    <div class="row">

        <div class="col-md-12 me-3"
            style="background-color: white; border-radius: 10px; box-shadow: 0px 0px 5px gainsboro;">
            <h4 class="mt-2"><strong>Bình Luận Về Sản Phẩm</strong></h4>
            <table>
                <?php
                foreach ($comment as $key => $value) {
                    ?>
                    <tr>
                        <td><img width=30px height=30px style="border-radius:100px;"
                                src="./Duan/image_user/<?= $value['avatar'] ?>" alt=""></td>
                        <td>
                            <?= $value['user_name'] ?>
                        </td>
                        <td>
                            <?= $value['content'] ?>
                        </td>
                        <td>
                            <?= $value['date'] ?>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </table>
            <?php
            if (isset($_SESSION['user_name_login'])) {
                ?>
                <form action="index.php?act=comment" method="POST">
                    <input type="hidden" name="id_pro" value="<?= $id_pro ?>">
                    <input type="text" name="content" id="">
                    <input type="submit" name="btn_comment" value="Gửi">
                </form>
                <?php
            } else {
                echo "Đăng nhập để bình luận";
            }
            ?>
        </div>

    </div>

</div>

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script> -->

<!-- <script type="text/javascript">
    $(document).ready(function () {
        $(".addItemBtn").click(function (e) {
            e.preventDefault();
            var $form = $(this).closest(".form-submit");
            var pid = $form.find(".pid").val();
            var pname = $form.find(".pname").val();
            var pimage = $form.find(".pimage").val();
            var poldprice = $form.find(".poldprice").val();
            var pprice = $form.find(".pprice").val();

            $ajax({
                url: 'action.php',
                method: 'post',
                data: { pid: pid, pname: pname, pimage: pimage, poldprice: poldprice, pprice: pprice },
                success: function (response) {

                }
            });
        })
    });
</script> -->

<!-- <script>
    document.querySelectorAll('.image-containter img').forEach(image => {
        image.onclick = () => {
            document.querySelector('.popup-image').style.display = 'block';
            document.querySelector('.popup-image img').src = image.getAttribute('src');
        }
    });

    document.querySelector('.popup-image span').onclick = () => {
        document.querySelector('.popup-image').style.display = 'none';
    }
</script> -->