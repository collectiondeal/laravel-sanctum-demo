## Build steps
Install Composer dependencies: ```composer install```

Create .env file: ```cp .env.example .env```

Run Migrations: <br>
```
docker exec -it laravel-sanctum-demo-app bash
php artisan migrate
```

Connect to database:
* host: 127.0.0.1
* user: root
* password: secrete
* port: 33061

## Run Steps:
Run the application: ```docker-compose up```

Run artisan commands: ```docker exec -it laravel-sanctum-demo-app bash```

Visit the application: http://localhost
