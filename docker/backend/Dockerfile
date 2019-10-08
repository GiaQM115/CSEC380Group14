FROM archlinux/base
MAINTAINER CSEC-380 Group 14

# Install packages
RUN pacman -Syu --noconfirm
RUN pacman -S --noconfirm mysql php-fpm

# Initialize MariaDB (MySQL)
RUN mariadb-install-db --user=mysql --basedir=/usr --datadir=/var/lib/mysql
COPY initdb.sql /tmp/initdb.sql

# Initialize PHP-FPM
COPY www.conf /etc/php/php-fpm.d/www.conf
COPY php-fpm.conf /etc/php/php-fpm.conf
COPY php.ini /etc/php/php.ini

# Initialize web content
COPY login.php /srv/http/index.php

CMD mysqld_safe & sleep 1 && mysql -u root < /tmp/initdb.sql && php-fpm -O
