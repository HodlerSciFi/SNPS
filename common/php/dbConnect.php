<?php

$db['host']="localhost";
$db['user']="nuser";
$db['pass']="nuser";
$db['dbname']="NOVELDBV1";
$dsn = sprintf('mysql: host=%s; dbname=%s; charset=utf8', $db['host'], $db['dbname']);

	try{
		$dbh = new PDO($dsn, $db['user'], $db['pass'], array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));

	} catch (PDOException $e) {
		print "DB接続エラー:{$e->getMessage()}";
		die();
	}
?>
