<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Контактная форма</title>
  <link rel="stylesheet" href="./css/style.css">
</head>
<body>
  <?php 
    require_once __DIR__ ."/blocks/header.inc.php";
    require_once __DIR__ ."/scripts/redirect.inc.php";
  ?>

  <div class="conteiner">
    <h2>Контактная форма</h2>
   <form action="./scripts/contactus" method="post">
      <?php
        if(isset($_GET['name'])) {
          $name = $_GET['name'];
          echo '<input type="text" name="name" placeholder="Имя" value="'.$name.'"><br>';
        } else {
          echo '<input type="text" name="name" placeholder="Имя"><br>';
        }
        if(isset($_GET['subject'])) {
          $subject = $_GET['subject'];
          echo '<input type="text" name="subject" placeholder="Тема" value="'.$subject.'"><br>';
        } else {
          echo'<input type="text" name="subject" placeholder="Тема"><br>';
        }
        if(isset($_GET['email'])) {
          $email = $_GET['email'];
          echo '<input type="email" name="email" placeholder="Е-mail" value="'.$email.'"><br>';
        } else {
          echo '<input type="email" name="email" placeholder="Е-mail"><br>';
        }
        if(isset($_GET['message'])) {
          $message = $_GET['message'];
          echo '<textarea name="message" placeholder="Введите сообщение.." value="'.$message.'"><br>';
        } else {
          echo '<textarea name="message" placeholder="Введите сообщение.."></textarea><br>';
        }
      ?>
      <button type="submit" name="send">Отправить</button>
   </form>
  </div>
   
  <?php
    if(!isset($_GET['send'])) {
      exit();
    } else {
      $signupCheck = $_GET['send'];
    
      if($signupCheck == "empty") {
        echo "<p class='error'> You did not fill in all fields!</p>";
        exit();
      }
      elseif($signupCheck == "message") {
        echo "<p class='error'> Message is to short!</p>";
        exit();
      }
      elseif($signupCheck == "email") {
        echo "<p class='error'> You did fill not email!</p>";
        exit();
      }
      elseif($signupCheck == "error") {
        echo "<p class='error'> Something go wrong!</p>";
        exit();
      }
    }
  ?>

  <?php require_once __DIR__ ."/blocks/footer.inc.php" ?>
</body>
</html>