FROM archlinux/base
MAINTAINER CSEC-380 Group 14

# Install packages
RUN pacman -Syu --noconfirm
RUN pacman -S --noconfirm apache

# Initialize Apache
COPY httpd.conf /etc/httpd/conf/httpd.conf

# Initialize web content
COPY index.html /srv/http/index.html
COPY index.js /srv/http/index.js
COPY main.css /srv/http/main.css
COPY audio /srv/http/audio
COPY video /srv/http/video
COPY img /srv/http/img

CMD apachectl -D FOREGROUND
