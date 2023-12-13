<?php

require './ketnoi/ketnoisanpham.php';

// Nếu người dùng submit form
if (!empty($_POST['add_sanpham']))
{
    // Lay data
    $data['masp']          = isset($_POST['id']) ? $_POST['id'] : '';
    $data['tensp']        = isset($_POST['name']) ? $_POST['name'] : '';
    $data['giaban']        = isset($_POST['gia']) ? $_POST['gia'] : '';
    

    // Validate thong tin
    $errors = array();
    if (empty($data['tensp'])){
        $errors['tensp'] = 'Chưa nhập tên sản phẩm';
    }

    if (empty($data['masp'])){
        $errors['masp'] = 'Chưa nhập mã sản phẩm';
    }
    if (empty($data['giaban'])){
        $errors['giaban'] = 'Chưa nhập giá sản phẩm';
    }

    // Neu ko co loi thi insert
    if (!$errors){
        add_sanpham($data['masp'], $data['tensp'], $data['giaban']);
        // Trở về trang danh sách
        header("location: Sanpham.php");
    }
}

disconnect_db();
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
        
            <fieldset>
                <h1>Thêm sản phẩm</h1>
                <form method="post" action="themsanpham.php">
                    <table width="50%" border="1" cellspacing="0" cellpadding="10" class="sanpham">
                        <tr class="tr_sanpham">
                            <td class="td_dvt">Mã sản phẩm:</td>
                            <td class="td_dvt">
                                <input type="text" name="id" value="<?php echo !empty($data['masp']) ? $data['masp'] : ''; ?>"/>
                                <?php if (!empty($errors['masp'])) echo $errors['masp']; ?>
                            </td>
                        </tr>
                        <tr class="tr_sanpham">
                            <td class="td_dvt">Tên sản phẩm:</td>
                            <td class="td_dvt">
                                <input type="text" name="name" value="<?php echo !empty($data['tensp']) ? $data['tensp'] : ''; ?>"/>
                                <?php if (!empty($errors['tensp'])) echo $errors['tensp']; ?>
                            </td>
                        </tr>
                        <tr class="tr_sanpham">
                            <td class="td_dvt">Giá bán:</td>
                            <td class="td_dvt">
                                <input type="text" name="gia" value="<?php echo !empty($data['giaban']) ? $data['giaban'] : ''; ?>"/>
                                <?php if (!empty($errors['giaban'])) echo $errors['giaban']; ?>
                            </td>
                        </tr>
                        <tr class="tr_sanpham">
                            <td class="td_sp" colspan="2">
                                <input type="submit" name="add_sanpham" value="Lưu" style="width: 50px;">
                            </td>
                        </tr>
                    </table>
                </form>
            </fieldset>
    
 
</body>
</html>
