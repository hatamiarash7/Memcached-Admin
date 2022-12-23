FROM php:8.2-apache

RUN apt-get update && apt-get install --no-install-recommends -y \
        libfreetype6-dev \
        libmcrypt-dev \
        libonig-dev \
        && docker-php-ext-configure gd \
        && docker-php-ext-install -j$(nproc) gd \
        && docker-php-source delete \
        && rm -rf /var/lib/apt/lists/*

COPY /app /var/www/html
COPY /apache/vhost.conf /etc/apache2/sites-available/000-default.conf

RUN chown -R www-data:www-data /var/www/html && a2enmod rewrite && service apache2 restart

EXPOSE 80

CMD ["apachectl", "-D", "FOREGROUND"]
