# Installation & Setup

```
composer install
cp .env.example .env
php artisan key:generate
php artisan sail:install
./vendor/bin/sail up
./vendor/bin/sail artisan migrate
./vendor/bin/sail artisan queue:work
```


# Testing

URL: /api/submit

Method: POST

Params: name, email, message
