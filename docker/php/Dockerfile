FROM php:8.1-cli-alpine

RUN apk add --no-cache git unzip bash coreutils

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/bin --filename=composer --quiet

ENV COMPOSER_ALLOW_SUPERUSER 1

WORKDIR /app