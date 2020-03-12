<?php
  $host  = $_SERVER['HTTP_HOST'];
  $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
  $relative_url = 'createimg.php';

  if(isset($_POST['upload'])) {

    $newFileName = $_POST['filename'];
    if(empty($newFileName)) {
      $newFileName = 'gallery';
    } else {
      $newFileName = strtolower(str_replace(" ", "-", $newFileName));
    }
    $imageTitle = $_POST['title'];
    $imageDesc = $_POST['description'];

    print_r($_FILES['img']);
    $file = $_FILES['img'];

    $fileName = $file['name'];
    $fileType = $file['type'];
    $fileTempName = $file['tmp_name'];
    $fileError = $file['error'];
    $fileSize = $file['size'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array("jpg", "jpeg", "png");

    if (in_array($fileActualExt, $allowed)) {
      if ($fileError === 0) {
        if ($fileSize < 2000000) {
          $imageFullName =  $newFileName . "." . uniqid('', true) . "." . $fileActualExt;
          $fileDestination =  "../img/uploadedImg/" . $imageFullName;

          include_once "configDB.php";

          if (empty($imageTitle) || empty($imageDesc)) {
            header("Location: /?upload-empty");
            exit();
          } else {
            $sql = "SELECT * FROM images;";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
              echo "SQL запрос неудался!";
            } else {
              mysqli_stmt_execute($stmt);
              $res = mysqli_stmt_get_result($stmt);
              $rewCount = mysqli_num_rows($res);
              $setImageOrder = $rewCount + 1;

              $sql = "INSERT INTO images (title_images, descrip_images, imgFullName_images, order_images) VALUES (?, ?, ?, ?)";
              if (!mysqli_stmt_prepare($stmt, $sql)) {
                echo "SQL запрос неудался!";
              } else {
                mysqli_stmt_bind_param($stmt, "ssss", $imageTitle, $imageDesc, $imageFullName, $setImageOrder);
                mysqli_stmt_execute($stmt);

                // $moved = move_uploaded_file($fileTempName, $fileDestination);
                if (!move_uploaded_file($fileTempName, $fileDestination)) {
                  echo move_uploaded_file($fileTempName, $fileDestination);
                } else {
                  header("Location: http://$host/gallery/createimg.php?upload=success");
                }

               
              }  
            }
          }
        } else {
          echo "Файл слишком большой!";
          exit();
        }
      } else {
        echo "Щшибка файла!";
        exit();
      }
    } else {
      echo "Нужно загрузить правильный тип файла!";
      exit();
    }
  }

  // $title = $_POST['title'];
  // $img = $_POST['img'];
  // $info = $_POST['info'];
  
  // require_once 'configDB.php';

  // $sql = 'INSERT INTO images(title, img, info) VALUES(:title, :img, :info)';
  // $query = $pdo->prepare($sql);
  // $query->execute(['title'=>$title, 'img'=>$img, 'info'=>$info]);

  // header("Location: http://$host/gallery/createimg.php?upload=success");
?>