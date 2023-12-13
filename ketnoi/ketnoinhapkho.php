<?php
// Biến kết nối toàn cục
global $conn;

// Hàm kết nối database
function connect_db()
{
    // Gọi tới biến toàn cục $conn
    global $conn;
    
    // Nếu chưa kết nối thì thực hiện kết nối
    if (!$conn){
        $conn = mysqli_connect('localhost', 'root', '', 'qlkh') or die ('Can\'t not connect to database');
        // Thiết lập font chữ kết nối
        mysqli_set_charset($conn, 'utf8');
    }
}

// Hàm ngắt kết nối
function disconnect_db()
{
    // Gọi tới biến toàn cục $conn
    global $conn;
    
    // Nếu đã kêt nối thì thực hiện ngắt kết nối
    if ($conn){
        mysqli_close($conn);
    }
}

// Hàm lấy tất cả sinh viên
function get_all_nhapkho()
{
    // Gọi tới biến toàn cục $conn
    global $conn;
    
    // Hàm kết nối
    connect_db();
    
    // Câu truy vấn lấy tất cả sinh viên
    $sql = "select * from nhapkho";
    
    // Thực hiện câu truy vấn
    $query = mysqli_query($conn, $sql);
    
    // Mảng chứa kết quả
    $result = array();
    
    // Lặp qua từng record và đưa vào biến kết quả
    if ($query){
        while ($row = mysqli_fetch_assoc($query)){
            $result[] = $row;
        }
    }
    
    // Trả kết quả về
    return $result;
}

// Hàm lấy sản phẩm theo ID
function get_nhapkho($dvt_id)
{
    // Gọi tới biến toàn cục $conn
    global $conn;
    
    // Hàm kết nối
    connect_db();
    
    // Câu truy vấn lấy tất cả sinh viên
    $sql = "select * from nhapkho where manhapkho = {$dvt_id}";
    
    // Thực hiện câu truy vấn
    $query = mysqli_query($conn, $sql);
    
    // Mảng chứa kết quả
    $result = array();
    
    // Nếu có kết quả thì đưa vào biến $result
    if (mysqli_num_rows($query) > 0){
        $row = mysqli_fetch_assoc($query);
        $result = $row;
    }
    
    // Trả kết quả về
    return $result;
}

// Hàm thêm sinh viên
function add_nhapkho($manhapkho, $tennhapkho, $ngaynhap, $soluong, $lohang, $hansudung, $gianhap)
{
    // Gọi tới biến toàn cục $conn
    global $conn;
    
    // Hàm kết nối
    connect_db();
    
    // Chống SQL Injection
    $manhapkho =   addslashes($manhapkho);
    $tennhapkho = addslashes($tennhapkho);
    $ngaynhap = addslashes($ngaynhap);
    $soluong = addslashes($soluong);
    $lohang = addslashes($lohang);
    $Hansudung = addslashes($hansudung);
    $gianhap = addslashes($gianhap);
    // Câu truy vấn thêm
    $sql = "INSERT INTO nhapkho(manhapkho, tensp, ngaynhap, soluong,lohang, hansudung, gianhap) VALUES ('$manhapkho','$tennhapkho','$ngaynhap','$soluong','$lohang','$hansudung','$gianhap')";
    
    // Thực hiện câu truy vấn
    $query = mysqli_query($conn, $sql);
    
    return $query;
}

function add_kho($manhapkho, $tennhapkho, $ngaynhap, $soluong, $lohang, $hansudung, $gianhap)
{
    // Gọi tới biến toàn cục $conn
    global $conn;
    
    // Hàm kết nối
    connect_db();
    
    // Chống SQL Injection
    $manhapkho =   addslashes($manhapkho);
    $tennhapkho = addslashes($tennhapkho);
    $ngaynhap = addslashes($ngaynhap);
    $soluong = addslashes($soluong);
    $lohang = addslashes($lohang);
    $Hansudung = addslashes($hansudung);
    $gianhap = addslashes($gianhap);
    // Câu truy vấn thêm
    $sql = "INSERT INTO khohang(masp, tensp, ngaynhap, soluong,lohang, hansudung, gianhap) VALUES ('$manhapkho','$tennhapkho','$ngaynhap','$soluong','$lohang','$Hansudung','$gianhap')";
    
    // Thực hiện câu truy vấn
    $query = mysqli_query($conn, $sql);
    
    return $query;
}
function add_sp($masp, $tensp, $giaban)
{
    // Gọi tới biến toàn cục $conn
    global $conn;
    
    // Hàm kết nối
    connect_db();
    
    // Chống SQL Injection
    $masp =   addslashes($masp);
    $tensp = addslashes($tensp);
    $giaban = addslashes($giaban);
    // Câu truy vấn thêm
    $sql = "INSERT INTO sanpham(masp, tensp, giaban) VALUES ('$masp','$tensp','$giaban')";
    
    // Thực hiện câu truy vấn
    $query = mysqli_query($conn, $sql);
    
    return $query;
}


// Hàm sửa sinh viên
function edit_nhapkho($manhapkho, $tensp,$ngaynhap, $soluong, $lohang, $hansudung, $gianhap)
{
    // Gọi tới biến toàn cục $conn
    global $conn;
    
    // Hàm kết nối
    connect_db();
    
    // Chống SQL Injection
    $manhapkho  = addslashes($manhapkho);
    $tensp = addslashes($tensp);
    $ngaynhap = addslashes($ngaynhap);
    $soluong = addslashes($soluong);
    $lohang = addslashes($lohang);
    $hansudung = addslashes($hansudung);
    $gianhap = addslashes($gianhap);
    // Câu truy sửa
    $sql = "UPDATE nhapkho SET tensp = '$tensp', ngaynhap = '$ngaynhap', soluong = '$soluong', lohang = '$lohang', hansudung = '$hansudung', gianhap = '$gianhap'
            WHERE manhapkho = '$manhapkho'";
    
    // Thực hiện câu truy vấn
    $query = mysqli_query($conn, $sql);
    
    return $query;
}


// Hàm xóa sinh viên
function xoanhapkho($manhapkho)
{
    // Gọi tới biến toàn cục $conn
    global $conn;
    
    // Hàm kết nối
    connect_db();
    
    // Câu truy sửa
    $sql = "DELETE FROM nhapkho WHERE manhapkho = '$manhapkho'";
    
    // Thực hiện câu truy vấn
    $query = mysqli_query($conn, $sql);
    
    return $query;
}