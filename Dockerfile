FROM php:7.2.2-apache
COPY src/ /var/www/html/
RUN docker-php-ext-install pdo_mysql