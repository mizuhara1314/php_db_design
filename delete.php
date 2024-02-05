<meta charset="UTF-8">
<?php
include "conn.php";
$id = $_GET['id'];
echo $id;
$sql = "delete from `orders` where `id` = '{$id}'";
$stmt= $conn->query($sql);
if ($stmt > 0){
    echo "<script>alert('刪除成功')</script>";
    echo "<script>window.location.href='index.php'</script>";
}else {
    echo ("<script>alert('刪除失敗')</script>");
    echo ("<script>window.location.href='index.php'</script>");
}
$conn->close();
