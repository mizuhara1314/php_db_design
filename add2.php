<meta charset="UTF-8">
<?php
session_start();
include "conn.php";
$user = $_POST['cname'];
$product = $_POST['pname'];
$number = $_POST['total'];
$date = $_POST['date'];
$phone = $_POST['cphone'];

$rows1 = "select `cus_id` from `customers` where `name` = '{$user}'";
$stmt1= $conn->query($rows1);
$row3 = mysqli_num_rows($stmt1);

if($row3 == 0){
$sql = "insert into `customers` (name,phone) value ('{$user}','{$phone}')";
$stmt= $conn->query($sql);
$rows1 = "select `cus_id` from `customers` where `name` = '{$user}'";
$stmt1= $conn->query($rows1);

}



$rows2 = "select `pd_id` from `product` where `name` = '{$product}'";
$stmt2= $conn->query($rows2);
$row4 = mysqli_num_rows($stmt2);

if ($row4 == 1){
    $cus = $stmt1->fetch_assoc();
    $pd = $stmt2->fetch_assoc();
    $sql = "insert into `orders` (cus_id,pd_id,total_cost,date) value ('{$cus['cus_id']}','{$pd['pd_id']}','{$number}','{$date}')";
    $stmt= $conn->query($sql);
    echo "<script>alert('添加成功')</script>";
    echo ("<script>window.location.href='add.php'</script>");
}else{
  
        echo ("<script>alert('添加失敗,沒有商品')</script>");
        echo ("<script>window.location.href='index.php'</script>");
   
}

$conn->close();
