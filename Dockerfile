FROM php:8.2

RUN apt-get update && apt-get install -y \
    git build-essential curl zip unzip libpng-dev libmagickwand-dev libmcrypt-dev jpegoptim optipng libonig-dev libxml2-dev pngquant gifsicle libonig-dev libxml2-dev libzip-dev libjpeg62-turbo-dev libgd-dev zlib1g-dev libjpeg-dev libfreetype6-dev libcurl4-openssl-dev nginx \
    && docker-php-ext-install pdo pdo_mysql  mbstring xml ctype fileinfo dom curl zip iconv -j$(nproc) gd  \
    && docker-php-ext-configure gd --with-jpeg \
    && pecl install imagick \
    && docker-php-ext-enable imagick \
    && apt-get clean

RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY . .

RUN composer install --optimize-autoloader --no-dev --no-interaction
RUN npm install && npm run build

COPY nginx.conf /etc/nginx/sites-available/default

EXPOSE 8000