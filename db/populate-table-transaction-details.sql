INSERT INTO `transaction_details`(`transaction_id`, `product_id`, `quantity`, `product_price`) 
VALUES ('1','1','10','0.99');
INSERT INTO `transaction_details`(`transaction_id`, `product_id`, `quantity`, `product_price`) 
VALUES ('1','2','20','1.99');
INSERT INTO `transaction_details`(`transaction_id`, `product_id`, `quantity`, `product_price`) 
VALUES ('1','3','30','5.99');
INSERT INTO `transaction_details`(`transaction_id`, `product_id`, `quantity`, `product_price`) 
VALUES ('2','1','40','2.99');
INSERT INTO `transaction_details`(`transaction_id`, `product_id`, `quantity`, `product_price`) 
VALUES ('2','2','50','3.99');
INSERT INTO `transaction_details`(`transaction_id`, `product_id`, `quantity`, `product_price`) 
VALUES ('2','3','60','4.99');


-- louis' ver

INSERT INTO `transaction_details`(`quantity`, `product_price`, `transaction_id`, `product_id`) VALUES (100, 32123, (SELECT transaction_id FROM transactions WHERE transaction_id = 2), (SELECT product_id FROM products WHERE product_id = 1));
INSERT INTO `transaction_details`(`quantity`, `product_price`, `transaction_id`, `product_id`) VALUES (100, 32123, (SELECT transaction_id FROM transactions WHERE transaction_id = 3), (SELECT product_id FROM products WHERE product_id = 2));
INSERT INTO `transaction_details`(`quantity`, `product_price`, `transaction_id`, `product_id`) VALUES (100, 32123, (SELECT transaction_id FROM transactions WHERE transaction_id = 4), (SELECT product_id FROM products WHERE product_id = 3));
INSERT INTO `transaction_details`(`quantity`, `product_price`, `transaction_id`, `product_id`) VALUES (100, 32123, (SELECT transaction_id FROM transactions WHERE transaction_id = 5), (SELECT product_id FROM products WHERE product_id = 3));
INSERT INTO `transaction_details`(`quantity`, `product_price`, `transaction_id`, `product_id`) VALUES (100, 32123, (SELECT transaction_id FROM transactions WHERE transaction_id = 6), (SELECT product_id FROM products WHERE product_id = 3));