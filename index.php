<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Моя Галерея</title>
    <link rel="stylesheet" href="./css/style.css">
  </head>
  <body>
    <?php 
      require_once __DIR__ ."/blocks/header.inc.php";
    ?>
    
    <div class="conteiner abc">
      <h2>Все картинки</h2>
         <?php 
          require_once __DIR__ .'/scripts/configDB.inc.php';
          require_once __DIR__ .'/scripts/pagination.inc.php';
          $p = '';
          print_r(__DIR__);
          print_r($_SERVER['DOCUMENT_ROOT']);

          echo " <div class='cardholder'>";

          $res = array_merge(get_images_db($conn));

          for($j = $start_pos; $j < $end_pos; $j++){
            echo "<a href='./image".get_img_page()."id=".$res[$j]['image_id']."' class='card'>
                    <div class='card_body'>
                      <h3>".$res[$j]["image_title"]."</h3>
                      <img  class='card_img' src='./img/uploadedImg/".$res[$j]["image_fullName"]."' alt=''>
                      <p>".$res[$j]['image_descrip']."</p>
                    </div>
                  </a>";
          }

          echo "</div>";

          if ($count_pages > 1) {
            echo "<div class='pagination'>" .$pagination. "</div>";
          }
        ?>
    </div>
    

    <?php require_once __DIR__ ."/blocks/footer.inc.php" ?>
    
  </body>
  <script src="scripts/script.js"></script>
</html>