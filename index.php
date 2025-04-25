<?php
	// landing/index page
	echo "Index Page";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Bubble Booking</title>
    <!-- <link rel="stylesheet" href="css/style.css"> -->
	 <style>
		/* General Reset */
body, h1, h2, h3, p, a {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
}

/* Body Styling */
body {
    background-color: #f9f9f9;
    color: #333;
    line-height: 1.6;
}

/* Header */
.landing-header {
    background: #333;
    color: #fff;
    padding: 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.landing-header .logo h1 {
    font-size: 1.8em;
}

.landing-header nav a {
    color: #fff;
    margin-left: 15px;
    text-decoration: none;
    padding: 10px 15px;
    background: #555;
    border-radius: 5px;
    transition: background 0.3s ease;
}

.landing-header nav a:hover {
    background: #f57c00;
}

/* Hero Section */
.hero-section {
    text-align: center;
    padding: 60px 20px;
    background: linear-gradient(to bottom, #f57c00, #e64a19);
    color: #fff;
}

.hero-section h2 {
    font-size: 2.5em;
    margin-bottom: 20px;
}

.hero-section p {
    font-size: 1.2em;
    margin-bottom: 30px;
}

.hero-section .button {
    padding: 15px 30px;
    background: #fff;
    color: #f57c00;
    font-weight: bold;
    text-transform: uppercase;
    border: none;
    border-radius: 5px;
    transition: background 0.3s ease, color 0.3s ease;
}

.hero-section .button:hover {
    background: #f57c00;
    color: #fff;
}

/* Features Section */
.features-section {
    padding: 40px 20px;
    text-align: center;
    background: #fff;
}

.features-section h2 {
    margin-bottom: 30px;
    font-size: 2em;
    color: #f57c00;
}

.features {
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
    margin-top: 20px;
}

.feature {
    background: #f9f9f9;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    width: 30%;
    margin-bottom: 20px;
}

.feature h3 {
    font-size: 1.5em;
    margin-bottom: 10px;
    color: #e64a19;
}

.feature p {
    font-size: 1em;
    color: #666;
}

/* Call to Action */
.call-to-action {
    text-align: center;
    padding: 40px 20px;
    background: #333;
    color: #fff;
}

.call-to-action h2 {
    font-size: 2em;
    margin-bottom: 20px;
}

.call-to-action .button {
    padding: 15px 30px;
    background: #f57c00;
    color: #fff;
    font-weight: bold;
    text-transform: uppercase;
    border: none;
    border-radius: 5px;
    transition: background 0.3s ease;
}

.call-to-action .button:hover {
    background: #e64a19;
}

/* Footer */
footer {
    text-align: center;
    padding: 10px 0;
    background: #333;
    color: #fff;
    font-size: 0.9em;
}
/* Spa Owner Section */
.spa-owner-section {
    padding: 40px 20px;
    text-align: center;
    background: #f0f0f0;
    margin-top: 30px;
    border-radius: 10px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.spa-owner-section h2 {
    font-size: 2em;
    margin-bottom: 20px;
    color: #f57c00;
}

.spa-owner-section p {
    font-size: 1.1em;
    margin-bottom: 20px;
    color: #666;
}

.spa-owner-section .button {
    padding: 15px 30px;
    background: #f57c00;
    color: #fff;
    font-weight: bold;
    text-transform: uppercase;
    border: none;
    border-radius: 5px;
    transition: background 0.3s ease;
}

.spa-owner-section .button:hover {
    background: #e64a19;
}

	 </style>
</head>
<body>
    <header class="landing-header">
        <div class="logo">
            <h1>Bubble Booking</h1>
        </div>
        <nav>
            <a href="view/login.php">Login</a>
            <a href="view/register.php">Register</a>
            <a href="view/parlours.php">Parlours</a>
            <a href="view/spa_subscription.php">For Spa Owners</a>
        </nav>
    </header>

    <main class="landing-main">
        <section class="hero-section">
            <h2>Discover Luxury and Wellness at Your Fingertips</h2>
            <p>
                Bubble Booking connects you with the best spas and wellness centers in Ghana. 
                Book services, purchase products, and rejuvenate your mind and body—all in one place.
            </p>
            <a href="view/parlours.php" class="button">Explore Parlours</a>
        </section>

        <section class="features-section">
            <h2>Why Choose Bubble Booking?</h2>
            <div class="features">
                <div class="feature">
                    <h3>Easy Bookings</h3>
                    <p>Seamless scheduling for your favorite spa treatments.</p>
                </div>
                <div class="feature">
                    <h3>Trusted Providers</h3>
                    <p>Only verified and highly-rated spas are listed on our platform.</p>
                </div>
                <div class="feature">
                    <h3>Secure Payments</h3>
                    <p>Pay safely using mobile money, credit cards, or other secure methods.</p>
                </div>
            </div>
        </section>

        <section class="spa-owner-section">
            <h2>Are You a Spa Owner?</h2>
            <p>Join Bubble Booking and reach thousands of customers looking for premium spa and wellness services.</p>
            <a href="view/spa_subscription.php" class="button">Get Started as a Spa Owner</a>
        </section>

        <section class="call-to-action">
            <h2>Ready to Relax?</h2>
            <a href="view/register.php" class="button">Get Started</a>
        </section>
    </main>

    <footer>
        <p>&copy; <?php echo date('Y'); ?> Bubble Booking. All Rights Reserved.</p>
    </footer>
</body>
</html>
