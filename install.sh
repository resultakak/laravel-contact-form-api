#!/bin/sh

# (>_ resultakak@gmail.com)

git clone https://github.com/resultakak/laravel-contact-form-api.git

cd ./laravel-contact-form-api

cp .env.example .env

chmod +x setup.sh

docker-compose up -d

docker-compose exec laravel.test sh setup.sh
