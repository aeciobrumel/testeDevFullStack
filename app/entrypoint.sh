#!/bin/bash

set -e

echo "⏳ Aguardando o Node/Vite iniciar..."
sleep 6

echo "📦 Instalando dependências PHP..."
composer install --no-interaction --prefer-dist --no-progress

# Garante que o arquivo .env exista
if [ ! -f ".env" ]; then
    echo "⚙️ Arquivo .env não encontrado, criando a partir do .env.example..."
    cp .env.example .env
fi

# Garante que a chave da aplicação seja gerada
if ! grep -q "^APP_KEY=base64:" .env; then
    echo "🔑 Gerando APP_KEY..."
    php artisan key:generate
fi

# Garante que o banco SQLite exista
DB_PATH="/var/www/database/database.sqlite"

if [ ! -f "$DB_PATH" ]; then
    echo "🗃️ Criando o arquivo SQLite em $DB_PATH..."
    mkdir -p "$(dirname "$DB_PATH")"
    touch "$DB_PATH"
fi

echo "⚙️ Rodando comandos do Laravel..."
php artisan config:cache
php artisan storage:link || true


echo "🚀 Iniciando servidor Laravel na porta 8000..."
php artisan serve --host=0.0.0.0 --port=8000
