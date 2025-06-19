@extends('layout')
@section('content')
    <main>
        <section class="hero">
            <div class="container animate">
                <h1><span class="text-gradient">Insights</span> to inspire your creative journey</h1>
                <p>Discover thought-provoking articles on design, technology, and personal growth from industry
                    experts.</p>
                <div>
                    <a href="#" class="btn btn-primary">Start Reading</a>
                </div>
            </div>
        </section>

        <div class="container">
            <article class="featured-post animate delay-1">
                <div class="featured-content">
                    <span class="post-tag">Featured</span>
                    <h2 class="featured-title">The Psychology of Color in Digital Product Design</h2>
                    <p class="post-excerpt">How color choices influence user behavior and emotional responses, with
                        practical examples from top-performing apps.</p>
                    <div class="post-meta">
                        <span class="post-meta-item"><i class="far fa-calendar"></i> June 12, 2023</span>
                        <span class="post-meta-item"><i class="far fa-clock"></i> 8 min read</span>
                    </div>
                    <div class="author">
                        <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Author" class="author-avatar">
                        <div>
                            <div class="author-name">Sarah Johnson</div>
                            <div class="post-meta-item">UX Designer</div>
                        </div>
                    </div>
                </div>
            </article>

            <h2 class="section-title animate delay-2">Latest Articles</h2>
            <div class="posts-grid">
                <article class="post-card animate delay-1">
                    <img src="https://source.unsplash.com/random/600x400/?ui,design" alt="Post image"
                         class="post-image">
                    <div class="post-content">
                        <span class="post-tag">Design</span>
                        <h3 class="post-title">10 UI Trends That Will Dominate 2023</h3>
                        <p class="post-excerpt">From glassmorphism to micro-interactions, explore the design trends
                            shaping digital experiences this year.</p>
                        <a href="#" class="read-more">Read more <i class="fas fa-arrow-right"></i></a>
                    </div>
                </article>

                <article class="post-card animate delay-2">
                    <img src="https://source.unsplash.com/random/600x400/?code,programming" alt="Post image"
                         class="post-image">
                    <div class="post-content">
                        <span class="post-tag">Development</span>
                        <h3 class="post-title">Modern JavaScript Techniques You Should Know</h3>
                        <p class="post-excerpt">Level up your JS skills with these powerful patterns and features
                            introduced in ES2022 and beyond.</p>
                        <a href="#" class="read-more">Read more <i class="fas fa-arrow-right"></i></a>
                    </div>
                </article>

                <article class="post-card animate delay-3">
                    <img src="https://source.unsplash.com/random/600x400/?workspace" alt="Post image"
                         class="post-image">
                    <div class="post-content">
                        <span class="post-tag">Productivity</span>
                        <h3 class="post-title">Building a Distraction-Free Work Environment</h3>
                        <p class="post-excerpt">Research-backed strategies to create a workspace that promotes deep
                            focus and flow states.</p>
                        <a href="#" class="read-more">Read more <i class="fas fa-arrow-right"></i></a>
                    </div>
                </article>
            </div>

            <section class="newsletter animate delay-3">
                <div class="newsletter-content">
                    <h3>Join our community</h3>
                    <p>Get exclusive content, early access to articles, and weekly inspiration delivered to your
                        inbox.</p>
                    <form class="newsletter-form">
                        <input type="email" placeholder="Your email address">
                        <button type="submit">Subscribe <i class="fas fa-paper-plane"></i></button>
                    </form>
                </div>
            </section>

            <h2 class="section-title">Popular Topics</h2>
            <div class="posts-grid">
                <article class="post-card">
                    <img src="https://source.unsplash.com/random/600x400/?startup" alt="Post image" class="post-image">
                    <div class="post-content">
                        <span class="post-tag">Business</span>
                        <h3 class="post-title">From Idea to MVP in 30 Days</h3>
                        <p class="post-excerpt">A step-by-step guide to rapidly validating your startup idea with
                            minimal resources.</p>
                        <a href="#" class="read-more">Read more <i class="fas fa-arrow-right"></i></a>
                    </div>
                </article>

                <article class="post-card">
                    <img src="https://source.unsplash.com/random/600x400/?ai" alt="Post image" class="post-image">
                    <div class="post-content">
                        <span class="post-tag">Technology</span>
                        <h3 class="post-title">AI Tools That Enhance Creativity</h3>
                        <p class="post-excerpt">How artificial intelligence is becoming a collaborator rather than a
                            replacement for creative professionals.</p>
                        <a href="#" class="read-more">Read more <i class="fas fa-arrow-right"></i></a>
                    </div>
                </article>

                <article class="post-card">
                    <img src="https://source.unsplash.com/random/600x400/?meeting" alt="Post image" class="post-image">
                    <div class="post-content">
                        <span class="post-tag">Leadership</span>
                        <h3 class="post-title">Remote Team Management in 2023</h3>
                        <p class="post-excerpt">Best practices for building trust, maintaining culture, and driving
                            results with distributed teams.</p>
                        <a href="#" class="read-more">Read more <i class="fas fa-arrow-right"></i></a>
                    </div>
                </article>
            </div>
        </div>
    </main>
@endsection
