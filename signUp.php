<!DOCTYPE html>
<html lang='ja'>
	<head>
		<meta charset="UTF-8">
		<meta name="description" content="SF小説投稿サイトユーザー登録">
		<title>ユーザー登録</title>
		<link rel="stylesheet" href="common/css/sfstyle.css">
		<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				$('#signUp').click(function() {
					$.ajax( {
						type: "POST",
						url: "userRegist.php",
						data: {
							'username':$('#username').val(),
							'password':$('#password').val(),
							'password2':$('#password2').val(),
							'email':$('#email').val()
						}
					}).done(function(data) {
						var $returnMsg = $('#returnMsg');
						$returnMsg.append("<p>" + data[0].success + "</p>");
						$returnMsg.append("<p>" + data[0].error + "</p>");
					}).fail(function(XMLHttpRequest, textStatus, errorThrown) {
						alert('サーバー通信エラー: ' + errorThrown);
					});
				});
			});
		</script>
	</head>
	<body>
		<?php include('header.php'); ?>
		<div id="content">
			<h1>ユーザー登録</h1>
			<p>※作品投稿する人のみユーザー登録が必要です</p>
			<form id="loginForm" method="POST" accept-charset="utf-8" return false>
				<label for="username">ユーザー名</label><input id="username" name="username" type="text" value=""><br/>
				<label for="email">EMAIL</label><input id="email" name="email" type="email" value=""><br/>
				<label for="password">パスワード</label><input id="password" name="password" type="password"><br/>
				<label for="password2">パスワード（確認）</label><input id="password2" name="password2" type="password"><br/>
			</form>
			<button id="signUp">新規登録</button>
		</div>
		<div id="returnMsg"></div>
		<div id="footer">
		</div>	
	</body>
</html>
