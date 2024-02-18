<?php

$data = [
    'pageTitle' => 'Thống kê doanh số'
];

layout('header', 'admin', $data);
layout('sidebar', 'admin', $data);
layout('breadcrumb', 'admin', $data);


// Xử lý khi form được gửi đi
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selected_month = $_POST["month"];
    $selected_year = $_POST["year"];

    // Truy vấn SQL để lấy tổng doanh thu theo tháng
    $sql = firstRaw("SELECT SUM(course.price) as avenue FROM orderCourse INNER JOIN course ON orderCourse.course_id = course.id WHERE MONTH(orderCourse.create_at) = $selected_month AND YEAR(orderCourse.create_at) = $selected_year");
    $total = $sql['avenue'];

    

    if($total > 0) {
        ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th wìdth="">Tháng</th>
                        <th wìdth="">Năm</th>
                        <th wìdth="">Doanh thu</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo 'Tháng '.$selected_month ?></td>
                        <td><?php echo 'Năm '.$selected_year ?></td>
                        <td><?php echo number_format($total, 0, ',', '.') ?>đ</td>
                    </tr>
                </tbody>
            </table>
        <?php
    }else {
        ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th wìdth="">Tháng</th>
                        <th wìdth="">Năm</th>
                        <th wìdth="">Doanh thu</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo 'Tháng '.$selected_month ?></td>
                        <td><?php echo 'Năm '.$selected_year ?></td>
                        <td>0đ</td>
                    </tr>
                </tbody>
            </table>
        <?php
    }
}

?>


<!-- Form thống kê -->
<form method="post" action="" class="mt-4 p-4">
    <div class="form-group">
        <label for="month">Chọn tháng:</label>
        <select name="month" class="form-select col-4">
            <?php
            for ($i = 1; $i <= 12; $i++) {
                echo "<option value=\"$i\">Tháng $i</option>";
            }
            ?>
        </select>

        <label for="year" class="mt-4">Chọn năm:</label>
        <select name="year" class="form-select col-4">
            <?php
            $current_year = date("Y");
            for ($i = $current_year; $i >= $current_year - 10; $i--) {
                echo "<option value=\"$i\">Năm $i</option>";
            }
            ?>
        </select>
        <input type="submit" value="Thống kế" class="btn btn-primary mt-4">
        <input type="hidden" name="module" value="revenue">
        <input type="hidden" name="action" value="lists">
    </div>
</form>
