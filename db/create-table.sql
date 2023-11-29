CREATE TABLE users (
    user_id int PRIMARY KEY,
    username VARCHAR(255),
    password CHAR(32),
    email VARCHAR(255),
    first_name VARCHAR(255),
    last_name VARCHAR(255),
    address VARCHAR(255),
    phone_number VARCHAR(255)
);

CREATE TABLE products (
    product_id int PRIMARY KEY,
    product_name VARCHAR(255),
    product_description VARCHAR(255),
    product_price DECIMAL(10, 2),
    product_img VARCHAR(255),
    product_category VARCHAR(255)
);

CREATE TABLE transactions (
    transaction_id int PRIMARY KEY,
    user_id int,
    transaction_date DATE,
    transaction_total DECIMAL(10, 2)
);

CREATE TABLE transaction_details (
    transaction_detail_id int PRIMARY KEY,
    transaction_id int,
    product_id int,
    quantity int,
    product_price DECIMAL(10, 2)
);

ALTER TABLE users
    MODIFY user_id int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE products
    MODIFY product_id int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE transactions
    MODIFY transaction_id int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE transaction_details
    MODIFY transaction_detail_id int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;