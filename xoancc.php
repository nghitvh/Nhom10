<?php

require './ketnoi/ketnoinhacungcap.php';

// Thực hiện xóa
$id = isset($_POST['id']) ? $_POST['id'] : '';
if ($id){
    xoancc($id);
}

// Trở về trang danh sách
header("location: ncc.php");