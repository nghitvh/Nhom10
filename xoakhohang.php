<?php

require './ketnoi/ketnoikhohang.php';

// Thực hiện xóa
$id = isset($_POST['id']) ? $_POST['id'] : '';
if ($id){
    xoakhohang($id);
}

// Trở về trang danh sách
header("location: khohang.php");