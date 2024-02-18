<?php
// Kết nối đến cơ sở dữ liệu (sử dụng mysqli hoặc PDO)
$servername = "your_servername";
$username = "your_username";
$password = "your_password";
$dbname = "your_dbname";

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Xử lý khi form được gửi đi
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selected_month = $_POST["month"];
    $selected_year = $_POST["year"];

    // Truy vấn SQL để lấy tổng doanh thu theo tháng
    $sql = "SELECT SUM(amount) AS total_revenue FROM transactions WHERE MONTH(transaction_date) = $selected_month AND YEAR(transaction_date) = $selected_year";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $total_revenue = $row["total_revenue"];
        echo "Doanh thu tháng $selected_month năm $selected_year là: $total_revenue";
    } else {
        echo "Không có dữ liệu.";
    }
}

// Đóng kết nối
$conn->close();
?>

<!-- Form thống kê -->
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label for="month">Chọn tháng:</label>
    <select name="month">
        <?php
        for ($i = 1; $i <= 12; $i++) {
            echo "<option value=\"$i\">Tháng $i</option>";
        }
        ?>
    </select>

    <label for="year">Chọn năm:</label>
    <select name="year">
        <?php
        $current_year = date("Y");
        for ($i = $current_year; $i >= $current_year - 10; $i--) {
            echo "<option value=\"$i\">Năm $i</option>";
        }
        ?>
    </select>

    <input type="submit" value="Thống kê">
</form>
