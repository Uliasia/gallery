<?php

	session_start();

  	if(isset($_POST['send'])) {

		require_once __DIR__ ."/configDB.inc.php";
        require_once __DIR__ ."/functions.inc.php";

		$uname = check_entered($conn, $_POST['uname']);
		$pwd = check_entered($conn, $_POST['pwd']);

		if(empty($uname) || empty($pwd)) {
			header("Location: ../login?login=empty");
			exit();
		} else { 
			$sql = "SELECT * FROM users WHERE user_uname=? OR user_email=?;";
			$stmt = mysqli_stmt_init($conn);
			if (!mysqli_stmt_prepare($stmt, $sql)) {
				header("Location: ../login?login=error");
				exit();
			} else {
				mysqli_stmt_bind_param($stmt, "ss", $uname, $uname);
				mysqli_stmt_execute($stmt);
				$res = mysqli_stmt_get_result($stmt);
				$resCheck = mysqli_num_rows($res);

				if($resCheck < 1) {
					header("Location: ../login?login=error");
					exit();
				}
				elseif($row = mysqli_fetch_assoc($res)) {
					$hashedPwdCheck = password_verify($pwd, $row['user_pwd']);
					if(!$hashedPwdCheck) {
						header("Location: ../login?login=error");
						exit();
					}
					elseif($hashedPwdCheck) {
						$_SESSION['u_id'] = $row['user_id'];
						$_SESSION['u_name'] = $row['user_name'];
						$_SESSION['u_surname'] = $row['user_surname'];
						$_SESSION['u_email'] = $row['user_email'];
						$_SESSION['u_uname'] = $row['user_uname'];
						header("Location: ../");
						exit();							
					}
				}
			}
		}
      
  	} else {
		header("Location: ../login?login=error");
		exit();
	}