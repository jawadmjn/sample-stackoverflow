## Server Requirements
PHP >= 5.4 <br/>
Mcrypt PHP Extension<br/>
OpenSSL PHP Extension<br/>
Mbstring PHP Extension<br/>
Tokenizer PHP Extension<br/>

## Database and local Environment settings:
there is a file in main directory ".env.example", make a copy of it and rename it as ".env", this file contain enviroment and db connections settings:

DB_HOST=localhost<br/>
DB_DATABASE=your db name<br/>
DB_USERNAME=root<br/>
DB_PASSWORD=your db password<br/>

## Setting up tables in your database:
after setting up database connection settings in ".env" just run in your shell:
### php artisan migrate

## Not showing debug errors
If on local you are un-able to see debug errors then make your storage folder as:
### sudo chmod -R 775 storage