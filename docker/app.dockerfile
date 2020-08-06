FROM php:fpm

RUN apt-get update && apt-get install -y default-mysql-client --no-install-recommends \
    && docker-php-ext-install pdo_mysql bcmath
