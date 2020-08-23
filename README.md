# What has been done so far

### Install Laravel
```composer create project --prefer-dist laravel/laravel sanctum-api```

### Install Sanctum
```composer require laravel/sanctum```

### Authentication scaffolding
```composer require laravel/ui```
```php artisan ui bootstrap --auth```

### app/Providers/AppServiceProvider.php
```
public function register()
{
    Sanctum::ignoreMigrations();
}
```

### app/Http/Kernel.php
```
use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;
'api' => [
    EnsureFrontendRequestsAreStateful::class,
    'throttle:60,1',
    \Illuminate\Routing\Middleware\SubstituteBindings::class,
],
```

### .env file
```
SESSION_DRIVER=cookie
SESSION_DOMAIN=localhost
SANCTUM_STATEFUL_DOMAINS=localhost:3000 # Here lives our frontend
```

### config/cors.php
```
return [
    'paths' => ['api/*', 'sanctum/csrf-cookie', 'login', 'logout'],

    'allowed_methods' => ['*'],

    'allowed_origins' => ['*'],

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => true,

];
```

### database/seeds/UserSeeder.php
```
public function run()
{
    DB::table('users')->insert([
        'name' => 'John Doe',
        'email' => 'john@doe.com',
        'password' => Hash::make('secret'),
    ]);
}
```

### database/seeds/DatabaseSeeder.php
```
public function run()
{
    $this->call(UserSeeder::class);
}
```

### routes/api.php
```
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});
```

<hr>

# Instructions

### Install composer
```composer install```

### Create .env file 
```cp .env.example .env```

### Run migrations
```
docker exec -it laravel-sanctum-demo-app bash
php artisan migrate
php artisan db:seed
```

### Connect to database
* host: 127.0.0.1
* user: root
* password: secrete
* port: 33061

### Start application:
```docker-compose up```

### Run artisan commands
```docker exec -it laravel-sanctum-demo-app bash```

### Visit the application
http://localhost
