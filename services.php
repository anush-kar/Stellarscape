<?php include './components/check_login.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Services</title>
  <link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet" />
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: white;
      color: rgb(88, 0, 136);
    }

    nav {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 20px 40px;
      background-color: rgb(88, 0, 136);
      color: white;
    }

    .nav__logo {
      font-size: 24px;
      font-weight: bold;
      color: white;
    }

    .nav__links {
      list-style: none;
      display: flex;
      gap: 30px;
    }

    .nav__links .link a {
      text-decoration: none;
      color: white;
      font-weight: 500;
      font-size: 16px;
    }

    .btn {
      background-color: white;
      color: rgb(88, 0, 136);
      border: none;
      padding: 10px 20px;
      border-radius: 6px;
      font-weight: bold;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .btn:hover {
      background-color: rgb(236, 223, 245);
    }

    #services {
      padding: 60px 40px;
    }

    .section-header h2 {
      font-size: 32px;
      text-align: center;
      margin-bottom: 40px;
    }

    .card-list {
      display: flex;
      justify-content: center;
      gap: 40px;
      flex-wrap: wrap;
    }

    .card-item {
      background-color: rgb(247, 241, 255);
      border: 1px solid rgb(220, 200, 245);
      border-radius: 12px;
      width: 300px;
      padding: 20px;
      text-decoration: none;
      color: rgb(88, 0, 136);
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
      transition: transform 0.3s ease;
    }

    .card-item:hover {
      transform: translateY(-5px);
    }

    .card-item img {
      width: 100%;
      height: 180px;
      object-fit: cover;
      border-radius: 8px;
      margin-bottom: 15px;
    }

    .card-item .developer {
      font-weight: bold;
      font-size: 14px;
      margin-bottom: 8px;
      display: block;
      color: rgb(88, 0, 136);
    }

    .card-item h3 {
      font-size: 16px;
      font-weight: normal;
    }
  </style>
</head>
<body>
  <?php include './components/navbar.html'; ?>

  <section id="services">
  <div class="section-header">
    <h2>Our Services</h2>
  </div>
  <div class="card-list">
    <a href="apod.php" class="card-item">
      <img src="./public/assets/planet-earth-background.jpg" alt="Card Image">
      <span class="developer">Astronomy Picture of the Day</span>
      <h3>New stunning images of the universe picked by NASA everyday</h3>
    </a>
    
    <a href="mars.php" class="card-item">
      <img src="./public/assets/mars.jpg" alt="Card Image">
      <span class="developer">Mars Rover Photos</span>
      <h3>Get images gathered by NASA's Curiosity, Opportunity, and Spirit rovers on Mars</h3>              
    </a>

    <!-- 🌟 Library Card Added Below -->
    <a href="./library.php" class="card-item">
      <img src="./public/assets/library.jpeg" alt="Library Image">
      <span class="developer">Library</span>
      <h3>Explore books, search your favorites, and add new ones to the collection</h3>              
    </a>
  </div>
</section>

</body>
</html>
