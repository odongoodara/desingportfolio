<?php include 'include/header.php'; 
require "db_connection.php";
$images = $pdo->query("SELECT * FROM uploaded_images ORDER BY uploaded_at DESC")->fetchAll();
?>

<!-- Hero Section -->
<section class="hero">
    <div class="hero-content">
        <span class="badge">Graphic Design</span>
        <h1>design with odongo odara creative </h1>
        <p>with highest Creativity concept</p>
    
    </div>
</section>

<!-- ============================================ -->
<!-- MARQUEE POSTER SECTION - ONLY IMAGES         -->
<!-- ============================================ -->
<section class="poster-marquee-section">
    <div class="container">
        <h2>Where Creativity Meets Technology</h2>
        <p class="section-subtitle">Check out our latest designs</p>
        
        <div class="marquee-wrapper">
            <marquee behavior="scroll" direction="left" scrollamount="3" loop="infinite" onmouseover="this.stop()" onmouseout="this.start()">
                <?php if (empty($images)): ?>
                    <p style="color:#666; padding: 20px;">No images uploaded yet. Go to admin to upload.</p>
                <?php else: ?>
                    <?php foreach ($images as $img): ?>
                        <img src="<?php echo $img['image_path']; ?>" alt="Poster" class="poster-img">
                    <?php endforeach; ?>
                <?php endif; ?>
            </marquee>
        </div>
    </div>
</section>

<!-- Design Showcase -->
<section class="design-showcase">
    <div class="container">
        <h2>Featured Projects</h2>
        <div class="showcase-grid">
            <div class="showcase-card">
                <div class="card-badge">EXCLUSIVE COLLECTION</div>
                <h3>Backpack</h3>
                <p>Design your happy place.</p>
                <div class="price-tag">
                    <span class="discount">35% OFF</span>
                    <span class="price">$999</span>
                </div>
            </div>
            <div class="showcase-card featured">
                <div class="card-badge">We Dig Media</div>
                <h3>Design & Creative</h3>
                <p>Happy Place Studio</p>
            </div>
            <div class="showcase-card">
                <div class="card-badge">LIVE COURSE</div>
                <h3>Design Principles</h3>
                <p>Master the fundamentals</p>
            </div>
        </div>
    </div>
</section>

<!-- Live Course Section -->
<section class="live-course">
    <div class="container">
        <div class="course-content">
            <div class="course-text">
                <span class="course-tag">LIVE COURSE</span>
                <h2>Design Live Course Principles</h2>
                <p>Learn the fundamentals & principles with practical application</p>
                <ul class="course-features">
                    <li>✓ 100% Live Interactive Sessions</li>
                    <li>✓ 20 Days Comprehensive Training</li>
                    <li>✓ Live Q&A with Experts</li>
                    <li>✓ Practical Hands-on Projects</li>
                </ul>
                <a href="#" class="btn-secondary">View Course Details</a>
            </div>
            <div class="course-image">
                <div class="course-placeholder">
                    <span>LIVE</span>
                    <span>COURSE</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="stats-section">
    <div class="container">
        <div class="stats-grid">
            <div class="stat-item">
                <span class="stat-number">500+</span>
                <span class="stat-label">Students Trained</span>
            </div>
            <div class="stat-item">
                <span class="stat-number">50+</span>
                <span class="stat-label">Live Courses</span>
            </div>
            <div class="stat-item">
                <span class="stat-number">100%</span>
                <span class="stat-label">Satisfaction Rate</span>
            </div>
            <div class="stat-item">
                <span class="stat-number">24/7</span>
                <span class="stat-label">Support Available</span>
            </div>
        </div>
    </div>
</section>

<?php include 'include/footer.php'; ?>