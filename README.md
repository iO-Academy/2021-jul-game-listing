# 2021-fightingMongooses-gameListing

This project utilises Docker. Visit the [Docker repo](https://hub.docker.com)
to download and install.

## Setting Up Autoloader:
1. Run the command `composer` in the terminal. If no version information
appears, visit [getcomposer.org](https://getcomposer.org/download/) and 
follow instructions to download and install composer. 
2. Run the `composer` command to check installation has been 
successful.
3. Run the command `composer dump-autoload` in the root project directory. If 
successful you will see the vendor folder appear.

## Setting Up the Database:
1. Make an SQL database called *games*.
2. Run the command `php getApiData.php` from the root project directory.
3. Open Sequel Pro and confirm the database has been populated.




