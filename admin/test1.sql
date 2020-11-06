SELECT * FROM `categories` JOIN `products`;

SELECT * FROM `categories` JOIN `products` ON `categories`.`category_sid` = `categories`.`sid`;

SELECT `categories`.name, `products`.*  FROM `products` JOIN `categories` ON `products`.`category_sid`=`categories`.`sid`;