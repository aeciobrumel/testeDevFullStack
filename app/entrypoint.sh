#!/bin/bash

set -e

echo "Aguardando o Node/Vite iniciar..."
sleep 6

echo "Instalando dependências PHP..."
composer install --no-interaction --prefer-dist --no-progress

# Garante que o banco SQLite exista
DB_PATH="/var/www/database/database.sqlite"

if [ ! -f "$DB_PATH" ]; then
    echo "Criando o arquivo SQLite..."
    mkdir -p /var/www/database
    touch "$DB_PATH"
    echo "Arquivo SQLite criado em $DB_PATH"
fi

echo "Rodando comandos do Laravel..."
php artisan config:cache
php artisan storage:link || true

echo "Rodando migrations e seeders com --force..."
php artisan migrate:fresh --seed --force


echo "Iniciando servidor Laravel..."
php artisan serve --host=0.0.0.0 --port=8000
