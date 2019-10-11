FROM archlinux/base
MAINTAINER CSEC-380 Group 14

# Install packages
RUN pacman -Syu --noconfirm
RUN pacman -S --noconfirm apache

# Initialize Apache
COPY httpd.conf /etc/httpd/conf/httpd.conf

# Initialize web content
COPY home.html /srv/http/home.html
COPY login.html /srv/http/login.html
COPY js /srv/http/js
COPY css /srv/http/css
COPY img /srv/http/img
COPY video /srv/http/video

CMD apachectl -D FOREGROUND
