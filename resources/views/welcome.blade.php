<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Freelancer Scheduling Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body { 
            font-family: 'Poppins', sans-serif; 
            background: linear-gradient(135deg, #fd6ba8 0%, #6dfdff 100%);
            line-height: 1.6;
        }
        .navbar {
            padding: 1rem 0;
            background-color: #1d3557;
        }
        .navbar-brand {
            font-size: 1.5rem;
        }
        .nav-link {
            color: #fff !important;
            margin-right: 1rem;
            transition: color 0.3s ease;
        }
        .nav-link:hover {
            color: #a8dadc !important;
        }
        .avatar-circle {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #28a745;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            font-weight: bold;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }
        .avatar-circle:hover {
            background-color: #218838;
        }
        .carousel-item {
            position: relative;
        }
        .carousel-caption {
            background: linear-gradient(135deg, rgba(29, 53, 87, 0.7), rgba(69, 123, 157, 0.7));
            border-radius: 15px;
            padding: 30px 40px;
            text-align: center;
            top: 50%;
            transform: translateY(-50%);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease, background 0.3s ease;
        }
        .carousel-caption:hover {
            transform: translateY(-55%);
            background: linear-gradient(135deg, rgba(29, 53, 87, 0.8), rgba(69, 123, 157, 0.8));
        }
        .carousel-caption h2 {
            font-size: 2.8rem;
            font-weight: 700;
            background: linear-gradient(90deg, #ffffff, #a8dadc);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        }
        .carousel-caption p {
            font-size: 1.2rem;
            color: #e9ecef;
            font-weight: 300;
            margin-bottom: 1.5rem;
        }
        .carousel-caption .btn {
            font-size: 1rem;
            font-weight: 600;
            padding: 0.75rem 2rem;
            border-radius: 25px;
            border: 2px solid #a8dadc;
            color: #a8dadc;
            background: transparent;
            transition: all 0.3s ease;
        }
        .carousel-caption .btn:hover {
            background: #a8dadc;
            color: #1d3557;
            border-color: #a8dadc;
            transform: scale(1.05);
        }
        .carousel-inner img {
            max-height: 500px;
            object-fit: cover;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }
        .carousel-control-prev, .carousel-control-next {
            filter: invert(100%) brightness(2);
            opacity: 0.8;
            transition: opacity 0.3s ease;
        }
        .carousel-control-prev:hover, .carousel-control-next:hover {
            opacity: 1;
        }
        .freelancer-section {
            padding: 60px 0;
        }
        .freelancer-card {
            border: none;
            border-radius: 15px;
            background: white;
            padding: 2rem;
            transition: all 0.3s ease;
        }
        .freelancer-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
        }
        .freelancer-card img {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 50%;
            border: 4px solid #fff;
            margin-top: -60px;
            background: #fff;
        }
        .freelancer-card h4 {
            font-size: 1.25rem;
            margin: 1rem 0 0.5rem;
        }
        .freelancer-card p {
            font-size: 0.95rem;
            color: #6c757d;
        }
        .btn-outline-primary {
            border-radius: 20px;
            padding: 0.4rem 1.2rem;
            transition: all 0.3s ease;
        }
        .btn-outline-primary:hover {
            background: #457b9d;
            color: white;
            border-color: #457b9d;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('welcome') }}">FindFreeLancer</a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item"><a class="nav-link" href="{{ route('welcome') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('freelancers.index') }}">Find Freelancer</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('freelancers.index') }}">FreeLancer</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('introduce') }}">Introduce</a></li>
                    @auth
                        <li class="nav-item">
                            <a href="{{ route('dashboard') }}" class="avatar-circle mx-3">
                                {{ strtoupper(substr(auth()->user()->username, 0, 1)) }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="nav-link border-0 bg-transparent text-white">LogOut</button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item"><a class="nav-link px-3" href="{{ route('login') }}">Login</a></li>
                        <li class="nav-item">
                            <a class="btn btn-outline-primary px-3 py-1" href="{{ route('register') }}">Register</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- Slider -->
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active position-relative">
                <img src="{{ asset('image/image1.jpg') }}" class="d-block w-100" alt="Slider 1">
                <div class="carousel-caption d-flex flex-column justify-content-center h-100">
                    <h2 class="fw-bold">Find Professional Freelancers</h2>
                    <p>Connect with top experts and book appointments easily</p>
                    <a href="{{ route('freelancers.index') }}" class="btn btn-outline-light btn-lg mt-3">Find Freelancer</a>
                </div>
            </div>
            <div class="carousel-item position-relative">
                <img src="{{ asset('image/image2.jpg') }}" class="d-block w-100" alt="Slider 2">
                <div class="carousel-caption d-flex flex-column justify-content-center h-100">
                    <h2 class="fw-bold">Find Professional Freelancers</h2>
                    <p>Connect with top experts and book appointments easily</p>
                    <a href="{{ route('freelancers.index') }}" class="btn btn-outline-light btn-lg mt-3">Find Freelancer</a>
                </div>
            </div>
            <div class="carousel-item position-relative">
                <img src="{{ asset('image/image3.jpg') }}" class="d-block w-100" alt="Slider 3">
                <div class="carousel-caption d-flex flex-column justify-content-center h-100">
                    <h2 class="fw-bold">Find Professional Freelancers</h2>
                    <p>Connect with top experts and book appointments easily</p>
                    <a href="{{ route('freelancers.index') }}" class="btn btn-outline-light btn-lg mt-3">Find Freelancer</a>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>

    <!-- Freelancer Section -->
    <section class="freelancer-section container">
        <h3 class="text-center mb-5 fw-bold" data-aos="fade-up">Featured Freelancers</h3>
        <div class="row g-4">
            @php
                $featuredFreelancers = \App\Models\Freelancer::with('user')->take(6)->get();
            @endphp
            @forelse ($featuredFreelancers as $index => $freelancer)
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="{{ 100 + ($index * 100) }}">
                    <div class="card text-center freelancer-card shadow-sm">
                        <img src="{{ asset($freelancer->avatar) }}" 
                             class="mx-auto rounded-circle mb-3" 
                             width="120" 
                             alt="{{ $freelancer->user->username }} Avatar"
                             onerror="this.src='{{ asset('image/profile1.jpg') }}'">
                        <h4>{{ $freelancer->user->username }}</h4>
                        <p>{{ ucfirst($freelancer->field ?? 'No role') }}</p>
                        <a href="{{ route('freelancers.show', $freelancer->id) }}" 
                           class="btn btn-outline-primary">View Profile</a>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p>Chưa có freelancer nào.</p>
                </div>
            @endforelse
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            once: true
        });
    </script>
</body>
</html>