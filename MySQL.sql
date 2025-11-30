CREATE DATABASE IF NOT EXISTS fuchka_muchka CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE fuchka_muchka;

-- 1) users (simple login)
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO users (username, password)
VALUES ('admin', SHA2('admin123', 256)); -- খুব সিকিউর না, পরে চাইলে password_hash এ বদলাবে

-- 2) expense_categories
CREATE TABLE expense_categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    is_active TINYINT(1) NOT NULL DEFAULT 1
);

INSERT INTO expense_categories (name, is_active) VALUES
('Ice Cream', 1),
('Packaging Cost', 1),
('Tissue', 1),

('অন্যান্য', 1),
('ইলেকট্রিক ও পানি', 1),
('কাঁচা বাজার', 1),
('চানাচুর', 1),
('ডিম', 1),
('দই', 1),
('ফল', 1),
('ফুচকা খরচ', 1),
('বোতলের পানি', 1),
('ভাড়া', 1),
('মশলা খরচ', 1),
('মুদি বাজার', 1),
('শেফ খরচ', 1),
('শেফের বেতন', 1),
('হিজড়ার খরচ', 1);


-- 3) expenses
CREATE TABLE expenses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    expense_date DATE NOT NULL,
    category_id INT NOT NULL,
    amount DECIMAL(12,2) NOT NULL,
    note TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (category_id) REFERENCES expense_categories(id)
);

-- 4) sales
CREATE TABLE sales (
    id INT AUTO_INCREMENT PRIMARY KEY,
    sale_date DATE NOT NULL,
    total_amount DECIMAL(12,2) NOT NULL,
    cash_amount DECIMAL(12,2) DEFAULT 0,
    bkash_amount DECIMAL(12,2) DEFAULT 0,
    due_amount DECIMAL(12,2) DEFAULT 0,
    note TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 5) partners
CREATE TABLE partners (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    phone VARCHAR(20),
    share_percent DECIMAL(5,2) NOT NULL,
    starting_capital DECIMAL(12,2) DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO partners (name, phone, share_percent, starting_capital) VALUES
('A.K.M TAMIM RAHMAN', '01xxxxxxxxx', 25, 0),
('FAISUL ISLAM RIAD', '01xxxxxxxxx', 25, 0),
('OMER FARUQUE SIAM', '01xxxxxxxxx', 25, 0);
('SHOHANUR RAHMAN SRABON', '01xxxxxxxxx', 25, 0),


-- 6) partner_withdrawals
CREATE TABLE partner_withdrawals (
    id INT AUTO_INCREMENT PRIMARY KEY,
    partner_id INT NOT NULL,
    withdraw_date DATE NOT NULL,
    amount DECIMAL(12,2) NOT NULL,
    note TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (partner_id) REFERENCES partners(id)
);

-- 7) initial_investments
CREATE TABLE initial_investments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    partner_id INT NOT NULL,
    invest_date DATE NOT NULL,
    amount DECIMAL(12,2) NOT NULL,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (partner_id) REFERENCES partners(id)
);

-- 8) settings (logo path, business name)
CREATE TABLE settings (
    id INT PRIMARY KEY,
    business_name VARCHAR(150) NOT NULL,
    logo_path VARCHAR(255) DEFAULT NULL,
    currency VARCHAR(10) DEFAULT '৳'
);

INSERT INTO settings (id, business_name, logo_path, currency)
VALUES (1, 'ফুচকা মুচকা', 'public/assets/logo.png', '৳');
