<?php

require './ketnoi/ketnoiDonViTinh.php';

// Nếu người dùng submit form
if (!empty($_POST['add_donvitinh']))
{
    // Lay data
    $data['madonvitinh']          = isset($_POST['id']) ? $_POST['id'] : '';
    $data['tendonvitinh']        = isset($_POST['name']) ? $_POST['name'] : '';

    

    // Validate thong tin
    $errors = array();
    if (empty($data['tendonvitinh'])){
        $errors['tendonvitinh'] = 'Chưa nhập tên đơn vị tính';
    }

    if (empty($data['madonvitinh'])){
        $errors['madonvitinh'] = 'Chưa nhập mã đơn vị tính';
    }
   

    // Neu ko co loi thi insert
    if (!$errors){
        add_donvitinh($data['madonvitinh'], $data['tendonvitinh']);
        // Trở về trang danh sách
        header("location: DonViTinh.php");
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
                <h1>Thêm nhà cung cấp</h1>
                <form method="post" action="themdonvitinh.php">
                    <table width="50%" border="1" cellspacing="0" cellpadding="10" class="donvitinh">
                        <tr class="tr_dovitinh">
                            <td class="td_dvt">Mã đơn vị tính:</td>
                            <td class="td_dvt">
                                <input type="text" name="id" value="<?php echo !empty($data['madonvitinh']) ? $data['madonvitinh'] : ''; ?>"/>
                                <?php if (!empty($errors['madonvitinh'])) echo $errors['madonvitinh']; ?>
                            </td>
                        </tr>
                        <tr class="tr_donvitinh">
                            <td class="td_dvt">Tên đơn vị tính:</td>
                            <td class="td_dvt">
                                <input type="text" name="name" value="<?php echo !empty($data['tendonvitinh']) ? $data['tendonvitinh'] : ''; ?>"/>
                                <?php if (!empty($errors['tendonvitinh'])) echo $errors['tendonvitinh']; ?>
                            </td>
                        </tr>
                        
                        <tr class="tr_donvitinh">
                            <td class="td_dvt" colspan="2">
                                <input type="submit" name="add_donvitinh" value="Lưu" style="width: 50px;">
                            </td>
                        </tr>
                    </table>
                </form>
            </fieldset>
    
 
</body>
</html>
