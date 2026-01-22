FROM php:8.2-cli

# Installer extensions nécessaires
RUN apt-get update && apt-get install -y \
    git unzip libzip-dev \
    && docker-php-ext-install pdo pdo_sqlite zip

# Installer Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# Copier le projet
COPY . .

# Installer dépendances
RUN composer install --no-dev --optimize-autoloader

EXPOSE 10000

CMD sh -c "touch /tmp/database.sqlite && \
php artisan migrate --force && \
php -S 0.0.0.0:10000 -t public"
