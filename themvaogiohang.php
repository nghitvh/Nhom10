<?php

require './ketnoi/ketnoisanpham.php';

// Nếu người dùng submit form
if (!empty($_POST['add_themgiohang']))
{
    // Lay data
    $data['masp']          = isset($_POST['id']) ? $_POST['id'] : '';
    $data['tensp']        = isset($_POST['name']) ? $_POST['name'] : '';
    $data['giaban']        = isset($_POST['giaban']) ? $_POST['giaban'] : '';
    
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sản Phẩm</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        .tb_dvt{
            
            width: 30%;
            margin: 10px;
            border: none;
        }
        .td_dvt{
            color: #900C3F ;
            padding: 5px;
            font-size: 16px;
            border: none;
        }
        
    </style>
</head>
<body style="background-color: #F9EBEA;"
        
 
</body>
</html>
