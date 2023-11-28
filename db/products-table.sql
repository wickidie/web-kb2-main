CREATE TABLE users (
    user_id int,
    username VARCHAR(255),
    password CHAR(32),
    email VARCHAR(255),
    first_name VARCHAR(255),
    last_name VARCHAR(255),
    address VARCHAR(255),
    phone_number VARCHAR(255)
);

INSERT INTO users (user_id, username, password, email, first_name, last_name, address, phone_number) VALUES
(1, 'admin', md5('admin'), 'admin@gmail.com', 'adminFname', 'adminLname', 'adminAddress', '08123456789');

CREATE TABLE products (
    product_id int,
    product_name VARCHAR(255),
    product_description VARCHAR(255),
    product_price DECIMAL(10, 2),
    product_img VARCHAR(255),
    product_category VARCHAR(255)
);

INSERT INTO products (product_id, product_name, product_description, product_price, product_img, product_category) VALUES
(1, 'prod01', 'prod01Desc', 15.5, 'img_avatar1.png', 'prod01Cat');

CREATE TABLE transactions (
    transaction_id int,
    user_id int,
    transaction_date DATE,
    transaction_total DECIMAL(10, 2)
);

CREATE TABLE transaction_details (
    transaction_detail_id int,
    transaction_id int,
    product_id int,
    quantity int,
    product_price DECIMAL(10, 2)
);

ALTER TABLE users
    ADD PRIMARY KEY (user_id);

ALTER TABLE products
    ADD PRIMARY KEY (product_id);

ALTER TABLE transactions
    ADD PRIMARY KEY (transaction_id);

ALTER TABLE transaction_details
    ADD PRIMARY KEY (transaction_detail_id);

ALTER TABLE users
    MODIFY user_id int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE products
    MODIFY product_id int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1001;

ALTER TABLE transactions
    MODIFY transaction_id int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10001;

ALTER TABLE transaction_details
    MODIFY transaction_detail_id int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10101;