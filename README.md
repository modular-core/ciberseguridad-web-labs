# Web Application Security – Laboratory

Official repository of the practical laboratory accompanying the book **"Web Application Security"**.

This project provides an educational environment built with **PHP + MySQL**, designed to help understand common web application vulnerabilities from a defensive perspective.

---

## ⚙ Requirements

- PHP 7.x or higher
- MySQL / MariaDB
- Local server environment (XAMPP, MAMP, WAMP, or similar)

---

## 🚀 Installation

1. Clone or download the repository.
2. Copy the `cybersecurity` folder into the root directory of your local server.
3. Create a MySQL database named:

   `security_db`

   You may access phpMyAdmin at:
   http://localhost/phpmyadmin/

   Or use the command line:

   `CREATE DATABASE security_db;`

4. Import the file:

   `cybersecurity/security_db.sql`

   into the created database.

5. Access the application from your browser:

   http://localhost/cybersecurity/login.php

---

## ⚠ Important Notice

This laboratory is intended strictly for educational purposes.
The vulnerable implementations included are part of the learning and defensive analysis process.

Do not use in production environments.

---

## 📚 Relation to the Book

This repository accompanies the practical exercises described in the book, allowing readers to replicate scenarios and understand vulnerabilities from a technical and responsible perspective.

---

## 🔒 Security Note

The credentials included in this project are strictly demonstrative and do not correspond to real environments.
