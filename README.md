# 📚 Library Challenge
This project was developed using:
  - Laravel v8
  - Vue.js v2.6.12
  - Vuetify v2.3.10

## 🔌 Installation

### Clone this repository
```sh
$ git clone git@github.com:emmanuelrglez/LibraryChallenge.git
```

### Install dependencies
```sh
$ composer install
$ npm install
```

### Set enviroment
Rename `/.env.example` file to `/.env`.

### Generate key
Run the next command to generate an APP KEY.
```sh
$ php artisan key:generate
```
## 💾 Database
Create new database and copy your connection variables into `/.env` file. Replace tags with your credentials.

```sh
DB_CONNECTION=mysql
DB_HOST=<your host>
DB_PORT=3306
DB_DATABASE=<your database name>
DB_USERNAME=<your user name>
DB_PASSWORD=<your password>
```
### Migrate
Run migration to create tables structure
```sh
$ php artisan migrate
```

### Seeders
Run the database seeders command to insert test data
```sh
$ php artisan db:seed
```

## 🚀 Run the project 
```sh
$ php artisan serve
```

###### Made by Emmanuel González