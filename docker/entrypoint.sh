#!/usr/bin/env bash

until php -r "new PDO('mysql:host=database;dbname=symfony_db', 'user', 'password');"; do
  sleep 1
done

composer install -n
composer require symfony/maker-bundle --dev
php bin/console make:migration --no-interaction
php bin/console doctrine:migrations:migrate --no-interaction

exec "$@"
