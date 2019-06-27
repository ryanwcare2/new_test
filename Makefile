OS := $(shell uname)

build:
	sudo docker-compose build php
down:

ifeq ($(OS),Darwin)
	docker-sync-stack clean
else
	docker-compose down --remove-orphans
endif

up:
ifeq ($(OS),Darwin)
	docker-sync-stack start
else
	docker-compose up -d
	docker-compose logs -f
endif
clear:
	sudo rm -rf .docker/*/logs/*
	sudo rm -rf .docker/*/data/*
	sudo rm -rf var/*
	sudo rm -rf vendor/

restart:
	sudo make down
	sudo make up

reset:
	sudo make down && sudo make clear && sudo make build && sudo make up
