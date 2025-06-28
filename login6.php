<?php
// Thiết lập thông tin kết nối đến database RDS
$servername = "db-subnet-group-lab7.cx08yukuu35k.us-east-1.rds.amazonaws.com";
$username = "admin";
$password = "huycao123";
$dbname = "myDB";

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối không thành công: " . $conn->connect_error);
}

// Xử lý khi submit form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Truy vấn kiểm tra tài khoản
    $sql = "SELECT * FROM User WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        echo "✅ Bạn đã đăng nhập thành công";
    } else {
        echo "❌ Bạn đã đăng nhập không thành công";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Đăng nhập</title>
</head>
<body>
    <h2>Đăng nhập</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label>Tên đăng nhập:</label>
        <input type="text" name="username" required><br><br>
        <label>Mật khẩu:</label>
        <input type="password" name="password" required><br><br>
        <input type="submit" value="Đăng nhập">
    </form>
</body>
</html>
