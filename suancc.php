<?php

require './ketnoi/ketnoinhacungcap.php';

// Lấy thông tin hiển thị lên để người dùng sửa
$id = isset($_GET['id']) ? $_GET['id'] : '';
if ($id){
    $data = get_ncc($id);
}

// Nếu không có dữ liệu tức không tìm thấy sinh viên cần sửa
if (!$data){
   header("location: ncc.php");
}

// Nếu người dùng submit form
if (!empty($_POST['suancc']))
{
    // Lay data
    $data['mancc']   = isset($_POST['id']) ? $_POST['id'] : '';
    $data['tenncc'] = isset($_POST['name']) ? $_POST['name'] : '';
    
    // Validate thong tin
    $errors = array();
    if (empty($data['mancc'])){
        $errors['mancc'] = 'Nhập mã nhà cung cấp!';
    }
    if (empty($data['tenncc'])){
        $errors['tenncc'] = 'Nhập tên nhà cung cấp!';
    }
    
    // Neu ko co loi thi insert
    if (!$errors){
        edit_ncc($data['mancc'], $data['tenncc'] );
        // Trở về trang danh sách
        header("location: ncc.php");
    }
}

disconnect_db();
?>

<!DOCTYPE html>
<html>
<head>
    <title> Nhà cung cấp </title>
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
            <h1>Sửa nhà cung cấp </h1>
            <div class="div"><a href="ncc.php">Trở về</a></div>
            <form method="post" action="suancc.php?id=<?php echo $data['mancc']; ?>">
                <table width="50%" border="1" cellspacing="0" cellpadding="10" class="tb_ncc">
                    <tr>
                        <td class="td_ncc">Mã nhà cung cấp</td>
                        <td class="td_ncc">
                            <input type="text" name="id" value="<?php echo $data['mancc']; ?>" readonly/>
                        </td>
                       
                    </tr>
                    <tr>
                        <td class="td_ncc">Tên nhà cung cấp </td>
                        <td class="td_ncc">
                            <input type="text" name="name" value="<?php echo $data['tenncc']; ?>"/>
                        </td>
                        <td class="td_ncc">
                            <?php if (!empty($errors['tenncc'])) echo $errors['tenncc']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" class="td_ncc">
                            <input type="hidden" name="id" value="<?php echo $data['mancc']; ?>"/>
                            <input type="submit" name="sua_dvt" value="Lưu" style="width:50px"/>
                        </td>
                    </tr>
                </table>
            </form>
        </fieldset>
</body>
</html>