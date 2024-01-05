INSERT INTO products (product_name, product_description, product_price, product_img, product_category) VALUES
('prod01', 'prod01Desc', 15.5, 'prod01.jpg', 'prod01Cat');
INSERT INTO products (product_name, product_description, product_price, product_img, product_category) VALUES
('prod02', 'prod02Desc', 15.5, 'prod02.jpg', 'prod01Cat');
INSERT INTO products (product_name, product_description, product_price, product_img, product_category) VALUES
('prod03', 'prod03Desc', 15.5, 'prod03.jpg', 'prod02Cat');
INSERT INTO products (product_name, product_description, product_price, product_img, product_category) VALUES
('prod04', 'prod04Desc', 15.5, 'prod04.jpg', 'prod02Cat');

-- Newest with category_id, add category first before adding product

INSERT INTO `product_category`(`category_name`) VALUES ('Other');
INSERT INTO `product_category`(`category_name`) VALUES ('Food');
INSERT INTO `product_category`(`category_name`) VALUES ('Drink');

INSERT INTO products (product_name, product_description, product_price, product_img, category_id, sold) VALUES
('prod01', 'prod01Desc', 15000, 'prod01.jpg', 1, 0);
INSERT INTO products (product_name, product_description, product_price, product_img, category_id, sold) VALUES
('prod02', 'prod02Desc', 100000, 'prod02.jpg', 1, 0);
INSERT INTO products (product_name, product_description, product_price, product_img, category_id, sold) VALUES
('prod03', 'prod03Desc', 150000, 'prod03.jpg', 2, 0);
INSERT INTO products (product_name, product_description, product_price, product_img, category_id, sold) VALUES
('prod04', 'prod04Desc', 1500, 'prod04.jpg', 3, 0);