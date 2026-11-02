<?php
require_once __DIR__ . '/config.php';

// If already logged in, redirect straight to the portfolio
if (isAuthenticated()) {
    header('Location: index.php');
    exit;
}

$error = '';
$success = '';

// Check if redirected from logout or registration
if (isset($_GET['logout'])) {
    $success = 'You have been successfully logged out.';
} elseif (isset($_GET['registered'])) {
    $success = 'Account created successfully! Please sign in below.';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $loginInput = trim($_POST['username'] ?? '');
    $password   = trim($_POST['password'] ?? '');

    if (empty($loginInput) || empty($password)) {
        $error = 'Please enter both username/email and password.';
    } else {
        try {
            $pdo = getDBConnection();
            $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :input OR email = :input LIMIT 1");
            $stmt->execute(['input' => $loginInput]);
            $user = $stmt->fetch();

            if ($user && password_verify($password, $user['password'])) {
                // Authentication successful
                $_SESSION['user_id']   = $user['id'];
                $_SESSION['username']  = $user['username'];
                $_SESSION['full_name'] = $user['full_name'];
                $_SESSION['email']     = $user['email'];
                $_SESSION['logged_in'] = true;

                header('Location: index.php');
                exit;
            } else {
                $error = 'Invalid credentials. Please verify your username and password.';
            }
        } catch (Exception $e) {
            $error = 'An error occurred during authentication: ' . htmlspecialchars($e->getMessage());
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login | Gopika Sadanand Portfolio</title>
  
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
        <h1 class="auth-title">Welcome Back</h1>
        <p class="auth-subtitle">Sign in to access Gopika Sadanand's personal portfolio & software engineering showcase.</p>
      </div>

      <!-- Quick Demo Credentials Box for Easy Evaluation -->
      <div class="demo-credentials-box">
        <div class="demo-title">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
          <span>Demo Credentials (Click to auto-fill):</span>
        </div>
        <div class="demo-items">
          <span class="demo-pill" onclick="fillCreds('gopika', 'gopika123')">👤 gopika / gopika123</span>
          <span class="demo-pill" onclick="fillCreds('admin', 'password123')">🔑 admin / password123</span>
        </div>
      </div>

      <!-- Alert Messages -->
      <?php if (!empty($error)): ?>
        <div class="auth-alert auth-alert-error">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
          <span><?= htmlspecialchars($error) ?></span>
        </div>
      <?php endif; ?>

      <?php if (!empty($success)): ?>
        <div class="auth-alert auth-alert-success">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg>
          <span><?= htmlspecialchars($success) ?></span>
        </div>
      <?php endif; ?>

      <!-- Login Form -->
      <form action="login.php" method="POST" class="auth-form" novalidate>
        
        <div class="form-group">
          <label for="username" class="auth-label">Username or Email</label>
          <div class="input-with-icon">
            <span class="input-icon">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
            </span>
            <input type="text" id="username" name="username" class="auth-input" placeholder="e.g. gopika or gopikasadan@gmail.com" required value="<?= htmlspecialchars($_POST['username'] ?? '') ?>">
          </div>
        </div>

        <div class="form-group">
          <label for="password" class="auth-label">Password</label>
          <div class="input-with-icon">
            <span class="input-icon">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
            </span>
            <input type="password" id="password" name="password" class="auth-input" placeholder="Enter your password" required>
            <button type="button" class="password-toggle-btn" id="toggle-pwd" title="Toggle password visibility">
              <svg class="eye-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
            </button>
          </div>
        </div>

        <button type="submit" class="btn btn-primary btn-block">
          <span>Sign In to Portfolio</span>
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
        </button>
      </form>

      <div class="auth-footer-nav">
        Don't have an account? <a href="register.php">Create Account</a>
      </div>

    </div>
  </div>

  <script>
    // 1-Click Fill Demo Credentials
    function fillCreds(u, p) {
      document.getElementById('username').value = u;
      document.getElementById('password').value = p;
    }

    // Toggle Password Visibility
    const toggleBtn = document.getElementById('toggle-pwd');
    const pwdInput = document.getElementById('password');
    if (toggleBtn && pwdInput) {
      toggleBtn.addEventListener('click', () => {
        const isPassword = pwdInput.type === 'password';
        pwdInput.type = isPassword ? 'text' : 'password';
        toggleBtn.style.color = isPassword ? 'var(--primary)' : 'var(--text-muted)';
      });
    }
  </script>
</body>
</html>
