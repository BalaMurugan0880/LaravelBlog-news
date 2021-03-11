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

## Use storate images
```
$ php artisan storage:link
```

## Mail setup 
```
visit at : https://mailtrap.io/
put mail credentials in .env file
```
