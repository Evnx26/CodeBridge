<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Splash Screen</title>
  <style>
    body, html {
      margin: 0;
      padding: 0;
      height: 100%;
      overflow: hidden;
      display: flex;
      justify-content: center;
      align-items: center;
      background: #4caf50; /* Background color */
      color: white;
      font-family: Arial, sans-serif;
    }
    .splash-screen {
      text-align: center;
      animation: fadeOut 3s ease-out forwards;
    }
    @keyframes fadeOut {
      0% { opacity: 1; }
      100% { opacity: 0; visibility: hidden; }
    }
  </style>
</head>
<body>
  <div class="splash-screen">
    <h1>Welcome!</h1>
    <p>Loading, please wait...</p>
    <h1 hidden><?php echo htmlspecialchars(@$data->role); ?></h1>
  </div>

  <script>
    // Mendapatkan nilai role dari PHP
    const role = "<?php echo htmlspecialchars(@$data->role); ?>";

    setTimeout(() => {
      if (role === "admin") {
        window.location.href = "/"; // Route untuk admin
      } else if (role === "user") {
        window.location.href = "/user/dashboard"; // Route untuk user
      } else {
        window.location.href = ""; // Route fallback jika role tidak sesuai
      }
    }, 3000); // 3 detik
  </script>
</body>
</html>
