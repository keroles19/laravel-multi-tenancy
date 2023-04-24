
## This is a Laravel app for single database Tenancy Application 

## Setup
- run `cp .env.example .env`
- update `.env` replace these keys, with the live data:

- add database credentials in `.env`

- run `composer install`
- run `composer dump-autoload`
- run `npm install`
- run `npm run build`
- run `php artisan key:generate`
- run `php artisan config:clear && php artisan cache:clear`
- run `php artisan migrate:fresh --seed`
