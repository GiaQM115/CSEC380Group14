FROM php:7.3-apache

# Initialize PHP
COPY php.ini $PHP_INI_DIR/
RUN docker-php-ext-install mysqli pdo_mysql

# Initialize Apache-PHP
COPY apache2.conf /etc/apache2/
COPY brickflix.conf /etc/apache2/sites-available/
RUN a2enmod headers && a2dismod autoindex -f
RUN a2dissite 000-default && a2ensite brickflix

# Initialize web content
COPY ./ /var/www/html/
RUN rm *.conf Dockerfile php.ini && mkdir /var/www/html/videos/
RUN chown -R www-data:www-data /var/www/html/
