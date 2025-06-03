FROM php:8.4-cli

RUN apt-get update &&  apt-get install -y \
      zip \
      git \
      wget \
      gpg \
      libicu-dev && \
    pecl install -o -f xdebug && \
    docker-php-ext-enable xdebug && \
    docker-php-ext-configure intl --enable-intl && \
    docker-php-ext-install intl && \
    echo "xdebug.mode = develop,coverage,debug" >> "$PHP_INI_DIR/conf.d/docker-php-ext-xdebug.ini"

ENV COMPOSER_ALLOW_SUPERUSER=1 \
    COMPOSER_PROCESS_TIMEOUT=1200

RUN curl --silent --show-error https://getcomposer.org/installer | php -- \
      --install-dir=/usr/bin --filename=composer && \
    git config --global --add safe.directory "*"