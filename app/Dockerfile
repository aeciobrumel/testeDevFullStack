FROM php:8.2-cli

WORKDIR /var/www

# Aumenta o tempo limite do Composer para evitar falhas em conexões lentas
ENV COMPOSER_PROCESS_TIMEOUT=1200

# Instala dependências do sistema
RUN apt-get update && apt-get install -y \
    unzip \
    curl \
    libzip-dev \
    zip \
    sqlite3 \
    libsqlite3-dev \
    && docker-php-ext-install pdo pdo_sqlite zip

# Instala o Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copia os arquivos do projeto
COPY . /var/www

# Instala dependências do Laravel (sem scripts, com prefer-dist e timeout maior)
RUN composer install --no-interaction --no-scripts --prefer-dist --no-progress

# Garante permissões corretas
RUN chown -R www-data:www-data /var/www \
    && chmod -R 775 /var/www/storage /var/www/bootstrap/cache
