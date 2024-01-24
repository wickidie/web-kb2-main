CREATE TABLE admin (
    admin_id int PRIMARY KEY,
    username VARCHAR(255),
    password CHAR(32)
);

CREATE TABLE users (
    user_id int PRIMARY KEY,
    username VARCHAR(255),
    password CHAR(32),
    email VARCHAR(255),
    first_name VARCHAR(255),
    last_name VARCHAR(255),
    address VARCHAR(255),
    phone_number VARCHAR(255),
    purchase int
);

CREATE TABLE product_category (
    category_id int PRIMARY KEY,
    category_name VARCHAR(255)
);

CREATE TABLE products (
    product_id int PRIMARY KEY,
    product_name VARCHAR(255),
    product_description VARCHAR(1024),
    product_price DECIMAL(16, 2),
    product_img VARCHAR(255),
    category_id int,
    sold int,
    FOREIGN KEY (category_id) REFERENCES product_category(category_id) 
        ON UPDATE CASCADE 
        ON DELETE SET NULL
);

CREATE TABLE transactions ( 
    transaction_id int PRIMARY KEY,
    transaction_date DATETIME,
    transaction_total DECIMAL(16, 2),
    status VARCHAR(255),
    payment VARCHAR(255),
    user_id int,
    FOREIGN KEY (user_id) REFERENCES users(user_id) 
        ON UPDATE CASCADE 
        ON DELETE SET NULL
);

CREATE TABLE transaction_details (
    transaction_detail_id int PRIMARY KEY,
    quantity int,
    product_price DECIMAL(16, 2),
    transaction_id int,
    product_id int,
    FOREIGN KEY (transaction_id) REFERENCES transactions(transaction_id)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES products(product_id) 
        ON UPDATE CASCADE
        ON DELETE SET NULL
);

CREATE TABLE cart (
    cart_id int PRIMARY KEY,
    created_at DATETIME,
    user_id int,
    quantity int,
    product_id int,
    FOREIGN KEY (user_id) REFERENCES users(user_id) 
        ON UPDATE CASCADE 
        ON DELETE SET NULL,
    FOREIGN KEY (product_id) REFERENCES products(product_id) 
        ON UPDATE CASCADE
        ON DELETE SET NULL
);

ALTER TABLE admin
    MODIFY admin_id int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE users
    MODIFY user_id int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE products
    MODIFY product_id int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE transactions
    MODIFY transaction_id int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE transaction_details
    MODIFY transaction_detail_id int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE cart
    MODIFY cart_id int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
    
ALTER TABLE product_category
    MODIFY category_id int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;

INSERT INTO `admin`(`username`, `password`) VALUES ('admin',md5('admin'));

INSERT INTO `product_category`(`category_name`) VALUES ('Other');
INSERT INTO `product_category`(`category_name`) VALUES ('Camera');
INSERT INTO `product_category`(`category_name`) VALUES ('SD Card');
INSERT INTO `product_category`(`category_name`) VALUES ('Scale Model Car');
INSERT INTO `product_category`(`category_name`) VALUES ('Backpack');

INSERT INTO products (product_name, product_description, product_price, product_img, category_id, sold) VALUES
('Canon EOS R10 (RF-S18-45mm f/4.5-6.3 IS STM)', 'Explore infinite possibilities with the lightweight EOS R10. With a new APS-C sensor on the revolutionary RF mount, you get a telephoto effect of approximately 1.6x while maintaining high resolution. \n This mirrorless camera shoots up to 23 frames per second and weighs only approximately 429g.', 17000000, 'EOSR10.webp', 2, 0);
INSERT INTO products (product_name, product_description, product_price, product_img, category_id, sold) VALUES
('Nikon D750', 'Bring your vision to life with Nikon&apos;s first full-frame DSLR to feature a tilting Vari-angle display and built-in Wi-Fi® connectivity. With pro-caliber video features inspired by the D810, the same autofocus and metering system used in the D4S and D810, a newly designed 24.3MP FX-format CMOS image sensor and EXPEED 4 image processor, the D750 delivers a feature set unlike DSLRs its size. A monocoque design keeps the camera remarkably slim, compact and lightweight, and a control layout based on Nikon&apos;s flagship cameras makes for comfortable, intuitive handling. The D750 will deliver superb performance.', 26442723, 'D750_front_display.png', 2, 0);
INSERT INTO products (product_name, product_description, product_price, product_img, category_id, sold) VALUES
('Nikon Z30 Kit', 'The Z 30 One Lens Kit pairs the compact, lightweight Z 30 creator-ready camera with the NIKKOR Z DX 16-50mm f/3.5-6.3 VR lens. The NIKKOR Z 16-50mm lens offers a versatile wide zoom range and VR image stabilization built-into the lens; and quiet operation, making it ideal for video.', 11000000, 'Z30_front.webp', 2, 0);
INSERT INTO products (product_name, product_description, product_price, product_img, category_id, sold) VALUES
('Canon EOS 200D Mark II', 'The EOS 200D II is Canon&apos;s lightest DSLR equipped with a Vari-angle Touch Screen LCD display. Weighing no more than a bottle of water*, this camera fits perfectly in a bag and is ready to accompany you in taking photos every day. This tiny camera body is equipped with a 24.1 megapixel APS-C CMOS sensor, DIGIC 8 processor and a multitude of features that will make it easier for you to photograph the life you encounter every day.', 13300000, 'EOS200D.webp', 2, 0);

INSERT INTO products (product_name, product_description, product_price, product_img, category_id, sold) VALUES
('Lexar Professional SDXC 1667X ', 'Lexar Professional SDXC 128GB V60 UHS-II 1667X Up To 250MB/s \n Didesain untuk DSLR mid-range, camcorder HD, kamera 3D, Lexar® Professional 1667x SDHC ™ / SDXC ™ UHS-II card memungkinkan Anda dengan cepat menangkap, dan mentransfer foto berkualitas tinggi dari 1080p full-HD, 3D, dan 4K video yang menakjubkan.', 540000, 'lexar1667x2_display.jpeg', 3, 0);
INSERT INTO products (product_name, product_description, product_price, product_img, category_id, sold) VALUES
('SanDisk Extreme PRO SDHC™ And SDXC™ UHS-I Card', 'Sandisk most powerful SD UHS-I memory card yet delivers performance that elevates your creativity. With shot speeds of up to 140MB/s6 and UHS speed Class 3 (U3)2 recording, you’re ready to capture stunning high-resolution, stutter-free 4K UHD video1. And, because your pace doesn’t let up after the shots are in, it delivers up to 200MB/s6 transfer speeds for a faster postproduction workflow. Plus, it’s built to withstand weather, water, shocks and other less-than-ideal conditions so you can rest assured that it’s good to go wherever your work takes you.', 360000, 'Sandisk_ExtremePro.webp', 3, 0);
INSERT INTO products (product_name, product_description, product_price, product_img, category_id, sold) VALUES
('PRO Plus Full Size SDXC Card 128GB', 'Built to last, Samsung&apos;s PRO Plus offers extreme performance in a variety of capacities, with robust reliability making this SD card the ideal choice for photographers and other digital media professionals. Use it across your work devices, and continue relying on the #1 brand name in flash memory.', 310000, 'SamsungPro.webp', 3, 0);

INSERT INTO products (product_name, product_description, product_price, product_img, category_id, sold) VALUES
('Scale 1:43 Ferrari 250 Gt California Spyder', 'Rare Scale 1:43 Ferrari 250 Gt California Spyder Black \n Made of high-quality materials, this scale model is durable, meant for collectors not a toy.', 500000, 'F250GT_display.jpg', 4, 0);
INSERT INTO products (product_name, product_description, product_price, product_img, category_id, sold) VALUES
('Scale 1:43 Zastava 750', 'Rare Scale 1:43 Zastava White \n Made of high-quality materials, this scale model is durable, meant for collectors not a toy.', 500000, 'Z750_display.jpg', 4, 0);

INSERT INTO products (product_name, product_description, product_price, product_img, category_id, sold) VALUES
('Vinta Backpack - Green Leather', 'The VINTA S-Series Travel Camera Backpack injects functional style into your photography shoots with its sleek and versatile design. The pack fits a full-frame DSLR camera, along with three to five lenses, and up to a 15" laptop. Customizable dividers and a FIELD PACK provide handy organization, and can be removed to convert the pack into a travel bag if desired. Stylish and durable, the VINTA S-Series Travel Camera Backpack is a smart choice for urban and travel use.', 3900000, 'Vinta_backpack_display.jpg', 5, 0);
INSERT INTO products (product_name, product_description, product_price, product_img, category_id, sold) VALUES
('Everyday Backpack - Black', 'A visually and functionally simpler version of Peak Design iconic Everyday Backpack, the Everyday Backpack Zip&apos;s ultra-clean aesthetic makes it ideal for discreet urban everyday or photo carry 100% recycled 400D weatherproof shell keeps everything safe. Expandable side pockets for water bottles or tripod. 2 stowable cinch straps let you carry more externally. All-custom hardware, minimal dangling straps.', 3000000, 'Everyday_backpack.webp', 5, 0);
INSERT INTO products (product_name, product_description, product_price, product_img, category_id, sold) VALUES
('Bodypack Paris 2.0 High', 'Gear up with Bodypack PARIS 2.0 HIGH! This is a laptop backpack that is equipped with a padded 15 inch laptop sleeve so you can bring your laptop securely with ease. It also has multiple additional sockets an compartments to put your stationary, charger, or other necessities to support your productivity. It has a polished look to be worn daily, giving a mix of functionality and style.', 600000, 'Bodypack_Paris.webp', 5, 0);

INSERT INTO users (username, password, email, first_name, last_name, address, phone_number, purchase) VALUES
('john_doe', md5('password1'), 'john.doe@email.com', 'John', 'Doe', '123 Main St', '1234567890', 0);
INSERT INTO users (username, password, email, first_name, last_name, address, phone_number, purchase) VALUES
('jane_smith', md5('password2'), 'jane.smith@email.com', 'Jane', 'Smith', '456 Oak St', '9876543210', 0);
INSERT INTO users (username, password, email, first_name, last_name, address, phone_number, purchase) VALUES
('alice_wonder', md5('password3'), 'alice.wonder@email.com', 'Alice', 'Wonder', '789 Elm St', '2345678901', 0);
INSERT INTO users (username, password, email, first_name, last_name, address, phone_number, purchase) VALUES
('bob_marley', md5('password4'), 'bob.marley@email.com', 'Bob', 'Marley', '101 Pine St', '8765432109', 0);
INSERT INTO users (username, password, email, first_name, last_name, address, phone_number, purchase) VALUES
('charlie_brown', md5('password5'), 'charlie.brown@email.com', 'Charlie', 'Brown', '202 Walnut St', '3456789012', 0);
INSERT INTO users (username, password, email, first_name, last_name, address, phone_number, purchase) VALUES
('diana_prince', md5('password6'), 'diana.prince@email.com', 'Diana', 'Prince', '303 Oak St', '6789012345', 0);
INSERT INTO users (username, password, email, first_name, last_name, address, phone_number, purchase) VALUES
('edward_cullen', md5('password7'), 'edward.cullen@email.com', 'Edward', 'Cullen', '404 Cedar St', '1234567890', 0);
INSERT INTO users (username, password, email, first_name, last_name, address, phone_number, purchase) VALUES
('fiona_apple', md5('password8'), 'fiona.apple@email.com', 'Fiona', 'Apple', '505 Maple St', '9876543210', 0);
INSERT INTO users (username, password, email, first_name, last_name, address, phone_number, purchase) VALUES
('george_lucas', md5('password9'), 'george.lucas@email.com', 'George', 'Lucas', '606 Birch St', '2345678901', 0);
INSERT INTO users (username, password, email, first_name, last_name, address, phone_number, purchase) VALUES
('harry_potter', md5('password10'), 'harry.potter@email.com', 'Harry', 'Potter', '707 Pine St', '8765432109', 0);
INSERT INTO users (username, password, email, first_name, last_name, address, phone_number, purchase) VALUES
('irene_adler', md5('password11'), 'irene.adler@email.com', 'Irene', 'Adler', '808 Elm St', '3456789012', 0);
INSERT INTO users (username, password, email, first_name, last_name, address, phone_number, purchase) VALUES
('james_bond', md5('password12'), 'james.bond@email.com', 'James', 'Bond', '909 Walnut St', '6789012345', 0);
