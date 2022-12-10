**Installation

$ git clone https://github.com/asmaasaeed057/fleet-management-system.git

$ cd fleet-management-system

$ composer install

$ cp .env.example .env

$ configure your database in .env

$ php artisan migrate --seed

$ php artisan key:generate

$ php artisan serve


**Tests

You can run 

$ php artisan test

Api Documentation link 

https://documenter.getpostman.com/view/6592079/2s8YzS14Fh


**Docker 

You can run The project using sail

cd fleet-management-system

cp .env.example .env  

in .env change make APP_PORT=8888 and DB_PORT=3307 

./vendor/bin/sail up

./vendor/bin/sail artisan migrate:fresh --seed
