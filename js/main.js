/**
 * Gopika Sadanand - Portfolio Main JavaScript
 * Handles theme switching, mobile drawer navigation, dynamic typing,
 * category filtering, stats counter, form validation, and smooth scroll.
 */

document.addEventListener('DOMContentLoaded', () => {
  'use strict';

  // -------------------------------------------------------------------------
  // 1. Theme Switcher (Dark / Light Mode)
  // -------------------------------------------------------------------------
  const themeToggleBtn = document.getElementById('theme-toggle');
  const htmlRoot = document.documentElement;

  // Retrieve saved theme or system preference
  const savedTheme = localStorage.getItem('theme');
  const systemPrefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
  const initialTheme = savedTheme || (systemPrefersDark ? 'dark' : 'light');

  setTheme(initialTheme);

  if (themeToggleBtn) {
    themeToggleBtn.addEventListener('click', () => {
      const currentTheme = htmlRoot.getAttribute('data-theme');
      const targetTheme = currentTheme === 'dark' ? 'light' : 'dark';
      setTheme(targetTheme);
    });
  }

  function setTheme(theme) {
    htmlRoot.setAttribute('data-theme', theme);
    localStorage.setItem('theme', theme);
  }

  // -------------------------------------------------------------------------
  // 2. Mobile Navigation Menu
  // -------------------------------------------------------------------------
  const navToggle = document.getElementById('nav-toggle');
  const navMenu = document.getElementById('nav-menu');
  const navLinks = document.querySelectorAll('.nav-link');

  if (navToggle && navMenu) {
    navToggle.addEventListener('click', () => {
      const isOpen = navMenu.classList.toggle('open');
      navToggle.classList.toggle('open');
      navToggle.setAttribute('aria-expanded', isOpen);
    });

    // Close mobile menu when a nav link is clicked
    navLinks.forEach(link => {
      link.addEventListener('click', () => {
        navMenu.classList.remove('open');
        navToggle.classList.remove('open');
        navToggle.setAttribute('aria-expanded', 'false');
      });
    });

    // Close when clicking outside menu
    document.addEventListener('click', (e) => {
      if (!navMenu.contains(e.target) && !navToggle.contains(e.target)) {
        navMenu.classList.remove('open');
        navToggle.classList.remove('open');
        navToggle.setAttribute('aria-expanded', 'false');
      }
    });
  }

  // -------------------------------------------------------------------------
  // 3. Dynamic Typing Effect (Hero Subtitle)
  // -------------------------------------------------------------------------
  const typingElement = document.getElementById('typing-text');
  if (typingElement) {
    const words = [
      'multilingual chatbots',
      'full-stack web apps',
      'AI & 3D VR experiences',
      'Dialogflow & Twilio solutions',
      'scalable MongoDB & Node.js systems'
    ];
    let wordIndex = 0;
    let charIndex = 0;
    let isDeleting = false;
    let typingSpeed = 100;

    function type() {
      const currentWord = words[wordIndex];

      if (isDeleting) {
        typingElement.textContent = currentWord.substring(0, charIndex - 1);
        charIndex--;
        typingSpeed = 50;
      } else {
        typingElement.textContent = currentWord.substring(0, charIndex + 1);
        charIndex++;
        typingSpeed = 100;
      }

      if (!isDeleting && charIndex === currentWord.length) {
        // Pause at the end of the word
        typingSpeed = 2000;
        isDeleting = true;
      } else if (isDeleting && charIndex === 0) {
        isDeleting = false;
        wordIndex = (wordIndex + 1) % words.length;
        typingSpeed = 400;
      }

      setTimeout(type, typingSpeed);
    }

    type();
  }

  // -------------------------------------------------------------------------
  // 4. Scrollspy (Active Navigation Link Highlighting) & Header Effect
  // -------------------------------------------------------------------------
  const sections = document.querySelectorAll('section[id]');
  const header = document.getElementById('header');
  const scrollTopBtn = document.getElementById('scroll-top');

  window.addEventListener('scroll', handleScrollEvents);

  function handleScrollEvents() {
    const scrollY = window.pageYOffset;

    // Header background intensity
    if (header) {
      if (scrollY > 50) {
        header.style.boxShadow = '0 4px 20px rgba(0, 0, 0, 0.15)';
      } else {
        header.style.boxShadow = 'none';
      }
    }

    // Scroll to Top visibility
    if (scrollTopBtn) {
      if (scrollY > 400) {
        scrollTopBtn.classList.add('show');
      } else {
        scrollTopBtn.classList.remove('show');
      }
    }

    // Scrollspy active link
    sections.forEach(current => {
      const sectionHeight = current.offsetHeight;
      const sectionTop = current.offsetTop - 120;
      const sectionId = current.getAttribute('id');
      const targetNavLink = document.querySelector(`.nav-menu a[href*="${sectionId}"]`);

      if (scrollY > sectionTop && scrollY <= sectionTop + sectionHeight) {
        if (targetNavLink) targetNavLink.classList.add('active');
      } else {
        if (targetNavLink) targetNavLink.classList.remove('active');
      }
    });
  }

  if (scrollTopBtn) {
    scrollTopBtn.addEventListener('click', () => {
      window.scrollTo({
        top: 0,
        behavior: 'smooth'
      });
    });
  }

  // -------------------------------------------------------------------------
  // 5. Animated Number Counter (Hero Stats)
  // -------------------------------------------------------------------------
  const statNumbers = document.querySelectorAll('.stat-number');
  let statsCounted = false;

  function runCounter() {
    if (statsCounted) return;
    statsCounted = true;
    statNumbers.forEach(stat => {
      const target = parseInt(stat.getAttribute('data-target'), 10) || 0;
      let count = 0;
      const duration = 1600; // ms
      const stepTime = Math.max(10, Math.floor(duration / Math.max(target, 1)));

      const timer = setInterval(() => {
        count += 1;
        stat.textContent = count;
        if (count >= target) {
          stat.textContent = target;
          clearInterval(timer);
        }
      }, stepTime);
    });
  }

  const statsSection = document.querySelector('.hero-stats-container');
  if (statsSection && statNumbers.length > 0) {
    if ('IntersectionObserver' in window) {
      const observer = new IntersectionObserver((entries) => {
        if (entries[0].isIntersecting) {
          runCounter();
          observer.unobserve(statsSection);
        }
      }, { threshold: 0.1 });
      observer.observe(statsSection);
    } else {
      runCounter();
    }
  }

  // -------------------------------------------------------------------------
  // 6. Skills Category Filtering
  // -------------------------------------------------------------------------
  const skillTabs = document.querySelectorAll('.skill-tab');
  const skillCards = document.querySelectorAll('.skill-card');

  skillTabs.forEach(tab => {
    tab.addEventListener('click', () => {
      skillTabs.forEach(t => t.classList.remove('active'));
      tab.classList.add('active');

      const category = tab.getAttribute('data-category');

      skillCards.forEach(card => {
        const cardCat = card.getAttribute('data-cat');
        if (category === 'all' || cardCat === category) {
          card.classList.remove('hidden');
          card.style.opacity = '0';
          setTimeout(() => {
            card.style.opacity = '1';
          }, 50);
        } else {
          card.classList.add('hidden');
        }
      });
    });
  });

  // -------------------------------------------------------------------------
  // 7. Projects Category Filtering
  // -------------------------------------------------------------------------
  const projectBtns = document.querySelectorAll('.project-btn');
  const projectCards = document.querySelectorAll('.project-card');

  projectBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      projectBtns.forEach(b => b.classList.remove('active'));
      btn.classList.add('active');

      const filterValue = btn.getAttribute('data-filter');

      projectCards.forEach(card => {
        const cardCategories = card.getAttribute('data-category') || '';
        if (filterValue === 'all' || cardCategories.includes(filterValue)) {
          card.classList.remove('hidden');
          card.style.opacity = '0';
          setTimeout(() => {
            card.style.opacity = '1';
          }, 50);
        } else {
          card.classList.add('hidden');
        }
      });
    });
  });

  // -------------------------------------------------------------------------
  // 8. Contact Form Handling & Validation
  // -------------------------------------------------------------------------
  const contactForm = document.getElementById('contact-form');
  const nameInput = document.getElementById('name');
  const emailInput = document.getElementById('email');
  const messageInput = document.getElementById('message');
  const submitBtn = document.getElementById('submit-btn');
  const formFeedback = document.getElementById('form-feedback');

  if (contactForm) {
    contactForm.addEventListener('submit', (e) => {
      e.preventDefault();

      // Reset previous error states
      clearErrors();

      let isValid = true;

      // Validate Name
      if (!nameInput.value.trim()) {
        showError(nameInput, 'name-error', 'Please enter your name.');
        isValid = false;
      }

      // Validate Email
      const emailVal = emailInput.value.trim();
      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (!emailVal) {
        showError(emailInput, 'email-error', 'Please enter your email address.');
        isValid = false;
      } else if (!emailRegex.test(emailVal)) {
        showError(emailInput, 'email-error', 'Please enter a valid email address.');
        isValid = false;
      }

      // Validate Message
      if (!messageInput.value.trim()) {
        showError(messageInput, 'message-error', 'Please write a message.');
        isValid = false;
      } else if (messageInput.value.trim().length < 10) {
        showError(messageInput, 'message-error', 'Your message should be at least 10 characters.');
        isValid = false;
      }

      if (!isValid) return;

      // Loading state simulation
      const originalBtnText = submitBtn.innerHTML;
      submitBtn.disabled = true;
      submitBtn.innerHTML = `
        <svg class="spinner" width="18" height="18" viewBox="0 0 50 50" style="animation: spin 1s linear infinite;">
          <circle cx="25" cy="25" r="20" fill="none" stroke="currentColor" stroke-width="5" stroke-dasharray="80" stroke-dashoffset="60"></circle>
        </svg>
        <span>Sending Message...</span>
      `;

      // Simulate sending to server or email service
      setTimeout(() => {
        submitBtn.disabled = false;
        submitBtn.innerHTML = originalBtnText;

        formFeedback.className = 'form-feedback success';
        formFeedback.style.display = 'block';
        formFeedback.innerHTML = `
          <strong>🎉 Message sent successfully!</strong><br>
          Thank you for reaching out, ${sanitizeHTML(nameInput.value.trim())}. Gopika will respond to your email within 24 hours.
        `;

        contactForm.reset();

        // Auto-hide feedback after 8 seconds
        setTimeout(() => {
          formFeedback.style.display = 'none';
        }, 8000);
      }, 1200);
    });

    // Real-time error removal on input
    [nameInput, emailInput, messageInput].forEach(input => {
      if (input) {
        input.addEventListener('input', () => {
          const group = input.closest('.form-group');
          if (group && group.classList.contains('has-error')) {
            group.classList.remove('has-error');
            const errEl = group.querySelector('.error-message');
            if (errEl) errEl.textContent = '';
          }
        });
      }
    });
  }

  function showError(inputElement, errorElementId, message) {
    const group = inputElement.closest('.form-group');
    if (group) group.classList.add('has-error');
    const errEl = document.getElementById(errorElementId);
    if (errEl) {
      errEl.textContent = message;
    }
  }

  function clearErrors() {
    document.querySelectorAll('.form-group').forEach(group => group.classList.remove('has-error'));
    document.querySelectorAll('.error-message').forEach(el => el.textContent = '');
    if (formFeedback) {
      formFeedback.className = 'form-feedback';
      formFeedback.style.display = 'none';
      formFeedback.textContent = '';
    }
  }

  function sanitizeHTML(str) {
    const temp = document.createElement('div');
    temp.textContent = str;
    return temp.innerHTML;
  }

  // -------------------------------------------------------------------------
  // 9. Current Year in Footer
  // -------------------------------------------------------------------------
  const currentYearSpan = document.getElementById('current-year');
  if (currentYearSpan) {
    currentYearSpan.textContent = new Date().getFullYear();
  }
});

// Inline keyframe for spinner
const styleSheet = document.createElement('style');
styleSheet.textContent = `
  @keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
  }
`;
document.head.appendChild(styleSheet);
