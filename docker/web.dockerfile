FROM nginx:1.19.1

ADD ./vhost.conf /etc/nginx/conf.d/default.conf
