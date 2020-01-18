# disciplinary
1. create .env file and copy all text in .env.example paste .env file and also connect to database next run this command
   php artisan key:generate
   
2. At first run this command
   composer update
   
3. Next Command
    php artisan vendor:publish --provider="Tymon\JWTAuth\Providers\LaravelServiceProvider"
	
4. Next Command
   php artisan jwt:secret