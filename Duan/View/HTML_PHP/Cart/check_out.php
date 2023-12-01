

<main id="main" role="main">
    <section id="checkout-container">
        <div class="container">
            <div class="py-5 text-center">
                <i class="fa fa-credit-card fa-3x text-primary"></i>
                <h2 class="my-3">Thanh Toán Đơn Hàng</h2>
            </div>
            <div class="row mb-5">
                <div class="col-md-4 order-md-2 mb-4">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted">Giỏ Hàng Của Bạn</span>
                        <span class="badge badge-secondary badge-pill">3</span>
                    </h4>
                    <ul class="list-group mb-3">
                        <?php
                            $totals_all =0;
                            foreach ($bills as $bill) {
                                extract($bill);
                                if($discount == 0){
                                    $totals = $price * $quantity_cart;
                                }else{
                                    $totals = $discount * $quantity_cart;
                                }
                                $totals_all+=$totals;
                                $totals_sale = ($totals_all /100 ) * (100 - $voucher_discount);
                                $total_format = number_format($totals,0,'.','.');
                                $totals_all_format = number_format($totals_all,0,'.','.');
                                $totals_sale_format = number_format($totals_sale,0,'.','.');
                        ?>
                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                <div>
                                    <h6 class="my-0">Tên Sản Phẩm</h6>
                                    <small class="text-muted"><?=$pro_name?></small>
                                    <h6 class="my-0">Màu</h6>
                                    <small class="text-muted"><?=$color_name?></small>
                                    <h6 class="my-0">Số Lượng</h6>
                                    <small class="text-muted"><?=$quantity_cart?></small>
                                </div>
                                <span class="text-muted"><?=$total_format?>đ</span>
                            </li>
                        <?php
                            }
                        ?>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Tổng Tiền</span>
                            <strong><?=$totals_all_format?>đ</strong>
                        </li>
                        <?php
                            if($voucher_discount > 0){
                        ?>
                        <li class="list-group-item d-flex justify-content-between bg-light">
                            <div class="text-success">
                                <h6 class="my-0">Mã Giảm Giá (Voucher)</h6>
                                <span class="text-success"><?=$code?></span>
                            </div>
                            <span class="text-success">-<?=$voucher_discount?>%</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>=</span>
                            <strong><?=$totals_sale_format?>đ</strong>
                        </li>
                        <?php
                            }
                        ?>
                    </ul>
                    <form class="card p-2" action="index.php?act=check_out" method="POST">
                        <div class="input-group">
                            <input type="text" class="form-control" name="add_code" placeholder="Mã Giảm Giá (Voucher)">
                            <div class="input-group-append">
                                <input type="submit" name="add" class="btn btn-secondary" value="Áp Dụng">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-8 order-md-1">
                    <h4 class="mb-3">Thông Tin</h4>
                    <form class="needs-validation" novalidate method="POST" action="index.php?act=confirm_checkout">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="firstName">Họ</label>
                                <input type="text" class="form-control" id="firstName" placeholder="" name="firstname" required>
                                <div class="invalid-feedback">
                                    Buộc Phải Điền Thông Tin.
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="lastName">Tên</label>
                                <input type="text" class="form-control" id="lastName" placeholder="" name="lastname" required>
                                <div class="invalid-feedback">
                                    Valid last name is required.
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="email">Số Điện Thoại
                            </label>
                            <input type="text" class="form-control" name="tel" value="<?=$_SESSION['user_name_login']['tel']?>" id="tel" required>
                            <div class="invalid-feedback">
                                Please enter a valid email address for shipping updates.
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="email">Email
                            </label>
                            <input type="email" class="form-control" name="email" id="email" value="<?=$_SESSION['user_name_login']['email']?>" required>
                            <div class="invalid-feedback">
                                Please enter a valid email address for shipping updates.
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="address">Địa Chỉ</label>
                            <input type="text" class="form-control" name="address" id="address" value="<?=$_SESSION['user_name_login']['address']?>" required>
                            <div class="invalid-feedback">
                                Please enter your shipping address.
                            </div>
                        </div>



                        <hr>


                        <h4 class="mb-3">Phương Thức Thanh Toán</h4>

                        <div class="d-block my-3">
                            <?php
                                foreach ($payments as $payment) {
                            ?>
                                <div class="custom-control custom-radio">
                                    <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" value ="<?=$payment['id_payment']?>"
                                        checked required>
                                    <label class="custom-control-label" for="credit"><?=$payment['name_payment']?></label>
                                </div>
                            <?php
                                }
                            ?>
                        </div>

                        <hr>
                        <?php
                            if($voucher_discount > 0){
                        ?>
                            <input type="hidden" name="totals" id="" value="<?=$totals_sale?>">
                            <input type="hidden" name="voucher_discount" id="" value="<?=$voucher_discount?>">
                            <input type="hidden" name="voucher_code" id="" value="<?=$code?>">
                            <?php
                            }else{
                                ?>
                            <input type="hidden" name="totals" id="" value="<?=$totals_all?>">
                            <input type="hidden" name="voucher_discount" id="" value="0">
                            <input type="hidden" name="voucher_code" id="" value="">
                        <?php
                            }
                        ?>
                        <input class="btn btn-primary btn-lg btn-block" name="pay" type="submit" value="Thanh Toán"></input>
                    </form>
                
                </div>
            </div>
        </div>

    </section>