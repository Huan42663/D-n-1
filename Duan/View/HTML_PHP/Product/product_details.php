<style>
    .side_banner1 {
        position: fixed;
        width: 10%;
        margin-top: 16px;
        left: 40px;
        border-radius: 5px;
        z-index: 5;
        box-shadow: 0px 0px 5px gray;
    }

    .side_banner2 {
        position: fixed;
        width: 10%;
        margin-top: 16px;
        right: 40px;
        border-radius: 5px;
        z-index: 5;
        box-shadow: 0px 0px 5px gray;
    }
</style>
<img class="side_banner1" src="./Duan/View/Images/side_banner1.png" alt="">
<img class="side_banner2" src="./Duan/View/Images/side_banner2.png" alt="">

<!-- -------------------------------------------------------------------------------------------------------- Đường Dẫn Và Hiển Thị Số Sản Phẩm ------------ -->
<?php
extract($product);
$price_format = number_format($price, 0, '.', '.');
$discount_format = number_format($discount, 0, '.', '.');
$sale = 100 - ($discount / ($price / 100));
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
                    <li class="breadcrumb-item"><a href="index.php?act=product_lists" class="text-decoration-none"><?=$cate_name?></a></li>
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
                    <?php
                    if ($discount != 0) {
                        ?>
                        <del>
                            <?= $price_format ?>đ
                        </del>
                        <span class="new-price-details">
                            <?= $discount_format ?>đ
                        </span>
                        <span class="product-percent-details">-
                            <?= $sale ?>%
                        </span>
                        <?php
                    } else {
                        ?>
                        <span class="new-price-details">
                            <?= $price_format ?>đ
                        </span>
                        <?php
                    }
                    ?>
                </div>

                <div class="all-product-details">
                    <span><strong>Hãng Sản Xuất: </strong>
                        <?= $brand_name ?>
                    </span>
                    <span><strong>Bảo Hành: </strong>12 Tháng</span>
                    <span><strong>Trạng Thái: </strong>
                        <?php
                        if (isset($color_pro)) {
                            if ($color_pro['quantity'] <= 0) {
                                echo 'Hết hàng';
                            } else {
                                echo 'Còn hàng';
                            }

                        }
                        ?>
                    </span>
                    <?php
                    if (isset($color_pro)) {
                        if ($color_pro['quantity'] != 0) {
                            ?>
                            <span><strong>Số Lượng: </strong>
                                <?= $color_pro['quantity'] ?>
                            </span>
                            <?php
                        }
                        if (is_array($sold)) {
                            ?>
                            <span><strong>Đã Bán: </strong>
                                <?= $sold['sold'] ?>
                            </span>
                            <?php
                        } else {
                            ?>
                            <span><strong>Đã Bán: </strong>0</span>
                            <?php
                        }
                    }

                    ?>
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
                        <span><strong>Màu Sắc: </strong>
                            <br>
                            <?php
                            foreach ($list_color as $lc) {
                                extract($lc);
                                ?>
                                <a href="index.php?act=product_details&id=<?= $id_pro ?>&color=<?= $id_color ?>"><button
                                        style="width:30px;height:30px;border-radius:50%;background-color:<?= $color_name ?>;"></button></a>
                                <?php
                            }
                            ?>
                    </div>
                </div>

                <form action="index.php?act=cart" method="post" class="form-submit">
                    <?php
                    if (isset($color_pro)) {
                        ?>
                        <div class="d-flex flex-wrap align-items-center mt-2">
                            <strong style="font-size: x-large; margin-right: 10px;">Số Lượng:</strong><input
                                style="text-align: center;" type="number" name="quantity" min=1
                                max=<?= $color_pro['quantity'] ?> value="1">
                        </div>
                        <?php
                    }
                    ?>

                    <div class="mt-3">
                        <?php
                        if (isset($color_pro)) {
                            ?>
                            <input type="hidden" name="id_clp" class="pid" value="<?= $color_pro['id_clp'] ?>">
                            <?php
                        }
                        ?>
                        <input type="hidden" name="id_pro" class="pid" value="<?= $id_pro ?>">
                        <input class="btn" name="buy" type="submit" value="Mua Ngay">
                        <input class="btn" name="add_to_cart" type="submit" value="Thêm Vào Giỏ">
                    </div>
                </form>
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
                    $price_other_format = number_format($value['price'], 0, '.', '.');
                    $discount_other_format = number_format($value['discount'], 0, '.', '.');
                    $sale_other = 100 - ($value['discount'] / ($value['price'] / 100));
                    ?>
                    <div class="col-6 col-md-6 col-lg-6 col-xl-6 mt-4">
                        <div class="card" style="width: 100%;">
                            <div class="collection-img position-relative">
                                <a href="index.php?act=product_details&id=<?= $value['id_pro'] ?>"><img
                                        src="./Duan/image_product/<?= $value['img'] ?>" class="card-img-top" alt="..."></a>
                                <?php
                                if ($value['discount'] > 0) {
                                    ?>
                                    <span
                                        class="position-absolute bg-primary text-white d-flex align-items-center justify-content-center">-
                                        <?= $sale_other ?>%
                                    </span>
                                    <?php
                                }
                                ?>
                            </div>
                            <div class="card-body">
                                <div class="product-title">
                                    <a href="index.php?act=product_details&id=<?= $value['id_pro'] ?>">
                                        <?= $value['pro_name'] ?>
                                    </a>
                                </div>
                                <div>
                                    <?php
                                    if ($value['discount'] > 0) {
                                        ?>
                                        <del class="old-price">
                                            <?= $price_other_format ?>đ
                                        </del>
                                        <span class="new-price">
                                            <?= $discount_other_format ?>đ
                                        </span>
                                        <?php
                                    } else {
                                        ?>
                                        <span class="new-price">
                                            <?= $price_other_format ?>đ
                                        </span>
                                        <?php
                                    }
                                    ?>
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
<div class="container p-0" style="background-color: white; border-radius: 10px; box-shadow: 0px 0px 5px gainsboro;">
    <div class="card" id="comments">
        <div class="card-header">Đánh Giá & Bình Luận về <strong>
                <?= $pro_name ?>
            </strong></div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-4 text-center">
                    <h1 class="text-warning mt-4 mb-4">
                        <b><span id="average_rating">0.0</span> / 5</b>
                    </h1>
                    <div class="mb-3">
                        <i class="fas fa-star star-light mr-1 main_star"></i>
                        <i class="fas fa-star star-light mr-1 main_star"></i>
                        <i class="fas fa-star star-light mr-1 main_star"></i>
                        <i class="fas fa-star star-light mr-1 main_star"></i>
                        <i class="fas fa-star star-light mr-1 main_star"></i>
                    </div>
                    <h3><span id="total_review">0</span> Đánh Giá</h3>
                </div>
                <div class="col-sm-4">
                    <p>
                    <div class="progress-label-left"><b>5</b> <i class="fas fa-star text-warning"></i></div>

                    <div class="progress-label-right">(<span id="total_five_star_review">0</span>)</div>
                    <div class="progress">
                        <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0"
                            aria-valuemax="100" id="five_star_progress"></div>
                    </div>
                    </p>
                    <p>
                    <div class="progress-label-left"><b>4</b> <i class="fas fa-star text-warning"></i></div>

                    <div class="progress-label-right">(<span id="total_four_star_review">0</span>)</div>
                    <div class="progress">
                        <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0"
                            aria-valuemax="100" id="four_star_progress"></div>
                    </div>
                    </p>
                    <p>
                    <div class="progress-label-left"><b>3</b> <i class="fas fa-star text-warning"></i></div>

                    <div class="progress-label-right">(<span id="total_three_star_review">0</span>)</div>
                    <div class="progress">
                        <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0"
                            aria-valuemax="100" id="three_star_progress"></div>
                    </div>
                    </p>
                    <p>
                    <div class="progress-label-left"><b>2</b> <i class="fas fa-star text-warning"></i></div>

                    <div class="progress-label-right">(<span id="total_two_star_review">0</span>)</div>
                    <div class="progress">
                        <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0"
                            aria-valuemax="100" id="two_star_progress"></div>
                    </div>
                    </p>
                    <p>
                    <div class="progress-label-left"><b>1</b> <i class="fas fa-star text-warning"></i></div>

                    <div class="progress-label-right">(<span id="total_one_star_review">0</span>)</div>
                    <div class="progress">
                        <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0"
                            aria-valuemax="100" id="one_star_progress"></div>
                    </div>
                    </p>
                </div>
                <div class="col-sm-4 text-center">
                    <h3 class="mt-4 mb-3">Viết Đánh Giá</h3>
                    <button type="button" name="add_review" id="add_review" class="btn btn-primary"
                        value="Đánh Giá">Đánh Giá</button>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-5" id="review_content"></div>
</div>

<div id="review_modal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Đánh Giá Của Bạn</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" name="close_review"
                    id="close_review">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h4 class="text-center mt-2 mb-4">
                    <i class="fas fa-star star-light submit_star mr-1 p-1" id="submit_star_1" data-rating="1"></i><i
                        class="fas fa-star star-light submit_star mr-1 p-1" id="submit_star_2" data-rating="2"></i><i
                        class="fas fa-star star-light submit_star mr-1 p-1" id="submit_star_3" data-rating="3"></i><i
                        class="fas fa-star star-light submit_star mr-1 p-1" id="submit_star_4" data-rating="4"></i><i
                        class="fas fa-star star-light submit_star mr-1 p-1" id="submit_star_5" data-rating="5"></i>
                </h4>
                <div class="form-group mb-3">
                    <input type="text" name="user_name" id="user_name" class="form-control"
                        placeholder="Nhập Tên Của Bạn" />
                </div>
                <div class="form-group">
                    <textarea name="user_review" id="user_review" class="form-control"
                        placeholder="Đánh Giá"></textarea>
                </div>
                <div class="form-group text-center mt-4">
                    <input type="submit" class="btn btn-primary" id="save_review" value="Gửi"></input>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .progress-label-left {
        float: left;
        margin-right: 0.5em;
        line-height: 1em;
    }

    .progress-label-right {
        float: right;
        margin-left: 0.3em;
        line-height: 1em;
    }

    .star-light {
        color: #e9ecef;
        cursor: pointer;
    }

    /* #review_modal {
        display: flex;
        align-items: center;
        justify-content: center;
    } */

    .modal-dialog {
        max-width: 600px;
        top: 30%;
    }

    .close {
        position: absolute;
        top: 10px;
        right: 20px;
        background-color: white;
        border: 0;
        font-size: x-large;
    }

    .icon_user_cmt {
        background-color: #00b3ff;
        border-radius: 100%;
        width: 70px;
        height: 70px;
        display: flex;
        justify-content: center;
        align-items: center;
        box-shadow: 0px 0px 5px black;
    }

    .icon_user_cmt h3 {
        line-height: 0;
        margin: 0;

    }
</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>

<script>
    var rating_data = 0;

    $('#add_review').click(function () {

        $('#review_modal').modal('show');

    });

    $('#close_review').click(function () {

        $('#review_modal').modal('hide');

    });

    $(document).on('mouseenter', '.submit_star', function () {

        var rating = $(this).data('rating');

        reset_background();

        for (var count = 1; count <= rating; count++) {

            $('#submit_star_' + count).addClass('text-warning');

        }

    });

    function reset_background() {
        for (var count = 1; count <= 5; count++) {

            $('#submit_star_' + count).addClass('star-light');

            $('#submit_star_' + count).removeClass('text-warning');

        }
    }

    $(document).on('mouseleave', '.submit_star', function () {

        reset_background();

        for (var count = 1; count <= rating_data; count++) {

            $('#submit_star_' + count).removeClass('star-light');

            $('#submit_star_' + count).addClass('text-warning');
        }

    });

    $(document).on('click', '.submit_star', function () {

        rating_data = $(this).data('rating');

    });

    $('#save_review').click(function () {
        console.log('Đã nhấp vào nút #save_review');
        var user_name = $('#user_name').val();

        var user_review = $('#user_review').val();

        if (rating_data === 0) {
            alert("Vui lòng chọn đánh giá trước khi gửi!");
            return false;
        }

        if (user_name === '' && user_review === '') {
            alert("Vui Lòng Không Được Bỏ Trống!");
            return false;
        }
        else {
            $.ajax({
                url: "Duan/View/HTML_PHP/Product/submit_rating.php",
                method: "POST",
                data: { rating_data: rating_data, user_name: user_name, user_review: user_review },
                success: function (data) {
                    load_rating_data();

                    // $('#user_name').val('');
                    // $('#user_review').val('');
                    $('#review_modal').modal('hide');

                    alert(data);
                    // location.reload();
                }
            })
        }

    });

    load_rating_data();

    function load_rating_data() {
        $.ajax({
            url: "Duan/View/HTML_PHP/Product/submit_rating.php",
            method: "POST",
            data: { action: 'load_data' },

            dataType: "JSON",
            success: function (data) {
                console.log('Đang gọi AJAX');
                $('#average_rating').text(data.average_rating);
                $('#total_review').text(data.total_review);

                var count_star = 0;

                $('.main_star').each(function () {
                    count_star++;
                    if (Math.ceil(data.average_rating) >= count_star) {
                        $(this).addClass('text-warning');
                        $(this).addClass('star-light');
                    }
                });

                $('#total_five_star_review').text(data.five_star_review);

                $('#total_four_star_review').text(data.four_star_review);

                $('#total_three_star_review').text(data.three_star_review);

                $('#total_two_star_review').text(data.two_star_review);

                $('#total_one_star_review').text(data.one_star_review);

                $('#five_star_progress').css('width', (data.five_star_review / data.total_review) * 100 + '%');

                $('#four_star_progress').css('width', (data.four_star_review / data.total_review) * 100 + '%');

                $('#three_star_progress').css('width', (data.three_star_review / data.total_review) * 100 + '%');

                $('#two_star_progress').css('width', (data.two_star_review / data.total_review) * 100 + '%');

                $('#one_star_progress').css('width', (data.one_star_review / data.total_review) * 100 + '%');

                if (data.review_data.length > 0) {
                    var html = '';

                    for (var count = 0; count < data.review_data.length; count++) {
                        html += '<div class="row m-5">';

                        html += '<div class="col-sm-1"><div class="icon_user_cmt text-white pt-2 pb-2"><h3>'
                            + data.review_data[count].user_name.charAt(0) + '</h3></div></div>';

                        html += '<div class="col-sm-11">';

                        html += '<div class="card">';

                        html += '<div class="card-header"><b>' + data.review_data[count].user_name + '</b></div>';

                        html += '<div class="card-body">';

                        for (var star = 1; star <= 5; star++) {
                            var class_name = '';

                            if (data.review_data[count].rating >= star) {
                                class_name = 'text-warning';
                            }
                            else {
                                class_name = 'star-light';
                            }

                            html += '<i class="fas fa-star ' + class_name + ' mr-1"></i>';
                        }

                        html += '<br />';

                        html += data.review_data[count].user_review;

                        html += '</div>';

                        html += '<div class="card-footer text-right">On ' + data.review_data[count].datetime + '</div>';

                        html += '</div>';

                        html += '</div>';

                        html += '</div>';
                    }

                    $('#review_content').html(html);
                }
            }
        })
        console.log('Đang gọi load_rating_data()');
    }
</script>


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