FROM php:8.2-cli

RUN apt-get update && apt-get install -y \
    git unzip zip curl \
    sqlite3 libsqlite3-dev \
    libzip-dev zlib1g-dev \
    libpng-dev libjpeg-dev libfreetype6-dev \
    libonig-dev libicu-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install \
        pdo pdo_sqlite zip intl mbstring gd fileinfo \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www
COPY . .

RUN chmod -R 775 storage bootstrap/cache

# 👇 ICI LE MODE DIAGNOSTIC
RUN composer install -vvv --no-dev --no-interaction

EXPOSE 10000
CMD ["php", "-S", "0.0.0.0:10000", "-t", "public"]
