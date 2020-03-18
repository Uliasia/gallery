<div class="container header">
  <div class="logo">Мой PHP сайт</div>
  <div class="menu">
    <a class="menu_item" href="index">Главная</a>
    <a class="menu_item" href="createimg">Добавить картинку</a>
    <a class="menu_item" href="contact">Контакты</a>
    <?php 
      if((count($_COOKIE) > 0) && ($_COOKIE['user'] == 'value')){
      echo 
      '<a href="/auth.php" class="menu_item"><button>Кабинет пользователя</button></a>';
      } else {
      echo 
      '<a href="/auth.php" class="menu_item"><button>Войти</button></a>';
      }
    ?>
  </div>
</div>