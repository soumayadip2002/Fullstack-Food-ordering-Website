-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2023 at 04:37 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `resturant`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `uid` int(10) NOT NULL,
  `did` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cid` int(10) UNSIGNED NOT NULL,
  `ctitle` varchar(50) NOT NULL,
  `cdescription` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cid`, `ctitle`, `cdescription`) VALUES
(4, 'Indian', 'Indian dishes are special due to their rich variety, aromatic spices, and diverse regional influences. The cuisine\'s bold flavors, vibrant colors, and unique cooking techniques create a captivating culinary experience that delights the senses and brings people together.'),
(5, 'Chinese', 'Chinese cuisine is celebrated for its incredible diversity, unique cooking techniques, and harmonious balance of flavors. From the fiery Sichuan dishes to the delicate Cantonese dim sum, Chinese food has something to offer for every palate.'),
(7, 'Non-Vegetarian Delights', 'Indulge in our savory and succulent Non-Vegetarian Delights that are sure to satisfy your cravings. From the tender and juicy Whole Roasted Chicken to the delectable and crispy Fish Cutlet, each dish is expertly prepared with the finest ingredients and flavorful spices. Experience a burst of flavors with our mouthwatering selection, perfect for meat enthusiasts seeking a delightful culinary experience.'),
(10, ' street food', 'Discover the authentic taste of the streets with our delightful Panipuri. Experience the perfect blend of tangy and spicy flavors in every bite. Satisfy your cravings for classic street food that never fails to impress.'),
(13, 'Western Cuisine', 'Snacks a convenient indulgence in a hurried world, tantalizes with its quick service, tempting flavors, and comforting familiarity.'),
(14, 'salad', 'Salad, a versatile and refreshing dish, features a mix of raw or cooked vegetables, fruits, greens, herbs, nuts, seeds, and dressings, providing a delightful burst of flavors, textures, and colors.'),
(15, 'desserts', 'From decadent cakes to creamy ice creams, desserts offer a delicious finale to any meal, making every occasion a little sweeter.'),
(16, 'soft drinks', 'Soft drinks, carbonated and refreshing, quench our thirst with their effervescent fizz and variety of flavors.');

-- --------------------------------------------------------

--
-- Table structure for table `dish`
--

CREATE TABLE `dish` (
  `did` int(11) UNSIGNED NOT NULL,
  `dname` varchar(50) NOT NULL,
  `drating` int(5) NOT NULL,
  `dprice` double NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `dcategory` int(11) UNSIGNED NOT NULL,
  `type` varchar(100) NOT NULL,
  `ingredients` varchar(255) NOT NULL,
  `is_featured` int(1) NOT NULL,
  `is_popular` int(1) NOT NULL,
  `dpicture` varchar(255) NOT NULL,
  `is_today` int(1) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dish`
--

INSERT INTO `dish` (`did`, `dname`, `drating`, `dprice`, `quantity`, `dcategory`, `type`, `ingredients`, `is_featured`, `is_popular`, `dpicture`, `is_today`, `description`) VALUES
(1, 'Tandori Roti', 0, 15, '1 pieces ', 4, 'Veg', 'Whole wheat flour, Salt, Oil or ghee (clarified butter), Water', 0, 0, 'pngwing.com (34).png', 1, 'Soft and freshly-baked tandoori roti brushed with a generous layer of melted butter.'),
(2, 'Fruits Salad', 0, 100, '1 bucket', 14, 'Veg', 'apples, bananas, strawberries, grapes, kiwi', 0, 0, 'pngwing.com (32).png', 1, 'Fruit Salad, crafted with a medley of vibrant, fresh fruits.'),
(3, 'Idli', 0, 10, '1 pieces ', 4, 'Veg', 'Idli batter (made from rice and urad dal)', 0, 0, 'pngwing.com (29).png', 1, 'Soft, fluffy, and steamed  South Indian authentic idli with sambar.'),
(4, 'Paneer Spicy noodles', 0, 150, '1 plate', 4, 'Veg', 'Paneer, Noodles,  bell peppers, carrots, cabbage, soy sauce, chili sauce, garlic, ginger, etc.', 1, 0, 'noodles2.0.png', 0, 'Paneer spicy noodles combine the rich creaminess of paneer with the fiery allure of spices, creating a delightful fusion of flavors.'),
(5, 'Whole Roasted Chicken', 0, 250, '1', 7, 'Non-Veg', 'Whole chicken, Olive oil, or melted butter, Salt and pepper Herbs, rosemary.', 1, 0, 'chicken.png', 0, 'Whole roasted chicken, golden and succulent, entices with its crispy skin and tender, flavorful meat.'),
(6, 'Margherita pizza,', 0, 450, '1 large size', 13, 'Veg', 'Pizza dough, Tomato sauce, Mozzarella cheese, Fresh basil leaves, Olive oil, Salt and pepper.', 1, 0, 'pizza3.0.png', 0, 'Margherita pizza, a timeless Italian classic, delights with the perfect harmony of sweet tomatoes, creamy mozzarella, fragrant basil, and a touch of olive oil on a thin, crispy crust'),
(7, 'Burger', 0, 99, '1 piece ', 13, 'Non-Veg', 'Burger buns, Ground beef or veggie patty, Lettuce, Tomato slices, Onion slices, Cheese,  ketchup, mustard, mayonnaise.', 0, 1, 'burger2.0.png', 0, 'Vegetable cheese, a delectable fusion of garden-fresh vegetables and creamy cheese, offers a delightful burst of flavors and textures in every bite.'),
(8, 'French Fries', 0, 100, '1 bucket', 13, 'Veg', 'Potatoes, Oil for frying, Salt', 0, 1, 'pngwing.com (27).png', 0, 'French fries, golden and crispy on the outside, fluffy on the inside, are a beloved and universally popular side dish that brings joy to every meal.'),
(9, 'Fish cutlet', 0, 50, '1 pieces', 7, 'Non-Veg', 'Fish fillets, Boiled and mashed potatoes, chili powder, turmeric, coriander,  Bread crumbs, or semolina for coating', 0, 1, 'cutlet.png', 0, 'Fish cutlet, a flavorful and crispy seafood delight, features a blend of minced fish, aromatic spices, and potatoes, skillfully shaped into patties and fried to perfection.'),
(14, 'Chicken Fry momos', 0, 10, '1 pieces', 4, 'Non-Veg', 'Momo wrappers (dough) chicken, cabbage, filling Ginger-garlic paste, Soya sauce, Spices, and seasonings.', 0, 1, 'momos.png', 0, 'Fried momos, a tantalizing street food specialty, are succulent dumplings filled with seasoned minced meat or vegetables, deep-fried to a crispy, golden perfection, and served with zesty dipping sauces.'),
(15, 'Panipuri', 0, 5, '1 pieces ', 10, 'Veg', 'Puris (hollow, crispy wheat or semolina shells), Tamarind chutney, Spiced water (pani), Potato and chickpea filling', 0, 0, 'pngwing.com (35).png', 1, 'Panipuri, a quintessential Indian street food, entices with its crispy puris filled with tangy tamarind water, spicy potato mixture, and a burst of flavorful chutneys.'),
(17, 'Caesar Salad', 0, 150, '1 bucket', 14, 'Veg', 'Romaine lettuce, Croutons, Grated Parmesan cheese, Caesar dressing (contains ingredients like anchovies, garlic, egg yolk, etc.)', 0, 1, 'pngwing.com (25).png', 0, 'Romaine lettuce, croutons, Parmesan cheese, and Caesar dressing.'),
(18, 'Tuna Salad ', 0, 200, '1 bucket', 14, 'Non-Veg', 'Canned tuna, Mayonnaise, Chopped celery, Chopped onions\r\nSalt and pepper', 0, 1, 'TUNA-SALAD.png', 0, 'Tuna mixed with mayonnaise, celery, and other vegetables.'),
(19, 'Vegetable Salad', 0, 100, '1 bucket', 14, 'Veg', 'Vegetable salad typically includes a mix of fresh, raw vegetables such as lettuce, cucumbers, tomatoes, bell peppers, carrots, and onions. It is often seasoned with olive oil, vinegar or lemon juice, and may also include herbs like parsley or basil for ad', 0, 1, 'salad.png', 0, 'Vegetable salad, a delightful medley of vibrant colors and textures, offers a refreshing burst of natural goodness with each bite. Packed with vitamins, fiber, and antioxidants, this nutritious delight not only tantalizes the taste buds but also promotes a healthier lifestyle.'),
(20, 'Fried Chicken', 0, 35, '1 pieces', 7, 'non-veg', 'Chicken (bone-in pieces), Flour, Eggs, Milk, or Buttermilk (optional)\r\nSeasonings (salt, pepper, paprika, garlic powder, onion powder, cayenne pepper, etc.), Oil or Fat (vegetable oil or lard), Breadcrumbs, Buttermilk Brine, Marinades (spices and liquids)', 0, 1, 'fried chicken.png', 0, 'Crispy and flavorful, fried chicken delights the senses with its golden-brown, crunchy coating and succulent, tender meat within.'),
(21, 'Donuts', 0, 40, '1 pieces ', 15, 'veg', 'All-purpose flour,Sugar, Yeast,Milk,Eggs,Butter,Salt,Vanilla extract\r\nOil (for frying)', 0, 1, 'donuts.png', 0, 'Fluffy and pillowy, donuts enchant taste buds with their sweet aroma, perfectly glazed or dusted with sugar, a delightful treat for any time of day.'),
(22, 'Chicken Roast', 0, 200, '1 kg', 7, 'non-veg', 'Whole chicken\r\nOlive oil or melted butter\r\nGarlic cloves\r\nFresh thyme\r\nFresh rosemary\r\nLemon\r\nSalt\r\nBlack pepper\r\nOnion (optional)\r\nPotatoes (optional)', 0, 0, 'roast.png', 0, 'Chicken Roast, featuring a whole chicken marinated in aromatic herbs, garlic, and zesty lemon, is beautifully roasted to perfection, resulting in tender and flavorful meat complemented by crispy, golden skin. '),
(23, 'Strawberry Cake', 0, 500, '1 pieces ', 15, 'Non-Veg', 'All-purpose flour\r\nGranulated sugar\r\nBaking powder\r\nSalt\r\nUnsalted butter\r\nEggs\r\nWhole milk\r\nVanilla extract\r\nFresh strawberries (pureed or chopped)', 0, 1, 'cakes.png', 0, 'Strawberry Cake, a delightful confection, is a symphony of flavors, with layers of moist, strawberry-infused cake topped with luscious strawberry frosting, offering a burst of fruity sweetness in every delectable bite, a true treat for any dessert lover\'s palate.'),
(24, 'Lassi', 0, 50, '1 glass', 16, 'veg', 'Yogurt\r\nWater\r\nSugar or other sweeteners\r\nIce cubes', 0, 0, 'lassi2.0.png', 0, 'Lassi, a refreshing yogurt-based drink, is a cool and creamy blend of yogurt, water, and optional sweeteners or flavors, creating a delightful beverage that quenches thirst and provides a soothing respite from the heat, enjoyed widely in the Indian subcontinent and beyond.'),
(25, 'Pepperoni Pizza', 0, 500, '1 large size', 13, 'Veg', 'Pizza dough\r\nPizza sauce\r\nMozzarella cheese (shredded)\r\nPepperoni slices\r\nOlive oil\r\nDried oregano (optional)\r\nRed pepper flakes (optional)', 0, 1, 'pizza2.0.png', 0, 'Pepperoni Pizza, a beloved classic, features a golden-brown crust topped with rich tomato sauce, a generous layer of melted mozzarella cheese, and perfectly spiced pepperoni slices that curl into crispy cups when baked, offering a flavorful and satisfying combination that never fails to delight pizza enthusiasts everywhere.'),
(26, 'veg Fusilli pasta', 0, 100, '1 plate', 4, 'veg', 'Fusilli pasta\r\nWater\r\nSalt\r\nOlive oil\r\nPasta sauce\r\nGrated Parmesan cheese\r\nFresh herb', 0, 0, 'pasta (1).png', 0, 'Spiraled and satisfying, Fusilli pasta brings a delightful twist to your plate, pairing perfectly with a variety of savory sauces for a comforting and flavorsome meal. Its corkscrew shape ensures every bite captures the essence of the sauce, creating a delectable experience for pasta enthusiasts of all ages.'),
(27, 'Fried Rice', 0, 200, '1 plate', 4, 'Veg', 'Cooked rice (preferably day-old rice for better texture),\r\nCooking oil (vegetable or sesame oil),\r\nChopped vegetables, Eggs\r\nSoy sauce,\r\nGarlic (minced),\r\nGinger (minced) - optional,\r\nGreen onions (scallions), chopped,\r\nProtein (shrimp, chicken, beef, or ', 0, 0, 'pngwing.com (28).png', 1, 'A delightful Asian-inspired dish, Fried Rice combines fluffy rice, colorful vegetables, and optional protein, stir-fried to perfection with savory soy sauce and aromatic garlic and ginger, creating a satisfying medley of flavors and textures that never fails to please taste buds with its comfort and versatility'),
(28, 'Roasted Whole Fish', 0, 200, '1 piece', 7, 'non-veg', 'Whole fish,\r\nLemon or lime slices,\r\nFresh herbs (e.g., thyme, rosemary, or dill),\r\nGarlic cloves (whole or minced),\r\nOlive oil,\r\nSalt and pepper,\r\n', 0, 0, 'fish roast2.0.webp', 1, 'A spectacular dish for seafood enthusiasts, Whole Fish Roast showcases the natural flavors of the fish, delicately seasoned with zesty citrus, fragrant herbs, and garlic, then roasted to perfection, resulting in tender and succulent meat encased in crispy skin, making every bite a delightful journey of taste and texture.'),
(29, 'Paneer Butter Masala', 0, 100, '1 bucket', 4, 'Veg', 'Paneer (Indian cottage cheese), cubed,\r\nTomatoes, pureed or finely chopped,\r\nOnion, finely chopped,\r\nGinger-garlic paste,\r\nButter or ghee (clarified butter),\r\nCashew nuts, soaked and ground to a paste (or use cream for a creamier version),\r\nFresh cream,\r\n', 0, 0, 'Paneer-Butter.png', 1, 'Paneer Butter Masala, a classic vegetarian delight, features soft paneer cubes cooked in a rich and creamy tomato-based gravy, infused with aromatic spices and a hint of sweetness, creating a luscious and flavorful dish that pairs perfectly with naan, roti, or rice, leaving taste buds craving for more with each heavenly bite.'),
(30, 'Spaghetti', 0, 200, '1 plate', 13, 'Veg', 'Spaghetti pasta,\r\nWater,\r\nSalt,\r\nOlive oil,\r\nPasta sauce,\r\nGrated Parmesan cheese,\r\nFresh basil or parsley for garnish,\r\nCrushed red pepper flakes (optional, for added spice)', 0, 0, 'spaghetti_PNG97.png', 1, 'A timeless Italian classic, Spaghetti is long, thin pasta strands, perfectly cooked to al dente, then tossed in a flavorful pasta sauce, topped with a sprinkle of Parmesan cheese and fresh herbs, delivering a simple yet satisfying culinary experience that has earned a place in the hearts and kitchens of pasta lovers worldwide.'),
(31, 'Pav Vaji', 0, 50, '1 plate', 10, 'Veg', 'Potatoes, boiled and mashed,\r\nMixed vegetables, finely chopped or mashed\r\nOnion, finely chopped,\r\nTomatoes, finely chopped or pureed,\r\nGinger-garlic paste,\r\nPav Bhaji masala (a blend of spices),\r\nRed chili powder,\r\nTurmeric powder,\r\nCumin seeds,\r\nButter o', 0, 0, 'pngwing.com (36).png', 1, 'Pav Vaji, a delightful medley of vegetables and spices, is a beloved Indian street food, where the flavorful bhaji, cooked with a blend of spices and butter, is served alongside buttered buns, creating a delectable combination that tantalizes taste buds and offers a satisfying meal enjoyed by people of all ages.'),
(32, 'Kathi Rolls', 0, 30, '1 piece', 10, 'veg', 'Parathas or rotis (Indian flatbreads),\r\nMarinated and grilled chicken, paneer (Indian cottage cheese), or vegetables,\r\nSliced onions,\r\nChopped tomatoes,\r\nSliced cucumbers,\r\nSliced bell peppers,\r\nFresh coriander leaves,\r\nYogurt-based sauce or mint chutney,', 0, 0, 'kathi rolls.png', 0, 'Kathi Rolls, a popular Indian street food, are scrumptious and flavorful rolls filled with grilled meat or paneer, fresh veggies, and tangy sauces, all wrapped in a soft paratha, making them a delightful handheld meal bursting with taste. These delectable rolls offer a perfect blend of textures and aromatic spices, satisfying taste buds with every bite.'),
(33, 'Chole Bhature', 0, 50, '1 plate', 10, 'veg', 'All-purpose flour (maida),\r\nSemolina (sooji),\r\nYogurt,\r\nBaking powder,\r\nBaking soda,\r\nSugar,\r\nSalt,\r\nOil,\r\nWater,', 0, 0, 'Chole Bhature_slide.png', 0, 'Chole Bhature, a classic North Indian delicacy, tantalizes taste buds with its spiced chickpea curry (chole) cooked to perfection with aromatic spices, served alongside fluffy, deep-fried bread (bhature) that\'s soft on the inside and crispy on the outside. '),
(34, 'orange juice', 0, 50, '1 glass', 16, 'veg', 'Fresh Oranges,\r\nWater (for dilution, if desired),\r\nSugar or sweetener (optional, for added sweetness)', 0, 0, 'orangejuice.png', 0, 'Orange Juice is a refreshing and nutritious beverage made from freshly squeezed oranges, providing a burst of vitamin C and natural citrus flavors. With its tangy yet sweet taste, this classic juice is a popular choice for breakfast or as a thirst-quenching treat any time of the day.'),
(35, ' Grapes Juice', 0, 60, '1 glass', 16, 'veg', 'Fresh Grapes (seeded or seedless, depending on preference),\r\nWater (for dilution, if desired),\r\nSugar or sweetener (optional, for added sweetness)', 0, 0, 'grapes.png', 0, 'Grape Juice, made from the succulent goodness of fresh grapes, offers a delightful balance of natural sweetness and tartness in every sip. Packed with antioxidants and vitamins, this luscious juice is a flavorful and healthy beverage choice for grape enthusiasts of all ages.'),
(36, ' milk shake', 0, 100, '1 cup', 15, 'veg', 'Milk,\r\nIce Cream,\r\nFlavorings,\r\nSweetener,\r\nWhipped cream,\r\nSprinkles, chocolate chips, or other garnishes', 0, 0, 'milkshake.png', 0, 'Milkshake is a creamy and indulgent beverage made by blending milk, velvety ice cream, and flavorful additions like chocolate, strawberries, or other delightful ingredients. With its rich and satisfying taste, milkshakes offer a delightful treat that\'s perfect for satisfying sweet cravings or enjoying a cooling delight on a warm day.'),
(37, 'Pineapple Juice', 0, 100, '1 glass', 16, 'veg', 'Fresh Pineapple (peeled, cored, and chopped),\r\nWater (for dilution, if desired),\r\nSugar or sweetener (optional, for added sweetness)', 0, 0, 'pineapple.png', 0, 'Pineapple Juice, crafted from the juiciness of ripe pineapples, delivers a tropical escape with its refreshing and tangy flavor. Packed with vitamins and tropical goodness, this vibrant juice offers a delightful taste of paradise in every sip, making it a delightful choice for a revitalizing and thirst-quenching experience.'),
(38, 'Mapo Tofu', 0, 200, '1 plate', 5, 'veg', 'Soft Tofu, cut into cubes,\r\nDoubanjiang (Fermented Broad Bean Paste),\r\nChili Oil,\r\nSichuan Peppercorns,\r\nGarlic, minced,\r\nGreen Onions, chopped,\r\nSoy Sauce,\r\nCornstarch (to thicken the sauce),\r\nSesame Oil (for drizzling),\r\nRed Chili Peppers (optional, for', 0, 0, 'Tofu.png', 0, 'Mapo Tofu, a fiery Sichuan specialty, features tender tofu nestled in a rich and spicy sauce boasting the unique combination of doubanjiang and Sichuan peppercorns, delivering a delightful numbing and tingling sensation');

-- --------------------------------------------------------

--
-- Table structure for table `favourite`
--

CREATE TABLE `favourite` (
  `fid` int(11) NOT NULL,
  `uid` int(10) NOT NULL,
  `did` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `favourite`
--

INSERT INTO `favourite` (`fid`, `uid`, `did`) VALUES
(1, 4, 14),
(2, 4, 1),
(7, 4, 7),
(9, 4, 19),
(11, 4, 4),
(12, 4, 9);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` int(100) NOT NULL,
  `payment_mode` varchar(100) NOT NULL,
  `pincode` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `user_id` int(100) NOT NULL,
  `order_id` int(100) NOT NULL,
  `food_id` int(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `price` int(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `rid` int(10) UNSIGNED NOT NULL,
  `rnumber` int(10) NOT NULL,
  `cname` varchar(100) NOT NULL,
  `cdescription` text NOT NULL,
  `pname` varchar(100) NOT NULL,
  `picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`rid`, `rnumber`, `cname`, `cdescription`, `pname`, `picture`) VALUES
(2, 4, 'anu guin', 'Vegetable Cheese is a delightful fusion of fresh vegetables and creamy cheese, offering a burst of harmonious flavors and textures. The dish impresses with its colorful presentation and satisfying mouthfeel, making it a versatile and enjoyable culinary experience. Highly recommended for cheese and vegetable enthusiasts alike.', 'Burger', 'avatar12.jpg'),
(3, 5, 'Soumayadip Saha', 'Paneer Spicy Noodles offer a delightful fusion of creamy paneer and fiery spices, creating a rich and flavorful experience. Each bite is an exciting culinary adventure that balances the creaminess of paneer with the enticing kick of spices. A must-try for anyone seeking a delectable and satisfying dish.', 'Paneer Spicy noodles', 'icon1.png\r\n'),
(4, 4, 'rajarshi samaddar', 'Margherita Pizza, a timeless Italian classic, delights with sweet tomatoes, creamy mozzarella, fragrant basil, and a touch of olive oil on a thin, crispy crust. A perfect harmony of flavors that captures the essence of traditional Italian cuisine. A true must-try for pizza enthusiasts worldwide.', 'Margherita pizza,', 'avatar13.jpg'),
(5, 5, 'Akash Saha', 'Whole Roasted Chicken, a culinary delight that tantalizes the senses! Its golden, crispy skin beckons with promises of succulence, while the tender, flavorful meat delivers a mouthwatering experience. A must-try for those seeking a perfect balance of texture and taste in every delightful bite.', 'Whole Roasted Chicken', 'avatar3.jpg'),
(6, 5, 'Akash Saha', 'The Cheesy Delight burger from Burger Chessy is a delicious treat with its juicy beef patty, gooey melted cheddar cheese, and fresh veggies. The combination of flavors and textures is delightful, making it a standout choice on their menu. Highly recommended for cheese lovers!', 'Burger', 'avatar3.jpg'),
(7, 5, 'soumili mondal', 'Cheesy Burger Delight - A mouthwatering experience with a perfectly cooked beef patty embraced in a generous layer of gooey melted cheese. A must-try for cheese lovers! ', 'Burger', 'avatar10.jpg'),
(8, 4, 'sounak sarkar', 'The Cheesy Burger Bliss - A symphony of flavors with a succulent beef patty, harmoniously paired with an abundant amount of melted cheese that cascades with every bite. A cheese lover\'s dream come true!', 'Burger', 'avatar2.jpg'),
(9, 5, 'anu guin', 'The French fries were perfectly crispy, offering a delightful and satisfying snack.', 'French Fries', 'avatar12.jpg'),
(10, 4, 'Soumayadip Saha', 'These fries were seasoned just right, making them utterly irresistible and bursting with flavor', 'French Fries', 'icon1.png\r\n'),
(11, 5, 'soumili mondal', 'With their familiar taste and comforting appeal, these French fries provided a satisfying and enjoyable experience.', 'French Fries', 'avatar10.jpg'),
(12, 5, 'Akash Saha', 'Bursting with savory goodness, these French fries boast an irresistible seasoning that elevates them to a whole new level of taste.', 'French Fries', 'avatar3.jpg'),
(13, 5, 'sounak sarkar', 'These fries are cooked to perfection, offering a melt-in-your-mouth experience that will leave you craving more.\r\n', 'French Fries', 'avatar2.jpg'),
(14, 5, 'rajarshi samaddar', 'With a satisfying crunch in every bite, these French fries deliver the perfect balance of texture and flavor.', 'French Fries', 'avatar13.jpg'),
(15, 5, 'rajarshi samaddar', 'The fish cutlets were a delectable blend of tender fish and aromatic spices, delivering a true delight for seafood lovers.', 'Fish cutlet', 'avatar13.jpg'),
(16, 5, 'rajarshi samaddar', 'These chicken momos were tender and flavorful, with a delectable filling that satisfied my taste buds.', 'Chicken Fry momos', 'avatar13.jpg'),
(17, 5, 'rajarshi samaddar', 'The butter tandoori roti was a heavenly treat, with a luscious layer of butter adding a luxurious touch to its warm and soft texture.', 'Tandori Roti', 'avatar13.jpg'),
(18, 4, 'rajarshi samaddar', 'The fruit salad was a colorful medley of fresh and ripe fruits, delivering a burst of vibrant flavors in every spoonful.', 'Fruits Salad', 'avatar13.jpg'),
(19, 5, 'anu guin', 'The idli was incredibly soft and fluffy, a delightful South Indian delicacy that melted in the mouth.', 'Idli', 'avatar12.jpg'),
(20, 4, 'rajarshi samaddar', 'Steamed to perfection, the idli offered a light and healthy option, perfect for a comforting breakfast.', 'Idli', 'avatar13.jpg'),
(21, 5, 'anu guin', 'The butter-infused tandoori roti melted with every bite, creating a delightful and comforting experience.', 'Tandori Roti', 'avatar12.jpg'),
(32, 4, 'anu guin', 'A refreshing medley of colors and flavors, the vegetable salad at this restaurant is a healthy delight! Fresh, crisp veggies tossed with a zesty dressing make it a guilt-free pleasure for health-conscious foodies.', 'Vegetable Salad', 'avatar12.jpg'),
(33, 5, 'anu guin', '\"Absolutely delightful panipuri! The burst of flavors in each crisp puri is heavenly. The tangy tamarind water and perfectly spiced potato filling make it a must-try snack for all street food lovers.', 'Panipuri', 'avatar12.jpg'),
(34, 4, 'anu guin', 'Absolutely loved the tuna salad! The tuna was perfectly seasoned, and the crunchy veggies added a delightful texture. A wholesome and tasty option for a quick lunch', 'Tuna Salad ', 'avatar12.jpg'),
(35, 5, 'anu guin', 'Caesar Salad never disappoints! The crisp romaine lettuce and perfectly seasoned croutons, topped with the creamy Caesar dressing, create a flavor explosion in every bite. A classic and comforting choice that\'s simply irresistible.', 'Caesar Salad', 'avatar12.jpg'),
(36, 5, 'rajarshi samaddar', 'Tuna salad was a delightful surprise! The flavors blended beautifully, and the tangy dressing complemented the tuna perfectly. A healthy and scrumptious choice for a light dinner.', 'Tuna Salad ', 'avatar13.jpg'),
(37, 4, 'anu guin', 'Deliciously spicy and packed with flavor, the Mapo Tofu here is an explosion of Sichuan goodness in every bite', 'Mapo Tofu', 'avatar12.jpg'),
(38, 5, 'anu guin', 'A true vegetarian delight! The Paneer Butter Masala had a perfect balance of spices and a velvety texture that made it an absolute treat for my taste buds.', 'Paneer Butter Masala', 'avatar12.jpg'),
(39, 4, 'anu guin', 'The fried rice was a delightful medley of flavors, boasting a perfect blend of vegetables, tender rice, and a hint of savory soy sauce.', 'Fried Rice', 'avatar12.jpg'),
(40, 4, 'Akash Saha', 'The Veg Fusilli Pasta was a delightful fusion of colors and flavors, with perfectly cooked fusilli spirals, crunchy vegetables, and a delectable tomato-based sauce that made it an instant favorite', 'veg Fusilli pasta', 'avatar3.jpg'),
(41, 5, 'Akash Saha', 'The fried chicken was a mouthwatering delight, boasting a crispy golden-brown exterior and tender, juicy meat inside - a true comfort food classic!', 'Fried Chicken', 'avatar3.jpg'),
(42, 4, 'Akash Saha', 'The Chicken Roast was a succulent masterpiece, perfectly roasted to golden perfection, with tender and juicy meat infused with a tantalizing blend of herbs and spices.', 'Chicken Roast', 'avatar3.jpg'),
(43, 4, 'Prodipta Saha', 'The roasted whole fish was a culinary delight, expertly prepared with a crispy and flavorful skin that revealed tender and moist flesh inside - a true seafood lover\'s dream!', 'Roasted Whole Fish', 'pic-1.png'),
(44, 5, 'Prodipta Saha', 'Chole Bhature - a flavor-packed delight! The spiced chickpeas were perfectly cooked, and the fluffy bhature served hot, creating a mouthwatering combination that left us satisfied and wanting seconds.', 'Chole Bhature', 'pic-1.png'),
(45, 4, 'Prodipta Saha', 'A classic Italian delight, the Spaghetti was cooked to al dente perfection and complemented with a savory marinara sauce that left us savoring each delightful twirl.', 'Spaghetti', 'pic-1.png'),
(46, 5, 'Prodipta Saha', 'Kathi rolls - a delicious handheld treat! The warm and flaky paratha wrapped around flavorful grilled fillings made each bite a burst of delightful Indian flavors.', 'Kathi Rolls', 'pic-1.png'),
(47, 4, 'Prodipta Saha', 'A yogurt-based bliss! The Lassi had a velvety smooth texture and a delightful tanginess, providing a delightful balance of flavors that kept us coming back for more.', 'Lassi', 'pic-1.png'),
(48, 5, 'rajarshi samaddar', 'Pav Bhaji - a flavor-packed street food favorite! The mashed vegetable curry, richly spiced and served with buttery pav buns, was an absolute explosion of taste and texture.', 'Pav Vaji', 'avatar13.jpg'),
(49, 4, 'rajarshi samaddar', 'Pepperoni Pizza - a timeless classic! The thin, crispy crust topped with gooey cheese and flavorful pepperoni slices created a mouthwatering combination that never disappoints.', 'Pepperoni Pizza', 'avatar13.jpg'),
(50, 5, 'rajarshi samaddar', 'A refreshing burst of citrus goodness! The orange juice was freshly squeezed, delivering a vibrant and tangy flavor that instantly rejuvenated our senses.', 'orange juice', 'avatar13.jpg'),
(51, 5, 'Anika oberoi', 'Strawberry cake - a delightful sweet indulgence! The moist and fluffy cake layers, paired with luscious strawberry filling and creamy frosting, made each bite a heavenly experience.', 'Strawberry Cake', 'avatar5.jpg'),
(52, 4, 'Anika oberoi', 'Pineapple juice - a tropical treat! The sweet and refreshing taste of freshly squeezed pineapple was like a sip of paradise, transporting us to a sunny beach getaway.', 'Pineapple Juice', 'avatar5.jpg'),
(53, 5, 'Anika oberoi', 'Simple yet satisfying, the fried rice had a light and fluffy texture that complemented the fresh vegetables, making it a comforting and wholesome dish.', 'Fried Rice', 'avatar5.jpg'),
(54, 4, 'Anika oberoi', 'A flavorful treat! The fried chicken had the perfect balance of herbs and spices, creating a delectable and satisfying crunch with every bite', 'Fried Chicken', 'avatar5.jpg'),
(55, 4, 'Anika oberoi', 'A vegetarian classic that never disappoints! The Chole Bhature had a rich and tangy gravy with tender chickpeas, and the bhature were light and fluffy, making it an absolute must-try.', 'Chole Bhature', 'avatar5.jpg'),
(56, 5, 'Soumayadip Saha', 'Donuts - a delightful indulgence! The fluffy and pillowy texture, paired with a variety of luscious glazes and toppings, made each donut a scrumptious treat to savor.', 'Donuts', 'icon1.png\r\n'),
(57, 4, 'Soumayadip Saha', 'Milkshakes - a creamy delight! The velvety texture and rich flavors, whether classic chocolate or fruity, offered a delectable and refreshing experience that satisfied our sweet cravings', ' milk shake', 'icon1.png\r\n'),
(58, 3, 'Soumayadip Saha', ' a burst of natural sweetness! The freshly pressed grape juice offered a delightful and refreshing taste of ripe grapes, making it a perfect choice for a healthy and enjoyable drink.', ' Grapes Juice', 'icon1.png\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(10) UNSIGNED NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `is_admin` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `fname`, `lname`, `uname`, `email`, `password`, `avatar`, `is_admin`) VALUES
(2, 'Soumayadip', 'Saha', 'soumya2002', 'soumya@gmail.com', '$2y$10$K75DpR9c3gRdJnhCxsI/1uDLkQO.w1tDCNI7BAs0T10Xirvipzb.S', 'icon1.png\r\n', 1),
(4, 'anu', 'guin', 'anu2002', 'anu@gmail.com', '$2y$10$FH766TsjdDSK2n6m1FUioOXopQPu4ikKHp1I9KmhqjLWDLmCi2Udu', 'avatar12.jpg', 1),
(6, 'rajarshi', 'samaddar', 'raj1234', 'raj@gmail.com', '$2y$10$5YKfiKLdxVDKdAwQejS/j.C8k06mWdTb4cUX1JtWf3DYzVxH20BEu', 'avatar13.jpg', 1),
(7, 'Akash', 'Saha', 'akash2004', 'akash@gmail.com', '$2y$10$VsP7sCgkDi3dlLXShSrr8eTSSDo1s7KmpnsH45hIIP2on.taX/kJm', 'avatar3.jpg', 0),
(8, 'soumili', 'mondal', 'soumili2001', 'soumili@gmail.com', '$2y$10$bgKyEkGkJEH0VfpTk5/iIOrixVxdwYLY8vX51zDqwbkJMnilvPm5.', 'avatar10.jpg', 0),
(9, 'sounak', 'sarkar', 'sounak2002', 'sounak@gmail.com', '$2y$10$cdrmasf0X4dF5r8cWriJKeADZ7jP54aO6d9fiSjsffyXy5m.cGORy', 'avatar2.jpg', 0),
(10, 'Prodipta', 'Saha', 'prodipta1999', 'prodiptamyname@gmail.com', '$2y$10$gDqzitE9EKBy9gY9MGO7O.cL7YEL5bwR7TbOuSJEhZKphx/pbV/tq', 'pic-1.png', 0),
(11, 'Anika', 'oberoi', 'anika1234', 'anika@gmail.com', '$2y$10$lU0LAIcmj6HY8Gm9m0Ir7OKQF4NHaQa0k9OwJZBbraBNjuYS724c2', 'avatar5.jpg', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `dish`
--
ALTER TABLE `dish`
  ADD PRIMARY KEY (`did`),
  ADD KEY `fk_dish_rating_id` (`drating`),
  ADD KEY `fk_dish_category_id` (`dcategory`);

--
-- Indexes for table `favourite`
--
ALTER TABLE `favourite`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `dish`
--
ALTER TABLE `dish`
  MODIFY `did` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `favourite`
--
ALTER TABLE `favourite`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `rid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dish`
--
ALTER TABLE `dish`
  ADD CONSTRAINT `fk_dish_category_id` FOREIGN KEY (`dcategory`) REFERENCES `category` (`cid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
