<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
				include_once __DIR__ .'/scripts/configDB.inc.php';
				include_once __DIR__ .'/scripts/functions.inc.php';
				
				if(isset($_GET['id'])) {
					$id = (int)$_GET['id'];
				} else {
					$id = 31;
				}
				$res = get_image_by_id($conn, $id);
        echo "<title>".$res["title_images"]."</title>";?>
    <link rel="stylesheet" href="./css/style.css">
  </head>
  <body>
    <?php require_once __DIR__ ."/blocks/header.inc.php" ?>
    
    <div class="conteiner">
        <?php
					echo"<div  class='unocard'>
								<h2>".$res["title_images"]."</h2>
                <img  class='unocard_img' src='./img/uploadedImg/".$res["imgFullName_images"]."' alt=''>
                <p>".$res['descrip_images']."</p>
							</div>";
        ?>
    </div>
    

    <?php require_once __DIR__ ."/blocks/footer.inc.php" ?>
    
  </body>
</html>