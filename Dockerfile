FROM 720749898583.dkr.ecr.ap-northeast-1.amazonaws.com/base-php:8.2.14

WORKDIR /var/www/html

COPY ./service /var/www/html

RUN php artisan storage:link && \
    chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

ENTRYPOINT ["/usr/bin/supervisord", "-n","-c", "/etc/supervisord.conf"]

