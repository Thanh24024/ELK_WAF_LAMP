<?php
include '../components/connect.php';

// session_start();

// $admin_id = $_SESSION['admin_id'];

// if (!isset($admin_id)) {
//     header('location:admin_login.php');
// }

// Xác định khoảng thời gian của 3 tuần, 2 tuần, 1 tuần trước và tuần này
$three_months_ago_start = date('2023-10-1', strtotime('-3 months', strtotime('first day of this month')));
$three_months_ago_end = date('2023-10-31', strtotime('last day of this month', strtotime('-1 day', strtotime('-3 months'))));

$two_months_ago_start = date('2023-11-1', strtotime('-2 months', strtotime('first day of this month')));
$two_months_ago_end = date('2023-11-31', strtotime('last day of this month', strtotime('-1 day', strtotime('-2 months'))));

$last_month_start = date('2023-12-1', strtotime('first day of this month'));
$last_month_end = date('2023-12-31', strtotime('last day of this month', strtotime('-1 day')));

$this_month_start = date('2024-1-1', strtotime('first day of this month'));
$this_month_end = date('2024-1-31', strtotime('last day of this month'));

// Thực hiện truy vấn SQL để lấy số lượng người dùng mới đăng ký trong từng khoảng thời gian
$select_users_three_months_ago = $conn->prepare("SELECT COUNT(*) as new_users_count FROM `users` WHERE `create_date` BETWEEN ? AND ?");
$select_users_three_months_ago->execute([$three_months_ago_start, $three_months_ago_end]);
$new_users_three_months_ago = $select_users_three_months_ago->fetch(PDO::FETCH_ASSOC)['new_users_count'];

$select_users_two_months_ago = $conn->prepare("SELECT COUNT(*) as new_users_count FROM `users` WHERE `create_date` BETWEEN ? AND ?");
$select_users_two_months_ago->execute([$two_months_ago_start, $two_months_ago_end]);
$new_users_two_months_ago = $select_users_two_months_ago->fetch(PDO::FETCH_ASSOC)['new_users_count'];

$select_users_last_month = $conn->prepare("SELECT COUNT(*) as new_users_count FROM `users` WHERE `create_date` BETWEEN ? AND ?");
$select_users_last_month->execute([$last_month_start, $last_month_end]);
$new_users_last_month = $select_users_last_month->fetch(PDO::FETCH_ASSOC)['new_users_count'];

$select_users_this_month = $conn->prepare("SELECT COUNT(*) as new_users_count FROM `users` WHERE `create_date` BETWEEN ? AND ?");
$select_users_this_month->execute([$this_month_start, $this_month_end]);
$new_users_this_month = $select_users_this_month->fetch(PDO::FETCH_ASSOC)['new_users_count'];


// Biểu đồ
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Biểu đồ Số lượng Người dùng mới</title>
</head>

<body>
    <div style="width: 60%; margin: auto;">
        <canvas id="myChart" style="margin-top: 70px;"></canvas>
    </div>

    <script>
        const labels = ['Tháng 10', 'Tháng 11', 'Tháng 12', 'Tháng 1']; // Thay đổi label theo tháng bạn muốn hiển thị
        const data = {
            labels: labels,
            datasets: [
                {
                    label: 'Số lượng Người dùng mới',
                    data: [<?= $new_users_three_months_ago ?>, <?= $new_users_two_months_ago ?>, <?= $new_users_last_month ?>, <?= $new_users_this_month ?>],
                    backgroundColor: [
                        '#FF6384',  
                        '#3366CC',
                        '#FFFF00',
                        '#00CC00',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                    ],
                    borderWidth: 1
                }
            ]
        };

        const config = {
            type: 'bar',
            data: data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        labels: {
                            fontColor: 'white' // Thay đổi màu của label ở đây
                        }
                    }
                }
            },
        };

        var myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>
</body>

</html>


