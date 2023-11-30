<title>BlueTech - Mã Giảm Giá</title>
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
    td{
        text-align: center;
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
            Mã Giảm Giá</p>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered mb-5" border=1>
                    <tr class="text-center">
                        <th class="text-center py-3" style="min-width: 200px;">Mã Giảm Giá</th>
                        <th class="text-right py-3" style="width: 200px;">Ngày Kết Thúc</th>
                        <th class="text-center py-3" style="width: 200px;">Giá Trị</th>
                    </tr>
                    <?php
                        foreach ($vouchers as $voucher) {
                            extract($voucher);
                    ?>
                        <tr>
                            <td><?=$code?></td>
                            <td><?=$end_at?></td>
                            <td><?=$value?>%</td>
                        </tr>
                    <?php
                        }
                    ?>
            </table>
        </div>

           