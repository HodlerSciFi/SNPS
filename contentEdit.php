<?php
	$wid = $_POST['wid'];
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
		<?php include('header.php'); ?>
		<div id="content">
			<h1>作品編集</h1>
			<h2> 
				<?php 
					print($_POST['title']); 
				?>
			</h2>
			<div id="section">
				<form id="sentenseForm" action="contentRegi.php" method="POST">
					<label for="secOrder">話数</label><input name="secOrder" type="number" min="1">
					<label for="secTitle">サブタイトル</label><input type="text" name="secTitle" value="第1話...">
					<p>本文</p>
					<textarea class="sentense-form"  name="sentense"  form="sentenseForm"></textarea>
					<?php
						print "<input type=\"hidden\" name=\"wid\" value=\"$wid\">"
					?>
					<input type="radio" name="status" value="D" checked="checked">下書き保存
					<input type="radio" name="status" value="O">公開
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
