<?php

  function get_images_db ($conn) {

    $sql = 'SELECT * FROM `images`';
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      echo "SQL запрос неудался!";
    } else {
      mysqli_stmt_execute($stmt);
      $res = mysqli_stmt_get_result($stmt);
      $images = array();
      while($row = mysqli_fetch_assoc($res)) {
        $images[$row['image_id']] = $row;
      }
      return $images;
    }
  }

  function count_images ($conn) {

    $sql = "SELECT COUNT(*) FROM `images`";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      echo "SQL запрос неудался!";
    } else {
      mysqli_stmt_execute($stmt);
      $res = mysqli_stmt_get_result($stmt);
      $row = mysqli_fetch_assoc($res);
      return $row['COUNT(*)'];
    }
  }

  function get_image_by_id ($conn, $id) {

    $sql = "SELECT * FROM `images` WHERE `image_id` = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      echo "SQL запрос неудался!";
    } else {
      mysqli_stmt_bind_param($stmt, "s", $id);
      mysqli_stmt_execute($stmt);
      $res = mysqli_stmt_get_result($stmt);
      $row = mysqli_fetch_assoc($res);
      return $row;
    }
  }

  function pagination ($page, $count_pages) {
    $back = NULL;
    $forward = NULL;
    $startpage = NULL;
    $endpage = NULL;
    $page2left = NULL;
    $page1left = NULL;
    $page2right = NULL;
    $page1right = NULL;

    $uri = "?";
  
      if( $_SERVER['QUERY_STRING']) {
        foreach ($_GET as $key => $value) {
          if($key != 'page') {
            $uri .= "{$key}=$value&amp;";
          }
        }
      }
    

    if ( $page > 1 ) {
      $back = "<a class='nav-link' data-page='".($page - 1)."' href='{$uri}page=" .($page - 1). "'>&lt;</a>";
    }

    if ( $page < $count_pages ) {
      $forward = "<a class='nav-link' data-page='".($page + 1)."' href='{$uri}page=" .($page + 1). "'>&gt;</a>";
    }

    if ( $page > 3 ) {
      $back = "<a class='nav-link' data-page='".($page - 1)."' href='{$uri}page=" .($page - 1). "'>&lt;</a>";
    }
    
    if ( $page > 2 ) {
      $startpage = "<a class='nav-link' data-page='1' href='{$uri}page=1'>&laquo;</a>";
    }
    
    if ( $page < ($count_pages - 1) ) {
      $endpage = "<a class='nav-link' data-page='".($count_pages)."' href='{$uri}page=" .($count_pages). "'>&raquo;</a>";
    }
    
    if ( $page - 2 > 0 ) {
      $page2left = "<a class='nav-link' data-page='".($page - 2)."' href='{$uri}page=" .($page - 2). "'>" .($page - 2). "</a>";
    }
    
    if ( $page - 1 > 0 ) {
      $page1left = "<a class='nav-link' data-page='".($page - 1)."' href='{$uri}page=" .($page - 1). "'>" .($page - 1). "</a>";
    }
    
    if ( $page + 2 <= $count_pages ) {
      $page2right = "<a class='nav-link' data-page='".($page + 2)."' href='{$uri}page=" .($page + 2). "'>" .($page + 2). "</a>";
    }
    
    if ( $page + 1 <= $count_pages ) {
      $page1right = "<a class='nav-link' data-page='".($page + 1)."' href='{$uri}page=" .($page + 1). "'>" .($page + 1). "</a>";
    }
    
    return $startpage.$back.$page2left.$page1left. "<a class='nav-active' >" .$page. "</a>" .$page1right.$page2right.$forward.$endpage;
  }

  function get_img_page () {
    $uri = "?";
    if( $_SERVER['QUERY_STRING']) {
      foreach ($_GET as $key => $value) {
        if($key != 'id') {
          $uri .= "{$key}=$value&amp;";
        }
      }
    }
    return $uri;
  }

  //----Функция  преобразования данных из формы----
  function check_entered($value){
    $value = trim($value);
    $value = stripslashes($value);
    $value = strip_tags($value);
    $value = htmlspecialchars($value);
    return $value;
  }
?> 