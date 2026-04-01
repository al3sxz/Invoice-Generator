FROM php:8.2

RUN apt-get update && apt-get install -y \
    git curl zip unzip libpng-dev libonig-dev libxml2-dev libzip-dev libcurl4-openssl-dev \
    && docker-php-ext-install pdo pdo_mysql mbstring xml ctype fileinfo dom curl zip iconv \
    && apt-get clean

# Node 20 oficial
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY . .

RUN composer install --optimize-autoloader --no-dev --no-interaction
RUN npm install && npm run build

EXPOSE 8000