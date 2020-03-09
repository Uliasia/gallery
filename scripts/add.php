<?php
  $title = $_POST['title'];
  $img = $_POST['img'];
  $info = $_POST['info'];
  
  require_once 'configDB.php';

  $sql = 'INSERT INTO images(title, img, info) VALUES(:title, :img, :info)';
  $query = $pdo->prepare($sql);
  $query->execute(['title'=>$title, 'img'=>$img, 'info'=>$info]);

  header('Location: /createimg.php');
?>