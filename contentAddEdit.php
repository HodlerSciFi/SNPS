<?php
	$wid = $_POST['wid'];
	$sid = $_POST['sid'];
	$sectitle = $_POST['sectitle'];
	require 'common/php/dbConnect.php';
	$qry = "SELECT secorder, sentense, status
			FROM sections
			WHERE wid = $wid and sid = $sid"; 
	$stmt = $dbh->query($qry);
	$result = $stmt->fetch(PDO::FETCH_ASSOC);
	$secorder = $result['secorder'];
	$sentense = $result['sentense'];	
	$status = $result['status'];
	
?>

<!DOCTYPE html>
<html lang='ja'>
	<head>
		<meta charset="UTF-8">
		<meta name="description" content="SF小説投稿サイト作品編集画面">
		<title>作品編集</title>
		<link rel="stylesheet" href="common/css/sfstyle.css">
		<script type="text/javascript" src=""></script>
	</head>
	<body>
		<?php include('header.php'); ?>
		<div id="content">
			<h1>作品編集</h1>
			<h2> 
				<?php 
					print($_POST['title']); 
				?>
			</h2>
			<div id="section">
				<form id="sentenseForm" action="contentUpdate.php" method="POST">
					<?php
					print "<label for=\"secOrder\">話数</label><input name=\"secOrder\" type=\"number\" value=\"$secorder\">";
					print "<label for=\"secTitle\">サブタイトル</label><input type=\"text\" name=\"secTitle\" value=\"$sectitle\">";
					print "<p>本文</p>";
					print "<textarea class=\"sentense-form\" name=\"sentense\"  form=\"sentenseForm\">$sentense</textarea>";
					
					print "<input type=\"hidden\" name=\"wid\" value=\"$wid\">";
					print "<input type=\"hidden\" name=\"sid\" value=\"$sid\">";
					
					if($status == 'O'){
						print "<input type=\"radio\" name=\"status\" value=\"D\">下書き保存";
						print "<input type=\"radio\" name=\"status\" value=\"O\" checked=\"checked\" >公開";
					}else if($status == 'D') {
						print "<input type=\"radio\" name=\"status\" value=\"D\" checked=\"checked\">下書き保存";
						print "<input type=\"radio\" name=\"status\" value=\"O\">公開";

					}
					?>
					<input type="submit" name="regiSec" value="編集登録">
				</form>	
					<?php print "$regiMessage"; ?>
					<?php print "$errMessage"; ?>
			</div>

		</div>
		<div id="footer">
		</div>	
	</body>
</html>
