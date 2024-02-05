<meta charset="UTF-8">
<?php
include("conn.php");
session_start();
?>

<html>
<head>
    <title>首頁</title>
    <link rel="stylesheet" href="./sign.css" />
    <style>
        button {
            top: 7px;
            right: 15px;
        }
        th{
            text-align: center;
          
        }
        .container{
            text-align: center;
            width: 100%;
        }
        .row{
            line-height: 50px;
        }
        .btn-warning{
            background-color: #d0455a;
        }
    </style>
</head>
<body>
    
<div class="container">
    <div class="row" style="background-color: #2e7ad5;color: white">
        <div style="font-size: 20px">訂單管理系統</div>
        <a href="index.php">訂單訊息</a>
        <a href="update.php">修改訂單</a>
        <a href="select.php">查詢訂單</a>
        <a href="add.php">新增訂單</a>
       
        
        <a href="loginweb.html">退出</a> 
    </div>
</div>
</body>
</html>