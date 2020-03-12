<?php
  // $dsn = 'mysql:host=localhost;dbname=gallery';
  // $pdo = new PDO($dsn, 'root', '');

  $hostname = "localhost";
  $username = "root";
  $password = "";
  $dbName = "gallery";

  $conn = mysqli_connect($hostname, $username, $password, $dbName);
?>