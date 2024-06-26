FROM php:8.1-apache

RUN docker-php-ext-install mysqli pdo_mysql

RUN apt-get update \
    && apt-get install -y libzip-dev \
    && apt-get install -y zlib1g-dev \
    && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-install zip

RUN useradd ctfplayer --password SLNhDu9ktGAHf8NEnhdzPE

USER ctfplayer