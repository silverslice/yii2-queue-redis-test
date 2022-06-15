init: build composer-install

build:
	docker-compose pull
	docker-compose build --pull

up:
	docker-compose up --scale queue=$(queue)

clean:
	docker-compose run --rm php rm -rf runtime/*
	docker-compose down

composer-install:
	docker-compose run --rm php composer install

send:
	docker-compose exec php ./yii test/send $(count)
