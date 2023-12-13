<?php

require './ketnoi/ketnoinhapkho.php';

// Thực hiện xóa
$id = isset($_POST['id']) ? $_POST['id'] : '';
if ($id){
    xoanhapkho ($id);
}

// Trở về trang danh sách
header("location: nhapkho.php");