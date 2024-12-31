FROM richarvey/nginx-php-fpm:1.7.2

# Actualizar paquetes y agregar repositorios de PHP específicos usando apk
RUN apk update && \
    apk add --no-cache \
        php8.1 \
        php8.1-fpm \
        php8.1-mbstring \
        php8.1-pdo \
        php8.1-mysql \
        php8.1-xml \
        php8.1-zip \
        php8.1-curl

# Configurar PHP para que utilice la nueva versión
RUN update-alternatives --set php /usr/bin/php8.1 && \
    update-alternatives --set php-fpm /usr/sbin/php-fpm8.1

# Copiar los archivos de la aplicación
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




