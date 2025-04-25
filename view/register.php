<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bubble.css">
    <title>Register Page</title>
    <style>
        body{
            background-image: url('../assets/images/cono.jpeg');
        }
    </style>
</head>
<body>
    <div class="register-container">
        <h2>Register with us</h2>
        <form id="registerForm" method="POST" onsubmit="validateForm(); return false;" action="../actions/register_user.php">
            <input type="text" placeholder="First Name" id="f_name" name="f_name" required>
            <input type="text" placeholder="Last Name" id="l_name" name="l_name" required>
            <label>Gender:</label>
            <label for="male">Male<input type="radio" id="male" name="gender" value="0" checked> </label>
            <label for="female">Female<input type="radio" id="female" name="gender" value="1"> </label>

            <label for="dob">Date of Birth:</label>
            <input type="date" id="DOB" name="DOB" required>
            <input type="tel" placeholder="Phone Number" id="Phone_number" name="Phone_number" required>
            <input type="email" placeholder="E-mail" id="Email" name="Email" required>
            <input type="password" placeholder="Password" id="Passwords" name="Passwords" required>
            <input type="password" placeholder="Confirm Password" id="retypePassword" name="retypePassword" required>
            <button type="submit" name="submit" id="button">Register</button>
        </form>
        <p id="error-message"></p>
        <p class="login-link">Already have an account? <a href="../view/login.php">Login</a></p>
    </div>
    <script src="../js/script.js"></script>
</body>
</html>
