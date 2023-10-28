# install PHP
FROM php:8.2-fpm

# install node
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash && apt-get install -y nodejs

# install requied apps and extensions
RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    libzip-dev \
    ghostscript \
&& docker-php-ext-install exif zip opcache mysqli

# install imagick php extension with dependencies
RUN apt-get update \
&& apt-get install -y libmagickwand-dev --no-install-recommends \
&& pecl install imagick \
&& docker-php-ext-enable imagick

# install memcached php extension with dependencies
RUN apt-get update \
&& apt-get install -y libz-dev libmemcached-dev memcached libmemcached-tools libssl-dev \
&& pecl install memcached \
&& docker-php-ext-enable memcached

# install php-redis extension
RUN pecl install redis \
&& docker-php-ext-enable redis

# install composer
#COPY --from=composer/composer:latest-bin /composer /usr/bin/composer

# set workdir
WORKDIR /var/www
COPY . .
