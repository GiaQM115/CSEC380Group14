FROM php:7.3-apache

# Initialize PHP
RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"
RUN docker-php-ext-install mysqli
RUN docker-php-ext-install pdo_mysql

# Initialize Apache-PHP

# Initialize web content
COPY ./ /var/www/html/
RUN chown -R www-data:www-data /var/www/html/
