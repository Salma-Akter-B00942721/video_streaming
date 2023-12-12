
FROM php:8.0

WORKDIR /app

COPY . /app

RUN composer install

