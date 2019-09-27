FROM archlinux/base
MAINTAINER CSEC-380 Group 14

# Install packages
RUN pacman -Syu --noconfirm
RUN pacman -S --noconfirm mysql
RUN pacman -S --noconfirm php

# Initialize MariaDB (MySQL)
RUN mariadb-install-db --user=mysql --basedir=/usr --datadir=/var/lib/mysql

# Initialize PHP
COPY index.php /srv/http/index.php

CMD cd '/usr' ; /usr/bin/mysqld_safe --datadir='/var/lib/mysql' & php -S localhost:8000 -t /srv/http
