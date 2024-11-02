FROM php:8.3-apache

RUN apt-get update && apt-get install --no-install-recommends -y \
        libfreetype6-dev \
        libmcrypt-dev \
        libonig-dev
COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/bin/install-php-extensions
RUN apt-get update && apt-get install --no-install-recommends -y \
        libfreetype6-dev \
        libmcrypt-dev \
        libonig-dev \
        && rm -rf /var/lib/apt/lists/*

# Install default PHP Extensions
RUN install-php-extensions \
    memcached \
    memcache \
    gd \
    opcache

RUN rm -rf /var/lib/apt/lists/*
RUN rm -rf /var/cache/apt

COPY /app /var/www/html
COPY /apache/vhost.conf /etc/apache2/sites-available/000-default.conf

RUN chown -R www-data:www-data /var/www/html && a2enmod rewrite && service apache2 restart

EXPOSE 80

CMD ["apachectl", "-D", "FOREGROUND"]
