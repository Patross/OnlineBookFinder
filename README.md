# OnlineBookFinder

Prerequisites:

Create a database called "OnlineBookFinder"  (without the quotes!)    - localhost/phpmyadmin - type that in your browser window
Make sure your repo is cloned to: ??????/xampp\htdocs\xampp

in the onlinebookfinder database:

click on it, click on sql(located at the top)
then paste and run the following code:

CREATE TABLE users(
    id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    firstname varchar(256) NOT NULL,
    lastname varchar(256) NOT NULL,
    username varchar(256) NOT NULL,
    email varchar(256) NOT NULL,
    password varchar(256) NOT NULL
    );