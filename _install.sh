docker-compose up -d

docker-compose exec app composer install
docker-compose exec app composer update

cp application/.env.example application/.env

docker-compose exec app php artisan key:generate

docker-compose exec app npm install
docker-compose exec app npm run dev

docker-compose down