<?php

require './ketnoi/ketnoibanhang.php';

// Thực hiện xóa
$id = isset($_POST['id']) ? $_POST['id'] : '';
if ($id){
    xoabanhang ($id);
}

// Trở về trang danh sách
header("location: banhang.php");