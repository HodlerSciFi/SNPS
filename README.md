# SNPS
- Sci-fi Novel Posting Site project
- SF小説投稿サイト

## 環境 
- LAMP 
	- CentOS 7
	- Apache 2.4.6
	- MySQL 5.6.41
	- PHP 7.0.32
- DBスキーマ
	- /DB_schemaに格納: database.ddl.sql
- /var/www/html配下にDBスキーマ以外のファイルを配置

## アプリ構成
![アプリ構成](https://github.com/HodlerSciFi/GARAGE/raw/master/SNPS-diagram.png)

## 要件関連
- データ送信:ユーザー登録、ログインにAjax使用。本文登録、編集機能まわりではAjax未使用>間に合わず。
- セッション保持方法: ファイルで保持

- 

