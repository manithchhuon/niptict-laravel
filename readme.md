# Sample laravel

This project aims to create a sample backend and frontend of laravel project for niptict student. 
It contains :
* CRUD Category
* CRUD Product
* Auth
* Role and Permission

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development.

### Prerequisites

Read laravel doc : [Laravel](https://laravel.com/docs/5.5)

### Installing

After preparing your environment and clonning:
Rename file .env.example to .env then change the configuration

Composer install
```
composer install
```
Migrate the database

```
php artisan migrate
```
Seed
```
php artisan db:seed --class=UsersTableSeeder
```

## Login

* Super admin 
    * Username:  admin@niptict.com
    * PWD: 111111
* Norma User
    * Username: user@niptict.com
    * PWD: 111111
    
## Testing URL
* <http://127.0.0.1:8000/role/create>
* <http://127.0.0.1:8000/product/create>
* <http://127.0.0.1:8000/category/create>

## Authors

* **Manith CS** - *[NIPTICT Staff](http://niptict.edu.kh)*

## License

This project is licensed under the MIT License
