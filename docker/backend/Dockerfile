FROM php:8.2-fpm

# WORKDIR ../
# Install dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    libonig-dev \
    zip \
    libzip-dev \
    libpq-dev \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl

#RUN pecl install xdebug \
#    && docker-php-ext-enable xdebug

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install extensions
RUN docker-php-ext-install mbstring zip exif pcntl
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql
RUN docker-php-ext-install gd zip pdo pdo_pgsql pgsql

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer  && chmod +x /usr/local/bin/composer

COPY ./backend /var/www
WORKDIR /var/www
# Add user for laravel application
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

COPY --chown=www:www ../../backend /var/www

RUN chown -R www:www-data /var/www/storage
RUN chmod -R ug+w /var/www/storage
# Change current user to www
# USER www-data
RUN curl -sL https://deb.nodesource.com/setup_18.x | bash - && \
    apt-get install -y nodejs

RUN composer install  --prefer-source --no-interaction 
RUN php artisan key:generate --force \
    && php artisan migrate --seed \
    && npm install --force \
    && npm run dev &
# Expose port 9090 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]

