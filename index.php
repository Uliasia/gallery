<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Моя Галерея</title>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <?php require_once "blocks/header.php" ?>
    
    <div class="conteiner">
      <h2>Все картинки</h2>
        <?php 
          include_once 'scripts/configDB.php';
          require_once 'scripts/pagination.php';

          echo " <div class='cardholder'>";

          $res = array_merge(get_images_db($conn));

          for($j = $start_pos; $j < $end_pos; $j++){
            echo "<a href='image".get_img_page()."id=".$res[$j]['id_images']."' class='card'>
                    <div class='card_body'>
                      <h3>".$res[$j]["title_images"]."</h3>
                      <img  class='card_img' src='img/uploadedImg/".$res[$j]["imgFullName_images"]."' alt=''>
                      <p>".$res[$j]['descrip_images']."</p>
                    </div>
                  </a>";
          }

          echo "</div>";

          if ($count_pages > 1) {
            echo "<div class='pagination'>" .$pagination. "</div>";
          }
        ?>
    </div>
    

    <?php require_once "blocks/footer.php" ?>
    
  </body>
  <script src="js/script.js"></script>
</html>