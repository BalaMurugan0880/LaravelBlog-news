## Build Blog CMS (Content Management System) with Laravel 7

## Clone this repo
```
https://github.com/BalaMurugan0880/LaravelBlog-news.git
```

## Install composer packages
```
$ cd laravel-7-blog-cms
$ composer install
$ npm install
$ npm run dev
```

## Create and setup .env file
```
make a copy of .env.example and rename to .env
$ php artisan key:generate
put database credentials in .env file
```

## Migrate and insert records
```
$ php artisan migrate
$ php artisan db:seed
```

## Use storage images
```
$ php artisan storage:link
```

## Mail setup for gmail
```
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com //if you are using gmail
MAIL_PORT=25
MAIL_USERNAME= //Your gmail
MAIL_PASSWORD= //Your pass
MAIL_FROM_ADDRESS= //Your Gmail
MAIL_FROM_NAME="${APP_NAME}"
MAIL_ENCRYPTION=tls
```

## Live Server Storage
```
Need to create galleries folder under storage folder #important
```

## Api Live Server
```
If certain or all api not displaying please run manually "composer require spatie/laravel-query-builder"
```
