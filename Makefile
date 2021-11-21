fixture-load-dev:
	php bin/console doctrine:fixtures:load --env=dev --purge-with-truncate
composer-install:
	composer install
create-database:
	php bin/console d:d:c
dsu-dump:
	php bin/console d:s:u --dump-sql
dsc-dump:
	php bin/console d:s:c --dump-sql
dsu-force:
	php bin/console d:s:u --force
dsc:
	php bin/console d:s:c
cache-clear:
	php bin/console cache:clear
install-dev-first: composer-install create-database dsc-dump dsc cache-clear fixture-load-dev
install-dev-second: composer-install dsu-dump dsu-force cache-clear

#utilisation : make [command] --keep-going --ignore-errors
#example [command] = install-dev-first