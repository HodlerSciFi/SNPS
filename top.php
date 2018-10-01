<?php
	require "common/php/dbConnect.php";
	$qry = "SELECT
			works.wid, works.title, works.wupdate_date, users.uname 	
		FROM works
		INNER JOIN users 
		ON works.uid = users.uid
		WHERE wstatus = 'P'
		ORDER BY works.wupdate_date DESC
		LIMIT 15";
	$stmt = $dbh->query($qry);
?>
<!DOCTYPE html>
<html lang='ja'>
	<head>
		<meta charset="UTF-8">
		<meta name="description" content="SF小説投稿サイト TOPページ">
		<title>SF小説</title>
		<link rel="stylesheet" href="common/css/sfstyle.css">
		<script type="text/javascript" src=""></script>
	</head>
	<body>
		<?php include('header.php'); ?>
		<div class="content">
			<h1>SF小説投稿サイト</h1>
			<div id="updated">
				<p id="updatewrk">更新作品</p>
				<ul id="updateul">
				<?php
					while($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
						$wid = $result['wid'];
						$title = $result['title'];
						$wupdate = $result['wupdate_date'];
						$uname = $result['uname'];
						print "<li id=\"updateli\"><a id=\"lista\" href=\"wrk.php?wid=$wid&auther=$uname&title=$title\">$title</a> /$uname [". $wupdate ."]</li>";
					}
				?>
				</ul>
			</div>
			<div id="search">
				<p>作品検索</p>
			</div>
			<div id="worklist">
				<p><a href="">作品一覧</a></p>
			</div>
			<div id="news">
				<p>お知らせ</p>
			</div>
		</div>

		<div id="footer">
		</div>	
	</body>
</html>
