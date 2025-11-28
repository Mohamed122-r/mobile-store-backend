FROM php:8.2-alpine

WORKDIR /app

# تثبيت system dependencies
RUN apk add --no-cache \
    git \
    unzip \
    curl \
    libzip-dev \
    oniguruma-dev \
    postgresql-dev

# تثبيت PHP extensions
RUN docker-php-ext-install \
    pdo_mysql \
    pdo_pgsql \
    zip \
    mbstring

# تثبيت Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# نسخ جميع ملفات المشروع
COPY . .

# التحقق من الملفات الأساسية
RUN echo "=== Checking Laravel Files ===" && \
    ls -la artisan && \
    ls -la bootstrap/app.php && \
    ls -la app/Console/Kernel.php && \
    ls -la app/Models/User.php

# تثبيت dependencies
RUN composer install --no-dev --optimize-autoloader --no-scripts

# تشغيل artisan commands
RUN php artisan package:discover --no-ansi

# إنشاء application key
RUN php artisan key:generate --force

EXPOSE 8000

CMD ["sh", "-c", "php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=8000"]
