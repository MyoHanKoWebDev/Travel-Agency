<?php
header('Content-Type: application/json');
include("connection/dbcon.php");

$year = isset($_GET['year']) ? (int)$_GET['year'] : date("Y"); // Get selected year, default to current

$sql = "SELECT MONTH(bDate) AS month, pgPrice, bkPQ
        FROM booking 
        JOIN bookingDetail ON booking.bID = bookingDetail.bID       
        JOIN package ON bookingDetail.pgID = package.pgID
        WHERE YEAR(bDate) = ? AND bstatus = 'Confirmed'
        ORDER BY MONTH(bDate)";

$stmt = $con->prepare($sql);
$stmt->bind_param("i", $year);
$stmt->execute();
$result = $stmt->get_result();

$incomeData = [];
while ($row = $result->fetch_assoc()) {
    $month = (int)$row['month'];

    $priceInt = (int)str_replace(",", "", $row['pgPrice']);
    
    $priceFinal = $priceInt * $row['bkPQ'];

    $serviceChg = $priceFinal * 0.03;
    
    $totalIncome = $priceFinal + $serviceChg;

    $priceCur = number_format($totalIncome, 0, '', ',');

    // Store the total income per month
    if (!isset($incomeData[$month])) {
        $incomeData[$month] = 0;
    }
    $incomeData[$month] += $totalIncome;
}

// Ensure all 12 months are included
$months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
$labels = [];
$data = [];

for ($i = 1; $i <= 12; $i++) {
    $labels[] = $months[$i - 1];
    $data[] = isset($incomeData[$i]) ? $incomeData[$i] : 0;
}

// Response JSON
$response = ["success" => true, "labels" => $labels, "data" => $data];
echo json_encode($response);

$con->close();
?>
