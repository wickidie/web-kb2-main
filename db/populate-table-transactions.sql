INSERT INTO `transactions`(`transaction_date`, `transaction_total`, `user_id`) VALUES (CURRENT_DATE(), 9123, (SELECT user_id from users WHERE user_id = 1));
INSERT INTO `transactions`(`transaction_date`, `transaction_total`, `user_id`) VALUES (CURRENT_DATE(), 9123, (SELECT user_id from users WHERE user_id = 2));
INSERT INTO `transactions`(`transaction_date`, `transaction_total`, `user_id`) VALUES (CURRENT_DATE(), 9123, (SELECT user_id from users WHERE user_id = 4));
INSERT INTO `transactions`(`transaction_date`, `transaction_total`, `user_id`) VALUES (CURRENT_DATE(), 9123, (SELECT user_id from users WHERE user_id = 6));
INSERT INTO `transactions`(`transaction_date`, `transaction_total`, `user_id`) VALUES (CURRENT_DATE(), 9123, (SELECT user_id from users WHERE user_id = 8));
INSERT INTO `transactions`(`transaction_date`, `transaction_total`, `user_id`) VALUES (CURRENT_DATE(), 9123, (SELECT user_id from users WHERE user_id = 10));