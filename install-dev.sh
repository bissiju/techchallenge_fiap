#!/usr/bin/env bash
cp .env.example .env
cp src/Infrastructure/UI/Laravel/.env.example src/Infrastructure/UI/Laravel/.env
docker-compose up -d --build --force-recreate --renew-anon-volumes
docker exec -it techchallengefiap_app composer install
docker exec -it techchallengefiap_app mkdir src/Infrastructure/UI/Laravel/bootstrap/cache
docker exec -it techchallengefiap_app php artisan key:generate
docker exec -it techchallengefiap_server chown www-data src/Infrastructure/UI/Laravel/storage/ -R
docker exec -it techchallengefiap_server chown www-data src/Infrastructure/UI/Laravel/bootstrap/ -R
./migration.sh "migrations:migrate"
docker exec -it techchallengefiap_app php artisan jwt:secret --no-interaction
