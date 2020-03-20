<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Контактная форма</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <?php require_once "blocks/header.php" ?>

  <div class="conteiner">
    <h2>Контактная форма</h2>
   <form action="scripts/check" method="post">
      <input type="email" name="email" placeholder="Введите email"><br>
      <textarea name="message" placeholder="Введите сообщение"></textarea><br>
      <button type="submit" name="send">Отправить</button>
   </form>
  </div>
   
  <?php require_once "blocks/footer.php" ?>
</body>
</html>