FROM archlinux/base
MAINTAINER CSEC-380 Group 14

# Install packages
RUN pacman -Syu --noconfirm
RUN pacman -S --noconfirm apache
RUN pacman -S --noconfirm php-fpm

# Load config files for httpd
COPY httpd.conf /etc/httpd/httpd.conf

# Load web content for httpd
COPY index.html /srv/http/index.html

CMD apachectl -D FOREGROUND
