Prerequisites:
1. PHP (5.6 or >)
2. MySQL
3. Apache Server
4. Laravel (5.2 or >)
5. Composer

Installation
1. Clone the project
2. Run composer install
3. Create a database named "platform" or any other of your choice.
4. Run php artisan migrate
5. Run the following commands for sample data:
	php artisan db:seed --class=UsersTableSeeder
	php artisan db:seed --class=CategoriesTableSeeder
	php artisan db:seed --class=EventsTableSeeder
	php artisan db:seed --class=Articles1TableSeeder
	php artisan db:seed --class=Articles2TableSeeder
	php artisan db:seed --class=Articles3TableSeeder
	php artisan db:seed --class=Articles4TableSeeder
	php artisan db:seed --class=CommentsTableSeeder

   Note: Do not simply run php artisan db:seed, instead seed each table seperatly
6. Run php artisan serve
7. Now open localhost:8000 in your browser

Note: You also need to copy ".env.example" to ".env" if ".env" doesn't exist. Also setup your database name(as in point 3 above), username and password.