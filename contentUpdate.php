<?php
	require 'common/php/dbConnect.php';
	$regiMessage="";
	$errMessage="";

	$wid = $_POST['wid'];
	$sid = $_POST['sid'];
	$sentense = $_POST['sentense'];
	$secOrder = $_POST['secOrder'];
	$secTitle = $_POST['secTitle'];
	$status = $_POST['status'];
	$stmt = $dbh->prepare("UPDATE sections SET secorder = ?, sectitle = ?, sentense = ?, status = ? WHERE wid = ? AND sid = ?");	
	try {
		$stmt->execute(array($secOrder, $secTitle, $sentense, $status, $wid, $sid));
		if($status == 'O') {
			$stmt = $dbh->prepare("UPDATE works SET wstatus = 'P' WHERE wid = ?");	
			$stmt->execute(array($wid));
		}
		$regiMessage = "<p>完了しました</p>";
	} catch (PDOException $e) {
		$errMessage = "<p>データベースエラー</p>";
		echo $e->getMessage();
	}
?>

<!DOCTYPE html>
<html lang='ja'>
	<head>
		<meta charset="UTF-8">
		<meta name="description" content="SF小説投稿サイト本文登録画面">
		<title>本文更新</title>
		<link rel="stylesheet" href="common/css/sfstyle.css">
		<script type="text/javascript" src=""></script>
	</head>
	<body>
		<?php include('header.php'); ?>
		<div id="content">
			<h1>本文更新</h1>
			<h2> 
				<?php 
					print($_POST['title']); 
				?>
			</h2>
			<div id="section">
					<?php print "$regiMessage"; ?>
					<?php print "$errMessage"; ?>
			</div>

		</div>
		<div id="footer">
		</div>	
	</body>
</html>
