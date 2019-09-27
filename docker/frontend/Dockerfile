FROM archlinux/base
MAINTAINER CSEC-380 Group 14

# Install packages
RUN pacman -Syu --noconfirm
RUN pacman -S --noconfirm apache php-fpm

# Initialize apache
COPY httpd.conf /etc/httpd/httpd.conf
COPY php-fpm.conf /etc/httpd/conf/extra/php-fpm.conf

# Initialize web content
COPY index.html /srv/http/index.html
COPY index.js /srv/http/index.js
COPY audio /srv/http/audio

CMD apachectl -D FOREGROUND
