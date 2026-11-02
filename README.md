# Gopika Sadanand - Portfolio Website with PHP Authentication

A personal portfolio website and software engineering showcase for **Gopika Sadanand**, featuring a secure **PHP Authentication & Login System** prior to displaying the portfolio.

---

## 🔐 Authentication & Security Features

- **Mandatory Login Gate:** Visiting `index.php` automatically redirects unauthenticated visitors to `login.php`.
- **Pre-seeded Accounts (Ready to use):**
  - **Username:** `gopika` | **Password:** `gopika123` *(Full Name: Gopika Sadanand)*
  - **Username:** `admin` | **Password:** `password123` *(Full Name: Administrator)*
  - *Clickable demo badges are provided on the login page for instant 1-click auto-filling!*
- **User Registration:** Visitors can create a new account via `register.php`. Passwords are encrypted using PHP `password_hash()` (Bcrypt).
- **Session Management:** Secure session cookies (`PHPSESSID`) track authenticated sessions.
- **Top Authenticated Bar:** Shows the active user (`Authenticated: Gopika Sadanand (@gopika)`) with an instant **Logout** button.
- **Logout:** `logout.php` clears the session, invalidates cookies, and redirects safely back to `login.php`.

---

## 🗄️ Database Options

1. **SQLite (Default - Zero Configuration):**
   - Automatically initializes `data/users.db` and the `users` table on first run.
   - Requires no MySQL setup, no XAMPP Apache configuration, and works immediately.
2. **MySQL / MariaDB (Optional for XAMPP phpMyAdmin):**
   - A `database.sql` script is included in the project directory.
   - To use MySQL:
     1. Import `database.sql` into phpMyAdmin (creates `gopika_portfolio` database & `users` table).
     2. In `config.php`, change `$DB_TYPE = 'sqlite';` to `$DB_TYPE = 'mysql';`.

---

## 🚀 How to Run

### Method 1: Instant 1-Click (Recommended)
Simply double-click:
👉 `DOUBLE-CLICK-TO-OPEN.bat` or `start-php-server.bat`  
It will automatically detect PHP (via PATH or `C:\xampp\php\php.exe`), start the server, and open `http://localhost:8000` in your browser.

### Method 2: Manual PHP Command
In PowerShell or Command Prompt inside this folder:
```powershell
"C:\xampp\php\php.exe" -S localhost:8000
```
(or simply `php -S localhost:8000` if PHP is in your system PATH)  
Then open your browser to `http://localhost:8000`.

### Method 3: In XAMPP `htdocs`
Copy this folder into `C:\xampp\htdocs\Gopikasadanand`  
Start Apache in the XAMPP Control Panel, then visit:  
`http://localhost/Gopikasadanand/`

---

## 📁 Project Structure

```text
Gopikasadanand/
├── index.php             # Protected portfolio entry point (checks session)
├── login.php             # Modern login UI + PHP credential validation
├── register.php          # Account creation UI + secure bcrypt hashing
├── logout.php            # Session destruction and redirect
├── config.php            # Database connections (SQLite auto-init & MySQL)
├── database.sql          # MySQL schema & sample seed data for phpMyAdmin
├── start-php-server.bat  # 1-Click launcher running PHP server & opening browser
├── DOUBLE-CLICK-TO-OPEN.bat # Universal 1-click launcher
├── css/
│   ├── style.css         # Main portfolio design system (Dark/Light mode)
│   └── auth.css          # Styling for Login & Registration pages
├── js/
│   └── main.js           # Interactive typing, category filtering, counters
├── data/                 # SQLite database & session storage (auto-created)
└── README.md             # Documentation
```
