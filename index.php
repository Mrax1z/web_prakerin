<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }
    .login-container {
      background: white;
      border-radius: 8px;
      box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
      padding: 2rem;
      width: 100%;
      max-width: 400px;
      text-align: center;
    }
    .login-btn {
      background-color: #009cff ;
      border: none;
    }
    .login-btn:hover {
      background-color: #0086e6;
    }
    .form-control:focus {
      border-color: #ff6f47;
      box-shadow: 0 0 0 0.2rem rgba(255, 111, 71, 0.25);
    }
  </style>
</head>
<body>
  <div class="login-container">
    <img src="https://via.placeholder.com/100" alt="Logo" class="mb-3" style="width: 80px;">
    <h3 class="mb-3">Login</h3>
    <p class="text-muted">Sign into your pages account</p>
    <?php
    if (isset($_GET['error'])) {
      echo '<div class="alert alert-danger" role="alert">' . htmlspecialchars($_GET['error']) . '</div>';
    }
    ?>
    <form action="process_login.php" method="POST">
      <div class="mb-3">
        <input type="email" class="form-control" name="email" placeholder="Email" required>
      </div>
      <div class="mb-3">
        <input type="password" class="form-control" name="password" placeholder="Password" required>
      </div>
      <button type="submit" class="btn login-btn w-100">Login</button>
    </form>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
