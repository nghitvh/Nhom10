<?php

require './ketnoi/ketnoidonvitinh.php';

// Lấy thông tin hiển thị lên để người dùng sửa
$id = isset($_GET['id']) ? $_GET['id'] : '';
if ($id){
    $data = get_donvitinh($id);
}

// Nếu không có dữ liệu tức không tìm thấy sinh viên cần sửa
if (!$data){
   header("location: DonViTinh.php");
}

// Nếu người dùng submit form
if (!empty($_POST['sua_dvt']))
{
    // Lay data
    $data['madonvitinh']   = isset($_POST['id']) ? $_POST['id'] : '';
    $data['tendonvitinh'] = isset($_POST['name']) ? $_POST['name'] : '';
    
    // Validate thong tin
    $errors = array();
    if (empty($data['madonvitinh'])){
        $errors['madonvitinh'] = 'Nhập mã đơn vị tính!';
    }
    if (empty($data['tendonvitinh'])){
        $errors['tendonvitinh'] = 'Nhập tên đơn vị tính!';
    }
    
    // Neu ko co loi thi insert
    if (!$errors){
        edit_donvitinh($data['madonvitinh'], $data['tendonvitinh'] );
        // Trở về trang danh sách
        header("location: DonViTinh.php");
    }
}

disconnect_db();
?>

<!DOCTYPE html>
<html>
<head>
    <title> Đơn vị tính </title>
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
            <h1>Sửa đơn vị tính </h1>
            <div class="div"><a href="DonViTinh.php">Trở về</a></div>
            <form method="post" action="suadonvitinh.php?id=<?php echo $data['madonvitinh']; ?>">
                <table width="50%" border="1" cellspacing="0" cellpadding="10" class="tb_donvitinh">
                    <tr>
                        <td class="td_donvitinh">Mã đơn vị tính</td>
                        <td class="td_donvitinh">
                            <input type="text" name="id" value="<?php echo $data['madonvitinh']; ?>" readonly/>
                        </td>
                       
                    </tr>
                    <tr>
                        <td class="td_donvitinh">Tên đơn vị tính </td>
                        <td class="td_donvitinh">
                            <input type="text" name="name" value="<?php echo $data['tendonvitinh']; ?>"/>
                        </td>
                        <td class="td_donvitinh">
                            <?php if (!empty($errors['tendonvitinh'])) echo $errors['tendonvitinh']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" class="td_donvitinh">
                            <input type="hidden" name="id" value="<?php echo $data['madonvitinh']; ?>"/>
                            <input type="submit" name="sua_dvt" value="Lưu" style="width:50px"/>
                        </td>
                    </tr>
                </table>
            </form>
        </fieldset>
</body>
</html>