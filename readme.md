## Not completed yet . . .

## A simple Stack Overflow Q&A site

- Laravel5
- MySQL
- Database schema injected as Migrations in Laravel
- "Eloquent" used as ORM

## Site Type:
- Homepage:
    - Listing of the last 10 questions (including pagination), sorted according to the latest questions
    - Showing the title of the questions and the first words of the description of the question
    - Showing the question's tags (linked to tag-page)
- Question-page:
    - Showing the question
    - Showing all answers (including pagination)
    - Possibility to write an answer
    - A questions has n-tags
- Filtering of „tags“:
    - Showing all questions of a tag (scope of function analog homepage)
- Creating a question:
    - Creating a question with title and description



## Server Requirements
PHP >= 5.4

Mcrypt PHP Extension

OpenSSL PHP Extension

Mbstring PHP Extension

Tokenizer PHP Extension

## Database and local Environment settings:
there is a file in main directory ".env.example", make a copy of it and rename it as ".env", this file contain enviroment and db connections settings:
```bash
DB_HOST=localhost
DB_DATABASE=your db name
DB_USERNAME=root
DB_PASSWORD=your db password
```

## Setting up tables in your database:
after setting up database connection settings in ".env" just run in your shell:
```bash
php artisan migrate
```
## Deleting tables in your database:
just run in your shell:
```bash
php artisan migrate:reset
```

## Not showing debug errors
If on local you are un-able to see debug errors then make your storage folder as:
```bash
sudo chmod -R 775 storage
```
### OR
```bash
sudo chmod -R 777 storage
```
## Usefull links:
[Laravel 5.0 Documentation](https://laravel.com/docs/5.0/installation)

[Eloquent ORM](https://laravel.com/docs/5.0/eloquent)

[Validation Rules](https://laravel.com/docs/5.0/validation)

[Form Validation JavaScript](http://www.formvalidator.net/)

## Developer:
[Linkedin](https://www.linkedin.com/in/jnawaz)

[Xing](https://www.xing.com/profile/Jawad_Nawaz3)