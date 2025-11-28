FROM php:8.2-alpine

WORKDIR /app

# تثبيت system dependencies
RUN apk add --no-cache \
    git \
    unzip \
    curl \
    libzip-dev \
    oniguruma-dev

# تثبيت PHP extensions
RUN docker-php-ext-install \
    pdo_mysql \
    zip \
    mbstring

# تثبيت Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# نسخ جميع ملفات المشروع
COPY . .

# التحقق من الملفات الأساسية
RUN echo "=== Checking Essential Files ===" && \
    find app/ -name "*.php" | head -10 && \
    ls -la app/Console/Kernel.php && \
    ls -la app/Http/Kernel.php && \
    ls -la app/Exceptions/Handler.php

# تثبيت dependencies
RUN composer install --no-dev --optimize-autoloader --no-scripts

# تشغيل artisan commands
RUN php artisan package:discover --no-ansi

EXPOSE 8000

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
