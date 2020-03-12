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
  
  <div class="conteiner cardholder">
    <h2>Все картинки</h2>
    <?php 
      include_once 'scripts/configDB.php';

      $sql = "SELECT * FROM images;";
      $stmt = mysqli_stmt_init($conn);
      if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "SQL запрос неудался!";
      } else {
        mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);
        while($row = mysqli_fetch_assoc($res)){
          echo "<a href='#' class='card'>
                  <div class='card_body'>
                    <img  class='card_img' src='img/uploadedImg/".$row["imgFullName_images"]."' alt=''>
                    <h3>".$row["title_images"]."</h3>
                    <p>".$row['descrip_images']."</p>
                  </div>
                </a>";
        }
      }
    ?>
  </div>
  

  <?php require_once "blocks/footer.php" ?>
</body>
</html>