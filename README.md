📘 README – Fuchka Muchka Restaurant Management System (PHP MVC + MySQL)

A complete restaurant/food stall management system built with pure PHP (custom MVC) and MySQL (XAMPP).
This system is designed for the business “ফুচকা মুচকা” and includes expenses, sales, profit calculation, partner share management, and reports.

🚀 Features
✔ Dashboard Overview

Today’s Sales

Today’s Expense

Today’s Profit

Monthly Profit

Partner-wise Profit Distribution

✔ Expense Management

Add daily expenses

Dynamic categories

Category activation/deactivation

Daily/weekly/monthly expense summaries

✔ Sales Management

Add daily sales

Cash / bKash / Due tracking

View sales history

Date filtering

✔ Partner Management

Add partners with share %

Auto profit distribution

Track withdrawals

Pending balances

Contribution (starting capital) tracking

✔ Reports

Monthly Sales & Expense Summary

Monthly Profit

Expense by Category

Exportable (browser print → PDF)

✔ Technical

Pure PHP MVC (no framework)

Clean folder structure

PDO Database

Easy to customize

Mobile-friendly UI

Logo support for branding

📁 Folder Structure
fuchka_muchka/
├── config.php
├── index.php
├── core/
│   ├── Controller.php
│   ├── Database.php
│   └── Model.php
├── controllers/
│   ├── AuthController.php
│   ├── DashboardController.php
│   ├── ExpenseController.php
│   ├── SalesController.php
│   ├── PartnerController.php
│   └── ReportController.php
├── models/
│   ├── User.php
│   ├── Category.php
│   ├── Expense.php
│   ├── Sale.php
│   ├── Partner.php
│   └── Report.php
├── views/
│   ├── layout.php
│   ├── auth/login.php
│   ├── dashboard/index.php
│   ├── expenses/index.php
│   ├── sales/index.php
│   ├── partners/index.php
│   └── reports/monthly.php
└── public/
    ├── css/style.css
    └── assets/logo.png

🛠 Requirements

PHP ≥ 7.4

XAMPP (Apache + MySQL)

phpMyAdmin

Browser (Chrome recommended)

🏗 Installation Instructions
1️⃣ Clone or Copy the Project

Place folder into:

C:\xampp\htdocs\fuchka_muchka\

2️⃣ Create Database

Open:
http://localhost/phpmyadmin

Create DB:

CREATE DATABASE fuchka_muchka;


Import the provided SQL (tables + demo data).

3️⃣ Configure Database

Open config.php:

DB_USER = 'root'
DB_PASS = ''
DB_NAME = 'fuchka_muchka'

4️⃣ Run the App

Open browser:

http://localhost/fuchka_muchka/

5️⃣ Login

Default:

Username: admin
Password: admin123

🎨 Logo Setup

Place your circular logo in:

public/assets/logo.png


System will automatically load it in the sidebar + future PDFs.

✍ Adding Categories

To add new expense categories:

Option 1 — Through phpMyAdmin
INSERT INTO expense_categories (name, is_active)
VALUES ('Your New Category', 1);

Option 2 — Future UI (coming module)

Admin will add categories directly from web panel.

🤝 Partners Setup

Partners stored in DB:

partners (name, phone, share_percent, starting_capital)


You can edit them in phpMyAdmin or using update queries.

📊 Reports

Go to:

Menu → Monthly Report


You can print it as PDF using browser print (Ctrl+P → Save as PDF).

Full automatic PDF generation with Dompdf can be added later.

🔐 Security Notes

Passwords hashed using SHA256

Sessions protected

SQL uses prepared statements

📌 Roadmap (Optional Future Upgrades)

Full PDF generator (Dompdf)

REST API

Multi-user roles (Admin / Manager)

Dark mode

Charts (Bar/Pie)

Excel export

Backup module

📞 Support

If you want new features, improvements, bug fixes or UI redesign —
just ask anytime.
This system is 100% expandable.
