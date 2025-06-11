<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Sign Up</title>
  <link rel="stylesheet" href="css/signup.css" />
</head>
<body>
  <div class="signup-container">
    
    <h2>Create your account</h2>
    <form class="signup-form">
      <label for="email">Email address</label>
      <input type="email" id="email" placeholder="you@example.com" required />
      
      <label for="password">Password</label>
      <input type="password" id="password" placeholder="Create a password" required />
      
      <button type="submit" id="btnsignup">Continue</button>
    </form>
    <p class="or">or</p>
   
    <p class="login-link">Already have an account? <a href="login.php">Log in</a></p>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="javascript/signup.js"></script>
</body>
</html>
