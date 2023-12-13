<?php
session_start();
include("ketnoi/ketnoi.php");

?>
<?php
$user = $_POST["txtTDNhap"]; 
$pass = $_POST["pswMKhau"]; 
$sql = "SELECT * FROM users WHERE username='".$user ."' AND password ='". $pass."'"; // Câu lệnh SQL
$kq = mysqli_query($kn, $sql) or die("Không thể mở bảng admin".mysqli_error($kn)); // Thực thi câu lệnh SQL

if(mysqli_num_rows($kq) == 1){
    $row = mysqli_fetch_assoc($kq);
    $_SESSION["role"] = $row['role'];
    if ($_SESSION["role"] == "admin") {
        echo "<script language=javascript>
                alert('Đăng nhập thành công');
                window.location='admin.php';
              </script>";
    } elseif ($_SESSION["role"] == "user") {
        echo "<script language=javascript>
                alert('Đăng nhập thành công');
                window.location='sanpham.php';
              </script>";
    }
} else {
    echo "<script language=javascript>
            alert('Sai tên đăng nhập hoặc mật khẩu');
            window.location='dangnhap.php';
          </script>";
}
?>
