FROM php:7.3-apache

# Initialize PHP/Apache
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

# Initialize web content
COPY index* /var/www/html/
COPY src/ /var/www/html/
COPY error/ /var/www/html/
COPY video/ /var/www/html/
