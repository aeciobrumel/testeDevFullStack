#!/bin/bash

echo "Aguardando o Node/Vite iniciar..."
sleep 5

composer install --no-interaction --prefer-dist

php artisan config:cache
php artisan storage:link || true

php artisan migrate:fresh --seed

php artisan serve --host=0.0.0.0 --port=8000
