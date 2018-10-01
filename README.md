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
- /var/www/html配下にDBスキーマ以外のファイルを配置してデプロイ

## アプリ構成
![アプリ構成](https://github.com/HodlerSciFi/GARAGE/raw/master/SNPS-diagram.png)

## 要件関連
- データ送信:ユーザー登録、ログインにAjax使用。本文登録、編集機能まわりではAjax未使用>間に合わず。
- セッション保持方法: ファイルで保持
### DB ER図
![NOVELDB-ER](https://github.com/HodlerSciFi/GARAGE/raw/master/NOVELDBV1.png)

## 未実装だが必要だと考える要件
小説投稿サイトの要件として...
- 作品一覧ページ
- 作品検索機能
- 作品削除機能
- 作品ステータス管理機能
- 話数管理機能
- SNSログイン認証機能
- 各作品SNS投稿ボタン
- コメント機能
- コメント一覧表示機能
サイトの作り全般に関して...
- 適切なディレクトリ階層つくる(機能ごとにディレクトリまとめる: ログイン系、作品管理系、作品編集系...)
- ページの遷移が適切でない部分がいくつか残ってる
	- ユーザー登録 > 作品管理画面に遷移しない
	- 本文登録、本文更新画面からどの画面に遷移するのが適切か決めきれてない
- デザイン ほぼ未実装

## 最も重要な未実装要件
- 適切な(ダサくない)サイト名をつける...カクヨム、新都社のようなイケてる単語を創造する必要がある
 



