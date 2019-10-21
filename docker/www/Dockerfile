FROM php:7.3-apache

# Initialize PHP/Apache
RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"
RUN docker-php-ext-install mysqli
RUN docker-php-ext-enable mysqli

# Initialize web content
COPY * /var/www/html/
