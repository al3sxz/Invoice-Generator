FROM php:8.2

RUN apt-get update && apt-get install -y \
    git build-essential curl zip unzip libpng-dev libmagickwand-dev libmcrypt-dev jpegoptim optipng libonig-dev libxml2-dev pngquant gifsicle libonig-dev libxml2-dev libzip-dev libjpeg62-turbo-dev libgd-dev zlib1g-dev libjpeg-dev libfreetype6-dev libcurl4-openssl-dev \
    && docker-php-ext-install pdo pdo_mysql  mbstring xml ctype fileinfo dom curl zip iconv \
    && pecl install imagick \
    && docker-php-ext-enable imagick \
    && apt-get clean

RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY . .

RUN composer install --optimize-autoloader --no-dev --no-interaction
RUN mkdir -p /app/storage/app/public && \
    chmod -R 775 /app/storage/app/public && \
    chown -R www-data:www-data /app/storage/app/public && \
    rm -f /app/public/storage 2>/dev/null || true

RUN npm install && npm run build

EXPOSE 8000