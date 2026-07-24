<?php include 'include/header.php'; ?>

<section class="contact-page">
    <div class="container">
        <h1>Contact Us</h1>
        <div class="contact-grid">
            <div class="contact-form">
                <h2>Let's Connect</h2>
                <form action="contact.php" method="POST">
                    <input type="text" name="name" placeholder="Your Name" required>
                    <input type="email" name="email" placeholder="Your Email" required>
                    <input type="text" name="subject" placeholder="Subject">
                    <textarea name="message" rows="5" placeholder="Your Message" required></textarea>
                    <button type="submit" class="btn-primary">Send Message</button>
                </form>
                <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    echo '<div class="success-msg">✅ Thank you! Your message has been sent.</div>';
                }
                ?>
            </div>
            <div class="contact-info">
                <h3>Get in Touch</h3>
                <p>📧 odongoodara@gmail.com</p>
                <p>📍 Your Location Here</p>
                <div class="social-links">
                    <a href="#">🔗 LinkedIn</a>
                    <a href="#">📷 Instagram</a>
                    <a href="#">📊 Portfolio</a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'include/footer.php'; ?>