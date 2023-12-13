<?php

require './ketnoi/ketnoinhapkho.php';

// Nếu người dùng submit form
if (!empty($_POST['add_nhapkho']))
{
    // Lay data
    $data['masp']          = isset($_POST['id']) ? $_POST['id'] : '';
    $data['tensp']        = isset($_POST['name']) ? $_POST['name'] : '';
    $data['ngaynhap']        = isset($_POST['ngaynhap']) ? $_POST['ngaynhap'] : '';
    $data['soluong']        = isset($_POST['soluong']) ? $_POST['soluong'] : '';
    $data['lohang']        = isset($_POST['lohang']) ? $_POST['lohang'] : '';
    $data['hansudung']        = isset($_POST['date']) ? $_POST['date'] : '';
    $data['gianhap']        = isset($_POST['gia']) ? $_POST['gia'] : '';
    

    // Validate thong tin
    $errors = array();
    if (empty($data['tensp'])){
        $errors['tensp'] = 'Chưa nhập tên sản phẩm';
    }

    if (empty($data['masp'])){
        $errors['masp'] = 'Chưa nhập mã sản phẩm';
    }
    if (empty($data['ngaynhap'])){
        $errors['ngaynhap'] = 'Chưa nhập ngày sản phẩm';
    }
    if (empty($data['soluong'])){
        $errors['soluong'] = 'Chưa nhập số lượng sản phẩm';
    }
    if (empty($data['lohang'])){
        $errors['lohang'] = 'Chưa nhập lô hàng';
    }
    if (empty($data['hansudung'])){
        $errors['date'] = 'Chưa nhập hạn sử dụng của sản phẩm';
    }
    if (empty($data['gianhap'])){
        $errors['gia'] = 'Chưa nhập giá sản phẩm';
    }

    // Neu ko co loi thi insert
    if (!$errors){
        add_nhapkho($data['masp'], $data['tensp'], $data['ngaynhap'], $data['soluong'], $data['lohang'], $data['hansudung'], $data['gianhap']);
        add_sp($data['masp'], $data['tensp'], $data['gianhap']+ 5000);
        add_kho($data['masp'], $data['tensp'], $data['ngaynhap'], $data['soluong'], $data['lohang'], $data['hansudung'], $data['gianhap']);
        
        // Trở về trang danh sách
        header ("location: nhapkho.php");
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
                <form method="post" action="themnhapkho.php">
                    <table width="50%" border="1" cellspacing="0" cellpadding="10" class="nhapkho">
                        <tr class="tr_nhapkho">
                            <td class="td_dvt">Mã sản phẩm:</td>
                            <td class="td_dvt">
                                <input type="text" name="id" value="<?php echo !empty($data['masp']) ? $data['masp'] : ''; ?>"/>
                                <?php if (!empty($errors['masp'])) echo $errors['masp']; ?>
                            </td>
                        </tr>
                        <tr class="tr_nhapkho">
                            <td class="td_dvt">Tên sản phẩm:</td>
                            <td class="td_dvt">
                                <input type="text" name="name" value="<?php echo !empty($data['tensp']) ? $data['tensp'] : ''; ?>"/>
                                <?php if (!empty($errors['tensp'])) echo $errors['tensp']; ?>
                            </td>
                        </tr>
                        <tr class="tr_nhapkho">
                            <td class="td_dvt">Ngày nhập:</td>
                            <td class="td_dvt">
                                <input type="date" name="ngaynhap" value="<?php echo !empty($data['ngaynhap']) ? $data['ngaynhap'] : ''; ?>"/>
                                <?php if (!empty($errors['ngaynhap'])) echo $errors['ngaynhap']; ?>
                            </td>
                        </tr>>
                            <tr class="tr_nhapkho">
                            <td class="td_dvt">Số lượng:</td>
                            <td class="td_dvt">
                                <input type="text" name="soluong" value="<?php echo !empty($data['soluong']) ? $data['soluong'] : ''; ?>"/>
                                <?php if (!empty($errors['soluong'])) echo $errors['soluong']; ?>
                            </td>
                            </tr>
                            <tr class="tr_nhapkho">
                            <td class="td_dvt"> Lô Hàng:</td>
                            <td class="td_dvt">
                                <input type="text" name="lohang" value="<?php echo !empty($data['lohang']) ? $data['lohang'] : ''; ?>"/>
                                <?php if (!empty($errors['lohang'])) echo $errors['lohang']; ?>
                            </td>
                            </tr>
                            <tr class="tr_nhapkho">
                            <td class="td_dvt">Hạn sử dụng:</td>
                            <td class="td_dvt">
                                <input type="date" name="date" value="<?php echo !empty($data['hansudung']) ? $data['hansudung'] : ''; ?>"/>
                                <?php if (!empty($errors['hansudung'])) echo $errors['hansudung']; ?>
                            </td>
                        </tr>
                        <tr class="tr_nhapkho">
                            <td class="td_dvt">Giá nhập:</td>
                            <td class="td_dvt">
                                <input type="text" name="gia" value="<?php echo !empty($data['gianhap']) ? $data['gianhap'] : ''; ?>"/>
                                <?php if (!empty($errors['gianhap'])) echo $errors['gianhap']; ?>
                            </td>
                        </tr>
                        <tr class="tr_nhapkho">
                            <td class="td_nhapkho" colspan="2">
                                <input type="submit" name="add_nhapkho" value="Lưu" style="width: 50px;">
                            </td>
                        </tr>
                    </table>
                </form>
            </fieldset>
    
 
</body>
</html>
