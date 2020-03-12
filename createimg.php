<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Добавление изображения</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <?php require_once "blocks/header.php";
  echo $host  = $_SERVER['HTTP_HOST'];
  echo $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
  ?>
  
  <div class="conteiner cardholder">
    <h2>Добавление картинки</h2>
    <form action="scripts/add.php" method="POST" enctype="multipart/form-data">
      <input type="text" name="filename" placeholder="Имя файла..">
      <input type="text" name="title" placeholder="Заголовок.."><br>
      <textarea name="description" placeholder="Описание.."></textarea><br>
      <input type="file" name="img"><br>
      <button type="submit" name="upload">ДОБАВИТЬ</button>
    </form>
  </div>

  <?php require_once "blocks/footer.php"?>
</body>
</html>