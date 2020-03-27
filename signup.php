<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SignUp</title>
  <link rel="stylesheet" href="./css/style.css">
</head>
<body>

  <div class="conteiner system_page">
    <h1>Регистрация</h1>
   <form action="./scripts/signup" method="post">
      <?php
        session_start();
        if(isset($_GET['name'])) {
          $name = $_GET['name'];
          echo '<input type="text" name="name" placeholder="Имя" value="'.$name.'"><br>';
        } else {
          echo '<input type="text" name="name" placeholder="Имя"><br>';
        }
        if(isset($_GET['surname'])) {
          $surname = $_GET['surname'];
          echo '<input type="text" name="surname" placeholder="Фамилия" value="'.$surname.'"><br>';
        } else {
          echo'<input type="text" name="surname" placeholder="Фамилия"><br>';
        }
        if(isset($_GET['email'])) {
          $email = $_GET['email'];
          echo '<input type="email" name="email" placeholder="Е-mail" value="'.$email.'"><br>';
        } else {
          echo '<input type="email" name="email" placeholder="Е-mail"><br>';
        }
        if(isset($_GET['username'])) {
          $username = $_GET['username'];
          echo '<input type="text" name="uname" placeholder="Логин" value="'.$username.'"><br>';
        } else {
          echo '<input type="text" name="uname" placeholder="Логин"><br>';
        }
      ?>
      <input type="password" name="pwd" placeholder="Введите пароль"></input><br>
      <input type="password" name="pwd_r" placeholder="Повторите пароль"></input><br>
      <button type="submit" name="send">Зарегистрироваться</button><br>
      <button type="button" onclick="window.location.href='./login'">Войти</button>
   </form>
  </div>

  <?php

    if(!isset($_GET['signup'])) {
      exit();
    } else {
      $signupCheck = $_GET['signup'];

      if($signupCheck == "empty") {
        echo "<p class='error'> You did not fill in all fields!</p>";
        exit();
      }
      elseif($signupCheck == "invalid") {
        echo "<p class='error'> You filled invalid data!</p>";
        exit();
      }
      elseif($signupCheck == "admin") {
        echo "<p class='error'> 'admin' could not be username!</p>";
        exit();
      }
      elseif($signupCheck == "password") {
        echo "<p class='error'> Password is to short!</p>";
        exit();
      }
      elseif($signupCheck == "email") {
        echo "<p class='error'> You did fill not email!</p>";
        exit();
      }
      elseif($signupCheck == "usertaken") {
        echo "<p class='error'> Username is taken!</p>";
        exit();
      }
      elseif($signupCheck == "error") {
        echo "<p class='error'> Something go wrong!</p>";
        exit();
      }
    }
  ?>
   
</body>
</html>