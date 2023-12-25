FROM 720749898583.dkr.ecr.ap-northeast-1.amazonaws.com/php:8.2.13

WORKDIR /var/www/html

COPY ./service /var/www/html

ENTRYPOINT ["/usr/bin/supervisord", "-n","-c", "/etc/supervisord.conf"]

