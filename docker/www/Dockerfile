FROM php:7.3-apache

# Initialize PHP
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"
RUN docker-php-ext-install mysqli
RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-install fileinfo

# Initialize Apache-PHP
COPY apache2.conf /etc/apache2/
COPY brickflix.conf /etc/apache2/sites-available/
RUN a2enmod headers && a2dismod autoindex -f
RUN a2dissite 000-default && a2ensite brickflix

# Initialize web content
COPY ./ /var/www/html/
RUN rm *.conf Dockerfile && mkdir /var/www/videos
RUN chown -R www-data:www-data /var/www/html/
