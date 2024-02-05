<meta charset="UTF-8">
<?php
include("conn.php");
?>

<html>
<head>
    <link href="./sign.css" rel="stylesheet">
    <title>主頁</title>
    
    
</head>
<body>
<?php include("header.php");?>
<div class="container">
    <br>
    <h2 style="text-align: center">訂單訊息查詢</h2>
    <br>
    <form method="get" action="#">
       
        <div >
           
          
            <div >
            <label>輸入查詢的客戶名: <input type="text" name="uid" /></label>
            <label>輸入查詢的商品名: <input type="text" name="pid" /></label>
            <label>輸入查詢的供應商: <input type="text" name="sid" /></label>  
            </div>
            <input style="padding: 7px 30px;border-radius: 5px;border: none" type="submit" name="select" value="查询">
        </div>
        
    </form>
    <table style="margin-top: 30px; text-align: center">
        <tr> <th>訂單編號</th>
            <th>客戶名</th>
            <th>手機號碼</th>
            <th>商品名</th>
            <th>訂購數量</th>
            <th>日期</th>
           
        </tr>
    
        <?php
        if (isset($_GET['select'])) {
            $customer = $_GET['uid'];
            $product = $_GET['pid'];
            $supply = $_GET['sid'];
            $sql = "SELECT * ,product.name as pname,customers.name as cname
            FROM orders
            JOIN product ON orders.pd_id = product.pd_id
            JOIN supplier ON product.sup_id = supplier.sup_id
            JOIN customers on orders.cus_id=customers.cus_id
            WHERE product.name = '{$product}'
               or orders.cus_id IN (SELECT cus_id FROM customers WHERE customers.name = '{$customer}')
               or supplier.name = '{$supply}'";
            foreach ($conn->query($sql) as $st) {
                echo "<tr>";
                echo "<td>{$st['id']}</td>";
                echo "<td>{$st['cname']}</td>";
                echo "<td>{$st['phone']}</td>";
                echo "<td>{$st['pname']}</td>";
                echo "<td>{$st['total_cost']}</td>";
                echo "<td>{$st['date']}</td>";
                
                echo "</tr>";
            }
        }
        ?>
    </table>
</div>
</body>
</html>





