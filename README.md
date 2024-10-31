# ai-english-app

Udemyで公開している英会話アプリ制作コースのソースコードです。
使い方の詳細はコースをご参照ください。

## 環境

- PHP v8.3
- Laravel v11
- Laravel Sail
- Laravel Breeze
- inertia.js
- React18
- MySQL
- Pest
- Docker

## インストール方法

前提として、以下が必要です
- Gitがインストールされている
- Dockerがインストールされている
- PHP v8.2以上がインストールされている
- Composerがインストールされている

### 手順

Gitクローン（お好きなフォルダで）
```
git clone xxxx(リポジトリのURL)
```

.env.exampleファイルをコピーして .envファイルを生成する
```
cd quiz-app
cp .env.example .env
```

APP_KEYを生成
```
php artisan key:generate
```

.env の OPENAI_API_KEYにAPI Keyを追記する ※生成方法はコース内で解説しています
```
OPENAI_API_KEY=sk-xxxx...(以下省略)
```

Dockerコンテナを起動（初回起動時は時間がかかります）
```
sail up -d
```

viteを起動（ターミナルで別タブを開いて実行するのがおすすめ）
```
sail npm run dev
```

マイグレーションを実行
```
sail artisan migrate
```

シーディングを実行（ユーザーデータを作成）
```
sail artisan db:seed
```

ストレージのシンボリックリンクを作成
```
sail artisan storage:link
```

ログイン画面：localhost/login を開く

ログイン情報
- メールアドレス：test@example.com
- パスワード：password123
