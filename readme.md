## Server Requirements
PHP >= 5.4

Mcrypt PHP Extension

OpenSSL PHP Extension

Mbstring PHP Extension

Tokenizer PHP Extension


## Database and local Environment settings:
there is a file in main directory ".env.example", make a copy of it and rename it as ".env", this file contain enviroment and db connections settings:

DB_HOST=localhost

DB_DATABASE=your db name

DB_USERNAME=root

DB_PASSWORD=your db password


## Setting up tables in your database:
after setting up database connection settings in ".env" just run in your shell:
### php artisan migrate

## Deleting tables in your database:
just run in your shell:
### php artisan migrate:reset


## Not showing debug errors
If on local you are un-able to see debug errors then make your storage folder as:
### sudo chmod -R 775 storage