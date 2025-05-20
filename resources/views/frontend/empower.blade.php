@extends('frontend.layout')
@section('headerfooter')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Melanin Empower</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #fdfcf9;
      color: #2c2c2c;
    }
    .empower-header {
      background: linear-gradient(90deg, #f5f0e1, #fdfcf9);
      padding: 60px 20px;
      text-align: center;
    }
    .empower-header h1 {
      font-size: 2.8rem;
      color: #5a4a3f;
      font-weight: bold;
    }
    .empower-header p {
      font-size: 1.2rem;
      margin-top: 10px;
      max-width: 800px;
      margin-inline: auto;
      color: #4e4e4e;
    }

    .empower-section {
      padding: 50px 20px;
    }

    .section-title {
      font-size: 2rem;
      color: #4c3b2a;
      font-weight: bold;
      margin-bottom: 25px;
      text-align: center;
    }

    .card-custom {
      background-color: #ffffff;
      border-radius: 12px;
      box-shadow: 0 4px 14px rgba(0, 0, 0, 0.08);
      padding: 20px;
      height: 100%;
    }

    .btn-cta {
      padding: 10px 22px;
      border: none;
      font-weight: 500;
      border-radius: 6px;
      margin: 10px 5px 0;
      display: inline-block;
      transition: background 0.3s;
    }

    .btn-beige {
      background-color: #d8c4a3;
      color: #3c2f23;
    }

    .btn-brown {
      background-color: #7c5e45;
      color: #fff;
    }

    .btn-gold {
      background-color: #c1a36d;
      color: #fff;
    }

    .highlight-card {
      background-color: #fff9f0;
    }

    @media (max-width: 576px) {
      .empower-header h1 {
        font-size: 2rem;
      }
    }
  </style>
</head>
<body>
  <!-- Header Section -->
  <section class="empower-header">
    <h1>Melanin Empower</h1>
    <p>“When we empower one, we uplift many.” At Melanin Strength, we believe that greatness begins with opportunity — and sometimes, all it takes is the right support at the right moment.</p>
  </section>

  <!-- How It Works -->
  <section class="empower-section bg-light">
    <div class="container">
      <h2 class="section-title">How It Works</h2>
      <div class="row text-center">
        <div class="col-md-4 mb-4">
          <div class="card-custom">
            <h5>Sponsor</h5>
            <p>Support young athletes or pageant stars with apparel and visibility to help them rise confidently.</p>
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="card-custom">
            <h5>Nominate</h5>
            <p>Know someone who shines? Nominate them and let us amplify their voice and potential.</p>
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="card-custom">
            <h5>Collaborate</h5>
            <p>Work with us through NGOs or brand partnerships to expand our reach and impact.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Spotlight Stories -->
  <section class="empower-section">
    <div class="container">
      <h2 class="section-title">Spotlight Stories</h2>
      <div class="row">
        <div class="col-md-4 mb-4">
          <div class="card-custom highlight-card">
            <img src="{{asset('assets/image/empower/0102.jpg')}}" class="img-fluid rounded mb-3" alt="Spotlight 1">
            <h6>Rising Tennis Star</h6>
            <p>Aspiring player from Botswana now training with international coaches thanks to our program.</p>
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="card-custom highlight-card">
            <img src="{{asset('assets/image/empower/202.jpg')}}" class="img-fluid rounded mb-3" alt="Spotlight 2">
            <h6>Confident Pageant Queen</h6>
            <p>Once shy, now boldly walking the stage — representing her region with pride and power.</p>
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="card-custom highlight-card">
            <img src="{{asset('assets/image/empower/303.jpg')}}" class="img-fluid rounded mb-3" alt="Spotlight 3">
            <h6>Changemaker in Training</h6>
            <p>Through support and mentorship, he’s launching youth programs to help others in his village.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Call to Actions -->
  <section class="empower-section bg-light">
    <div class="container text-center">
      <h2 class="section-title">Join the Movement</h2>
      <p>Melanin Empower is about giving back, building confidence, and creating a ripple of inspiration that travels far beyond a single match, crown, or win.</p>
      <div>
        <a href="#" class="btn-cta btn-brown">🔗 Sponsor a Rising Star</a>
        <a href="#" class="btn-cta btn-beige">📸 Meet Our Changemakers</a>
        <a href="#" class="btn-cta btn-gold">📬 Nominate Someone</a>
        <a href="#" class="btn-cta btn-brown">💬 Partner With Us</a>
      </div>
    </div>
  </section>
</body>
</html>
@endsection
