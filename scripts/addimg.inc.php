<?php

  if(isset($_POST['upload'])) {

    require_once __DIR__ ."/functions.inc.php";

    $newFileName = $_POST['filename'];
    if(empty($newFileName)) {
      $newFileName = 'gallery';
    } else {
      $newFileName = strtolower(str_replace(" ", "-", $newFileName));
    }
    $imageTitle = check_entered($_POST['title']);
    $imageDesc = check_entered($_POST['description']);

    $file = $_FILES['img'];

    $fileName = $file['name'];
    $fileType = $file['type'];
    $fileTempName = $file['tmp_name'];
    $fileError = $file['error'];
    $fileSize = $file['size'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array("jpg", "jpeg", "png");

    if (!in_array($fileActualExt, $allowed)) {
      header("Location: /?upload=filetype");
      exit();
    }
    elseif (!($fileError === 0)) {
      header("Location: ../addimg?upload=fileerror");
      exit();
    }
    elseif ($fileSize > 2000000) {
      header("Location: /?upload=filelarge");
      exit();
    } else {
      $imageFullName =  $newFileName . "." . uniqid('', true) . "." . $fileActualExt;
      $fileDestination =  __DIR__ . "/../img/uploadedImg/" . $imageFullName;

      include_once "configDB.inc.php";

      if (empty($imageTitle) || empty($imageDesc)) {
        header("Location: ../addimg?upload=empty");
        exit();
      } else {
        $sql = "SELECT * FROM images;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
          header("Location: ../addimg?upload=error");
          exit();
        } else {
          mysqli_stmt_execute($stmt);
          $res = mysqli_stmt_get_result($stmt);
          $rewCount = mysqli_num_rows($res);
          $setImageOrder = $rewCount + 1;
          $sql = "INSERT INTO images (image_title, image_descrip, image_fullName, image_order)
                    VALUES (?, ?, ?, ?)";
          if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../addimg?upload=error");
            exit();
          } else {
            mysqli_stmt_bind_param($stmt, "ssss", $imageTitle, $imageDesc, $imageFullName, $setImageOrder);
            mysqli_stmt_execute($stmt);
            if (!move_uploaded_file($fileTempName, $fileDestination)) {
              header("Location: /?upload=error");
              exit();
            } else {
              header("Location: ../addimg?upload=success");
            }
          }  
        }
      }
    }
  } else {
    header("Location: ../addimg");
    exit();
  }

  // $title = $_POST['title'];
  // $img = $_POST['img'];
  // $info = $_POST['info'];
  
  // require_once 'configDB.php';

  // $sql = 'INSERT INTO images(title, img, info) VALUES(:title, :img, :info)';
  // $query = $pdo->prepare($sql);
  // $query->execute(['title'=>$title, 'img'=>$img, 'info'=>$info]);

  // 
?>