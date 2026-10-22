<div align="center">

# 🌟 A.A. Fazal Muhammad — University Portfolio & Project Showcase

[![PHP Version](https://img.shields.io/badge/PHP-8.x-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://www.php.net/)
[![Bootstrap](https://img.shields.io/badge/Bootstrap-5.3.3-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white)](https://getbootstrap.com/)
[![MySQL](https://img.shields.io/badge/MySQL-8.0-4479A1?style=for-the-badge&logo=mysql&logoColor=white)](https://www.mysql.com/)
[![JavaScript](https://img.shields.io/badge/JavaScript-ES6+-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black)](https://developer.mozilla.org/)
[![BitHack 2026](https://img.shields.io/badge/BitHack_2026-Runner--Up_🏆-F59E0B?style=for-the-badge&logo=google-cloud&logoColor=black)](#-achievements--honors)
[![License](https://img.shields.io/badge/License-MIT-blue?style=for-the-badge)](LICENSE)

<p align="center">
  <strong>Personal Academic Portfolio & Innovation Showcase</strong><br>
  Department of ICT &bull; Faculty of Humanities and Social Sciences &bull; University of Sri Jayewardenepura (USJ)
</p>

[Explore Projects](#-featured-projects) &bull;
[Local Setup](#-installation--local-setup) &bull;
[Architecture](#-directory--architecture-overview) &bull;
[Contact Me](#-connect--author)

---

</div>

## 📌 Overview

This repository contains the dynamic, responsive personal portfolio website of **A.A. Fazal Muhammad**, built as part of the **Diploma in Information Technology (DIT)** curriculum at the **University of Sri Jayewardenepura**.

The portfolio demonstrates proficiency across full-stack web technologies, modern responsive interface engineering, client-side dynamic filtering, database security with prepared statements, and mobile innovation.

---

## 🏆 Achievements & Honors

### 🥇 Runner-Up &mdash; BitHack 2026 Inter-Campus Hackathon
* **Host Institution:** Eastern University, Sri Lanka (EUSL) &mdash; Trincomalee Campus
* **Awarded Project:** **Core Rider** (On-Demand Micro-Mobility & Campus Ride-Pooling)
* **Distinction:** Recognized as the **Runner-Up** among nationwide university teams for developing an innovative mobile transit solution solving commuter congestion and transit safety through real-time GPS telemetry and smart passenger pooling.

---

## 🚀 Featured Projects

<table>
  <tr>
    <td width="33.3%" valign="top">
      <h3 align="center">🏍️ Core Rider</h3>
      <p align="center">
        <img src="https://img.shields.io/badge/Award-Runner--Up%20%40%20BitHack%20'26-F59E0B?style=flat-square&logo=trophy" alt="Runner-Up">
        <img src="https://img.shields.io/badge/Platform-Mobile%20App-0284C7?style=flat-square&logo=flutter" alt="Mobile App">
      </p>
      <p>
        On-demand micro-mobility and campus ride-pooling mobile application built to solve commuter transit bottlenecks with real-time GPS telemetry, peer ride matching, automated fare estimation, and emergency safety features.
      </p>
      <p><strong>Tech Stack:</strong> <code>Flutter (Dart)</code>, <code>Firebase</code>, <code>Node.js</code>, <code>Google Maps Platform API</code></p>
    </td>
    <td width="33.3%" valign="top">
      <h3 align="center">🌏 Lanka Travellers</h3>
      <p align="center">
        <img src="https://img.shields.io/badge/Platform-Web%20Platform-059669?style=flat-square&logo=google-chrome" alt="Web Platform">
        <img src="https://img.shields.io/badge/Stack-Vanilla%20JS%20%7C%20CSS3-F7DF1E?style=flat-square" alt="Tech">
      </p>
      <p>
        Modern tourism and travel agency web platform built with semantic HTML5, modern CSS3, and vanilla JavaScript. Features dynamic URL-based package pre-selection, touch-optimized mobile navigation drawer, interactive FAQ accordions, and automated dark mode adaptation.
      </p>
      <p><strong>Tech Stack:</strong> <code>HTML5</code>, <code>CSS3 Grid/Flexbox</code>, <code>Vanilla JS (ES6+)</code>, <code>Dark Mode</code></p>
    </td>
    <td width="33.3%" valign="top">
      <h3 align="center">💻 My Portfolio</h3>
      <p align="center">
        <img src="https://img.shields.io/badge/Type-University%20Portfolio-2563EB?style=flat-square&logo=php" alt="Web Dev">
        <img src="https://img.shields.io/badge/Stack-PHP%20%7C%20Bootstrap-7952B3?style=flat-square" alt="Tech">
      </p>
      <p>
        A dynamic personal portfolio website built with modular PHP templates, Bootstrap 5 UI framework, custom CSS, client-side dynamic JavaScript filtering with zero page reloads, and a secure backend contact processing system.
      </p>
      <p><strong>Tech Stack:</strong> <code>PHP 8+</code>, <code>Bootstrap 5.3.3</code>, <code>MySQL</code>, <code>JavaScript</code>, <code>CSS3</code></p>
    </td>
  </tr>
</table>

---

## ✨ Key Technical Capabilities

* 🧩 **Modular PHP Architecture:** Reusable template components (`includes/header.php`, `includes/footer.php`, `includes/db.php`) providing consistent layout rendering and DRY code principles.
* ⚡ **Client-Side Dynamic Filtering:** Instant project category filtering (Vanilla JavaScript DOM manipulation) with animated transitions and live result counters without page reloads.
* 🛡️ **Defensive Security Practices:**
  * Strict `POST` method enforcement.
  * Input sanitization with `htmlspecialchars()` preventing Cross-Site Scripting (XSS).
  * Robust email format validation using `filter_var(..., FILTER_VALIDATE_EMAIL)`.
  * SQL Injection protection through **MySQLi prepared statements** with bound parameters.
  * Dual-layer logging (relational MySQL database with backup `messages.txt` logging).
* 📊 **Dedicated Message Inbox Viewer:** Built-in administration viewer (`view-messages.php`) displaying submissions in an interactive dark-themed Bootstrap table.

---

## 🛠️ Technology Stack

| Domain | Technologies & Libraries |
| :--- | :--- |
| **Frontend** | HTML5, CSS3, JavaScript (ES6+), Bootstrap 5.3.3, Font Awesome 6.5.1, Google Fonts (Inter & Outfit) |
| **Backend** | PHP 8.x (OOP & Procedural Scripting, MySQLi, PDO ready) |
| **Database** | MySQL / MariaDB (Relational design, 3NF schema, utf8mb4 character set) |
| **Mobile & Interop** | Flutter, Dart, Firebase Authentication, Cloud Firestore, Node.js API Service |
| **Tooling & Dev** | XAMPP, VS Code, Git, GitHub, phpMyAdmin, Cisco Packet Tracer |

---

## 📁 Directory & Architecture Overview

```text
j pura project/
│
├── css/
│   └── style.css            # Custom CSS styles, color tokens, animations & award badges
│
├── js/
│   └── main.js              # Project card dynamic filtering, navbar sticky effects & animations
│
├── images/
│   └── profile.jpg          # Profile photo for hero and about sections
│
├── includes/
│   ├── db.php               # MySQLi database connection script (portfolio_db)
│   ├── header.php           # Common HTML head, navigation bar & Bootstrap 5 CDN
│   └── footer.php           # Common footer, social links, attribution & scripts
│
├── index.php                # Home page (Hero banner, BitHack spotlight, Core competencies)
├── about.php                # About Me (Bio, USJ academic profile, technical skills, honors)
├── projects.php             # Projects showcase with dynamic filter buttons & detail modals
├── contact.php              # Responsive Bootstrap contact form with status alert handling
├── process-form.php         # Secure backend handler validating inputs & saving to MySQL/logs
├── view-messages.php        # Admin message viewer interface with responsive data table
├── database.sql             # SQL schema script to initialize portfolio_db & messages table
├── messages.txt             # Local message backup log file
└── README.md                # Comprehensive project documentation
```

---

## 🚀 Installation & Local Setup

### Prerequisites
* [XAMPP](https://www.apachefriends.org/) (Apache & MySQL) or any PHP 8+ web server.
* Web browser (Google Chrome, Microsoft Edge, Firefox).
* [Git](https://git-scm.com/) installed on your system.

### Step 1: Clone the Repository
```bash
git clone https://github.com/fazalmuhammad-ops/My-Portfolio-.git "C:/xampp/htdocs/j pura project"
cd "C:/xampp/htdocs/j pura project"
```

### Step 2: Database Setup
1. Launch **XAMPP Control Panel** and start **Apache** and **MySQL**.
2. Open **phpMyAdmin** at `http://localhost/phpmyadmin/`.
3. Import the included [`database.sql`](database.sql) file:
   * Click **Import** in the top navigation bar.
   * Choose `database.sql` from the project root and click **Import**.
   * *(Alternatively, run the SQL script inside the SQL tab)*.

### Step 3: Run the Website
Open your browser and navigate to:
```text
http://localhost/j pura project/
```
*(or `http://localhost/j%20pura%20project/index.php`)*

To view received contact form inquiries:
```text
http://localhost/j pura project/view-messages.php
```

---

## 📬 Connect & Author

**A.A. Fazal Muhammad**  
*Diploma in Information Technology Student*  
Department of ICT, Faculty of Humanities and Social Sciences  
University of Sri Jayewardenepura, Gangodawila, Nugegoda, Sri Lanka

* 🌐 **GitHub:** [@fazalmuhammad-ops](https://github.com/fazalmuhammad-ops)
* 📧 **Email:** [fazalaamuhammad@gmail.com](mailto:fazalaamuhammad@gmail.com)
* 📱 **Phone / WhatsApp:** +94 75 149 2616

---

<div align="center">
  <sub>&copy; 2026 A.A. Fazal Muhammad. Crafted with care for University of Sri Jayewardenepura coursework.</sub>
</div>
