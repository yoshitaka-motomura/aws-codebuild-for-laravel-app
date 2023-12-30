FROM 720749898583.dkr.ecr.ap-northeast-1.amazonaws.com/node:20-alpine3.18 AS build

WORKDIR /app

COPY ./web/package*.json ./

RUN npm install

COPY ./web .

RUN npm run build

FROM 720749898583.dkr.ecr.ap-northeast-1.amazonaws.com/base-nginx:1.25.3-alpine

COPY ./service /var/www/html

COPY --from=build /app/dist /var/www/html/public

COPY ./config/nginx/app.conf /etc/nginx/conf.d/default.conf

EXPOSE 80

CMD ["nginx", "-g", "daemon off;"]