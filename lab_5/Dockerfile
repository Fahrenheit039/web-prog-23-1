FROM php:8-fpm

#1
RUN apt-get update && apt-get install -y git

#2
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

#3
RUN docker-php-ext-install mysqli
RUN docker-php-ext-install pdo pdo_mysql

