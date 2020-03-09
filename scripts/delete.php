<?php
  require_once "configDB.php";

  $id = $_GET['id'];

  $sql = 'DELETE FROM `images` WHERE `id` = ?';
  $query = $pdo->prepare($sql);
  $query->execute([$id]);

  header('Location: /');
?>