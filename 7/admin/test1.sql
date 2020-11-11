SELECT * FROM `categories` JOIN `products`;



SELECT * FROM `categories` JOIN `products` ON `categories`.`category_sid` = `categories`.`sid`;

SELECT `categories`.name, `products`.*  FROM `products` JOIN `categories` ON `products`.`category_sid`=`categories`.`sid`;


-- inner JOIN 對不到自動排除
SELECT c.name, p.*  FROM `products` p JOIN `categories` c ON p.`category_sid`=c.`sid`;

-- outer JOIN 左邊是主要有筆數都要出現
SELECT c.name, p.*  FROM `products` p LEFT JOIN `categories` c ON p.`category_sid`=c.`sid`;
SELECT c.name, p.*  FROM `categories` c LEFT JOIN `products` p ON p.`category_sid`=c.`sid`;


SELECT c.name  `cat-name`, p.*  FROM `categories` c LEFT JOIN `products` p ON p.`category_sid`=c.`sid`;

-- 所有林
SELECT * FROM `products` WHERE `author` LIKE '%林%';

-- 林要第一個字
SELECT * FROM `products` WHERE `author` LIKE '林%';

SELECT * FROM `products` WHERE `author` LIKE '%林%' AND `author` NOT LIKE '林%'

-- LIKE... OR
SELECT * FROM `products` WHERE `author` LIKE '%科技%' OR `bookname` LIKE '%科技%'


SELECT * FROM `products` WHERE sid IN (10,11,4,21);
--電腦隨機排
SELECT * FROM `products` WHERE sid IN (10,11,4,21) ORDER BY RAND();


SELECT COUNT(1) num FROM `products`;

--群組第一筆資列
SELECT * FROM `products` GROUP BY `category_sid` ;
--群組第一筆資列，同category_sid 後面有數量
SELECT * ,COUNT(1) num FROM `products` GROUP BY `category_sid` ;


SELECT c.name ,COUNT(1) num FROM `products` p 
    JOIN `categories` c 
    ON p.`category_sid`=c.`sid`
    GROUP BY p.`category_sid` ;







