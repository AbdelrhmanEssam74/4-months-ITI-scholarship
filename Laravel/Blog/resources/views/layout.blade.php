<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'ITIBlog')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.5/css/bootstrap.min.css" integrity="sha512-VKRuFSBOvhd0K/u8OFOE2ChWfbu8qKvXjGWirtOznTauCSkpeu0suyEg2Zm5JqBumCHJOBJcTfE7xYJlDjknCg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link
        rel="stylesheet"
        data-purpose="Layout StyleSheet"
        title="Web Awesome"
        href="/css/app-wa-86cd56275caec687041f80b17dc62e32.css?vsn=d"
    >

    <link
        rel="stylesheet"
        href="https://site-assets.fontawesome.com/releases/v6.7.2/css/all.css"
    >

    <link
        rel="stylesheet"
        href="https://site-assets.fontawesome.com/releases/v6.7.2/css/sharp-duotone-thin.css"
    >

    <link
        rel="stylesheet"
        href="https://site-assets.fontawesome.com/releases/v6.7.2/css/sharp-duotone-solid.css"
    >

    <link
        rel="stylesheet"
        href="https://site-assets.fontawesome.com/releases/v6.7.2/css/sharp-duotone-regular.css"
    >

    <link
        rel="stylesheet"
        href="https://site-assets.fontawesome.com/releases/v6.7.2/css/sharp-duotone-light.css"
    >

    <link
        rel="stylesheet"
        href="https://site-assets.fontawesome.com/releases/v6.7.2/css/sharp-thin.css"
    >

    <link
        rel="stylesheet"
        href="https://site-assets.fontawesome.com/releases/v6.7.2/css/sharp-solid.css"
    >

    <link
        rel="stylesheet"
        href="https://site-assets.fontawesome.com/releases/v6.7.2/css/sharp-regular.css"
    >

    <link
        rel="stylesheet"
        href="https://site-assets.fontawesome.com/releases/v6.7.2/css/sharp-light.css"
    >

    <link
        rel="stylesheet"
        href="https://site-assets.fontawesome.com/releases/v6.7.2/css/duotone-thin.css"
    >

    <link
        rel="stylesheet"
        href="https://site-assets.fontawesome.com/releases/v6.7.2/css/duotone-regular.css"
    >

    <link
        rel="stylesheet"
        href="https://site-assets.fontawesome.com/releases/v6.7.2/css/duotone-light.css"
    >

    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>
<body>

<header>
    <div class="container">
        <nav class="navbar">
            <a href="#" class="logo">Blog<span>.</span></a>
            <div class="nav-links">
                <a href="/">Home</a>
                <a href="/articles">Articles</a>
                <a href="#">Categories</a>
                <a href="#">About</a>
                <a href="#">Contact</a>
            </div>
            <div class="nav-actions">
                <a href="#" class="btn btn-outline">Sign in</a>
                <a href="#" class="btn btn-primary">Subscribe</a>
            </div>
        </nav>
    </div>
</header>

<main class="container my-5">
    @yield('content')
</main>

<footer class="mt-5">
    <div class="container">
        <div class="footer-grid">
            <div>
                <a href="#" class="footer-logo">Lumen.</a>
                <p class="footer-about">A modern publication exploring the intersection of creativity, technology, and personal growth.</p>
                <div class="footer-social">
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#"><i class="fab fa-github"></i></a>
                </div>
            </div>
            <div>
                <h4 class="footer-title">Explore</h4>
                <div class="footer-links">
                    <a href="#">All Articles</a>
                    <a href="#">Popular</a>
                    <a href="#">Guides</a>
                    <a href="#">Interviews</a>
                    <a href="#">Resources</a>
                </div>
            </div>
            <div>
                <h4 class="footer-title">Company</h4>
                <div class="footer-links">
                    <a href="#">About</a>
                    <a href="#">Team</a>
                    <a href="#">Careers</a>
                    <a href="#">Contact</a>
                    <a href="#">Press</a>
                </div>
            </div>
            <div>
                <h4 class="footer-title">Legal</h4>
                <div class="footer-links">
                    <a href="#">Privacy</a>
                    <a href="#">Terms</a>
                    <a href="#">Cookies</a>
                    <a href="#">Licenses</a>
                </div>
            </div>
        </div>
        <div class="text-center text-muted mt-4">
            &copy; 2023 Lumen. All rights reserved. Made with <i class="fas fa-heart text-danger"></i> by creative minds.
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
