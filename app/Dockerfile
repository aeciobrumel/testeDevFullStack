FROM php:8.2-cli

WORKDIR /var/www

ENV COMPOSER_PROCESS_TIMEOUT=1200

# Instala dependências do sistema e do node
RUN apt-get update && apt-get install -y \
    unzip \
    curl \
    libzip-dev \
    zip \
    sqlite3 \
    libsqlite3-dev \
    git \
    && docker-php-ext-install pdo pdo_sqlite zip \
    && curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs

# Instala o Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copia os arquivos do projeto
COPY . /var/www

# Instala dependências PHP
RUN composer install --no-interaction --prefer-dist --no-progress

# Instala dependências JS e gera o build
RUN npm install && npm run build

# Garante permissões
RUN chown -R www-data:www-data /var/www \
    && chmod -R 775 /var/www/storage /var/www/bootstrap/cache
