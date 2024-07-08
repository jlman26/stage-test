# Use the official PHP image as a base image
FROM php:7.4-apache

# Install necessary PHP extensions
RUN docker-php-ext-install pdo_mysql

# Copy application files to the Apache document root
COPY . /var/www/html/

# Set file permissions
RUN chown -R www-data:www-data /var/www/html/
