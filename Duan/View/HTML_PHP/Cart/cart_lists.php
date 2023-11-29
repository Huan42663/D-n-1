<title>BlueTech - Giỏ Hàng</title>
<style>
    .ui-w-40 {
        width: 40px !important;
        height: auto;
    }

    .card {
        box-shadow: 0 1px 15px 1px rgba(52, 40, 104, .08);
    }

    .ui-product-color {
        display: inline-block;
        overflow: hidden;
        margin: .144em;
        width: .875rem;
        height: .875rem;
        border-radius: 10rem;
        -webkit-box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.15) inset;
        box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.15) inset;
        vertical-align: middle;
    }

    .float-right {
        float: right;
    }

    th.text-right.py-3[style="width: 100px;"],
    td.text-right.font-weight-semibold.align-middle.p-4[style="width: 100px;"] {
        white-space: nowrap;
    }

    .delete_all_class {
        text-decoration: none;
        color: red;
    }

    .delete_all_class:hover {
        text-decoration: underline;
        color: red;
    }

    .pro_name {
        text-decoration: none;
    }

    .pro_name:hover {
        text-decoration: underline;
    }
</style>

<div class="container p-0 my-5 clearfix"
    style="background-image: linear-gradient(to right, #0E2241 , #00b3ff); border-radius: 10px; box-shadow: 0px 0px 5px gainsboro;">

    <div class="card">
        <div class="card-header" style="background-image: linear-gradient(to right, #0E2241 , #00b3ff);
        color: white;">
            <p class="m-0 pt-2 pb-2" style="font-family: 'Tahoma'; font-weight: bold; font-size: x-large;">
                Giỏ Hàng Của Bạn</p>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered mb-5">
                    <thead>
                        <tr class="text-center">

                            <th class="text-center py-3" style="min-width: 400px;">Sản Phẩm & Chi Tiết</th>
                            <th class="text-right py-3" style="width: 100px;">Giá Cũ</th>
                            <th class="text-right py-3" style="width: 100px;">Giá Hiện Tại</th>
                            <th class="text-center py-3" style="width: 120px;">Số Lượng</th>
                            <th class="text-right py-3" style="width: 100px;">Tổng Tiền</th>
                            <th class="text-center py-3" style="width: 100px;"
                                onclick="return confirm('Bạn Có Chắc Là Muốn Xóa Hết Không?');"><a
                                    class="delete_all_class" href="index.php?act=delete_all_cart">Xóa
                                    Hết</a></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $all_products_total = 0;
                        $voucher = 0;
                        $i = 1;

                        foreach ($_SESSION['my_cart'] as $cart) {
                            $total_price = $cart[4] * $cart[5];

                            $cart_format[3] = number_format($cart[3], 0, '.', '.');
                            $cart_format[4] = number_format($cart[4], 0, '.', '.');
                            $total_price_format = number_format($total_price, 0, '.', '.');

                            $all_products_total += $total_price;

                            echo '<tr>
                                <td class="p-4">
                                    <div class="media align-items-center d-flex">
                                    <a href="index.php?act=product_details&id=' . $cart[0] . '"><img src="./Duan/image_product/' . $cart[1] . '" 
                                    class="ui-w-40 ui-bordered me-4" alt="..."></a>
                                        <div class="media-body">
                                            <a href="index.php?act=product_details&id=' . $cart[0] . '" class="pro_name d-block text-dark">' . $cart[2] . '</a>
                                            <small>
                                                <span class="text-muted">Hãng: ' . $cart[5] . '</span>
                                                <span class="text-muted">Màu:</span>
                                                <span class="ui-product-color ui-product-color-sm align-text-bottom"
                                                    style="background:#e81e2c;"></span> &nbsp;
                                            </small>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-right font-weight-semibold align-middle p-4"><del>' . $cart_format[3] . 'đ</del></td>
                                <td class="text-right font-weight-semibold align-middle p-4">' . $cart_format[4] . 'đ</td>
                                <td class="align-middle p-4"><input type="number" class="form-control text-center"
                                        value="1">
                                </td>
                                <td class="text-right font-weight-semibold align-middle p-4">' . $total_price_format . 'đ</td>
                                <td class="text-center align-middle px-0"><a href="index.php?act=delete_cart&id_cart=' . $i . '"
                                        class="shop-tooltip close float-none text-danger text-decoration-none" title
                                        data-original-title="Remove" style="font-size: xx-large;">×</a></td>
                            </tr>';
                            $i += 1;
                        }
                        ?>
                        <!-- <tr>
                            <td class="p-4">
                                <div class="media align-items-center d-flex">
                                    <img src="./Duan/View/Images/Razer Basilisk V3 Pro.webp"
                                        class="ui-w-40 ui-bordered me-4" alt>
                                    <div class="media-body">
                                        <a href="#" class="d-block text-dark">Product 1</a>
                                        <small>
                                            <span class="text-muted">Color:</span>
                                            <span class="ui-product-color ui-product-color-sm align-text-bottom"
                                                style="background:#e81e2c;"></span> &nbsp;
                                            <span class="text-muted">Size: </span> EU 37 &nbsp;
                                            <span class="text-muted">Ships from: </span> China
                                        </small>
                                    </div>
                                </div>
                            </td>
                            <td class="text-right font-weight-semibold align-middle p-4"><del>$57.55</del></td>
                            <td class="text-right font-weight-semibold align-middle p-4">$57.55</td>
                            <td class="align-middle p-4"><input type="number" class="form-control text-center"
                                    value="1">
                            </td>
                            <td class="text-right font-weight-semibold align-middle p-4">$115.1</td>
                            <td class="text-center align-middle px-0"><a href="#"
                                    class="shop-tooltip close float-none text-danger text-decoration-none" title
                                    data-original-title="Remove" style="font-size: xx-large;">×</a></td>
                        </tr> -->

                    </tbody>

                </table>
            </div>

            <div class="d-flex flex-wrap justify-content-between align-items-center pb-4  mt-2">
                <div class="mt-4">
                    <label class="text-muted font-weight-normal">Mã Giảm Giá</label>
                    <input type="text" placeholder=". . . . ." class="form-control">
                </div>

                <?php
                $all_products_total = number_format($all_products_total, 0, '.', '.');
                ?>

                <div class="d-flex">
                    <div class="text-right mt-4 mr-5">
                        <label class="text-muted font-weight-normal me-5">Mã Giảm Giá</label>
                        <div class="text-large" style="color: #00b3ff;">
                            <strong>-
                                <?= $voucher ?>đ
                            </strong>
                        </div>
                    </div>

                    <div class="text-right mt-4">
                        <label class="text-muted font-weight-normal m-0">Tổng Thanh Toán</label>
                        <div class="text-large" style="color: red;"><strong>
                                <?= $all_products_total ?>đ
                            </strong></div>
                    </div>
                </div>
            </div>
            <div class="float-right">
                <a href="index.php"><input type="submit" class="btn btn-lg btn-default md-btn-flat"
                        value="Quay Lại"></input></a>

                <a href=""><input type="submit" class="btn btn-lg btn-primary" value="Thanh Toán"></input></a>
            </div>
        </div>
    </div>
</div>