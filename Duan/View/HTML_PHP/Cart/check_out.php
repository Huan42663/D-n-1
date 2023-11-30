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
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h6 class="my-0">Tên Sản Phẩm</h6>
                                <small class="text-muted">Brief description</small>
                            </div>
                            <span class="text-muted">250.000đ</span>
                        </li>

                        <li class="list-group-item d-flex justify-content-between bg-light">
                            <div class="text-success">
                                <h6 class="my-0">Mã Giảm Giá (Voucher)</h6>
                            </div>
                            <span class="text-success">-50.000đ</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Tổng Tiền</span>
                            <strong>200.000đ</strong>
                        </li>
                    </ul>
                    <form class="card p-2">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Mã Giảm Giá (Voucher)">
                            <div class="input-group-append">
                                <input type="submit" class="btn btn-secondary" value="Áp Dụng"></input>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-8 order-md-1">
                    <h4 class="mb-3">Thông Tin</h4>
                    <form class="needs-validation" novalidate>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="firstName">Họ</label>
                                <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
                                <div class="invalid-feedback">
                                    Buộc Phải Điền Thông Tin.
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="lastName">Tên</label>
                                <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
                                <div class="invalid-feedback">
                                    Valid last name is required.
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="email">Số Điện Thoại
                            </label>
                            <input type="text" class="form-control" id="tel" required>
                            <div class="invalid-feedback">
                                Please enter a valid email address for shipping updates.
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="email">Email
                            </label>
                            <input type="email" class="form-control" id="email" required>
                            <div class="invalid-feedback">
                                Please enter a valid email address for shipping updates.
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="address">Địa Chỉ</label>
                            <input type="text" class="form-control" id="address" required>
                            <div class="invalid-feedback">
                                Please enter your shipping address.
                            </div>
                        </div>



                        <hr>


                        <h4 class="mb-3">Phương Thức Thanh Toán</h4>

                        <div class="d-block my-3">
                            <div class="custom-control custom-radio">
                                <input id="credit" name="paymentMethod" type="radio" class="custom-control-input"
                                    checked required>
                                <label class="custom-control-label" for="credit">Trả Tiền Khi Nhận Hàng</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input id="debit" name="paymentMethod" type="radio" class="custom-control-input"
                                    required>
                                <label class="custom-control-label" for="debit">Chuyển Khoản</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input id="debit" name="paymentMethod" type="radio" class="custom-control-input"
                                    required>
                                <label class="custom-control-label" for="debit">VN PAY</label>
                            </div>
                        </div>

                        <hr>
                        <input class="btn btn-primary btn-lg btn-block" type="submit" value="Thanh Toán"></input>
                    </form>
                </div>
            </div>
        </div>

    </section>