@extends('frontend.layout')
@section('headerfooter')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Contact Us</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      line-height: 1.6;
      background: #fff;
      color: #000;
    }

    .container {
      max-width: 1200px;
      margin: auto;
      padding: 20px;
    }

    h1 {
      color: #4B0082;
      font-size: 36px;
    }

    .breadcrumb {
      color: #999;
      font-size: 14px;
    }

    .breadcrumb a {
      text-decoration: none;
      color: #000;
    }

    .contact-wrapper {
    
      margin-top: 30px;
    }

    .form-box, .info-box {
      flex: 1;
      min-width: 280px;
      background: #f8f6ec;
      border: 1px solid #eee;
      padding: 28px;
      border-radius: 10px;
    }

    .form-box input, .form-box textarea {
      width: 100%;
      padding: 12px;
      margin-bottom: 15px;
      border: 1px solid #ddd;
      border-radius: 8px;
      font-size: 16px;
    }

    .form-box textarea {
      height: 150px;
      resize: vertical;
    }

    .form-box button {
      width: 100%;
      background: #5C4730;
      color: white;
      padding: 15px;
      border: none;
      border-radius: 8px;
      font-size: 18px;
      cursor: pointer;
    }

    .info-item {
      display: flex;
      align-items: center;
      margin-bottom: 20px;
    }

    .info-icon {
      background: #f4f4f4;
      padding: 15px;
      border-radius: 50%;
      margin-right: 15px;
      font-size: 20px;
    }

    .info-content strong {
      display: block;
      font-size: 18px;
      margin-bottom: 5px;
    }

    @media (max-width: 768px) {
      h1 {
        font-size: 28px;
      }

      .contact-wrapper {
        flex-direction: column;
      }

      .form-box button {
        font-size: 16px;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="breadcrumb">
      <a href="{{url('/')}}">Home</a> &gt; Contact
    </div>

    <h1>Get in Touch with Melanin Strength</h1>
    <p>Have a question, ideas, or partnership proposal? We’d love to hear from you. Whether you're an athlete, parent, organization, or someone who simply believes in the power of purpose, we’re always open to connect.</p>
<p>Let’s grow, lead, and inspire — together.</p>
    <div class=" row contact-wrapper">
        <div class="col-12 col-lg-8">

      <div class="form-box">
        <div class="row ">
        <div class="col-12 col-lg-6">
        <label>Name</label>
        <input type="text" placeholder="Your name">
        </div>
        <div class="col-12 col-lg-6">
        <label>Email</label>
        <input type="email" placeholder="Your email">
        </div>
        </div>
        <label>Subject</label>
        <input type="text" placeholder="Subject">
        
        <label>Message</label>
        <textarea placeholder="Message"></textarea>
       
        

        <button type="submit">Submit</button>
      </div>
      </div>
<div class="col-12 col-lg-4">

      <div class="info-box">
        <div class="info-item">
          <div class="info-icon">📞</div>
          <div class="info-content">
            <strong>Phone</strong>
            4534345656
          </div>
        </div>

        <div class="info-item">
          <div class="info-icon">✉️</div>
          <div class="info-content">
            <strong>Email</strong>
            info@Melaninstength.com
          </div>
        </div>

        <div class="info-item">
          <div class="info-icon">📍</div>
          <div class="info-content">
            <strong>Address</strong>
            Botswana & North Carolina
          </div>
        </div>
      </div>
      
</div>
    </div>
  </div>
</body>
</html>
@endsection