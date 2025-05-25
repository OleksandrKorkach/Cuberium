# 1. Базовый образ с PHP-FPM 8.2
FROM php:8.2-fpm

# 2. Системные зависимости и расширения PHP
RUN apt-get update \
 && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
 && docker-php-ext-install \
    pdo_mysql \
    mbstring \
    exif \
    pcntl \
    bcmath \
    xml \
    zip \
 && pecl install xdebug \
 && docker-php-ext-enable xdebug \
 && rm -rf /var/lib/apt/lists/*

# 3. Установка Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 4. Рабочая директория
WORKDIR /var/www

# 5. Копирование кода
COPY . /var/www

# 6. Установка PHP-зависимостей и инициализация Laravel
RUN composer install --optimize-autoloader --no-dev \
 && cp .env.example .env \
 && php artisan key:generate

# 7. Права на storage и cache
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# 8. Запуск PHP-FPM
CMD ["php-fpm"]
