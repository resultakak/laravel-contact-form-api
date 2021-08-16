#!/bin/sh

# (>_ resultakak@gmail.com)

composer install

php artisan migrate

php artisan db:seed
