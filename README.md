##Setup / Installation

1. Download and install [git](https://git-scm.com/)

2. Clone project

```bash
    > git clone https://github.com/ereyomi/libraryApi
```

3. cd project-name

4. Install Dependencies

```bash
    > npm install (optional)
    > composer require
```
5. Copy the .env.example file and rename it into the .env file (For this you can run the following command)

```bash
	> copy .env.example .env
```
6. Run the following command to generate a new key

```bash
	> php artisan key:generate
```
7. Migrate DataBase

```bash
	> php artisan migrate
	> php artisan db:seed (start up with dummy data)
	> php artisan migrate:fresh --seed (this is the combination of the above commands)
```
8. Run project

```bash
    > php artisan serve 
```
9. if you run into any problem concerning connecting to database, run the following commands

```bash
	> php artisan config:cache
	> php artisan config:clear
	> restart server: php artisan server
```
10. Set the right permissions on all directories and files in your project by simply running (Optional)

```bash
	> chmod 755 -R nameofyourproject/
	> chmod -R o+w nameofyourproject/storage
```

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
