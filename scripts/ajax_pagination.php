<?php
  require_once __DIR__ . "/configDB.inc.php";
  require_once __DIR__ . "/functions.inc.php";

  if ('application/json' == $_SERVER['CONTENT_TYPE']
      && 'POST' == $_SERVER['REQUEST_METHOD'])
  {
      $_REQUEST['JSON'] = json_decode(
               file_get_contents('php://input'), true
      );
      $_POST['JSON'] = & $_REQUEST['JSON'];
  }

  require_once __DIR__ ."/pagination.inc.php";

  $return = "<h2>Все картинки</h2>";

  $return .= " <div class='cardholder'>";

  $res = array_merge(get_images_db($conn));

  for($j = $start_pos; $j < $end_pos; $j++){
    $return .= "<a href='image".get_img_page()."id=".$res[$j]['image_id']."' class='card'>
            <div class='card_body'>
              <h3>".$res[$j]["image_title"]."</h3>
              <img  class='card_img' src='img/uploadedImg/".$res[$j]["image_fullName"]."' alt=''>
              <p>".$res[$j]['image_descrip']."</p>
            </div>
          </a>";
  }

	$return .= "</div>";
	
    echo $return. "<div class='pagination'>" .$pagination. "</div>";

?>