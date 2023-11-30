<style>
    body {
        overflow-x: hidden;
        height: 100%;
        background-color: #00b3ff;
        background-repeat: no-repeat;
    }

    .card {
        z-index: 0;
        background-color: #ECEFF1;
        padding-bottom: 20px;
        margin-top: 90px;
        margin-bottom: 90px;
        border-radius: 10px;
    }

    /*Icon progressbar*/
    #progressbar {
        margin-bottom: 30px;
        overflow: hidden;
        color: #455A64;
        padding-left: 0px;
        margin-top: 30px;
    }

    #progressbar li {
        list-style-type: none;
        font-size: 13px;
        width: 25%;
        float: left;
        position: relative;
        font-weight: 400;
    }

    #progressbar .step0:before {
        font-family: FontAwesome;
        content: "\f10c";
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    #progressbar li:before {
        width: 40px;
        height: 40px;
        line-height: 45px;
        display: block;
        font-size: 20px;
        background: #C5CAE9;
        border-radius: 50%;
        margin: auto;
        padding: 0px;
    }

    /*ProgressBar connectors*/
    #progressbar li:after {
        content: '';
        width: 100%;
        height: 12px;
        background: #C5CAE9;
        position: absolute;
        left: 0;
        top: 16px;
        z-index: -1;
    }

    #progressbar li:last-child:after {
        border-top-right-radius: 10px;
        border-bottom-right-radius: 10px;
        position: absolute;
        left: -50%;
    }

    #progressbar li:nth-child(2):after,
    #progressbar li:nth-child(3):after {
        left: -50%;
    }

    #progressbar li:first-child:after {
        border-top-left-radius: 10px;
        border-bottom-left-radius: 10px;
        position: absolute;
        left: 50%;
    }

    #progressbar li:last-child:after {
        border-top-right-radius: 10px;
        border-bottom-right-radius: 10px;
    }

    #progressbar li:first-child:after {
        border-top-left-radius: 10px;
        border-bottom-left-radius: 10px;
    }

    /*Color number of the step and the connector before it*/
    #progressbar li.active:before,
    #progressbar li.active:after {
        background: #651FFF;
    }

    #progressbar li.active:before {
        font-family: FontAwesome;
        content: "\f00c";
    }

    .icon {
        width: 60px;
        height: 60px;
        margin-right: 15px;
    }

    @media screen and (max-width: 992px) {
        .icon-content {
            width: 50%;
        }
    }
</style>

<button class="btn">Danh Sách Đơn Hàng</button>
<div class="container p-0 py-5 mx-auto">
    <h2>Đơn Hàng Mới Nhất</h2>

    <div class="card m-0 p-0 mt-5" style="box-shadow: 0px 0px 3px gainsboro;">
        <div class="row d-flex justify-content-between px-3 top pt-3">
            <div class="col-6">
                <h5>Mã Đơn Hàng: <span class="text-primary font-weight-bold">#Y34XDHR</span></h5>
                <p class="mb-0">Dự Kiến Giao Vào Ngày: <span>01/12/19</span></p>
                <p class="mb-0">Khách Hàng: <span>ABC</span></p>
                <p class="mb-0">Địa Chỉ: <span>Hà Nội</span></p>
            </div>
            <div class="col-6 d-flex flex-column" style="align-items: end;">
                <h5>Sản Phẩm: <span class="text-primary font-weight-bold">Logitech...</span></h5>
                <p class="mb-0">Tổng Tiền: <span>200.000đ</span></p>
                <p class="mb-0">Trạng Thái: <span>Chưa Thanh Toán</span></p>
            </div>
        </div>
        <!-- Add class 'active' to progress -->
        <div class="row d-flex justify-content-center mt-5">
            <div class="col-12">
                <ul id="progressbar" class="text-center">
                    <li class="active step0"></li>
                    <li class="active step0"></li>
                    <li class="active step0"></li>
                    <li class="step0"></li>
                </ul>
            </div>
        </div>
        <div class="row p-0 m-0 top justify-content-between m-5">
            <div class="col d-flex icon-content p-0 d-flex justify-content-center align-items-center">
                <img class="icon" src="https://i.imgur.com/9nnc9Et.png">
                <div class="">
                    <p class="m-0">Đơn Hàng Đã<br>Được Xác Nhận</p>
                </div>
            </div>
            <div class="col d-flex icon-content p-0 d-flex justify-content-center align-items-center">
                <img class="icon" src="https://i.imgur.com/u1AzR7w.png">
                <div class="">
                    <p class="m-0">Đã Được Bàn Giao<br>Cho Đơn Vị Vận Chuyển</p>
                </div>
            </div>
            <div class="col d-flex icon-content p-0 d-flex justify-content-center align-items-center">
                <img class="icon" src="https://i.imgur.com/TkPm63y.png">
                <div class="d-flex ">
                    <p class="m-0">Đơn Hàng<br>Đang Được Giao</p>
                </div>
            </div>
            <div class="col d-flex icon-content p-0 d-flex justify-content-center align-items-center">
                <img class="icon" src="https://i.imgur.com/HdsziHP.png">
                <div class="">
                    <p class="m-0">Đơn Hàng<br>Đã Đến</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"></script>