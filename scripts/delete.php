<?php
  require_once __DIR__ ."/configDB.inc.php";

  $id = $_GET['id'];

  $sql = 'DELETE FROM `images` WHERE `id` = ?';
  $query = $pdo->prepare($sql);
  $query->execute([$id]);

  header("Location: /");
?>