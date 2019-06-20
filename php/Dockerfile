FROM php:7.0-apache

ENV MYSQL_DATABASE test
ENV MYSQL_USER root
ENV MYSQL_PASSWORD test
ENV MYSQL_SERVER mysql

# Install extra php libraries
RUN docker-php-ext-install mysqli
 