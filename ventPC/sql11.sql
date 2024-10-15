drop database if exists VentePC;
CREATE DATABASE VentePC;
USE VentePC;


CREATE TABLE Vendeurs (
    idVendeur INT AUTO_INCREMENT PRIMARY KEY,
    mail VARCHAR(100) NOT NULL UNIQUE,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    tel VARCHAR(20),
    pwd VARCHAR(255) NOT NULL
);


CREATE TABLE PC (
    idPC INT AUTO_INCREMENT PRIMARY KEY,
    marque VARCHAR(50) NOT NULL,
    ram VARCHAR(20) NOT NULL,
    stockage VARCHAR(20) NOT NULL,
    prix DECIMAL(10, 2) NOT NULL,
    photo Text, 
    idVendeur INT,
    FOREIGN KEY (idVendeur) REFERENCES Vendeurs(idVendeur)
);

INSERT INTO Vendeurs (mail, nom, prenom, tel, pwd) 
VALUES 
    ('ali@example.com', 'Ali', 'Mohammed', '0123456789', 'motdepasse1'),
    ('abdullah@example.com', 'Abdullah', 'Fatima', '9876543210', 'motdepasse2'),
    ('leila@example.com', 'Ahmed', 'Leila', NULL, 'motdepasse3'), -- le téléphone peut être NULL
    ('omar@example.com', 'Omar', 'Amina', '555-1234', 'motdepasse4');


INSERT INTO PC (marque, ram, stockage, prix, photo, idVendeur) 
VALUES 
    ('HP', '8GB', '500GB', 699.99, 'https://www.techpro.ma/6982-medium_default/pc-portable-hp-15s-eq3000nk-6d6y2ea.jpg', 1),
    ('Dell', '16GB', '1TB', 999.99, 'https://www.ultrapc.ma/25959-large_default/dell-latitude-5480-i5-7300u-16go-256go-ssd.jpg', 1),
    ('Asus', '12GB', '512GB SSD', 1199.99, 'https://www.techpro.ma/5786-medium_default/pc-portable-asus-vivobook-e410ma-ek1437t90nb0q15-m000a0.jpg', 2),
    ('Acer', '8GB', '256GB SSD', 799.99, 'https://www.ultrapc.ma/25747-large_default/acer-aspire-a515-55-i5-1035g1-8g-256gb.jpg', 2),
    ('Lenovo', '16GB', '1TB HDD + 256GB SSD', 1299.99, 'https://www.ultrapc.ma/22906-large_default/lenovo-ideapad-3-15ada05-amd-athlon-a3050u-4gb-1tb-hdd-156.jpg', 3),
    ('HP', '8GB', '500GB', 699.99, 'https://ssl-product-images.www8-hp.com/digmedialib/prodimg/lowres/c08703745.png', 1),
    ('Dell', '16GB', '1TB', 999.99, 'https://accesscomputer.ma/media/cache/resolve/sylius_shop_product_original/5b/ac/d784598023e8d5b15eaf7e2eaef8.png', 1),
    ('Asus', '12GB', '512GB SSD', 1199.99, 'https://duga.ma/4716-large_default/pc-portable-asus-x543-celeron-90nb0ir7-m19070.jpg', 2),
    ('Acer', '8GB', '256GB SSD', 799.99, 'https://www.ultrapc.ma/25771-large_default/acer-extensa-15-ex215-54-i5-1135g7-8g-256gb.jpg', 2),
    ('Lenovo', '16GB', '1TB HDD + 256GB SSD', 1299.99, 'https://www.ultrapc.ma/26928-large_default/lenovo-thinkpad-l13-yoga-i5-10210u-8go-128gb-ssd.jpg', 3),
    ('HP', '8GB', '500GB', 699.99, 'https://perfectdata.ma/wp-content/uploads/2022/06/unnamed-3.jpg', 1),
    ('Dell', '16GB', '1TB', 999.99, 'https://alhorria.ma/wp-content/uploads/2021/01/PC-Portable-DELL-Inspiron-15-3552-N3060.jpg', 1),
    ('Asus', '12GB', '512GB SSD', 1199.99, 'https://www.ultrapc.ma/26604-large_default/asus-vivobook-pro-15-m6500qc-r7-5800h-16gb-512gb-ssd-rtx-3050.jpg', 2),
    ('Acer', '8GB', '256GB SSD', 799.99, 'https://www.composants.ma/wp-content/uploads/2022/04/Acer-Nitro-5-AN515-56-5234.jpg', 2),
    ('Lenovo', '16GB', '1TB HDD + 256GB SSD', 1299.99, 'https://micromad.ma/wp-content/uploads/2022/04/Lenovo-Thinkpad-P14s-Gen-2-yaratech.ma-4.jpg', 3),
    ('HP', '8GB', '500GB', 699.99, 'https://www.euromarits.com/wp-content/uploads/2022/03/27Z73EA-HP-15-dw1001nk-Celeron-N4020-4Go-1To-Win-10-Home.jpg', 1),
    ('Dell', '16GB', '1TB', 999.99, 'https://nextlevelpc.ma/wp-content/uploads/2023/05/DELL20G15_1.webp', 1),
    ('Asus', '12GB', '512GB SSD', 1199.99, 'https://kstechnology.ma/wp-content/uploads/2022/11/asus1-1.png', 2),
    ('Acer', '8GB', '256GB SSD', 799.99, 'https://www.ultrapc.ma/33313-medium_default/acer-aspire-3-a315-510p-306f-intel-core-i3-n3058-go512-go-ssd156.jpg', 2),
    ('Lenovo', '16GB', '1TB HDD + 256GB SSD', 1299.99, 'https://www.techpro.ma/6510-large_default/pc-portable-lenovo-thinkpad-e14-gen-2-intel-20ta00frfe.jpg', 3);
    
    select * from vendeurs;