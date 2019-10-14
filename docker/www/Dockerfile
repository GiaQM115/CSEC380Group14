FROM php:7.3-apache

# Initialize PHP/Apache
RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"
RUN docker-php-ext-install mysqli
RUN docker-php-ext-enable mysqli

# Initialize web content
COPY *.html /var/www/html/
COPY *.css /var/www/html/
COPY *.js /var/www/html/
COPY *.php /var/www/html/
COPY *.ico /var/www/html/
COPY video/ /var/www/html/
