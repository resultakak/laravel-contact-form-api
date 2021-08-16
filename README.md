# Laravel Contact Form API

## Install

```bash
curl -s https://raw.githubusercontent.com/resultakak/laravel-contact-form-api/main/install.sh | bash
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
