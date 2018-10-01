<div id="header">
<nav class="navi">
<?php
	session_start();
	if(isset($_SESSION['UNAME'])) {
		$uname = $_SESSION['UNAME'];
		print "<ul id=\"menu\">";
		print "<li><a href=\"top.php\">SF小説投稿サイト</a></li>";
		print "<li><a href=\"about.php\">このサイトについて</a></li>";
		print "<li><a href=\"wrkManager.php\">". $uname ."：作品管理</a></li>";
		print "<li><a href=\"signOut.php\">ログアウト</a></li>";
		print "</ul>";
	
	} else {
		print "<ul id=\"menu\">";
		print "<li><a href=\"top.php\">SF小説投稿サイト</a></li>";
		print "<li><a href=\"about.php\">このサイトについて</a></li>";
		print "<li><a href=\"signIn.php\">ログイン</a></li>";
		print "<li><a href=\"signUp.php\">ユーザー登録</a></li>";
		print "</ul>";
	}
?>
</nav>
</div>
