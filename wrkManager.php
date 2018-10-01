<!DOCTYPE html>
<html lang='ja'>
	<head>
		<meta charset="UTF-8">
		<meta name="description" content="SF小説投稿サイト編集管理画面">
		<title>作品管理</title>
		<link rel="stylesheet" href="common/css/sfstyle.css">
		<script type="text/javascript" src=""></script>
	</head>
	<body>
		<?php include('header.php'); ?>
		<div id="content">
			<h1>作品管理</h1>
			<?php
				require 'common/php/dbConnect.php';
				session_start();
				$uid = $_SESSION['UID'];
				$qry = "SELECT count(*) FROM works WHERE uid = $uid";
				$stmt = $dbh->query($qry);
				$hitNum = $stmt->fetchColumn();
				if($hitNum != 0) {
					$qryWrk = "
						SELECT title, wid, wstatus 
						FROM works 
						WHERE uid = $uid 
						ORDER BY wupdate_date DESC";
					$stmtWrk = $dbh->query($qryWrk);
					while($result = $stmtWrk->fetch(PDO::FETCH_ASSOC)) {
						$title = $result['title'];
						$wid = $result['wid'];
						$wrkstatus = $result['wstatus'];
						if($wrkstatus == 'D') {
							$wrkstatus = '非公開';
						}else if($wrkstatus == 'P') {
							$wrkstatus = '更新中';
						}else if($wrkstatus == 'C') {
							$wrkstatus = '完結';
						}
						$qrySec = " SELECT sectitle, sid, status 
							FROM sections 
							WHERE wid = $wid
							order by secorder";
						$stmtSec = $dbh->query($qrySec);
						print "<p>";
						print "$title";	
						print "    [". $wrkstatus . "]";
						print "</p>";
						while($rsltSec = $stmtSec->fetch(PDO::FETCH_ASSOC)) {
							$sectitle = $rsltSec['sectitle'];
							$sid = $rsltSec['sid'];
							$secstatus = $rsltSec['status'];
							if($secstatus == 'D') {
								$secstatus = '下書き';
							}else if($secstatus == 'O') {
								$secstatus = '公開中';
							}else {
								$secstatus = "エラー: 謎のステータス";
							}
							print "<form action=\"contentAddEdit.php\" method=\"POST\">";
							print "<input name=\"title\" type=\"hidden\" value=\"$title\">";
							print "<input name=\"wid\" type=\"hidden\" value=\"$wid\">";
							print "<input name=\"sid\" type=\"hidden\" value=\"$sid\">";
							print "<input name=\"sectitle\" type=\"hidden\" value=\"$sectitle\">";
							print "<p>$sectitle";
							print "<input name=\"edittype\" type=\"submit\" value=\"追加編集\">";
							print "$secstatus";
							print "</form>";
						}
						print "<form action=\"contentEdit.php\" method=\"POST\">";
						print "<input name=\"title\" type=\"hidden\" value=\"$title\">";
						print "<input name=\"wid\" type=\"hidden\" value=\"$wid\">";
						print "<input name=\"edittype\" type=\"submit\" value=\"編集\">";
						print "</form>";
						print "</p>";
					}
				}else {
					print "<p>作品を登録してみましょう</p>";
				}
			?>

			<form id="wrkregister" action="wrkRegi.php">
				<input id="newwrk" name="newwrk" type="submit" value="新規作品登録">
			</form>
		</div>
		<div id="footer">
		</div>	
	</body>
</html>
