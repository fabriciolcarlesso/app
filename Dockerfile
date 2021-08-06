FROM php:7.4-fpm

WORKDIR /var/www

RUN apt-get update && \
    apt-get install libzip-dev -y && \
    docker-php-ext-install zip

RUN curl -sS https://getcomposer.org/installer | \
    php -- --install-dir=/usr/bin/ --filename=composer

#COPY . /var/www
#RUN composer install --no-scripts --no-autoloader && \
#    composer update

RUN curl -fsSL https://deb.nodesource.com/setup_14.x | bash - && \
    apt-get install -y nodejs
    
#RUN npm install && \
#    npm run dev
#ENTRYPOINT [ "php","artisan","serve" ]
#CMD [ "--host=0.0.0.0" ]