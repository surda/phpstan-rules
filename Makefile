.PHONY: check
check: tests phpstan

.PHONY: tests
tests:
	php vendor/bin/phpunit tests

.PHONY: phpstan
phpstan:
	php vendor/bin/phpstan analyse -l 8 -c phpstan.neon src tests
