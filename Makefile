install:
	@cp .env.example .env
	@docker-compose down
	@docker-compose build
	@docker-compose up -d
	@docker-compose exec service_php_fpm composer global require hirak/prestissimo
	@docker-compose exec service_php_fpm composer install
	@docker-compose exec service_php_fpm vendor/bin/phinx migrate
	@docker-compose exec service_php_fpm vendor/bin/phinx seed:run

uninstall:
	@docker-compose down
	@docker system prune -af

restart:
	@docker-compose down
	@docker-compose up -d.

compose:
	@docker-compose exec service_php_fpm composer global require hirak/prestissimo
	@docker-compose exec service_php_fpm composer install
