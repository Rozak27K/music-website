<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="icon" type="image/png" href="{{ asset('image/musiklogo.png') }}">

    <!-- BOOTSTRAP CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@6.1/dist/fancybox/fancybox.css"/>

    <style>
        body {
            background-color: #f4f4f4;
            font-family: "Times New Roman", Times, serif;
        }

        .hero {
            background: linear-gradient(135deg, #ce7ee0, #9520b8);
            color: white;
            padding: 80px 20px;
        }

        .card:hover {
            transform: translateY(-8px);
            transition: 0.3s;
            box-shadow: 0 15px 30px rgba(0,0,0,0.2);
        }

        .card {
            border-radius: 15px;
            overflow: hidden;
            transition: 0.3s;
        }

        .card-img-top {
            height: 200px;
            object-fit: cover;
        }

        .navbar-nav .nav-link {
            position: relative;
            font-weight: 500;
            margin-left: 20px;
            transition: 0.3s;
        }

        .navbar-nav .nav-link::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: -5px;
            width: 0;
            height: 2px;
            background-color: #ce7ee0;
            transition: 0.3s ease;
        }

        .navbar-nav .nav-link:hover::after,
        .navbar-nav .nav-link.active::after {
            width: 100%;
        }

        .navbar-nav .nav-link:hover {
            color: #ce7ee0 !important;
        }

        .gallery-img {
            width: 100%;
            height: 220px;
            object-fit: cover;
            border-radius: 12px;
        }

        .auth-page {
            min-height: 78vh;
            display: flex;
            align-items: center;
            background:
                linear-gradient(rgba(40, 18, 48, 0.72), rgba(25, 25, 25, 0.82)),
                url("{{ asset('image/event.jpeg') }}") center/cover;
            padding: 60px 16px;
        }

        .auth-card {
            width: 100%;
            max-width: 430px;
            margin: 0 auto;
            padding: 30px;
            background: rgba(255, 255, 255, 0.94);
            border: 1px solid rgba(206, 126, 224, 0.32);
            border-radius: 18px;
            box-shadow: 0 18px 45px rgba(0, 0, 0, 0.28);
        }

        .auth-card-header {
            margin-bottom: 24px;
        }

        .auth-logo {
            width: 78px;
            height: 78px;
            object-fit: contain;
            margin-bottom: 14px;
        }

        .auth-card h1 {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 6px;
            color: #4b1859;
        }

        .auth-card-header p {
            color: #555;
            margin-bottom: 0;
        }

        .auth-label {
            font-weight: 700;
            color: #4b1859;
        }

        .auth-input {
            border: 1px solid #d8b4e2;
            border-radius: 12px;
            padding: 11px 14px;
        }

        .auth-input:focus {
            border-color: #9520b8;
            box-shadow: 0 0 0 0.2rem rgba(149, 32, 184, 0.16);
        }

        .auth-button {
            background: linear-gradient(135deg, #ce7ee0, #9520b8);
            border: 0;
            border-radius: 12px;
            color: white;
            font-weight: 700;
            padding: 11px 16px;
        }

        .auth-button:hover {
            color: white;
            background: linear-gradient(135deg, #bd66d4, #7d159d);
        }

        .auth-link {
            color: #9520b8;
            font-weight: 700;
            text-decoration: none;
        }

        .auth-link:hover {
            color: #6f127f;
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .navbar-brand img {
                width: 45px;
            }

            .navbar-brand span {
                font-size: 1rem;
            }

            .navbar-nav .nav-link {
                margin-left: 0;
                padding: 10px 0;
            }

            .hero {
                padding: 45px 16px;
            }

            .hero h1 {
                font-size: 1.8rem;
            }

            .hero p {
                font-size: 1rem !important;
            }

            .container {
                padding-left: 18px;
                padding-right: 18px;
            }

            .card-img-top,
            .gallery-img {
                height: 170px;
            }

            .card-body {
                padding: 14px;
            }

            .card-body h4,
            .card-body h5 {
                font-size: 1.1rem;
            }

            section.py-5 {
                padding-top: 2rem !important;
                padding-bottom: 2rem !important;
            }

            .auth-page {
                min-height: 72vh;
                padding: 36px 14px;
            }

            .auth-card {
                padding: 22px;
                border-radius: 14px;
            }
        }

        @media (max-width: 480px) {
            .hero {
                padding: 35px 14px;
            }

            .hero h1 {
                font-size: 1.5rem;
            }

            .card-img-top,
            .gallery-img {
                height: 145px;
            }

            .btn {
                font-size: 0.9rem;
                padding: 6px 12px;
            }
        }
    </style>
</head>
<body>

    @include('partials.navbar')

    @yield('content')

    @include('partials.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@6.1/dist/fancybox/fancybox.umd.js"></script>

    <script>
        Fancybox.bind("[data-fancybox='gallery']", {});
    </script>
</body>
</html>
