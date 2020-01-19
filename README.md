# disciplinary
1. At first run this command:
   composer update

2. create .env file and copy all text in .env.example paste .env file and also connect to database next run this command
   :php artisan key:generate

3. next migration run command:
   php artisan migrate

4. next seeding run command:
   php artisan db:seed

   here two table users and employees

   first user:user1@email.com password:password and user:user2@email.com password:password 

   employee table 2 data added employee code 1001,1002

5. Next Command:
    php artisan vendor:publish --provider="Tymon\JWTAuth\Providers\LaravelServiceProvider"
	
6. Next Command:
   php artisan jwt:secret

7. next command:
   php artisan serve