<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Чат
Создание чата в целях изучения веб-сокетов.

## Требования
* [PHP 8.1+](https://www.php.net/)
* [Laravel 10](https://laravel.com/)
* [Composer](https://getcomposer.org/)
* [MySQL](https://www.mysql.com/)
* [Node.js](https://nodejs.org/)

## Запуск
1. Клонируйте этот репозиторий и перейдите в папку проекта:
```sh
git clone https://github.com/AllaAverina/websockets-chat
cd websockets-chat
```
2. Установите зависимости:
```sh
composer install
npm install
```
3. Запустите MySQL, измените параметры для подключения к базе данных в файле .env.example и выполните:
```sh
cp .env.example .env
```
4. Сгенерируйте ключ приложения:
```sh
php artisan key:generate
```
5. Выполните команду для запуска миграций:
```sh
php artisan migrate
```
6. Запустите [WebSockets](https://beyondco.de/docs/laravel-websockets/getting-started/introduction) сервер:
```sh
php artisan websockets:serve
```
7. Запустите PHP Laravel сервер:
```sh
php artisan serve
```
8. Запустите Node сервер:
```sh
npm run dev
```
9. Откройте в браузере http://localhost:8000/

## Пример
![Чат](https://github.com/AllaAverina/websockets-chat/blob/main/screenshot.png)