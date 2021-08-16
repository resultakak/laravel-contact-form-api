FROM php:7.4-fpm

ARG INSTALL_VERSION=4.0.0

ARG user=sail
ARG uid=1000

RUN apt-get update && apt-get install -y --no-install-recommends \
    ${PHPIZE_DEPS} \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libpcre3-dev \
    libz-dev \
    libmemcached-dev \
    zip \
    unzip \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install \
    bcmath \
    ctype \
    dom \
    json \
    iconv \
    mbstring \
    pdo \
    pdo_mysql \
    session \
    simplexml \
    xml \
    exif \
    pcntl \
    gd \
    xmlwriter

RUN pecl install memcached xdebug redis \
	&& docker-php-ext-enable memcached xdebug redis

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN useradd -G www-data,root -u $uid -d /home/$user $user
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user
