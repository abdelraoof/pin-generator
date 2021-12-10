## pin-generator

A 4-digit PINs generator with Laravel

## How to run

- Install dependencies
```
$ composer install
```

- Configure the application DB_* env vars
```
$ cp .env.example .env
$ nano .env
```

- Run the database migrations
```
$ php artisan migrate
```

- Seed the database with records
```
$ php artisan db:seed
```

- Run PHP server
```
$ php artisan serve
```

- The app will be live at http://127.0.0.1:8000


## API Endpoints

Method | URI | Parameters  | Example | Function 
--- | --- | --- | --- | ---
GET | /api/pins | count: *integer* | `{ "count": 5 }` | Get a list of 5 valid random PINs.
