<?php
  $host  = $_SERVER['HTTP_HOST'];
  $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');

  require_once "configDB.php";

  $id = $_GET['id'];

  $sql = 'DELETE FROM `images` WHERE `id` = ?';
  $query = $pdo->prepare($sql);
  $query->execute([$id]);

  header("Location: http://$host/gallery/");
?>