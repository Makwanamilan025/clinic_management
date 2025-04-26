//
composer i
pa migrate
pa db:seed
pa shield:super-admin
php artisan shield:generate --all