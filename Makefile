du: memory
	docker-compose up -d

dup: memory
	docker-compose up

dd:
	docker-compose down

db: memory
	docker-compose up --build -d

de:
	docker exec -it magazin-php sh

ds:
	docker-compose stop

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
