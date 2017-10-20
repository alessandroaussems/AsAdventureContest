# As Adventure Contest
- A fictional contest where you can win a voucher of €500.
- Online version: 
### Deploy
- Create a .env file based on the .env.example
- Use the database template in this repository or run "php artisan migrate"
- Upload all the files to the server
- Upload the .htacces file, it will hide the /public from the url
- run "composer install"
- Make sure the Laravel Scheduler is running.
- "crontab -e" and add this: * * * * * php /path/to/artisan schedule:run 1>> /dev/null 2>&amp;1
- Finished!