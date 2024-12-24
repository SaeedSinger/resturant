-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2020 at 05:30 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `fk_food_id` int(11) NOT NULL,
  `fk_customer_id` int(11) NOT NULL,
  `status` enum('Added to cart','Confirmed') CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `fk_food_id`, `fk_customer_id`, `status`) VALUES
(5, 10, 7, 'Added to cart'),
(10, 13, 7, 'Added to cart'),
(13, 12, 7, 'Added to cart');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `Cat_ID` int(11) NOT NULL,
  `Cat_Name` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`Cat_ID`, `Cat_Name`) VALUES
(1, 'Burger'),
(2, 'Pizza'),
(3, 'Chicken'),
(4, 'Salad'),
(5, 'Desserts');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(30) CHARACTER SET utf8 NOT NULL,
  `email` varchar(30) CHARACTER SET utf8 NOT NULL,
  `phone` int(11) NOT NULL,
  `address` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Date` date NOT NULL,
  `adminID` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `phone`, `address`, `password`, `Date`, `adminID`) VALUES
(1, 'Noor', 'noor@gmail.com', 1234567867, 'Giza', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '2020-11-18', 1),
(2, 'customer1', 'customer1@gmail.com', 1566666342, 'Cairo', '601f1889667efaebb33b8c12572835da3f027f78', '2020-11-18', 0),
(3, 'customer2', 'customer2@gmail.com', 123455555, 'Maadi', '601f1889667efaebb33b8c12572835da3f027f78', '2020-11-18', 0),
(4, 'customer3', 'customer3@gmail.com', 1566666342, 'Cairo', '601f1889667efaebb33b8c12572835da3f027f78', '2020-11-18', 0),
(5, 'customer4', 'customer4@gmail.com', 1166666342, 'Rehab', '601f1889667efaebb33b8c12572835da3f027f78', '2020-11-18', 0),
(7, 'customer5', 'customer5@gmail.com', 123455555, 'October', '601f1889667efaebb33b8c12572835da3f027f78', '2020-11-29', 0),
(8, 'customer6', 'customer6@gmail.com', 1234567896, 'Cairo', '601f1889667efaebb33b8c12572835da3f027f78', '2020-11-29', 0),
(9, 'customer7', 'customer7@gmail.com', 1188993322, 'Benha', '601f1889667efaebb33b8c12572835da3f027f78', '2020-11-29', 0),
(10, 'Admin', 'admin@gmail.com', 1234567891, 'Cairo', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '2020-12-21', 1),
(12, 'Admin2', 'admin2@gmail.com', 123456788, 'Alex', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '2020-12-21', 1);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `food_id` int(11) NOT NULL,
  `food_img` varchar(255) CHARACTER SET utf8 NOT NULL,
  `food_name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 NOT NULL,
  `cost` float NOT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`food_id`, `food_img`, `food_name`, `description`, `cost`, `cat_id`) VALUES
(1, 'mexican burger.png', 'Mexican Burger', 'This Mexican-style burger is pumped up with flavor from chili powder, cilantro, and jalapeno pepper. Served on buns topped with lettuce.', 13.5, 1),
(2, 'double burger.png', 'Double Burger', 'Two signature flame-grilled beef patties topped with a simple layer of melted American cheese and crinkle cut pickles with juicy tomatoes.', 12, 1),
(3, 'chicken burger.png', 'Chicken Burger', 'Our Chicken Burger features a savory grilled chicken burger patty topped with juicy tomatoes, fresh lettuce, and mayonnaise.', 10, 1),
(4, 'classic burger.png', 'Classic Burger', 'Chicken beef cooked over charcoal and onions on the grill, hot pepper, lettuce, tomatoes, double American cheddar cheese sauce and it\'s delicious.', 14.5, 1),
(5, 'california burger.png', 'California Burger', 'Alfalfa sprouts crown these juicy burgers. A combination of regular ground turkey and ground turkey breast offers superior texture.', 18, 1),
(10, 'mini burger.png', 'Mini Burger', 'Mini burgers, known by many as sliders, are the hottest little food trend sweeping the nation, with the half size of a classic burger.', 11, 1),
(11, 'pepperoni.png', 'Pepperoni', 'An American favorite of all times! Experience the taste of original Pepperoni cooked and delivered hot by the team of QuickFood.', 10, 2),
(12, 'hawaiian.png', 'Hawaiian', 'Fresh pineapple, applewood smoked ham and slivered scallions make this pizza #1 among our youngest visitors.', 12, 2),
(13, 'classic cheese.png', 'Classic Cheese', 'Large round pizza from QuickFood topped with Mozzarella and Muenster cheeses, hot out of the oven and ready all time.', 14, 2),
(14, 'sicilian.png', 'Sicilian', 'Rustic meets refined in this flavorful pizza with spicy marinara, Italian sausage, spicy Capicola ham, salami, and Mozzarella.', 11.5, 2),
(15, 'margherita.png', 'Margherita', 'The classic that everyone loves. Try our Margherita with Italian tomatoes, fresh Mozzarella, fresh basil and Parmesan delicious.', 12.5, 2),
(16, 'neapolitan.png', 'Neapolitan', 'One of our most popular dishes, this pizza includes fresh tomatoes, cheese, oil, and garlic and is served with numerous toppings.', 25, 2),
(17, 'Webp.net-resizeimage (8).png', 'Honey Chicken', 'It is crispy pieces of chicken breast that are fried to golden brown perfection, then tossed in a sweet and savory honey.', 20, 3),
(18, 'Webp.net-resizeimage (6).png', 'Wings Chicken', 'Our wings are un-breaded chicken wings, fried then tossed in your choice of sauce, served with celery and blue cheese.', 12, 3),
(19, 'Webp.net-resizeimage (5).png', 'Nuggets Chicken', 'Nuggets Chicken prepared to perfection. This is the crispy fried chicken with a ketchup sauce, available every day.', 18, 3),
(20, 'Webp.net-resizeimage (2).png', 'Grilled Chicken', 'Grilled chicken is very Spicy and delicious food, it\'s the preferable dish .', 12, 3),
(21, 'Webp.net-resizeimage (3).png', 'Shish Tawook', 'Shish Tawook is a very popular skewered chicken dish in the Middle East.', 14, 3),
(22, 'Webp.net-resizeimage (4).png', 'Crispy Chicken', 'Crispy Chicken is a crispy tempura battered chicken dish tossed .', 19, 3),
(23, 'buffalo bleu.png', 'Buffalo Bleu', 'Chopped romaine & iceberg blend, all-natural chicken, original buffalo new york spicy sauce, grape tomatoes, and banana peppers.', 10.5, 4),
(24, 'greek salad.png', 'Greek Salad', 'Cucumbers, grape tomatoes, red onions, banana peppers, black olives, and feta cheese with balsamic vinaigrette dressing.', 9.5, 4),
(25, 'mediterranean.png', 'Mediterranean', 'Spring mix, all-natural chicken, quinoa, black olives, marinated tomatoes, sunflower seeds, feta cheese, and balsamic vinaigrette.', 15.5, 4),
(26, 'turkey salad.png', 'Turkey Salad', 'Chopped romaine & iceberg blend, radiatorre pasta, roasted turkey, crispy bacon, tomatoes, and buttermilk ranch.', 11, 4),
(27, 'farmhouse salad.png', 'Farmhouse salad', 'Baby kale, spring mix, roasted turkey, roasted butternut squash, roasted brussels sprouts, glazed pecans, and goat cheese.', 20, 4),
(28, 'chicken caprese.png', 'Chicken Caprese', 'chicken caprese made with tender and juicy chicken, tomatoes, and mozzarella tossed in a deliciously tangy vinaigrette.', 9, 4);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `cust_name` varchar(30) CHARACTER SET utf8 NOT NULL,
  `cust_email` varchar(30) CHARACTER SET utf8 NOT NULL,
  `message` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`msg_id`, `cust_name`, `cust_email`, `message`) VALUES
(1, 'customer1', 'customer1@gmail.com', 'The chicken was more salty,i hope it be better in the next time.'),
(2, 'customer2', 'customer2@gmail.com', 'The chicken was more salty,but the salad is very delicious.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(11) NOT NULL,
  `f_cart_id` int(11) NOT NULL,
  `customer_email` varchar(100) CHARACTER SET utf8 NOT NULL,
  `food_name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `cost` float NOT NULL,
  `address` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status_admin` enum('Pending','In Process','Delivered') CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `f_cart_id`, `customer_email`, `food_name`, `cost`, `address`, `Date`, `status_admin`) VALUES
(5, 11, 'customer1@gmail.com', 'California Burger', 18, 'Cairo', '2020-12-25 16:22:43', 'In Process'),
(6, 12, 'customer1@gmail.com', 'Mini Burger', 11, 'Cairo', '2020-12-25 16:22:43', 'Pending'),
(7, 14, 'customer2@gmail.com', 'Nuggets Chicken', 18, 'Maadi', '2020-12-25 16:25:46', 'Delivered'),
(8, 15, 'customer2@gmail.com', 'Buffalo Bleu', 10.5, 'Maadi', '2020-12-25 16:25:46', 'Delivered');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `food_1` (`fk_food_id`),
  ADD KEY `customer_1` (`fk_customer_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`Cat_ID`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`food_id`),
  ADD KEY `cat_1` (`cat_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `Cat_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `food_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `customer_1` FOREIGN KEY (`fk_customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `food_1` FOREIGN KEY (`fk_food_id`) REFERENCES `menu` (`food_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `cat_1` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`Cat_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
