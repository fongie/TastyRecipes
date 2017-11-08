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

CREATE TABLE IF NOT EXISTS recipes (
    name VARCHAR(255) PRIMARY KEY
    );

CREATE TABLE IF NOT EXISTS comments (
    comment_id INTEGER AUTO_INCREMENT PRIMARY KEY,
    user_id INTEGER,
    recipe_name VARCHAR(255),
    comment VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT NOW(),

    FOREIGN KEY (user_id) REFERENCES user_accounts(user_id),
    FOREIGN KEY (recipe_name) REFERENCES recipes(name)
    );

GRANT ALL PRIVILEGES ON tasty_recipes . * TO 'tasty_user';
FLUSH PRIVILEGES;

-- Ignore makes mysql treat error as warning (if duplicate for example)
INSERT IGNORE INTO user_accounts(username, password) 
VALUES 
    ('sampleUser', 'pass'),
    ('Max', 'pass');

INSERT IGNORE INTO recipes(name) VALUES ('meatballs'), ('pancakes');

INSERT IGNORE INTO comments(user_id, recipe_name, comment)
VALUES
    (1, 'meatballs', 'Nice looking meatballs'),
    (1, 'pancakes', 'Yummy pancakes'),
    (2, 'meatballs', 'Best meatballs'),
    (2, 'pancakes', 'good recipe for pancakes')
    ;
