<?php
/**
 * Application Configuration & Database Setup
 * Gopika Sadanand Portfolio Website
 */

// Configure session storage in project data directory for guaranteed portability
$sessionDir = __DIR__ . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'sessions';
if (!file_exists($sessionDir)) {
    @mkdir($sessionDir, 0777, true);
}
if (is_dir($sessionDir)) {
    @session_save_path($sessionDir);
}

// Start session if not already active
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Database configuration
// By default, uses SQLite so it works instantly with zero setup or MySQL configuration.
// To switch to MySQL (e.g. in XAMPP phpMyAdmin), change $DB_TYPE to 'mysql'.
$DB_TYPE = 'sqlite'; 

// MySQL configuration (used if $DB_TYPE === 'mysql')
$MYSQL_HOST = 'localhost';
$MYSQL_DB   = 'gopika_portfolio';
$MYSQL_USER = 'root';
$MYSQL_PASS = '';

function getDBConnection() {
    global $DB_TYPE, $MYSQL_HOST, $MYSQL_DB, $MYSQL_USER, $MYSQL_PASS;

    try {
        if ($DB_TYPE === 'mysql') {
            $dsn = "mysql:host=$MYSQL_HOST;dbname=$MYSQL_DB;charset=utf8mb4";
            $pdo = new PDO($dsn, $MYSQL_USER, $MYSQL_PASS, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
            return $pdo;
        } else {
            // SQLite connection
            $dataDir = __DIR__ . DIRECTORY_SEPARATOR . 'data';
            if (!file_exists($dataDir)) {
                mkdir($dataDir, 0777, true);
            }
            $dbPath = $dataDir . DIRECTORY_SEPARATOR . 'users.db';
            $pdo = new PDO("sqlite:$dbPath", null, null, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);

            // Initialize SQLite table if it doesn't exist
            $pdo->exec("CREATE TABLE IF NOT EXISTS users (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                username TEXT UNIQUE NOT NULL,
                email TEXT UNIQUE NOT NULL,
                password TEXT NOT NULL,
                full_name TEXT NOT NULL,
                created_at DATETIME DEFAULT CURRENT_TIMESTAMP
            )");

            // Seed default users if empty
            $countStmt = $pdo->query("SELECT COUNT(*) FROM users");
            if ($countStmt->fetchColumn() == 0) {
                $seedUsers = [
                    [
                        'username' => 'gopika',
                        'email' => 'gopikasadan@gmail.com',
                        'password' => password_hash('gopika123', PASSWORD_DEFAULT),
                        'full_name' => 'Gopika Sadanand'
                    ],
                    [
                        'username' => 'admin',
                        'email' => 'admin@example.com',
                        'password' => password_hash('password123', PASSWORD_DEFAULT),
                        'full_name' => 'Administrator'
                    ]
                ];

                $insertStmt = $pdo->prepare("INSERT INTO users (username, email, password, full_name) VALUES (:username, :email, :password, :full_name)");
                foreach ($seedUsers as $u) {
                    $insertStmt->execute($u);
                }
            }

            return $pdo;
        }
    } catch (PDOException $e) {
        die("Database Connection Error: " . htmlspecialchars($e->getMessage()));
    }
}

/**
 * Check if the current user is authenticated
 */
function isAuthenticated() {
    return isset($_SESSION['user_id']) && !empty($_SESSION['username']);
}

/**
 * Require login to access protected pages
 */
function requireLogin() {
    if (!isAuthenticated()) {
        header('Location: login.php');
        exit;
    }
}
?>
