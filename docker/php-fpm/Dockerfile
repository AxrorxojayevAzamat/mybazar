FROM hermsi/alpine-fpm-php:7.2.28

<<<<<<< HEAD
RUN mv /usr/local/etc/php/php.ini-development /usr/local/etc/php/php.ini
RUN sed -i 's/;opcache.enable=1/opcache.enable=0/g' /usr/local/etc/php/php.ini

=======
>>>>>>> mybazar_index
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer global require hirak/prestissimo

EXPOSE 9000
CMD ["php-fpm", "-F"]
