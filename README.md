# POT Web App


## Uses


## Development 

1. Install php dependencies

        composer install

2. Install JS dependencies

        npm install 

4. Start MySQL using docker

        docker run --name mydb -p 3306:3306 -e MYSQL_ALLOW_EMPTY_PASSWORD=yes -e MYSQL_DATABASE=pot_web -d mysql:5.7

3. Run db migration

        ./resetDatabase.sh 

4. Watch for Javascript & CSS changes

        npm run watch --poll

5. Start app

        php artisan serve



## Useful command 

Command | Description
------------ | -------------
`tail -f storage/logs/laravel.log` | Tail laravel log. Helpful for debugging and tracing
`php artisan make:livewire country.edit` | Create **Edit** component under country directory
`php artisan livewire:delete country.edit` | Delete **Edit** component under country directory
`APP_URL=http://127.0.0.1:8000` | Change this in .env file for showing profile pics in Jetstream
`sudo kill $(sudo lsof -t -i:8000)` | To kill a particular laravel development server


## Useful links:

- [Live wire](https://laravel-livewire.com/)
- [Laravel Jetstream](https://jetstream.laravel.com/1.x/installation.html)

## Greenbook local mysql connnection with docker

docker run --name gb-mysql -p 3306:3306 -e MYSQL_DATABASE=ctaqadb -e MYSQL_ROOT_PASSWORD=root -d mysql:5.7

