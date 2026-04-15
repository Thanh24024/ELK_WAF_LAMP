<?php
include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
    header('location:admin_login.php');
}

$months = [9, 10, 11, 12];

$total_pendings_by_month = [];
$total_completes_by_month = [];

foreach ($months as $month) {
    $select_pending_month = $conn->prepare("SELECT COUNT(*) as total_pending_products FROM `orders` WHERE `payment_status` = 'pending' AND MONTH(placed_on) = ?;");
    $select_pending_month->execute([$month]);
    $fetch_pending_month = $select_pending_month->fetch(PDO::FETCH_ASSOC);
    $total_pendings_by_month[] = $fetch_pending_month['total_pending_products'] ?? 0;

    $select_completed_month = $conn->prepare("SELECT COUNT(*) as total_completed_products FROM `orders` WHERE `payment_status` = 'completed' AND MONTH(placed_on) = ?;");
    $select_completed_month->execute([$month]);
    $fetch_completed_month = $select_completed_month->fetch(PDO::FETCH_ASSOC);
    $total_completes_by_month[] = $fetch_completed_month['total_completed_products'] ?? 0;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="../img/logo2.png">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Biểu đồ Số lượng sản phẩm</title>
</head>

<body>
    <div style="width: 60%; margin: auto;">
        <canvas id="myChart"></canvas>
    </div>

    <script>
        const labels = <?= json_encode($months) ?>;
        const data = {
            labels: labels,
            datasets: [
                {
                    label: 'Chưa xác nhận',
                    data: <?= json_encode($total_pendings_by_month) ?>,
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgb(255, 99, 132)',
                    borderWidth: 1
                },
                {
                    label: 'Đã xác nhận',
                    data: <?= json_encode($total_completes_by_month) ?>,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgb(75, 192, 192)',
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
