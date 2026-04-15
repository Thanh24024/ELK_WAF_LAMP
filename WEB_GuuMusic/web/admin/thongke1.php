<?php
include '../components/connect.php';

// session_start();

// $admin_id = $_SESSION['admin_id'];

// if (!isset($admin_id)) {
//     header('location:admin_login.php');
// }

$limit = 3; // Số lượng sản phẩm bạn muốn hiển thị
$products = [];

// Truy vấn SQL để lấy thông tin sản phẩm được mua nhiều nhất
$select_products_query = "
    SELECT 
        SUBSTRING_INDEX(SUBSTRING_INDEX(total_products, '(', 1), ' x ', 1) AS product_name,
        SUM(CAST(SUBSTRING_INDEX(SUBSTRING_INDEX(total_products, ' x ', -1), ')', 1) AS SIGNED)) AS total_quantity
    FROM 
        orders
    GROUP BY 
        product_name
    ORDER BY 
        total_quantity DESC
    LIMIT $limit
";

$select_products = $conn->prepare($select_products_query);
$select_products->execute();

while ($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)) {
    $products[] = $fetch_product;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Biểu đồ Sản phẩm được mua nhiều nhất</title>
</head>

<body>
    <div style="width: 60%; margin: auto;">
        <canvas id="myChart"></canvas>
    </div>

    <script>
        const labels = <?= json_encode(array_column($products, 'product_name')) ?>;
        const data = {
            labels: labels,
            datasets: [
                {
                    label: 'Số lượng bán',
                    data: <?= json_encode(array_column($products, 'total_quantity')) ?>,
                    backgroundColor: ['#FF3300', '#FFFF00', '#0066FF'],
                    borderColor: ['rgb(255, 99, 132)', 'rgb(54, 162, 235)', 'rgb(255, 206, 86)'],
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

