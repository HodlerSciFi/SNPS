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

session_start();
$errorMessage="";
$signUpMessage="";

//user id check
if(empty($_POST["username"])) {
	$errorMessage = 'ユーザー名が未入力です';
} else if (empty($_POST["password"])) {
	$errorMessage = 'パスワードが未入力です';
} else if (empty($_POST["password2"])) {
	$errrorMessage = 'パスワード（確認）が未入力です';
}

if(!empty($_POST["username"]) && !empty($_POST["password"]) && !empty($_POST["password2"])) {
	//set username and password
	$username = $_POST["username"];
	$password = $_POST["password"];
	$email = $_POST["email"];
	try {
		$stmt = $dbh->prepare("INSERT INTO users(uname, password, email) VALUES(?, ?, ?)");
		$stmt->execute(array($username, password_hash($password, PASSWORD_DEFAULT), $email));
		$userid = $dbh->lastinsertid();
		$signUpMessage = '登録完了。ユーザー名：'. $username . ' パスワード：' . $password ;
	} catch (PDOException $e) {
		$errorMessage = 'データベース接続エラー';
	}
} else if ($_POST["password"] != $_POST["password2"]) {
	$errorMessage = 'パスワードに誤りがあります';
}

$msgs[] = array(
	'success' => $signUpMessage ,
	'error' => $errorMessage
);
header('Content-Type: application/json');
echo json_encode($msgs);
exit();

?>
