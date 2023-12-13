<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <style>
        body {
            background-color: #ecf0f1; /* Màu nền xám nhạt */
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        #container {
            width: 400px;
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        form {
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background-color: #999999; 
            color: #fff;
            padding: 12px;
            text-align: left;
        }

        td {
            padding: 10px;
        }

        input[type="text"],
        input[type="password"],
        input[type="submit"],
        input[type="reset"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            display: block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="text"],
        input[type="password"] {
            background-color: #ecf0f1; 
        }

        input[type="submit"],
        input[type="reset"] {
            background-color: #2ecc71; 
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover,
        input[type="reset"]:hover {
            background-color: #27ae60; 
        }
    </style>
</head>
<body>
    <div id="container">
        <form action="xly_dangnhap.php" name="frmDN" method="post">
            <table cellpadding="0" cellspacing="0">
                <tr>
                    <th colspan="2">Đăng nhập</th>
                </tr>
                <tr>
                    <td>Tên đăng nhập:</td>
                    <td><input type="text" name="txtTDNhap" /></td>
                </tr>
                <tr>
                    <td>Mật khẩu:</td>
                    <td><input type="password" name="pswMKhau" /></td>
                </tr>
                <tr>
                    <td><input type="submit" name="sbmDN" value="Đăng nhập" /></td>
                    <td><input type="reset" name="rsHB" value="Hủy bỏ" /></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>
