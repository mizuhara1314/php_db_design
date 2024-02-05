<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>主頁</title>
    
    <link href="./sign.css" rel="stylesheet">
</head>
<body>
<?php include("header.php");?>
<div class="container">
    <br>
    <h2 style="text-align: center">新增訂單</h2>
    <br>
<div>
    <form action="add2.php" method="post">
    <div >
           
          
           <div >
           <label>輸入客戶名稱: <input type="text" name="cname" required/></label>
           <label>輸入客戶電話: <input type="text" name="cphone" required/></label>
           <label>輸入商品名: <input type="text" name="pname" required/></label>
           <label>輸入訂購數量: <input type="text" name="total" required/></label>
           <label>輸入日期: <input type="text" name="date" required/></label> 
           </div>
          
    
        <div>
            <div>
                <input style="padding: 10px 50px" class="btn btn-success" type="submit" value="提交">
            </div>
            <div>
                <input type="reset" style="padding: 10px 50px" class="btn btn-primary" value="重置">
            </div>
        </div>

    </form>
</div>
</div>
</body>
</html>





