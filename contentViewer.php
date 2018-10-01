<?php
	require 'common/php/dbConnect.php';
	$wid = $_GET['wid'];
	$uname = $_GET['uname'];
	$title = $_GET['title'];
	$sid = $_GET['sid'];
	$secorder = $_GET['secorder'];
	$sectitle = $_GET['sectitle'];
	$qry = "SELECT sectitle, status, sentense FROM sections WHERE wid = $wid AND secorder = $secorder";
	try {
		$stmt = $dbh->query($qry);
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		$sentense = $result['sentense'];
		//次の話がない,または次の話が下書きの場合はリダイレクト
		if($result['status'] == 'D' || $result['status'] == "") {
			header("Location:./wrk.php?wid=$wid&auther=$uname&title=$title");	
		}
	} catch(PDOException $e) {
		print "データベースエラー";
	}
?>
<!DOCTYPE html>
<html lang='ja'>
	<head>
		<meta charset="UTF-8">
		<meta name="description" content="本文">
		<title><?php echo $sectitle; ?></title>
		<link rel="stylesheet" href="common/css/sfstyle.css">
		<script type="text/javascript" src=""></script>
	</head>
	<body>
		<?php include('header.php'); ?>
		<div id="content">
			<h1>
				<?php 
					if($sectitle == "") {
						$sectitle = $result['sectitle'];
						echo $sectitle;	
					} else {
						echo $sectitle;
					} ?>
			</h1>
			<div id="sentensebox">
			<p id="sentense">
				<?php 
					$sentenseView = nl2br($sentense);
					echo $sentenseView; 
				?>
			</p>
			</div>
			<div id="move">
				<p>
					<?php
					if($secorder > 1) {
						$presecorder = $secorder - 1;
						print "<a href=\"contentViewer.php?wid=$wid&uname=$uname&title=$title&sid=&secorder=$presecorder&sectitle=\">前へ</a>";
					}
						print "<a href=\"wrk.php?wid=$wid&auther=$uname&title=$title\">戻る</a>";
						$postsecorder = $secorder + 1;
						print "<a href=\"contentViewer.php?wid=$wid&uname=$uname&title=$title&sid=&secorder=$postsecorder&sectitle=\">次へ</a>";
					?>
				</p>
			</div>
		</div>
		<div id="footer">
		</div>	
	</body>
</html>
