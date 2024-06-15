#アプリケーション名

COACHTECH

##作成した目的

coachtechブランドのアイテムを出品する

##URL

アプリページ：http://localhost/

メール：http://localhost:8025/

phpMyadmin:http://localhost:8080/

##機能一覧

ログイン・ログアウト機能、会員登録機能、マイページ、商品一覧表示、商品出品機能、
商品お気に入り登録機能、商品名検索、コメント機能、プロフィール編集機能、商品購入機能、クレジット、銀行口座決済機能
権限（管理者・利用者）、ストレージ機能、メール機能

##使用技術

Laravel Framework 8.83.8

PHP 7.4.9

##環境構築

Dockerビルド

1.git clone リンク
2.docker-compose.ymlにmailhog:
    image: mailhog/mailhog
    container_name: mailhog
    ports:
      - "1025:1025"
      - "8025:8025"
    networks:
      - app-network

networks:
  app-network:
    driver: bridge
を追記
3.docker-compose up -d --build

Laravel環境構築

1.docker-compose exec php bash 2.composer install
3.cp .env.example .envを行い、環境変数を変更 
4.php artisan key:generate 5.php artisan mirate 6.php artisan db:seed

##ER図

![画像]()

##アカウントの種類
管理者（AdminUser）
メールアドレス：admin@example.com
パスワード：password
利用者
User1
メールアドレス：user1@example.com
パスワード：password
User2
メールアドレス：user2@example.com
パスワード：password
