FROM php:7.2-fpm

MAINTAINER Nicola Pietroluongo <nik.longstone@gmail.com>

RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libmcrypt-dev \
        libpng-dev \
        apt-utils \
        libxml2-dev \
        zlib1g-dev \
        zip \
        libcurl4 \
        libpcre3-dev \
        libcurl4-openssl-dev \
        libpq-dev \
#        cron \
#        supervisor \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install -j$(nproc) iconv pdo pdo_pgsql pgsql mbstring \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install soap \
    && docker-php-ext-install zip

COPY symfony.pool.conf  /usr/local/etc/

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin/ --filename=composer
RUN composer global require hirak/prestissimo

RUN usermod -u 1000 www-data

#RUN composer update

#COPY cron_commands /etc/cron.d/cron-commands

#RUN chmod 0644 /etc/cron.d/cron-commands

#RUN crontab /etc/cron.d/cron-commands

#RUN touch /var/log/cron.log

#COPY queues.conf /etc/supervisor/conf.d/queues.conf

#CMD cron && tail -f /var/log/cron.log

EXPOSE 9000
#CMD php-fpm & /usr/bin/supervisord & cron -f
CMD ["php-fpm", "-F"]
