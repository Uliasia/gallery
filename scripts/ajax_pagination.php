<?php
  include_once "configDB.php";
  include_once "functions.php";

  if ('application/json' == $_SERVER['CONTENT_TYPE']
      && 'POST' == $_SERVER['REQUEST_METHOD'])
  {
      $_REQUEST['JSON'] = json_decode(
               file_get_contents('php://input'), true
      );
      $_POST['JSON'] = & $_REQUEST['JSON'];
  }

  include_once "pagination.php";

  $return = "<h2>Все картинки</h2>";

  $return .= " <div class='cardholder'>";

  $res = array_merge(get_images_db($conn));

  for($j = $start_pos; $j < $end_pos; $j++){
    $return .= "<a href='image".get_img_page()."id=".$res[$j]['id_images']."' class='card'>
            <div class='card_body'>
              <h3>".$res[$j]["title_images"]."</h3>
              <img  class='card_img' src='img/uploadedImg/".$res[$j]["imgFullName_images"]."' alt=''>
              <p>".$res[$j]['descrip_images']."</p>
            </div>
          </a>";
  }

	$return .= "</div>";
	
    echo $return. "<div class='pagination'>" .$pagination. "</div>";

?>