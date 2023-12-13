<?php
$kn=mysqli_connect("localhost","root","") or die
("Không thể kết nối đến
server".mysqli_error($kn));
$csdl=mysqli_select_db($kn,"qlkh") or
die ("Không thể chọn được được csdl
chuyennganh". mysqli_error($kn));
mysqli_query($kn,"SET NAMES 'utf8'");
?>