<meta charset="UTF-8">
<?php
session_start();
include "conn.php";
$user = $_POST['user'];
$pwd1 = $_POST['pwd1'];
$pwd2 = $_POST['pwd2'];
$rows = "select `account` from `admin` where `account` = '{$user}'";
$stmt1= $conn->query($rows);
$row = mysqli_num_rows($stmt1);
if ($row == 1){
    echo "<script>alert('用戶已存在')</script>";
    echo ("<script>window.location.href='register.html'</script>");
}
elseif ($pwd1 == $pwd2){
    $sql = "insert into `admin` (`account`, `password`) value ('{$user}','{$pwd1}')";
    $conn->query($sql);
    echo ("<script>alert('註冊成功')</script>");
    echo ("<script>window.location.href='loginweb.html'</script>");
}
else{
    echo "<script>alert('密碼錯誤')</script>";
    echo ("<script>window.location.href='register.html'</script>");
}
$conn->close();