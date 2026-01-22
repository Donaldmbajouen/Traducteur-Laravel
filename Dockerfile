FROM php:8.2-cli

# Installer dépendances système requises
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    zip \
    sqlite3 \
    libsqlite3-dev \
    libzip-dev \
    zlib1g-dev \
    && docker-php-ext-install pdo pdo_sqlite zip \
    && rm -rf /var/lib/apt/lists/*

# Installer Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# Copier le projet
COPY . .

# Permissions nécessaires à Laravel
RUN chmod -R 775 storage bootstrap/cache

# Installer les dépendances PHP
RUN composer install --no-dev --optimize-autoloader --no-interaction

EXPOSE 10000

# Commande de démarrage
CMD sh -c "\
touch /tmp/database.sqlite && \
php artisan key:generate --force || true && \
php artisan migrate --force || true && \
php -S 0.0.0.0:10000 -t public \
"
