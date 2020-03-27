<?php
  require_once __DIR__ .'/functions.inc.php';
  require_once __DIR__ .'/configDB.inc.php';

  $perpage = 6;
  $count_img = count_images($conn);
  $count_pages = ceil($count_img / $perpage);
  if(!$count_pages) $count_pages = 1;

  if(isset($_POST['JSON']['page'])) {
    $page = (int)$_POST['JSON']['page'];
    if($page < 0) $page = 1;
  }else {
    $page = 1;
  }
  if($page > $count_pages) $page = $count_pages;

  $start_pos = ($page - 1) * $perpage;
  $end_pos = $start_pos + $perpage;
  if($end_pos > $count_img) $end_pos = $count_img;

  $pagination = pagination($page, $count_pages);
?>