# FROM php:8.1-apache
FROM registry.u-bordeaux.fr/security-but3/php:8.1-apache

# Install MySQL extension
RUN docker-php-ext-install pdo pdo_mysql
