<?php
require_once __DIR__ . '/config.php';
requireLogin();
?>
<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gopika Sadanand | Software Developer & IT Engineer</title>
  <meta name="description" content="Portfolio of Gopika Sadanand - Software Dev Intern at District Collectorate Idukki, B.Tech in IT. Full-stack web developer specializing in Node.js, MongoDB, Dialogflow & Twilio chatbots, and AI systems.">
  <meta name="keywords" content="Gopika Sadanand, Software Developer, District Collectorate Idukki, VoteAssist Idukki, Node.js, MongoDB, Dialogflow, Twilio, WhatsApp Chatbot, Textoon, Quick Creation, Kerala, Portfolio">
  <meta name="author" content="Gopika Sadanand">
  
  <!-- Open Graph / Meta Social -->
  <meta property="og:title" content="Gopika Sadanand | Software Developer Portfolio">
  <meta property="og:description" content="Detail-oriented professional specializing in Node.js, MongoDB, Dialogflow & Twilio chatbots, and full-stack development.">
  <meta property="og:type" content="website">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/auth.css">
  
  <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'%3E%3Ccircle cx='50' cy='50' r='50' fill='%236366f1'/%3E%3Ctext x='50' y='65' font-size='50' font-family='sans-serif' font-weight='bold' fill='white' text-anchor='middle'%3EGS%3C/text%3E%3C/svg%3E">
</head>
<body>
  <!-- User Authentication Session Bar -->
  <div class="user-auth-bar">
    <div class="user-auth-container">
      <div class="user-badge-left">
        <span class="user-avatar-dot"></span>
        <span>Authenticated: <strong><?= htmlspecialchars($_SESSION['full_name'] ?? $_SESSION['username']) ?></strong> (@<?= htmlspecialchars($_SESSION['username']) ?>)</span>
      </div>
      <div class="user-auth-right">
        <a href="logout.php" class="btn-logout" title="Sign out of portfolio">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
          <span>Logout</span>
        </a>
      </div>
    </div>
  </div>


  <!-- Ambient background glow elements -->
  <div class="ambient-glow glow-1"></div>
  <div class="ambient-glow glow-2"></div>
  <div class="ambient-glow glow-3"></div>

  <!-- =========================================================================
       HEADER / NAVBAR
       ========================================================================= -->
  <header class="header" id="header">
    <nav class="nav container">
      <a href="#hero" class="nav-logo">
        <span class="logo-badge">GS</span>
        <span class="logo-text">Gopika<span class="gradient-text">.dev</span></span>
      </a>

      <div class="nav-menu" id="nav-menu">
        <ul class="nav-list">
          <li class="nav-item"><a href="#hero" class="nav-link active">Home</a></li>
          <li class="nav-item"><a href="#about" class="nav-link">About</a></li>
          <li class="nav-item"><a href="#skills" class="nav-link">Skills</a></li>
          <li class="nav-item"><a href="#experience" class="nav-link">Experience</a></li>
          <li class="nav-item"><a href="#projects" class="nav-link">Projects</a></li>
          <li class="nav-item"><a href="#services" class="nav-link">Services</a></li>
          <li class="nav-item"><a href="#contact" class="nav-link">Contact</a></li>
        </ul>

        <div class="nav-actions-mobile">
          <a href="logout.php" class="btn btn-secondary btn-sm" style="margin-bottom: 8px;">Logout</a>
          <a href="#contact" class="btn btn-primary btn-sm">Get in Touch</a>
        </div>
      </div>

      <div class="nav-right">
        <!-- Logout Button -->
        <a href="logout.php" class="btn-logout nav-logout-btn" style="margin-right: 8px;" title="Logout">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
          <span>Logout</span>
        </a>

        <!-- Dark / Light Theme Toggle -->
        <button id="theme-toggle" class="theme-toggle-btn" aria-label="Toggle light/dark theme" title="Toggle Theme">
          <svg class="sun-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="12" cy="12" r="5"></circle>
            <line x1="12" y1="1" x2="12" y2="3"></line>
            <line x1="12" y1="21" x2="12" y2="23"></line>
            <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line>
            <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line>
            <line x1="1" y1="12" x2="3" y2="12"></line>
            <line x1="21" y1="12" x2="23" y2="12"></line>
            <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line>
            <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line>
          </svg>
          <svg class="moon-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>
          </svg>
        </button>

        <a href="#contact" class="btn btn-primary nav-cta">Let's Connect</a>

        <!-- Mobile Navigation Menu Toggle -->
        <button class="nav-toggle" id="nav-toggle" aria-label="Toggle navigation menu">
          <span class="bar"></span>
          <span class="bar"></span>
          <span class="bar"></span>
        </button>
      </div>
    </nav>
  </header>

  <main>
    <!-- =========================================================================
         1. HERO SECTION
         ========================================================================= -->
    <section class="hero section" id="hero">
      <div class="container hero-container">
        <div class="hero-content">
          <div class="hero-status-pill">
            <span class="status-indicator"></span>
            <span>Software Dev Intern • District Collectorate, Idukki</span>
          </div>

          <h1 class="hero-title">
            Hi, I'm <span class="gradient-text name-highlight">Gopika Sadanand</span><br>
            <span class="typing-container">
              <span class="typing-prefix">I build </span>
              <span id="typing-text" class="typing-text">multilingual chatbots</span>
              <span class="cursor">|</span>
            </span>
          </h1>

          <p class="hero-description">
            Detail-oriented professional with strong organizational skills and a proven ability to enhance team collaboration. Expertise in communication and project coordination with an adaptable mindset and commitment to delivering successful outcomes.
          </p>

          <div class="hero-cta-group">
            <a href="#projects" class="btn btn-primary">
              <span>View Projects</span>
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M7 17L17 7M17 7H7M17 7V17"/></svg>
            </a>
            <a href="#contact" class="btn btn-secondary">
              <span>Contact Me</span>
            </a>
            <a href="https://wa.me/917907931579?text=Hi%20Gopika,%20I%20came%20across%20your%20portfolio!" target="_blank" rel="noopener noreferrer" class="btn btn-ghost" title="Chat on WhatsApp">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
              <span>WhatsApp Me</span>
            </a>
          </div>

          <!-- Social Links -->
          <div class="hero-socials">
            <span class="socials-label">Direct Connect:</span>
            <a href="mailto:gopikasadan@gmail.com" class="social-btn" aria-label="Email Gopika" title="gopikasadan@gmail.com">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
            </a>
            <a href="tel:+917907931579" class="social-btn" aria-label="Phone Call" title="+91 7907931579">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
            </a>
            <a href="https://linkedin.com" target="_blank" rel="noopener noreferrer" class="social-btn" aria-label="LinkedIn Profile">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
            </a>
            <a href="https://github.com" target="_blank" rel="noopener noreferrer" class="social-btn" aria-label="GitHub Profile">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0 0 24 12c0-6.63-5.37-12-12-12z"/></svg>
            </a>
          </div>
        </div>

        <!-- Hero Visual / Floating Tech Card -->
        <div class="hero-visual">
          <div class="hero-card glass-panel">
            <div class="card-topbar">
              <div class="window-dots">
                <span class="dot red"></span>
                <span class="dot yellow"></span>
                <span class="dot green"></span>
              </div>
              <div class="window-title">gopika-profile.json</div>
            </div>
            
            <div class="code-preview">
              <pre><code><span class="c-keyword">const</span> <span class="c-variable">engineer</span> = {
  <span class="c-prop">name</span>: <span class="c-string">"GOPIKA SADANAND"</span>,
  <span class="c-prop">role</span>: <span class="c-string">"Software Dev Intern"</span>,
  <span class="c-prop">org</span>: <span class="c-string">"District Collectorate, Idukki"</span>,
  <span class="c-prop">education</span>: <span class="c-string">"B.Tech in IT"</span>,
  <span class="c-prop">stack</span>: [<span class="c-string">"MongoDB"</span>, <span class="c-string">"Dialogflow"</span>, <span class="c-string">"Twilio"</span>, <span class="c-string">"Node.js"</span>],
  <span class="c-prop">strengths</span>: [<span class="c-string">"Collaboration"</span>, <span class="c-string">"Critical Thinking"</span>, <span class="c-string">"Adaptability"</span>],
  <span class="c-prop">status</span>: <span class="c-accent">"Building VoteAssist Idukki & Civic Tech"</span>
};</code></pre>
            </div>

            <!-- Profile Info Box -->
            <div class="hero-avatar-row">
              <div class="avatar-ring">
                <div class="avatar-placeholder">GS</div>
              </div>
              <div class="avatar-info">
                <h4>Gopika Sadanand</h4>
                <p>Software Developer • B.Tech IT</p>
                <div class="mini-tags">
                  <span>🏛️ District Collectorate, Idukki</span>
                  <span>💬 AI & Chatbots</span>
                </div>
              </div>
            </div>

            <!-- Floating Badges -->
            <div class="floating-badge badge-react">
              <span>🤖 Dialogflow & Twilio</span>
            </div>
            <div class="floating-badge badge-node">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="#339933"><path d="M12 2l10 5.8v11.4L12 25 2 19.2V7.8L12 2z"/></svg>
              <span>Node.js & MongoDB</span>
            </div>
            <div class="floating-badge badge-cloud">
              <span>🌟 Team Collaboration</span>
            </div>
          </div>
        </div>
      </div>

      <!-- Quick Stats Counter -->
      <div class="container hero-stats-container">
        <div class="stats-grid glass-panel">
          <div class="stat-item">
            <span class="stat-number" data-target="3">0</span><span class="stat-plus">+</span>
            <span class="stat-label">Featured Projects</span>
          </div>
          <div class="stat-divider"></div>
          <div class="stat-item">
            <span class="stat-number" data-target="100">0</span><span class="stat-plus">%</span>
            <span class="stat-label">Adaptability & Agility</span>
          </div>
          <div class="stat-divider"></div>
          <div class="stat-item">
            <span class="stat-number" data-target="24">0</span><span class="stat-plus">/7</span>
            <span class="stat-label">Chatbot Uptime Focus</span>
          </div>
          <div class="stat-divider"></div>
          <div class="stat-item">
            <span class="stat-number" data-target="100">0</span><span class="stat-plus">%</span>
            <span class="stat-label">Commitment to Outcomes</span>
          </div>
        </div>
      </div>
    </section>

    <!-- =========================================================================
         2. ABOUT & OBJECTIVES SECTION
         ========================================================================= -->
    <section class="about section" id="about">
      <div class="container">
        <div class="section-header">
          <span class="section-tag">Career Objectives</span>
          <h2 class="section-title">Driven by Purpose, Powered by <span class="gradient-text">Collaboration</span></h2>
          <p class="section-subtitle">Bridging the gap between robust software engineering, public-sector innovation, and exceptional user experiences.</p>
        </div>

        <div class="about-grid">
          <div class="about-text glass-panel">
            <h3>Hello & Welcome!</h3>
            <p>
              I am <strong>Gopika Sadanand</strong>, a detail-oriented professional with strong organizational skills and a proven ability to enhance team collaboration. With expertise in communication and project coordination, I bring an adaptable mindset and an unwavering commitment to delivering successful outcomes.
            </p>
            <p>
              Currently serving as a <strong>Software Dev Intern at the District Collectorate, Idukki</strong>, I spearhead practical, impactful digital initiatives — notably <em>VoteAssist Idukki</em>, a multilingual WhatsApp chatbot built with Node.js, Dialogflow, Twilio, and MySQL to streamline essential citizen election services.
            </p>
            <p>
              Holding a <strong>B.Tech in Information Technology</strong>, my technical repertoire spans modern full-stack development (MongoDB, Node.js, HTML5, CSS3, JavaScript) and cutting-edge AI technologies (NLP, Stable Diffusion, and MiDaS 3D depth estimation).
            </p>

            <div class="about-highlights">
              <div class="highlight-item">
                <span class="check-icon">✓</span>
                <div>
                  <strong>Team Collaboration:</strong> Fostering open communication, cross-functional synergy, and sprint velocity.
                </div>
              </div>
              <div class="highlight-item">
                <span class="check-icon">✓</span>
                <div>
                  <strong>Critical Thinking:</strong> Analytical problem breakdown, architecting reliable chatbot and database workflows.
                </div>
              </div>
              <div class="highlight-item">
                <span class="check-icon">✓</span>
                <div>
                  <strong>Adaptability:</strong> Rapidly mastering emerging stacks — from government APIs and Twilio to VR 3D depth models.
                </div>
              </div>
            </div>

            <div class="about-info-pills">
              <div class="info-pill">
                <span class="pill-label">Name:</span>
                <span class="pill-val">Gopika Sadanand</span>
              </div>
              <div class="info-pill">
                <span class="pill-label">Current Role:</span>
                <span class="pill-val">Software Dev Intern (District Collectorate, Idukki)</span>
              </div>
              <div class="info-pill">
                <span class="pill-label">Education:</span>
                <span class="pill-val">B.Tech in Information Technology</span>
              </div>
              <div class="info-pill">
                <span class="pill-label">Phone:</span>
                <a href="tel:+917907931579" class="pill-val" style="color: var(--primary);">+91 7907931579</a>
              </div>
              <div class="info-pill">
                <span class="pill-label">Email:</span>
                <a href="mailto:gopikasadan@gmail.com" class="pill-val" style="color: var(--primary);">gopikasadan@gmail.com</a>
              </div>
              <div class="info-pill">
                <span class="pill-label">Location:</span>
                <span class="pill-val">Idukki, Kerala, India</span>
              </div>
            </div>
          </div>

          <div class="about-cards-column">
            <div class="feature-card glass-panel">
              <div class="feature-icon">🤝</div>
              <h4>Team Collaboration</h4>
              <p>Active listener and coordinator who strengthens team dynamics, aligns technical goals with stakeholder vision, and ensures clear project milestones.</p>
            </div>
            <div class="feature-card glass-panel">
              <div class="feature-icon">🧠</div>
              <h4>Critical Thinking</h4>
              <p>Tackling complex challenges with structured reasoning — whether debugging webhook concurrency or designing database schemas for thousands of records.</p>
            </div>
            <div class="feature-card glass-panel">
              <div class="feature-icon">⚡</div>
              <h4>High Adaptability</h4>
              <p>Thriving in fast-paced environments by adopting new tools, libraries, and design paradigms to turn evolving project requirements into polished products.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- =========================================================================
         3. SKILLS & EXPERTISE SECTION
         ========================================================================= -->
    <section class="skills section" id="skills">
      <div class="container">
        <div class="section-header">
          <span class="section-tag">Competencies</span>
          <h2 class="section-title">Skills & <span class="gradient-text">Expertise</span></h2>
          <p class="section-subtitle">A balanced fusion of full-stack engineering, conversational AI, and professional project coordination.</p>
        </div>

        <!-- Skill Category Tabs -->
        <div class="skills-filter">
          <button class="skill-tab active" data-category="all">All Skills</button>
          <button class="skill-tab" data-category="backend">Development & DB</button>
          <button class="skill-tab" data-category="ai">AI & Chatbots</button>
          <button class="skill-tab" data-category="soft">Professional & Core</button>
        </div>

        <div class="skills-grid">
          <!-- MongoDB -->
          <div class="skill-card glass-panel" data-cat="backend">
            <div class="skill-header">
              <div class="skill-icon-wrap backend-color">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/></svg>
              </div>
              <div>
                <h4 class="skill-name">MongoDB</h4>
                <span class="skill-level">Proficient • 90%</span>
              </div>
            </div>
            <div class="progress-bar-bg">
              <div class="progress-bar-fill" style="width: 90%;"></div>
            </div>
            <p class="skill-desc">Document-based data modeling, Mongoose schemas, indexing, and aggregation pipelines (implemented in Quick Creation).</p>
          </div>

          <!-- Dialogflow -->
          <div class="skill-card glass-panel" data-cat="ai">
            <div class="skill-header">
              <div class="skill-icon-wrap frontend-color">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="10" rx="2"></rect><circle cx="12" cy="5" r="2"></circle><path d="M12 7v4"></path><line x1="8" y1="16" x2="8" y2="16"></line><line x1="16" y1="16" x2="16" y2="16"></line></svg>
              </div>
              <div>
                <h4 class="skill-name">Dialogflow</h4>
                <span class="skill-level">Advanced • 92%</span>
              </div>
            </div>
            <div class="progress-bar-bg">
              <div class="progress-bar-fill" style="width: 92%;"></div>
            </div>
            <p class="skill-desc">Intent mapping, entity recognition, context management, and webhook fulfillment for conversational AI (VoteAssist Idukki).</p>
          </div>

          <!-- Twilio -->
          <div class="skill-card glass-panel" data-cat="ai">
            <div class="skill-header">
              <div class="skill-icon-wrap tools-color">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
              </div>
              <div>
                <h4 class="skill-name">Twilio</h4>
                <span class="skill-level">Advanced • 88%</span>
              </div>
            </div>
            <div class="progress-bar-bg">
              <div class="progress-bar-fill" style="width: 88%;"></div>
            </div>
            <p class="skill-desc">Twilio WhatsApp Business API integration, webhook endpoints, programmable SMS, and real-time message routing.</p>
          </div>

          <!-- Node.js & Express -->
          <div class="skill-card glass-panel" data-cat="backend">
            <div class="skill-header">
              <div class="skill-icon-wrap backend-color">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2l10 5.8v11.4L12 25 2 19.2V7.8L12 2z"/></svg>
              </div>
              <div>
                <h4 class="skill-name">Node.js & Express</h4>
                <span class="skill-level">Proficient • 88%</span>
              </div>
            </div>
            <div class="progress-bar-bg">
              <div class="progress-bar-fill" style="width: 88%;"></div>
            </div>
            <p class="skill-desc">Asynchronous event loops, RESTful API design, server-side logic, and middleware integrations for scalable apps.</p>
          </div>

          <!-- HTML5, CSS3 & JavaScript -->
          <div class="skill-card glass-panel" data-cat="backend">
            <div class="skill-header">
              <div class="skill-icon-wrap frontend-color">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg>
              </div>
              <div>
                <h4 class="skill-name">HTML5, CSS3 & JavaScript</h4>
                <span class="skill-level">Expert • 94%</span>
              </div>
            </div>
            <div class="progress-bar-bg">
              <div class="progress-bar-fill" style="width: 94%;"></div>
            </div>
            <p class="skill-desc">Responsive layouts, CSS Flexbox & Grid, DOM manipulation, asynchronous JavaScript (ES6+), and modern UI styling.</p>
          </div>

          <!-- MySQL -->
          <div class="skill-card glass-panel" data-cat="backend">
            <div class="skill-header">
              <div class="skill-icon-wrap backend-color">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><ellipse cx="12" cy="5" rx="9" ry="3"></ellipse><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path></svg>
              </div>
              <div>
                <h4 class="skill-name">MySQL & Relational DBs</h4>
                <span class="skill-level">Proficient • 85%</span>
              </div>
            </div>
            <div class="progress-bar-bg">
              <div class="progress-bar-fill" style="width: 85%;"></div>
            </div>
            <p class="skill-desc">Relational schema design, normalization, complex SQL joins, indexing, and high-integrity voter data queries.</p>
          </div>

          <!-- Team Collaboration -->
          <div class="skill-card glass-panel" data-cat="soft">
            <div class="skill-header">
              <div class="skill-icon-wrap tools-color">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
              </div>
              <div>
                <h4 class="skill-name">Team Collaboration</h4>
                <span class="skill-level">Core Strength • 95%</span>
              </div>
            </div>
            <div class="progress-bar-bg">
              <div class="progress-bar-fill" style="width: 95%;"></div>
            </div>
            <p class="skill-desc">Enhancing peer synergy, coordinating cross-disciplinary teams, open code sharing, and sprint participation.</p>
          </div>

          <!-- Critical Thinking -->
          <div class="skill-card glass-panel" data-cat="soft">
            <div class="skill-header">
              <div class="skill-icon-wrap tools-color">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
              </div>
              <div>
                <h4 class="skill-name">Critical Thinking</h4>
                <span class="skill-level">Core Strength • 93%</span>
              </div>
            </div>
            <div class="progress-bar-bg">
              <div class="progress-bar-fill" style="width: 93%;"></div>
            </div>
            <p class="skill-desc">Structured problem evaluation, edge-case anticipation, architectural tradeoffs, and data-backed decision making.</p>
          </div>

          <!-- Adaptability -->
          <div class="skill-card glass-panel" data-cat="soft">
            <div class="skill-header">
              <div class="skill-icon-wrap frontend-color">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="23 4 23 10 17 10"></polyline><polyline points="1 20 1 14 7 14"></polyline><path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"></path></svg>
              </div>
              <div>
                <h4 class="skill-name">Adaptability</h4>
                <span class="skill-level">Core Strength • 96%</span>
              </div>
            </div>
            <div class="progress-bar-bg">
              <div class="progress-bar-fill" style="width: 96%;"></div>
            </div>
            <p class="skill-desc">Quickly transitioning across web stacks, civic tech constraints, AI research pipelines, and shifting project needs.</p>
          </div>

          <!-- AI & Emerging Tech (Textoon Stack) -->
          <div class="skill-card glass-panel" data-cat="ai">
            <div class="skill-header">
              <div class="skill-icon-wrap backend-color">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
              </div>
              <div>
                <h4 class="skill-name">NLP, Stable Diffusion & MiDaS</h4>
                <span class="skill-level">Specialized • 86%</span>
              </div>
            </div>
            <div class="progress-bar-bg">
              <div class="progress-bar-fill" style="width: 86%;"></div>
            </div>
            <p class="skill-desc">Natural Language Processing, generative image diffusion, and MiDaS depth estimation for automated 3D VR scene creation.</p>
          </div>

          <!-- Project Coordination -->
          <div class="skill-card glass-panel" data-cat="soft">
            <div class="skill-header">
              <div class="skill-icon-wrap tools-color">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
              </div>
              <div>
                <h4 class="skill-name">Project Coordination & Communication</h4>
                <span class="skill-level">Core Strength • 92%</span>
              </div>
            </div>
            <div class="progress-bar-bg">
              <div class="progress-bar-fill" style="width: 92%;"></div>
            </div>
            <p class="skill-desc">Requirement synthesis, milestone tracking, documentation, and stakeholder interaction with clarity and discipline.</p>
          </div>

          <!-- Git & Version Control -->
          <div class="skill-card glass-panel" data-cat="backend">
            <div class="skill-header">
              <div class="skill-icon-wrap tools-color">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="18" cy="18" r="3"></circle><circle cx="6" cy="6" r="3"></circle><path d="M13 6h3a2 2 0 0 1 2 2v7"></path><line x1="6" y1="9" x2="6" y2="21"></line></svg>
              </div>
              <div>
                <h4 class="skill-name">Git & GitHub</h4>
                <span class="skill-level">Proficient • 88%</span>
              </div>
            </div>
            <div class="progress-bar-bg">
              <div class="progress-bar-fill" style="width: 88%;"></div>
            </div>
            <p class="skill-desc">Version control, branch management, collaborative pull requests, issue tracking, and repository governance.</p>
          </div>
        </div>

        <!-- Tech Badges Cloud -->
        <div class="tech-chips-tray glass-panel">
          <span class="chips-title">Core Competencies & Stack:</span>
          <div class="chips-list">
            <span class="chip">MongoDB</span>
            <span class="chip">Dialogflow</span>
            <span class="chip">Twilio WhatsApp API</span>
            <span class="chip">Node.js</span>
            <span class="chip">MySQL</span>
            <span class="chip">JavaScript (ES6+)</span>
            <span class="chip">HTML5 & CSS3</span>
            <span class="chip">NLP (Natural Language Processing)</span>
            <span class="chip">Stable Diffusion</span>
            <span class="chip">MiDaS Depth Estimation</span>
            <span class="chip">3D VR Systems</span>
            <span class="chip">Team Collaboration</span>
            <span class="chip">Critical Thinking</span>
            <span class="chip">Adaptability</span>
            <span class="chip">Project Coordination</span>
            <span class="chip">REST APIs</span>
            <span class="chip">Git & GitHub</span>
          </div>
        </div>
      </div>
    </section>

    <!-- =========================================================================
         4. EXPERIENCE & EDUCATION SECTION
         ========================================================================= -->
    <section class="experience section" id="experience">
      <div class="container">
        <div class="section-header">
          <span class="section-tag">Career & Academics</span>
          <h2 class="section-title">Experience & <span class="gradient-text">Education</span></h2>
          <p class="section-subtitle">Real-world software development in public governance backed by solid technical engineering education.</p>
        </div>

        <div class="timeline-container">
          <!-- Timeline Item: Software Dev Intern -->
          <div class="timeline-item">
            <div class="timeline-dot"></div>
            <div class="timeline-date">Current / Ongoing</div>
            <div class="timeline-card glass-panel">
              <div class="timeline-header">
                <div>
                  <h3 class="role-title">Software Dev Intern</h3>
                  <span class="company-name">District Collectorate, Idukki</span>
                </div>
                <span class="job-badge">Public Sector & Civic Tech</span>
              </div>
              <p class="timeline-desc">
                Serving as a Software Development Intern contributing to vital public-sector digital automation and citizen engagement systems in Idukki district.
              </p>
              <ul class="timeline-points">
                <li>Spearheaded development of <strong>VoteAssist Idukki</strong>, an ongoing multilingual WhatsApp chatbot delivering election-related citizen assistance.</li>
                <li>Architected conversational intents using <strong>Dialogflow</strong> and hooked them to the <strong>Twilio WhatsApp API</strong> for seamless real-time messaging.</li>
                <li>Engineered backend voter data retrieval, polling booth locator mechanisms, and BLO (Booth Level Officer) lookups using <strong>Node.js</strong> and <strong>MySQL</strong>.</li>
                <li>Demonstrated high adaptability, critical problem solving, and effective team coordination with administrative officials to align with government protocols and civic standards.</li>
              </ul>
              <div class="timeline-tags">
                <span class="tag">Node.js</span>
                <span class="tag">Dialogflow</span>
                <span class="tag">Twilio API</span>
                <span class="tag">MySQL</span>
                <span class="tag">WhatsApp Bot</span>
                <span class="tag">Civic Tech</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Education Box -->
        <div class="education-block glass-panel">
          <div class="edu-icon">🎓</div>
          <div class="edu-content">
            <h4>Bachelor of Technology (B.Tech) in Information Technology</h4>
            <p class="edu-sub">Core Information Technology & Software Engineering</p>
            <p class="edu-desc">Comprehensive curriculum spanning Data Structures, Database Systems (RDBMS & NoSQL), Web Technologies, Object-Oriented Software Design, Computer Networks, and Artificial Intelligence.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- =========================================================================
         5. PROJECTS SECTION
         ========================================================================= -->
    <section class="projects section" id="projects">
      <div class="container">
        <div class="section-header">
          <span class="section-tag">Featured Work</span>
          <h2 class="section-title">My <span class="gradient-text">Projects</span></h2>
          <p class="section-subtitle">Showcasing innovative web platforms, conversational AI bots, and immersive 3D VR systems.</p>
        </div>

        <!-- Project Filter Buttons -->
        <div class="projects-filter">
          <button class="project-btn active" data-filter="all">All Projects</button>
          <button class="project-btn" data-filter="bot">AI & Chatbots</button>
          <button class="project-btn" data-filter="fullstack">Web Platform</button>
          <button class="project-btn" data-filter="ai-vr">AI & 3D VR</button>
        </div>

        <div class="projects-grid">
          <!-- Project 1: VOTEASSIST IDUKKI -->
          <div class="project-card glass-panel" data-category="bot civic">
            <div class="project-preview preview-voteassist">
              <div class="project-badge">Ongoing • Civic Tech</div>
              <div class="mockup-header">
                <span class="mock-dot"></span><span class="mock-dot"></span><span class="mock-dot"></span>
                <span class="mock-url">api.whatsapp.com/voteassist-idukki</span>
              </div>
              <div class="mockup-content" style="flex-direction: column; justify-content: center; gap: 6px;">
                <div class="mock-chat-bubble left" style="width: 70%;">Voter ID lookup: Search my polling booth</div>
                <div class="mock-chat-bubble right whatsapp" style="width: 75%;">✓ Polling Station #42, BLO Contact: 9876543210</div>
                <div class="mock-chat-bubble left" style="width: 55%;">Multilingual Support: Malayalam / English</div>
              </div>
            </div>
            <div class="project-content">
              <div class="project-tags">
                <span class="tag">Node.js</span>
                <span class="tag">Dialogflow</span>
                <span class="tag">Twilio</span>
                <span class="tag">MySQL</span>
                <span class="tag">WhatsApp API</span>
              </div>
              <h3 class="project-title">VOTEASSIST IDUKKI <span style="font-size: 0.85rem; color: #10b981; font-weight: 600;">(Ongoing)</span></h3>
              <p class="project-desc">
                Developed a multilingual WhatsApp chatbot for election-related services with voter detail retrieval, polling booth locator, and BLO information using Node.js, Dialogflow, Twilio, and MySQL at District Collectorate, Idukki.
              </p>
              <div class="project-links">
                <a href="#contact" class="link-btn primary-link">
                  <span>Inquire / View Case Study</span>
                  <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path><polyline points="15 3 21 3 21 9"></polyline><line x1="10" y1="14" x2="21" y2="3"></line></svg>
                </a>
              </div>
            </div>
          </div>

          <!-- Project 2: TEXTOON -->
          <div class="project-card glass-panel" data-category="ai-vr bot">
            <div class="project-preview preview-textoon">
              <div class="project-badge">AI & 3D VR</div>
              <div class="mockup-header">
                <span class="mock-dot"></span><span class="mock-dot"></span><span class="mock-dot"></span>
                <span class="mock-url">ai.textoon.vr/render</span>
              </div>
              <div class="mockup-content">
                <div class="mock-vr-scene" style="width: 100%;">
                  <span class="mock-vr-badge">🥽 Text → 3D Cartoon VR Scene</span>
                  <span style="font-size: 0.72rem; opacity: 0.8;">NLP + Stable Diffusion + MiDaS Depth</span>
                </div>
              </div>
            </div>
            <div class="project-content">
              <div class="project-tags">
                <span class="tag">NLP</span>
                <span class="tag">Stable Diffusion</span>
                <span class="tag">MiDaS Depth</span>
                <span class="tag">3D VR</span>
                <span class="tag">Python / Node.js</span>
              </div>
              <h3 class="project-title">TEXTOON</h3>
              <p class="project-desc">
                Developed an AI-based system that converts text into immersive cartoon-style 3D VR scenes using NLP, Stable Diffusion, and MiDaS depth estimation for automated 3D content creation.
              </p>
              <div class="project-links">
                <a href="#contact" class="link-btn primary-link">
                  <span>View Project Details</span>
                  <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path><polyline points="15 3 21 3 21 9"></polyline><line x1="10" y1="14" x2="21" y2="3"></line></svg>
                </a>
              </div>
            </div>
          </div>

          <!-- Project 3: QUICK CREATION -->
          <div class="project-card glass-panel" data-category="fullstack">
            <div class="project-preview preview-quickcreation">
              <div class="project-badge">Full Stack Platform</div>
              <div class="mockup-header">
                <span class="mock-dot"></span><span class="mock-dot"></span><span class="mock-dot"></span>
                <span class="mock-url">quickcreation.platform/designers</span>
              </div>
              <div class="mockup-content">
                <div class="mock-designer-cards">
                  <div class="mock-designer-item">
                    <div class="mock-avatar-tiny"></div>
                    <div class="mock-line-bar"></div>
                    <div class="mock-line-bar" style="width: 50%;"></div>
                  </div>
                  <div class="mock-designer-item">
                    <div class="mock-avatar-tiny" style="background: #06b6d4;"></div>
                    <div class="mock-line-bar"></div>
                    <div class="mock-line-bar" style="width: 65%;"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="project-content">
              <div class="project-tags">
                <span class="tag">HTML5</span>
                <span class="tag">CSS3</span>
                <span class="tag">JavaScript</span>
                <span class="tag">Node.js</span>
                <span class="tag">MongoDB</span>
              </div>
              <h3 class="project-title">QUICK CREATION</h3>
              <p class="project-desc">
                Developed a platform connecting student designers with clients for affordable, high-quality design services using HTML, CSS3, JavaScript, Node.js, and MongoDB.
              </p>
              <div class="project-links">
                <a href="#contact" class="link-btn primary-link">
                  <span>Explore Platform</span>
                  <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path><polyline points="15 3 21 3 21 9"></polyline><line x1="10" y1="14" x2="21" y2="3"></line></svg>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- =========================================================================
         6. SERVICES SECTION
         ========================================================================= -->
    <section class="services section" id="services">
      <div class="container">
        <div class="section-header">
          <span class="section-tag">Capabilities</span>
          <h2 class="section-title">Services & <span class="gradient-text">Expertise</span></h2>
          <p class="section-subtitle">Delivering high-performance, well-structured digital solutions tailored to client and public needs.</p>
        </div>

        <div class="services-grid">
          <!-- Service 1: Full Stack Web Development -->
          <div class="service-card glass-panel">
            <div class="service-icon-box">
              <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line><line x1="12" y1="17" x2="12" y2="21"></line></svg>
            </div>
            <h3 class="service-title">Full Stack Web Development</h3>
            <p class="service-desc">
              Building responsive, full-stack web platforms with clean architectures, intuitive user interfaces, and robust server databases.
            </p>
            <ul class="service-features">
              <li>Modern frontend with HTML5, CSS3 & JavaScript</li>
              <li>Scalable Node.js & Express backends</li>
              <li>Database modeling with MongoDB & MySQL</li>
              <li>Two-sided marketplace & portal design (Quick Creation)</li>
            </ul>
            <a href="#contact" class="service-link">Inquire Service →</a>
          </div>

          <!-- Service 2: Conversational AI & WhatsApp Chatbots -->
          <div class="service-card glass-panel">
            <div class="service-icon-box">
              <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
            </div>
            <h3 class="service-title">Conversational AI & WhatsApp Chatbots</h3>
            <p class="service-desc">
              Designing automated, intelligent multi-turn chatbots using Dialogflow and Twilio to solve citizen or customer queries instantly.
            </p>
            <ul class="service-features">
              <li>Twilio WhatsApp Business API integration</li>
              <li>Dialogflow NLP intent matching & entity extraction</li>
              <li>Multilingual interaction design (English, Malayalam)</li>
              <li>Secure database queries & real-time webhook fulfillment</li>
            </ul>
            <a href="#contact" class="service-link">Inquire Service →</a>
          </div>

          <!-- Service 3: AI & 3D Interactive Solutions -->
          <div class="service-card glass-panel">
            <div class="service-icon-box">
              <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
            </div>
            <h3 class="service-title">AI Systems & 3D Content Generation</h3>
            <p class="service-desc">
              Harnessing state-of-the-art NLP, generative diffusion models, and MiDaS computer vision depth estimation for automated 3D content creation.
            </p>
            <ul class="service-features">
              <li>Text-to-3D VR pipeline architecture (Textoon)</li>
              <li>Stable Diffusion model pipelines & prompting</li>
              <li>MiDaS depth estimation & spatial mapping</li>
              <li>Automated digital asset creation workflows</li>
            </ul>
            <a href="#contact" class="service-link">Inquire Service →</a>
          </div>

          <!-- Service 4: Project Coordination & Team Collaboration -->
          <div class="service-card glass-panel">
            <div class="service-icon-box">
              <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
            </div>
            <h3 class="service-title">Project Coordination & Team Collaboration</h3>
            <p class="service-desc">
              Strong organizational ability and clear communication to drive projects from initial requirements gathering to successful, on-time delivery.
            </p>
            <ul class="service-features">
              <li>Cross-functional stakeholder communication</li>
              <li>Critical thinking and root-cause analysis</li>
              <li>Adaptive sprint planning and milestone execution</li>
              <li>Public-sector compliance & documentation</li>
            </ul>
            <a href="#contact" class="service-link">Inquire Service →</a>
          </div>
        </div>
      </div>
    </section>

    <!-- =========================================================================
         7. TESTIMONIALS / COLLABORATION HIGHLIGHTS
         ========================================================================= -->
    <section class="testimonials section">
      <div class="container">
        <div class="section-header">
          <span class="section-tag">Endorsements</span>
          <h2 class="section-title">What Collaborators <span class="gradient-text">Say</span></h2>
        </div>

        <div class="testimonials-grid">
          <div class="testimonial-card glass-panel">
            <div class="stars">★★★★★</div>
            <p class="testimonial-text">
              "Gopika has demonstrated exceptional dedication and technical maturity during her work on VoteAssist Idukki at the District Collectorate. Her ability to coordinate between administrative requirements and technical Dialogflow/Twilio implementations was vital to the project's success."
            </p>
            <div class="client-meta">
              <div class="client-avatar">DC</div>
              <div>
                <strong>Civic Technology Lead</strong>
                <span>District Collectorate, Idukki</span>
              </div>
            </div>
          </div>

          <div class="testimonial-card glass-panel">
            <div class="stars">★★★★★</div>
            <p class="testimonial-text">
              "Gopika stands out for her adaptability and critical thinking. Whether architecting MongoDB databases for Quick Creation or exploring cutting-edge 3D depth estimation in Textoon, she consistently brings high-quality execution and great team spirit."
            </p>
            <div class="client-meta">
              <div class="client-avatar">IT</div>
              <div>
                <strong>Academic & Project Mentor</strong>
                <span>Department of Information Technology</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- =========================================================================
         8. CONTACT US SECTION
         ========================================================================= -->
    <section class="contact section" id="contact">
      <div class="container">
        <div class="section-header">
          <span class="section-tag">Get in Touch</span>
          <h2 class="section-title">Contact <span class="gradient-text">Gopika</span></h2>
          <p class="section-subtitle">Interested in collaborating, hiring, or discussing a new project? Reach out directly or send a message below.</p>
        </div>

        <div class="contact-wrapper">
          <!-- Contact Info Details -->
          <div class="contact-info glass-panel">
            <h3 class="info-title">Contact Information</h3>
            <p class="info-text">
              I am always open to new software development opportunities, project collaborations, and tech inquiries.
            </p>

            <div class="info-items">
              <!-- Phone -->
              <div class="info-item">
                <div class="info-icon">
                  <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                </div>
                <div>
                  <span class="info-label">Phone</span>
                  <a href="tel:+917907931579" class="info-link">+91 7907931579</a>
                </div>
              </div>

              <!-- Email -->
              <div class="info-item">
                <div class="info-icon">
                  <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                </div>
                <div>
                  <span class="info-label">Email</span>
                  <a href="mailto:gopikasadan@gmail.com" class="info-link">gopikasadan@gmail.com</a>
                </div>
              </div>

              <!-- WhatsApp Direct -->
              <div class="info-item">
                <div class="info-icon" style="color: #25d366;">
                  <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                </div>
                <div>
                  <span class="info-label">WhatsApp</span>
                  <a href="https://wa.me/917907931579?text=Hi%20Gopika,%20I%20am%20interested%20in%20connecting!" target="_blank" rel="noopener noreferrer" class="info-link">+91 7907931579 (Chat now)</a>
                </div>
              </div>

              <!-- Location -->
              <div class="info-item">
                <div class="info-icon">
                  <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                </div>
                <div>
                  <span class="info-label">Location</span>
                  <span class="info-val">District Collectorate, Idukki, Kerala, India</span>
                </div>
              </div>
            </div>

            <div class="contact-perks">
              <div class="perk-badge">⚡ Quick response within 24 hours</div>
              <div class="perk-badge">🤝 Open to Full-Time & Project Roles</div>
              <div class="perk-badge">🌟 High Team Collaboration Focus</div>
            </div>
          </div>

          <!-- Contact Form -->
          <div class="contact-form-card glass-panel">
            <form id="contact-form" class="contact-form" novalidate>
              <div class="form-row">
                <div class="form-group">
                  <label for="name" class="form-label">Your Name <span class="required">*</span></label>
                  <input type="text" id="name" name="name" class="form-input" placeholder="e.g. Arun Kumar" required>
                  <span class="error-message" id="name-error"></span>
                </div>

                <div class="form-group">
                  <label for="email" class="form-label">Your Email <span class="required">*</span></label>
                  <input type="email" id="email" name="email" class="form-input" placeholder="e.g. arun@example.com" required>
                  <span class="error-message" id="email-error"></span>
                </div>
              </div>

              <div class="form-row">
                <div class="form-group">
                  <label for="subject" class="form-label">Subject</label>
                  <input type="text" id="subject" name="subject" class="form-input" placeholder="e.g. Collaboration on Chatbot / Web Project">
                </div>

                <div class="form-group">
                  <label for="service-select" class="form-label">Service Needed</label>
                  <select id="service-select" name="service" class="form-input">
                    <option value="general">Select an inquiry type</option>
                    <option value="chatbot">Conversational AI & WhatsApp Chatbots (Dialogflow / Twilio)</option>
                    <option value="fullstack">Full-Stack Web Development (Node.js & MongoDB)</option>
                    <option value="ai-vr">AI & 3D VR Systems (Textoon / Stable Diffusion)</option>
                    <option value="coordination">Project Coordination & Team Collaboration</option>
                    <option value="hiring">Job Opportunity / Internship</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="message" class="form-label">Message <span class="required">*</span></label>
                <textarea id="message" name="message" rows="5" class="form-input form-textarea" placeholder="Hello Gopika, I would like to discuss..." required></textarea>
                <span class="error-message" id="message-error"></span>
              </div>

              <button type="submit" class="btn btn-primary btn-block" id="submit-btn">
                <span class="btn-text">Send Message to Gopika</span>
                <svg class="send-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>
              </button>

              <!-- Form status notifications -->
              <div id="form-feedback" class="form-feedback"></div>
            </form>
          </div>
        </div>
      </div>
    </section>
  </main>

  <!-- =========================================================================
       FOOTER
       ========================================================================= -->
  <footer class="footer">
    <div class="container footer-container">
      <div class="footer-top">
        <div class="footer-brand">
          <a href="#hero" class="nav-logo">
            <span class="logo-badge">GS</span>
            <span class="logo-text">Gopika<span class="gradient-text">.dev</span></span>
          </a>
          <p class="footer-motto">
            Detail-oriented professional with strong organizational skills, proven team collaboration, and a passion for engineering impactful digital and civic solutions.
          </p>
        </div>

        <div class="footer-links-group">
          <div class="footer-col">
            <h5>Navigation</h5>
            <ul>
              <li><a href="#hero">Home</a></li>
              <li><a href="#about">About & Objectives</a></li>
              <li><a href="#skills">Skills & Expertise</a></li>
              <li><a href="#experience">Experience & Education</a></li>
            </ul>
          </div>
          <div class="footer-col">
            <h5>Featured Work</h5>
            <ul>
              <li><a href="#projects">VoteAssist Idukki</a></li>
              <li><a href="#projects">Textoon (AI 3D VR)</a></li>
              <li><a href="#projects">Quick Creation</a></li>
              <li><a href="#services">Services</a></li>
            </ul>
          </div>
          <div class="footer-col">
            <h5>Direct Contact</h5>
            <ul>
              <li><a href="tel:+917907931579">+91 7907931579</a></li>
              <li><a href="mailto:gopikasadan@gmail.com">gopikasadan@gmail.com</a></li>
              <li><a href="https://wa.me/917907931579" target="_blank" rel="noopener noreferrer">WhatsApp</a></li>
              <li><span>Idukki, Kerala, India</span></li>
            </ul>
          </div>
        </div>
      </div>

      <div class="footer-bottom">
        <p>&copy; <span id="current-year"></span> Gopika Sadanand. All rights reserved.</p>
        <div class="footer-bottom-links">
          <a href="#hero">Back to Top ↑</a>
        </div>
      </div>
    </div>
  </footer>

  <!-- Scroll To Top Button -->
  <button id="scroll-top" class="scroll-top-btn" aria-label="Scroll back to top">
    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="18 15 12 9 6 15"></polyline></svg>
  </button>

  <!-- Main JavaScript File -->
  <script src="js/main.js"></script>
</body>
</html>