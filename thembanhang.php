<?php
require './ketnoi/ketnoibanhang.php';


// Nếu người dùng submit form
if (isset($_POST['add_banhang']))
{
    // Lay data
    $data['phieuxuat']        = $_POST['maphieuxuat'];
    $data['masanpham']          = $_POST['masp'];
    $data['tensanpham']        = $_POST['tensp'];
    $data['gia']        = $_POST['giaban'];
    $data['soluong']        = $_POST['soluong'];
    $data['hsd']        = $_POST['hansudung'];
    

    // Validate thong tin
   


    // Neu ko co loi thi insert
    
        add_banhang( $data['phieuxuat'],$data['masanpham'], $data['tensanpham'], $data['gia'], $data['soluong'], $data['hsd']);
        // Trở về trang danh sách
        header("location: banhang.php");
    }


disconnect_db();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Xuất hàng</title>
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
                <h1>Thêm sản phẩm</h1>
                <form action ="" method='post'>
                <?php
                        
                        $conn = mysqli_connect('localhost', 'root', '', 'qlkh');
                        $sql = "SELECT distinct tensp FROM khohang";
                        $result = mysqli_query($conn, $sql);
                        echo '<select name="tensp" style="font-size:16px; height:30px; width:150px">';
                        $num_results = mysqli_num_rows($result);
                        for ($i=0;$i<$num_results;$i++) {
                            $row = mysqli_fetch_array($result);
                            echo '<option value="' .$row['tensp']. '" id="ncc_name_ot">'.$row['tensp']. '</option>';
                        }
                        echo '</select>';
                        ?>
                <input type="submit" name="chonsp" value="Tìm">
                </form>
                <form action ="" method='post'>
                    <?php
                        if(isset($_POST['chonsp']))
                        {
                            $sp = $_POST['tensp'];
                            $conn = mysqli_connect('localhost', 'root', '', 'qlkh');
                            $sql = "SELECT * FROM khohang where tensp ='$sp' order by hansudung";
                            $result = mysqli_query($conn, $sql);
                            echo '<select name="hsd" style="font-size:16px; height:30px; width:150px">';
                            $num_results = mysqli_num_rows($result);
                            for ($i=0;$i<$num_results;$i++) {
                                $row = mysqli_fetch_array($result);
                                $name = $row['hansudung'];
                                echo '<option value="' .$row['masp']. '" id="ncc_name_ot">' .$row['hansudung'].'---'.$row['soluong']. '</option>';
                            }
                            echo '</select>';
                        echo '<input type="submit" name="chonmasp" value="chọn">';
                        }
                    ?>
                    
                </form>
            <form method="post" action="thembanhang.php">
                <table width="50%" border="1" cellspacing="0" cellpadding="10" >
                    <tr>
                         <th class="td_dvt">Mã phiếu xuất</th>
                    
                         <th class="td_dvt">Mã sản phẩm</th>
                   
                            <th class="td_dvt">Tên sản phẩm</th>
                    
                            <th class="td_dvt">Gía bán</th>
                 
                            <th class="td_dvt">Số lương</th>
                           <th class="td_dvt">Hạn sử dụng</th>
                    </tr>
                    
                
                
                <?php
                        if(isset($_POST['chonmasp']))
                        {
                            $masp = $_POST['hsd'];
                            $conn = mysqli_connect('localhost', 'root', '', 'qlkh');
                            $sql = "SELECT * FROM khohang where masp ='$masp'";
                            $result = mysqli_query($conn, $sql);
                            
                            $num_results = mysqli_num_rows($result);
                            for ($i=0;$i<$num_results;$i++) {
                                $row = mysqli_fetch_array($result);
                                $data['giaban'] = $row['gianhap'] +5000;
                                echo '<td  style="padding:10px"> <input type="text" name="maphieuxuat"></td>';
                                echo '<td  style="padding:10px"><input type="text" name="masp" value="'.$row['masp'].'"></td>';
                                echo '<td  style="padding:10px"><input type="text" name="tensp" value="'.$row['tensp'].'"> </td>';
                                echo '<td style="padding:10px"><input type="text" name="giaban" value="'.$data['giaban'].'"></td>';
                                echo '<td  style="padding:10px"> <input type="text" name="soluong"></td>';
                                echo '<td style="padding:10px"> <input type="text" name="hansudung" value="'.$row['hansudung'].'"></td>';
                                
                            }
                                
                        }
                    ?>
                    </tr>
                </table>
                <table>
                <tr class="tr_banhang">
                            
                            <td class="td_banhang" >
                                <input type="submit" name="add_banhang" value="Lưu" style="width: 50px;">
                            </td>
                        </tr>
                </table>
                
            </form> 
            </fieldset>
    
 
</body>
</html>
