<meta charset="UTF-8">
<?php
include("conn.php");
?>

<html>
<head>
<title>首頁</title>

<link rel="stylesheet" href="./sign.css" />
    
</head>
<body>
<?php include("header.php");?>
<div class="container">
    <br>
    <h2 style="text-align: center">訂單訊息展示</h2>
    <br>
    <table style="text-align: center">
        <tr >
        <th>訂單編號</th>
            <th>客戶名</th>
            <th>手機號碼</th>
            <th>商品名</th>
            <th>訂購數量</th>
            <th>日期</th>
        </tr>
        <?php
        $sql = "SELECT * ,product.name as pname,customers.name as cname 
        FROM orders
        inner JOIN product ON orders.pd_id = product.pd_id
        inner join customers on orders.cus_id=customers.cus_id
        ORDER BY id ASC";
        
           
        $result = mysqli_query($conn,$sql);
        if (mysqli_num_rows($result)>0) {         
        $number = mysqli_num_rows($result);     
        if(!isset($_GET['p']))
        {$p=0;}
        else {$p=$_GET['p'];}
        $check = $p + 8;                            
        for ($i = 0; $i < $number; $i++) {
        $stu = mysqli_fetch_array($result);

       
        if ($i >= $p && $i < $check) {
            echo "<tr>";
            echo "<td>{$stu['id']}</td>";
            echo "<td>{$stu['cname']}</td>";
            echo "<td>{$stu['phone']}</td>";
            echo "<td>{$stu['pname']}</td>";
            echo "<td>{$stu['total_cost']}</td>";
            echo "<td>{$stu['date']}</td>";
        
            echo "<td><a href='delete.php?id={$stu['id']}' class='btn btn-warning'>删除</a>
                      </td>";
            echo "</tr>";
            $j = $i+1;
            }
        }
        }
        ?>
    </table>
    <ul >
        <li>
            
            <a href="index.php?p=0">首页</a>
        </li>
        <li >
            <?php
            if ($p>7) { 
                $last = (floor($p/8)*8)-8;
                echo "<a href='index.php?p=$last'>上一页</a>";
            }
            else
                echo "<a class='disabled'>上一页</a>";
            ?>
        </li>
        <li>
            <?php
            if ($i>7 and $number>$check) 
                echo "<a href='index.php?p=$j'>下一页</a>";
            else
                echo "<a class='disabled'>下一页</a>";
            ?>
        </li>
        <li >
            <?php
            if ($i>7) 
            {
                $final = floor($number/8)*8;
                echo "<a href='index.php?p=$final'>末页</a>";
            }
            else
                echo "<a class='disabled'>末页</a>";
            ?>
        </li>
    </ul>
</div>
</body>
</html>
