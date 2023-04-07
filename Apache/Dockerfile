FROM httpd:2.4

RUN apt-get update
RUN apt-get install -y certbot python3-certbot-apache
RUN certbot --apache --email jmmunoza@eafit.edu.co -d reto3.telematica.tech -d telematica.tech --agree-tos --non-interactive


COPY apache.conf /usr/local/apache2/conf/
RUN echo "Include /usr/local/apache2/conf/apache.conf" >> /usr/local/apache2/conf/httpd.conf