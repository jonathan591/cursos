FROM richarvey/nginx-php-fpm:1.7.2

# Copiar los archivos de la aplicación al contenedor
COPY . .

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

# Instalar las dependencias de Composer
RUN composer install --no-dev --optimize-autoloader

# Comando de inicio del contenedor
CMD ["/start.sh"]