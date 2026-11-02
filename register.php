<?php
require_once __DIR__ . '/config.php';

// If already logged in, redirect to portfolio
if (isAuthenticated()) {
    header('Location: index.php');
    exit;
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullName = trim($_POST['full_name'] ?? '');
    $username = trim($_POST['username'] ?? '');
    $email    = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if (empty($fullName) || empty($username) || empty($email) || empty($password)) {
        $error = 'All fields are required. Please fill in all information.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Please provide a valid email address.';
    } elseif (strlen($password) < 6) {
        $error = 'Password must be at least 6 characters long.';
    } else {
        try {
            $pdo = getDBConnection();

            // Check if username or email already taken
            $checkStmt = $pdo->prepare("SELECT id FROM users WHERE username = :u OR email = :e LIMIT 1");
            $checkStmt->execute(['u' => $username, 'e' => $email]);
            if ($checkStmt->fetch()) {
                $error = 'A user with this username or email already exists.';
            } else {
                // Insert new user
                $hash = password_hash($password, PASSWORD_DEFAULT);
                $insertStmt = $pdo->prepare("INSERT INTO users (username, email, password, full_name) VALUES (:u, :e, :p, :f)");
                $insertStmt->execute([
                    'u' => $username,
                    'e' => $email,
                    'p' => $hash,
                    'f' => $fullName
                ]);

                header('Location: login.php?registered=1');
                exit;
            }
        } catch (Exception $e) {
            $error = 'Registration failed: ' . htmlspecialchars($e->getMessage());
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register | Gopika Sadanand Portfolio</title>
  
  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  
  <!-- Stylesheets -->
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/auth.css">
</head>
<body class="auth-body">

  <!-- Ambient Glow Elements -->
  <div class="ambient-glow glow-1"></div>
  <div class="ambient-glow glow-2"></div>

  <div class="auth-container">
    <div class="auth-card glass-panel">
      
      <!-- Card Header -->
      <div class="auth-header">
        <a href="index.php" class="auth-logo">
          <span class="auth-badge">GS</span>
          <span class="logo-text">Gopika<span class="gradient-text">.dev</span></span>
        </a>
        <h1 class="auth-title">Create Account</h1>
        <p class="auth-subtitle">Register to explore Gopika Sadanand's projects, experience, and services.</p>
      </div>

      <!-- Alert Messages -->
      <?php if (!empty($error)): ?>
        <div class="auth-alert auth-alert-error">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
          <span><?= htmlspecialchars($error) ?></span>
        </div>
      <?php endif; ?>

      <!-- Register Form -->
      <form action="register.php" method="POST" class="auth-form" novalidate>
        
        <div class="form-group">
          <label for="full_name" class="auth-label">Full Name</label>
          <div class="input-with-icon">
            <span class="input-icon">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="7" r="4"></circle><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path></svg>
            </span>
            <input type="text" id="full_name" name="full_name" class="auth-input" placeholder="e.g. John Doe" required value="<?= htmlspecialchars($_POST['full_name'] ?? '') ?>">
          </div>
        </div>

        <div class="form-group">
          <label for="username" class="auth-label">Username</label>
          <div class="input-with-icon">
            <span class="input-icon">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line></svg>
            </span>
            <input type="text" id="username" name="username" class="auth-input" placeholder="e.g. johndoe" required value="<?= htmlspecialchars($_POST['username'] ?? '') ?>">
          </div>
        </div>

        <div class="form-group">
          <label for="email" class="auth-label">Email Address</label>
          <div class="input-with-icon">
            <span class="input-icon">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
            </span>
            <input type="email" id="email" name="email" class="auth-input" placeholder="e.g. john@example.com" required value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
          </div>
        </div>

        <div class="form-group">
          <label for="password" class="auth-label">Password (min. 6 characters)</label>
          <div class="input-with-icon">
            <span class="input-icon">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
            </span>
            <input type="password" id="password" name="password" class="auth-input" placeholder="Create a strong password" required>
          </div>
        </div>

        <button type="submit" class="btn btn-primary btn-block">
          <span>Create Account & Continue</span>
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
        </button>
      </form>

      <div class="auth-footer-nav">
        Already have an account? <a href="login.php">Sign In</a>
      </div>

    </div>
  </div>
</body>
</html>
