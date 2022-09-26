## Install

### Install Laravel

- testprice folder
- create database
- update `.env` file to connect to database
- use console and run `php artisan migrate:fresh && php artisan db:seed --class=TotalSeeder`
- check data in database. if migration was incorrect, use Dump20220922.sql
- run server `php artisan serve`
- check url `http://127.0.0.1:8000/price`

### Install Front

- test-task folder
- project setup `npm install`
- compiles and hot-reloads for development `npm run serve`
- check url `http://localhost:8080/`
