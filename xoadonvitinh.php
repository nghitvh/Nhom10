<?php

require './ketnoi/ketnoiDonViTinh.php';

// Thực hiện xóa
$id = isset($_POST['id']) ? $_POST['id'] : '';
if ($id){
    xoadonvitinh($id);
}

// Trở về trang danh sách
header("location: DonViTinh.php");