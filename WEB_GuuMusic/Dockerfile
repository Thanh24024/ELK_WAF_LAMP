FROM php:8.2-apache

# Cài extension MySQL
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Enable mod rewrite (cho .htaccess)
RUN a2enmod rewrite

# Set working dir
WORKDIR /var/www/html
