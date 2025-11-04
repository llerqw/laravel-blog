FROM php:8.2-apache

# Установка системных зависимостей
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libzip-dev

# Очистка кэша
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Установка расширений PHP
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Установка Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Включение mod_rewrite для Apache
RUN a2enmod rewrite

# Копирование существующего приложения
COPY . /var/www/html

# Установка прав доступа
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage \
    && chmod -R 755 /var/www/html/bootstrap/cache

WORKDIR /var/www/html

# Установка зависимостей Composer (если composer.json существует)
RUN if [ -f "composer.json" ]; then composer install --no-dev --optimize-autoloader; fi

EXPOSE 80
