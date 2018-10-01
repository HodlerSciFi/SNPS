<!DOCTYPE html>
<html lang='ja'>
	<head>
		<meta charset="UTF-8">
		<meta name="description" content="SF小説投稿サイトログイン">
		<title>ログイン</title>
		<link rel="stylesheet" href="common/css/sfstyle.css">
		<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#signIn').click(function() {
                    $.ajax( {
                        type: "POST",
                        url: "signInCheck.php",
                        data: {
                            'username':$('#username').val(),
                            'password':$('#password').val(),
                        }
                    }).done(function(data) {
						if(data[0].check == true){
							location.href = data[0].loc;
						}else {
                        	var $returnMsg = $('#returnMsg');
                        	$returnMsg.append("<p>" + data[0].error + "</p>");
						}
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
			<h1>ログイン</h1>
			<form id="loginForm" name="loginForm" action="" method="POST">
				<label for="username">ユーザー名</label><input id="username" name="username" type="text" value=""><br/>
				<label for="password">パスワード</label><input id="password" name="password" type="password"><br/>
			</form>
			<button id="signIn">ログイン</button>
		</div>
		<div id="returnMsg"></div>
		<div id="footer">
		</div>	
	</body>
</html>
