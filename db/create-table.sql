CREATE TABLE admin (
    admin_id int PRIMARY KEY,
    username VARCHAR(255),
    password CHAR(32)
);

CREATE TABLE users (
    user_id int PRIMARY KEY,
    username VARCHAR(255),
    password CHAR(32),
    email VARCHAR(255),
    first_name VARCHAR(255),
    last_name VARCHAR(255),
    address VARCHAR(255),
    phone_number VARCHAR(255),
    purchase int
);

CREATE TABLE product_category (
    category_id int PRIMARY KEY,
    category_name VARCHAR(255)
);

CREATE TABLE products (
    product_id int PRIMARY KEY,
    product_name VARCHAR(255),
    product_description VARCHAR(1024),
    product_price DECIMAL(16, 2),
    product_img VARCHAR(255),
    category_id int,
    sold int,
    FOREIGN KEY (category_id) REFERENCES product_category(category_id) 
        ON UPDATE CASCADE 
        ON DELETE SET NULL
);

CREATE TABLE transactions ( 
    transaction_id int PRIMARY KEY,
    transaction_date DATETIME,
    transaction_total DECIMAL(16, 2),
    status VARCHAR(255),
    payment VARCHAR(255),
    user_id int,
    FOREIGN KEY (user_id) REFERENCES users(user_id) 
        ON UPDATE CASCADE 
        ON DELETE SET NULL
);

CREATE TABLE transaction_details (
    transaction_detail_id int PRIMARY KEY,
    quantity int,
    product_price DECIMAL(16, 2),
    transaction_id int,
    product_id int,
    FOREIGN KEY (transaction_id) REFERENCES transactions(transaction_id)
        ON UPDATE CASCADE
        ON DELETE SET NULL,
    FOREIGN KEY (product_id) REFERENCES products(product_id) 
        ON UPDATE CASCADE
        ON DELETE SET NULL
);

CREATE TABLE cart (
    cart_id int PRIMARY KEY,
    created_at DATETIME,
    user_id int,
    quantity int,
    product_id int,
    FOREIGN KEY (user_id) REFERENCES users(user_id) 
        ON UPDATE CASCADE 
        ON DELETE SET NULL,
    FOREIGN KEY (product_id) REFERENCES products(product_id) 
        ON UPDATE CASCADE
        ON DELETE SET NULL
);

ALTER TABLE admin
    MODIFY admin_id int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE users
    MODIFY user_id int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE products
    MODIFY product_id int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE transactions
    MODIFY transaction_id int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE transaction_details
    MODIFY transaction_detail_id int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE cart
    MODIFY cart_id int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
    
ALTER TABLE product_category
    MODIFY category_id int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;
