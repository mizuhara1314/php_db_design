<meta charset="UTF-8">
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "good";


       
$conn = new mysqli($servername, $username, $password,$dbname);



if ($conn->connect_error) {
    die("連接失敗: " . $conn->connect_error);
}



