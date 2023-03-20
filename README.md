# Laravel listings app with REST API with Sanctum

This is an example of laravel jobs listing app alongside with REST API with Laravel Sanctum authentication system


##Installation

Clone the repository from GitHub:
```
git clone https://github.com/aleksandarTcode/larajobs
```

Install dependencies using Composer:

```
composer install
```



## Usage

Copy the .env.example file to .env and update the necessary configuration options

For MySQL, create database and insert your credentials in .env file:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your database
DB_USERNAME=your username
DB_PASSWORD=your password
```

Run the database migrations and seed data:
```
php artisan migrate --seed
```

Run the webserver on port 8000:
```
php artisan serve
```

## API Usage


### This API provides the following endpoints:

```
# Public

GET   /api/listings
GET   /api/listings/:id
GET   /api/listings/search/:name


POST   /api/login
@body: email, password

POST   /api/register
@body: name, email, password, password_confirmation


# Protected
# In protected routes Bearer Token created after login must be used to authenticate user

POST   /api/listings
@body: name, slug, description, price

PUT   /api/listings/:id
@body: ?name, ?slug, ?description, ?price

DELETE  /api/listings/:id

POST    /api/logout
```
