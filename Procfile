web: vendor/bin/heroku-php-apache2 web/
worker: php artisan queue:restart && php artisan queue:work database --tries=3