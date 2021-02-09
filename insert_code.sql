
-- code เพิ่มข้อมูลลงในตาราง

-- insert to staff
INSERT INTO Staff VALUES('6300000001', '12345678', 3,  'มีชัย หนูพิศ', NULL, NULL);
INSERT INTO Staff VALUES('6300000002', '12345679', 3,  'โภคิน เมืองขำ', NULL, NULL);
INSERT INTO Staff VALUES('6300000003', '12345680', 1,  'สิทธิพงศ์ บับพาน', '0898888888', '401/5 มหาวิทยาลัยขอนแก่น จ.ขอนแก่น');
INSERT INTO Staff VALUES('6300000004', '12345681', 1,  'ชาคริต น้อยดวงศรี', '0898888555', '402/15 มหาวิทยาลัยขอนแก่น จ.ขอนแก่น');
INSERT INTO Staff VALUES('6300000005', '12345682', 2,  'อดิศร นาเรือง', '0898888666', '403/16 มหาวิทยาลัยขอนแก่น จ.ขอนแก่น');


-- insert to type
INSERT INTO type VALUES('T01', 'Reccomended Menu');
INSERT INTO type VALUES('T02', 'Curry' );
INSERT INTO type VALUES('T03', 'A la Carte' );
INSERT INTO type VALUES('T04', 'Pork/Chicken/Beef');
INSERT INTO type VALUES('T05', 'Sauce Dip-Spicy Salad');
INSERT INTO type VALUES('T06', 'Vegetable/Mushroom');
INSERT INTO type VALUES('T07', 'Fish');
INSERT INTO type VALUES('T08', 'Egg');
INSERT INTO type VALUES('T09', 'Desserts' );
INSERT INTO type VALUES('T10', 'Appetizer');

-- insert to menu 
INSERT INTO `menu` (`menuId`, `typeId`, `menuTHname`, `menuENname`, `menuPrice`, `menuStatus`, `menuDesc`, `menuImg`, `datesave`) VALUES
('ALA001', 'T03', 'หมี่กะทิ', 'Savoury Rice Vermicelli with Shrimp & Chicken Tamarind Coconut Milk', 250, 1, 'Chicken, Tofu, Shallot', 'ALA001.jpg', '2020-03-08 17:00:00'),
('ALA002', 'T03', 'เส้นจันทน์ผัดไทยไข่ห่อ', 'Phad Thai Shrimp Wrapped in Omelet', 300, 1, 'Shrimp, Egg, Bean Sprouts, Shallot, Lime, Chinese Chives, Tamarind', 'ALA002.jpg', '2020-03-08 17:00:00'),
('ALA003', 'T03', 'ข้าวผัดปลาแซลมอน', 'Salmon Aromatic Fried Rice', 300, 1, 'Salmon, Garlic, Pepper, Green Onion', 'ALA003.jpg', '2020-03-08 17:00:00'),
('ALA004', 'T03', 'ข้าวผัดน้ำพริกปลาทู', 'Spicy Shrimp Paste Fried Rice with Mackerel and Assorted Vegetables', 300, 1, 'Mackerel, Lemongrass, Garlic, Chili, Lime, Acacia, Eggs, Curcumin, Shrimp, Okra, Eggplant, Curcumin, Cucumber, String Beans', 'ALA004.jpg', '2020-03-08 17:00:00'),
('ALA005', 'T03', 'ข้าวแช่ ( Kaochae )', 'Rice in Refreshing Flower-Scented Water with Side Dishes (Kapi Balls, Stuffed Shallots, Stuffed Sweet Pepper, Shredded Sweetened Pork, Shredded Sweetened Beef, Stir-Fried Sweet Pickled Chinese Turnips', 450, 1, 'Galangal, Coriander root , Shallots , Green shallot', 'ALA005.jpg', '2020-03-08 17:00:00'),
('ALA006', 'T03', 'ข้าวผัดสับปะรดในสับปะรด', 'Pineapple Fried Rice in A Pineapple Served With Pineapple Smoothie', 450, 1, 'Shrimp, Chicken, Pork, Rasins, Egg, Garlic, Tumeric, Pineapple', 'ALA006.jpg', '2020-03-08 17:00:00'),
('ALA007', 'T03', 'ก้วยเตี๋ยวราดหน้ารวมมิตรทะเล', 'Pan-Fried Flat Rice Noodle Topped with Mixed Seafood and Kale in Gravy Sauce', 300, 1, 'Shrimp, Fish, Squid, Garlic, Pepper', 'ALA007.jpg', '2020-03-08 17:00:00'),
('ALA008', 'T03', 'ข้าวมันส้มตำ', 'Coconut Rice with Papaya Salad and Chicken Green Curry', 400, 1, 'Green Papaya, Coconut Milk, Chicken, Pork, Lime, Tamarind, Salted Egg', 'ALA008.jpg', '2020-03-08 17:00:00'),
('ALA009', 'T03', 'ข้าวผัดฟักทอง', 'Aromatic Fried Rice in A Pumpkin Served With Pumpkin Smoothie', 350, 1, 'Chicken, Pork, Egg, Pumpkin, Pepper', 'ALA009.jpg', '2020-03-08 17:00:00'),
('ALA010', 'T03', 'ข้าวผัดแตงโม', 'Watermelon Fried Rice in A Watermelon with Watermelon Smoothie', 350, 1, 'Pork, Watermelon, Pepper', 'ALA010.jpg', '2020-03-08 17:00:00'),
('ALA011', 'T03', 'ข้าวผัดอัมพวาในมะพร้าวอ่อน', 'Green Curry Fried Rice with Seafood in A Coconut Served with Coconut Juice', 350, 1, 'Coconut Milk, Shrimp, Squid, Round Eggplant, Sweet Basil, Kaffir Lime Leaves, Kaffir Lime, Lemongrass, Galangal, Chili, Coriander Seeds', 'ALA011.jpg', '2020-03-08 17:00:00'),
('APP001', 'T10', 'ชุดเรือนมัลลิกาหรูหรา', 'Ruen Mallika Deluxe Platter', 450, 1, 'Sour Pork Soft Ribs, Chicken Wrapped in Pandan Leaf, Thai Pork Satay and Peanut Sauce, Fried Clown Featherback Fish Cakes', 'APP001.jpg', '2020-03-08 17:00:00'),
('APP002', 'T10', 'ชุดเรือนมัลลิกาชั้นหนึ่ง', 'Ruen Mallika Royal Platter', 450, 1, 'Tempura Flowers, Crispy Golden Cups with Herbs Filling, Savory Crispy Sweet & Sour Vermicelli, Fried Shrimp Cakes with Crispy Tiny Shrimps, Rice Crispies with Minced Pork and Shrimp Coconut Dip', 'APP002.jpg', '2020-03-08 17:00:00'),
('APP003', 'T10', 'หมูสะเต๊ะ', 'Thai Pork Satay and Peanut Sauce', 300, 1, 'Pork, Turmeric, Shallot, Chili, Cucumber', 'APP003.jpg', '2020-03-08 17:00:00'),
('APP004', 'T10', 'กรอบซ่าส์ 5 สหาย', '5 Varieties of Deep-Fried Spring Rolls', 250, 1, 'Pork, Chicken, Tuna, Potato, Carrot, Onion, Sweet Basil, Garlic, Coriander Root, Pepper', 'APP004.jpg', '2020-03-08 17:00:00'),
('APP005', 'T10', 'เมี่ยงคะน้า', 'Herbs Wrapped in Chinese Broccoli Leaves', 250, 1, 'Chinese Kale Leaves, Ginger, Shallot, Chili, Lime, Peanuts', 'APP005.jpg', '2020-03-08 17:00:00'),
('APP006', 'T10', 'แหนมกระดูกอ่อน', 'Sour Pork Soft Ribs', 300, 1, 'Pork, Shallot, Ginger, Lime, Chilia', 'APP006.jpg', '2020-03-08 17:00:00'),
('APP007', 'T10', 'ทอดมันปลากราย', 'Fried Spotted Knifefish Cakes', 350, 1, 'Fish, Eggs, String Beans, Kaffir Lime LPeel, Galangal, Kaffir lime leaves, Chili, Shallot, Garlic, Lemongrass', 'APP007.jpg', '2020-03-08 17:00:00'),
('APP008', 'T10', 'ทอดมันกุ้ง', 'Fried Shrimp Cakes', 350, 1, 'Shrimp, Fish, Eggs', 'APP008.jpg', '2020-03-08 17:00:00'),
('APP009', 'T10', 'ห่อหมกกรอบ', 'Crispy Crab Coconut Souffle’', 300, 1, 'Crab Meat, Coconut Milk, Sweet Basil, Kaffir Lime LPeel, Galangal , Kaffir lime leaves, Chili, Shallot, Garlic, Lemongrass', 'APP009.jpg', '2020-03-08 17:00:00'),
('APP010', 'T10', 'หมี่กรอบทรงเครื่อง', 'Savory Crispy Sweet & Sour Vermicelli in Taro Basket', 250, 1, 'Shallot, Garlic, Chinese Chives, Soybean Curd, Taro, Tofu', 'APP010.jpg', '2020-03-08 17:00:00'),
('APP011', 'T10', 'ข้าวตังหน้าตั้ง', 'Rice Crispies with Minced Pork and Shrimp Coconut Dip', 200, 1, 'Coconut Milk, Chicken, Shrimp, Peanuts, Onion, Shallot, Garlic', 'APP011.jpg', '2020-03-08 17:00:00'),
('APP012', 'T10', 'คอหมูย่าง', 'Grilled Pork Neck with Spicy Tamarind Sauce', 300, 1, 'Pork, Pepper, Tamarind', 'APP012.jpg', '2020-03-08 17:00:00'),
('APP013', 'T10', 'เมี่ยงกระทงทอง', 'Crispy Golden Cups with Herbs Filling', 180, 1, 'Roasted Coconut Flakes, Ginger, Shallot, Chili, Lime, Peanut, Tamarind Sauce', 'APP013.jpg', '2020-03-08 17:00:00'),
('APP014', 'T10', 'ไก่ห่อใบเตย', 'Chicken Wrapped in Pandan Leaf', 300, 1, 'Pandan Leaves, Chicken', 'APP014.jpg', '2020-03-08 17:00:00'),
('APP015', 'T10', 'ปีกไก่ยัดไส้', 'Fried Stuffed Chicken Wings', 450, 1, 'Chicken, Garlic, Pepper, Coriander Root', 'APP015.jpg', '2020-03-08 17:00:00'),
('APP016', 'T10', 'ฉันชื่อบุษบา', 'Ruen Mallika Signature Tempura Flowers', 500, 1, 'Pagoda Flower, Butterfly Pea, Sesbania, Roses, Paper Flower, Chinese Chive, Flowering Cabbages, Ixora, Cowslip Creeper Flowers', 'APP016.jpg', '2020-03-08 17:00:00'),
('APP017', 'T10', 'ทอดมันกุ้งฝอย', 'Fried Shrimp Cakes with Crispy Tiny Shrimps', 350, 1, 'Shrimp', 'APP017.jpg', '2020-03-08 17:00:00'),
('CUR001', 'T02', 'แกงเขียวหวานไก่ / ปลากราย / เนื้อติดมัน', 'Chicken / Clown Featherback Fish Ball / Beef Green Curry', 400, 1, 'Coconut Milk, Chicken or Fish, Round Eggplant, Sweet Basil, Kaffir Lime Leaves, Kaffir Lime, Lemongrass, Galangal, Chili, Coriander Seeds', 'CUR001.jpg', '2020-03-08 17:00:00'),
('CUR002', 'T02', 'แกงคั่วหอยขมใบชะพลู', 'River Snails in Red Curry', 300, 1, 'Coconut Milk, Wild Betel Leaf, Acacia Leaves, Lemongrass, Kaffir Lime, Kaffir Lime Leaves, Chili', 'CUR002.jpg', '2020-03-08 17:00:00'),
('CUR003', 'T02', 'แกงเหลืองหน่อไม้ดองกุ้ง', 'Thai Sounthern-Style Yellow Curry with Pickled Bamboo and Shrimp', 450, 1, 'Shrimp, Pickled Bamboo Shoot Lemongrass, Kaffir Lime, Kaffir Lime Leaves, Chili, Shallots', 'CUR003.jpg', '2020-03-08 17:00:00'),
('CUR004', 'T02', 'แกงเผ็ดเป็ดย่าง', 'Roasted Duck Red Curry', 450, 1, 'Coconut Milk, Duck meat, Tomatoes, Sweet Basil, Kaffir Lime Leaves, Kaffir Lime, Lemongrass, Galangal, Chili, Coriander Seeds', 'CUR004.jpg', '2020-03-08 17:00:00'),
('CUR005', 'T02', 'แกงส้มกุ้งชะอมทอด', 'Spicy & Sour Soup with Acacia Omelet and Shrimp', 500, 1, 'Fish, Egg, Acacia Leaves, Lemongrass, Kaffir Lime, Kaffir Lime Leaves, Chili, Shallots', 'CUR005.jpg', '2020-03-08 17:00:00'),
('CUR006', 'T02', 'แกงป่าไก่บ้านสมุนไพร', 'Red Curry Soup with Herbal Free-Range Chicken', 450, 1, 'Eggplant, Boesenbergia, Sweet Basil, Kaffir Lime Leaves / Young Pepper', 'CUR006.jpg', '2020-03-08 17:00:00'),
('CUR007', 'T02', 'ฉู่ฉี่ปลาแซลมอน', 'Grilled Salmon Topped with Red Curry Sauce', 750, 1, 'Tomato, Sweet Basil, Kaffir Lime Leaves, Kaffir Lime, Lemongrass, Galangal, Chili, Coriander Seeds', 'CUR007.jpg', '2020-03-08 17:00:00'),
('CUR008', 'T02', 'แกงมัสมั่นไก่ / เนื้อ', 'Thai Southern-Style Chicken / Beef Curry', 500, 1, 'Coconut Milk, Chicken or Beef, Lemongrass, Galangal, Chili, Kaffir Lime, Shallot, Garlic, Coriander Seeds, Ginger, Onion, Cinnamon', 'CUR008.jpg', '2020-03-08 17:00:00'),
('DES001', 'T09', 'ข้าวเหนียวน้ำกะทิทุเรียน', 'Durian in Coconut Cream with Coconut Sticky Rice', 220, 1, 'Durian, Coconut Milk', 'des001.jpg', '2020-03-05 10:00:00'),
('DES002', 'T08', 'ข้าวเหนียวมะม่วง', 'Fresh Mango with Coconut Sticky Rice', 200, 1, 'Fresh Mango, Coconut Milk', 'des002.jpg', '2020-03-05 10:00:00'),
('DES003', 'T09', 'ไอศกรีมข้าวเหนียวมะม่วง', 'Home-Made Mango Ice Cream with Fresh Mango and Coconut Sticky Rice', 250, 1, 'Fresh Mango, Coconut Milk', 'des003.jpg', '2020-03-05 10:00:00'),
('DES004', 'T09', 'ไอศกรีมซาหริ่มกะทิสด ', 'Home-Made Coconut Ice Cream with Rainbow Sparkles Perfumed with Thai Scented Candle', 90, 1, 'Coconut Milk', 'des004.jpg', '2020-03-05 10:00:00'),
('DES005', 'T09', 'ฟักทองแกงบวด', 'Pumpkin in Lightly Sweetened Coconut Milk', 80, 1, 'Pumpkin, Coconut Milk', 'des005.jpg', '2020-03-05 10:00:00'),
('DES006', 'T09', 'บวดกะทิมันม่วง', 'Sweet Purple Potatoes in Lightly Sweetened Coconut Milk', 100, 1, 'Purple Potato, Coconut Milk', 'des006.jpg', '2020-03-05 10:00:00'),
('DES007', 'T09', 'กล้วยบวชชีโรยงา', 'Namwa Banana in Lightly Sweetened Coconut Milk with Roasted Sesame Seeds', 80, 1, 'Namwa Banana, Coconut Milk, Roasted White Sesame', 'des007.jpg', '2020-03-05 10:00:00'),
('DES008', 'T09', 'ข้าวเหนียวถั่วดำ', 'Black Beans and Coconut Sticky Rice in Lightly Sweetened Coconut Milk', 80, 1, 'Black Beans, Coconut Milk', 'des008.jpg', '2020-03-05 10:00:00'),
('DES009', 'T09', 'บัวลอยสามกษัตริย์ ', 'Purple Potato Balls, Pumpkin Balls, Pandan-Banana Balls in Lightly Sweetened Coconut Milk', 100, 1, 'Banana, Purple Potato, Pumpkin / Coconut Milk', 'des009.jpg', '2020-03-05 10:00:00'),
('DES010', 'T09', 'บัวลอยไข่หวาน', 'Purple Potato Balls, Pumpkin Balls, Pandan-Banana Balls Toppped with Syrup Poached Egg in Lightly Sweetened Coconut Milk', 120, 1, 'Banana, Purple Potato, Pumpkin, Coconut Milk, Egg', 'des010.jpg', '2020-03-05 10:00:00'),
('DES011', 'T09', 'ผลไม้รวมมิตร', 'Assorted Fresh Fruits', 300, 1, 'Watermelon, Rose Apple, Pomelo, Grape, Guava, Pineapple, Cantaloupe, Ripe Papaya', 'des011.jpg', '2020-03-05 10:00:00'),
('DES012', 'T09', 'ไอศกรีมมะพร้าวน้ำหอมในลูกมะพร้าว', 'Home-Made Coconut Juice Ice Cream in Coconut', 220, 1, 'Coconut Milk', 'des012.jpg', '2020-03-05 10:00:00'),
('DES013', 'T09', 'กระท้อนลอยแก้ว', 'Santol in Light Syrup with Crused Ice', 100, 1, 'Santol', 'des013.jpg', '2020-03-05 10:00:00'),
('DES014', 'T09', 'ระกำลอยแก้ว ', 'Thai Sala in Light Syrup with Crushed Ice', 100, 1, 'Thai Sala', 'des014.jpg', '2020-03-05 10:00:00'),
('DES015', 'T09', 'ลูกตาลลอยแก้ว', 'Palmyra Fruit in Light Syrup with Crushed Ice', 100, 1, 'Palmyra Frui', 'des015.jpg', '2020-03-05 10:00:00'),
('DES016', 'T09', 'ไอศกรีมขนมปังโบราณ', 'Thai Old Fashioned Coconut Ice Cream with Assorted Toppings', 250, 1, 'Coconut Milk, Red Beans, Lotus Seeds, Roasted Peanuts, Palm Seed', 'des016.jpg', '2020-03-05 10:00:00'),
('EEG001', 'T08', 'ไข่เค็มผัดพริกขิง', 'Stir-Fried Salted Egg and Green Beans with Ginger-Red Chilli Paste', 350, 1, 'Salted Egg, Garlic, Shallot, Galangal, Kaffir Lime Skin, Lemongrass, Chili', 'egg001.jpg', '2020-03-05 10:00:00'),
('EEG002', 'T08', 'ไข่เจียวซาลาเปาปู-หมูสับ', 'Thai Omelet with Crab Meat and Minced Pork', 300, 1, 'Egg, Crab Meat, Pork', 'egg002.jpg', '2020-03-05 10:00:00'),
('EEG003', 'T08', 'ไข่เจียวเนื้อปูโหระพา', 'Crab Meat and Sweet Basil Thai Omelet', 250, 1, 'Egg, Crab Meat, Sweet Basil', 'egg003.jpg', '2020-03-05 10:00:00'),
('EEG004', 'T08', 'ไข่ยัดไส้', 'Stuffed Omlet with Stir-Fried Pork, Tomatoes, Onion, Carrot and Baby Corn', 250, 1, 'Egg, Pork, Baby Corn, Tomato, Carrot, Onion, Garlic', 'egg004.jpg', '2020-03-05 10:00:00'),
('EEG005', 'T08', 'ยำไข่ม้วนทูน่า', 'Thai Spicy Tuna Salad \"Yum\" Omelette Roll', 350, 1, 'Egg, Tuna, Lemongrass, Lime Juice, Chili, Shallots', 'egg005.jpg', '2020-03-05 10:00:00'),
('FIS001', 'T07', 'ปลากะพงนึ่งมะนาว', 'Steamed Sea Bass with Hot and Sour Lime Soup', 650, 1, 'Steamed Sea Bass with Hot and Sour Lime Soup', 'FIS001.jpg', '2020-03-05 10:00:00'),
('FIS002', 'T07', 'ปลากะพงเปรี้ยวหวาน ', 'Fried Sea Bass Topped with Pineapple, Onion, Green Pepper, Red Pepper and Tomato in Sweet and Sour Sauce', 650, 1, 'Seabass, Chili, Garlic, Shallot, Pineapple, Onion, Tomatoes', 'FIS002.jpg', '2020-03-05 10:00:00'),
('FIS003', 'T07', 'ปลากะพงผัดพริกไทยดำ ', 'Stir-Fried Sea Bass with Black Pepper', 650, 1, 'Seabass, Black Pepper , Garlic', 'FIS003.jpg', '2020-03-05 10:00:00'),
('FIS004', 'T07', 'ปลากะพงราดน้ำปลา', 'Fried Sea Bass with Sweet Palm Sugar Fish Sauce', 650, 1, 'Seabass, Shallot, Chili', 'FIS004.jpg', '2020-03-05 10:00:00'),
('FIS005', 'T07', 'ปลากะพงราดพริก', 'Deep Fried Seabass with Sweet & Sour Chili Sauce', 550, 1, 'Seabass, Chili, Garlic, Shallot', 'FIS005.jpg', '2020-03-05 10:00:00'),
('FIS006', 'T07', 'ปลากะพงลุยสวนผลไม้ ', 'Deep Fried Seabass with Spicy Somtum Fruit Salad', 650, 1, 'Seabass, Guava, Pineapple, Pomelo, Rose Apple, Star Fruit, Green Mango, Salted Crab or Dried Shrimp, Garlic, Chili, Tamarind, Lime', 'FIS006.jpg', '2020-03-05 10:00:00'),
('FIS007', 'T07', 'ปลากะพงสามรส', 'Fried Sea Bass Topped with Hot Sweet and Sour Sauce', 650, 1, 'Seabass, Chili, Garlic, Shallot', 'FIS007.jpg', '2020-03-05 10:00:00'),
('FIS008', 'T07', 'ปลากะพงเผาเกลือ ', 'Salt Baked Sea Bass', 550, 1, 'Seabass, Sea Salt', 'FIS008.jpg', '2020-03-05 10:00:00'),
('POR001', 'T04', 'ซี่โครงหมูอบยอดผัก', 'A.Mallikas Steamed Pork Soft Ribs in Signature Gravy', 550, 1, 'Pork Soft Ribs, Coriander Root, Garlic, Pepper                          ', 'POR001.jpg', '2020-03-05 10:00:00'),
('POR002', 'T04', 'ขาหมูกรอบแกงไตปลา ', 'Fried Pork Leg with Southern-Style Fish Curry Sauce', 650, 1, 'Pork, Fish, Kaffir Lime Peel, Shallot, Galangal, Lemongrass, Chili', 'POR002.jpg', '2020-03-05 10:00:00'),
('POR003', 'T07', 'คั่วกลิ้งซี่โครงอ่อน', 'Spicy Stir-Fried Southern-Style Pork Soft Ribs', 350, 1, 'Pork Soft Ribs, Galangal, Lemongrass, Chili, Kaffir Lime Skin, Shallot', 'POR003.jpg', '2020-03-05 10:00:00'),
('POR004', 'T04', 'หมูตุ๊กตุ๊ก', 'Fried Seasoned Pork', 300, 1, 'Pork, Kaffir Lime Leaves, Chili, Lemongrass, Shallot', 'POR004.jpg', '2020-03-05 10:00:00'),
('POR005', 'T04', 'ไก่ผัดเม็ดมะม่วงหิมพานต์', 'Stir-Fried Chicken with Cashew Nuts', 350, 1, 'Chicken, Cashews, Dry Chili, Onion, Green Onion, Garlic, Bell Pepper', 'POR005.jpg', '2020-03-05 10:00:00'),
('POR006', 'T04', 'ไก่ย่างข้าวเหนียวทอด', 'Grilled Spicy Chicken with Crispy Sticky Rice', 350, 1, 'Chicken, Galangal, Lemongrass, Kaffir Lime Peel, Garlic, Shallot, Fresh Chili', 'POR006.jpg', '2020-03-05 10:00:00'),
('POR007', 'T04', 'ไก่ผัดพริกไทยอ่อน ', 'Stir-Fried Chicken with Young Pepper Corn', 300, 1, 'Chicken, Garlic, Pepper, Coriander Root, Young Peppercorn', 'POR007.jpg', '2020-03-05 10:00:00'),
('POR008', 'T04', 'ปีกไก่ยัดไส้', 'Fried Stuffed Chicken Wings', 450, 1, 'Chicken, Garlic, Pepper, Coriander Root', 'POR008.jpg', '2020-03-05 10:00:00'),
('POR009', 'T04', 'เนื้อริบอายออสเตรเลียผัดพริก', 'Stir-Fried Australian Rib Eye with Fresh Chili', 550, 1, 'Beef, Chili, Onion, Garlic', 'POR009.jpg', '2020-03-05 10:00:00'),
('POR010', 'T04', 'เนื้อริบอายออสเตรเลียย่างจิ้มแจ่ว', 'Grilled Australian Rib Eye Beef with Tamarind Chilli Sauce', 750, 1, 'Beef, Chili, Green Onion, Shallot, Lime, Tamarind Paste', 'POR010.jpg', '2020-03-05 10:00:00'),
('POR011', 'T04', 'เนื้อนกกระจอกเทศย่างจิ้มแจ่ว', 'Ostrich, Shallot, Lime, Tamarind Paste, Chili, Green Onion', 550, 1, 'Ostrich, Shallot, Lime, Tamarind Paste, Chili, Green Onion', 'POR011.jpg', '2020-03-05 10:00:00'),
('POR012', 'T04', 'เนื้อนกกระจอกเทศผัดฉ่า ', 'Stir-Fried Ostrich with Herbs and Young Pepper Corn (Spicy)', 550, 1, 'Ostrich, Young Peppercorn, Chili, Kaffir Lime Leaves, Holy Basil', 'POR012.jpg', '2020-03-05 10:00:00'),
('REC001', 'T01', 'ฉันชื่อบุษบา', 'Ruen Mallika Signature Tempura Flowers', 300, 1, 'Pagoda Flower, Butterfly Pea, Sesbania, Roses, Paper Flower, Chinese Chive, Flowering Cabbages, Ixora, Cowslip Creeper Flowers', 'REC001.jpg', '2020-03-08 17:00:00'),
('REC002', 'T01', 'ต้มข่าปลาสลิดใบมะขามอ่อน', 'Hot & Sour Galangal Coconut Cream Soup with Fried Gourami Fish ', 450, 1, '\" Gourami, Coconut Milk, Tamarind Leaves,\r\n Galangal, Lemongrass, Kaffir Lime, Lime, Chili\"', 'REC002.jpg', '2020-03-08 17:00:00'),
('REC003', 'T01', 'ต้มข่าไก่ใบมะขามอ่อน', 'Hot & Sour Galangal Coconut Cream Soup with Chicken', 350, 1, 'Chicken, Coconut Milk, Tamarind Leaves,\r\n Galangal, Lemongrass, Kaffir Lime, Lime, Chili', 'REC003.jpg', '2020-03-08 17:00:00'),
('REC004', 'T01', 'ต้มยำกุ้งแม่น้ำ', 'Tom Yum Giant River Prawn Soup', 750, 1, 'River Prawn, Shrimp Paste, Kaffir Lime, Kaffir Lime Leaves,\r\n Galangal, Lemongrass, Chili, Lime', 'REC004.jpg', '2020-03-08 17:00:00'),
('REC005', 'T01', 'น้ำพริกลงเรือ', 'Spicy Thai Herbal Soup with Various Vegetables and Shrimp', 400, 1, '\" Catfish, Caramel Pork, Lemongrass, Garlic, Chili, Lime,\r\n Acacia, Eggs, Curcumin, Shrimp, Okra, Eggplant,\r\n Curcumin, Cucumber, String Beans\"', 'REC005.jpg', '2020-03-08 17:00:00'),
('REC006', 'T01', 'ห่อหมกขนมถ้วย', 'Fish and Crab Coconut Souffle', 350, 1, '\" Crab Meat, Sweet Basil, Chili, Galangal,\r\n Kaffir Lime Leaves, Lemongrass\"', 'REC006.jpg', '2020-03-08 17:00:00'),
('REC007', 'T01', 'ปลาหมึกหอมผัดไข่เค็ม', 'Stir-Fried Squid with Salted Egg', 450, 1, ' Squid, Salted Egg Yolk, Garlic', 'REC007.jpg', '2020-03-08 17:00:00'),
('REC008', 'T01', 'ปูนิ่มผัดขี้เมากะเพรากรอบ', 'Stir-Fried Soft-Shell Crab with Crispy Holy Basil', 450, 1, ' Soft -shell Crab, Holy Basil, Garlic, Chili', 'REC008.jpg', '2020-03-08 17:00:00'),
('REC009', 'T01', 'ส้มตำหัวปลี', 'Spicy Banana Blossom Somtum with Dried Shrimps', 300, 1, 'Banana Blossom, Garlic, Chili, Lime, Tamarind, Shallots, Roasted Coconut Flakes, Peanuts, Cherry Tomatoes', 'REC009.jpg', '2020-03-08 17:00:00'),
('REC010', 'T01', 'ซี่โครงหมูอบยอดผัก', 'A. Mallika Steamed Pork Soft Ribs in Signature Gravy', 550, 1, ' Pork Soft Ribs, Coriander Root, Garlic, Pepper', 'REC010.jpg', '2020-03-08 17:00:00'),
('REC011', 'T01', 'ขาหมูกรอบแกงไตปลา', 'Fried Pork Leg with Southern-Style Fish Curry Sauce', 650, 1, ' Pork, Fish, Kaffir Lime Peel, Shallot, Galangal, Lemongrass, Chili', 'REC011.jpg', '2020-03-08 17:00:00'),
('SAU001', 'T05', 'น้ำพริกกะปิ-ปลาทู', 'Spicy Shrimp Paste Dip with Fried Mackerel and Assorted Vegetables', 500, 1, 'Mackerel, Lemongrass, Garlic, Chili, Lime, Acacia, Eggs, Curcumin, Shrimp, Okra, Eggplant, Curcumin, Cucumber, String Beans', 'SAU001.jpg', '2020-03-08 17:00:00'),
('SAU002', 'T05', 'น้ำพริกไข่ปู', 'Spicy Crab-Salted Egg Paste Dip with Assorted vegetables', 500, 1, 'Crab Meat, Eggs, Eggplant, Chili, Lime, Garlic, Acacia, Okra, String Beans, Cucumber', 'SAU002.jpg', '2020-03-08 17:00:00'),
('SAU003', 'T05', 'น้ำพริกลงเรือ', 'Spicy Thai Herbal Soup with Various Vegetables and Shrimp', 400, 1, 'Catfish, Caramel Pork, Lemongrass, Garlic, Chili, Lime, Acacia, Eggs, Curcumin, Shrimp, Okra, Eggplant, Curcumin, Cucumber, String Beans', 'SAU003.jpg', '2020-03-08 17:00:00'),
('VEG001', 'T06', 'กะหล่ำปลีผัดน้ำปลา (Galamplee Phad Nampla)', 'Stir-Fried Cabbage with Fish Sauce', 250, 1, 'Cabbage, Garlic', 'VEG001.jpg', '2020-03-08 17:00:00'),
('VEG002', 'T06', 'คะน้าผัดหอยแอสพารากัส', 'Stir-Fried Chinese Kale with Sea Asparagus Clams', 450, 1, 'Chinese Broccoli , Sea Asparagus, Garlic', 'VEG002.jpg', '2020-03-08 17:00:00'),
('VEG003', 'T06', 'ผัดผักบุ้งไร้ก้าน', 'Stir-Fried Stemless Chinese Morning Glory with Oyster Sauce (Spicy)', 250, 1, 'Morning Glory, Garlic, Chili', 'VEG003.jpg', '2020-03-08 17:00:00'),
('VEG004', 'T06', 'เบบี้บร็อคผัดน้ำมันหอย', 'Stir-Fried Baby Broccoli with Oyster Sauce', 300, 1, 'Broccoli, Garlic', 'VEG004.jpg', '2020-03-08 17:00:00'),
('VEG005', 'T06', 'เห็ดเออรินจิผัดกุ้ง', 'Stir-Fried Eryngii Mushroom with Shrimp', 400, 1, 'Eryngii Mushroom, Shrimp, Garlic', 'VEG005.jpg', '2020-03-08 17:00:00');


--insert to Income 

INSERT INTO Income VALUES('01', 'มกราคม', NULL, NULL);
INSERT INTO Income VALUES('02', 'กุมภาพันธ์', NULL, NULL);
INSERT INTO Income VALUES('03', 'มีนาคม', NULL, NULL);
INSERT INTO Income VALUES('04', 'เมษายน', NULL, NULL);
INSERT INTO Income VALUES('05', 'พฤษภาคม', NULL, NULL);
INSERT INTO Income VALUES('06', 'มิถุนายน', NULL, NULL);
INSERT INTO Income VALUES('07', 'กรกฎาคม', NULL, NULL);
INSERT INTO Income VALUES('08', 'สิงหาคม', NULL, NULL);
INSERT INTO Income VALUES('09', 'กันยายน', NULL, NULL);
INSERT INTO Income VALUES('10', 'ตุลาคม', NULL, NULL);
INSERT INTO Income VALUES('11', 'พฤศจิกายน', NULL, NULL);
INSERT INTO Income VALUES('12', 'ธันวาคม', NULL, NULL);


