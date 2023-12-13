FROM 720749898583.dkr.ecr.ap-northeast-1.amazonaws.com/php:8.2.12-arm
USER root
WORKDIR /var/www/html

COPY ./service /var/www/html

# `web` ユーザーに対して必要な権限を設定
RUN chown -R web:web /var/www/html/storage /var/www/html/bootstrap/cache \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

USER web

RUN composer install --no-dev

ENTRYPOINT ["/usr/bin/supervisord", "-n","-c", "/etc/supervisord.conf"]

