<div class="content-body">
    <div class="container-fluid">
        <div class="row m-5">

            <style>
                * {
                    margin: 0;
                    padding: 0;
                    font-family: sans-serif;
                }

                .chartMenu {
                    width: 100vw;
                    height: 40px;
                    background: #1A1A1A;
                    color: rgba(54, 162, 235, 1);
                }

                .chartMenu p {
                    padding: 10px;
                    font-size: 20px;
                }

                .chartCard {
                    width: 100vw;
                    height: calc(100vh - 40px);
                    background: rgba(54, 162, 235, 0.2);
                    display: flex;
                    align-items: center;
                    justify-content: center;
                }

                .chartBox {
                    width: 700px;
                    padding: 20px;
                    border-radius: 20px;
                    border: solid 3px rgba(54, 162, 235, 1);
                    background: white;
                }
            </style>

            <input type="date" onchange="startDateFilter(this)" value="2023-11-01" min="2023-10-1"
                style="margin-right: 10px;">
            <input type="date" onchange="endDateFilter(this)" value="2023-12-31" min="2023-10-1">

            <canvas id="myChart"></canvas>

            <?php
            try {
                // Khởi tạo kết nối PDO
                $pdo = new PDO("mysql:host=localhost;dbname=duan1;charset=utf8", "root", "");

                $sql = "SELECT * FROM duan1.bill";
                $result = $pdo->query($sql);

                if ($result->rowCount() > 0) {
                    $dateArray = [];
                    $priceArray = [];

                    while ($row = $result->fetch()) {
                        $dateArray[] = $row["date"];
                        $priceArray[] = $row["total"];
                    }
                    unset($result);

                    // Tạo mảng mới cho việc gom nhóm giá trị theo ngày
                    $groupedData = [];

                    foreach ($dateArray as $index => $day) {
                        $formattedDay = date('Y-m-d', strtotime($day));

                        // Nếu ngày chưa tồn tại trong mảng gom nhóm, thêm vào mảng mới
                        if (!isset($groupedData[$formattedDay])) {
                            $groupedData[$formattedDay] = $priceArray[$index];
                        } else {
                            // Ngày đã tồn tại, cộng thêm giá trị vào giá trị tổng tương ứng
                            $groupedData[$formattedDay] += $priceArray[$index];
                        }
                    }

                    // Cập nhật dữ liệu cho biểu đồ
                    $data = [
                        'labels' => array_keys($groupedData),
                        'datasets' => [
                            [
                                'label' => 'Tổng Doanh Thu Theo Ngày',
                                'data' => array_values($groupedData),
                                'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                                'borderColor' => 'rgba(54, 162, 235, 1)',
                                'borderWidth' => 1
                            ]
                        ]
                    ];

                    // Inser the HTML and JavaScript code here
                    echo '
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js/dist/chart.umd.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns/dist/chartjs-adapter-date-fns.bundle.min.js"></script>
        
        <script>
            const dateArrayJS = ' . json_encode($dateArray) . ';
            console.log(dateArrayJS);
        
            const dateChartJS = dateArrayJS.map((day, index) => {
                let dayjs = new Date(day);
                return dayjs.setHours(0, 0, 0, 0);
            });
            console.log(dateChartJS);
        
            // setup 
            const data = ' . json_encode($data) . ';
        
            // config 
            const config = {
                type: "bar",
                data,
                options: {
                    scales: {
                        x: {
                            min: "2023-11-01",
                            max: "2023-12-31",
                            type: "time",
                            time: {
                                unit: "day"
                            }
                        },
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            };
        
            // render init block
            const myChart = new Chart(
                document.getElementById("myChart"),
                config
            );
        
            function startDateFilter(date) {
                const startDate = new Date(date.value);
                console.log(startDate.setHours(0, 0, 0, 0));
                myChart.config.options.scales.x.min = startDate.setHours(0, 0, 0, 0);
                myChart.update();
            }
        
            function endDateFilter(date) {
                const endDate = new Date(date.value);
                console.log(endDate.setHours(0, 0, 0, 0));
                myChart.config.options.scales.x.max = endDate.setHours(0, 0, 0, 0);
                myChart.update();
            }
        </script>';
                } else {
                    echo "Không Có Kết Quả";
                }
            } catch (PDOException $e) {
                die("Error: " . $e->getMessage());
            } finally {
                // Đảm bảo đóng kết nối sau khi sử dụng
                unset($pdo);
            }
            ?>

        </div>
    </div>
</div>