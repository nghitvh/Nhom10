<?php
session_start();
include("ketnoi/ketnoi.php");

$masp = $_REQUEST["msp"];

// Sử dụng prepared statement để tránh SQL Injection
$sql_select = "SELECT * FROM sanpham WHERE masp = ?";
$stmt_select = mysqli_prepare($kn, $sql_select);
mysqli_stmt_bind_param($stmt_select, "s", $masp);
mysqli_stmt_execute($stmt_select);
$result_select = mysqli_stmt_get_result($stmt_select);

// Kiểm tra xem có dòng dữ liệu nào trả về không
if ($row = mysqli_fetch_array($result_select)) {
    $tensp = $row["tensp"];
    $giaban = $row["giaban"];

    // Sử dụng prepared statement để chèn dữ liệu vào bảng gio_hang
    $sql_insert = "INSERT INTO gio_hang (masp, tensp, giaban) VALUES (?, ?, ?)";
    $stmt_insert = mysqli_prepare($kn, $sql_insert);
    mysqli_stmt_bind_param($stmt_insert, "ssd", $masp, $tensp, $giaban);
    mysqli_stmt_execute($stmt_insert);

    echo "Thêm thành công";
} else {
    echo "Không tìm thấy sản phẩm";
}

// Đóng prepared statement và kết nối
mysqli_stmt_close($stmt_select);
mysqli_stmt_close($stmt_insert);
mysqli_close($kn);
?>
