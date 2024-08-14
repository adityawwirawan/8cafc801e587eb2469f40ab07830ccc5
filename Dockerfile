FROM php:8.0-fpm
RUN docker-php-ext-install pdo pdo_pgsql
COPY . /var/www
WORKDIR /var/www
