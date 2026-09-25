-- =========================================================
-- KOZI Coffee Bekasi — Database Schema & Seed Data
-- Import this file in phpMyAdmin / MySQL to set up the site
-- =========================================================

CREATE DATABASE IF NOT EXISTS kozi_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE kozi_db;

-- ---------------------------------------------------------
-- Table: categories
-- ---------------------------------------------------------
DROP TABLE IF EXISTS menu_items;
DROP TABLE IF EXISTS categories;

CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(80) NOT NULL,
    slug VARCHAR(80) NOT NULL UNIQUE,
    `group` ENUM('food','drink') NOT NULL,
    banner_image VARCHAR(255) DEFAULT NULL,
    sort_order INT NOT NULL DEFAULT 0
) ENGINE=InnoDB;

-- ---------------------------------------------------------
-- Table: menu_items
-- ---------------------------------------------------------
CREATE TABLE menu_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    category_id INT NOT NULL,
    name VARCHAR(150) NOT NULL,
    description TEXT,
    price INT NOT NULL COMMENT 'Price in Rupiah',
    note VARCHAR(255) DEFAULT NULL COMMENT 'e.g. Mini Size 35, Choice of Flavour, Extra Egg +5',
    is_recommended TINYINT(1) NOT NULL DEFAULT 0,
    sort_order INT NOT NULL DEFAULT 0,
    FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------
-- Table: messages  (Contact form submissions)
-- ---------------------------------------------------------
CREATE TABLE IF NOT EXISTS messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(120) NOT NULL,
    email VARCHAR(150) NOT NULL,
    phone VARCHAR(30) DEFAULT NULL,
    subject VARCHAR(150) DEFAULT NULL,
    message TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- ---------------------------------------------------------
-- Categories
-- ---------------------------------------------------------
INSERT INTO categories (id, name, slug, `group`, banner_image, sort_order) VALUES
(1, 'Rice Bowl',       'rice-bowl',      'food',  'gallery-rice-1.jpg',          1),
(2, 'Ramen',           'ramen',          'food',  'gallery-ramen.jpg',           2),
(3, 'Pasta',           'pasta',          'food',  NULL,                          3),
(4, 'Smoked Brisket',  'smoked-brisket', 'food',  NULL,                          4),
(5, 'Snacks',          'snacks',         'food',  NULL,                          5),
(6, 'Desserts',        'desserts',       'food',  NULL,                          6),
(7, 'Classic Coffee - Black', 'classic-coffee-black', 'drink', 'gallery-coffee-classic.jpg',   7),
(8, 'Classic Coffee - White', 'classic-coffee-white', 'drink', 'gallery-coffee-classic.jpg',   8),
(9, 'Signature Coffee','signature-coffee','drink', 'gallery-coffee-signature.jpg',9),
(10,'Matcha',          'matcha',         'drink', 'gallery-matcha.jpg',          10),
(11,'Mocktails',       'mocktails',      'drink', 'gallery-mocktails.jpg',       11),
(12,'Non-Coffee',      'non-coffee',     'drink', 'gallery-noncoffee.jpg',       12);

-- ---------------------------------------------------------
-- Menu items — RICE BOWL
-- ---------------------------------------------------------
INSERT INTO menu_items (category_id, name, description, price, note, is_recommended, sort_order) VALUES
(1,'Nasi Bistik Ayam','Deep fried katsu with brown sauce, rice, kerupuk.',30000,NULL,0,1),
(1,'Butter Rice Kulit Ayam Sambal Matah','Crispy chicken skin, fried egg, butter rice, sambal matah, kerupuk.',30000,NULL,0,2),
(1,'Chicken Salted Egg','Popcorn chicken with homemade salted egg sauce, crispy spinach, rice.',30000,'Extra Egg +5',0,3),
(1,'Nasi Jeruk Ayam Taliwang','Spicy grilled Taliwang-style chicken, fragrant rice, crispy spinach, and kerupuk.',34000,NULL,1,4),
(1,'Nasi Ayam Betutu','Balinese steamed chicken, crispy spinach, sambal matah, rice, and kerupuk.',34000,NULL,0,5),
(1,'Nasi Goreng Katsu Kecombrang','Kecombrang aromatic fried rice, crispy katsu chicken, sunny side egg, and kerupuk.',35000,NULL,1,6),
(1,'Nasi Goreng Kampoeng','Javanese-style fried rice with chicken chop. Served with sunny side egg.',30000,NULL,0,7),
(1,'Butter Rice Dori Sambal Matah','Fried dori with sambal matah, butter rice, fried egg, kerupuk.',32000,NULL,1,8),
(1,'Salmon Teriyaki Rice','Grilled salmon glazed in teriyaki sauce over white rice. Served with omelette and salad.',50000,NULL,0,9),
(1,'Nasi Oseng Paru Mercon','Spicy oseng paru sapi, sunny side egg, rice, and kerupuk.',30000,NULL,0,10),
(1,'Nasi Ijo Dendeng Balado','Dendeng balado with green chili rice, sunny side egg, and kerupuk.',38000,NULL,1,11),
(1,'Wagyu Cube Cajun Rice','Pan seared wagyu beef served with cajun rice, omelette, and salad.',52000,NULL,1,12);

-- ---------------------------------------------------------
-- Menu items — RAMEN
-- ---------------------------------------------------------
INSERT INTO menu_items (category_id, name, description, price, note, is_recommended, sort_order) VALUES
(2,'Toripaitan Ramen','Creamy chicken broth, ramen-style noodles, tender chasiu chicken. Served with ajitsuke tamago, mushroom, narutomaki, and nori.','55000','Choice of Flavour: Shio / Shoyu / Karai — Mini Size Rp 35.000',1,1),
(2,'Katsu Ramen','Creamy chicken broth, ramen-style noodles, crispy katsu chicken. Served with ajitsuke tamago, mushroom, narutomaki, and nori.',55000,'Choice of Flavour: Shio / Shoyu / Karai — Mini Size Rp 35.000',0,2);

-- ---------------------------------------------------------
-- Menu items — PASTA
-- ---------------------------------------------------------
INSERT INTO menu_items (category_id, name, description, price, note, is_recommended, sort_order) VALUES
(3,'Beef Aglio Olio','Garlic and spicy oil spaghetti with smoked beef.',35000,NULL,0,1),
(3,'Balinese Dori Pasta','Spaghetti tossed with sambal matah and crispy dory.',35000,NULL,0,2),
(3,'Spaghetti Beef Carbonara','Creamy carbonara sauce with smoked beef and champignon mushroom.',35000,NULL,0,3),
(3,'Creamy Salmon Pasta','Lightly fried salmon with a silky creamy mushroom sauce over spaghetti.',50000,NULL,1,4),
(3,'Wagyu Yaki Pasta','Stir fried pasta with tender wagyu cube.',52000,NULL,0,5);

-- ---------------------------------------------------------
-- Menu items — SMOKED BRISKET
-- ---------------------------------------------------------
INSERT INTO menu_items (category_id, name, description, price, note, is_recommended, sort_order) VALUES
(4,'Indomie Brisket','8-hours smoked brisket sliced, sunny side egg, and pakcoy served over indomie goreng.',35000,NULL,1,1),
(4,'Sei Brisket Sambal Matah','8-hours smoked brisket with sambal matah, white rice, and a side of clear broth.',50000,NULL,0,2),
(4,'Brisket Cajun Rice','Cajun-spiced rice with 8-hours smoked brisket, omelette, and fresh greens.',60000,NULL,1,3),
(4,'Brisket Platters','8-hours sliced smoked brisket, brioche bread, sausages, sunny side egg, and mix greens.',60000,NULL,0,4);

-- ---------------------------------------------------------
-- Menu items — SNACKS
-- ---------------------------------------------------------
INSERT INTO menu_items (category_id, name, description, price, note, is_recommended, sort_order) VALUES
(5,'Tahu Cabe Garam','Crispy tofu tossed with chili, garlic, and salt.',22000,NULL,0,1),
(5,'Super Fries','Perfectly seasoned french fries served with 3 different dips.',28000,NULL,0,2),
(5,'Chicken Popcorn','Crispy bite-sized chicken, seasoned and snackable.',28000,NULL,0,3),
(5,'BBQ Chicken Wings','4 parts chicken wings, glazed in smoky BBQ sauce.',32000,NULL,0,4),
(5,'KOZI Snack Platter','A shareable mix of fries, sausage, chicken popcorn, and crispy dori.',52000,NULL,1,5);

-- ---------------------------------------------------------
-- Menu items — DESSERTS
-- ---------------------------------------------------------
INSERT INTO menu_items (category_id, name, description, price, note, is_recommended, sort_order) VALUES
(6,'Fried Banana','Banana fritters topped with cheddar cheese and palm sugar.',22000,NULL,0,1),
(6,'Churros','Crispy dough sticks served with chocolate dip.',25000,NULL,0,2),
(6,'Burnt Cheesecake Brownie','Rich burnt cheesecake brownie.',25000,NULL,0,3),
(6,'New York Cheesecake','Strawberry / Blueberry / Oreo.',26000,NULL,0,4),
(6,'Ubi Creme Brulee','Caramelized custard over sweet potato. Served with vanilla ice cream.',30000,NULL,1,5),
(6,'Biscoff French Toast','Brioche bread layered with biscoff sauce, vanilla ice cream and lotus biscuit.',34000,NULL,1,6);

-- ---------------------------------------------------------
-- Menu items — CLASSIC COFFEE (BLACK)
-- ---------------------------------------------------------
INSERT INTO menu_items (category_id, name, description, price, note, is_recommended, sort_order) VALUES
(7,'Espresso',NULL,20000,NULL,0,1),
(7,'Americano',NULL,24000,NULL,0,2),
(7,'Manual Brew Local',NULL,30000,NULL,0,3),
(7,'Manual Brew International',NULL,35000,NULL,0,4);

-- ---------------------------------------------------------
-- Menu items — CLASSIC COFFEE (WHITE)
-- ---------------------------------------------------------
INSERT INTO menu_items (category_id, name, description, price, note, is_recommended, sort_order) VALUES
(8,'Piccolo',NULL,25000,NULL,0,1),
(8,'Magic',NULL,30000,NULL,0,2),
(8,'Cappucino',NULL,30000,NULL,0,3),
(8,'Latte',NULL,30000,NULL,0,4),
(8,'O.G Dirty Latte','Quadruple ristretto, served with 180ml special milk.',35000,NULL,0,5),
(8,'KOZI Special Flight','Espresso, piccolo, ice cream. Served in one tray.',36000,NULL,0,6);

-- ---------------------------------------------------------
-- Menu items — SIGNATURE COFFEE
-- ---------------------------------------------------------
INSERT INTO menu_items (category_id, name, description, price, note, is_recommended, sort_order) VALUES
(9,'Koldbrown','Kopi susu aren.',24000,NULL,0,1),
(9,'Kosangsu','Kopi pisang susu.',24000,NULL,0,2),
(9,'Eskoba','Espresso, pandan, aren, coconut milk.',24000,NULL,0,3),
(9,'Butterscotch Latte','Light espresso, butterscotch, dairy milk, and sea salt foam.',28000,NULL,1,4),
(9,'Spanish Oat Latte','Iced shaken espresso, Asian dolce sauce, and oatmilk.',28000,NULL,1,5),
(9,'Pilattes','Iced white with salted caramel pillow on top.',32000,NULL,0,6),
(9,'Triple C','Cold creamy cappucino.',32000,NULL,1,7),
(9,'SB Killer','Double shot iced shaken espresso, better than sb*cks.',32000,NULL,0,8);

-- ---------------------------------------------------------
-- Menu items — MATCHA
-- ---------------------------------------------------------
INSERT INTO menu_items (category_id, name, description, price, note, is_recommended, sort_order) VALUES
(10,'Sweet Matcha','Pure Japanese creamy matcha.',32000,NULL,0,1),
(10,'Strawberry Matcha','Pure Japanese creamy matcha with strawberry puree.',32000,NULL,1,2),
(10,'Dirty Matcha','Espresso, dairy milk, and pure Japanese matcha.',35000,NULL,0,3);

-- ---------------------------------------------------------
-- Menu items — MOCKTAILS
-- ---------------------------------------------------------
INSERT INTO menu_items (category_id, name, description, price, note, is_recommended, sort_order) VALUES
(11,'Blue Lychee','Butterfly pea tea based, shaken with lychee syrup.',26000,NULL,1,1),
(11,'Orange Boom','Refreshing citrusy drink.',28000,NULL,0,2),
(11,'Strawberry Boom','Iced shaken tea with fresh strawberry fruits.',28000,NULL,0,3),
(11,'Creamy Cotton Candy','Tastes like childhood candy, with a dreamy twist.',28000,NULL,1,4),
(11,'Sunset Boulevard','Mix berry mocktail, with citrus and lemon soda.',35000,NULL,0,5),
(11,'Triple Kill','Extreme freshness of mixed berries and apple.',35000,NULL,1,6),
(11,'Americonno','Iced black coffee shaken with dark cherries syrup.',30000,NULL,0,7),
(11,'Mocky','Refreshing citrusy coffee mocktail.',35000,NULL,0,8);

-- ---------------------------------------------------------
-- Menu items — NON-COFFEE
-- ---------------------------------------------------------
INSERT INTO menu_items (category_id, name, description, price, note, is_recommended, sort_order) VALUES
(12,'Kaori','Creamy red velvet with vanilla pillow on top.',30000,NULL,0,1),
(12,'Hojicha Salted Caramel','Creamy hojicha with salted caramel pillow on top.',32000,NULL,0,2),
(12,'Choco Granule','Dark chocolate with vanilla pillow on top.',32000,NULL,0,3),
(12,'Specialty Classic Choco','Origin from Sulawesi / East Java. Served on Hot/Ice.',32000,NULL,0,4),
(12,'Lychee Tea',NULL,25000,NULL,0,5),
(12,'Lemon Tea',NULL,23000,'Hot / Ice',0,6),
(12,'Black Tea',NULL,18000,'Hot / Ice',0,7),
(12,'Mineral Water',NULL,8000,NULL,0,8);
