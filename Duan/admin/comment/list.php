<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Danh Sách Bình Luận</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>ID Bình Luận</th>
                                        <th>ID Sản Phẩm</th>
                                        <th>ID Tài Khoản</th>
                                        <th>Nội Dung</th>
                                        <th>Ngày Bình Luận</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        foreach ($list_comment as $comment) {
                                            extract($comment);
                                    ?>
                                        <tr>
                                            <td><?=$id_cmt?></td>
                                            <td><?=$id_pro?></td>
                                            <td><?=$id_user?></td>
                                            <td><?=$content?></td>
                                            <td><?=$date?></td>
                                            <td>
                                                <a onclick="return confirm('Bạn có muốn xóa không');"href="index.php?act=delete_comment&id=<?=$id_comment?>">
                                                    <button class="btn btn-primary">Xóa</button>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php
                                        }
                                    ?>
                                </tbody>
                            </table>
                            <div class="dataTables_paginate paging_simple_numbers" id="example_paginate">
                                <a class="paginate_button previous disabled" aria-controls="example" data-dt-idx="0" tabindex="0" id="example_previous">Previous</a>
                                <span>
                                    <?php
                                        for ($i=0; $i < $count; $i++) {
                                    ?>
                                    <a class="paginate_button current" href="index.php?act=list_comment&page=<?=$i?>" aria-controls="example" data-dt-idx="1" tabindex="0"><?=$i+1?></a>
                                    <?php
                                     }
                                    ?>
                                </span>
                                <a class="paginate_button next" aria-controls="example" data-dt-idx="7" tabindex="0" id="example_next">Next</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>