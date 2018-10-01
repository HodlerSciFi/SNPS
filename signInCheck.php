<?php
if (
    !(isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
        strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest')
    && (!empty($_SERVER['SCRIPT_FILENAME']) && 'userRegist.php' === basename($_SERVER['SCRIPT_FILENAME']))
    ) {
        die('このページを直接ロードしないでください');
}

require 'common/php/password.php';
require 'common/php/dbConnect.php';

//session start
session_start();
$success=false;
$errorMessage="";
$loc = "http://192.168.56.101/wrkManager.php";

//user id check
if(empty($_POST["username"])) {
	$errorMessage = 'ユーザー名が未入力です';
} else if (empty($_POST["password"])) {
	$errorMessage = 'パスワードが未入力です';
}

if(!empty($_POST["username"]) && !empty($_POST["password"])) {
//set username and password
	$username = $_POST["username"];
	$password = $_POST["password"];
//database certification
	$dsn = sprintf('mysql: host=%s; dbname=%s; charset=utf8', $db['host'], $db['dbname']);
		try {
			$stmt = $dbh->prepare('SELECT * FROM users WHERE uname = ?');
			$stmt->execute(array($username));

			if($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				if(password_verify($password, $row['password'])) {
					session_regenerate_id(true);

					$uname = $row['uname'];
					$sql = "SELECT * FROM users WHERE uname = '$uname'";
					$stmt = $dbh->query($sql);
					foreach ($stmt as $row) {
						$row['uid'];
					}
					$_SESSION['UID'] = $row['uid'];
					$_SESSION['UNAME'] = $row['uname'];
					$success= true;
			} else {
				$errorMessage='ユーザー名あるいはパスワードに誤りがあります';
			}
		} else {
			$errorMessage='ユーザー名あるいはパスワードに誤りがあります';
		}
	} catch (PDOException $e) {
		$errorMessage = 'データベース接続エラー';
	}
}

$msgs[] = array(
	'check' => $success ,
	'loc' => $loc ,
    'error' => $errorMessage
);
header('Content-Type: application/json');
echo json_encode($msgs);
exit();

?>
