template links:
https://themewagon.com/themes/free-bootstrap-4-html5-responsive-ecommerce-website-template-ogani/
https://themewagon.github.io/ogani/

------------------------------------------------------------------------------------------------------------------------

you can start by creating database called the same as the project
-> projekat_pwa <-

then you can create .env file and copy everything from .env.example and change
DB_DATABASE=projekat_pwa

------------------------------------------------------------------------------------------------------------------------

then you can run commands:

composer install
npm install

php artisan serve
npm run dev

php artisan migrate -> create tables
php artisan db:seed -> create data
php artisan serve -> run server

------------------------------------------------------------------------------------------------------------------------

If you want to use admin features you can login as an admin with these credentials:

vukadinlazarevic@gmail.com -> email
sifrasifra -> password

Or if you want to login as regular user your can either register by yourself
or you can use these credentials:

peraperic@gmail.com -> email
sifrasifra -> password
