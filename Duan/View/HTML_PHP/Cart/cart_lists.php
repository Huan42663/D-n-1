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
                            <th class="text-right py-3" style="width: 100px;">Giá</th>
                            <th class="text-center py-3" style="width: 120px;">Số Lượng</th>
                            <th class="text-right py-3" style="width: 100px;">Tổng Tiền</th>
                            <th class="text-center py-3" style="width: 100px;"></th>
                        </tr>
                    </thead>

                    <tbody>
                    <?php
                        $totals =0;
                        foreach ($carts as $cart) {
                            extract($cart);
                            $price_format = number_format($price,0,'.','.');
                            $discount_format = number_format($discount,0,'.','.');
                            if($discount == 0){
                                $total_price = $price * $quantity_cart;
                            }else{
                                $total_price = $discount * $quantity_cart;
                            }
                            $total_price_format =number_format($total_price,0,'.','.') ;
                            $totals +=$total_price;
                            $totals_sale = ($totals /100) * (100-$voucher_discount);
                            $totals_format = number_format($totals,0,'.','.');
                            $totals_sale_format = number_format($totals_sale,0,'.','.');
                    ?>
                        <tr>
                            <td class="p-4">
                                <div class="media align-items-center d-flex">
                                <a href="index.php?act=product_details&id=<?=$id_pro?>"><img src="Duan/image_product/<?=$image?>" 
                                class="ui-w-40 ui-bordered me-4" alt="..."></a>
                                    <div class="media-body">
                                        <a href="index.php?act=product_details&id=<?=$id_pro?>" class="pro_name d-block text-dark"><?=$pro_name?></a>
                                        <small>
                                            <span class="text-muted"><strong>Hãng</strong>: <?=$brand_name?></span>
                                            <span class="text-muted"><strong>Màu</strong>:</span>
                                            <span class="ui-product-color ui-product-color-sm align-text-bottom"
                                            style="width=10px;height=10px;background-color:<?=$color_name?>;border-radius:50%;"></span>
                                        </small>
                                    </div>
                                </div>
                            </td>
                            <?php
                                if($discount == 0){
                            ?>
                                <td class="text-right font-weight-semibold align-middle p-4" id="price"><?=$price_format?>đ</td>
                            <?php
                                }else{
                            ?>
                                <td class="text-right font-weight-semibold align-middle p-4"><?=$discount_format?>đ</td>
                            <?php
                                }
                            ?>
                            <td class="align-middle p-4">
                                <?=$quantity_cart?>
                            </td>
                            <td class="text-right font-weight-semibold align-middle p-4"><?=$total_price_format?>đ</td>
                            <td class="text-center align-middle px-0"><a onclick="return confirm('bạn có muốn xóa không');" href="index.php?act=delete_cart&id_cart=<?=$id_cart?>&id_clp=<?=$id_clp?>"
                                    class="shop-tooltip close float-none text-danger text-decoration-none" title
                                    data-original-title="Remove" style="font-size: xx-large;">×</a></td>
                        </tr>
                    <?php
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
                    <form action="index.php?act=cart_lists" method="POST">
                        <label class="text-muted font-weight-normal">Mã Giảm Giá</label>
                        <input type="text" placeholder="   . . . . ." class="form-control" name="add_code"><br>
                        <input type="submit" name="add" id="" value="Áp Dụng">
                    </form>
                </div>

               

                <div class="d-flex">

                    <div class="text-right mt-4">
                        <label class="text-muted font-weight-normal m-0">Tổng Thanh Toán</label>
                        <div class="text-large" style="color: red;"><strong>
                                <?= $totals_format ?>đ
                            </strong>
                        </div>
                            <?php
                                if($voucher_discount > 0){
                            ?>
                                <span>-<?=$voucher_discount?>%</span><br>
                                <div class="text-large" style="color: red;">
                                    <strong>
                                        = <?= $totals_sale_format ?>đ
                                    </strong>
                                </div>
                            <?php
                                }
                            ?>
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
