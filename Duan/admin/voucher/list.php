<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Danh Sách Voucher</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>ID Voucher</th>
                                        <th>Mã Giảm Giá</th>
                                        <th>Ngày Bắt Đầu</th>
                                        <th>Ngày Kết Thúc</th>
                                        <th>Giá Trị</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        foreach ($vouchers as $voucher) {
                                            extract($voucher);
                                    ?>
                                        <tr>
                                            <td><?=$id_voucher?></td>
                                            <td><?=$code?></td>
                                            <td><?=$start_at?></td>
                                            <td><?=$end_at?></td>
                                            <td><?=$value?>%</td>
                                        </tr>
                                    <?php
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>