#Подключение переменных:
include .env

#Переменные
docker_app		= ${DOCKER_PREFIX}_app
docker_php		= ${DOCKER_PREFIX}_php
docker_nginx	= ${DOCKER_PREFIX}_nginx
docker_mysql	= ${DOCKER_PREFIX}_mysql

#Команды Docker:
up: #Команда запуска контейнеров
	@docker compose up -d
down: #Команада остановки и удаление контейнеров
	@docker compose down
down_vol: #Команада остановки, удаления контейнеров с удалением Volumes
	@docker compose down -v
ps: #Команда показывающая работающие контейнеры
	@docker ps
start: #Команада поднятия проекта (Начать создавать контейнера)
	@docker compose start
stop: #Команада остановки без удаления контейнеров
	@docker compose stop
build: #Команада пересборки проекта (рестарт)
	@docker compose build

#Команды подключения к контейнеру:
connect_php: #Команда подключения к контейнеру PHP
	@docker exec -it $(docker_php) bash
connect_nginx: #Команда подключения к контейнеру Nginx
	@docker exec -it $(docker_nginx) bash
connect_mysql: #Команда подключения к контейнеру MySQL
	@docker exec -it $(docker_mysql) bash
connect_app: #Команда подключения к контейнеру с приложением
	@docker exec -it $(docker_app) bash
connect_src: #Команда подключения к контейнеру с приложением и переходу в папку src
	@docker exec -it -w /var/www/src $(docker_app) bash

#Команды для Laravel:
laravel_install: #Команда установки Laravel
	@docker exec -it -w /var/www/src $(docker_app) composer create-project laravel/laravel .
key_generate: #Генерация ключа
	@docker exec -it -w /var/www/src $(docker_app) php artisan key:generate
migrate: #Команда запуска миграций
	@docker exec -it -w /var/www/src $(docker_app) php artisan migrate

#Команды для Node.js
npm_install: #Команда установки зависимостей Node.js
	@docker exec -it -w /var/www/src $(docker_app) npm install

npm_ui: #Команда установки bootstrap ui
	@docker exec -it -w /var/www/src $(docker_app) composer require laravel/ui
	@docker exec -it -w /var/www/src $(docker_app) php artisan ui bootstrap --auth
	@docker exec -it -w /var/www/src $(docker_app) npm install resolve-url-loader@^5.0.0 --save-dev --legacy-peer-deps
