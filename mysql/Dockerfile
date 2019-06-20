FROM mysql:5.7

ENV MYSQL_DATABASE test
ENV MYSQL_SERVER mysql
ENV MYSQL_ROOT_PASSWORD test

COPY docker-entrypoint/create.sql /docker-entrypoint-initdb.d/create.sql