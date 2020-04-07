# Phalcon Micro Basic Boilerplate

## Requirements
 - NGINX 1.17+
 - PHP 7.4+ with Phalcon 4.0+
 - Composer 1.9+
 - MySQL 5.7+
 
## Installation
### Debian / Ubuntu / CentOs
 - Install **`gcc g++ make`**
 - Install [Docker](https://docs.docker.com/install/overview/)
 - Install [Docker-compose](https://docs.docker.com/compose/install/)
 - Install [Git](https://git-scm.com/book/en/v2/Getting-Started-Installing-Git)
 - Clone this project locally
 - Run **`make`** in project root
 - It will say you need bunch of **`.env`** files
 - Find **`.env.example`** files and copy to `.env` at same path
 - Fill them with actual data and run **`docker-compose up --build`** again

## Usage / Commands
Since this template uses docker containers, all app related commands are called inside the container.

#### Fresh Installation
```bash
make install
```
or
```bash
cp .env.example .env
docker-compose down
docker-compose build
docker-compose up -d
docker-compose exec service_php_fpm composer global require hirak/prestissimo
docker-compose exec service_php_fpm composer install
docker-compose exec service_php_fpm vendor/bin/phinx migrate
```

#### Restarting due to common code changes
```bash
make restart
make compose
```
or
```bash
docker-compose down
docker-compose up -d
docker-compose exec service_php_fpm composer global require hirak/prestissimo
docker-compose exec service_php_fpm composer install
```

#### Migrations / Seeds
```bash
#creating migration
docker-compose exec service_php_fpm vendor/bin/phinx create MyNewMigration

#applying migration
docker-compose exec service_php_fpm vendor/bin/phinx migrate

#rolling back migration
docker-compose exec service_php_fpm vendor/bin/phinx rollback 

#creating seed
docker-compose exec service_php_fpm vendor/bin/phinx seed:create MyNewSeeder

#applying seed
docker-compose exec service_php_fpm vendor/bin/phinx seed:run MyNewSeeder
```

#### Routes
This version uses collections as routing entities.
Example routes located at `App\Application::setRoutes()`.
