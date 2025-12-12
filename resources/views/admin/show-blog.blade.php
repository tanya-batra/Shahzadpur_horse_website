<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>{{ $blog->title }} | My Blog</title>

  <!-- Fonts & Styles -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />

  <style>
    body {
      margin: 0;
      background-color: #ffffff;
      font-family: 'Inter', sans-serif;
      color: #1a1a1a;
    }

    /* Hero Section */
    .hero {
      position: relative;
      height: 100vh;
      background: linear-gradient(rgba(0,0,0,0.45), rgba(0,0,0,0.7)), url('{{ asset($blog->image) }}') center/cover no-repeat;
      color: #fff;
      display: flex;
      flex-direction: column;
      justify-content: flex-end;
      padding: 60px 40px;
    }

    .hero h1 {
      font-family: 'Playfair Display', serif;
      font-size: 4rem;
      margin: 0;
      max-width: 900px;
      line-height: 1.2;
    }

    .hero p {
      font-size: 1.2rem;
      color: #e0e0e0;
      margin-top: 20px;
      max-width: 700px;
    }

    .container {
      max-width: 800px;
      margin: auto;
      padding: 80px 20px;
    }

    .back-link {
      text-decoration: none;
      color: #5b0a0a;
      font-weight: 500;
      display: inline-block;
      margin-bottom: 2rem;
    }

    .back-link i {
      margin-right: 6px;
    }

    .blog-content {
      font-size: 1.15rem;
      line-height: 2;
      color: #333;
    }

    .blog-content h2, .blog-content h3 {
      font-family: 'Playfair Display', serif;
      color: #5b0a0a;
      margin-top: 2.5rem;
    }

    /* Video Embed */
    .video-section {
      margin: 60px 0;
    }

    .video-section h4 {
      font-weight: 600;
      margin-bottom: 20px;
      color: #5b0a0a;
    }

    /* SEO Section */
    .seo-info {
      background: #f5f5f5;
      padding: 40px;
      border-radius: 15px;
      margin-top: 60px;
    }

    .seo-info h5 {
      font-weight: 700;
      margin-bottom: 20px;
    }

    .seo-info li {
      margin-bottom: 10px;
    }

    @media (max-width: 768px) {
      .hero {
        height: 80vh;
        padding: 40px 20px;
      }

      .hero h1 {
        font-size: 2.2rem;
      }
    }
  </style>
</head>
<body>

  <!-- Hero -->
  <section class="hero">
    <h1>{{ $blog->title }}</h1>
    <p>{{ $blog->short_description }}</p>
  </section>

  <!-- Main Content -->
  <div class="container">
    <a href="{{ route('blogs.view') }}" class="back-link">
      <i class="fas fa-arrow-left"></i> Back to Blogs
    </a>

    <div class="blog-content">
      {!! nl2br(e($blog->description)) !!}
    </div>

    @if($blog->youtube_url)
    <div class="video-section">
      <h4>Watch the Related Video</h4>
      <div class="ratio ratio-16x9">
        <iframe src="{{ str_replace('watch?v=', 'embed/', $blog->youtube_url) }}" frameborder="0" allowfullscreen></iframe>
      </div>
    </div>
    @endif

    <div class="seo-info">
      <h5>SEO Information</h5>
      <ul class="list-unstyled">
        <li><strong>Meta Title:</strong> {{ $blog->meta_title ?? 'N/A' }}</li>
        <li><strong>Meta Description:</strong> {{ $blog->meta_description ?? 'N/A' }}</li>
        <li><strong>Meta Keywords:</strong> {{ $blog->meta_keywords ?? 'N/A' }}</li>
      </ul>
    </div>
  </div>

</body>
</html>
