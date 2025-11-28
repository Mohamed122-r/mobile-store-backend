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

# تثبيت dependencies بدون scripts
RUN composer install --no-dev --optimize-autoloader --no-scripts

# لا تشغل package:discover - تخطي المشكلة

EXPOSE 8000

CMD ["sh", "-c", "php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=8000"]
