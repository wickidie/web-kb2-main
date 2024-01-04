-- Remove the whole table
DROP TABLE admin;
DROP TABLE users;
DROP TABLE products;
DROP TABLE transactions;
DROP TABLE transaction_details;
DROP TABLE product_category;
DROP TABLE cart;

-- Only remove the data & reset auto_increment
TRUNCATE TABLE users;
TRUNCATE TABLE products;
TRUNCATE TABLE transactions;
TRUNCATE TABLE transaction_details;
TRUNCATE TABLE product_category;
