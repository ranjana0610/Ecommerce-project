@extends('frontend.layout')
@section('headerfooter')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Melanin CSR — Community & Sustainability</title>
  <style>
    :root {
      --gold: #a18865;
      --brown: #5e493c;
      --beige: #c9b8a0;
      --light-bg: #f9f6f2;
      --text-main: #2b1b10;
    }

    body {
      font-family: 'Segoe UI', sans-serif;
      color: var(--text-main);
      background-color: var(--light-bg);
    }

    .section-title {
      color: var(--brown);
      font-weight: bold;
    }

    .subtext {
      color: #6b5b51;
    }

    .btn-gold {
      background: linear-gradient(135deg, var(--gold), #d9c9b3);
      color: white;
      border: none;
    }

    .btn-brown {
      background-color: var(--brown);
      color: white;
      border: none;
    }

    .btn-beige {
      background-color: linear-gradient(135deg, var(--gold),rgb(143, 128, 108))!important;
      color: var(--text-main);
      border: none;
    }

    .csr-card {
      background-color: white;
      box-shadow: 0 4px 20px rgba(0,0,0,0.05);
      border-radius: 8px;
      padding: 1.5rem;
    }

    .hero {
      background-color: #ece4d9;
    }

    .bg-dark-alt {
      background-color: #3a2c22;
      color: white;
    }

    .cta-section {
      background-color: #f3ece5;
    }

    .cta-section .btn {
      min-width: 230px;
    }

    .icon-bullet {
      font-size: 1.2rem;
      margin-right: 0.4rem;
    }
  </style>
</head>
<body>
<!-- Hero Section -->
<section class="py-5 text-center hero">
  <div class="container">
    <h1 class="display-5 section-title">Melanin CSR — Community & Sustainability</h1>
    <p class="lead subtext">"Strength is not only in what we wear — it's in how we give."</p>
    <p class="subtext">
      At Melanin Strength, we believe that doing business and doing good should go hand in hand.
      Through our Corporate Social Responsibility (CSR) commitment, we focus on uplifting communities and protecting the environment —
      because true strength is measured by the impact we leave behind.
    </p>
  </div>
</section>

<!-- Focus Areas -->
<section class="py-5">
  <div class="container">
    <div class="row g-4 align-items-center">
      <div class="col-md-6">
        <div class="csr-card">
          <p>From donating gear to underserved athletes, to running youth development programs, to supporting environmental action in our home country of Botswana, our CSR mission is rooted in <strong>empowerment</strong> and <strong>sustainability</strong>.</p>
          <ul class="list-unstyled mt-3">
            <li class="mb-2"><span class="icon-bullet">🎾</span><strong>Youth Sports Support:</strong> Providing apparel and motivational programs to aspiring athletes across Botswana and beyond.</li>
            <li class="mb-2"><span class="icon-bullet">🌍</span><strong>Environmental Action:</strong> Championing water-saving and land protection initiatives in desert-prone communities.</li>
            <li class="mb-2"><span class="icon-bullet">🏫</span><strong>Community Education:</strong> Hosting leadership talks, wellness workshops, and campaigns to inspire and equip the next generation.</li>
          </ul>
          <p class="mt-3"><em>This isn’t charity. It’s responsibility. And we’re proud to carry it with strength, integrity, and purpose.</em></p>
        </div>
      </div>
      <div class="col-md-6">
        <img src="{{asset('assets/image/local/csr.jpg')}}" alt="Melanin CSR" class="img-fluid rounded shadow-sm">
      </div>
    </div>
  </div>
</section>

<!-- CTA Buttons -->
<section class="py-5 cta-section text-center">
  <div class="container">
    <h3 class="section-title mb-4">Call to Action</h3>
    <div class="d-flex flex-wrap justify-content-center gap-3">
      <a href="#" class="btn btn-gold py-2 px-4">💚 Join Our Impact Projects</a>
      <a href="#" class="btn btn-brown py-2 px-4">🧒🏽 Support a Young Athlete</a>
      <a href="#" class="btn btn-gold py-2 px-4">🌿 Explore Our Green Goals</a>
      <a href="#" class="btn btn-beige py-2 px-4">🤝 Partner With Purpose</a>
    </div>
  </div>
</section>

<!-- Project Highlights -->
<section class="py-5">
  <div class="container">
    <h3 class="section-title text-center mb-5">Project Highlights</h3>
    <div class="row g-4">
      <div class="col-md-4">
        <div class="csr-card h-100">
          <h5>🏆 Desert Tennis Clinics</h5>
          <p>Bringing sport and inspiration to kids in Botswana's arid zones.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="csr-card h-100">
          <h5>🌱 Green Schools Campaign</h5>
          <p>Teaching eco-responsibility to the next generation of leaders.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="csr-card h-100">
          <h5>💬 Voices of Change</h5>
          <p>Real testimonials from those empowered by our initiatives.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Final CTA -->
<section class="py-5 bg-dark-alt text-center">
  <div class="container">
    <h3 class="mb-3">This isn’t charity. It’s responsibility.</h3>
    <p class="lead mb-4">We carry our CSR mission with strength, integrity, and purpose. Join us in creating real change.</p>
    <a href="#" class="btn btn-beige px-5 py-2" style="
    padding: 4px;
    background-color: white !important;
">Get Involved Today</a>
  </div>
</section>
</body>
</html>
@endsection
