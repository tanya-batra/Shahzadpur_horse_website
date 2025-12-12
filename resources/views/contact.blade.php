<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Shahzadpur Stables - Premium Marwari Horses</title>
    <meta name="description" content="Authentic Marwari horse breeding and sales with Punjabi & Sikh heritage." />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
     <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&family=Noto+Sans+Gurmukhi:wght@400;700&family=Playfair+Display:wght@500;700&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet" />
  </head>
  <style>
/* ---------------------------------------------------------------------- */
/* --- 0. Global & Theme Variables (BASED ON LOGO COLORS) --- */
/* ---------------------------------------------------------------------- */
:root {
    --color-dark-primary: #152238;
    --color-light-bg: #fdfcf8;
    --color-accent-gold: #c5a350;
    --color-accent-red: #c94040;
    --color-text-dark: #333;
    --color-text-light: #f8f9fa;
}

body {
    background-color: var(--color-light-bg);
    color: var(--color-text-dark);
    font-family: 'Inter', sans-serif;
    overflow-x: hidden;
}

.bg-primary-dark {
    background-color: var(--color-dark-primary) !important;
}

.text-accent {
    color: var(--color-accent-gold) !important;
}

/* --- Global Button Styles --- */
.btn-accent {
    background-color: var(--color-accent-gold);
    border: none;
    color: var(--color-dark-primary);
    transition: background-color 0.3s ease, transform 0.2s ease;
}
.btn-accent:hover {
    background-color: #a98944;
    color: #fff;
    transform: translateY(-1px);
}
.btn-outline-accent {
    border: 2px solid var(--color-accent-gold);
    color: var(--color-accent-gold);
    transition: background-color 0.3s ease, color 0.3s ease;
}
.btn-outline-accent:hover {
    background-color: var(--color-accent-gold);
    color: var(--color-dark-primary);
}

/* --- Global Heading Section  --- */
.section-title-modern {
    font-family: 'Playfair Display', serif;
    font-weight: 700;
    color: var(--color-dark-primary);
    position: relative;
    padding-bottom: 0.5rem;
    margin-bottom: 1.5rem;
    text-align: center;
}
.section-title-modern::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 90px;
    height: 4px;
    background-color: var(--color-accent-gold);
    border-radius: 2px;
}
.section-subtitle-modern {
    max-width: 700px;
    margin-left: auto;
    margin-right: auto;
    font-size: 1.15rem;
    color: #6c757d;
    text-align: center;
}
.text-on-dark .section-title-modern {
    color: var(--color-text-light);
}
.text-on-dark .section-subtitle-modern {
    color: var(--color-text-light);
}

/* ---------------------------------------------------------------------- */
/* --- 1. Header --- */
/* ---------------------------------------------------------------------- */
.navbar {
    padding-top: 0.5rem;
    padding-bottom: 0.5rem;
}
.navbar-brand img {
    height: 95px;
    width: auto;
}
.navbar-brand .brand-title {
    display: none;
}
.brand-title{
    font-size: 1.65rem;
}

.offcanvas {
  transition: transform 0.5s cubic-bezier(0.65,0,0.35,1), visibility 0.5s linear !important;
}
.offcanvas.offcanvas-end {
  width: 100vw;
  max-width: 375px;
}
.offcanvas-body .navbar-nav {
    padding-top: 1rem;
}
.offcanvas-header {
    background-color: var(--color-dark-primary);
    color: white;
}
.offcanvas-header .btn-close {
    filter: invert(1);
}

.sticky-top {
    position: sticky;
    top: 0;
    z-index: 1020;
}
@media (min-width: 992px) {
  .offcanvas { display: none !important; }
}
@media (max-width: 991.98px) {
  #mainNav { display: none !important; }
  .navbar-toggler { display: inline-flex !important; }
   .navbar-nav .nav-link {
        font-size: 18px;
    }
}


/* ---------------------------------------------------------------------- */
/* --- 2. Hero Section  --- */
/* ---------------------------------------------------------------------- */
.hero {
    min-height: 100vh;
    display: flex;
    align-items: center;
    position: relative;
    overflow: hidden;
}

.hero-bg {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: url('assets/images/home.jpg') no-repeat center center/cover;
    z-index: -2;
    filter: brightness(0.55);
}

.hero-bg::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(to top, rgba(0, 0, 0, 0.7) 0%, rgba(0, 0, 0, 0.1) 70%, rgba(0, 0, 0, 0.7) 100%);
    z-index: -1;
}

.hero-title {
    font-family: 'Playfair Display', serif;
    text-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
}

/* ---------------------------------------------------------------------- */
/* --- 3. Quick Exploration --- */
/* ---------------------------------------------------------------------- */
#quick-exploration {
    padding-top: 5rem;
    padding-bottom: 5rem;
    background-color: #fff;
}

.quick-card-new {
    border: none;
    border-radius: 8px;
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    text-decoration: none;
    color: var(--color-text-dark);
    background-color: #f8f8f8;
}

.quick-card-new:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    color: var(--color-text-dark);
}

.quick-card-new .card-img-top {
    height: 200px;
    object-fit: cover;
}

.quick-card-new .card-body {
    padding: 1.5rem;
    border-top: 3px solid var(--color-accent-gold);
}
.quick-card-new .card-title {
    font-family: 'Playfair Display', serif;
    color: var(--color-dark-primary);
    font-size: 1.3rem;
}


/* ---------------------------------------------------------------------- */
/* --- 4. Our Legacy & Vision --- */
/* ---------------------------------------------------------------------- */
#legacy-vision {
    padding-top: 6rem;
    padding-bottom: 6rem;
    background: var(--color-light-bg);
    position: relative;
    overflow: hidden;
}

.legacy-content-box {
    padding: 2.5rem;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    position: relative;
}

.legacy-content-box h3 {
    font-family: 'Playfair Display', serif;
    color: var(--color-accent-red);
    border-left: 5px solid var(--color-accent-gold);
    padding-left: 15px;
}

.history-image-wrapper, .vision-image-wrapper {
    overflow: hidden;
    border-radius: 8px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    height: 100%;
    position: relative;
}
.animate-zoom {
    transition: transform 0.6s ease;
}
.history-image-wrapper:hover .animate-zoom,
.vision-image-wrapper:hover .animate-zoom {
    transform: scale(1.05);
}
#legacy-vision .btn {
    width: auto;
    align-self: flex-start;
}

@media (max-width: 992px) {
    .legacy-content-box {
        margin-top: 2rem;
    }
}


/* ---------------------------------------------------------------------- */
/* --- 5. Featured Horses --- */
/* ---------------------------------------------------------------------- */
#featured-horses {
    padding-top: 5rem;
    padding-bottom: 5rem;
    background-color: #fff;
}

.horse-card-modern {
    border: 1px solid rgba(0, 0, 0, 0.1);
    border-radius: 10px;
    overflow: hidden;
    transition: transform 0.3s, box-shadow 0.3s;
    background-color: #fff;
}
.horse-card-modern:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.15);
}
.horse-card-modern .card-img-top {
    height: 300px;
    object-fit: cover;
    border-bottom: 4px solid var(--color-accent-gold);
}
.horse-details-modern {
    padding: 1.5rem;
}


/* ---------------------------------------------------------------------- */
/* --- 6. The Purity of Lineage  --- */
/* ---------------------------------------------------------------------- */
#breeding-excellence {
    padding-top: 6rem;
    padding-bottom: 6rem;
    background-color: var(--color-dark-primary);
    color: var(--color-text-light);
}

.lineage-item-wrapper {
    margin-bottom: 3rem;
}

.lineage-content {
    padding: 2.5rem;
    background-color: rgba(255, 255, 255, 0.05);
    border-radius: 8px;
    border-left: 5px solid var(--color-accent-red);
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
}
.lineage-content h5 {
    color: var(--color-accent-gold);
    font-family: 'Playfair Display', serif;
    font-weight: 700;
}

.lineage-image-container {
    overflow: hidden;
    border-radius: 8px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.5);
    position: relative;
    z-index: 1;
}

.lineage-image-container img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.6s ease;
}
.lineage-image-container:hover img {
    transform: scale(1.05);
}


/* ---------------------------------------------------------------------- */
/* --- 7. Gallery --- */
/* ---------------------------------------------------------------------- */
#gallery {
    padding-top: 5rem;
    padding-bottom: 5rem;
    background: #fff;
}

.masonry-grid {
    column-count: 3;
    column-gap: 1.5rem;
}

.gallery-item-masonry {
    display: inline-block;
    width: 100%;
    margin-bottom: 1.5rem;
    overflow: hidden;
    border-radius: 10px;
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    cursor: zoom-in;
}

.gallery-item-masonry:hover {
    transform: translateY(-3px);
    box-shadow: 0 12px 25px rgba(0, 0, 0, 0.15);
}

.gallery-img-masonry {
    width: 100%;
    height: auto;
    display: block;
    transition: opacity 0.4s;
}

@media (max-width: 992px) {
    .masonry-grid {
        column-count: 2;
    }
}
@media (max-width: 576px) {
    .masonry-grid {
        column-count: 1;
    }
}


/* ---------------------------------------------------------------------- */
/* --- 8. Footer Fixes  --- */
/* ---------------------------------------------------------------------- */
.footer {
    background-color: var(--color-dark-primary);
    padding-top: 4rem;
    padding-bottom: 2rem;
}

.footer-brand img {
    height: 95px !important;
    width: auto !important;
    max-height: 100%;
    margin-left: auto;
    margin-right: auto;
}

.footer-section.logo-center-fix {
    text-align: left !important;
}
.footer-section.logo-center-fix .footer-brand {
    display: flex;
    flex-direction: column;

    /* align-items: center; */

}
.footer-brand span {
    font-size:2rem;
}

.footer-link {
    margin-bottom: 0.5rem;
    font-size: 0.95rem;
    transition: color 0.3s ease;
    color: var(--color-text-light);
}
.footer-link:hover {
    color: var(--color-accent-gold) !important;
    text-decoration: underline;
}

.connect-item {
    display: flex;
    align-items: center;
    margin-bottom: 1rem;
    color: var(--color-text-light);
    justify-content: flex-start;
}

@media (max-width: 991.98px) {
    .footer-section.logo-center-fix {
        text-align: left !important;
    }

    .col-lg-2, .col-lg-3 {
        text-align: left !important;
    }
    .footer-section {
        text-align: left !important;
    }
    .footer-section h6 {
        text-align: left !important;
    }

    .connect-item {
        justify-content: flex-start !important;
    }
}


.connect-item .text-accent {
    min-width: 25px;
}
.connect-item a {
    color: var(--color-text-light);
    text-decoration: none;
    transition: color 0.3s ease;
}
.connect-item a:hover {
    color: var(--color-accent-gold) !important;
}

.footer-social .social-icon {
    font-size: 1.5rem;
    margin-right: 1rem;
    color: var(--color-accent-gold);
    transition: color 0.3s, transform 0.2s;
}
.footer-social .social-icon:hover {
    color: var(--color-text-light);
    transform: translateY(-1px);
}

.footer-bottom {
    border-top: 1px solid rgba(255, 255, 255, 0.1);
    padding-top: 1.5rem;
    margin-top: 3rem;
}
.footer-bottom .col-lg-4, .footer-bottom .col-md-4 {
    margin-bottom: 0.5rem;
}
.footer-bottom .text-center-lg {
    text-align: center;
}
.footer-bottom .text-end-lg {
    text-align: right;
}
@media (max-width: 992px) {
    .footer-bottom .text-end-lg, .footer-bottom .text-center-lg {
        text-align: left !important;
    }
}
.whatsapp_float {
  position: fixed;
  width: 60px;
  height: 60px;
  bottom: 40px;
  /* left: 40px; */
  right: 35px;
  background-color: var(--color-accent-gold) !important;
  /* color: var(--color-accent-gold) !important; */
  color: #fff;
  border-radius: 50px;
  text-align: center;
  font-size: 38px;
  box-shadow: 2px 2px 3px #999;
  z-index: 1000;
  transition: transform 0.3s ease;
  animation: pulse 2.5s infinite;
}

.whatsapp_float:hover {
  transform: scale(1.1);
  box-shadow: 0 0 10px #af9428;
  animation: none; 
}

@keyframes pulse {
  0% {
    transform: scale(1);
    box-shadow: 0 0 5px #af9428;
  }
  50% {
    transform: scale(1.1);
    box-shadow: 0 0 15px #af9428;
  }
  100% {
    transform: scale(1);
    box-shadow: 0 0 5px #af9428;
  }
}
   body { background: #f7f5ef; }
    .text-gold { color: #cfa137!important; }
    .btn-gold {
      background: #cfa137;
      color: #fff;
      border-radius: 30px;
      border: none;
      font-weight: 600;
      box-shadow: 0 6px 24px rgba(207,161,55,.12);
      transition: box-shadow .22s, transform .22s;
    }
    .btn-gold:hover {
      box-shadow: 0 10px 34px rgba(207,161,55,.18);
      transform: translateY(-2px) scale(1.04);
    }
    .playfair-title {
      font-family: 'Playfair Display', serif;
      letter-spacing: 0.03em;
      text-transform: uppercase;
    }
    .hero-section {
      min-height: 60vh;
      background: linear-gradient(120deg,#2c001e 70%,#cfa137 100%);
      color:#fff;
      position:relative;
      overflow: hidden;
    }
    .hero-section .container { position:relative; z-index:2; }
    .hero-bg-img {
      position: absolute; top:0; left:0; width:100%; height:100%;
      background:url('assets/img/horse-bg.jpg') center/cover no-repeat; opacity:.18; z-index:1;
    }
    .section-title {
      font-size: 2.8rem;
      font-family: 'Playfair Display',serif;
      color:#2c001e;
      letter-spacing:2px;
      font-weight:700;
      border-left:6px solid #cfa137;
      padding-left:18px;
      margin-bottom:32px;
    }
    .card {
      border: none;
      border-radius: 1rem;
      box-shadow: 0 4px 22px rgba(82,27,42,.09);
      background: #fff;
      transition: box-shadow .24s, transform .28s;
    }
    .card:hover {
      box-shadow: 0 12px 44px rgba(82,27,42,.18);
      transform: translateY(-6px) scale(1.03);
    }
    .border-gold { border-bottom: 3px solid #cfa137!important; display: inline-block; }
    .social-icons i { font-size: 1.3rem; }
      :root {
      --primary-gold: #d4af37;
      --primary-maroon: #521b20;
      --light-gold: #f4e8b8;
      --dark-gold: #b8941f;
      --cream: #faf7f0;
      --text-dark: #2c1810;
      --text-muted: #6a5a4e;
    }

    * { margin: 0; padding: 0; box-sizing: border-box; }

    body {
      font-family: 'Inter', sans-serif;
      color: var(--text-dark);
      background: var(--cream);
      line-height: 1.6;
    }

    .bg-maroon { background-color: var(--primary-maroon) !important; }
    .text-gold { color: var(--primary-gold) !important; }

    /* Navbar */
    .navbar-dark .navbar-nav .nav-link {
      color: #f0e8d0;
      font-weight: 600;
      transition: all 0.3s ease;
      position: relative;
    }
    .navbar-dark .navbar-nav .nav-link::after {
      content: '';
      position: absolute;
      bottom: -5px;
      left: 50%;
      width: 0;
      height: 2px;
      background: var(--primary-gold);
      transition: all 0.3s ease;
      transform: translateX(-50%);
    }
    .navbar-dark .navbar-nav .nav-link:hover::after,
    .navbar-dark .navbar-nav .nav-link.active::after {
      width: 80%;
    }
    .navbar-dark .navbar-nav .nav-link:hover,
    .navbar-dark .navbar-nav .nav-link.active {
      color: var(--primary-gold);
    }

    .btn-gold {
      background: linear-gradient(45deg, var(--primary-gold), var(--dark-gold));
      color: #fff;
      font-weight: 700;
      border: none;
      border-radius: 50px;
      padding: 12px 30px;
      transition: all 0.3s ease;
      text-transform: uppercase;
      letter-spacing: 1px;
      box-shadow: 0 4px 15px rgba(212,175,55,0.3);
    }
    .btn-gold:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 25px rgba(212,175,55,0.5);
      color: #fff;
    }

    .btn-outline-gold {
      border: 2px solid var(--primary-gold);
      color: var(--primary-gold);
      background: transparent;
      border-radius: 50px;
      font-weight: 700;
      padding: 10px 28px;
      transition: all 0.3s ease;
    }
    .btn-outline-gold:hover {
      background: var(--primary-gold);
      color: #fff;
      transform: translateY(-2px);
    }

.contact-hero {
  min-height: 55vh;
  background: url('assets/images/home.jpg') no-repeat center center/cover; /* Replace with your image path */
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 4rem 1rem;
  font-family: 'Playfair Display', serif;
  color: #fff; /* White text for contrast */
  text-align: center;
  position: relative;
}
  .contact-hero-title {
    font-size: 2.8rem;
    font-weight: 700;
    margin-bottom: 1rem;
  }
  .contact-hero-subtitle {
    font-size: 1.15rem;
    max-width: 540px;
    margin: 0 auto 1.5rem;
    color:black;
  }
  .btn-gold {
    background: #d4af37;
    color: #3a2c00;
    font-weight: 600;
    border: none;
    border-radius: 35px;
    padding: 12px 38px;
    text-transform: uppercase;
    transition: background-color 0.3s ease;
    letter-spacing: 0.04em;
  }
  .btn-gold:hover {
    background: #b49726;
    color: #fff;
  }
  @media (max-width: 600px) {
    .contact-hero-title {
      font-size: 2rem;
    }
    .contact-hero-subtitle {
      font-size: 1rem;
      max-width: 90%;
    }
  }

    /* Contact Cards Section */
    .contact-cards {
      padding: 6rem 0;
      background: #fff;
      position: relative;
    }

    .contact-cards::before {
      content: '';
      position: absolute;
      top: 0; left: 0; right: 0; bottom: 0;
      background: linear-gradient(45deg, transparent 30%, rgba(212,175,55,0.03) 70%);
    }

    .contact-card {
      background: #fff;
      border-radius: 25px;
      padding: 3rem 2rem;
      text-align: center;
      border: 1px solid rgba(212,175,55,0.15);
      transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
      position: relative;
      overflow: hidden;
      height: 100%;
    }

    .contact-card::before {
      content: '';
      position: absolute;
      top: 0; left: 0; right: 0; bottom: 0;
      background: linear-gradient(135deg, var(--primary-gold), var(--dark-gold));
      opacity: 0;
      transition: opacity 0.4s ease;
    }

    .contact-card:hover {
      transform: translateY(-15px) scale(1.02);
      box-shadow: 0 20px 60px rgba(212,175,55,0.25);
      border-color: var(--primary-gold);
    }

    .contact-card:hover::before {
      opacity: 0.05;
    }

    .contact-icon {
      width: 90px;
      height: 90px;
      background: linear-gradient(135deg, var(--primary-gold), var(--dark-gold));
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 2rem;
      font-size: 2.5rem;
      color: #fff;
      box-shadow: 0 10px 30px rgba(212,175,55,0.3);
      transition: all 0.3s ease;
      position: relative;
      z-index: 2;
    }

    .contact-card:hover .contact-icon {
      transform: scale(1.1);
      box-shadow: 0 15px 40px rgba(212,175,55,0.5);
    }

    .contact-card h4 {
      font-family: 'Playfair Display', serif;
      font-weight: 700;
      color: var(--primary-gold);
      font-size: 1.5rem;
      margin-bottom: 1rem;
      position: relative;
      z-index: 2;
    }

    .contact-card p {
      color: var(--text-muted);
      font-weight: 500;
      margin-bottom: 0.5rem;
      position: relative;
      z-index: 2;
    }

    .contact-card .contact-link {
      color: var(--primary-gold);
      text-decoration: none;
      font-weight: 600;
      transition: color 0.3s ease;
      position: relative;
      z-index: 2;
    }

    .contact-card .contact-link:hover {
      color: var(--dark-gold);
    }

    /* Main Contact Section - Split Layout */
   .glass-form {
    background: rgba(255 255 255 / 0.18);
    backdrop-filter: blur(16px) saturate(180%);
    -webkit-backdrop-filter: blur(16px) saturate(180%);
    border-radius: 24px;
    border: 1px solid rgba(255 255 255 / 0.3);
    box-shadow: 0 10px 40px rgba(212,175,55,0.2);
    transition: box-shadow 0.3s ease;
  }
  .glass-form:hover {
    box-shadow: 0 14px 60px rgba(212,175,55,0.35);
  }
  .form-control:focus {
    border-color: #d4af37;
    box-shadow: 0 0 0 0.3rem rgba(212,175,55,0.4);
  }
  .btn-gold {
    background: linear-gradient(45deg, #d4af37, #b48e12);
    border-radius: 50px;
    font-weight: 700;
    color: #3a2c00;
    transition: all 0.3s ease;
    box-shadow: 0 6px 30px rgba(212,175,55,0.3);
  }
  .btn-gold:hover {
    background: linear-gradient(45deg, #b48e12, #d4af37);
    color: #fff;
    box-shadow: 0 10px 50px rgba(212,175,55,0.6);
  }
  .map-info {
    max-width: 360px;
    background: #fff;
    border-radius: 24px;
    box-shadow: 0 15px 40px rgba(0,0,0,0.15);
    font-size: 0.95rem;
    color: #555;
  }
  @media (max-width: 991px) {
    .map-info {
      position: static !important;
      transform: none !important;
      max-width: 100% !important;
      margin: 1.5rem auto 0 auto !important;
    }
  }



    /* Responsive Design */
    @media (max-width: 991px) {
      .main-contact {
        flex-direction: column;
        min-height: auto;
      }

      .contact-form-section {
        padding: 3rem 2rem;
      }

      .map-section {
        min-height: 500px;
      }

      .hero-title {
        font-size: 3rem;
      }

      .hero-subtitle {
        font-size: 1.2rem;
      }

      .contact-card {
        margin-bottom: 2rem;
      }

      .map-info {
        left: 1rem;
        right: 1rem;
        bottom: 1rem;
      }
    }

    @media (max-width: 576px) {
      .hero-title {
        font-size: 2.2rem;
      }

      .hero-subtitle {
        font-size: 1rem;
      }

      .contact-form-section {
        padding: 2rem 1rem;
      }

      .contact-card {
        padding: 2rem 1rem;
      }

      .map-header {
        padding: 1rem;
      }
    }

    /* Loading Animation */
    .loading {
      display: inline-block;
      width: 20px;
      height: 20px;
      border: 3px solid rgba(255,255,255,0.3);
      border-radius: 50%;
      border-top-color: #fff;
      animation: spin 1s ease-in-out infinite;
      margin-right: 10px;
    }

    @keyframes spin {
      to { transform: rotate(360deg); }
    }
</style>

  <body>


{{-- Header Section Start --}}
<header class="navbar navbar-dark bg-primary-dark sticky-top shadow-sm navbar-expand-lg">
  <div class="container">
    <a class="navbar-brand fw-bold d-flex align-items-center gap-2" href="index.html">
      <img src="assets/images/logo.png" alt="Shahzadpur Stables Logo" class="img-fluid"  />
      <span class="brand-title d-none d-lg-inline">Shahzadpur Stables</span>
    </a>
    <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!-- Desktop nav only  -->
    <nav class="collapse navbar-collapse d-none d-lg-flex" id="mainNav">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                <li class="nav-item">
                <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ route('home') }}" data-i18n="nav.home">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ request()->is('horses') ? 'active' : '' }}" href="{{ route('horses') }}" data-i18n="nav.horses">Horses</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ request()->is('heritage') ? 'active' : '' }}" href="{{ route('heritage') }}" data-i18n="nav.heritage">Heritage</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ request()->is('gallery') ? 'active' : '' }}" href="{{ route('gallery') }}" data-i18n="nav.gallery">Gallery</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ request()->is('blog') ? 'active' : '' }}" href="{{ route('blog') }}" data-i18n="nav.blog">Blog</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ request()->is('about') ? 'active' : '' }}" href="{{ route('about') }}" data-i18n="nav.about">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ request()->is('contact') ? 'active' : '' }}" href="{{ route('contact') }}" data-i18n="nav.contact">Contact</a>
              </li>


      </ul>
      <div class="ms-lg-3 d-flex align-items-center gap-2">
        <button class="btn btn-outline-accent btn-sm" id="langToggle" aria-label="Toggle language">ਪੰਜਾਬੀ / EN</button>
        
      </div>
    </nav>
    <!-- Mobile Nav only -->
    <div class="offcanvas offcanvas-end bg-primary-dark text-white" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <a href="index.html" class="navbar-brand d-flex align-items-center gap-2">
          <img src="assets/images/logo.png" alt="Logo" style="height:95px;width:auto;">
        </a>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav flex-grow-1">

            <li class="nav-item">
                <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ route('home') }}" data-i18n="nav.home">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ request()->is('horses') ? 'active' : '' }}" href="{{ route('horses') }}" data-i18n="nav.horses">Horses</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ request()->is('heritage') ? 'active' : '' }}" href="{{ route('heritage') }}" data-i18n="nav.heritage">Heritage</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ request()->is('gallery') ? 'active' : '' }}" href="{{ route('gallery') }}" data-i18n="nav.gallery">Gallery</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ request()->is('blog') ? 'active' : '' }}" href="{{ route('blog') }}" data-i18n="nav.blog">Blog</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ request()->is('about') ? 'active' : '' }}" href="{{ route('about') }}" data-i18n="nav.about">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ request()->is('contact') ? 'active' : '' }}" href="{{ route('contact') }}" data-i18n="nav.contact">Contact</a>
              </li>


        </ul>
        <div class="d-flex flex-column gap-2 mt-4">
          
          <button class="btn btn-outline-accent" id="langToggleMobile" aria-label="Toggle language">ਪੰਜਾਬੀ / EN</button>
        </div>
      </div>
    </div>
  </div>
</header>
{{-- Header Section End --}}


<!-- Hero Section -->
<section class="contact-hero">
  <div class="container text-center">
    <h1 class="contact-hero-title">Get in Touch with Shahjadpur Stables</h1>
    <p class="contact-hero-subtitle">
      We are here to assist you with authentic Marwari horses, breeding services, and all your enquiries.
    </p>
    <a href="#contact-form" class="btn btn-gold btn-md mt-3">Contact Us</a>
  </div>
</section>

<!-- Contact Cards -->
<section class="contact-cards">
  <div class="container">
    <div class="row g-4">
      <div class="col-lg-3 col-md-6">
        <div class="contact-card">
          <div class="contact-icon">
            <i class="bi bi-telephone-fill"></i>
          </div>
          <h4>Call Us</h4>
          <p><a href="tel:+910000000000" class="contact-link">+91-00000-00000</a></p>
          <small class="text-muted">Mon-Sat: 9AM-7PM</small>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="contact-card">
          <div class="contact-icon">
            <i class="bi bi-envelope-fill"></i>
          </div>
          <h4>Email</h4>
          <p><a href="mailto:info@shahjadpurstables.com" class="contact-link">info@shahjadpurstables.com</a></p>
          <small class="text-muted">24h response time</small>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="contact-card">
          <div class="contact-icon">
            <i class="bi bi-geo-alt-fill"></i>
          </div>
          <h4>Location</h4>
          <p>Village Shahjadpur<br>Punjab, India</p>
          <small class="text-muted">Visits by appointment</small>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="contact-card">
          <div class="contact-icon">
            <i class="bi bi-whatsapp"></i>
          </div>
          <h4>WhatsApp</h4>
          <p><a href="https://wa.me/0000000000" target="_blank" class="contact-link">Quick Chat</a></p>
          <small class="text-muted">Instant responses</small>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Main Contact Form & Map -->
<div class="container my-5">
  <div class="row g-5">
    <!-- Contact Form -->
    <div class="col-lg-6">
      <div class="glass-form p-5 rounded-4 shadow-lg">
        <h2 class="mb-4 text-gold" style="font-family:'Playfair Display', serif;">Send a Message</h2>
     <!-- Success Message -->
    @if(session('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    <!-- Error Messages -->
    @if($errors->any())
      <div class="alert alert-danger">
        <ul class="mb-0">
          @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('contact.store') }}" method="POST">
      @csrf
      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control rounded-3" id="name" name="name" placeholder="Your Name" value="{{ old('name') }}" required>
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control rounded-3" id="email" name="email" placeholder="Your Email" value="{{ old('email') }}" required>
      </div>

      <div class="mb-3">
        <label for="subject" class="form-label">Phone No</label>
        <input type="tel" class="form-control rounded-3" id="phone" name="phone" placeholder="Your Phone No" value="{{ old('phone') }}" required>
      </div>

      <div class="mb-3">
        <label for="message" class="form-label">Message</label>
        <textarea class="form-control rounded-3" id="message" name="message" rows="5" placeholder="Type your message..." required>{{ old('message') }}</textarea>
      </div>

      <button type="submit" class="btn btn-gold w-100 py-2 fw-bold">Send Message</button>
    </form>
      </div>
    </div>

    <!-- Map Section -->
    <div class="col-lg-6 position-relative">
      <div class="map-container rounded-4 shadow-lg overflow-hidden" style="min-height: 500px;">
        <iframe
          class="w-100 h-100"
          style="border: none; position: absolute; top: 0; left: 0;"
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3500.0000000000005!2d75.00000000000001!3d30.000000000000004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0x0000000000000000!2sShahjadpur%20Stables!5e0!3m2!1sen!2sin!4v1690000000000!5m2!1sen!2sin"
          allowfullscreen
          loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"
        ></iframe>
      </div>
      <!--<div class="map-info bg-white rounded-4 shadow p-4 position-absolute bottom-0 start-50 translate-middle-x mb-4" style="max-width: 360px; font-family:'Inter',sans-serif; z-index:10;">-->
      <!--  <h5 class="text-gold mb-3" style="font-family:'Playfair Display', serif;">Visiting Hours</h5>-->
      <!--  <p class="mb-2"><strong>Monday - Saturday:</strong> 9:00 AM - 6:00 PM</p>-->
      <!--  <p class="mb-0"><strong>Sunday:</strong> By appointment only</p>-->
      <!--  <p class="fst-italic mt-2 small">Please call ahead to schedule your visit.</p>-->
      <!--</div>-->
    </div>
  </div>
</div>

<footer class="footer text-white py-5">
      <div class="container">
        <div class="row g-4">
          <div class="col-lg-4 col-md-6">
            <div class="footer-section">
              <div class="footer-brand">Shahjadpur stables</div>
              <p class="mb-3">Preserving the legacy of authentic Shahjadpur stables horses with Punjabi heritage and global standards of excellence.</p>
              <div class="footer-social">
                <a href="#" class="social-icon" aria-label="Facebook">
                  <i class="bi bi-facebook"></i>
                </a>
                <a href="#" class="social-icon" aria-label="Instagram">
                  <i class="bi bi-instagram"></i>
                </a>
                <a href="https://wa.me/0000000000" class="social-icon" aria-label="WhatsApp" target="_blank" rel="noopener">
                  <i class="bi bi-whatsapp"></i>
                </a>
                <a href="#" class="social-icon" aria-label="YouTube">
                  <i class="bi bi-youtube"></i>
                </a>
              </div>
            </div>
          </div>
          <div class="col-lg-2 col-md-6">
            <div class="footer-section">
              <h6>Quick Links</h6>
              <a href="horses.html" class="footer-link" data-i18n="nav.horses">Horses</a><br>
              <a href="heritage.html" class="footer-link" data-i18n="nav.heritage">Heritage</a><br>
              <a href="gallery.html" class="footer-link" data-i18n="nav.gallery">Gallery</a><br>
              <a href="about.html" class="footer-link" data-i18n="nav.about">About</a><br>
              <a href="contact.html" class="footer-link" data-i18n="nav.contact">Contact</a>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="footer-section">
              <h6>Services</h6>
              <a href="horses.html#for-sale" class="footer-link">Horses for Sale</a><br>
              <a href="horses.html#stallions" class="footer-link">Breeding Services</a><br>
              <a href="contact.html" class="footer-link">Export Guidance</a><br>
              <a href="contact.html" class="footer-link">Viewing Appointments</a><br>
              <a href="contact.html" class="footer-link">Pedigree Verification</a>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="footer-section">
              <h6>Contact Info</h6>
              <div class="mb-2">
                <i class="bi bi-geo-alt-fill me-2 text-gold"></i>
                <span>Punjab, India</span>
              </div>
              <div class="mb-2">
                <i class="bi bi-telephone-fill me-2 text-gold"></i>
                <a href="tel:+910000000000" class="footer-link">+91-00000-00000</a>
              </div>
              <div class="mb-2">
                <i class="bi bi-envelope-fill me-2 text-gold"></i>
                <a href="mailto:info@marwaristud.com" class="footer-link">info@marwaristud.com</a>
              </div>
              <div class="mb-2">
                <i class="bi bi-whatsapp me-2 text-gold"></i>
                <a href="https://wa.me/0000000000" class="footer-link" target="_blank" rel="noopener">WhatsApp Chat</a>
              </div>
            </div>
          </div>
        </div>
        <div class="footer-bottom">
          <div class="row align-items-center">
            <div class="col-md-6">
              <p class="mb-0">&copy; 2024 Shahjadpur stables. All rights reserved.</p>
            </div>
            <div class="col-md-6 text-md-end">
              <p class="mb-0">Proudly preserving Punjabi & Sikh equestrian heritage</p>
            </div>
          </div>
        </div>
      </div>
    </footer>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
// Smooth scrolling
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
  anchor.addEventListener('click', function (e) {
    e.preventDefault();
    const target = document.querySelector(this.getAttribute('href'));
    if (target) {
      target.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
  });
});

// Form handling
const form = document.getElementById('contactForm');
if (form) {
  form.addEventListener('submit', function(e) {
    e.preventDefault();
    const submitBtn = this.querySelector('.submit-btn');
    const originalText = submitBtn.innerHTML;

    // Show loading state
    submitBtn.innerHTML = '<div class="loading"></div>Sending...';
    submitBtn.disabled = true;

    // Simulate form submission (replace with actual form handling)
    setTimeout(() => {
      submitBtn.innerHTML = '<i class="bi bi-check-circle me-2"></i>Message Sent!';
      submitBtn.style.background = 'linear-gradient(45deg, #28a745, #20c997)';

      // Reset form
      setTimeout(() => {
        form.reset();
        submitBtn.innerHTML = originalText;
        submitBtn.style.background = 'linear-gradient(45deg, var(--primary-gold), var(--dark-gold))';
        submitBtn.disabled = false;
      }, 2000);
    }, 1500);
  });
}

// Enhanced form interactions
document.querySelectorAll('.form-control').forEach(input => {
  input.addEventListener('focus', function() {
    this.parentElement.classList.add('focused');
  });

  input.addEventListener('blur', function() {
    if (!this.value) {
      this.parentElement.classList.remove('focused');
    }
  });
});
</script>

</body>
</html>
