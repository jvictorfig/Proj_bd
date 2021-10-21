FROM php:5.6-apache
LABEL maintainer 'Caio Davinis <caio@dvinesweb.com.br>'

WORKDIR /var/www/html/

COPY . .

EXPOSE 80

RUN apt-get update && \
    docker-php-ext-install mysqli mysql calendar

RUN chown -R www-data:www-data /var/www

RUN touch /usr/local/etc/php/conf.d/php.ini \
    && echo "max_execution_time  = 4000" >> /usr/local/etc/php/conf.d/php.ini \
    && echo "memory_limit = 4000M" >> /usr/local/etc/php/conf.d/php.ini \
    && echo "upload_max_filesize = 400M" >> /usr/local/etc/php/conf.d/php.ini \
    && echo "max_file_uploads = 5" >> /usr/local/etc/php/conf.d/php.ini \
    && echo "output_buffering = On" >> /usr/local/etc/php/conf.d/php.ini \
    && echo "display_errors = Off" >> /usr/local/etc/php/conf.d/php.ini \
    && echo "short_open_tag = On" >> /usr/local/etc/php/conf.d/php.ini \
    && echo "mysql.default_socket = /path/to/mysql.sock" >> /usr/local/etc/php/conf.d/php.ini \
    && echo "mysql.default_socket = /path/to/mysqli.sock" >> /usr/local/etc/php/conf.d/php.ini \
    && echo "default_charset = UTF-8" >> /usr/local/etc/php/conf.d/php.ini
    