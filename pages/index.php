<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Моя Галерея</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <?php require_once "blocks/header.php" ?>
  
  <div class="conteiner cardholder">
    <h2>Все картинки</h2>
    <?php 
      require_once 'configDB.php';

      $query = $pdo->query('SELECT * FROM `images`');
      while($row = $query->fetch(PDO::FETCH_OBJ)){
        echo '<div class="card">
                <div class="card_title">'.$row->title.'</div>
                <div class="card_img">'.$row->img.'</div>
                <div class="card_info">'.$row->info.'</div>
                <a href= "/delete.php?id='.$row->id.'" <button name="delete">Удалить</button></a>
              </div>';
      }
    ?>
  </div>


  <?php require_once "blocks/footer.php" ?>
</body>
</html>