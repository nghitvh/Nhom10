<?php

require './ketnoi/ketnoinhapkho.php';

// Lấy thông tin hiển thị lên để người dùng sửa
$id = isset($_GET['id']) ? $_GET['id'] : '';
if ($id){
    $data = get_nhapkho($id);
}

// Nếu không có dữ liệu tức không tìm thấy sinh viên cần sửa
if (!$data){
   header("location: nhapkho.php");
}

// Nếu người dùng submit form
if (!empty($_POST['sua_sp']))
{
    // Lay data
    $data['masp']   = isset($_POST['id']) ? $_POST['id'] : '';
    $data['tensp'] = isset($_POST['name']) ? $_POST['name'] : '';
    $data['ngaynhap'] = isset($_POST['ngaynhap']) ? $_POST['ngaynhap'] : '';
    $data['soluong'] = isset($_POST['soluong']) ? $_POST['soluong'] : '';
    $data['lohang'] = isset($_POST['lohang']) ? $_POST['lohang'] : '';
    $data['hansudung'] = isset($_POST['date']) ? $_POST['date'] : '';
    $data['gianhap'] = isset($_POST['gianhap']) ? $_POST['gianhap'] : '';
    // Validate thong tin
    $errors = array();
    if (empty($data['masp'])){
        $errors['masp'] = 'Nhập mã sản phẩm!';
    }
    if (empty($data['tensp'])){
        $errors['tensp'] = 'Nhập tên sản phẩm!';
    }
    if (empty($data['ngaynhap'])){
        $errors['ngaynhap'] = 'Nhập ngày nhập sản phẩm!';
    }
    if (empty($data['soluong'])){
        $errors['soluong'] = 'Nhập số lượng sản phẩm!';
    }
    if (empty($data['lohang'])){
        $errors['lohang'] = 'Nhập lô hàng !';
    }
    if (empty($data['hansudung'])){
        $errors['hansudung'] = 'Nhập hạn sử dụng sản phẩm!';
    }
    if (empty($data['gianhap'])){
        $errors['gianhap'] = 'Nhập giá sản phẩm!';
    }
    
    // Neu ko co loi thi insert
    if (!$errors){
        edit_nhapkho($data['masp'], $data['tensp'], $data['ngaynhap'], $data['soluong'], $data['lohang'], $data['hansudung'], $data['gianhap']);
        // Trở về trang danh sách
        header("location: Nhapkho.php");
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
<body style="background-color: #F9EBEA;">
    <fieldset>
            <h4>Sửa nhập kho</h4>
            <div class="div"><a href="nhapkho.php">Trở về</a></div>
            <form method="post" action="suanhapkho.php?id=<?php echo $data['masp']; ?>">
                <table width="50%" border="1" cellspacing="0" cellpadding="10" class="tb_nhapkho">
                    <tr>
                        <td class="td_nhapkho">Mã sản phẩm</td>
                        <td class="td_nhapkho">
                            <input type="text" name="id" value="<?php echo $data['masp']; ?>" readonly/>
                        </td>
                       
                    </tr>
                    <tr>
                        <td class="td_nhapkho">Tên sản phẩm</td>
                        <td class="td_nhapkho">
                            <input type="text" name="name" value="<?php echo $data['tensp']; ?>"/>
                        </td>
                        <td class="td_nhapkho">
                            <?php if (!empty($errors['tensp'])) echo $errors['tensp']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="td_nhapkho">Ngày nhập</td>
                        <td class="td_nhapkho">
                            <input type="text" name="ngaynhap" value="<?php echo $data['ngaynhap']; ?>"/>
                        </td>
                        <td class="td_nhapkho">
                            <?php if (!empty($errors['ngaynhap'])) echo $errors['ngaynhap']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="td_nhapkho">Số lượng</td>
                        <td class="td_nhapkho">
                            <input type="text" name="soluong" value="<?php echo $data['soluong']; ?>"/>
                        </td>
                        <td class="td_nhapkho">
                            <?php if (!empty($errors['soluong'])) echo $errors['soluong']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="td_nhapkho">Lô hàng</td>
                        <td class="td_nhapkho">
                            <input type="text" name="lohang" value="<?php echo $data['lohang']; ?>"/>
                        </td>
                        <td class="td_nhapkho">
                            <?php if (!empty($errors['lohang'])) echo $errors['lohang']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="td_nhapkho">Hạn sử dụng</td>
                        <td class="td_nhapkho">
                            <input type="text" name="date" value="<?php echo $data['hansudung']; ?>"/>
                        </td>
                        <td class="td_nhapkho">
                            <?php if (!empty($errors['hansudung'])) echo $errors['hansudung']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="td_nhapkho">Giá nhập</td>
                        <td class="td_nhapkho">
                            <input type="text" name="gianhap" value="<?php echo $data['gianhap']; ?>"/>
                        </td>
                        <td class="td_nhapkho">
                            <?php if (!empty($errors['gianhap'])) echo $errors['gianhap']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="7" class="td_nhapkho">
                            <input type="hidden" name="id" value="<?php echo $data['manhapkho']; ?>"/>
                            <input type="submit" name="sua_sp" value="Lưu" style="width:50px"/>
                        </td>
                    </tr>
                </table>
            </form>
        </fieldset>
</body>
</html>