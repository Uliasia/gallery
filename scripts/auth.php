<?php
  if($_COOKIE['user'] == 'value')
    setcookie('user', 'value', time() - 3600, '/');
  else
    setcookie('user', 'value', time() + 3600, '/');
  header('Location: /')
?>