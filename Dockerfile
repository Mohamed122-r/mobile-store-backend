FROM php:8.2-alpine

# استخدام WORKDIR الذي يستخدمه Railway
WORKDIR /workspace

# تثبيت system dependencies
RUN apk add --no-cache \
    git \
    unzip \
    curl \
    libzip-dev \
    libpng-dev \
    oniguruma-dev \
    postgresql-dev

# تثبيت PHP extensions
RUN docker-php-ext-install \
    pdo_mysql \
    pdo_pgsql \
    bcmath \
    zip \
    mbstring \
    gd

# تثبيت Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# نسخ جميع ملفات المشروع
COPY . .

# تثبيت dependencies بدون scripts
RUN composer install --no-dev --optimize-autoloader --no-scripts --ignore-platform-reqs

# تشغيل artisan commands بعد التأكد من WORKDIR
RUN php artisan package:discover --no-ansi

# إنشاء application key
RUN test -f .env || cp .env.example .env
RUN php artisan key:generate --force

# إعداد الصلاحيات
RUN chmod -R 775 storage bootstrap/cache

EXPOSE 8000

CMD ["sh", "-c", "php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=8000"]
