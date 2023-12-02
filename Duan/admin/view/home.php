<!--**********************************
Content body start
***********************************-->
<div class="content-body">
  <!-- row -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-3 col-sm-6">
        <div class="card">
          <div class="stat-widget-two card-body">
            <div class="stat-content">
              <div class="stat-text">Đơn Hàng Mới</div>
              <div class="stat-digit">5</div>
            </div>
            <!-- Thanh Quá Trình -->
            <!-- <div class="progress">
              <div class="progress-bar progress-bar-success w-85" role="progressbar" aria-valuenow="85"
                aria-valuemin="0" aria-valuemax="100"></div>
            </div> -->
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-sm-6">
        <div class="card">
          <div class="stat-widget-two card-body">
            <div class="stat-content">
              <div class="stat-text">Đơn Hàng Đã Giao</div>
              <div class="stat-digit">3</div>
            </div>
            <!-- <div class="progress">
              <div class="progress-bar progress-bar-primary w-75" role="progressbar" aria-valuenow="78"
                aria-valuemin="0" aria-valuemax="100"></div>
            </div> -->
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-sm-6">
        <div class="card">
          <div class="stat-widget-two card-body">
            <div class="stat-content">
              <div class="stat-text">Đơn Hàng Đã Bị Hủy</div>
              <div class="stat-digit">1</div>
            </div>
            <!-- <div class="progress">
              <div class="progress-bar progress-bar-warning w-50" role="progressbar" aria-valuenow="50"
                aria-valuemin="0" aria-valuemax="100"></div>
            </div> -->
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-sm-6">
        <div class="card">
          <div class="stat-widget-two card-body">
            <div class="stat-content">
              <div class="stat-text">Tổng Doanh Thu</div>
              <div class="stat-digit">6.500.000đ</div>
            </div>
            <!-- <div class="progress">
              <div class="progress-bar progress-bar-danger w-65" role="progressbar" aria-valuenow="65" aria-valuemin="0"
                aria-valuemax="100"></div>
            </div> -->
          </div>
        </div>
        <!-- /# card -->
      </div>
      <!-- /# column -->
    </div>
    <!-- <div class="row d-flex m-0 justify-content-between">
      <div class="col-lg-6 m-0 p-0" id="myChart" style="width:100%; max-width:600px; height:500px; margin-left: 400px;">
        <script src="https://www.gstatic.com/charts/loader.js"></script>
        <script>
          google.charts.load('current', { 'packages': ['corechart'] });
          google.charts.setOnLoadCallback(drawChart);

          function drawChart() {

            // Set Data
            const data = google.visualization.arrayToDataTable([
              ['Danh Mục', 'Số Lượng Sản Phẩm'],

              // <?php
              // $tongdm = count($listthongke);
              // $i = 1;
              // foreach ($listthongke as $thongke) {
              //   extract($thongke);
              //   if ($i == $tongdm) {
              //     $dauphay = "";
              //   } else {
              //     $dauphay = ",";
              //   }
              //   echo "['" . $thongke['tendm'] . "', " . $thongke['countsp'] . "]" . $dauphay;
              //   $i += 1;
              // }
              // ?>

            ]);

            // Set Options
            const options = {
              title: 'BIỂU ĐỒ THỐNG KÊ SỐ LƯỢNG SẢN PHẨM',
              is3D: true
            };

            // Draw
            const chart = new google.visualization.PieChart(document.getElementById('myChart'));
            chart.draw(data, options);

          }
        </script>
      </div>

      <div class="col-lg ms-5" style="background-color: white;">
        <h4 style="text-align: center; margin-top: 20px;">DANH SÁCH THỐNG KÊ HÀNG HÓA</h4>
        <table border="1px" style="width: 100%; text-align: center;">
          <tr>
            <th>STT</th>
            <th>LOẠI HÀNG</th>
            <th>SỐ LƯỢNG SẢN PHẨM</th>
            <th>GIÁ CAO NHẤT</th>
            <th>GIÁ THẤP NHẤT</th>
            <th>GIÁ TRUNG BÌNH</th>
          </tr>
          <?php
          // foreach ($listthongke as $thongke) {
          //   extract($thongke);
          //   echo '<tr style="text-align: center;">
          //                 <td>' . $madm . '</td>
          //                 <td>' . $tendm . '</td>
          //                 <td>' . $countsp . '</td>
          //                 <td>' . $minprice . '</td>
          //                 <td>' . $maxprice . '</td>
          //                 <td>' . $avgprice . '</td>
          //             </tr>';
          // }
          ?>
        </table>
      </div>
    </div> -->


    <div class="col-lg-12 p-0 mt-5">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Đơn Hàng Mới Nhất</h4>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table mb-0">
              <thead>
                <tr>
                  <th>Ảnh</th>
                  <th>Tên</th>
                  <th>Sản Phẩm</th>
                  <th>Số Lượng</th>
                  <th>Trạng Thái</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <div class="round-img">
                      <a href=""><img width="35" src="./images/avatar/1.png" alt="" /></a>
                    </div>
                  </td>
                  <td>Lew Shawon</td>
                  <td><span>Dell-985</span></td>
                  <td><span>456 pcs</span></td>
                  <td><span class="badge badge-success">Đã Xong</span></td>
                </tr>
                <tr>
                  <td>
                    <div class="round-img">
                      <a href=""><img width="35" src="./images/avatar/1.png" alt="" /></a>
                    </div>
                  </td>
                  <td>Lew Shawon</td>
                  <td><span>Asus-565</span></td>
                  <td><span>456 pcs</span></td>
                  <td>
                    <span class="badge badge-warning">Đang Chờ</span>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="round-img">
                      <a href=""><img width="35" src="./images/avatar/1.png" alt="" /></a>
                    </div>
                  </td>
                  <td>lew Shawon</td>
                  <td><span>Dell-985</span></td>
                  <td><span>456 pcs</span></td>
                  <td><span class="badge badge-success">Done</span></td>
                </tr>

                <tr>
                  <td>
                    <div class="round-img">
                      <a href=""><img width="35" src="./images/avatar/1.png" alt="" /></a>
                    </div>
                  </td>
                  <td>Lew Shawon</td>
                  <td><span>Asus-565</span></td>
                  <td><span>456 pcs</span></td>
                  <td>
                    <span class="badge badge-warning">Pending</span>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="round-img">
                      <a href=""><img width="35" src="./images/avatar/1.png" alt="" /></a>
                    </div>
                  </td>
                  <td>lew Shawon</td>
                  <td><span>Dell-985</span></td>
                  <td><span>456 pcs</span></td>
                  <td><span class="badge badge-success">Done</span></td>
                </tr>

                <tr>
                  <td>
                    <div class="round-img">
                      <a href=""><img width="35" src="./images/avatar/1.png" alt="" /></a>
                    </div>
                  </td>
                  <td>Lew Shawon</td>
                  <td><span>Asus-565</span></td>
                  <td><span>456 pcs</span></td>
                  <td>
                    <span class="badge badge-warning">Pending</span>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>