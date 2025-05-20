@extends('frontend.layout')
@section('headerfooter')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>About Us | Melanin Strength</title>
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background-color: #f9f9f9;
      color: #222;
      line-height: 1.7;
    }

    header {
        background: linear-gradient(135deg, #f0e6bd, #a29c83);
      color: #fff;
      padding: 80px 20px 40px;
      text-align: center;
    }

    header h1 {
      font-size: 36px;
      margin-bottom: 10px;
    }

    header p {
      font-size: 20px;
      font-style: italic;
      color: #433b33;
    }

    .container {
      max-width: 1200px;
      margin: auto;
      padding: 40px 20px;
    }

    .section-title {
      font-size: 28px;
      color: #5c2d91;
      margin-bottom: 10px;
    }

    .content-block {
      margin-bottom: 40px;
    }

    .flex-row {
      display: flex;
      flex-wrap: wrap;
      align-items: flex-start;
      gap: 30px;
    }

    .image-col, .text-col {
      flex: 1;
      min-width: 300px;
    }

    .image-col img {
      width: 100%;
      border-radius: 12px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.15);
    }

    .values {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 20px;
      margin-top: 20px;
    }

    .value-box {
      background: #fff;
      border: 1px solid #ddd;
      padding: 20px;
      border-radius: 10px;
      text-align: center;
    }

    .value-box span {
      font-size: 28px;
      display: block;
      margin-bottom: 10px;
    }

    .cta {
      background: #000;
      color: #fff;
      padding: 40px 20px;
      text-align: center;
      border-radius: 12px;
      margin-top: 50px;
    }

    .cta h3 {
      font-size: 24px;
      margin-bottom: 10px;
    }

    @media (max-width: 768px) {
      header h1 {
        font-size: 28px;
      }

      header p {
        font-size: 16px;
      }

      .section-title {
        font-size: 22px;
      }

      .cta h3 {
        font-size: 20px;
      }
    }
  </style>
</head>
<body>
  <header>
    <h1>Our Story: Strength in Every Shade</h1>
    <p>“Melanin Strength is more than a brand — it’s a belief.”</p>
  </header>

  <div class="container">
    <div class="content-block">
      <p>
        It’s the belief that no matter where you come from, what shade you are, or how tough the journey gets, there is greatness inside you. Born from the real-life journey of a young tennis player from Botswana, Melanin Strength was created to inspire a global movement rooted in identity, resilience, and purpose.
      </p>
    </div>

    <div class="content-block flex-row">
      <div class="image-col">
        <img src="https://via.placeholder.com/500x400" alt="Founder Tshepo Mosarwa">
      </div>
      <div class="text-col">
        <h2 class="section-title">Our Founder: Tshepo Mosarwa</h2>
        <p>
          At just 5½ years old, Tshepo picked up a tennis racket on the courts of Botswana — not knowing that the game would shape his future. With the guidance of his father, the motivation of his mother, and a burning desire to be more, Tshepo pushed through limited resources, long hours, and life-changing opportunities that took him from junior tennis in Africa to playing elite college tennis in the U.S.
        </p>
        <p>
          But Tshepo’s dream wasn’t just about winning matches — it was about becoming a symbol of what’s possible. That dream led to the birth of Melanin Strength, a brand that empowers others to rise, shine, and live their own version of greatness.
        </p>
      </div>
    </div>

    <div class="content-block">
      <h2 class="section-title">What We Stand For</h2>
      <div class="values">
        <div class="value-box">
          <span>🖤</span>
          <strong>Identity</strong><br />
          Celebrating all shades, cultures, and stories.
        </div>
        <div class="value-box">
          <span>💪🏾</span>
          <strong>Strength</strong><br />
          Mentally, emotionally, physically, and spiritually.
        </div>
        <div class="value-box">
          <span>🎓</span>
          <strong>Growth</strong><br />
          Through sports, leadership, and education.
        </div>
        <div class="value-box">
          <span>🌍</span>
          <strong>Impact</strong><br />
          Giving back to our communities and planet.
        </div>
      </div>
    </div>

    <div class="content-block">
      <h2 class="section-title">Our Why</h2>
      <p>
        We exist to tell stories that matter, to create apparel that inspires, to build leaders who uplift, and to stand beside youth and individuals who are walking bold paths with quiet strength. Every T-shirt, every training, every act of support is rooted in one mission: to inspire a world of possibility, and ignite greatness.
      </p>
    </div>

    <div class="cta">
      <h3>Join the Movement</h3>
      <p>
        Whether you wear it, live it, teach it, or support it — you are part of the Melanin Strength story. And the world needs your shade of strength.
      </p>
    </div>
  </div>
</body>
</html>
@endsection
