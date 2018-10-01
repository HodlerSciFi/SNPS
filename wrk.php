<?php
	require 'common/php/dbConnect.php';
	$wid = $_GET['wid'];
	$auther = $_GET['auther'];
	$title = $_GET['title'];
	$qry = "SELECT 
				sectitle,
				sid,
				secorder,
				status
			FROM sections
			WHERE wid = $wid
			ORDER BY secorder";
	$stmt = $dbh->query($qry);
?>
<!DOCTYPE html>
<html lang='ja'>
	<head>
		<meta charset="UTF-8">
		<meta name="description" content="SF小説投稿サイト">
		<title>SF小説</title>
		<link rel="stylesheet" href="common/css/sfstyle.css">
		<script type="text/javascript" src=""></script>
	</head>
	<body>
		<?php include('header.php'); ?>
		<div id="content">
			<h1 id="wrktitle" ><?php echo $title; ?></h1>
			<h2 id="auther" ><?php echo $auther; ?></h2>
			<div id="sections">
			<ul id="secul">
			<?php
				while($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
					$sectitle = $result['sectitle'];	
					$status = $result['status'];
					$secorder = $result['secorder'];
					$sid = $result['sid'];
					if($status == 'O') {
						print "<li id=\"seli\"><a href=\"contentViewer.php?wid=$wid&uname=$uname&title=$title&sid=$sid&secorder=$secorder&sectitle=$sectitle\">$sectitle</a></li>";	
					}
				}
			?>
			</ul>
			</div>
			<div id="top">
				<p><a href="top.php">Top</a></p>
			</div>
		</div>
		<div id="footer">
		</div>	
	</body>
</html>
