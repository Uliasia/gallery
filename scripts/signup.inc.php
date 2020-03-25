<?php

	if(isset($_POST['send'])) {

		require_once __DIR__ ."/configDB.inc.php";

		$name = mysqli_real_escape_string($conn, $_POST['name']);
		$surname = mysqli_real_escape_string($conn, $_POST['surname']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$uname = mysqli_real_escape_string($conn, $_POST['uname']);
		$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

		if(empty($name) || empty($surname) || empty($email) || empty($uname) || empty($pwd)) {
			header("Location: ../signup?signup=empty");
			exit();
		}
		elseif(!preg_match("/^[a-zA-Z]*$/", $name) || !preg_match("/^[a-zA-Z]*$/", $surname)) {
			header("Location: ../signup?signup=invalid&username=$uname&email=$email");
			exit();
		}
		elseif($uname == 'admin') {
			header("Location: ../signup?signup=admin&name=$name&surname=$surname&email=$email");
			exit();
		}
		elseif(strlen($pwd) < 8) {
			header("Location: ../signup?signup=password&name=$name&surname=$surname&email=$email");
			exit(); 
		}
		elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			header("Location: ../signup?signup=email&name=$name&surname=$surname&username=$uname");
			exit();
		} else {
			$stmt = mysqli_stmt_init($conn);
			
			$sql = "SELECT * FROM users WHERE user_uname='? ';";
			if (!mysqli_stmt_prepare($stmt, $sql)) {
				header("Location: ../signup?signup=error");
				exit();
			} else {
				mysqli_stmt_bind_param($stmt, "s", $uname);
				mysqli_stmt_execute($stmt);
				$res = mysqli_stmt_get_result($stmt);
				$resCheck = mysqli_num_rows($res);

				if($resCheck > 0) {
					header("Location: ../signup?signup=usertaken&name=$name&surname=$surname&email=$email");
					exit();
				} else {
					$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
					$sql = "INSERT INTO `users`( `user_name`, `user_surname`, `user_email`, `user_uname`, `user_pwd`)
							VALUES (?, ?, ?, ?, ?)";
					if (!mysqli_stmt_prepare($stmt, $sql)) {
						header("Location: ../signup?signup=error");
						exit();
					} else {
						mysqli_stmt_bind_param($stmt, "sssss", $name, $surname, $email, $uname, $hashedPwd);
						mysqli_stmt_execute($stmt);
						header("Location: ../login");
						exit();
					}
				}
			}
		}
			
	} else {
		header("Location: ../signup");
		exit();
	}