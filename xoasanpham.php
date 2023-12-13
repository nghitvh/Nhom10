<?php

require './ketnoi/ketnoisanpham.php';

// Thực hiện xóa
$id = isset($_POST['id']) ? $_POST['id'] : '';
if ($id){
    xoasanpham($id);
}

// Trở về trang danh sách
header("location: Sanpham.php");