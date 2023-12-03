<style>
.list-infor-order {
    border : 1px solid black;
    border-radius: 5px;
}
</style>
<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Danh Sách Đơn Hàng Đã Hoàn Thành</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <?php
                                foreach ($bills as $bill) {
                                    extract($bill);
                                    $other_bills =load_other_bill($id_bill);
                                    $total_format = number_format($total,0,'.','.');
                            ?>
                            <div class="list-infor-order">
                                <li class="list-group-item d-flex justify-content-between lh-condensed">
                                    <div class="list-infor-pro">
                                        <h6 class="my-0">Tên Người Nhận :</h6>
                                        <small class="text-muted"><?=$name_user?></small>
                                        <h6 class="my-0">Số Điện Thoại :</h6>
                                        <small class="text-muted"><?=$tel_user?></small>
                                        <h6 class="my-0">Địa Chỉ :</h6>
                                        <small class="text-muted"><?=$address_user?></small>
                                        <h6 class="my-0">Ngày Đặt Hàng :</h6>
                                        <small class="text-muted"><?=$date?></small>
                                        <h6 class="my-0">Phương Thức Thanh Toán :</h6>
                                        <small class="text-muted"><?=$name_payment?></small>
                                    </div>
                                </li>
                                <?php
                                    foreach ($other_bills as $key => $value) {
                                        // $total_per_pro = $value['price_pro'] * $value[''];
                                        $price_pro_format = number_format($value['price_pro'],0,'.','.');
                                ?>
                                <li class="list-group-item d-flex justify-content-between lh-condensed">
                                    <div class="list-infor-pro">
                                        <h6 class="my-0">Tên Sản Phẩm :</h6>
                                        <small class="text-muted"><?=$value['name_pro']?></small>
                                        <h6 class="my-0">Màu :</h6>
                                        <small class="text-muted"><?=$value['color_product']?></small>
                                        <h6 class="my-0">Hãng Sản Phẩm :</h6>
                                        <small class="text-muted"><?=$value['brand_pro']?></small>
                                        <h6 class="my-0">Số Lượng :</h6>
                                        <small class="text-muted"><?=$value['quantity_pro']?></small>
                                    </div>
                                    <span class="text-muted"><?=$price_pro_format?>đ</span>
                                </li>
                                <?php
                                    }
                                ?>
                                <li class="list-group-item d-flex justify-content-between">
                                    <span>Mã Giảm Giá</span>
                                    <strong><?=$voucher_discount?></strong>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <span>Tổng Tiền</span>
                                    <strong><?=$total_format?>đ</strong>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <span>Trang Thái Đơn Hàng</span>
                                    <strong><?=$status_name?></strong>
                                </li>
                                <?php
                                    if($status == 1){
                                ?>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <a href="index.php?act=change_status_bill&id=<?=$id_bill?>"><button>Xác Nhận Đơn Hàng</button></a>
                                    </li>
                                <?php
                                    }
                                ?>
                            </div>
                            <br>
                            <?php
                                }
                            ?>
                        </div>
                        <span>
                            <?php
                                for ($i=0; $i < $bills_count; $i++) {
                            ?>
                            <a class="paginate_button current" href="index.php?act=list_cancelled_order&page=<?=$i?>" aria-controls="example" data-dt-idx="1" tabindex="0"><?=$i+1?></a>
                            <?php
                                }
                            ?>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>