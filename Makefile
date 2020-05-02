du: memory
	docker-compose up -d

dd:
	docker-compose down

db: memory
	docker-compose up --build -d

de:
	docker exec -it magazin-php sh

a-i:
	docker-compose exec node yarn install

a-rebuild:
	docker-compose exec node npm rebuild node-sass --force

a-dev:
	docker-compose exec node yarn run dev

a-watch:
	docker-compose exec node yarn run watch

memory:
	sudo sysctl -w vm.max_map_count=262144

queue:
	docker-compose exec php-cli php artisan queue:work

horizon:
	docker-compose exec php-cli php artisan horizon

horizon-pause:
	docker-compose exec php-cli php artisan horizon:pause

horizon-continue:
	docker-compose exec php-cli php artisan horizon:continue

horizon-terminate:
	docker-compose exec php-cli php artisan horizon:terminate

memory:
	sudo sysctl -w vm.max_map_count=262144

perm:
	sudo chgrp -R www-data storage bootstrap/cache
	sudo chmod -R ug+rwx storage bootstrap/cache
