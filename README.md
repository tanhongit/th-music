# music-laravel

Create Music App with Laravel

# 1. Technology
- PHP ^8.1
- Laravel Framework 9.x

# 2. Configuration requirements
- Install composer: https://getcomposer.org/

# 3. Running

## Clone repo

```
git clone https://github.com/TanHongIT/music-laravel.git
cd music-laravel
```

## Composer & npm

Run:

```
npm install
composer install
```

## Create APP_KEY

Run:

```
php artisan key:generate
```

## Create a new database in your host & edit .env

Create a new database in your server and edit the information in the .env file

```laravel
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```

## Migrate Database

Run:

```
php artisan migrate
```

## Run seeder

```
php artisan db:seed
```

## Launch project
Now, Launch your system...

Run the laravel project on port: http://localhost:8000

```
php artisan serve
```

Go to http://localhost:8000/login:
- Username: username1
- Password: 123456789

## Swagger Setup

First, you need to install the swagger library for php
```bash
composer require zircote/swagger-php ^4.4
```
Second, modify the API_HOST parameters in ./development/swagger-constants.php

Third, run ./swagger.sh inside folder development for generating swagger.json file. This file is located inside public/swagger folder

Finally, you can check the swagger documentation at: "http://${API_HOST}/swagger/index.html"
