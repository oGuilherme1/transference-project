FROM php:8.2-fpm

RUN apt-get update && apt-get install -y git zip libpng-dev libjpeg-dev libfreetype6-dev

RUN curl -sS https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer

RUN docker-php-ext-install pdo pdo_mysql pcntl

RUN pecl install redis && docker-php-ext-enable redis

RUN pecl install swoole && docker-php-ext-enable swoole

RUN echo 'alias pa="php artisan"' >> ~/.bashrc

WORKDIR /var/www/html

CMD ["php-fpm"]