FROM php:8.2-cli

# Instalar dependências
RUN apt-get update && apt-get install -y \
    zip unzip git curl sqlite3 libsqlite3-dev libzip-dev \
    && docker-php-ext-install pdo pdo_sqlite

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copiar os arquivos da aplicação Laravel
COPY ./html /var/www/html

# Instalar dependências do Laravel
RUN composer install

# Definir permissões corretas
RUN chown -R www-data:www-data /var/www/html && chmod -R 755 /var/www/html

# Expor porta 8000 para o Laravel
EXPOSE 8000
