@extends('frontend.layout')
@section('headerfooter')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Responsive Category Page</title>
  <style>
    * { box-sizing: border-box; }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      margin: 0;
      padding: 20px;
      background: #fff;
    }

    .category-wrapper {
      max-width: 1200px;
      margin: 20px auto;
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
      .category-name { font-size: 12px; }
      .category-item img { width: 50px; height: 50px; }
    }
  </style>
</head>
<body>
  <div class="category-wrapper">
    <div class="category-grid">
      @foreach ($categories as $category)
        <a href="{{ route('category.products', $category->id) }}" class="category-item">
          <img src="{{ asset('backend/categories/' . $category->image) }}" alt="{{ $category->title }}" />
          <div class="category-name">{{ $category->title }}</div>
        </a>
      @endforeach
    </div>
  </div>
</body>
</html>
@endsection
