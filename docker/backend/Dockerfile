FROM archlinux/base
MAINTAINER CSEC-380 Group 14

# Install packages
RUN pacman -Syu --noconfirm
RUN pacman -S --noconfirm mysql php-fpm

# Initialize MariaDB (MySQL)
RUN mariadb-install-db --user=mysql --basedir=/usr --datadir=/var/lib/mysql

# Initialize PHP-FPM
COPY www.conf /etc/php/php-fpm.d/www.conf

# Initialize web content
COPY index.php /srv/http/index.php

CMD php-fpm && mysqld_safe
