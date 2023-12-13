<?php

require './ketnoi/ketnoinhacungcap.php';

// Nếu người dùng submit form
if (!empty($_POST['add_ncc']))
{
    // Lay data
    $data['mancc']          = isset($_POST['id']) ? $_POST['id'] : '';
    $data['tenncc']        = isset($_POST['name']) ? $_POST['name'] : '';
   

    // Validate thong tin
    $errors = array();
    if (empty($data['tenncc'])){
        $errors['tenncc'] = 'Chưa nhập tên nhà cung cấp';
    }

    if (empty($data['mancc'])){
        $errors['mancc'] = 'Chưa nhập mã nhà cung cấp';
    }
    

    // Neu ko co loi thi insert
    if (!$errors){
        add_ncc($data['mancc'], $data['tenncc'] );
        // Trở về trang danh sách
        header("location: ncc.php");
    }
}

disconnect_db();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Nhà cung cấp</title>
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
                <form method="post" action="themncc.php">
                    <table width="50%" border="1" cellspacing="0" cellpadding="10" class="ncc">
                        <tr class="tr_ncc">
                            <td class="td_dvt">Mã nhà cung cấp:</td>
                            <td class="td_dvt">
                                <input type="text" name="id" value="<?php echo !empty($data['mancc']) ? $data['mancc'] : ''; ?>"/>
                                <?php if (!empty($errors['mancc'])) echo $errors['mancc']; ?>
                            </td>
                        </tr>
                        <tr class="tr_ncc">
                            <td class="td_dvt">Tên nhà cung cấp:</td>
                            <td class="td_dvt">
                                <input type="text" name="name" value="<?php echo !empty($data['tenncc']) ? $data['tenncc'] : ''; ?>"/>
                                <?php if (!empty($errors['tenncc'])) echo $errors['tenncc']; ?>
                            </td>
                        </tr>
                        
                        <tr class="tr_ncc">
                            <td class="td_ncc" colspan="2">
                                <input type="submit" name="add_ncc" value="Lưu" style="width: 50px;">
                            </td>
                        </tr>
                    </table>
                </form>
            </fieldset>
    
 
</body>
</html>
