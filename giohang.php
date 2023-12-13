<?php
session_start();
include("ketnoi/ketnoi.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>QUẢN LÝ SẢN PHẨM</title>
  <meta charset="utf-8">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="style.css">

  <style>

ul {
  list-style-type: none;
  overflow: hidden;
  background-color: #900C3F;
}

li {
  float: left;
  border-width:4px; border-style:none;
}

li a, .dropbtn {
  display: inline-block;
  color: #f1f1f1;
  text-align: center;
  font-size: 20px;
  padding: 25px 30px;
  text-decoration: none;
}

li a:hover, .dropdown:hover .dropbtn {
  background-color:#900C3F;
}

li.dropdown {
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #900C3F;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black ;
  padding: 30px 30px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {background-color: #f1f1f1;}

.dropdown:hover .dropdown-content {
  display: block;
}
</style>

  <style>
    .tb_dvt{
        width: 50%;
        margin: 10px;
        margin: auto;
    }
    .th_dvt{
        color: black;
        border: 1px solid #900C3F;
        padding: 5px;
        font-size: 16px;
        text-align: center;
    }
    .td_dvt{
        color: black ;
        border: 3px solid black ;
        padding: 5px;
        font-size: 16px;
        text-align: left;
    }
    a:hover{
        text-decoration: none;
    }
    .div{
        width:140px;
        background-color: #900C3F;
        padding: 3px;
        margin-left: 10px;
    }
    #btn{
            color:black;
        }
  </style>
</head>
<body style="background-color: #F9EBEA;">

<h1 style="text-align: center;background-color: #900C3F;color: white;font-size: 50px; border-width:2px; border-style:solid;">
       QUẢN LÝ HÀNG HÓA</h1>

        <form>
              <ul style="border-width:2px; border-style:solid;">

              </ul>
        </form>

        <fieldset>
            
            <table class="tb_dvt">
                <tr class="tr_dvt" >
                    <th class="th_dvt">Mã sản phẩm</td>
                    <th class="th_dvt">Tên sản phẩm</td>
                    <th class="th_dvt">Giá bán</td>
                </tr>
                <?php foreach ($sanpham as $item){ ?>
                <tr>
                    <td class="td_dvt"><?php echo $item['masp']; ?></td>
                    <td class="td_dvt"><?php echo $item['tensp']; ?></td>
                    <td class="td_dvt"><?php echo number_format($item['giaban'], 0, ',', '.'); ?></td>
                    <td class="td_dvt">
                
                <?php } ?>
            </table>
        </fieldset>
   
    

</body>
</html>