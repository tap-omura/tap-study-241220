FROM php:8.3-apache

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN apt-get update && apt-get install -y git zip libzip-dev
RUN docker-php-ext-install zip
WORKDIR /var/www/html

COPY . .