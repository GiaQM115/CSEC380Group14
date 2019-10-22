FROM php:7.3-apache

# Initialize PHP/Apache
RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"
RUN docker-php-ext-install mysqli
RUN docker-php-ext-install dbo_mysql
RUN docker-php-ext-enable mysqli
RUN docker-php-ext-enable dbo_mysql

# Initialize web content
COPY vendor /var/www/html/
COPY video /var/www/html/
COPY * /var/www/html/
