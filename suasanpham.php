<?php

require './ketnoi/ketnoisanpham.php';

// Lấy thông tin hiển thị lên để người dùng sửa
$id = isset($_GET['id']) ? $_GET['id'] : '';
if ($id){
    $data = get_sanpham($id);
}

// Nếu không có dữ liệu tức không tìm thấy sinh viên cần sửa
if (!$data){
   header("location: Sanpham.php");
}

// Nếu người dùng submit form
if (!empty($_POST['sua_sp']))
{
    // Lay data
    $data['masp']   = isset($_POST['id']) ? $_POST['id'] : '';
    $data['tensp'] = isset($_POST['name']) ? $_POST['name'] : '';
    $data['giaban'] = isset($_POST['gia']) ? $_POST['gia'] : '';
    // Validate thong tin
    $errors = array();
    if (empty($data['tensp'])){
        $errors['tensp'] = 'Nhập tên đơn vị tính!';
    }
    
    // Neu ko co loi thi insert
    if (!$errors){
        edit_sp($data['masp'], $data['tensp'], $data['giaban']);
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
<body style="background-color: #F9EBEA;">
    <fieldset>
            <h1>Sửa sản phẩm</h1>
            <div class="div"><a href="Sanpham.php">Trở về</a></div>
            <form method="post" action="suasanpham.php?id=<?php echo $data['masp']; ?>">
                <table width="50%" border="1" cellspacing="0" cellpadding="10" class="tb_sanpham">
                    <tr>
                        <td class="td_sanpham">Mã sản phẩm</td>
                        <td class="td_sanpham">
                            <input type="text" name="id" value="<?php echo $data['masp']; ?>" readonly/>
                        </td>
                       
                    </tr>
                    <tr>
                        <td class="td_sanpham">Tên sản phẩm</td>
                        <td class="td_sanpham">
                            <input type="text" name="name" value="<?php echo $data['tensp']; ?>"/>
                        </td>
                        <td class="td_sanpham">
                            <?php if (!empty($errors['tensp'])) echo $errors['tensp']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="td_sanpham">Giá bán</td>
                        <td class="td_sanpham">
                            <input type="text" name="gia" value="<?php echo $data['giaban']; ?>"/>
                        </td>
                        <td class="td_sanpham">
                            <?php if (!empty($errors['giaban'])) echo $errors['giaban']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" class="td_sanpham">
                            <input type="hidden" name="id" value="<?php echo $data['masp']; ?>"/>
                            <input type="submit" name="sua_sp" value="Lưu" style="width:50px"/>
                        </td>
                    </tr>
                </table>
            </form>
        </fieldset>
</body>
</html>