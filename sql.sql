CREATE DATABASE tokookyu;

USE tokookyu;

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    price VARCHAR(50) NOT NULL,
    image VARCHAR(255) NOT NULL
);

-- Contoh data produk
INSERT INTO products (name, price, image) VALUES 
('Kopi Mactha lalu', 'RP. 20.000', 'kopi.png'),
('Paket Vegetarian', 'RP. 20.000', 'vegetarian.png'),
('Paket Nasi', 'RP. 20.000', 'nasi.png');
