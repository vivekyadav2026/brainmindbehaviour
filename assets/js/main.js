/**
* Template Name: Clinic
* Template URL: https://bootstrapmade.com/clinic-bootstrap-template/
* Updated: Jul 23 2025 with Bootstrap v5.3.7
* Author: BootstrapMade.com
* License: https://bootstrapmade.com/license/
*/

(function() {
  "use strict";

  /**
   * Apply .scrolled class to the body as the page is scrolled down
   */
  function toggleScrolled() {
    const selectBody = document.querySelector('body');
    const selectHeader = document.querySelector('#header');
    if (!selectHeader.classList.contains('scroll-up-sticky') && !selectHeader.classList.contains('sticky-top') && !selectHeader.classList.contains('fixed-top')) return;
    window.scrollY > 100 ? selectBody.classList.add('scrolled') : selectBody.classList.remove('scrolled');
  }

  document.addEventListener('scroll', toggleScrolled);
  window.addEventListener('load', toggleScrolled);

  /**
   * Mobile nav toggle
   */
  const mobileNavToggleBtn = document.querySelector('.mobile-nav-toggle');

  function mobileNavToogle() {
    document.querySelector('body').classList.toggle('mobile-nav-active');
    mobileNavToggleBtn.classList.toggle('bi-list');
    mobileNavToggleBtn.classList.toggle('bi-x');
  }
  if (mobileNavToggleBtn) {
    mobileNavToggleBtn.addEventListener('click', mobileNavToogle);
  }

  /**
   * Hide mobile nav on same-page/hash links
   */
  document.querySelectorAll('#navmenu a').forEach(navmenu => {
    navmenu.addEventListener('click', () => {
      if (document.querySelector('.mobile-nav-active')) {
        mobileNavToogle();
      }
    });

  });

  /**
   * Toggle mobile nav dropdowns
   */
  document.querySelectorAll('.navmenu .toggle-dropdown').forEach(navmenu => {
    navmenu.addEventListener('click', function(e) {
      e.preventDefault();
      this.parentNode.classList.toggle('active');
      this.parentNode.nextElementSibling.classList.toggle('dropdown-active');
      e.stopImmediatePropagation();
    });
  });

  /**
   * Preloader
   */
  const preloader = document.querySelector('#preloader');
  if (preloader) {
    window.addEventListener('load', () => {
      preloader.remove();
    });
  }

  /**
   * Scroll top button
   */
  let scrollTop = document.querySelector('.scroll-top');

  function toggleScrollTop() {
    if (scrollTop) {
      window.scrollY > 100 ? scrollTop.classList.add('active') : scrollTop.classList.remove('active');
    }
  }
  scrollTop.addEventListener('click', (e) => {
    e.preventDefault();
    window.scrollTo({
      top: 0,
      behavior: 'smooth'
    });
  });

  window.addEventListener('load', toggleScrollTop);
  document.addEventListener('scroll', toggleScrollTop);

  /**
   * Animation on scroll function and init
   */
  function aosInit() {
    AOS.init({
      duration: 600,
      easing: 'ease-in-out',
      once: true,
      mirror: false
    });
  }
  window.addEventListener('load', aosInit);

  /**
   * Initiate glightbox
   */
  const glightbox = GLightbox({
    selector: '.glightbox'
  });

  /**
   * Initiate Pure Counter
   */
  new PureCounter();

  /**
   * Init swiper sliders
   */
  function initSwiper() {
    document.querySelectorAll(".init-swiper").forEach(function(swiperElement) {
      let config = JSON.parse(
        swiperElement.querySelector(".swiper-config").innerHTML.trim()
      );

      if (swiperElement.classList.contains("swiper-tab")) {
        initSwiperWithCustomPagination(swiperElement, config);
      } else {
        new Swiper(swiperElement, config);
      }
    });
  }

  window.addEventListener("load", initSwiper);

  /**
   * Frequently Asked Questions Toggle
   */
  document.querySelectorAll('.faq-item h3, .faq-item .faq-toggle, .faq-item .faq-header').forEach((faqItem) => {
    faqItem.addEventListener('click', () => {
      faqItem.parentNode.classList.toggle('faq-active');
    });
  });

  /**
   * High-Tech Neural Network background animation
   */
  class NeuralNetwork {
    constructor(canvas) {
      this.canvas = canvas;
      this.ctx = canvas.getContext('2d');
      this.particles = [];
      this.maxParticles = 50;
      this.connectionDistance = 100;
      this.resize();
      window.addEventListener('resize', () => this.resize());
      this.init();
      this.animate();
    }

    resize() {
      // Check if it's the global background canvas (needs fixed viewport bounds)
      if (this.canvas.classList.contains('global-bg-canvas')) {
        this.canvas.width = window.innerWidth;
        this.canvas.height = window.innerHeight;
      } else {
        // Safely resize to the container dimensions with fallbacks
        this.canvas.width = this.canvas.parentElement.offsetWidth || window.innerWidth;
        this.canvas.height = this.canvas.parentElement.offsetHeight || 600;
      }
      
      if (this.canvas.width < 768) {
        this.maxParticles = 30;
        this.connectionDistance = 90;
      } else {
        this.maxParticles = 65;
        this.connectionDistance = 140;
      }
    }

    init() {
      this.particles = [];
      for (let i = 0; i < this.maxParticles; i++) {
        this.particles.push({
          x: Math.random() * this.canvas.width,
          y: Math.random() * this.canvas.height,
          vx: (Math.random() - 0.5) * 0.25,
          vy: (Math.random() - 0.5) * 0.25,
          radius: Math.random() * 2 + 1.5
        });
      }
    }

    animate() {
      this.ctx.clearRect(0, 0, this.canvas.width, this.canvas.height);
      
      // Draw Connections (Brighter and longer)
      for (let i = 0; i < this.particles.length; i++) {
        const p1 = this.particles[i];
        for (let j = i + 1; j < this.particles.length; j++) {
          const p2 = this.particles[j];
          const dist = Math.hypot(p1.x - p2.x, p1.y - p2.y);
          
          if (dist < this.connectionDistance) {
            // Brighter lines (0.65 scale instead of 0.18)
            const alpha = (1 - dist / this.connectionDistance) * 0.65;
            this.ctx.strokeStyle = `rgba(0, 217, 255, ${alpha})`;
            this.ctx.lineWidth = 1.0;
            this.ctx.beginPath();
            this.ctx.moveTo(p1.x, p1.y);
            this.ctx.lineTo(p2.x, p2.y);
            this.ctx.stroke();
          }
        }
      }

      // Draw and Update Particles (Glow effect like active brain synapses)
      for (let p of this.particles) {
        // Outer glowing aura
        this.ctx.fillStyle = 'rgba(0, 217, 255, 0.18)';
        this.ctx.beginPath();
        this.ctx.arc(p.x, p.y, p.radius * 3.5, 0, Math.PI * 2);
        this.ctx.fill();

        // Inner glowing core
        this.ctx.fillStyle = 'rgba(0, 217, 255, 0.95)';
        this.ctx.beginPath();
        this.ctx.arc(p.x, p.y, p.radius, 0, Math.PI * 2);
        this.ctx.fill();

        p.x += p.vx;
        p.y += p.vy;

        if (p.x < 0 || p.x > this.canvas.width) p.vx *= -1;
        if (p.y < 0 || p.y > this.canvas.height) p.vy *= -1;
      }

      requestAnimationFrame(() => this.animate());
    }
  }

  // Initialize all neural network canvases on DOMContentLoaded or immediately
  const initCanvases = () => {
    document.querySelectorAll('.neural-canvas').forEach(canvas => {
      new NeuralNetwork(canvas);
    });
  };
  
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initCanvases);
  } else {
    initCanvases();
  }

})();