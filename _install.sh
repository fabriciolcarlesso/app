cp application/.env.example application/.env
docker-compose up -d
docker-compose exec app composer install
docker-compose exec app composer update
docker-compose exec app php artisan key:generate
docker-compose exec app npm install
docker-compose exec app npm i bootstrap-icons
docker-compose exec app npm run dev
docker-compose exec app php artisan migrate