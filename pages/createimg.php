<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Добавление изображения</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <?php require_once "blocks/header.php" ?>
  
  <div class="conteiner cardholder">
    <h2>Добавление картинки</h2>
    <form action="add.php" method="POST">
      <input type="text" name="title" placeholder="Заголовок"><br>
      <input type="file" name="img"><br>
      <textarea name="info" placeholder="Описание.."></textarea><br>
      <button type="submit" name="add">Добавить</button>
    </form>
  </div>

  <?php require_once "blocks/footer.php" ?>
</body>
</html>