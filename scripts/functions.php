<?php
  require_once 'scripts/configDB.php';

  function get_images_db($gallery){
    $sql = 'SELECT id, title, img, info FROM images';
    $query = $pdo->query($sql);
    $images = array();
    while($row = $query->fetch(PDO::FETCH_OBJ)) {
      $images[$row['id']] = $row;
    }
    return $images;
  }

  function count_images($gallery) {
    $sql = 'SELECT COUNT(*) FROM images';
    $query = $pdo->query($sql);
    $row = $query->fetch(PDO::FETCH_OBJ);
    return $row[0];
  }

  function pagination($page, $count_pages, $modrew=true) {
    $back = NULL;
    $forward = NULL;
    $startpage = NULL;
    $endpage = NULL;
    $page2left = NULL;
    $page1left = NULL;
    $page2right = NULL;
    $page1right = NULL;

    $uri = "?";
    if(!$modrev) {
      if( $_SERVER['QUERY_STRING']) {
        foreach ($_GET as $key => $value) {
          if($key != 'page') {
            $uri .= "{$key}=$value&amp;";
          }
        }
      }
    }
  }
?> 