@extends('frontend.layout')
@section('headerfooter')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Melanin Leadership</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background: #f5f1ea;
            font-family: 'Segoe UI', sans-serif;
        }

        .ml-wrapper {
            background: rgba(255, 255, 255, 0.6);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }

        .ml-title {
            font-weight: 700;
            font-size: 2.2rem;
            margin-bottom: 25px;
            color: #5a4632;
        }

        .ml-card {
            background: rgba(255, 255, 255, 0.6);
            backdrop-filter: blur(8px);
            border-radius: 15px;
            border: none;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.08);
        }

        .ml-card .card-body {
            color: #3a2e1f;
        }

        .ml-button {
            margin-bottom: 10px;
            background: linear-gradient(135deg, rgb(192, 120, 20), rgb(216, 154, 87));
            color: #fff;
            padding: 12px 25px;
            font-weight: 600;
            border-radius: 50px;
            border: none;
            box-shadow: 0 4px 15px rgba(100, 80, 50, 0.2);
            transition: all 0.3s ease-in-out;
        }

        .ml-button:hover {
            background: linear-gradient(135deg, rgb(220, 147, 68), rgb(178, 103, 28));
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(100, 80, 50, 0.25);
        }

        .form-control {
            background: rgba(255, 255, 255, 0.6);
            border: 1px solid #ccc;
        }

        .ml-icon {
            background-color: rgb(238, 200, 159);
            color: #5a4033;
            border-radius: 50%;
            width: 60px;
            height: 60px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            margin-bottom: 1rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .ml-icon:hover {
            background-color: #5a4033;
            color: #fff;
        }

        .ml-img-top {
            width: 200px;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <div class="container py-5">
        <!-- Intro Section -->
        <div class="ml-wrapper text-center mb-5">
            <h1 class="ml-title">Melanin Leadership</h1>
            <p class="lead">"Leadership is not about position — it’s about impact."</p>
            <p>Melanin Leadership is our commitment to building strong, conscious, and confident leaders across all walks of life. Whether you’re an athlete, a student, a parent, or a professional — leadership begins with knowing who you are and how you show up in the world.</p>
            <p>Through our certified training programs powered by the John Maxwell Leadership framework, we equip individuals with the tools to lead with purpose, communicate with clarity, and influence with integrity.</p>
        </div>

        <!-- Focus Section -->
        <div class="row g-4 mb-5">
            <div class="col-md-4">
                <div class="card ml-card h-100 text-center">
                    <div class="card-body">
                        <div class="ml-icon">
                            <i class="fas fa-star"></i>
                        </div>
                        <h5 class="card-title">Young Athletes</h5>
                        <p class="card-text">Lead with character and discipline on and off the field.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card ml-card h-100 text-center">
                    <div class="card-body">
                        <div class="ml-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <h5 class="card-title">Parents</h5>
                        <p class="card-text">Raise emotionally strong, confident children with positive influence.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card ml-card h-100 text-center">
                    <div class="card-body">
                        <div class="ml-icon">
                            <i class="fas fa-briefcase"></i>
                        </div>
                        <h5 class="card-title">Professionals & Coaches</h5>
                        <p class="card-text">Build resilient, people-centered teams that thrive with purpose.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Call to Action Buttons -->
        <div class="text-center mb-5">
            <button class="ml-button me-2"><i class="fas fa-book-open me-2"></i>Explore Our Programs</button>
            <button class="ml-button me-2"><i class="fas fa-calendar-check me-2"></i>Book a Session</button>
            <button class="ml-button me-2"><i class="fas fa-handshake me-2"></i>Partner with Us</button>
            <button class="ml-button"><i class="fas fa-certificate me-2"></i>Get Certified</button>
        </div>

        <!-- Meet Coaches -->
        <div class="ml-wrapper mb-5">
            <h2 class="ml-title text-center">Meet Our Coaches</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card ml-card">
                        <img src="https://www.iconpacks.net/icons/2/free-user-icon-3296-thumb.png" class="ml-img-top" alt="Coach">
                        <div class="card-body">
                            <h5 class="card-title">Coach Aisha</h5>
                            <p class="card-text">Certified Maxwell Leadership Coach empowering youth through confidence and discipline.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card ml-card">
                        <img src="https://www.iconpacks.net/icons/2/free-user-icon-3296-thumb.png" class="ml-img-top" alt="Coach">
                        <div class="card-body">
                            <h5 class="card-title">Coach Malik</h5>
                            <p class="card-text">Specializes in corporate leadership and emotional intelligence for teams.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card ml-card">
                        <img src="https://www.iconpacks.net/icons/2/free-user-icon-3296-thumb.png" class="ml-img-top" alt="Coach">
                        <div class="card-body">
                            <h5 class="card-title">Coach Lani</h5>
                            <p class="card-text">Focused on parenting and youth development through practical leadership habits.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Inquiry Form -->
        <div class="ml-wrapper">
            <div class="row">
                <div class="col-md-6">
                    <img width="580px" class="img-fluid" src="https://www.rootsofaction.com/wp-content/uploads/2018/01/Youth-Sports-Coach.jpg" alt="Coach Session">
                </div>
                <div class="col-md-6">
                    <h2 class="ml-title">Get in Touch</h2>
                    <form>
                        <div class="row g-3 mb-3">
                            <div class="col-md-6 position-relative">
                                <input type="text" class="form-control pe-5" placeholder="Your Name" required>
                                <i class="fas fa-user position-absolute end-0 top-50 translate-middle-y me-3 text-muted"></i>
                            </div>
                            <div class="col-md-6 position-relative">
                                <input type="email" class="form-control pe-5" placeholder="Your Email" required>
                                <i class="fas fa-envelope position-absolute end-0 top-50 translate-middle-y me-3 text-muted"></i>
                            </div>
                        </div>

                        <div class="mb-3 position-relative">
                            <select class="form-select pe-5" required>
                                <option selected disabled>Interested in...</option>
                                <option>Youth Program</option>
                                <option>Parent Coaching</option>
                                <option>Corporate Training</option>
                                <option>Certification Info</option>
                            </select>
                        </div>

                        <div class="mb-3 position-relative">
                            <textarea class="form-control pe-5" rows="4" placeholder="Message (optional)"></textarea>
                            <i class="fas fa-comment position-absolute end-0 top-0 mt-3 me-3 text-muted"></i>
                        </div>

                        <div class="text-">
                            <button class="ml-button px-5">
                                <i class="fas fa-paper-plane me-2"></i>Send Inquiry
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
   </body>

</html>
@endsection
