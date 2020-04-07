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
 - Run **`make install`** in project root
 - It will say you need bunch of **`.env`** files
 - Find **`.env.example`** files and copy to `.env` at same path
 - Fill them with actual data and run **`docker-compose up --build`** again

## Usage / Commands
Since this template uses docker containers, all app related commands are called inside the container.
To remove all project i dont know for what reason:
```bash
sudo docker-compose down
sudo docker system prune -af
```

#### Fresh Installation
```bash
sudo make install
### or ###
sudo cp .env.example .env
sudo docker-compose down
sudo docker-compose build
sudo docker-compose up -d
sudo docker-compose exec service_php_fpm composer global require hirak/prestissimo
sudo docker-compose exec service_php_fpm composer install
sudo docker-compose exec service_php_fpm vendor/bin/phinx migrate
```

#### Restarting due to common code changes
```bash
sudo make restart
sudo make compose
### or ###
sudo docker-compose down
sudo docker-compose up -d
sudo docker-compose exec service_php_fpm composer global require hirak/prestissimo
sudo docker-compose exec service_php_fpm composer install
```

#### Migrations / Seeds
```bash
#creating migration
sudo docker-compose exec service_php_fpm vendor/bin/phinx create MyNewMigration

#applying migration
sudo docker-compose exec service_php_fpm vendor/bin/phinx migrate

#rolling back migration
sudo docker-compose exec service_php_fpm vendor/bin/phinx rollback 

#creating seed
sudo docker-compose exec service_php_fpm vendor/bin/phinx seed:create MyNewSeeder

#applying seed
sudo docker-compose exec service_php_fpm vendor/bin/phinx seed:run MyNewSeeder
```

#### Routes
This version uses collections as routing entities.
Example routes located at `App\Application::setRoutes()`.
