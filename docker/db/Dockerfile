FROM mariadb:latest

COPY initdb.sql /docker-entrypoint-initdb.d/000-initdb.sql
COPY MySQL.sql /docker-entrypoint-initdb.d/001-MySQL.sql
