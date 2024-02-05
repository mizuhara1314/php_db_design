<meta charset="UTF-8">
<?php
session_start();
include "conn.php";
$user = $_POST['username'];
$pwd = $_POST['password'];
$sql = "SELECT * FROM `admin` WHERE `account` = '{$user}' and `password` = '{$pwd}' ";
$stmt= $conn->query($sql);
$result = mysqli_fetch_array($stmt);


if($stmt->num_rows > 0){
    $_SESSION['user'] = $result[0];
    echo "<script>alert(\"登陸成功\")</script>";
    
        
    echo "<script>window.location.href='index.php'</script>";

}else{
    echo "<script>alert(\"錯誤,請重新登錄\")</script>";
    echo "<script>window.location.href='loginweb.html'</script>";
}