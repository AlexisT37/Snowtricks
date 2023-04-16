# start.ps1

docker-compose up -d

$containerId = docker-compose ps -q php

docker exec $containerId php bin/console doctrine:schema:update --force
docker exec $containerId php bin/console doctrine:fixtures:load --no-interaction
