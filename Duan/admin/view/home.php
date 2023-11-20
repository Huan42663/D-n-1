
       <div class="content-1">
         <table class="table">
            <h2> <i class="fa-solid fa-shop"></i> Thống kê các sản phẩm shop </h2>
            <thead>
              <tr>
                <th scope="col">Mã sản phẩm</th>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Giá sản phẩm</th>
                <th scope="col">Ảnh</th>
                <th scope="col">Lượt xem</th>
                <th scope="col">Danh muc</th>
                <th></th>
              </tr> 
            </thead>
            <tbody>
              <?php
                foreach ($product as $pro) {
                  extract($pro);
              ?>
              <tr>
                <th scope="row"><?=$id_pro?></th>
                <td><?=$pro_name?></td>
                <td><?=$price?></td>
                <td><img src="../upload/<?=$img?>" alt=""></td>
                <td><?=$view?></td>
                <td><?=$cate_name?></td>
                <td><input type="button" value="Thêm">
                  <input type="button" value="Sửa">
                  <input type="button" value="Xóa"></td>
              </tr>
              <?php
                }
              ?>
            </tbody>
          </table>
       </div>

       <div class="conset">
         <div class="container text-center">
            <div class="row align-items-start">
              <div class="col">
                <h3><i class="fa-solid fa-truck"></i> Số lượn hành nhập</h3>
                <h1>0.00</h1>
              </div>
              <div class="col">
                <h3><i class="fa-solid fa-chart-simple"></i> Tổng doanh thu</h3>
                <h1>0.000</h1>
              </div>
              <div class="col">
                <h3><i class="fa-solid fa-users"></i> Số lượn người chuy cập</h3>
                <h1>0.000</h1>
              </div>
            </div>
          </div>
       </div>

       <div class="connet">
         <div class="container text-center">
            <div class="row align-items-center">
              <div class="col">
                Số lượn hàng nhập
                <img src="logo/cach-ve-bieu-do-tron-trong-word-1-800x450.png" alt="" width="100%">
              </div>
              <div class="col">
                Tổng doanh thu
                <img src="logo/cach-ve-bieu-do-tron-trong-word-1-800x450.png" alt=""width="100%">
              </div>
              <div class="col">
                Số lươn hàng xuất ra
                <img src="logo/cach-ve-bieu-do-tron-trong-word-1-800x450.png" alt=""width="100%">
              </div>
            </div>
          </div>
       </div>

       <div class="content">
        <div class="container text-center">
            <div class="row">
              <div class="col">
                 <a href=""> <img src="logo/aorus.webp" alt="" width="100%" height="100%"></a>
              </div>
              <div class="col">
                <a href=""> <img src="logo/dell.jpeg" alt="" width="100%" height="100%"></a>
              </div>
              <div class="col">
                <a href=""> <img src="logo/lenovo.jpg" alt="" width="100%" height="100%"></a>
              </div>
            </div>
            </div>
        </div>

        <div class="connet">
          <div class="col">
            <h2>Biểu đồ doanh thu</h2>
            <img src="logo/bieu-do-thanh-bar-chart.webp" alt="" width="100%" style="border-radius: 5px;">
          </div>
        </div>