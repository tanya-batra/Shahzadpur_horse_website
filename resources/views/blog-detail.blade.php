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
    display: block !important;
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
</style>

  <body>


{{-- Header Section Start --}}
<header class="navbar navbar-dark bg-primary-dark sticky-top shadow-sm navbar-expand-lg">
  <div class="container">
    <a class="navbar-brand fw-bold d-flex align-items-center gap-2" href="index.html">
      <img src="../assets/images/logo.png" alt="Logo" class="img-fluid"  />
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

<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-lg-10">

      <!-- Blog Title -->
      <h1 class="section-title mb-3">{{ $blog->title }}</h1>
      <p class="text-muted mb-4">
        <i class="bi bi-calendar-event me-1"></i> 
        {{ $blog->created_at->format('M d, Y') }}
      </p>

      <!-- Blog Image -->
      @if($blog->image)
        <img src="{{ asset('storage/' . $blog->image) }}" class="img-fluid rounded mb-4" alt="{{ $blog->title }}">
      @endif

      <!-- Blog Description -->
      <div class="blog-description">
        {!! $blog->description !!}
      </div>

      <!-- YouTube Video -->
      @if($blog->youtube_url)
        <div class="ratio ratio-16x9 mt-4">
          <iframe src="{{ $blog->youtube_url }}" title="YouTube video" allowfullscreen></iframe>
        </div>
      @endif

      <!-- Share Buttons -->
      <div class="mt-5 d-flex gap-3">
        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" 
           target="_blank" class="btn btn-outline-primary btn-sm">
          <i class="bi bi-facebook"></i> Share
        </a>
        <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ $blog->title }}" 
           target="_blank" class="btn btn-outline-info btn-sm">
          <i class="bi bi-twitter"></i> Tweet
        </a>
        <a href="https://wa.me/?text={{ urlencode($blog->title . ' ' . request()->fullUrl()) }}" 
           target="_blank" class="btn btn-outline-success btn-sm">
          <i class="bi bi-whatsapp"></i> WhatsApp
        </a>
      </div>

    </div>
  </div>
</div>
  </body>
</html>
