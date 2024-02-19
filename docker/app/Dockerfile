FROM php:7.4-fpm-alpine

# Install dev dependencies
RUN apk update \
    && apk upgrade --available \
    && apk add --virtual build-deps \
        autoconf \
        build-base \
        git \
        curl \
        bash \
        supervisor

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer

# Install PHP extensions
RUN docker-php-ext-install -j$(getconf _NPROCESSORS_ONLN) pdo_mysql

RUN mkdir -p /var/log/supervisord/

COPY --chmod=755 docker/supervisord.conf /etc/supervisor/supervisord.conf
COPY --chmod=755 docker/app/entrypoint.sh /entrypoint.sh

ENTRYPOINT [ "/entrypoint.sh" ]
