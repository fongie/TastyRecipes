-- To be run on new webserver for website Tasty Recipes to setup mysql database
CREATE USER IF NOT EXISTS 'tasty_user' IDENTIFIED BY 'tasty';

CREATE DATABASE IF NOT EXISTS tasty_recipes;
USE tasty_recipes;

CREATE TABLE IF NOT EXISTS user_accounts (
    user_id INTEGER AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT NOW()
);

GRANT ALL PRIVILEGES ON tasty_recipes . * TO 'tasty_user';
FLUSH PRIVILEGES;

INSERT INTO user_accounts(username, password) VALUES ('sampleUser', 'pass');
