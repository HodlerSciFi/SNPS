<?php
if(isset($_POST['wrkRegi'])) {
	require 'common/php/dbConnect.php';
	session_start();
	$registerMessage = "";
	$errorMessage = "";
	if(!empty($_POST['title'])) {
		$title = $_POST['title'];
		$uid = $_SESSION['UID'];
		$status = 'D';
		try {
			$stmt = $dbh->prepare('INSERT INTO works (uid, title, wstatus) VALUES(?, ?, ?)');
			$stmt->execute(array($uid, $title, $status));
			$wid = $dbh->lastinsertid();
			$registerMessage = '登録完了';
		} catch(PDOException $e) {
			echo $e->getMessage();
		}
	}else {
		$errorMessage = '作品タイトルが未入力です';
	}
}
?>

<!DOCTYPE html>
<html lang='ja'>
	<head>
		<meta charset="UTF-8">
		<meta name="description" content="SF小説投稿サイト">
		<title>作品登録</title>
		<link rel="stylesheet" href="common/css/sfstyle.css">
		<script type="text/javascript" src=""></script>
	</head>
	<body>
		<?php include('header.php'); ?>
		<div id="content">
			<h1>作品登録</h1>
			<p>タイトル</p>
			<form id="regiForm" action="" method="POST">
				<input id="title" name="title" type="text" value="">
				<input id="wrkRegi" name="wrkRegi" type="submit" value="登録">
			</form>
		</div>
		<div><?php echo htmlspecialchars($registerMessage, ENT_QUOTES); ?></div>
		<div><?php echo htmlspecialchars($errorMessage, ENT_QUOTES); ?></div>
		<p><a href="wrkManager.php">作品管理へ</a></p>
		<div id="footer">
		</div>	
	</body>
</html>
