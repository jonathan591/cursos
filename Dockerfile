FROM richarvey/nginx-php-fpm:1.7.2
FROM php:8.1-fpm
# Copiar los archivos de la aplicación al contenedor
COPY . /var/www/html

# Configuración de la imagen
ENV SKIP_COMPOSER 0
ENV WEBROOT /var/www/html/public
ENV PHP_ERRORS_STDERR 1
ENV RUN_SCRIPTS 1
ENV REAL_IP_HEADER 1

# Configuración de Laravel
ENV APP_ENV production
ENV APP_DEBUG false
ENV LOG_CHANNEL stderr

# Permitir que Composer se ejecute como root
ENV COMPOSER_ALLOW_SUPERUSER 1

# Copiar el script al contenedor
COPY scripts/00-laravel-deploy.sh /scripts/00-laravel-deploy.sh

# Asignar permisos de ejecución al script
RUN chmod +x /scripts/00-laravel-deploy.sh

# Comando de inicio del contenedor
CMD ["/bin/bash", "/scripts/00-laravel-deploy.sh"]



