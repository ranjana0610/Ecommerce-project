@extends('frontend.layout')
@section('headerfooter')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Responsive Category Page</title>
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      margin: 0;
      padding: 20px;
      background: #fff;
    }

    .category-wrapper {
      max-width: 1200px;
      margin: 20px;
    }

    
    .category-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
      gap: 20px;
      margin-top: 50px;
    }

    .category-item {
      background: #f9f9f9;
      border-radius: 12px;
      padding: 15px;
      margin-top: 16px !important;
      text-align: center;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      width: 100%;
    }

    .category-item:hover {
      transform: translateY(-5px);
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
      background-color: #fff;
    }

    .category-item img {
      width: 60px;
      height: 60px;
      object-fit: contain;
      margin-bottom: 10px;
    }

    .category-name {
      font-size: 14px;
      font-weight: 600;
      color: #333;
    }

    @media (max-width: 600px) {
      .category-name {
        font-size: 12px;
      }

      .category-item img {
        width: 50px;
        height: 50px;
      }
    }
  </style>
</head>
<body>
  <div class="category-wrapper">

    <div class="category-grid">
      <div class="category-item">
        <img src="https://img.icons8.com/ios/100/000000/jacket.png" alt="Men's Wear" />
        <div class="category-name">Men's Wear</div>
      </div>
      <div class="category-item">
        <img src="https://img.icons8.com/ios/100/000000/dress-front-view.png" alt="Women Apparel" />
        <div class="category-name">Women Apparel</div>
      </div>
      <div class="category-item">
        <img src="https://img.icons8.com/ios/100/000000/dress-front-view.png" alt="Beauty" />
        <div class="category-name">Beauty & Personal</div>
      </div>
      <div class="category-item">
        <img src="https://img.icons8.com/ios/100/000000/jewelry.png" alt="Jewellery" />
        <div class="category-name">Jewellery</div>
      </div>
      <div class="category-item">
        <img src="https://img.icons8.com/ios/100/000000/dress-front-view.png" alt="Women's Bags" />
        <div class="category-name">Women's Bags</div>
      </div>
      <div class="category-item">
        <img src="https://img.icons8.com/ios/100/000000/dress-front-view.png" alt="Appliances" />
        <div class="category-name">Appliances</div>
      </div>
      <div class="category-item">
        <img src="https://img.icons8.com/ios/100/000000/sofa.png" alt="Living" />
        <div class="category-name">Home & Living</div>
      </div>
      <div class="category-item">
        <img src="https://img.icons8.com/ios/100/000000/dress-front-view.png" alt="Travel" />
        <div class="category-name">Travel & Luggage</div>
      </div>
      <div class="category-item">
        <img src="https://img.icons8.com/ios/100/000000/shoes.png" alt="Men's Shoes" />
        <div class="category-name">Men's Shoes</div>
      </div>
      <div class="category-item">
        <img src="https://img.icons8.com/ios/100/000000/dress-front-view.png" alt="Travel" />
        <div class="category-name">Travel & Luggage</div>
      </div>
      <div class="category-item">
        <img src="https://img.icons8.com/ios/100/000000/shoes.png" alt="Men's Shoes" />
        <div class="category-name">Men's Shoes</div>
      </div>
      <div class="category-item">
        <img src="https://img.icons8.com/ios/100/000000/dress-front-view.png" alt="Travel" />
        <div class="category-name">Travel & Luggage</div>
      </div>
      <div class="category-item">
        <img src="https://img.icons8.com/ios/100/000000/shoes.png" alt="Men's Shoes" />
        <div class="category-name">Men's Shoes</div>
      </div>
      <div class="category-item">
        <img src="https://img.icons8.com/ios/100/000000/dress-front-view.png" alt="Travel" />
        <div class="category-name">Travel & Luggage</div>
      </div>
      <div class="category-item">
        <img src="https://img.icons8.com/ios/100/000000/shoes.png" alt="Men's Shoes" />
        <div class="category-name">Men's Shoes</div>
      </div>
      <div class="category-item">
        <img src="https://img.icons8.com/ios/100/000000/dress-front-view.png" alt="Travel" />
        <div class="category-name">Travel & Luggage</div>
      </div>
      <div class="category-item">
        <img src="https://img.icons8.com/ios/100/000000/shoes.png" alt="Men's Shoes" />
        <div class="category-name">Men's Shoes</div>
      </div>
    </div>
  </div>
</body>
</html>
@endsection