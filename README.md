# php-sample-news
A small sample PHP code that retrieves some news from SQL. Easy to use as a sample app during learning cloud/docker solutions.

Never use in production, this a sample code only.

# How to use natively

 1. Create a MySQL database with a name: "test"
 2. Edit the config.php file: servername, username, password, database name.
 3. Import create.sql to MySQL
 4. Copy php/src folder to a web server folder (eg. /var/www/html) and run index.php

![index.php running in a Browser](intro.png)


# How to use with Docker-compose

 1. Open terminal in root folder of the project
 2. run "docker-compose build" to create the containers
 3. run "docker-compose up -d" to run the containers
 4. Open a browser with URL: "localhost" (If you get a Warning message, wait while MySQL starts.)
 5. Admin is available at "localhost/admin" - user: admin, password: admin

