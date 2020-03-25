<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LogIn</title>
  <link rel="stylesheet" href="./css/style.css">
</head>
<body>

  <div class="conteiner system_page">
    <h1>Вход</h1>
   <form action="./scripts/login" method="post">
      <input type="text" name="uname" placeholder="Логин | е-mail"><br>
      <input type="password" name="pwd" placeholder="Пароль"></input><br>
      <button type="submit" name="send">Войти</button><br>
      <button type="button" onclick="window.location.href='./signup'">Зарегистрироваться</button>
   </form>
  </div>
   
</body>
</html>