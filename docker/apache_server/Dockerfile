FROM archlinux/base
MAINTAINER CSEC-380 Group 14

RUN pacman -Syu --noconfirm
RUN pacman -S --noconfirm apache
ADD index.html /var/www/html/index.html

EXPOSE 80
CMD apachectl -D FOREGROUND
