<meta charset="UTF-8">
<?php
session_start();
include "conn.php";
$order = $_POST['oid'];
$user = $_POST['cname'];
$product = $_POST['pname'];
$number = $_POST['total'];
$date = $_POST['date'];

$rows= "select `id` from `orders` where `id` = '{$order}'";
$rows1 = "select `cus_id` from `customers` where `name` = '{$user}'";
$rows2 = "select `pd_id` from `product` where `name` = '{$product}'";
$stmt= $conn->query($rows);
$stmt1= $conn->query($rows1);
$stmt2= $conn->query($rows2);
$row3 = mysqli_num_rows($stmt1);
$row4 = mysqli_num_rows($stmt2);
$row5 = mysqli_num_rows($stmt);
if ($row3 == 1 and $row4 == 1 and $row5 == 1){
    $cus = $stmt1->fetch_assoc();
    $pd = $stmt2->fetch_assoc();
    $sql = "update orders set pd_id = '{$pd['pd_id']}',cus_id='{$cus['cus_id']}',total_cost = '{$number}',date = '{$date}'where id = '{$order}'";
    $conn->query($sql);
    echo "<script>alert('修改成功')</script>";
    echo ("<script>window.location.href='add.php'</script>");
}else{
  
        echo ("<script>alert('修改失敗,沒有此客戶id或商品或此訂單')</script>");
        echo ("<script>window.location.href='index.php'</script>");
   
}

$conn->close();


