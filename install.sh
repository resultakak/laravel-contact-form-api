#!/bin/sh

# (>_ resultakak@gmail.com)

git clone https://github.com/resultakak/laravel-contact-form-api.git

cd ./laravel-contact-form-api

cp .env.example .env

composer install

./vendor/bin/sail up -d

docker-compose exec laravel.test sh setup.sh
