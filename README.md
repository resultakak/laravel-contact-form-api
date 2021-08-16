# Laravel Contact Form API

## API

### [Postman Collection](ContactFormAPI.postman_collection.json)

## Configuration

```bash
cp .env.example .env
```

```ini
# .env file
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=587
MAIL_USERNAME=<USERNAME>
MAIL_PASSWORD=<PASSWORD>
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=noreply@example.com
MAIL_FROM_NAME="${APP_NAME}"
```

## Install

```bash
composer install
./vendor/bin/sail up -d
docker-compose exec laravel.test php artisan migrate
docker-compose exec laravel.test php artisan db:seed
```

## Test

```bash
curl -I http://localhost/
```

## Run

```bash
docker-compose exec laravel.test php artisan queue:work
```

or 

```bash
cp .env.example .env

composer install

./vendor/bin/sail up -d

docker-compose exec laravel.test sh setup.sh
```

## Configuration

```ini
# .env file
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=587
MAIL_USERNAME=<USERNAME>
MAIL_PASSWORD=<PASSWORD>
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=noreply@example.com
MAIL_FROM_NAME="${APP_NAME}"
```

## API

### [Postman Collection](ContactFormAPI.postman_collection.json)
