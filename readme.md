# As Adventure Contest
- A fictional contest where you can win a voucher of €500.
- Screencast: https://youtu.be/fzh8OcldeaI

### Deploy
- Create a .env file based on the .env.example
- Upload all the files to the server (NOT! the /vendor folder)
- Upload the .htaccess file, it will hide the /public from the url
- Run "composer install"
- Run "php artisan migrate"
- Run "php artisan db:seed"
- Make sure the Laravel Scheduler is running.
- "crontab -e" and add this: * * * * * php /path/to/artisan schedule:run 1>> /dev/null 2>&amp;1
- To allow the Github particpate function to work go to services.php and add your data
- Finished!

[Assignment](https://github.com/alessandroaussems/DevelopmentExamen/blob/master/opdracht.md)

